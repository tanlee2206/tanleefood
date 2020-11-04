@extends('admin.layouts.master')

@section('title')
	chỉnh sửa danh mục
@endsection
@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-md-10 offset-md-3 mr-auto ml-auto">
            <div class="card">
                <div class="card-header">
                    <small> chỉnh sửa</small>
                    <strong>Danh mục</strong>
                </div>
                <div class="card-body card-block">
                      <div class="row form-group">
                        <div class="col-8">
                        <form action="{{route('category.update',$category->id)}}" method="POST" >
                            @csrf
                            @method('PUT')
                            <div class="row">
                               
                                <div class="form-group col-lg-12">
                                    <label  class=" form-control-label {{ $errors->has('name') ? ' has-error' : '' }}">name</label>
                                    <input type="text" name="name" id="name" value="{{ $category->name }}" placeholder="" class="form-control">
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label  class=" form-control-label">Slug</label>
                                    <input type="text" name="slug" id="slug" value="{{ $category->slug }}" placeholder="" class="form-control">
                                
                                </div>
                                <div class="form-group col-lg-12 {{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label  class=" form-control-label">mô tả </label>
                                    <textarea class="form-control"  name="description">
                                        {{$category->description }}
                                    </textarea>
                                    <small class="text-danger">{{ $errors->first('description') }}</small>
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
                                        @if($category->img != null)
                                        {{ $category->img }}
                                        @else
                                        asset/admin/images/image-placeholder.jpg
                                        @endif
                                        " width="250" height="250" alt="">
                                        @endif
                                        
                                    </div>
                                  </a>
                                </span>
                                <input hidden id="thumbnail" class="form-control" value="
                                @if($category->img != null)
                                {{ $category->img }}
                                @else
                                asset/admin/images/image-placeholder.jpg
                                @endif
                                "  name="img">
                                
                              </div>
                              <small class="text-danger">{{ $errors->first('img') }}</small>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
     $('#lfm').filemanager('image');
</script>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

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