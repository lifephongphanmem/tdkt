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
        Thông tin danh mục hình thức khen thưởng<small> thêm mới</small>
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
                    {!! Form::open(['url'=>'dmhinhthuckt', 'id' => 'create_dmhinhthuckt', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã danh hiệu<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="mahinhthuckt" id="mahinhthuckt" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên danh hiệu<span class="require">*</span></label>
                                        <input type="text" class="form-control required"  name="tenhinhthuckt" id="tenhinhthuckt">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Phân loại</label>
                                        <select class="form-control" name="phanloai" id="phanloai">
                                            <option value="Xã" selected>Hình thức khen thưởng cấp Xã</option>
                                            <option value="Huyện">Hình thức khen thưởng cấp Huyện</option>
                                            <option value="Tỉnh">Hình thức khen thưởng cấp Tỉnh</option>
                                            <option value="Trung ương">Hình thức khen thưởng cấp Trung ương</option>
                                        </select>
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
            <div style="text-align: center">
                <a href="{{url('dmhinhthuckt')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_dmhinhthuckt").validate({
                rules: {
                    mahinhthuckt :"required",
                    tenhinhthuckt :"required",

                },
                messages: {
                    mahinhthuckt :"Chưa nhập dữ liệu",
                    tenhinhthuckt :"Chưa nhập dữ liệu",
                }
            });
        }
    </script>
    <script>
        $('input[name="mahinhthuckt"]').change(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'GET',
                url: '/checkmahinhthuckt',
                data: {
                    _token: CSRF_TOKEN,
                    mahinhthuckt:$(this).val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status != 'success') {
                        toastr.error("Bạn cần nhập lại mã Hình thức khen thưởng", "Mã Hình thức khen thưởng nhập vào đã tồn tại!!!");
                        $('input[name="mahinhthuckt"]').val('');
                        $('input[name="mahinhthuckt"]').focus();
                    }else
                        toastr.success("Mã Hình thức khen thưởng sử dụng được!", "Thành công!");
                }

            });
        });
    </script>
@stop