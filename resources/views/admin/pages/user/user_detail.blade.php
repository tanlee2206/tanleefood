@if ($user_detail)
<style>
	label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
}
.form-group {
    margin-bottom: 15px;
}
.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    /* -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s; */
}
</style>
<div class="">
    <div class="row">
        <div class="col-md-12 offset-md-3 mr-auto ml-auto">
            <div class="card">
                <div class="card-header">
                    <small>Chỉnh sửa</small>
                    <strong>người dùng</strong>
                </div>
                <div class="card-body card-block">
                      <div class="row form-group">
                        <div class="col-8">
                        <form action="" method="POST"  >
                                @csrf
                                @method('PUT')
                            <div class="row">
                                <div class=" form-group col-lg-12 ">    
                                    <label for="select" class=" form-control-label">Quyền</label>
                                    <div class="{{ $errors->has('permission') ? ' has-error' : '' }}">
                                        <select class="form-control" style="height: auto;" name="permission_id" id="permission" data-live-search="true">
                                            {{-- @foreach ($permission as $permission)
                                           
                                            <option value="{{ $permission->id }}" {{ ($user_detail->permission->id == $permission->id) ? 'selected':'' }} >{{ $permission->permission }}</option>
                                             @endforeach --}}
                                                                                          
                                        </select>
                                        <small class="text-danger">{{ $errors->first('permission') }}</small>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label  class=" form-control-label {{ $errors->has('first_name') ? ' has-error' : '' }}">first name</label>
                                    <input type="text" name="first_name" id="first_name" value="{{$user_detail->first_name}}" placeholder="" class="form-control">
                                    <small class="text-danger">{{ $errors->first('first_name') }}</small>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label  class=" form-control-label {{ $errors->has('last_name') ? ' has-error' : '' }}">last name</label>
                                    <input type="text" name="last_name" id="last_name" value="{{$user_detail->last_name}}" placeholder="" class="form-control">
                                    <small class="text-danger">{{ $errors->first('last_name') }}</small>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label  class=" form-control-label {{ $errors->has('login_name') ? ' has-error' : '' }}">Tên đăng nhập</label>
                                    <input type="text" name="login_name" id="login_name" value="{{ $user_detail->login_name}}" placeholder="" class="form-control">
                                    <small class="text-danger">{{ $errors->first('login_name') }}</small>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label  class=" form-control-label {{ $errors->has('email') ? ' has-error' : '' }}">email</label>
                                    <input type="email" name="email" id="email" value="{{  $user_detail->email }}" placeholder="" class="form-control">
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <label  class=" form-control-label {{ $errors->has('phone') ? ' has-error' : '' }}">Số điện thoại</label>
                                <input type="text" name="phone" value="{{  $user_detail->phone }}" placeholder="" class="form-control">
                                <small class="text-danger">{{ $errors->first('phone') }}</small>
                            </div>
                           
                           
                           
                        </div>
                        <div class="col-4 {{ $errors->has('img') ? ' has-error' : '' }}">
                            <div class="input-group form-group  ">
                                <span class="input-group-btn">
                                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn">
                                    <div id="holder" >
                                        @if ((old('img') != null))
                                        <img src="{{ old('img') }}" width="250"  alt="">
                                        @else
                                        <img src="
                                        @if($user_detail->img != null)
                                        {{ $user_detail->img }}
                                        @else
                                        asset/admin/images/image-placeholder.jpg
                                        @endif
                                        " width="250"  alt="">
                                        @endif
                                        
                                    </div>
                                  </a>
                                </span>
                                <input hidden id="thumbnail" class="form-control" value="
                                @if($user_detail->img != null)
                                {{ $user_detail->img }}
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
                                        @if ($user_detail->address != null)
                                        <option value="{{ $province->id }} "{{ $user_detail->address->ward->district->province->id == $province->id ? 'selected':'' }} >{{ $province->name }}</option>
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
                                   @if ($user_detail->address != null)
                                   <option value="{{  $user_detail->address->ward->district->id}} " selected>{{  $user_detail->address->ward->district->name }}</option>  
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
                                   @if ($user_detail->address != null)
                                   <option value="{{ $user_detail->address->ward->id}} " selected>{{  $user_detail->address->ward->name }}</option>
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
                        <textarea class="form-control" id="summary-ckeditor" name="address">
                            @if ($user_detail->address != null)
                            {!! $user_detail->address->address_detail !!}
                            @endif
                           
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


@endif