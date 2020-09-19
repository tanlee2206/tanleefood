@extends('customer.layouts.master')

@section('title')
		SHOP
@endsection
@section('content')
{{-- {{dd($shop)}} --}}
<section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 ftco-animate introduce">
          <div class="row">
            <div class="col-lg-5">
              <div class="grid-wrapper">
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <img class="zoom-image " src="{{$shop->img}}" alt="" >
              </div>
            </div>
            <div class="col-lg-7">
              <h2 class="mb-3">{{$shop->name}}</h2>
              <div class="rating d-flex">
                  <p class="text-left mr-4">
                    <a href="#" class="mr-2">5.0</a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                  </p>
                  <p class="text-left mr-4">
                    <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
                  </p>
                  <p class="text-left">
                    <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                  </p>
              </div>
              <p>Lorem ipsum dot. rro aolore perferendis, enim praesentium omnis, iste doloremque quia officia optio deserunt molestiae voluptates soluta architecto tempora.</p>
              <p>Molestiae cupiditata incidunt rem assumenda evenietlore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!</p>
              <div class="tag-widget post-tag-container mb-5 mt-5">
                <div class="tagcloud">
                  <a href="#" class="tag-cloud-link">Life</a>
                  <a href="#" class="tag-cloud-link">Sport</a>
                  <a href="#" class="tag-cloud-link">Tech</a>
                  <a href="#" class="tag-cloud-link">Travel</a>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- .col-md-8 -->
      </div>
    </div>
    <div class="container-fluid shop-body">
      <div class="container">
        <div class="col-lg-12 sidebar ftco-animate">
          <div class="row">
            <div class="col-lg-12 search-panel">
              <form action="#" class="search-form">
                <div class="row">
                  <div class="sidebar-box col-lg-7">
                    <div class="form-group">
                      <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                  </div>
                  <div class="sidebar-box col-lg-5">
                      <div class="form-group">
                        <span class="icon ion-ios-search"></span>
                        <input type="text" class="form-control" placeholder="Search...">
                      </div>
                  </div>
               </div>
              </form>
            </div>
            <div class="col-lg-7" style="padding-left: 0;">
              <div class="food-panel" id="style-5">
                 <div class="row">
                   @foreach ($foods as $item)
                   <div class="col-lg-12 food-panel-item">
                     <div class="row">
                        <div class="shop-single-food__img col-lg-2 zoom-box ">
                          <img src="{{$item->img}}" class="image" width="70" height="70" alt="Image placeholder" >
                          @if ($item->sale > 0)
                        <span class="blob btn btn-danger">sale {{$item->sale}}%</span>
                          @endif
                        </div>
                        <div class="shop-single-food__name col-lg-6">
                          <h3>{{$item->name}}</h3>
                          <p>{!! Str::limit($item->description,30) !!}</p>
                          
                        </div>
                        <div class="shop-single-food__price col-lg-4">
                          <div class="row">
                           <div class="col-lg-8">
                             
                             @if ($item->sale > 0)
                              <h4>{{number_format($item->price - ($item->price)*($item->sale)/100 ,0)}} vnd</h4>
                              <h3>{{number_format($item->price,0)}} vnd</h3>
                              
                             @else
                             <h4>{{number_format($item->price,0)}} vnd</h4>
                             @endif
                            
                          </div>
                           <div type="col-lg-4" class="buy-button">
                              <a onclick="AddCart({{$item->id}})" href="javascript:" >+</a>
                             
                           </div>
                          </div>
                          
                        </div>
                     </div>
                    
                  </div>
                     
                   @endforeach
                    
                 </div>
              </div>
                
            </div>
            <div class="col-lg-5 comment-panel">
              <div class="">
                <h3 class="mb-5"></h3>
                <ul class="comment-list">
                  <li class="comment">
                    <div class="vcard bio">
                      <img src="asset/customer/images/person_1.jpg" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                      <h3>John Doe</h3>
                      <span class="meta">June 27, 2018 at 2:21pm</span>
                      <p>sam impedipedit necessitatibus, nihil?</p>
                      <p><a href="#" class="reply">Reply</a></p>
                    </div>
                  </li>
                  <li class="comment">
                    <div class="vcard bio">
                      <img src="asset/customer/images/person_1.jpg" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                      <h3>John Doe</h3>
                      <div class="meta">June 27, 2018 at 2:21pm</div>
                      <p>Lorem ipsu ipsam impedit vitaeamit necessitatibus, nihil?</p>
                      <p><a href="#" class="reply">Reply</a></p>
                    </div>
                  </li>
                </ul>
                <!-- END comment-list -->
                
                <div class="comment-form-wrap ">
                  <form action="#" class="">
                    <div class="form-group">
                      <textarea name="" id="message" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-secondary">
                    </div>
    
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 sidebar-box ftco-animate">
              <h3 class="heading">Categories</h3>
            <ul class="categories">
              <li><a href="#">Vegetables <span>(12)</span></a></li>
              <li><a href="#">Fruits <span>(22)</span></a></li>
              <li><a href="#">Juice <span>(37)</span></a></li>
              <li><a href="#">Dries <span>(42)</span></a></li>
            </ul>
        </div>
  
        <div class="col-lg-12 sidebar-box ftco-animate">
            <h3 class="heading">Recent Blog</h3>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(asset/customer/images/image_1.jpg);"></a>
              <div class="text">
                <h3 class="heading-1"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(asset/customer/images/image_2.jpg);"></a>
              <div class="text">
                <h3 class="heading-1"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(asset/customer/images/image_3.jpg);"></a>
              <div class="text">
                <h3 class="heading-1"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
        </div>
  
        <div class="col-lg-12 sidebar-box ftco-animate">
            <h3 class="heading">Tag Cloud</h3>
            <div class="tagcloud">
              <a href="#" class="tag-cloud-link">fruits</a>
              <a href="#" class="tag-cloud-link">tomatoe</a>
              <a href="#" class="tag-cloud-link">mango</a>
              <a href="#" class="tag-cloud-link">apple</a>
              <a href="#" class="tag-cloud-link">carrots</a>
              <a href="#" class="tag-cloud-link">orange</a>
              <a href="#" class="tag-cloud-link">pepper</a>
              <a href="#" class="tag-cloud-link">eggplant</a>
            </div>
        </div>
  
        <div class="col-lg-12 sidebar-box ftco-animate">
            <h3 class="heading">Paragraph</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
        </div>
      </div>
    </div>
    <div class="container shop-body">
          
    </div>



</section> <!-- .section -->
@endsection