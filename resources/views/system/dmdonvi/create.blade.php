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
        Thông tin đơn vị<small> thêm mới</small>
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
                    {!! Form::open(['url'=>'/DonVi/Them', 'id' => 'create', 'class'=>'horizontal-form']) !!}
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Mã quan hệ ngân sách</label>
                                    <input type="text" class="form-control" name="maqhns" id="maqhns">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Tên đơn vị<span class="require">*</span></label>
                                    <input type="text" class="form-control required" name="tendonvi" id="tendonvi" required autofocus/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Tên đơn vị hiển thị báo cáo<span class="require">*</span></label>
                                    {!!Form::text('tendvhienthi', null, array('id' => 'tendvhienthi','class' => 'form-control', 'required'))!!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Tên đơn vị cấp trên</label>
                                    {!!Form::text('tendvcqhienthi', null, array('id' => 'tendvcqhienthi','class' => 'form-control'))!!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Địa chỉ trụ sở</label>
                                    <input type="text" class="form-control" name="diachi" id="diachi">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Địa danh</label>
                                    {!!Form::text('diadanh', null, array('id' => 'didanh','class' => 'form-control'))!!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Chức vụ người ký</label>
                                    {!!Form::text('chucvuky', null, array('id' => 'chucvuky','class' => 'form-control'))!!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Họ và tên người ký</label>
                                    {!!Form::text('nguoiky', null, array('id' => 'nguoiky','class' => 'form-control'))!!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Chức vụ người ký thay</label>
                                    {!!Form::text('chucvukythay', null, array('id' => 'chucvukythay','class' => 'form-control'))!!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Địa bàn quản lý</label>
                                    {!! Form::select('madiaban', getDiaBan_All(), $inputs['madiaban'], array('id'=>'madiaban','class'=>'form-control'))!!}
                                </div>
                            </div>
                        </div>


{{--                        <div id="quanly" class="row">--}}
{{--                            <div class="col-md-4">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label">Email quản lý</label>--}}
{{--                                    <input type="text" class="form-control" name="emailql" id="emailql">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-md-4">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label">Email quản trị</label>--}}
{{--                                    <input type="text" class="form-control" name="emailqt" id="emailqt">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-md-4">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label">Số ngày làm việc</label>--}}
{{--                                    {!! Form::select('songaylv', array(--}}
{{--                                    '1'=>'1','2'=>'2','3'=>'3','4'=>'4',--}}
{{--                                    '5'=>'5','6'=>'6','7'=>'7',--}}
{{--                                    ),2, array('id'=>'songaylv','class'=>'form-control'))!!}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row">--}}
{{--                            <div class="col-md-4">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label">Tài khoản truy cập<span class="require">*</span></label>--}}
{{--                                    {!!Form::text('username', null, array('id' => 'username','class' => 'form-control', 'required'))!!}--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-md-4">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label">Mật khẩu<span class="require">*</span></label>--}}
{{--                                    {!!Form::text('password', null, array('id' => 'password','class' => 'form-control', 'required'))!!}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Thông tin liên hệ </label>
                                    <textarea id="ttlienhe" class="form-control" name="ttlienhe" cols="10" rows="5"
                                              placeholder="Thông tin, số điện thoại liên lạc với các bộ phận"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- END FORM-->
                </div>
            </div>

            <div style="text-align: center">
                <a href="{{url('DonVi/DanhSach?madiaban='.$inputs['madiaban'])}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" onclick="validateForm()" class="btn green"><i class="fa fa-check"></i> Hoàn thành</button>
            </div>
        {!! Form::close() !!}
        <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_dmdonvi").validate({
                rules: {
                    madonvi :"required",
                    tendanhhieutd :"required",

                },
                messages: {
                    madonvi :"Chưa nhập dữ liệu",
                    tendanhhieutd :"Chưa nhập dữ liệu",
                }
            });
        }
    </script>
    <script>
        $('input[name="madonvi"]').change(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'GET',
                url: '/checkmadonvi',
                data: {
                    _token: CSRF_TOKEN,
                    madonvi:$(this).val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status != 'success') {
                        toastr.error("Bạn cần nhập lại mã danh hiệu thi đua", "Mã danh hiệu thi đua nhập vào đã tồn tại!!!");
                        $('input[name="madonvi"]').val('');
                        $('input[name="madonvi"]').focus();
                    }else
                        toastr.success("Mã danh hiệu thi đua sử dụng được!", "Thành công!");
                }

            });
        });
    </script>
@stop