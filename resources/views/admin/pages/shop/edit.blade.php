@extends('admin.layouts.master')

@section('title')
		Thêm mới cửa hàng
@endsection

@section('content')
<div class="section__content section__content--p30cp">
<div class="main-content">
    <div class="row">
        <div class="col-md-10 offset-md-3 mr-auto ml-auto">
            <div class="card">
                <div class="card-header">
                    <small> Thêm mới</small>
                    <strong>cửa hàng</strong>
                </div>
                <div class="card-body card-block">
                      <div class="row form-group">
                        <div class="col-8">
                        <form action="{{route('shop.update', $shop->id)}}" method="POST" >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label  class=" form-control-label {{ $errors->has('name') ? ' has-error' : '' }}">Tên cửa hàng</label>
                                <input type="text" name="name" id="name" value="{{$shop->name }}" placeholder="" class="form-control">
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                                <input type="text" hidden name="slug" id="slug" value="{{$shop->slug }}" placeholder="" class="form-control">
                            <div class="form-group">
                                <label  class=" form-control-label {{ $errors->has('cost') ? ' has-error' : '' }}">mức giá</label>
                                <input type="text" name="cost" id="cost" value="{{ $shop->cost }}" placeholder="10.000 - 90.000" class="form-control">
                                <small class="text-danger">{{ $errors->first('cost') }}</small>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6" >
                                    <label  class=" form-control-label {{ $errors->has('open_time') ? ' has-error' : '' }}">giờ mở cửa</label>
                                    <input type="time"  name="open_time" id="open_time" value="{{ $shop->open_time }}" placeholder="" class="form-control">
                                    <small class="text-danger">{{ $errors->first('open_time') }}</small>
                                </div>
                                <div class="form-group col-lg-6" >
                                    <label  class=" form-control-label {{ $errors->has('close_time') ? ' has-error' : '' }}">giờ đóng cửa</label>
                                    <input type="time"  name="close_time" id="close_time" value="{{$shop->close_time }}" placeholder="" class="form-control">
                                    <small class="text-danger">{{ $errors->first('close_time') }}</small>
                                </div>
                            </div>
                            
                            
                           
                        </div>
                        
                       <div class="col-4 {{ $errors->has('img') ? ' has-error' : '' }}">
                            <div class="input-group form-group  ">
                                <span class="input-group-btn">
                                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn">
                                    <div id="holder" >
                                        @if ((old('img') != null))
                                        <img src="{{ old('img') }}" width="250" height="250" alt="">
                                        @else
                                        <img src="
                                        @if($shop->img != null)
                                        {{ $shop->img }}
                                        @else
                                        asset/admin/images/image-placeholder.jpg
                                        @endif
                                        " width="250" height="250" alt="">
                                        @endif
                                        
                                    </div>
                                  </a>
                                </span>
                                <input hidden id="thumbnail" class="form-control" value="
                                @if($shop->img != null)
                                {{ $shop->img }}
                                @else
                                asset/admin/images/image-placeholder.jpg
                                @endif
                                "  name="img">
                                
                              </div>
                              <small class="text-danger">{{ $errors->first('img') }}</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" form-group col-lg-4">    
                            <label for="select" class=" form-control-label">Tỉnh / TP </label>
                            <div class="{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <select class="form-control" style="height: auto;" name="province" id="province" data-live-search="true">
                                    <option >tỉnh</option>
                                    @foreach ($province as $province)
                                    @if ($shop->address != null)
                                    <option value="{{ $province->id }} "{{ $shop->address->ward->district->province->id == $province->id ? 'selected':'' }} >{{ $province->name }}</option>
                                    @else 
                                    <option value="{{ $province->id }}" >{{ $province->name }}</option>
                                    @endif

                                 @endforeach
                                </select>
                               
                            </div>
                        </div>
                        <div class=" form-group col-lg-4">    
                            <label for="select" class=" form-control-label">Quận / Huyện</label>
                            <div class="{{ $errors->has('category_id') ? ' has-error' : '' }}">
                          
                                <select class="form-control" name="districts" id="districts"  style="height: auto;" data-live-search="true">
                                    @if ($shop->address != null)
                                   <option value="{{  $shop->address->ward->district->id}} " selected>{{  $shop->address->ward->district->name }}</option>  
                                   @else 
                                   <option >quận / huyện</option>  
                                   @endif
                                </select>
                               
                            </div>
                        </div>
                        <div class=" form-group col-lg-4">    
                            <label for="select" class=" form-control-label">Phường / Xã</label>
                            <div class="{{ $errors->has('ward_id') ? ' has-error' : '' }}">
                                <select class="form-control" name="ward_id" id="wards" style="height: auto;"  data-live-search="true">
                                    @if ($shop->address != null)
                                    <option value="{{ $shop->address->ward->id}} " selected>{{  $shop->address->ward->name }}</option>
                                    @else 
                                    <option >phường/ xã</option>
                                    @endif
                                </select>
                                <small class="text-danger">{{ $errors->first('ward_id') }}</small>
                            </div>
                        </div>
                    </div>
                     
                    <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                        <label  class=" form-control-label">địa chỉ chi tiết</label>
                        <textarea class="form-control" name="address">
                            @if ($shop->address != null)
                            {!! $shop->address->address_detail !!}
                            @endif
                        </textarea>
                        <small class="text-danger">{{ $errors->first('address') }}</small>
                    </div>
                     
                   
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label  class=" form-control-label">Mô tả</label>
                        <textarea class="form-control" id="summary-ckeditor" name="description">
                            {{$shop->description }}
                        </textarea>
                        <small class="text-danger">{{ $errors->first('description') }}</small>
                    </div>  
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div> 
                    <form>                
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
     $('#lfm').filemanager('image');
     $('#lfm1').filemanager('image');
     $('#lfm2').filemanager('image');
     $('#lfm3').filemanager('image');
</script>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
CKEDITOR.replace( 'summary-ckeditor2' );
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
    $('#name').change(function(e) {
      $.get('{{ route('pages.check_slug') }}', 
        { 'name': $(this).val() }, 
        function( data ) {
          $('#slug').val(data.slug);
        }
      );
    });
  </script>
@endsection