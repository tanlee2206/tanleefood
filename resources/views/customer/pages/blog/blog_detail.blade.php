@extends('customer.layouts.master')

@section('title')
		tanlee food
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
        <div class="col-lg-10 ftco-animate">
            <h2 class="mb-3" style="font-size: 25px;font-weight: 500;font-family: system-ui; ">{{$news->title}}</h2>
          <p style="margin-bottom: 4rem;     font-style: italic;">{{date("d/m/Y h:i a", strtotime($news->created_at))}} </p>
          <p>{!!$news->content!!}</p>
        </div> <!-- .col-md-8 -->
      </div>
    </div>
</section> 
@endsection