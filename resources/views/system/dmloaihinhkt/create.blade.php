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
                    {!! Form::open(['url'=>'dmloaihinhkt', 'id' => 'create_dmloaihinhkt', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã loại hình<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="maloaihinhkt" id="maloaihinhkt" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên loại hình<span class="require">*</span></label>
                                        <input type="text" class="form-control required"  name="tenloaihinhkt" id="tenloaihinhkt">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Phân loại</label>
                                        <select class="form-control" name="phanloai" id="phanloai">
                                            <option value="Công trạng" selected>Khen thưởng theo công trạng và thành tích</option>
                                            <option value="Đợt">Khen thưởng theo đợt (hoặc chuyên đề)</option>
                                            <option value="Đột xuất">Khen thưởng đột xuất</option>
                                            <option value="Cống hiến">Khen thưởng quá trình cống hiến</option>
                                            <option value="Niên hạn">Khen thưởng theo niên hạn</option>
                                            <option value="Đối ngoại">Khen thưởng đối ngoại</option>
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
                <a href="{{url('dmloaihinhkt')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_dmloaihinhkt").validate({
                rules: {
                    maloaihinhkt :"required",
                    tenloaihinhkt :"required",

                },
                messages: {
                    maloaihinhkt :"Chưa nhập dữ liệu",
                    tenloaihinhkt :"Chưa nhập dữ liệu",
                }
            });
        }
    </script>
    <script>
        $('input[name="maloaihinhkt"]').change(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'GET',
                url: '/checkmaloaihinhkt',
                data: {
                    _token: CSRF_TOKEN,
                    mahinhthuckt:$(this).val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status != 'success') {
                        toastr.error("Bạn cần nhập lại mã loại hình khen thưởng", "Mã loại hình khen thưởng nhập vào đã tồn tại!!!");
                        $('input[name="maloaihinhkt"]').val('');
                        $('input[name="maloaihinhkt"]').focus();
                    }else
                        toastr.success("Mã Hình thức khen thưởng sử dụng được!", "Thành công!");
                }

            });
        });
    </script>
@stop