@extends('admin.layouts.master')

@section('title')
	Thêm tin tức
@endsection
@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-md-10 offset-md-3 mr-auto ml-auto">
            <div class="card">
                <div class="card-header">
                    <small> Thêm mới</small>
                    <strong>Tin tức</strong>
                </div>
                <div class="card-body card-block">
                      <div class="row form-group">
                        <div class="col-8">
                        <form action="{{route('news.store')}}" method="POST" >
                                @csrf
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label  class=" form-control-label {{ $errors->has('title') ? ' has-error' : '' }}">Tiêu đề</label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="" class="form-control">
                                    <small class="text-danger">{{ $errors->first('title') }}</small>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label  class=" form-control-label">Slug</label>
                                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" placeholder="" class="form-control">
                                
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
                    <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
                        <label  class=" form-control-label">nội dung</label>
                        <textarea class="form-control" id="summary-ckeditor" name="content">
                            {{ old('content') }}
                        </textarea>
                        <small class="text-danger">{{ $errors->first('content') }}</small>
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
<script>
    $('#title').change(function(e) {
      $.get('{{ route('pages.check_slug') }}', 
        { 'name': $(this).val() }, 
        function( data ) {
          $('#slug').val(data.slug);
        }
      );
    });
  </script>
@endsection