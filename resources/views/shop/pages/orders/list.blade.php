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
                        <h2 class="title-1 m-b-25">Bảng đơn hàng</h2>
                         <a href="{{route('orders.create')}}" class="au-btn au-btn-icon au-btn--blue">
                            <i class="zmdi zmdi-plus"></i>Thêm đơn hàng</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if(session('message'))
                    <div class="toast toast-success">
                        <div class="icon__holder">
                          <i class="fas fa-check"></i>
                        </div>
                        <div class="text">
                          <h5>thành công</h5>
                          <p>{{session('message')}}</p>
                        </div>
                        <div class="close">
                          <i class="fas fa-times"></i>
                        </div>
                      </div>
                    @endif

                    <div class="" id="list-orders">
                            <table id="bootstrap-data-orders-table" class="table table-shop table-borderless table-striped">
                                {{-- <table  class="table table-shop table-borderless table-striped"> --}}
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>tin nhắn</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key => $item)                                
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$item->message}}</td>
                                        <td>
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
    <div class="modal fade" id="myModalorders" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-body" id="md_content_orders">
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete orders Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn có muốn xóa đơn hàng ?</p>
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