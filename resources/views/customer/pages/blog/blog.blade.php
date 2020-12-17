@extends('customer.layouts.master')

@section('title')
		profile
@endsection
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('asset/customer/images/bg_5.jpg');  padding: 2em 0;">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Blog</span></p>
          <h1 class="mb-0 bread">Blog</h1>
        </div>
      </div>
    </div>
</div>

<section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 ftco-animate">
          <div class="row">
            @foreach ($news as $item)
            <div class="col-md-12 d-flex ftco-animate">
              <div class="blog-entry align-self-stretch d-md-flex">
                <a href="blog-single.html" class="block-20" style="background-image: url({{$item->img}});">
                </a>
                <div class="text d-block pl-md-4">
                    <div class="meta mb-3">
                    <div><a href="#">{{date("d/m/Y h:i a", strtotime($item->created_at))}} </a></div>
                    <div><a href="#">Admin</a></div>
                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                  </div>
                  <h3 class="heading"><a href="#">{{$item->title}}</a></h3>
                  <p></p>
                <p><a href="{{URL::to($province_now->id.'/blog-detail/'.$item->slug)}}" class="btn btn-primary py-2 px-3">Đọc thêm</a></p>
                </div>
              </div>
            </div>
            @endforeach
                
          </div>
        </div> <!-- .col-md-8 -->
      </div>
    </div>
</section> <!-- .section -->
@endsection