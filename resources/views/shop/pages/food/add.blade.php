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
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="" class="form-control">
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                            <div class="form-group">
                                <label  class=" form-control-label {{ $errors->has('price') ? ' has-error' : '' }}">Giá</label>
                                <input type="text" name="price" value="{{ old('price') }}" placeholder="" class="form-control">
                                <small class="text-danger">{{ $errors->first('price') }}</small>
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
                     
                   
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label  class=" form-control-label">Mô tả</label>
                        <textarea class="form-control" value="{{ old('description') }}" id="summary-ckeditor" name="description">
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