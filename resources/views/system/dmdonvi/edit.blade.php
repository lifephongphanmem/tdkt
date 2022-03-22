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
        Thông tin đơn vị<small> chỉnh sửa</small>
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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'dmdonvi/'. $model->id, 'class'=>'horizontal-form','id'=>'update_dmdonvi','files'=>true,'enctype'=>'multipart/form-data']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã đơn vị</label>
                                        {!!Form::text('madonvi', null, array('id' => 'madonvi','class' => 'form-control required', 'readonly'=>'readonly'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên đơn vị<span class="require">*</span></label>
                                        {!!Form::text('tendonvi', null, array('id' => 'tendonvi','class' => 'form-control required','autofocus'))!!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Chức vụ người ký<span class="require">*</span></label>
                                        {!!Form::text('cdlanhdao', null, array('id' => 'cdlanhdao','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Chức vụ người ký thay</label>
                                        {!!Form::text('chucvukythay', null, array('id' => 'chucvukythay','class' => 'form-control'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Họ và tên người ký<span class="require">*</span></label>
                                        {!!Form::text('lanhdao', null, array('id' => 'lanhdao','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa danh<span class="require">*</span></label>
                                        {!!Form::text('diadanh', null, array('id' => 'didanh','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa chỉ<span class="require">*</span></label>
                                        {!!Form::text('diachi', null, array('id' => 'diachi','class' => 'form-control required'))!!}
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
                <a href="{{url('/DonVi/DanhSach?madiaban='.$model->madiaban)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_dmdonvi").validate({
                rules: {
                    tendanhhieu :"required",
                },
                messages: {
                    tendanhhieu :"Chưa nhập dữ liệu",
                }
            });
        }
    </script>
@stop