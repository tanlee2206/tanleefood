<div class="container">
    <div class="row">
@if (isset($shop))
<div class="col-lg-12">
  <h3 style="padding-bottom: 2rem; font-size:1rem">{{$shop->count()}} kết quả tìm thấy</h3>
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