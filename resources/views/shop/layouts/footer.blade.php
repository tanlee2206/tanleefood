    <!-- END PAGE CONTAINER-->
</div>

</div>
<base href="{{asset('') }}" />
<!-- Jquery JS-->
<script src="asset/admin/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="asset/admin/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="asset/admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script>
    $(function(){
        $(".js_food_item").click(function(event){
            event.preventDefault();
            let $this = $(this);
            let url = $this.attr('href');
            $(".foods-id").text('').text($this.attr('data-id'));
            $("#myModalfood").modal('show');
            $.ajax({
            url: url,
            }).done(function(result){
                console.log(result);
                if (result) {
                    $("#md_content_food").html('').append(result);
                }
            });
        });
    })
</script>
{{-- xóa food --}}
<script>
    $(document).ready(function(){
        // open delete food modal
        $(document).on('click', '#deleteFoodModal', function () {
            event.preventDefault();
            $('#deleteModal').modal('show');
            $('input[name=del_id]').val($(this).data('id'));
        });

        // delete food
        $('.modal-footer').on('click', '#delete', function () {
            event.preventDefault();
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: 'delete',
                url: '/shop-manager/food',
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
                data: {
                    _token: token,
                    id: $('input[name=del_id]').val()
                },
                success: function (data) {
                    $('#deleteModal').modal('hide');
                    
                }
            }).done(function(response){
                $("#list-food").empty();
                $("#list-food").html(response);
                $('#bootstrap-data-table').DataTable();
                $('div.dataTables_info').html('');
                Swal.fire({
                    toast: true,
                    position: 'top-start',
                    background: '#7fff9c',
                    icon: 'error',
                    text: 'đã xóa món ăn ',
                    showConfirmButton: false,
                    timer: 1500,
                    width: 350,
                })
            });
        });
    });

</script>
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
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#bootstrap-data-table').DataTable();
        $('div.dataTables_info').html('');
    } );
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


<!-- Main JS-->
<script src="asset/admin/js/main.js"></script>

</body>

</html>
<!-- end document-->
