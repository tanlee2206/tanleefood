<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>tanlee food</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END PAGE CONTAINER-->
</div>

</div>




<!-- Jquery JS-->
<script src="asset/admin/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="asset/admin/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="asset/admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>

<script>
    $(function(){
        $(".js_user_item").click(function(event){
            event.preventDefault();
            let $this = $(this);
            let url = $this.attr('href');
            // $(".users-id").text('').text($this.attr('data-id'));
            $("#myModaluser").modal('show');
            $.ajax({
            url: url,
            }).done(function(result){
                console.log(result);
                if (result) {
                    $("#md_content_user").html('').append(result);
                }
            });
        });
    })
</script>
{{-- xóa user --}}
<script>
    $(document).ready(function(){
        // open delete user modal
        $(document).on('click', '#deleteUserModal', function () {
            event.preventDefault();
            $('#deleteModal').modal('show');
            $('input[name=del_id]').val($(this).data('id'));
        });
        
        // delete user
        $('.modal-footer').on('click', '#delete', function () {
            event.preventDefault();
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: 'delete',
                url: '/admin/user',
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
                data: {
                    _token: token,
                    id: $('input[name=del_id]').val()
                },
                success: function (data) {
                    $('#deleteModal').modal('hide');
                    
                }
            }).done(function(response){
                $("#list-user").empty();
                $("#list-user").html(response);
                $(".js_user_item").click(function(event){
                    event.preventDefault();
                    let $this = $(this);
                    let url = $this.attr('href');
                    $(".users-id").text('').text($this.attr('data-id'));
                    $("#myModaluser").modal('show');
                    $.ajax({
                    url: url,
                    }).done(function(result){
                        console.log(result);
                        if (result) {
                            $("#md_content_user").html('').append(result);
                        }
                    });
                });
                $('#bootstrap-data-user-table').DataTable();
                $('div.dataTables_info').html('');
                Swal.fire({
                    toast: true,
                    position: 'top-start',
                    background: '#7fff9c',
                    icon: 'error',
                    text: 'đã xóa user ',
                    showConfirmButton: false,
                    timer: 1500,
                    width: 350,
                })
               
            });
        });
    });

</script>


{{-- xóa shop --}}
<script>
    $(document).ready(function(){
        // open delete shop modal
        $(document).on('click', '#deleteShopButton', function () {
            event.preventDefault();
            console.log("222222222222");
            $('#deleteShopModal').modal('show');
            $('input[name=del_id]').val($(this).data('id'));
        });

        delete shop
        $('.modal-footer').on('click', '#deleteshop', function () {
            event.preventDefault();
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: 'delete',
                url: '/admin/shop',
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
                data: {
                    _token: token,
                    id: $('input[name=del_id]').val()
                },
                success: function (data) {
                    $('#deleteShopModal').modal('hide');
                    
                }
            }).done(function(response){
                $("#list-shop").empty();
                $("#list-shop").html(response);
                $(".js_shop_item").click(function(event){
                    event.preventDefault();
                    let $this = $(this);
                    let url = $this.attr('href');
                    $(".shops-id").text('').text($this.attr('data-id'));
                    $("#myModalshop").modal('show');
                    $.ajax({
                    url: url,
                    }).done(function(result){
                        console.log(result);
                        if (result) {
                            $("#md_content_shop").html('').append(result);
                        }
                    });
                });
                $('#bootstrap-data-shop-table').DataTable();
                $('div.dataTables_info').html('');
                Swal.fire({
                    toast: true,
                    position: 'top-start',
                    background: '#7fff9c',
                    icon: 'error',
                    text: 'đã xóa shop ',
                    showConfirmButton: false,
                    timer: 1500,
                    width: 350,
                })
               
            });
        });
    });

