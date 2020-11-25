@if ($orders_detail)


{{-- @foreach ($orders_status as $item)
    @if ($item->status ==6)
        <h2>đơn hàng đã bị hủy</h2>
    @else
    <ul class="progressbar-orders">
      <li class=
          @if($item->status >= 1)
          "active"
          @else 
          ""
          @endif
          ><p>pending</p>
      </li>
        <li class=
          @if($item->status >= 2 )
          "active"
          @else 
          ""
          @endif
          ><p>dispatched</p>
        </li>
        <li class=
          @if($item->status >= 3 )
          "active"
          @else 
          ""
          @endif
        ><p>processed</p></li>
        <li class=
          @if($item->status >= 4 )
          "active"
          @else 
          ""
          @endif
        ><p>shipped</p></li>
        <li class=
          @if($item->status == 5 )
          "active"
          @else 
          ""
          @endif
        ><p>delivered</p></li>
        
  </ul>
  @endif
@endforeach --}}

<div>
  đơn hàng : <strong>#{{$orders_detail->id}}</strong>  <br>
  ngày : <strong>{{date("d/m/Y h:i a", strtotime($orders_detail->created_at))}} </strong><br>
  thành tiền : <strong>{{number_format($total,0)}} vnd</strong> <br>
  địa chỉ giao hàng: <strong>{{$orders_detail->address->address_detail}}</strong><br>
  điên thoại : <strong>{{$orders_detail->user->phone}}</strong>

</div>
<table cellpadding="0" cellspacing="0" border="0" class="display table table-cat table-bordered table-hover" id="hidden-table-info">
    <hr>
    <thead style="background-color: #333; color: white; ">
      <tr >
        <th> STT</th> 
        <th> Hình ảnh </th>     
        <th>name</th>
        <th>giá</th>
         <th>Số lượng </th>
         
         <th> tổng tiền </th>



      </tr>
    </thead>
    <tbody>
        @foreach($orders_item as $key => $value)

        <tr>
            <td>{{$key+1}}</td>
        <td>
          @if ($value->food->image_food != null)
          @foreach ($value->food->image_food as $image)
              @if ($image->index == 0)
              <img src="{{$image->path}}" width="80" height="80" alt="">
              @endif
          @endforeach
          @else
          {{-- <img src="{{$item->img}}" class="image" width="70" height="70" alt="Image placeholder" > --}}
          @endif
                          
          
        </td>
        <td>{{$value->food->name}}</td>
            <td>{{number_format($value->food->price,0)}}</td>
            <td>{{$value->number}}</td>
            <td>{{number_format($value->amount,0)}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endif