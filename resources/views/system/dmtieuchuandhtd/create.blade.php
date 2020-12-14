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
        Thông tin danh mục tiêu chuẩn danh hiệu thi đua<small> thêm mới</small>
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
                    {!! Form::open(['url'=>'dmtieuchuandhtd', 'id' => 'create_dmtieuchuandhtd', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã tiêu chuẩn<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="matieuchuandhtd" id="matieuchuandhtd" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên tiêu chuẩn<span class="require">*</span></label>
                                        <input type="text" class="form-control required"  name="tentieuchuandhtd" id="tentieuchuandhtd">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ghi chú</label>
                                        <input type="text" class="form-control"  name="ghichu" id="ghichu">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    <!-- END FORM-->
            </div>
            <div style="text-align: center">
                <a href="{{url('dmtieuchuandhtd')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_dmtieuchuandhtd").validate({
                rules: {
                    matieuchuandhtd :"required",
                    tentieuchuandhtd :"required",

                },
                messages: {
                    matieuchuandhtd :"Chưa nhập dữ liệu",
                    tentieuchuandhtd :"Chưa nhập dữ liệu",
                }
            });
        }
    </script>
    <script>
        $('input[name="matieuchuandhtd"]').change(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'GET',
                url: '/checkmatieuchuandhtd',
                data: {
                    _token: CSRF_TOKEN,
                    matieuchuandhtd:$(this).val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status != 'success') {
                        toastr.error("Bạn cần nhập lại mã tiêu chuẩn danh hiệu thi đua", "Mã tiêu chuẩn danh hiệu thi đua nhập vào đã tồn tại!!!");
                        $('input[name="matieuchuandhtd"]').val('');
                        $('input[name="matieuchuandhtd"]').focus();
                    }else
                        toastr.success("Mã tiêu chuẩn danh hiệu thi đua sử dụng được!", "Thành công!");
                }

            });
        });
    </script>
@stop