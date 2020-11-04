@extends('shop.layouts.master')

@section('title')
		Trang chủ
@endsection

@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-md-10 offset-md-3 mr-auto ml-auto">
            <div class="card">
                <div class="card-header">
                    <small> Thêm mới</small>
                    <strong>Món ăn</strong>
                </div>
                <div class="card-body card-block">
                      <div class="row form-group">
                        <div class="col-8">
                        <form action="{{route('food.store')}}" method="POST" >
                                @csrf
                            <div class="form-group">
                                <label  class=" form-control-label {{ $errors->has('name') ? ' has-error' : '' }}">Tên món</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="" class="form-control">
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                            <div class="form-group">
                                <label  class=" form-control-label">Slug</label>
                                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" placeholder="" class="form-control">
                            
                            </div>
                            
                            <div class="form-group">
                                <label  class=" form-control-label {{ $errors->has('price') ? ' has-error' : '' }}">Giá</label>
                                <input type="text" name="price" value="{{ old('price') }}" placeholder="" class="form-control">
                                <small class="text-danger">{{ $errors->first('price') }}</small>
                            </div>
                            <div class="form-group">
                                <label  class=" form-control-label {{ $errors->has('sale') ? ' has-error' : '' }}">Giảm giá (%)</label>
                                <input type="text" name="sale" value="{{ old('sale') }}" placeholder="" class="form-control">
                                <small class="text-danger">{{ $errors->first('sale') }}</small>
                            </div>
                            <div class=" form-group">
                                
                                    <label for="select" class=" form-control-label">Danh mục</label>
                         
                                <div class="{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                   {{-- @if (old("category_id"))
                                   {{ dd(old("category_id")) }}
                                   @endif  --}}
                                    <select class="selectpicker form-control" name="category_id[]"  multiple="multiple" data-live-search="true">
                                        @foreach ($category as $category)
                                          <option value="{{ $category->id }}" {{ (collect(old('category_id'))->contains($category->id)) ? 'selected':'' }} >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">{{ $errors->first('category_id') }}</small>
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
                                            <img src="asset/admin/images/image-placeholder.jpg" width="270" height="250" alt="">
                                            @endif
                                        </div>
                                      </a>
                                    </span>
                                    <input hidden id="thumbnail" class="form-control" value="{{ old('img') }}"  name="img">  
                                </div> 
                                {{------------------------------ hình nhỏ ----------------------}}
                                <div class="input-group form-group col-lg-4 ">
                                    <span class="input-group-btn">
                                      <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn">
                                        <div id="holder1" >
                                            @if ((old('img') != null))
                                            <img src="{{ old('img') }}" width="70" height="70" alt="">
                                            @else
                                            <img src="asset/admin/images/image-placeholder.jpg" width="70" height="70" alt="">
                                            @endif
                                        </div>
                                      </a>
                                    </span>
                                    <input hidden id="thumbnail1" class="form-control" value="{{ old('img') }}"  name="img1">  
                                </div>
                                <div class="input-group form-group col-lg-4 ">
                                    <span class="input-group-btn">
                                      <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn">
                                        <div id="holder2" >
                                            @if ((old('img') != null))
                                            <img src="{{ old('img') }}" width="70" height="70" alt="">
                                            @else
                                            <img src="asset/admin/images/image-placeholder.jpg" width="70" height="70" alt="">
                                            @endif
                                        </div>
                                      </a>
                                    </span>
                                    <input hidden id="thumbnail2" class="form-control" value="{{ old('img') }}"  name="img2">  
                                </div>
                                <div class="input-group form-group col-lg-4 ">
                                    <span class="input-group-btn">
                                      <a id="lfm3" data-input="thumbnail3" data-preview="holder3" class="btn">
                                        <div id="holder3" >
                                            @if ((old('img') != null))
                                            <img src="{{ old('img') }}" width="70" height="70" alt="">
                                            @else
                                            <img src="asset/admin/images/image-placeholder.jpg" width="70" height="70" alt="">
                                            @endif
                                        </div>
                                      </a>
                                    </span>
                                    <input hidden id="thumbnail3" class="form-control" value="{{ old('img') }}"  name="img3">  
                                </div>
                                <small class="text-danger">{{ $errors->first('img') }}</small>
                            </div>
                        </div>
                    </div>
                     
                   
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label  class=" form-control-label">Mô tả</label>
                        <textarea class="form-control" id="summary-ckeditor" name="description">
                            {{ old('description') }}
                        </textarea>
                        <small class="text-danger">{{ $errors->first('description') }}</small>
                    </div>
                    {{-- <div class="row form-group">
                        <div class="col-8">
                            <div class="form-group">
                                <label  class=" form-control-label">Danh mục</label>
                                <input type="text" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label  class=" form-control-label">Khuyến mãi</label>
                                <input type="text"  placeholder="" class="form-control">
                            </div>
                        </div>
                    </div> --}}
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
     $('#lfm1').filemanager('image');
     $('#lfm2').filemanager('image');
     $('#lfm3').filemanager('image');
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