<!DOCTYPE html>
<html lang="en">
  <head>
    <title> @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{{asset('') }}" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    {{-- <link href="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"> --}}
    <link rel="stylesheet" href="asset/customer/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="asset/customer/css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    
    <link rel="stylesheet" href="asset/customer/css/owl.carousel.min.css">
    <link rel="stylesheet" href="asset/customer/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="asset/customer/css/magnific-popup.css">

    <link rel="stylesheet" href="asset/customer/css/aos.css">

    <link rel="stylesheet" href="asset/customer/css/ionicons.min.css">

    <link rel="stylesheet" href="asset/customer/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="asset/customer/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="asset/customer/css/flaticon.css">
    <link rel="stylesheet" href="asset/customer/css/icomoon.css">
    <link rel="stylesheet" href="asset/customer/css/style.css">
  </head>
  <body class="goto-here">
		{{-- <div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">youremail@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div> --}}
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
   <div class="container">
      
      <a class="navbar-brand" href="index.html">
         <div class="stage">
            <div class="wrapper">
                <div class="slash"></div>
                <div class="sides">
                    <div class="side"></div>
                    <div class="side"></div>
                    <div class="side"></div>
                    <div class="side"></div>
                </div>
                <div class="textx">
                    <div class="text--backing">tanlee</div>
                    <div class="text--left">
                        <div class="inner">tanlee</div>
                    </div>
                    <div class="text--right">
                        <div class="inner">tanlee</div> 
                    </div>
                </div>
            </div>
        </div>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span>
      </button>
      
      
      <div class="collapse navbar-collapse" id="ftco-nav">
         <div class="dropdown" >
            <button class="btn btn-success button-city dropdown-toggle" type="button" data-toggle="dropdown" style="width: 240px;">
               @if (isset($province_now))
               {{$province_now->name}}
               @else 
               Cần thơ
               @endif
            <span class="caret"></span></button>
            <ul class="dropdown-menu" >
               @foreach ($province as $province)
            <li><a href="{{route('showhome',$province->id)}}">{{$province->name}}</a></li>
                  @foreach ($province->district as $districts)
                  {{-- <li><a href="#">{{$item->name}}</a></li> --}}
                     @foreach ($districts->ward as $wards)
                        @foreach ($wards->address as $item)
                           
                        @endforeach
                     @endforeach
                  @endforeach
               @endforeach
              
             
            </ul>
          </div>
         <ul class="navbar-nav ml-auto">
            <li class="nav-item">  
                            
            </li>
            <li class="nav-item">
               
            </li>
            
            <li class="nav-item {{ Route::is('showhome') ? 'active' : null }}"><a href="{{route('showhome','$province_now->id')}}" class="nav-link">Home</a></li>
            <li class="nav-item">
               <a href="" class="nav-link">Blog</a>
               <div class="cart-hover ">
                  <div >
                     <div class="select-items">
                        <table>
                           <tbody>
                           </tbody>
                        </table>
                     </div>
                     <div class="select-total">
                        <span>total:</span>
                        @if (Session::has("Cart") != null)
                        <h5>{{ number_format(Session::get("Cart")->totalPrice).' '.'VNĐ'}}</h5>
                        @endif
                     </div>
                  </div>
                  <div class="select-button">
                     <a href="" class="primary-btn view-card">VIEW CARD</a>
                     <a href="" class="primary-btn checkout-btn">CHECK OUT</a>
                  </div>
               </div>
            </li>
           
            <li class="nav-item"><a href="{{route('shop.show',$province_now->id)}}" class="nav-link {{ Route::is('shop.show') ? 'active' : null }} ">Shop</a></li>
            {{-- <li class="nav-item"><a href="{{route('food')}}" class="nav-link {{ Route::is('food') ? 'active' : null }}">FOOD</a></li> --}}
            <li class="nav-item">
               <a  class="nav-link">Search</a>
               <div class="cart-hover ">
                  <div >
                     <div class="select-items">
                        <form class="form-inline  my-2 my-lg-0">
                           <input class="form-control form-search mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                     </div>
                  
                  </div>
               </div>
            </li>
            @if(isset(Auth::user()->id)&& Auth::user()->permission_id ==3)
            <li class="nav-item">
               <a href="cart.html" class="nav-link"><img src="@if(Auth::user()->img != null) {{Auth::user()->img}} @else asset/admin/images/icon/avatar-01.jpg @endif" alt="John Doe" width="30" height="30" /></a>
               <span ><a href="" class="">hi, {{Auth::user()->first_name}}</a></span> 
               <div class="cart-hover profile-user">
                  <div >
                     <div class="select-total">
                        <ul>
                           <li><a href="" class="dropdown-item">Thông tin cá nhân</a> </li>
                           <li><a href="" class="dropdown-item">Lịch sử mua hàng</a> </li>
                           <li><a href="" class="dropdown-item">Chi Tiết giỏ hàng</a> </li>
                           <li><a class="dropdown-item" href="{{ route('logout') }}"> Logout </a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="select-button">
                  </div>
               </div>
            </li>
            @else 
            <li class="nav-item"><a href="{{route('login.form')}}" class="nav-link">Login</a></li>
            @endif
            <li class="nav-item">
               <a href="{{route('cart')}}" class="nav-link"><i class="icon-shopping_cart"></i>
               @if (Session::has("Cart") != null)
               <span id="QuantyCartShow">{{Session::get("Cart")->totalQuanty}}</span>
               @else
               <span id="QuantyCartShow">0</span>
               @endif
               </a>
               <div class="cart-hover">
                  <div id="change-item-cart">
                     <div class="select-items">
                        <table>
                           <tbody>
                              @if (Session::has("Cart") != null)
                              @foreach (Session::get("Cart")->food as $item)
                              <tr>
                                 <td class="si-pic"><img
                                    src="{{$item['foodInfo']->img}}"
                                    width="60" height="60" alt=""></td>
                                 <td class="si-text">
                                    <div class="food-selected">
                                       <h6>{{$item['foodInfo']->name}}</h6>
                                       <p>{{ number_format($item['foodInfo']->price).' '.'VNĐ'}}
                                          x {{$item['quanty']}}
                                       </p>
                                    </div>
                                 </td>
                                 <td class="si-close">
                                    <i class="far fa-trash-alt"
                                       data-id="{{$item['foodInfo']->id}}"></i>
                                 </td>
                              </tr>
                              @endforeach
                              @endif
                           </tbody>
                        </table>
                     </div>
                     <div class="select-total">
                        <span>total:</span>
                        @if (Session::has("Cart") != null)
                        <h5>{{ number_format(Session::get("Cart")->totalPrice).' '.'VNĐ'}}</h5>
                        @endif
                     </div>
                  </div>
                  <div class="select-button">
                     <a href="{{route("cart")}}" class="primary-btn view-card">VIEW CARD</a>
                     <a href="" class="primary-btn checkout-btn">CHECK OUT</a>
                  </div>
               </div>
            </li>
         </ul>
      </div>
      
   </div>
</nav>
    <!-- END nav -->