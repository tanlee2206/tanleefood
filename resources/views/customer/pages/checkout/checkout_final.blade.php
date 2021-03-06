@extends('customer.layouts.master')

@section('title')
Thanh Toán
@endsection
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('asset/customer/images/bg_2.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
          <h1 class="mb-0 bread">Checkout</h1>
        </div>
      </div>
    </div>
</div>
<div class="process-wrapper">
   <ul class="process-list">
     <li class="process-step first active">
       <div class="step-wrapper">
        <span>đăng nhập</span>
       </div>
     </li>
     <li class="process-step active ">
       <div class="step-wrapper">
         <span>đặt hàng</span>
       </div>
     </li>
     <li class="process-step active last">
       <div class="step-wrapper">
            <span>hoàn thành</span>
       </div>
     </li>
   </ul>
 </div>
 <div class="container">
   <div>
    {{-- @if(session('message')) --}}
    <div class="toast toast-success">
        <div class="icon__holder">
          <i class="fas fa-check"></i>
        </div>
        <div class="text">
          <h5>thành công</h5>
          <p>{{'Đặt hàng thành công, bạn có thể xem lại đơn hàng trong lịch sử mua hàng'}}</p>
        </div>
        <div class="close">
          <i class="fas fa-eye"></i>
        </div>
      </div>
    {{-- @endif --}}
   </div>
 </div>
@endsection