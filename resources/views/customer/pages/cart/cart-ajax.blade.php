@if (Session::has("Cart") != null)
<div id="change-item-cart">
    <div class="select-items">
        <table>
            <tbody>
               @foreach (Session::get("Cart")->food as $item)


                <tr>
                    {{-- {{$item['foodInfo']->img}} --}}
                <td class="si-pic"><img src="{{$item['image']}}" width="60" height="60" alt=""></td>
                    <td class="si-text">
                        <div class="food-selected">
                        <p>{{ number_format($item['foodInfo']->price).' '.'VNĐ'}} x {{$item['quanty']}}</p>
                            <h6>{{$item['foodInfo']->name}}</h6>
                        </div>
                    </td>
                    <td class="si-close">
                    <i class="far fa-trash-alt" data-id="{{$item['foodInfo']->id}}"></i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="select-total">
        <span>total:</span>
    <h5>{{ number_format(Session::get("Cart")->totalPrice).' '.'VNĐ'}}</h5>
    <input hidden type="number" name="" value="{{Session::get("Cart")->totalQuanty}}" id="QuantyCart">

    </div>
</div>

@endif