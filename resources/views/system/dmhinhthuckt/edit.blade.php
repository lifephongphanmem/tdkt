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
        Thông tin danh mục Hình thức khen thưởng<small> chỉnh sửa</small>
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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'dmhinhthuckt/'. $model->id, 'class'=>'horizontal-form','id'=>'update_dmhinhthuckt','files'=>true,'enctype'=>'multipart/form-data']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã danh hiệu</label>
                                        {!!Form::text('mahinhthuckt', null, array('id' => 'mahinhthuckt','class' => 'form-control required', 'readonly'=>'readonly'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên danh hiệu<span class="require">*</span></label>
                                        {!!Form::text('tenhinhthuckt', null, array('id' => 'tenhinhthuckt','class' => 'form-control required','autofocus'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Phân loại</label>
                                    <select class="form-control" name="phanloai" id="phanloai">
                                        <option value="Xã" {{($model->status == 'Xã' ? 'selected' : '')}}>Hình thức khen thưởng cấp Xã</option>
                                        <option value="Huyện" {{($model->status == 'Huyện' ? 'selected' : '')}}>Hình thức khen thưởng cấp Huyện</option>
                                        <option value="Tỉnh" {{($model->status == 'Tỉnh' ? 'selected' : '')}}>Hình thức khen thưởng cấp Tỉnh</option>
                                        <option value="Trung ương" {{($model->status == 'Trung ương' ? 'selected' : '')}}>Hình thức khen thưởng cấp Trung ương</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
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

            var validator = $("#update_dmhinhthuckt").validate({
                rules: {
                    tenhinhthuckt :"required",
                },
                messages: {
                    tenhinhthuckt :"Chưa nhập dữ liệu",
                }
            });
        }
    </script>
@stop