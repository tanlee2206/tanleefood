@extends('customer.layouts.master')

@section('title')
		profile
@endsection
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('asset/customer/images/bg_5.jpg');    padding: 4em 0;">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Hello</a></span></p>
            <h1 class="mb-0 bread" style="font-family: Noto Sans,Arial,sans-serif;">{{Auth::user()->first_name.' '.Auth::user()->last_name}}</h1>
            </div>
        </div>
    </div>
</div>

<div class="profile__tab">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông Tin Cá Nhân</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Lịch Sử Mua Hàng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Danh Sách Yêu Thích</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="profile__tab__desc">
                <section id="userProfile" class="ftco-section contact-section bg-light">
                    <div class="container">
                        <div class="row d-flex mb-5 contact-info">
                        {{-- <div class="w-100"></div> --}}
                        <div class="col-lg-4">
                          <div class="info  bg-white p-4">
                          <img src="{{$user->img}}" width="300" height="300" alt="">
                          </div>
                        </div>
                        <div class="col-lg-8">
                          <div class="row">
                            <div class="col-md-6 d-flex">
                              <div style="height: 160px;" class="info  bg-white p-4">
                              <p><span>Địa chỉ:</span> 
                                {{$user->address ? $user->address->address_detail.', '.$user->address->ward->name.', '.
                                $user->address->ward->district->name.', '.
                                $user->address->ward->district->province->name : 'bạn chưa nhập địa chỉ'
                                }}
                              </p>
                              </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div style="height: 160px;" class="info  bg-white p-4">
                                <p><span>Tên đăng nhập :</span> <a href="#">{{$user->login_name ? $user->login_name : 'bạn chưa có tên đăng nhập'}}</a></p>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div style="height: 160px;" class="info mt-4 bg-white p-4">
                                <p><span>Điện thoại:</span> <a href="tel://1234567920">+{{$user->phone ? $user->phone :'bạn chưa nhập điện thoại'}}</a></p>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div style="height: 160px;" class="info mt-4 bg-white p-4">
                                  <p><span>Email:</span> <a href="mailto:info@yoursite.com">{{$user->email}}</a></p>
                                </div>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      <div class="row block-9">
                        <div class="col-lg-3">
                            <button id="editProfile" class="btn btn-primary py-3 px-5">Sửa Thông Tin</button>
                        </div>
                        <div class="col-lg-3">
                            <button id="changePass" class="btn btn-primary py-3 px-5">Đổi Mật Khẩu</button>
                        </div>
                      </div>
                    </div>
                </section>
                <section id="formEditProfile" style="display: none">
                  <div class="container">
                     <div class="row justify-content-center">
                        <div class="col-xl-12 ftco-animate">
                          <div ><button style="float: left; margin-right:2rem" id="cancelProfile" class="btn btn-success"> <i class="far fa-window-close"></i></button> 
                            <h3 style="color: #29a746;font-weight: 600;font-size: 19px;" class="mb-4 billing-heading">Chỉnh sửa</h3>
                          </div>
                        <form action="{{route('updateProfileUser',$user->id)}}" method="post" class="billing-form">
                          @csrf
                          <input type="text" hidden value="{{$user->id}}" name="user_id">
                              
                              <div class="row align-items-end">
                                <div class="col-md-8">
                                 
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                         <label for="firstname">Tên</label>
                                      <input type="text" name="first_name" value="{{$user->first_name}}" class="form-control" placeholder="">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="lastname">Họ</label>
                                          <input type="text" name="last_name" value="{{$user->last_name}}" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="phone">Điện thoại</label>
                                          <input type="text" name="phone" value="{{$user->phone}}" name="phone" class="form-control" placeholder="">
                                      </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="login_name">Tên đăng nhập</label>
                                        <input type="text"  value="{{$user->login_name}}" name="login_name" class="form-control" placeholder="">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-4 {{ $errors->has('img') ? ' has-error' : '' }}">
                                  <div class="input-group form-group  ">
                                      <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn">
                                          <div id="holder" >
                                              @if ((old('img') != null))
                                              <img src="{{ old('img') }}" width="250" height="250" alt="">
                                              @else
                                              <img src="
                                              @if($user->img != null)
                                              {{ $user->img }}
                                              @else
                                              asset/admin/images/image-placeholder.jpg
                                              @endif
                                              " width="270" height="270" alt="">
                                              @endif
                                              
                                          </div>
                                        </a>
                                      </span>
                                      <input hidden id="thumbnail" class="form-control" value="
                                      @if($user->img != null)
                                      {{ $user->img }}
                                      @else
                                      asset/admin/images/image-placeholder.jpg
                                      @endif
                                      "  name="img">
                                      
                                    </div>
                                    <small class="text-danger">{{ $errors->first('img') }}</small>
                                </div>
                                <div class="col-md-12">
                                   <div class="form-group">
                                      <label for="emailaddress">Email</label>
                                      <input type="text" name="email" value="{{$user->email}}"class="form-control" placeholder="">
                                   </div>
                                </div>
                              </div>
                                <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="country">Tỉnh/TP</label>
                                       <div class="select-wrap">
                                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                          <select name="province" id="province" class="form-control">
                                             @foreach ($province_all as $prov)
                                              @if ($user->address != null)
                                              <option value="{{ $prov->id }} "{{ $user->address->ward->district->province->id == $prov->id ? 'selected':'' }} >{{ $prov->name }}</option>
                                              @else 
                                              <option value="{{ $prov->id }}" >{{ $prov->name }}</option>
                                              @endif
    
                                            @endforeach
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
                                            @if ($user->address != null)
                                            <option value="{{  $user->address->ward->district->id}} " selected>{{  $user->address->ward->district->name }}</option>  
                                            @else 
                                            <option >quận / huyện</option>  
                                            @endif
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
                                            @if ($user->address != null)
                                            <option value="{{ $user->address->ward->id}} " selected>{{  $user->address->ward->name }}</option>
                                            @else 
                                            <option >phường/ xã</option>
                                            @endif
                                         </select>
                                      </div>
                                   </div>
                                </div>
                                 <div class="w-100"></div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label for="streetaddress">Địa chỉ chi tiết</label>
                                    <input type="text" class="form-control" value="{{  $user->address ? $user->address->address_detail : ''}}" name="address" placeholder="">
                                    </div>
                                 </div>
                                 <div class="w-100"></div>      
                                 <div class="col-lg-4">
                                   <button class="btn btn-success" type="submit"> Lưu</button>
                                 </div>                           
                              </div>
                         
                           <!-- END -->
                        </div>
                        
                      </form>
                     
                     </div>
                  </div>
                </section>    
                <section id="formChangePass" style="display: none">
                  <div class="container">
                     <div class="row justify-content-center">
                        <div class="col-xl-12 ftco-animate">
                          <div ><button style="float: left; margin-right:2rem" id="cancelPass" class="btn btn-success"> <i class="far fa-window-close"></i></button> 
                            {{-- <h3 style="color: #29a746;font-weight: 600;font-size: 19px;" class="mb-4 billing-heading">Đổi mật khẩu</h3> --}}
                          </div>
                        <form action="{{route ('change.password')}}" method="post" class="billing-form">
                          @csrf
                          <input type="text" hidden value="{{$user->id}}" name="user_id">
                              
                              <div class="row align-items-end">
                                <div class="col-md-12 ">
                                 
                                  <div class="row">
                                    <div class="col-md-6 offset-md-3">
                                      <div class="form-group">
                                         <label for="firstname">Mật khẩu cũ</label>
                                      <input type="password" name="current_password" value="" class="form-control" placeholder="********">
                                      </div>
                                      <div class="form-group">
                                          <label for="firstname">Mật khẩu mới</label>
                                      <input type="password" name="new_password" value="" class="form-control" placeholder="********">
                                      </div>
                                      <div class="form-group">
                                          <label for="firstname">nhập lại mât khẩu </label>
                                      <input type="password" name="new_confirm_password" value="" class="form-control" placeholder="********">
                                      </div>
                                      <div class="form-group">
                                        <button class="btn btn-success" style="margin-top: 32px; padding: 14px;" type="submit"> Xác nhận</button>
                                      </div>
                                      
                                    </div>
                                     
                                  </div>
                                </div>
                              </div>                         
                           <!-- END -->
                        </div>
                        
                      </form>
                     
                     </div>
                  </div>
                </section>        
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="profile__tab__desc">
                <section class=" ftco-cart">
                    <div class="container">
                        <div class="row">
                        <div class="col-md-12 ftco-animate">
                            <div class="history_orders">
                                @foreach ($orders as $orders)
                                  <table class="table mb-4">
                                    <div class="orders-title">
                                     <span class="span-orders"> Đơn hàng :#{{$orders->id}} </span>
                                      <span class="span-orders" > {{'ngày : '.date("d-m-Y h:i a", strtotime($orders->created_at))}}
                                      </span>
                                      <span class="{{$orders->status->lable}}" >{{$orders->status->status}}</span>
                                    </div>
                                    <thead class="thead-primary thead-orders">
                                      <tr class="text-center">
                                       <th>stt</th>
                                       <th>hình ảnh</th>
                                       <th>tên món</th>
                                       <th>giá</th>
                                       <th>số lượng</th>
                                       <th>tổng tiền</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($orders->orders_item as $key => $item)
                                        <tr class="text-center">
                                          <td class="product-remove"><a href="#">{{$key+1}}</span></a></td>
                                          
                                          <td class="image-prod"><div class="img" style="background-image:url(asset/customer/images/product-3.jpg);"></div></td>
                                          
                                          <td class="product-name">
                                            <h3>{{$item->food->name}}</h3>
                                              
                                          </td>
                                          
                                          <td class="price">{{$item->food->price}}</td>
                                          
                                          <td class="quantity">
                                            <div class="input-group mb-3">
                                              <input type="text" name="quantity" readonly class="quantity form-control input-number" value="{{$item->number}}" min="1" max="100">
                                            </div>
                                          </td>
                                          
                                         <td class="total">{{$item->amount}}</td>
                                        </tr><!-- END TR-->
                                      @endforeach

                                    </tbody>
                                </table>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
               
            </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="profile__tab__desc">
              <section class="ftco-section " >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="cart-list" >
                                <table class="table">
                                    <thead class="thead-primary">
                                        <tr class="text-center">
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                            <th>Cửa hàng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($shop_wl as $item)
                                        <tr class="text-center">
                                            <td class="product-remove"><span class="ion-ios-close"></span></td>
                                            <td class="product-name">
                                              <a href="{{URL::to($province_now->id.'/shop-single/'.$item->shop->slug)}}"><h3>{{$item->shop->name}}</h3></a>
                                            </td>
                                            <td class="image-prod">
                                                <div class="img" style="background-image:url({{$item->shop->img}});"></div>
                                            </td>
            
                                            {{-- <td class="product-name">
                                                
                                                {{-- <p>{{$item['foodInfo']->shop->name}}</p> --}}
                                            </td> --}}
                                           
                                        </tr><!-- END TR-->
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-6 mt-5 cart-wrap ">
                            <div class="cart-total mb-3">
                                <h3>Mã giảm giá</h3>
                                <p>Nhập mã giảm giá nếu bạn có 1</p>
                                <form action="#" class="info">
                                    <div class="form-group">
                                        <label for="">Mã giảm giá</label>
                                        <input type="text" class="form-control text-left px-3" placeholder="">
                                    </div>
                                </form>
                            </div>
                            <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
                        </div>
                        <div class="col-lg-6 mt-5 cart-wrap ">
                            <div class="cart-total mb-3">
                                <h3>Tổng giỏ hàng</h3>
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
                                    @else 
                                    <span>0 vnd</span>
                                    @endif
                                    
                                </p>
                            </div>
                        <p><a href="{{route('checkout.confirm',$province_now->id)}}" class="btn btn-primary py-3 px-4">Tiến hành thanh toán</a></p>
                        </div>
                    </div>
                </div>
              </section>
            </div>
        </div>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
     $('#lfm').filemanager('image');
</script>
@endsection