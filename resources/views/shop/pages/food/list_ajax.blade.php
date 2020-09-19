@if ($food != null)
<div class="" id="list-food">
    <table id="bootstrap-data-table" class="table table-shop table-borderless table-striped">
    {{-- <table  class="table table-shop table-borderless table-striped"> --}}
        <thead>
            <tr>
                <th>#</th>
                <th>Tên món</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Rating</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($food as $key => $item)                                
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$item->name}}</td>
                <td><img src="{{$item->img}}" width="80" height="80"></td>
                <td >{{number_format($item->price,0)}}</td>
                <td >{!! Str::limit($item->description,40) !!}</td>
                <td>0.9</td>
                <td>
                    <div class="table-data-feature">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                            <i class="zmdi zmdi-mail-send"></i>
                        </button>
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="zmdi zmdi-edit"></i>
                        </button>
                        <button id="deleteFoodModal" data-toggle="modal" data-target="#deleteModal" data-token="{{ csrf_token() }}"
                             class="item" id="deletefood" data-id="{{ $item->id }}" >
                            <i class="zmdi zmdi-delete"></i>
                        </button>
                        <a href="{{route('food.detail',$item->id)}}" data-id="{{$item->id}}" class="item js_food_item" title="detail">
                            <i class="zmdi zmdi-eye"></i>
                        </a >
                    </div>
                </td>
            </tr> 
            @endforeach         
        </tbody>
    </table>
</div>
@endif