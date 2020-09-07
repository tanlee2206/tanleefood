@extends('shop.layouts.master')

@section('title')
		Trang chủ
@endsection

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1 m-b-25">Bảng món ăn</h2>
                    <a href="{{route('food.create')}}" class="au-btn au-btn-icon au-btn--blue">
                            <i class="zmdi zmdi-plus"></i>Thêm món ăn</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="">
                            <table id="bootstrap-data-table" class="table table-shop table-borderless table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên món</th>
                                        <th>Hình ảnh</th>
                                        <th>Giá</th>
                                        <th>Mô tả</th>
                                        <th>Rating</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($food as $key => $item)                                
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$item->name}}</td>
                                        <td><img src="{{$item->img}}" width="80" height="80"></td>
                                        <td >{{number_format($item->price,0)}}</td>
                                        <td >{!! Str::limit($item->description,40) !!}</td>
                                        <td>0.9</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                    <i class="zmdi zmdi-mail-send"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                                <a href="{{route('food.detail',$item->id)}}" data-id="{{$item->id}}" class="item js_food_item" title="detail">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a >
                                            </div>
                                        </td>
                                    </tr> 
                                    @endforeach         
                                </tbody>
                            </table>
                    </div>
                </div>
                
              

            </div>
        </div>     
    </div>
      <!-- Modal -->
    <div class="modal fade" id="myModalfood" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-body" id="md_content">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="asset/admin/vendor/jquery-3.2.1.min.js"></script>
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
                    $("#md_content").html('').append(result);
                }
            });
        });
    })
</script>
@endsection