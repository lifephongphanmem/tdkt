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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'qldoituongcn/'. $model->id, 'class'=>'horizontal-form','id'=>'update_qldoituongcn','files'=>true,'enctype'=>'multipart/form-data']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="form-body">
                        <div class="row">
                            <!--div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Mã đơn vị<span class="require">*</span></label>
                                    <input type="text" class="form-control required" name="madonvi" id="madonvi" autofocus>
                                </div>
                            </div-->
                            {!!Form::text('madt',null, array('id' => 'madt','class' => 'form-control hidden'))!!}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Tên đối tượng<span class="require">*</span></label>
                                    {!!Form::text('tendt',null, array('id' => 'tendt','class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày sinh<span class="require">*</span></label>
                                    {!! Form::input('date', 'ngaysinh', null, array('id' => 'ngaysinh', 'class' => 'form-control','required'))!!}
                                    @if ($errors->has('tgiantgkc'))
                                        <em class="invalid">{{ $errors->first('tgiantgkc') }}</em>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Giới tính</label>
                                    <select class="form-control" name="gioitinh" id="gioitinh">
                                        <option value="Nam" >Nam</option>
                                        <option value="Nữ" >Nữ</option>
                                        <option value="Khác" >Khác</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Phân loại đối tượng</label>
                                    <select class="form-control" name="phanloaict" id="phanloaict">
                                        @foreach($m_pl as $tt)
                                            <option value="{{$tt->maplct}}" @if($model->phanloaict == $tt->maplct) selected @endif >{{$tt->tenplct}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Mã định danh cá nhân<span class="require">*</span></label>
                                    {!!Form::text('madinhdanh',null, array('id' => 'madinhdanh','class' => 'form-control required'))!!}
                                    @if ($errors->has('madinhdanh'))
                                        <em class="invalid">{{ $errors->first('madinhdanh') }}</em>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Địa chỉ</label>
                                    {!!Form::text('diachi',null, array('id' => 'diachi','class' => 'form-control '))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nguyên quán</label>
                                    {!!Form::text('nguyenquan',null, array('id' => 'nguyenquan','class' => 'form-control '))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Trú quán</label>
                                    {!!Form::text('truquan',null, array('id' => 'truquan','class' => 'form-control '))!!}

                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                    </div>

                    <!-- END FORM-->
                </div>
            </div>
            <div style="text-align: center">
                <a href="{{url('qldoituongcn')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_qldoituongcn").validate({
                rules: {
                    tendt :"required",
                    madinhdanh :"required",
                },
                messages: {
                    tendt :"Chưa nhập dữ liệu",
                    madinhdanh :"Chưa nhập dữ liệu",
                }
            });
        }
    </script>
    <script>
        $('input[name="madinhdanh"]').change(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'GET',
                url: '/checkmadinhdanh',
                data: {
                    _token: CSRF_TOKEN,
                    madinhdanh:$(this).val(),
                    madt:$('#madt').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status != 'success') {
                        toastr.error("Bạn cần nhập lại mã định danh cá nhân", "Mã định danh cá nhân nhập vào đã tồn tại!!!");
                        $('input[name="madinhdanh"]').val('');
                        $('input[name="madinhdanh"]').focus();
                    }else
                        toastr.success("Mã định danh cá nhân sử dụng được!", "Thành công!");
                }

            });
        });
    </script>
@stop