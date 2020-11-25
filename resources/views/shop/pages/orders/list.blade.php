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
                         {{-- <a href="{{route('orders.create')}}" class="au-btn au-btn-icon au-btn--blue">
                            <i class="zmdi zmdi-plus"></i>Thêm đơn hàng</a> --}}
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
                                        <th>STT</th>
                                        <th>MÃ ĐƠN</th>
                                        <th>KHÁCH HÀNG</th>
                                        <th>ĐIỆN THOẠI</th>
                                        <th>GIAO ĐẾN</th>
                                        <th>TRANG THÁI</th>
                                        <th>TIN NHẮN</th>
                                        <th></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key => $item)  
                                    {{-- {{dd($item->user)}}                               --}}
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>#{{$item->id}}</td>
                                        <td>{{$item->user->last_name.' '.$item->user->first_name}}</td>
                                        <td>{{$item->user->phone}}</td>
                                        <td>{{Str::limit($item->address->address_detail,40)}}</td>
                                        <td class="status-orders">
                                            <a href="#" data-id="{{$item->id}}" data-status="{{$item->status->id}}"
                                               class="js_status_item 
                                               @if($item->status->id == 1)
                                               badge badge-primary
                                               @elseif($item->status->id == 2)
                                               badge badge-warning
                                               @elseif($item->status->id == 3)
                                               badge badge-info
                                               @elseif($item->status->id == 4)
                                               badge badge-secondary
                                               @elseif($item->status->id == 5)
                                               badge badge-success
                                               @elseif($item->status->id == 6)
                                               badge badge-danger
                                               @endif">{{$item->status->status}}
                                            </a>
                                        </td>
                                        <td>{{$item->message}}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{route('orders.detail',$item->id)}}" data-id="{{$item->id}}" class="item js_orders_item" title="detail">
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
       <!-- Modal change status-->
    <div class="modal fade" id="myModalStatus" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               
                <div class="modal-header">
                  <p class="status-id"></p>
                </div>
                    <div class="modal-body" id="md_content_status">
                        <div id="form-wrapper">
                        <form action="" method="post" id="formStatus">
                            @csrf
                            {{-- @method('PUT') --}}
                                <div id="debt-amount-slider">
                                    <input type="radio" name="status_id" id="1" value="1" required>
                                    <label for="1" data-debt-amount="chờ xử lý"></label>
                                    <input type="radio" name="status_id" id="2" value="2" required>
                                    <label for="2" data-debt-amount="đã gởi đi"></label>
                                    <input type="radio" name="status_id" id="3" value="3" required>
                                    <label for="3" data-debt-amount="đã xử lý"></label>
                                    <input type="radio" name="status_id" id="4" value="4" required>
                                    <label for="4" data-debt-amount="đang vận chuyển"></label>
                                    <input type="radio" name="status_id" id="5" value="5" required>
                                    <label for="5" data-debt-amount="đã giao hàng"></label>
                                    {{-- <input type="radio" name="status_id" id="6" value="6" required>
                                    <label for="6" data-debt-amount="hủy đơn hàng"></label> --}}
                                    <div id="debt-amount-pos"></div>
                                    
                                </div>
                        </form>
                            <button type="submit" form="formStatus">Chuyển trạng thái</button>
                        </div>
                        
                    </div>
                
            </div>
        </div>
    </div>
</div>


@endsection