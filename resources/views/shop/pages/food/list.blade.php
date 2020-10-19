@extends('shop.layouts.master')

@section('title')
		Trang chủ
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                    @if(session('message'))
                        <div class="alert alert-success">
                        {{session('message')}}
                        </div>
                     @endif

                    <div class="" id="list-food">
                            <table id="bootstrap-data-food-table" class="table table-shop table-borderless table-striped">
                                {{-- <table  class="table table-shop table-borderless table-striped"> --}}
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
                                            <a href="{{route('food.edit',$item->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <button id="deleteFoodModal" data-toggle="modal" data-target="#deleteModal" data-token="{{ csrf_token() }}"
                                                     class="item" id="deletefood" data-id="{{ $item->id }}" >
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
      <!-- Modal detail-->
    <div class="modal fade" id="myModalfood" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-body" id="md_content_food">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- delete modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete food Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn có muốn xóa món ăn ?</p>
                    <input type="hidden" name="del_id"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
                    <button type="button" class="btn btn-danger btn-raised" id="delete">Xóa</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection