@extends('customer.layouts.master')

@section('title')
		Bộ lộc
@endsection
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('asset/customer/images/bg_5.jpg');    padding: 2em 0;">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> </p>
          <h1 class="mb-0 bread" style="font-family: system-ui;">Bộ Lọc</h1>
        </div>
      </div>
    </div>
</div>
<div class="container-fluid shop-body">
  <div class="container-fuild">
    <div class="sidebar ftco-animate">
      <div class="row">
        <div class="col-lg-3 search-panel" style="background-color: white;">
          <form id="formFilter" class="search-form" action="{{route('filter',$province_now->id)}}" method="post">
            @csrf
            <div class="row">
              <div class="sidebar-box col-lg-12">
                <div class="form-group">
              
                  <span class="icon ion-ios-search top-70"></span>
                  <input type="text" autocomplete="off"  name="name" class="form-control" placeholder="tên cửa hàng">
                </div>
              </div>
              {{-- <div class="sidebar-box col-lg-12">
                <div class="form-group">
              
                  <span class="icon ion-ios-search top-70"></span>
                  <input type="text" autocomplete="off"  name="" class="form-control" placeholder="giá">
                </div>
              </div>
              <div class="sidebar-box col-lg-12">
                <div class="form-group">
                  <span class="icon ion-ios-search top-70"></span>
                  <input type="text" autocomplete="off"  name="" class="form-control" placeholder="search">
                </div>
              </div> --}}
              <div class="sidebar-box col-lg-12">
                <div class="form-group">
                  <select class="form-control selectsearch" name="category" id="exampleFormControlSelect1">
                    <option value="">Tất cả danh mục</option>
                    @foreach ($category as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="sidebar-box col-lg-12">
                <div class="form-group">
                  <select class="form-control selectsearch" name="district" id="exampleFormControlSelect1">
                    <option value="">Tất cả khu vực</option>
                    @foreach ($districts as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="sidebar-box col-lg-12">
                <div class="form-group">
                  <button id="filterButton" class="btn btn-success mt-30">Tìm kiếm</button>
                </div>
              </div>
              
           </div>
          </form>
        </div>
        <div class="col-lg-9">
          <section class="ftco-section" style="padding-top:0;height: 600px;overflow-y: scroll;" id="filterResult">
            <div class="container">
              <div class="row">
                  @if (isset($shop))
                  <div class="col-lg-12">
                    <h3 style="padding-bottom: 2rem; font-size:1rem"></h3>
                  </div>
                  @foreach ($shop as $item)    
                    <div class="col-md-6 col-lg-3 ">
                        <div class="product">
                        <a href="{{URL::to($province_now->id.'/shop-single/'.$item->slug)}}" class="img-prod">
                            <img class="img-fluid" src="@if($item->img != null) {{$item->img}} @else asset/admin/images/image-placeholder.jpg @endif"
                                    alt="Colorlib Template">
                                <span class="status">30%</span>
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 " style=" text-align: justify;">
                            <h3><a href="">{{Str::limit($item->name,16)}}</a></h3>
                                <div class="d-flex">
                                    <div class="">
                                        {{-- <p class="x">{!! $item->address->address_detail !!}, {{$item->address->ward->name}},
                                            {{$item->address->ward->district->name}}, {{$item->address->ward->district->province->name}}</p>
                                        <p class="">{!! Str::limit($item->description,26) !!}</p> --}}
                                        <p>
                                            {!!Str::limit($item->address->address_detail,18) !!}
                                        </p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                  @endforeach
                  @endif
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
