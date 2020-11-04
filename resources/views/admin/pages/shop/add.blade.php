@extends('admin.layouts.master')

@section('title')
		Thêm mới cửa hàng
@endsection

@section('content')
<div class="section__content section__content--p30cp">
<div class="main-content">
    <div class="row">
        <div class="col-lg-8 ">
            <div class="card">
                <div class="card-header">
                    <small> Thêm mới</small>
                    <strong>cửa hàng</strong>
                </div>
                <div class="card-body card-block">
                      <div class="row form-group">
                        <div class="col-8">
                        <form action="{{route('shop.store')}}" method="POST" >
                                @csrf
                            <div class="form-group">
                                <label  class=" form-control-label {{ $errors->has('name') ? ' has-error' : '' }}">Tên cửa hàng</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="" class="form-control">
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                                <input type="text" hidden name="slug" id="slug" value="{{ old('slug') }}" placeholder="" class="form-control">
                            <div class="form-group">
                                <label  class=" form-control-label {{ $errors->has('cost') ? ' has-error' : '' }}">mức giá</label>
                                <input type="text" name="cost" id="cost" value="{{ old('cost') }}" placeholder="10.000 - 90.000" class="form-control">
                                <small class="text-danger">{{ $errors->first('cost') }}</small>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6" >
                                    <label  class=" form-control-label {{ $errors->has('open_time') ? ' has-error' : '' }}">giờ mở cửa</label>
                                    <input type="time"  name="open_time" id="open_time" value="{{ old('open_time') }}" placeholder="" class="form-control">
                                    <small class="text-danger">{{ $errors->first('open_time') }}</small>
                                </div>
                                <div class="form-group col-lg-6" >
                                    <label  class=" form-control-label {{ $errors->has('close_time') ? ' has-error' : '' }}">giờ đóng cửa</label>
                                    <input type="time"  name="close_time" id="close_time" value="{{ old('close_time') }}" placeholder="" class="form-control">
                                    <small class="text-danger">{{ $errors->first('close_time') }}</small>
                                </div>
                            </div>
                            
                            
                           
                        </div>
                        
                        <div class="col-4 {{ $errors->has('img') ? ' has-error' : '' }}">
                            <div class="row">
                                {{--------------------- hình lớn ---------------------------}}
                                <div class="input-group form-group col-lg-12  ">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn">
                                        <div id="holder" >
                                            @if ((old('img') != null))
                                            <img src="{{ old('img') }}" width="270" height="250" alt="">
                                            @else
                                            <img src="asset/admin/images/image-placeholder.jpg" width="200" height="200" alt="">
                                            @endif
                                        </div>
                                      </a>
                                    </span>
                                    <input hidden id="thumbnail" class="form-control" value="{{ old('img') }}"  name="img">  
                                </div> 
                                {{------------------------------ hình nhỏ ----------------------}}
                                <small class="text-danger">{{ $errors->first('img') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" form-group col-lg-4">    
                            <label for="select" class=" form-control-label">Tỉnh / TP </label>
                            <div class="{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <select class="form-control" style="height: auto;" name="province" id="province" data-live-search="true">
                                    <option >tỉnh</option>
                                    @foreach ($province as $province)
                                   
                                    <option value="{{ $province->id }}" >{{ $province->name }}</option>
                                     @endforeach
                                </select>
                               
                            </div>
                        </div>
                        <div class=" form-group col-lg-4">    
                            <label for="select" class=" form-control-label">Quận / Huyện</label>
                            <div class="{{ $errors->has('category_id') ? ' has-error' : '' }}">
                          
                                <select class="form-control" name="districts" id="districts"  style="height: auto;" data-live-search="true">
                                    <option >quận / huyện</option>
                                </select>
                               
                            </div>
                        </div>
                        <div class=" form-group col-lg-4">    
                            <label for="select" class=" form-control-label">Phường / Xã</label>
                            <div class="{{ $errors->has('ward_id') ? ' has-error' : '' }}">
                                <select class="form-control" name="ward_id" id="wards" style="height: auto;"  data-live-search="true">
                                    <option >phường/ xã</option>
                                </select>
                                <small class="text-danger">{{ $errors->first('ward_id') }}</small>
                            </div>
                        </div>
                    </div>
                     
                    <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                        <label  class=" form-control-label">địa chỉ chi tiết</label>
                        <textarea class="form-control"  name="address">
                            {{ old('address') }}
                        </textarea>
                        <small class="text-danger">{{ $errors->first('address') }}</small>
                    </div>
                     
                   
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label  class=" form-control-label">Mô tả</label>
                        <textarea class="form-control" id="summary-ckeditor" name="description">
                            {{ old('description') }}
                        </textarea>
                        <small class="text-danger">{{ $errors->first('description') }}</small>
                    </div>                   
                </div>
            </div>
        </div>
        <div class="col-lg-4 ">
            <div class="card">
                <div class="card-header">
                    <small> Thêm mới</small>
                    <strong>tài khoản</strong>
                </div>
                <div class="card-body card-block">
                      <div class="row form-group">
                        <div class="col-lg-12">
                       
                            <div class="form-group">
                                <label  class=" form-control-label {{ $errors->has('user_name') ? ' has-error' : '' }}">Tên đăng nhập</label>
                                <input type="text" name="user_name" id="user_name" value="{{ old('user_name') }}" placeholder="" class="form-control">
                                <small class="text-danger">{{ $errors->first('user_name') }}</small>
                            </div>
                            <div class="form-group">
                                <label  class=" form-control-label">email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="" class="form-control">
                            
                            </div>
                            
                            <div class="form-group">
                                <label  class=" form-control-label {{ $errors->has('password') ? ' has-error' : '' }}">password</label>
                                <input type="password" name="password" value="{{ old('password') }}" placeholder="" class="form-control">
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            </div>
                            <div class="form-group">
                                <label  class=" form-control-label {{ $errors->has('re_password') ? ' has-error' : '' }}">nhập lại password</label>
                                <input type="password" name="re_password" value="{{ old('re_password') }}" placeholder="" class="form-control">
                                <small class="text-danger">{{ $errors->first('re_password') }}</small>
                            </div>
                        </div>
                    </div>
                     
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                </form>
                    
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