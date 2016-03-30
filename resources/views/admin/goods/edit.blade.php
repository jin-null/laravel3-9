@extends('admin.layouts.layout')
@section('css')
    <link href="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.css" rel="stylesheet" type="text/css"/>
@endsection()
@section('content')
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>新增商品
            </div>

        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form class="form-horizontal" role="form" action="{{route('admin.good.update',$good->id)}}" method="post">
                {!! method_field('put') !!}}   {!! csrf_field() !!}
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">商品名称</label>

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="name" value="{{$good->name}}">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">商品分类</label>

                        <div class="col-md-4">

                            <select id="select2-single-input-sm" name="category_id"
                                    class="form-control input-sm select2-multiple select2-hidden-accessible"
                                    tabindex="-1" aria-hidden="true">

                                <option value="0">顶级栏目</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                        @if($good->category_id==$category->id) selected @endif>
                                    {{ blank_to_category($category->count) }}{{$category->name}}</option>
                                @endforeach

                            </select>
                            <span class="select2 select2-container select2-container--bootstrap select2-container--below"
                                  dir="ltr">
                                <span class="selection">
                                    <span class="select2-selection select2-selection--single" role="combobox"
                                          aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"
                                          tabindex="0"
                                          aria-labelledby="select2-select2-single-input-sm-container">
                                        <span class="select2-selection__rendered"
                                              id="select2-select2-single-input-sm-container"
                                              title="Alaska">
                                        </span>
                                        <span class="select2-selection__arrow" role="presentation"><b
                                                    role="presentation"></b>
                                        </span>
                                    </span>
                                </span>
                                <span class="dropdown-wrapper" aria-hidden="true"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">商品品牌</label>

                        <div class="col-md-4">

                            <select id="select2-single-input-sm" name="brand_id"
                                    class="form-control input-sm select2-multiple select2-hidden-accessible"
                                    tabindex="-1" aria-hidden="true">

                                <option value="0">选择品牌</option>
                                @foreach($brands as $brand)
                                <option value="{{$brand->id}}"
                                        @if($good->brand_id==$brand->id) selected @endif>
                                    {{$brand->name}}</option>
                                @endforeach

                            </select>
                            <span class="select2 select2-container select2-container--bootstrap select2-container--below"
                                  dir="ltr">
                                <span class="selection">
                                    <span class="select2-selection select2-selection--single" role="combobox"
                                          aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"
                                          tabindex="0"
                                          aria-labelledby="select2-select2-single-input-sm-container">
                                        <span class="select2-selection__rendered"
                                              id="select2-select2-single-input-sm-container"
                                              title="Alaska">
                                        </span>
                                        <span class="select2-selection__arrow" role="presentation"><b
                                                    role="presentation"></b>
                                        </span>
                                    </span>
                                </span>
                                <span class="dropdown-wrapper" aria-hidden="true"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">商品价格</label>

                        <div class="col-md-4">
                            <div class="input-group bootstrap-touchspin">

                                <span class="input-group-addon bootstrap-touchspin-prefix"
                                      style="display: none;"></span>
                                <input id="touchspin_6" type="text" value="{{$good->price}}" name="price" class="form-control"
                                       style="display: block;">
                                <span class="input-group-addon bootstrap-touchspin-postfix"
                                      style="display: none;"></span>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">商品库存数量</label>

                        <div class="col-md-4">
                            <div class="input-group bootstrap-touchspin">

                                <span class="input-group-addon bootstrap-touchspin-prefix"
                                      style="display: none;"></span>
                                <input id="touchspin_5" type="text" value="{{$good->inventory}}" name="inventory"
                                       class="form-control" style="display: block;">
                                <span class="input-group-addon bootstrap-touchspin-postfix"
                                      style="display: none;"></span>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">加入推荐</label>

                        <div class="col-md-4">
                            <div class="btn-group" data-toggle="buttons">
                                <label @if ($good->recommend==1)class="btn btn-default active"
                                       @else class="btn btn-default" @endif >
                                    <input type="checkbox" class="toggle" name="recommend" value="1"> 推荐 </label>
                                <label @if ($good->new==1)class="btn btn-default active"
                                @else class="btn btn-default" @endif >
                                    <input type="checkbox" class="toggle" name="new" value="1"> 新品 </label>
                                <label @if ($good->hot==1)class="btn btn-default active"
                                        @else class="btn btn-default" @endif >
                                    <input type="checkbox" class="toggle" name="hot"  value="1"> 热卖 </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" name="onsale">上架</label>

                        <div class="col-md-4">

                            <input type="checkbox" value="1" name="onsale" checked=""> 选中表示允许销售，否则不允许销售。
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 分类代表图片 </label>

                        <div class="col-sm-9">

                            <img id="img_show" class="editable img-responsive" src=""
                                 style="width:160px; height:140px;display: none">

                            <input type="text" style="display: none;" placeholder="品牌Logo" class="col-xs-10 col-sm-5"
                                   name="thumb" id="img">
                            <input type="file" style="display: none;" id="thumb">


                            <button class="btn btn-app btn green-meadow" id="thumb_upload">
                                <i class="fa fa-file fileinput-exists" id="loading" name="thumb">选择要上传的缩略图</i>
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">内容描述</label>

                        <div class="col-md-6">
                            <textarea id="editor_id" name="desc" style="width:700px;height:300px;">
                            </textarea>
                        </div>
                    </div>


                    {{--<div class="form-group">--}}
                    {{--<label class="col-md-3 control-label">排序</label>--}}

                    {{--<div class="col-md-2">--}}
                    {{--<input type="text" class="form-control" name="sort_order" value="99">--}}

                    {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div class="form-actions fluid">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green">Submit</button>
                            <button type="button" class="btn default">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END FORM-->
        </div>
    </div>
@endsection

@section('js')
    <script src="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.js" type="text/javascript"></script>
    {{--<script src="/assets/global/plugins/fuelux/js/spinner.min.js" type="text/javascript"></script>--}}
    <script src="/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
    <script src="/assets/pages/scripts/components-bootstrap-touchspin.min.js" type="text/javascript"></script>

    <script src="/assets/xshop/jquery.html5-fileupload.js"></script>
    <script src="/assets/xshop/upload.js"></script>


    <!-- page specific plugin scripts -->
    <script charset="utf-8" src="/assets/global/plugins/kindeditor/kindeditor.js"></script>
    <script charset="utf-8" src="/assets/global/plugins/kindeditor/lang/zh_CN.js"></script>
    <script>
        KindEditor.ready(function(K) {
            window.editor = K.create('#editor_id');
        });
    </script>



@endsection