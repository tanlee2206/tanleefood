@if ($shop != null)
<div class="table-data" id="list-shop">
    <table  id="bootstrap-data-shop-table"  class="table">
        <thead>
            <tr>
                <td>
                </td>
                <td>tên quán</td>
                <td>Địa chỉ</td>
            </tr>
        </thead>
        <tbody>
            {{-- {{dd($shop)}} --}}
            @foreach ($shop as $item)
            <tr>
                <td>
                    <img src="{{$item->img}}" alt="" width="50" height="50">
                </td>
            <td>{{$item->name}}</td>
                <td>
                    {!! $item->address->address_detail !!},
                {{$item->address->ward->name}}
                    {{-- @if ($item->permission->id == 1)
                    <span class="role admin">admin</span>
                    @elseif ($item->permission->id == 2)
                    <span class="role member">Shop</span>
                    @elseif ($item->permission->id == 3)
                    <span class="role shop">Customer</span>
                    @endif --}}
                    
                </td>
                <td>
                    <div class="table-data-feature">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                            <i class="zmdi zmdi-mail-send"></i>
                        </button>
                    <a href="{{route('shop.edit',$item->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="zmdi zmdi-edit"></i>
                        </a>
                        <button id="deleteshopModal" data-toggle="modal" data-target="#deleteModal" data-token="{{ csrf_token() }}"
                             class="item" id="deleteshop" data-id="{{$item->id}}" >
                            <i class="zmdi zmdi-delete"></i>
                        </button>
                        {{-- <a href="{{route('shop.detail',$item->id)}}" data-id="{{$item->id}}" class="item js_shop_item" title="detail">
                            <i class="zmdi zmdi-eye"></i>
                        </a > --}}
                    </div>
                </td>
            </tr>
            @endforeach
           
        </tbody>
    </table>
</div>
@endif