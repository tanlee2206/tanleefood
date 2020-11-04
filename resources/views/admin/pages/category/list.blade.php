@extends('admin.layouts.master')

@section('title')
		category
@endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="user-data m-t-100 m-l-20">
    <h3 class="title-3 m-b-30">
        <i class="zmdi zmdi-account-calendar"></i> data</h3>
        @if(session('message'))
        <div class="alert alert-success">
        {{session('message')}}
        </div>
     @endif
    <div class="table-data" id="list-category">
        <table  id="bootstrap-data-category-table"  class="table">
            <thead>
                <tr>
                    <td>
                        
                    </td>
                    <td>name</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                {{-- {{dd($category)}} --}}
                @foreach ($category as $item)
                <tr>
                    <td>
                        <img src="{{$item->img}}" alt="" width="50" height="50">
                    </td>
                <td>{{$item->name}}</td>
                    
                    
                    <td>
                        <div class="table-data-feature">
                            {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                <i class="zmdi zmdi-mail-send"></i>
                            </button> --}}
                        <a href="{{route('category.edit',$item->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </a>
                            <button id="deleteCategoryButton" data-toggle="modal" data-target="#deleteCategoryModal" data-token="{{ csrf_token() }}"
                                 class="item" id="deletecategory" data-id="{{$item->id}}" >
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                            {{-- <a href="{{route('category.detail',$item->id)}}" data-id="{{$item->id}}" class="item js_category_item" title="detail">
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
    <div class="modal fade" id="myModalcategory" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-body" id="md_content_category">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- delete modal --}}
    <div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete category Confirmation</h5>
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
                    <button type="button" class="btn btn-danger btn-raised" id="deletecategory">Xóa</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection