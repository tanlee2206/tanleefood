@extends('customer.layouts.master')

@section('title')
		SHOP
@endsection
@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('asset/customer/images/bg_4.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>shop</span></p>
                <h1 class="mb-0 bread">shop</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <li><a href="#" class="active">All</a></li>
                    @foreach ($category as $item) 
                <li><a href="{{URL::to($province_now->id.'/shop/'.$item->id)}}" >{{$item->name}}</a></li>
                    @endforeach
                 
                </ul>
            </div>
        </div>
        <div class="row">
            
            @foreach ($shop as $item)    
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                <a href="{{URL::to($province_now->id.'/shop-single/'.$item->slug)}}" class="img-prod"><img class="img-fluid" src="{{$item->img}}"
                            alt="Colorlib Template">
                        <span class="status">30%</span>
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                    <h3><a href="">{{$item->name}}</a></h3>
                        <div class="d-flex">
                            <div class="">
                                <p class="x">{{$item->address->address_detail}}, {{$item->address->ward->name}},
                                    {{$item->address->ward->district->name}}, {{$item->address->ward->district->province->name}}</p>
                                <p class="">{!! Str::limit($item->description,26) !!}</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="pricing">
                                {{-- <p class="price"><span class="mr-2 price-dc">$120.00</span><span --}}
                                        {{-- class="price-sale">{{$item->address_id}} vnd</span></p> --}}
                            </div>
                        </div>
                        {{-- <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                <a href="#"
                                    class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                    <span><i class="ion-ios-menu"></i></span>
                                </a>
                                <a onclick="AddCart({{$item->id}})" href="javascript:" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                    <span><i class="ion-ios-cart"></i></span>
                                </a>
                                <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                    <span><i class="ion-ios-heart"></i></span>
                                </a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    {{-- <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul> --}}
                    {{$shop->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection