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
                    <div class="form-group">
                        <label for="company" class=" form-control-label">Tên món</label>
                        <input type="text" id="company" placeholder="" class="form-control">
                    </div>
                    <div class="input-group">
                        <span class="input-group-btn">
                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                          </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="filepath">
                      </div>
                      <div id="holder" style="margin-top:15px;max-height:100px;">
                      </div>
                    <div class="form-group">
                        <label for="vat" class=" form-control-label">Giá</label>
                        <input type="text" id="vat" placeholder="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="street" class=" form-control-label">Mô tả</label>
                        <input type="text" id="street" placeholder="" class="form-control">
                    </div>
                    <div class="row form-group">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="city" class=" form-control-label">Danh mục</label>
                                <input type="text" id="city" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="postal-code" class=" form-control-label">Khuyến mãi</label>
                                <input type="text" id="postal-code" placeholder="" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
      </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="vendor/laravel-filemanager/js/lfm.js"></script>
<script>
     $('#lfm').filemanager('image');
</script>
@endsection