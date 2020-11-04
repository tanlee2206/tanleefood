@foreach ($foods as $item)
<div class="col-lg-12 food-panel-item">
  <div class="row">
     <div class="shop-single-food__img col-lg-2 zoom-box ">
       @if ($item->image_food != null)
       @foreach ($item->image_food as $image)
           @if ($image->index == 0)
           <img src="{{$image->path}}" class="image" width="70" height="70" alt="Image placeholder" >    
           @endif
       @endforeach
       @else
       <img src="{{$item->img}}" class="image" width="70" height="70" alt="Image placeholder" >
       @endif
       {{-- <img src="{{$item->img}}" class="image" width="70" height="70" alt="Image placeholder" > --}}
       @if ($item->sale > 0)
     <span class="blob btn btn-danger">sale {{$item->sale}}%</span>
       @endif
     </div>
     <div class="shop-single-food__name col-lg-6">
       <h3>{{$item->name}}</h3>
       <p>{!! Str::limit($item->description,30) !!}</p>
       
     </div>
     <div class="shop-single-food__price col-lg-4">
       <div class="row">
        <div class="col-lg-8">
          
          @if ($item->sale > 0)
           <h4>{{number_format($item->price - ($item->price)*($item->sale)/100 ,0)}} vnd</h4>
           <h3>{{number_format($item->price,0)}} vnd</h3>
           
          @else
          <h4>{{number_format($item->price,0)}} vnd</h4>
          @endif
         
       </div>
       <div type="col-lg-2" class="eye-button">
           <a href="{{route('food.detail_index',$item->id)}}" data-id="{{$item->id}}" class="js_food_detail" title="detail" ><i class="fas fa-eye"></i></a>
        </div>
        <div type="col-lg-2" class="buy-button">
           <a onclick="AddCart({{$item->id}})" href="javascript:" >+</a>
        </div>
        
       </div>
       
     </div>
  </div>
 
</div>

<script>
    $(function(){
        $(".js_food_detail").click(function(event){
            event.preventDefault();
            let $this = $(this);
            let url = $this.attr('href');
            $(".foods-id").text('').text($this.attr('data-id'));
            
            $.ajax({
            url: url,
            }).done(function(result){
                console.log(result);
                if (result) {
                    $("#md_content_food").html('').append(result);
                }
            });
            $("#myModalfood").modal('show');
        });
    })
  </script>
  
@endforeach