</script>
{{-- xóa category --}}
<script>
    $(document).ready(function(){
        // open delete shop modal
        $(document).on('click', '#deleteCategoryButton', function () {
            event.preventDefault();
            console.log("222222222222");
            $('#deleteCategoryModal').modal('show');
            $('input[name=del_id]').val($(this).data('id'));
        });

        // delete category
        $('.modal-footer').on('click', '#deletecategory', function () {
            event.preventDefault();
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: 'delete',
                url: '/admin/category',
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
                data: {
                    _token: token,
                    id: $('input[name=del_id]').val()
                },
                success: function (data) {
                    $('#deleteCategoryModal').modal('hide');
                    
                }
            }).done(function(response){
                $("#list-category").empty();
                $("#list-category").html(response);
                $(".js_category_item").click(function(event){
                    event.preventDefault();
                    let $this = $(this);
                    let url = $this.attr('href');
                    $(".categorys-id").text('').text($this.attr('data-id'));
                    $("#myModalcategory").modal('show');
                    $.ajax({
                    url: url,
                    }).done(function(result){
                        console.log(result);
                        if (result) {
                            $("#md_content_category").html('').append(result);
                        }
                    });
                });
                $('#bootstrap-data-category-table').DataTable();
                $('div.dataTables_info').html('');
                Swal.fire({
                    toast: true,
                    position: 'top-start',
                    background: '#7fff9c',
                    icon: 'error',
                    text: 'đã xóa category ',
                    showConfirmButton: false,
                    timer: 1500,
                    width: 350,
                })
               
            });
        });
    });

</script>

<!-- Vendor JS       -->
<script src="asset/admin/vendor/slick/slick.min.js">
</script>
<script src="asset/admin/vendor/wow/wow.min.js"></script>
<script src="asset/admin/vendor/animsition/animsition.min.js"></script>
<script src="asset/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="asset/admin/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="asset/admin/vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="asset/admin/vendor/circle-progress/circle-progress.min.js"></script>
<script src="asset/admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="asset/admin/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="asset/admin/vendor/select2/select2.min.js">
</script>
<script src="asset/admin/vendor/vector-map/jquery.vmap.js"></script>
<script src="asset/admin/vendor/vector-map/jquery.vmap.min.js"></script>
<script src="asset/admin/vendor/vector-map/jquery.vmap.sampledata.js"></script>
<script src="asset/admin/vendor/vector-map/jquery.vmap.world.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#bootstrap-data-shop-table').DataTable();
        $('#bootstrap-data-category-table').DataTable();
        $('#bootstrap-data-user-table').DataTable({
            "language": {
            "search": "Tìm kiếm",
            "paginate": {
                            "next":       "Sau",
                            "previous":   "Trước"
                        },
            "info": "hiển thị _START_ tới _END_ của _TOTAL_ món ăn",
            "infoEmpty": "không có món ăn hiển thị",
            "lengthMenu": "_MENU_ user",
            },
            
        });
        $('div.dataTables_info').html('');
       
        
    } );
</script>

<script type="text/javascript">
    $('#province').change(function(){
    var provinceID = $(this).val();    
    if(provinceID){
        $.ajax({
           type:"GET",
           url:"{{url('/admin/getdistricts')}}?province_id="+provinceID,
           success:function(res){               
            if(res){
                $("#districts").empty();
                // $("#districts").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#districts").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#districts").empty();
            }
           }
        });
    }else{
        $("#districts").empty();
        $("#wards").empty();
    }      
   });
    $('#districts').on('change',function(){
    var districtsID = $(this).val();    
    if(districtsID){
        $.ajax({
           type:"GET",
           url:"{{url('/admin/getwards')}}?districts_id="+districtsID,
           success:function(res){               
            if(res){
                $("#wards").empty();
                $.each(res,function(key,value){
                    $("#wards").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#wards").empty();
            }
           }
        });
    }else{
        $("#wards").empty();
    }
        
   });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- Main JS-->
<script src="asset/admin/js/main.js"></script>

</body>

</html>
<!-- end document-->
