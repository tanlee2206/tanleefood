@if (Session::has("Cart") != null)
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 ">
            <div class="cart-list" >
                <table class="table">
                    <thead class="thead-primary">
                        <tr class="text-center">
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>Tên món</th>
                            <th>Cửa hàng</th>
                            <th>Giá</th>
                            <th>giảm giá</th>
                            <th>Số lượng</th>
                            <th>tổng từng món</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (Session::has("Cart") != null)
                      @foreach (Session::get("Cart")->food as $item)
                        <tr class="text-center">
                            <td class="product-remove"><span class="ion-ios-close" onclick="DeleteItemListCart({{$item['foodInfo']->id}});"></span></td>

                            <td class="image-prod">
                                <div class="img" style="background-image:url({{$item['image']}});"></div>
                            </td>

                            <td class="product-name">
                                <h3>{{$item['foodInfo']->name}}</h3>
                                {{-- <p>{{$item['foodInfo']->shop->name}}</p> --}}
                            </td>
                            <td class="product-name">
                                <h3>{{$item['shop']->name}}</h3>
                            
                            </td>

                            <td class="price">  {{ number_format($item['foodInfo']->price).' '.'VNĐ'}}</td>
                            <td class="sale">{{$item['foodInfo']->sale}} %</td>

                            <td class="quantity">
                                <div class="input-group mb-3">
                                    <input hidden value="{{$item['foodInfo']->id}}">
                                   
                                    <input type="number" class="upcart quantity form-control input-number" value="{{$item['quanty']}}" min="1" max="1000" onchange="UpdateItemListCart({{$item['foodInfo']->id}});" id="UpCart-{{$item['foodInfo']->id}}">
                                </div>
                            </td>

                            <td class="total">{{ number_format($item['price']).' '.'VNĐ'}}</td>
                        </tr><!-- END TR-->
                      @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-lg-6 mt-5 cart-wrap ">
            <div class="cart-total mb-3">
                <h3>Mã giảm giá</h3>
                <p>Nhập mã giảm giá nếu bạn có 1</p>
                <form action="#" class="info">
                    <div class="form-group">
                        <label for="">Mã giảm giá</label>
                        <input type="text" class="form-control text-left px-3" placeholder="">
                    </div>
                </form>
            </div>
            <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
        </div>
        <div class="col-lg-6 mt-5 cart-wrap ">
            <div class="cart-total mb-3">
                <h3>Tổng giỏ hàng</h3>
                <p class="d-flex">
                    <span>Tổng tiền</span>
                    @if (Session::has("Cart") != null)
                    <span>{{ number_format(Session::get("Cart")->totalPrice).' '.'VNĐ'}}</span>
                    @else 
                    <span>0 vnd</span>
                    @endif
                </p>
                <p class="d-flex">
                    <span>giảm giá</span>
                    <span>0%</span>
                </p>
                <p class="d-flex">
                    <span>phí vận chuyển</span>
                    <span>free</span>
                </p>
                <hr>
                <p class="d-flex total-price">
                    <span>Thành tiền</span>
                    @if (Session::has("Cart") != null)
                    <span>{{ number_format(Session::get("Cart")->totalPrice).' '.'VNĐ'}}</span>
                    @else 
                    <span>0 vnd</span>
                    @endif
                    
                </p>
            </div>
            <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Tiến hành thanh toán</a></p>
        </div>
    </div>
</div>
@endif