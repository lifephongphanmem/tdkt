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
        Thông tin phiếu chi<small> chỉnh sửa</small>
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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'qlchihdtdkt/'. $model->id, 'class'=>'horizontal-form','id'=>'update_qlchihdtdkt','files'=>true,'enctype'=>'multipart/form-data']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã phiếu chi</label>
                                        {!!Form::text('maphieu', null, array('id' => 'maphieu','class' => 'form-control required', 'readonly'=>'readonly'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ngày tháng<span class="require">*</span></label>
                                        {!!Form::date('ngaythang', null, array('id' => 'ngaythang','class' => 'form-control','autofocus'))!!}
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Phân loại</label>
                                        {!!Form::text('phanloai', null, array('id' => 'phanloai','class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nội dung<span class="require">*</span></label>
                                        {!!Form::text('noidung', null, array('id' => 'noidung','class' => 'form-control required','autofocus'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số tiền</label>
                                    {!!Form::text('sotien', null, array('id' => 'sotien','class' => 'form-control','data-mask'=>'fdecimal'))!!}
                                </div>
                            </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ghi chú</label>
                                        {!!Form::text('ghichu', null, array('id' => 'ghichu','class' => 'form-control '))!!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- END FORM-->
                </div>
            </div>
            <div style="text-align: center">
                <a href="{{url('qlchihdtdkt')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_qlchihdtdkt").validate({
                rules: {
                    noidung :"required",
                },
                messages: {
                    noidung :"Chưa nhập dữ liệu",
                }
            });
        }
    </script>
    @include('includes.script.create-header-scripts')
    @include('includes.script.inputmask-ajax-scripts')
@stop