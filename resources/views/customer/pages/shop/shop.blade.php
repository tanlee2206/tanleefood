@extends('customer.layouts.master')

@section('title')
		SHOP
@endsection
@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('asset/customer/images/bg_4.jpg');padding-bottom: 0rem;padding-top: 2rem;">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>shop</span></p>
                <h1 class="mb-0 bread">shop</h1>
                <div class="row justify-content-center">
                    <div class="col-md-12 mb-5 text-center">
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

<section class="ftco-section">
    <div class="container">
        
        <div class="row">
            
            @foreach ($shop as $item)    
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                <a href="{{URL::to($province_now->id.'/shop-single/'.$item->slug)}}" class="img-prod">
                    <img class="img-fluid" src="@if($item->img != null) {{$item->img}} @else asset/admin/images/image-placeholder.jpg @endif"
                            alt="Colorlib Template">
                        <span class="status">30%</span>
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 " style=" text-align: justify;">
                    <h3><a href="">{{$item->name}}</a></h3>
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
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    {{$shop->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection