<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <link href="asset/admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <!-- Font Icon -->
    <link rel="stylesheet" href="asset/register/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="asset/register/vendor/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="asset/register/css/style.css">
</head>
<body>

    <div class="main">

        <div class="container-fuild">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="asset/register/images/form-img.jpg" alt="">
                    <div class="signup-img-content">
                        <h2>Đăng ký cửa hàng </h2>
                        <p>Đăng ký thành viên của tanlee food</p>
                    </div>
                </div>
                <div class="signup-form">
                    <form method="POST" action="{{route('register-shop')}}" class="register-form" id="register-form">
                        @csrf
                        <div id="shop_form">
                            <div class="form-row ">
                                <div class="form-group col-lg-8">
                                    <div class="form-input">
                                        <label  class=" form-control-label {{ $errors->has('name') ? ' has-error' : '' }}">Tên cửa hàng</label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="" class="form-control">
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                    </div>
                                    <div class="form-input">
                                        <label  class=" form-control-label {{ $errors->has('cost') ? ' has-error' : '' }}">Giá trung bình</label>
                                        <input type="text" name="cost" id="cost" value="{{ old('cost') }}" placeholder="" class="form-control">
                                        <small class="text-danger">{{ $errors->first('cost') }}</small>
                                    </div>
                                    <div class="row">
                                        <div class="form-input col-lg-6">
                                            <label  class=" form-control-label {{ $errors->has('open_time') ? ' has-error' : '' }}">Giờ mở cửa</label>
                                            <input type="time"  name="open_time" id="open_time" value="{{ old('open_time') }}" placeholder="" class="form-control">
                                            <small class="text-danger">{{ $errors->first('open_time') }}</small>
                                        </div>
                                        <div class="form-input col-lg-6">
                                            <label  class=" form-control-label {{ $errors->has('close_time') ? ' has-error' : '' }}">Giờ đóng cửa</label>
                                            <input type="time"  name="close_time" id="close_time" value="{{ old('close_time') }}" placeholder="" class="form-control">
                                            <small class="text-danger">{{ $errors->first('close_time') }}</small>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-4 {{ $errors->has('img') ? ' has-error' : '' }}">
                                    <div class="row">
                                        {{--------------------- hình lớn ---------------------------}}
                                        <div class="input-group form-group col-lg-12  " style="margin-top: 25px;">
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
                                <div class="form-group col-lg-12">
                                    <div class="row">
                                    <div class="  col-lg-4">    
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
                                    <div class="  col-lg-4">    
                                        <label for="select" class=" form-control-label">Quận / Huyện</label>
                                        <div class="{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                      
                                            <select class="form-control" name="districts" id="districts"  style="height: auto;" data-live-search="true">
                                                <option >quận / huyện</option>
                                            </select>
                                           
                                        </div>
                                    </div>
                                    <div class="  col-lg-4">    
                                        <label for="select" class=" form-control-label">Phường / Xã</label>
                                        <div class="{{ $errors->has('ward_id') ? ' has-error' : '' }}">
                                            <select class="form-control" name="ward_id" id="wards" style="height: auto;"  data-live-search="true">
                                                <option >phường/ xã</option>
                                            </select>
                                            <small class="text-danger">{{ $errors->first('ward_id') }}</small>
                                        </div>
                                    </div>
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
                            <div class="form-submit">
                                <a class="submit" id="next_button">Tiếp theo</a>
                            </div>
                        </div>
                        <div id="user_form" style="display:none" >
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
                            <div class="form-submit">
                                <a class="submit" id="pre_button" >Trở về</a>
                                <button class="submit" type="submit">Đăng ký</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="asset/register/vendor/nouislider/nouislider.min.js"></script>
    <script src="asset/register/vendor/wnumb/wNumb.js"></script>
    <script src="asset/register/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="asset/register/vendor/jquery-validation/dist/additional-methods.min.js"></script>
    {{-- <script src="asset/register/js/main.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
    <script>
        $(document).ready(function(){
          
          $("#next_button").click(function(){
              $("#shop_form").hide();
            
              $("#user_form").show();
          });
          $("#pre_button").click(function(){
              $("#shop_form").show();
            
              $("#user_form").hide();
          });
          // $("#hidePanel").click(function(){
          //     $("#panel").hide();
          // });
        
      });
      </script>
        <script type="text/javascript">
            $('#province').change(function(){
            var provinceID = $(this).val();    
            if(provinceID){
                $.ajax({
                   type:"GET",
                   url:"{{url('/getdistricts')}}?province_id="+provinceID,
                   success:function(res){               
                    if(res){
                        $("#districts").empty();
                        // $("#districts").append('<option>Select</option>');
                        $.each(res,function(key,value){
                            $("#districts").append('<option value="'+key+'">'+value+'</option>');
                        });
                   
                    }else{
                       $("#districts").empty();
                    }
                   }
                });
            }else{
                $("#districts").empty();
                $("#wards").empty();
            }      
           });
            $('#districts').on('change',function(){
            var districtsID = $(this).val();    
            if(districtsID){
                $.ajax({
                   type:"GET",
                   url:"{{url('/getwards')}}?districts_id="+districtsID,
                   success:function(res){               
                    if(res){
                        $("#wards").empty();
                        $.each(res,function(key,value){
                            $("#wards").append('<option value="'+key+'">'+value+'</option>');
                        });
                   
                    }else{
                       $("#wards").empty();
                    }
                   }
                });
            }else{
                $("#wards").empty();
            }
                
           });
          </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>