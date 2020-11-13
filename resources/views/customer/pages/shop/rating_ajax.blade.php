@foreach ($rating as $item)
<li class="comment">
  <div class="vcard bio">
    <img src="{{$item->user->img}}" width="50px" height="50px" alt="Image placeholder">
  </div>
  <div class="comment-body">
  <h3 style="margin-bottom: 0px">{{$item->user->last_name}} {{$item->user->first_name}}</h3>
    <span class="meta"> {{date("D, d.m.Y h:i a", strtotime($item->created_at))}}</span>
  <p style="margin-bottom: 0px">{{$item->content}}</p>
  <div class="rating3">
    <input id="star10" type="radio" value="5" disabled class="radio-btn hide" {{$item->rating == 5 ?'checked': ''}} />
    <label for="star10" >☆</label>
    <input id="star9" type="radio" value="4" disabled class="radio-btn hide" {{$item->rating == 4 ?'checked': ''}}/>
    <label for="star9" >☆</label>
    <input id="star8" type="radio" value="3" disabled class="radio-btn hide" {{$item->rating == 3 ?'checked': ''}}/>
    <label for="star8" >☆</label>
    <input id="star7" type="radio" value="2" disabled class="radio-btn hide" {{$item->rating == 2 ?'checked': ''}} />
    <label for="star7" >☆</label>
    <input id="star6" type="radio" value="1" disabled class="radio-btn hide" {{$item->rating == 1 ?'checked': ''}} />
    <label for="star6" >☆</label>
    <div class="clear"></div>
</div>
  @if (Auth::user() && $item->user->id == Auth::user()->id )
  <p><a href="#" class="reply">xóa</a></p>
  @endif
    
  </div>
</li> 
@endforeach