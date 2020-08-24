  function AddCart(id){
        $.ajax({
            url:'Addcart/'+id,
            type:'GET',
        }).done(function(response){
            renderCart(response);
            Swal.fire({
                toast: true,
                position: 'top-start',
                background: '#7fff9c',
                icon: 'success',
                title: 'đã thêm món ăn vào giỏ hàng',
                showConfirmButton: false,
                timer: 1500,
                width: 350,
              })
        });
    }
    $("#change-item-cart").on("click",".si-close i",function(){
        $.ajax({
            url:'DeleteItemCart/'+$(this).data("id"),
            type:'GET',
        }).done(function(response){
            renderCart(response);
            Swal.fire({
                toast: true,
                position: 'top-start',
                background: '#7fff9c',
                icon: 'error',
                text: 'đã xóa món ăn trong giỏ hàng',
                showConfirmButton: false,
                timer: 1500,
                width: 350,
              })
        });

    });
    function renderCart(response){
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        $("#QuantyCartShow").text($("#QuantyCart").val());

    };

    function DeleteItemListCart(id){
        $.ajax({
            url:'DeleteItemListCart/'+id,
            type:'GET',
        }).done(function(response){
            $("#list-cart").empty();
            $("#list-cart").html(response);
            Swal.fire({
                toast: true,
                position: 'top-start',
                background: '#7fff9c',
                icon: 'error',
                text: 'đã xóa món ăn trong giỏ hàng',
                showConfirmButton: false,
                timer: 1500,
                width: 350,
              })
        });
    }
    function UpdateItemListCart(id){
        // console.log($("#UpCart-"+id).val());
        $.ajax({
            url:'UpdateItemListCart/'+id+'/'+$("#UpCart-"+id).val(),
            type:'GET',
        }).done(function(response){
            $("#list-cart").empty();
            $("#list-cart").html(response);
            // alertify.success('đã cập nhât sản phẩn trong giỏ hàng');
        });
    }
