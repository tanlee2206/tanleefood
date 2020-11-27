@extends('admin.layouts.master')

@section('title')
		shop
@endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="user-data m-t-100 m-l-20">
    <h3 class="title-3 m-b-30">
        <i class="zmdi zmdi-account-calendar"></i>Danh sách cửa hàng cần duyệt</h3>
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
    <div class="table-data" id="list-shop">
        <table  id="bootstrap-data-shop-table"  class="table">
            <thead>
                <tr>
                    <td>
                    </td>
                    <td>tên quán</td>
                    <td>Địa chỉ</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                {{-- {{dd($shop)}} --}}
                @foreach ($shop as $item)
                <tr>
                    <td>
                        <img src="{{$item->img}}" alt="" width="50" height="50">
                    </td>
                <td>{{$item->name}}</td>
                    <td>
                        {!! $item->address->address_detail !!},
                    {{$item->address->ward->name}}
                        {{-- @if ($item->permission->id == 1)
                        <span class="role admin">admin</span>
                        @elseif ($item->permission->id == 2)
                        <span class="role member">Shop</span>
                        @elseif ($item->permission->id == 3)
                        <span class="role shop">Customer</span>
                        @endif --}}
                        
                    </td>
                    <td>
                        <div class="table-data-feature">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                <i class="zmdi zmdi-mail-send"></i>
                            </button>
                        <a href="{{route('shop.edit',$item->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </a>
                             <button id="deleteShopButton" data-toggle="modal" data-target="#deleteShopModal" title="xóa" data-token="{{ csrf_token() }}"
                                 class="item" data-id="{{$item->id}}" >
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                            {{-- <a href="{{route('shop.detail',$item->id)}}" data-id="{{$item->id}}" class="item js_shop_item" title="detail">
                                <i class="zmdi zmdi-eye"></i>
                            </a > --}}
                        </div>
                    </td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
         <!-- Modal detail-->
    <div class="modal fade" id="myModalshop" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-body" id="md_content_shop">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- delete modal --}}
    <div class="modal fade" id="deleteShopModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete shop Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn có muốn xóa người dùng ?</p>
                    <input type="hidden" name="del_id"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
                    <button type="button" class="btn btn-danger btn-raised" id="deleteshop">Xóa</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection