@extends('customer.layouts.master')

@section('title')
Thanh Toán
@endsection
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('asset/customer/images/bg_5.jpg');    padding: 4em 0;">
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
     <li class="process-step active first">
       <div class="step-wrapper">
        <span>đăng nhập</span>
       </div>
     </li>
     <li class="process-step active">
       <div class="step-wrapper">
         <span>đặt hàng</span>
       </div>
     </li>
     <li class="process-step last">
       <div class="step-wrapper">
            <span>hoàn thành</span>
       </div>
     </li>
   </ul>
 </div>
   
<section class="ftco-section">
    <div class="container">
       <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
          <form action="{{route('checkout',$province_now->id)}}" method="post" class="billing-form">
            @csrf
            <input type="text" hidden value="{{$user->id}}" name="user_id">
                <h3 class="mb-4 billing-heading">Thông tin chi tiết</h3>
                <div class="row align-items-end">
                   <div class="col-md-6">
                      <div class="form-group">
                         <label for="firstname">Tên</label>
                      <input type="text" readonly value="{{$user->first_name}}" class="form-control" placeholder="">
                      </div>
                   </div>
                   <div class="col-md-6">
                      <div class="form-group">
                         <label for="lastname">Họ</label>
                         <input type="text" readonly value="{{$user->last_name}}" class="form-control" placeholder="">
                      </div>
                   </div>
                   <div class="w-100"></div>
                   <div class="col-md-6">
                     <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" readonly value="{{$user->phone}}" name="phone" class="form-control" placeholder="">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="emailaddress">Email</label>
                        <input type="text" readonly value="{{$user->email}}"class="form-control" placeholder="">
                     </div>
                  </div>
               </div>
                  <h3 class="mb-4 billing-heading" style="margin-top: 30px;">Giao hàng đến</h3>
                  <div class="row">
                   <div class="col-md-4">
                      <div class="form-group">
                         <label for="country">Tỉnh/TP</label>
                         <div class="select-wrap">
                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select name="province" id="province" class="form-control">
                            <option value="{{$province_now->id}}">{{$province_now->name}}</option>
                            </select>
                         </div>
                      </div>
                   </div>
                   <div class="col-md-4">
                     <div class="form-group">
                        <label for="country">Quận/Huyện</label>
                        <div class="select-wrap">
                           <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                           <select name="districts" id="districts"  class="form-control">
                              <option >--quận/huyện--</option>
                              @foreach ($districts as $item)      
                              <option value="{{ $item->id }}" >{{ $item->name }}</option>
                               @endforeach
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="country">--Xã/Phường--</label>
                        <div class="select-wrap">
                           <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                           <select name="ward_id" id="wards" class="form-control">
                             <option>xã / phường</option>
                           </select>
                        </div>
                     </div>
                  </div>
                   <div class="w-100"></div>
                   <div class="col-md-12">
                      <div class="form-group">
                         <label for="streetaddress">Địa chỉ chi tiết</label>
                         <input type="text" class="form-control" value="" name="address" placeholder="">
                      </div>
                   </div>
                   <div class="w-100"></div>
                   <div class="col-md-12">
                     <div class="form-group">
                        <label for="">ghi chú</label>
                        <input type="text" class="form-control" value="" name="message" placeholder="">
                     </div>
                  </div>
                   
                </div>
           
             <!-- END -->
          </div>
          <div class="col-xl-5">
             <div class="row mt-5 pt-3">
                <div class="col-md-12 d-flex mb-5">
                   <div class="cart-detail cart-total p-3 p-md-4">
                      <h3 class="billing-heading mb-4">Tổng giỏ hàng</h3>
                           <p class="d-flex">
                              <span>Tổng tiền</span>
                              @if (Session::has("Cart") != null)
                              <span>{{ number_format(Session::get("Cart")->totalPrice).' '.'VNĐ'}}</span>
                              @else 
                              <span>0 vnd</span>
                              @endif
                           </p>
                           <p class="d-flex">
                                 <span>giảm giá</span>
                                 <span>0%</span>
                           </p>
                           <p class="d-flex">
                                 <span>phí vận chuyển</span>
                                 <span>free</span>
                           </p>
                           <hr>
                           <p class="d-flex total-price">
                                 <span>Thành tiền</span>
                                 @if (Session::has("Cart") != null)
                                 <span>{{ number_format(Session::get("Cart")->totalPrice).' '.'VNĐ'}}</span>
                                 <input type="text" hidden value="{{Session::get("Cart")->totalPrice}}" name="total">
                                 @else 
                                 <span>0 vnd</span>
                                 @endif
                                 
                           </p>
                   </div>
                </div>
                <div class="col-md-12">
                   <div class="cart-detail p-3 p-md-4">
                      <h3 class="billing-heading mb-4">Phương thức thanh toán</h3>
                      <div class="form-group">
                         <div class="col-md-12">
                            <div class="radio">
                               <label><input type="radio" name="payment_method" value="1" class="mr-2"> Thanh toán khi nhận hàng</label>
                            </div>
                         </div>
                      </div>
                      <div class="form-group">
                         <div class="col-md-12">
                            <div class="radio">
                               <label><input type="radio" name="payment_method" value="2" class="mr-2"> VNpay</label>
                            </div>
                         </div>
                      </div>
                     
         
                      <p><button type="submit" class="btn btn-primary py-3 px-4">đặt hàng</button></p>
                   </div>
                  </form>
                </div>
             </div>
          </div>
          <!-- .col-md-8 -->
       </div>
    </div>
</section>
 <!-- .section -->
@endsection