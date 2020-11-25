@extends('customer.layouts.master')

@section('title')
		Trang chủ
@endsection
@section('content')
<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
       <div class="slider-item" style="background-image: url(asset/customer/images/bg_1.jpg);">
          <div class="overlay"></div>
          <div class="container">
             <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                <div class="col-md-12 ftco-animate text-center">            
                   <h1 class="mb-2">welcome to Tan lee food</h1>
                   <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2> 
                  {{-- <p><a href="#" class="btn btn-primary">View Details</a></p> --}}
                   <div class="row justify-content-center">
                     <div class="col-md-10 mb-5 text-center">
                         <ul class="product-category">
                             <li><a href="#" class="active">All</a></li>
                             @foreach ($category as $item) 
                         <li><a href="{{URL::to($province_now->id.'/shop/'.$item->slug)}}" >{{$item->name}}</a></li>
                             @endforeach
                         </ul>
                     </div>
                 </div>
                </div>
             </div>
          </div>
       </div>
       <div class="slider-item" style="background-image: url(asset/customer/images/bg_2.jpg);">
          <div class="overlay"></div>
          <div class="container">
             <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
               <div class="col-md-12 ftco-animate text-center">            
                  <h1 class="mb-2">welcome to Tan lee food</h1>
                  <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2> 
                 {{-- <p><a href="#" class="btn btn-primary">View Details</a></p> --}}
                  <div class="row justify-content-center">
                    <div class="col-md-10 mb-5 text-center">
                        <ul class="product-category">
                            <li><a href="#" class="active">All</a></li>
                            @foreach ($category as $item) 
                        <li><a href="{{URL::to($province_now->id.'/shop/'.$item->slug)}}" >{{$item->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
               </div>
             </div>
          </div>
       </div>
    </div>
</section>
 <section class="ftco-section" style="padding-bottom : 0" data-aos="fade-right">
    <div class="container">
		<div class="row no-gutters ftco-services">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Free Shipping</h3>
                <span>On order over $100</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-diet"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Always Fresh</h3>
                <span>Product well package</span>
              </div>
            </div>    
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-award"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Superior Quality</h3>
                <span>Quality Products</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Support</h3>
                <span>24/7 Support</span>
              </div>
            </div>      
          </div>
        </div>
	</div>
 </section>
 <section class="ftco-section ftco-category ftco-no-pt mt-20">
   <div class="container">
      <div class="row">
         <div class="col-md-8">
            <div class="row">
               <div class="col-md-6 order-md-last align-items-stretch d-flex" data-aos="fade-up" >
                  <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(asset/customer/images/category.jpg);">
                     <div class="text text-center">
                        <h2>Vegetables</h2>
                        <p>Protect the health of every home</p>
                        <p><a href="#" class="btn btn-primary">Shop now</a></p>
                     </div>
                  </div>
               </div>
               <div class="col-md-6" data-aos="fade-right" >
                  <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(asset/customer/images/category-1.jpg);">
                     <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="#" class="food-hot">ưu đãi</a></h2>
                     </div>
                  </div>
                  <div  class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(asset/customer/images/category-2.jpg);">
                     <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="#" class="what-food">hôm nay ăn gì</a></h2>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         

         <div class="col-md-4" data-aos="fade-left" >
            <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(asset/customer/images/category-3.jpg);">
               <div class="text px-3 py-1">
                  <h2 class="mb-0"><a href="#" class="food-new">cửa hàng mới</a></h2>
               </div>		
            </div>
            <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(asset/customer/images/category-4.jpg);">
               <div class="text px-3 py-1">
                  <h2 class="mb-0"><a href="#" >hôm nay ăn gì?</a></h2>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
 <section class="ftco-section section-hot" style="padding-top: 0px;padding-bottom: 0px;">
    <div class="container">
       <div class="row justify-content-center mb-5 " data-aos="zoom-in">
         <div class="col-md-7 heading-section ftco-animate text-center" >
            <h2 class="subheading">Ưu đãi cho bạn</h2>
            <p>nhiều cửa hàng có khuyến mãi đang chờ đón bạn</p>
         </div>
       </div>
    </div>
    <div class="container">
       <div class="row">
         @foreach ($shop as $item)    
         <div class="col-md-6 col-lg-3 ftco-animate">
             <div class="product">
             <a href="{{URL::to($province_now->id.'/shop-single/'.$item->slug)}}" class="img-prod">
                 <img class="img-fluid" src="@if($item->img != null) {{$item->img}} @else asset/admin/images/image-placeholder.jpg @endif"
                         alt="Colorlib Template">
                     <span class="status">sale</span>
                     <div class="overlay"></div>
                 </a>
                 <div class="text py-3 pb-4 px-3 text-center">
                 <h3><a href="{{URL::to($province_now->id.'/shop-single/'.$item->slug)}}">{{Str::limit($item->name,20)}}</a></h3>
                     <div class="d-flex">
                         <div class="">
                             {{-- <p class="x">{!! $item->address->address_detail !!}, {{$item->address->ward->name}},
                                 {{$item->address->ward->district->name}}, {{$item->address->ward->district->province->name}}</p>
                             <p class="">{!! Str::limit($item->description,26) !!}</p> --}}
                             <p>
                                 {!! $item->address->address_detail !!}
                             </p>
                         </div>
                     </div> 
                 </div>
             </div>
         </div>
         @endforeach
       </div>
    </div>
 </section>
 <section class="ftco-section testimony-section section-new" style="padding-top: 0px; margin-top:30px">
   <div class="container">
      <div class="row justify-content-center mb-5 " data-aos="zoom-in">
         <div class="col-md-7 heading-section ftco-animate text-center" >
            <h2 class="subheading">Cửa hàng mới</h2>
            <p>tất cả cửa hàng mới xuất hiện trên tanlee food</p>
         </div>
      </div>
      <div class="row ftco-animate">
         <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
               @foreach ($shop as $item)
                 <div class="item">
                  <div class="testimony-wrap p-4 pb-5">
                     <div class="user-img mb-3" style="background-image: url({{$item->img}})">
                        <span class="quote d-flex align-items-center justify-content-center">
                        <img src="asset/customer/images/new.gif" alt="">
                        </span>
                     </div>
                     <div class="text text-center">
                        <a class="name mb-3" href="{{URL::to($province_now->id.'/shop-single/'.$item->slug)}}">{{$item->name}}</a>
                        {{-- <p class="name mb-3">{{$item->name}}</p> --}}
                        <p class=" pl-4 line">{{$item->address->address_detail}},{{$item->address->ward->name}},
                          {{$item->address->ward->district->name}},{{$item->address->ward->district->province->name}}</p>
                        
                       
                     </div>
                  </div>
               </div>
               @endforeach
              
            </div>
         </div>
      </div>
   </div>
 </section>
 <section class="ftco-section section-what" style="padding-top: 0px;">
   <div class="container">
      <div class="row justify-content-center mb-5 " data-aos="zoom-in">
        <div class="col-md-7 heading-section ftco-animate text-center" >
           <h2 class="subheading">Hôm nay ăn gì ?</h2>
           <p>có thật nhiều món ăn ngon đang chờ bạn phía trước</p>
        </div>
      </div>
   </div>
   <div class="container">
      <div class="row">
        @foreach ($shop as $item)    
        <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
            <a href="{{URL::to($province_now->id.'/shop-single/'.$item->slug)}}" class="img-prod">
                <img class="img-fluid" src="@if($item->img != null) {{$item->img}} @else asset/admin/images/image-placeholder.jpg @endif"
                        alt="Colorlib Template">
                    <span class="status">sale</span>
                    <div class="overlay"></div>
                </a>
                <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="{{URL::to($province_now->id.'/shop-single/'.$item->slug)}}">{{Str::limit($item->name,20)}}</a></h3>
                    <div class="d-flex">
                        <div class="">
                            {{-- <p class="x">{!! $item->address->address_detail !!}, {{$item->address->ward->name}},
                                {{$item->address->ward->district->name}}, {{$item->address->ward->district->province->name}}</p>
                            <p class="">{!! Str::limit($item->description,26) !!}</p> --}}
                            <p>
                                {!! $item->address->address_detail !!}
                            </p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        @endforeach
      </div>
   </div>
</section>
 <section class="ftco-section img" style="background-image: url(asset/customer/images/bg_3.jpg);">
    <div class="container">
       <div class="row justify-content-end">
          <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
             <span class="subheading">Giá tốt nhất cho bạn</span>
             <h2 class="mb-4">Chương trình khuyến mãi</h2>
             {{-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> --}}
             <h3><a href="#">đồng giá</a></h3>  
               <div class="main-content">
                  <div class="item button-jittery">
                     <button>Click Me!</button>
                  </div>
                  {{-- <div class="item button-pulse" style="--bg-color: #e67e22">
                     <div class="button__wrapper">
                        <div class="pulsing"></div>
                        <button>Click Me!</button>
                     </div>
                     <div class="name">Dubstep</div>
                  </div>
                  <div class="item button-typewriter" style="--bg-color: #e74c3c">
                     <div class="button__wrapper">
                        <button>
                           <p>Click Me!</p>
                        </button>
                     </div>
                     <div class="name">Typewriter</div>
                  </div>
                  <div class="item button-pressure" style="--bg-color: #9b59b6">
                     <button>Click Me!
                        <marquee scrollamount="12"><span>Your friends would do it.</span><span>Your mum would be proud.</span><span>Your partner would be so happy.</span><span>Your cat would love you for it.</span></marquee>
                     </button>
                     <div class="name">Social Pressure</div>
                  </div>
                  <div class="item button-hand" style="--bg-color: #3498db">
                     <button>Click Me!
                        <div class="hands"></div>
                     </button>
                     <div class="name">Handsy</div>
                  </div>
                  <div class="item button-100" style="--bg-color:#2ecc71">
                     <button>Click Me!
                        <div class="emoji"></div>
                        <div class="emoji"></div>
                        <div class="emoji"></div>
                     </button>
                     <div class="name">You're 💯</div>
                  </div>
                  <div class="item button-parrot" style="--bg-color: #2c3e50">
                     <button>Click Me!
                        <div class="parrot"></div>
                        <div class="parrot"></div>
                        <div class="parrot"></div>
                        <div class="parrot"></div>
                        <div class="parrot"></div>
                        <div class="parrot"></div>
                     </button>
                     <div class="name">Encouragement</div>
                  </div>
                  <div class="item button-rainbow" style="--bg-color: #ecf0f1">
                     <button>Click Me!
                        <div class="rainbow"></div>
                     </button>
                     <div class="name">Rainbow</div>
                  </div> --}}
               </div>
             <span class="price">giảm <a href="#">20%</a></span>
             <div id="timer" class="d-flex mt-5">
                <div class="time" id="days"></div>
                <div class="time pl-3" id="hours"></div>
                <div class="time pl-3" id="minutes"></div>
                <div class="time pl-3" id="seconds"></div>
             </div>
          </div>
       </div>
    </div>
 </section>

 <hr>
 {{-- <section class="ftco-section ftco-partner">
    <div class="container">
       <div class="row">
          <div class="col-sm ftco-animate">
             <a href="#" class="partner"><img src="asset/customer/images/partner-1.png" class="img-fluid" alt="Colorlib Template"></a>
          </div>
          <div class="col-sm ftco-animate">
             <a href="#" class="partner"><img src="asset/customer/images/partner-2.png" class="img-fluid" alt="Colorlib Template"></a>
          </div>
          <div class="col-sm ftco-animate">
             <a href="#" class="partner"><img src="asset/customer/images/partner-3.png" class="img-fluid" alt="Colorlib Template"></a>
          </div>
          <div class="col-sm ftco-animate">
             <a href="#" class="partner"><img src="asset/customer/images/partner-4.png" class="img-fluid" alt="Colorlib Template"></a>
          </div>
          <div class="col-sm ftco-animate">
             <a href="#" class="partner"><img src="asset/customer/images/partner-5.png" class="img-fluid" alt="Colorlib Template"></a>
          </div>
       </div>
    </div>
 </section> --}}
 @endsection