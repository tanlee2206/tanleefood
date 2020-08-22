<!DOCTYPE html>
<html lang="en">
  <head>
    <title> @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="asset/customer/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="asset/customer/css/animate.css">
    
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
	      <a class="navbar-brand" href="index.html">Tanlee Food</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
              
               <li class="nav-item">
                  
               </li>
               <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                   <div class="cart-hover">
                     <div >
                        <div class="select-items">
                           <table>
                              <tbody>
                                 @if (Session::has("Cart") != null)
                                 @foreach (Session::get("Cart")->products as $item)
                                 <tr>
                                    <td class="si-pic"><img
                                       src="{{$item['productInfo']->img}}"
                                       width="60" height="60" alt=""></td>
                                    <td class="si-text">
                                       <div class="product-selected">
                                          <p>{{ number_format($item['productInfo']->price).' '.'VNĐ'}}
                                             x {{$item['quanty']}}
                                          </p>
                                          <h6>{{$item['productInfo']->name}}</h6>
                                       </div>
                                    </td>
                                    <td class="si-close">
                                       <i class="far fa-trash-alt"
                                          data-id="{{$item['productInfo']->id}}"></i>
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
                        <a href="" class="primary-btn view-card">VIEW CARD</a>
                        <a href="" class="primary-btn checkout-btn">CHECK OUT</a>
                     </div>
                  </div>
              </li>
	          
              <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a>
               <div class="cart-hover ">
                  <div >
                     <div class="select-items">
                        <table>
                           <tbody>
                              @if (Session::has("Cart") != null)
                              @foreach (Session::get("Cart")->products as $item)
                              <tr>
                                 <td class="si-pic"><img
                                    src="{{$item['productInfo']->img}}"
                                    width="60" height="60" alt=""></td>
                                 <td class="si-text">
                                    <div class="product-selected">
                                       <p>{{ number_format($item['productInfo']->price).' '.'VNĐ'}}
                                          x {{$item['quanty']}}
                                       </p>
                                       <h6>{{$item['productInfo']->name}}</h6>
                                    </div>
                                 </td>
                                 <td class="si-close">
                                    <i class="far fa-trash-alt"
                                       data-id="{{$item['productInfo']->id}}"></i>
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
                     <a href="" class="primary-btn view-card">VIEW CARD</a>
                     <a href="" class="primary-btn checkout-btn">CHECK OUT</a>
                  </div>
               </div>
              </li>
              <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>

              @if(isset(Auth::user()->name))
              <li class="nav-item"><a href="cart.html" class="nav-link"><img src="@if(Auth::user()->img != null) {{Auth::user()->img}} @else asset/admin/images/icon/avatar-01.jpg @endif" alt="John Doe" width="30" height="30" /></a>
               <span ><a href="" class="">hi, {{Auth::user()->name}}</a></span> 
               <div class="cart-hover profile-user">
                    <div >
                       <div class="select-total">
                          <ul>
                             <li><a href="">Thông tin cá nhân</a> </li>
                             <li><a href="">Lịch sử mua hàng</a> </li>
                             <li><a href="">Giỏ hàng</a> </li>
                          <li><a href="{{route('logout')}}">Đăng xuất</a> </li>
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
              <li class="nav-item"><a href="cart.html" class="nav-link"><i class="icon-shopping_cart"></i><span>0</span></a>
                <div class="cart-hover">
                    <div id="change-item-cart">
                       <div class="select-items">
                          <table>
                             <tbody>
                                @if (Session::has("Cart") != null)
                                @foreach (Session::get("Cart")->products as $item)
                                <tr>
                                   <td class="si-pic"><img
                                      src="{{$item['productInfo']->img}}"
                                      width="60" height="60" alt=""></td>
                                   <td class="si-text">
                                      <div class="product-selected">
                                         <p>{{ number_format($item['productInfo']->price).' '.'VNĐ'}}
                                            x {{$item['quanty']}}
                                         </p>
                                         <h6>{{$item['productInfo']->name}}</h6>
                                      </div>
                                   </td>
                                   <td class="si-close">
                                      <i class="far fa-trash-alt"
                                         data-id="{{$item['productInfo']->id}}"></i>
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
                       <a href="" class="primary-btn view-card">VIEW CARD</a>
                       <a href="" class="primary-btn checkout-btn">CHECK OUT</a>
                    </div>
                 </div>
              </li>
             
              

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->