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
        Thông tin phiếu chi<small> thêm mới</small>
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
                    {!! Form::open(['url'=>'qlchihdtdkt', 'id' => 'create_qlchihdtdkt', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã phiếu chi<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="maphieu" id="maphieu" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ngày tháng<span class="require">*</span></label>
                                        <input type="date" name="ngaythang" id="ngaythang" class="form-control"/>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Phân loại</label>
                                        <select id="phanloai" name="phanloai" class="form-control js-example-basic-single">
                                            @foreach($modelpl as $pl)
                                                <option value="{{$pl->madmchi}}">{{$pl->phanloai}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nội dung<span class="require">*</span></label>
                                        <input type="text" class="form-control required"  name="noidung" id="noidung">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số tiền<span class="require">*</span></label>
                                        <input type="text" class="form-control required" data-mask="fdecimal" name="sotien" id="sotien">
                                    </div>
                                </div>
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
            <input name="madonvi" id="madonvi" value="{{session('admin')->madonvi}}" hidden>
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

            var validator = $("#create_qlchihdtdkt").validate({
                rules: {
                    maphieu :"required",
                    noidung :"required",

                },
                messages: {
                    maphieu :"Chưa nhập dữ liệu",
                    noidung :"Chưa nhập dữ liệu",
                }
            });
        }
    </script>
    <script>
        $('input[name="maphieu"]').change(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'GET',
                url: '/checkmaphieu',
                data: {
                    _token: CSRF_TOKEN,
                    maphieu:$(this).val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status != 'success') {
                        toastr.error("Bạn cần nhập lại mã phiếu chi", "Mã phiếu chi nhập vào đã tồn tại!!!");
                        $('input[name="maphieu"]').val('');
                        $('input[name="maphieu"]').focus();
                    }else
                        toastr.success("Mã phiếu chi sử dụng được!", "Thành công!");
                }

            });
        });
    </script>
    @include('includes.script.create-header-scripts')
    @include('includes.script.inputmask-ajax-scripts')
@stop