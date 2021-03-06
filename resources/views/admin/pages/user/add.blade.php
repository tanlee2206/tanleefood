@extends('admin.layouts.master')

@section('title')
	Thêm người dùng
@endsection
@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-md-10 offset-md-3 mr-auto ml-auto">
            <div class="card">
                <div class="card-header">
                    <small> Thêm mới</small>
                    <strong>người dùng</strong>
                </div>
                <div class="card-body card-block">
                      <div class="row form-group">
                        <div class="col-8">
                        <form action="{{route('user.store')}}" method="POST" >
                                @csrf
                            <div class="row">
                                <div class=" form-group col-lg-12 ">    
                                    <label for="select" class=" form-control-label">Quyền</label>
                                    <div class="{{ $errors->has('permission') ? ' has-error' : '' }}">
                                        <select class="form-control" style="height: auto;" name="permission_id" id="permission" data-live-search="true">
                                            @foreach ($permission as $permission)
                                           
                                            <option value="{{ $permission->id }}" >{{ $permission->permission }}</option>
                                             @endforeach
                                        </select>
                                        <small class="text-danger">{{ $errors->first('permission') }}</small>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label  class=" form-control-label {{ $errors->has('first_name') ? ' has-error' : '' }}">first name</label>
                                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="" class="form-control">
                                    <small class="text-danger">{{ $errors->first('first_name') }}</small>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label  class=" form-control-label {{ $errors->has('last_name') ? ' has-error' : '' }}">last name</label>
                                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="" class="form-control">
                                    <small class="text-danger">{{ $errors->first('last_name') }}</small>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label  class=" form-control-label {{ $errors->has('login_name') ? ' has-error' : '' }}">Tên đăng nhập</label>
                                    <input type="text" name="login_name" id="login_name" value="{{ old('login_name') }}" placeholder="" class="form-control">
                                    <small class="text-danger">{{ $errors->first('login_name') }}</small>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label  class=" form-control-label {{ $errors->has('email') ? ' has-error' : '' }}">email</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="" class="form-control">
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <label  class=" form-control-label {{ $errors->has('phone') ? ' has-error' : '' }}">Số điện thoại</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="" class="form-control">
                                <small class="text-danger">{{ $errors->first('phone') }}</small>
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
                                        <img src="asset/admin/images/image-placeholder.jpg" width="250" height="250" alt="">
                                        @endif
                                    </div>
                                  </a>
                                </span>
                                <input hidden id="thumbnail" class="form-control" value="{{ old('img') }}"  name="img">
                                
                              </div>
                              <small class="text-danger">{{ $errors->first('img') }}</small>
                        </div>
                    </div>
                     <div class="row">
                        <div class="form-group col-lg-6">
                            <label  class=" form-control-label {{ $errors->has('password') ? ' has-error' : '' }}">Mật khẩu</label>
                            <input type="password" name="password" id="password"  placeholder="" class="form-control">
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                        </div>
                        <div class="form-group col-lg-6">
                            <label  class=" form-control-label {{ $errors->has('re_password') ? ' has-error' : '' }}">Nhập lại mật khẩu</label>
                            <input type="password" name="re_password" id="re_password" value="{{ old('re_password') }}" placeholder="" class="form-control">
                            <small class="text-danger">{{ $errors->first('re_password') }}</small>
                        </div>
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
                                    <option value="">quận / huyện</option>
                                </select>
                               
                            </div>
                        </div>
                        <div class=" form-group col-lg-4">    
                            <label for="select" class=" form-control-label">Phường / Xã</label>
                            <div class="{{ $errors->has('ward_id') ? ' has-error' : '' }}">
                                <select class="form-control" name="ward_id" id="wards" style="height: auto;"  data-live-search="true">
                                    <option value="" >phường/ xã</option>
                                </select>
                                <small class="text-danger">{{ $errors->first('ward_id') }}</small>
                            </div>
                        </div>
                     </div>
                   
                    <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                        <label  class=" form-control-label">địa chỉ chi tiết</label>
                        <textarea class="form-control" id="summary-ckeditor" name="address">
                            {{ old('address') }}
                        </textarea>
                        <small class="text-danger">{{ $errors->first('address') }}</small>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
     $('#lfm').filemanager('image');
</script>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@endsection