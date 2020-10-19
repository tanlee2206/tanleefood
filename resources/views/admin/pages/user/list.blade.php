@extends('admin.layouts.master')

@section('title')
		người dùng
@endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="user-data m-t-100 m-l-20">
    <h3 class="title-3 m-b-30">
        <i class="zmdi zmdi-account-calendar"></i>user data</h3>
        @if(session('message'))
        <div class="alert alert-success">
        {{session('message')}}
        </div>
     @endif
    <div class="table-data" id="list-user">
        <table  id="bootstrap-data-user-table"  class="table">
            <thead>
                <tr>
                    <td>
                        
                    </td>
                    <td>name</td>
                    <td>role</td>
                    <td>phone</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                {{-- {{dd($user)}} --}}
                @foreach ($user as $item)
                <tr>
                    <td>
                        <img src="{{$item->img}}" alt="" width="50" height="50">
                    </td>
                    <td>
                        <div class="table-data__info">
                        <h6>{{$item->first_name}} {{$item->last_name}}</h6>
                            <span>
                                <a href="#">{{$item->email}}</a>
                            </span>
                        </div>
                    </td>
                    <td>
                   {{-- {{$item->address->ward->name}} --}}
                        @if ($item->permission->permission == 'admin')
                        <span class="role admin">admin</span>
                        @elseif ($item->permission->permission == 'shop')
                        <span class="role member">Shop</span>
                        @elseif ($item->permission->permission == 'customer')
                        <span class="role user">Customer</span>
                        @endif
                        
                    </td>
                    <td>
                        {{$item->phone}}
                    </td>
                    <td>
                        <div class="table-data-feature">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="đổi mật khẩu">
                                <i class="zmdi zmdi-mail-send"></i>
                            </button>
                        <a href="{{route('user.edit',$item->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="chỉnh sửa thông tin">
                                <i class="zmdi zmdi-edit"></i>
                            </a>
                            <button id="deleteUserModal" data-toggle="modal" data-target="#deleteModal" title="xóa" data-token="{{ csrf_token() }}"
                                 class="item" id="deleteuser" data-id="{{$item->id}}" >
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                            <a href="{{route('user.detail',$item->id)}}"  data-id="{{$item->id}}" title="chi tiết" class="item js_user_item" title="detail">
                                <i class="zmdi zmdi-eye"></i>
                            </a >
                        </div>
                    </td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
         <!-- Modal detail-->
    <div class="modal fade" id="myModaluser" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-body" id="md_content_user">
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete user Confirmation</h5>
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
                    <button type="button" class="btn btn-danger btn-raised" id="delete">Xóa</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection