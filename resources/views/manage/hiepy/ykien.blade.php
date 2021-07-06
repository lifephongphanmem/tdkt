@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>

@stop

@section('content')


    <h3 class="page-title">
        Thông tin hiệp y khen thưởng<small> Thêm ý kiến</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <!--div class="portlet-title">
                </div-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::model($model, ['method' => 'POST', 'url'=>'hiepykhenthuong/storeyk', 'class'=>'horizontal-form','id'=>'update_hiepykhenthuong','files'=>true,'enctype'=>'multipart/form-data']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã hiệp y</label>
                                        {!!Form::text('mahiepy', null, array('id' => 'mahiepy','class' => 'form-control required', 'readonly'=>'readonly'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên đối tượng<span class="require">*</span></label>
                                        {!!Form::text('tendoituong', null, array('id' => 'tendoituong','class' => 'form-control required','readonly'=>'readonly'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nội dung<span class="require">*</span></label>
                                    {!!Form::text('noidung', null, array('id' => 'noidung','class' => 'form-control required', 'readonly'=>'readonly'))!!}
                                </div>
                            </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ghi chú</label>
                                        {!!Form::text('ghichu', null, array('id' => 'ghichu','class' => 'form-control ', 'readonly'=>'readonly'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Ý kiến<span class="require">*</span></label>
                                {!! Form::textarea('ykien', null, ['id' => 'ykien', 'rows' => 4, 'cols' => 10, 'class' => 'form-control required']) !!}
                                @if ($errors->has('ykien'))
                                    <em class="invalid">{{$errors->first('ykien')}}</em>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <input name="id" id="id" value="{{$model->id}}" hidden>
                <input name="madonvi" id="madonvi" value="{{session('admin')->madonvi}}" hidden>

                <!-- END FORM-->
                </div>
            </div>
            <div style="text-align: center">
                <a href="{{url('hiepykhenthuong')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_hiepykhenthuong").validate({
                rules: {
                    tendoituong :"required",
                },
                messages: {
                    tendoituong :"Chưa nhập dữ liệu",
                }
            });
        }
    </script>
@stop