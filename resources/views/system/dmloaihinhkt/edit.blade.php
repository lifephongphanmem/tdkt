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
        Thông tin danh mục loại hình khen thưởng<small> chỉnh sửa</small>
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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'dmloaihinhkt'. $model->id, 'class'=>'horizontal-form','id'=>'update_dmloaihinhthuckt','files'=>true,'enctype'=>'multipart/form-data']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã danh hiệu</label>
                                        {!!Form::text('maloaihinhkt', null, array('id' => 'maloaihinhkt','class' => 'form-control required', 'readonly'=>'readonly'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên danh hiệu<span class="require">*</span></label>
                                        {!!Form::text('tenloaihinhkt', null, array('id' => 'tenloaihinhkt','class' => 'form-control required','autofocus'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Phân loại</label>
                                    <select class="form-control" name="phanloai" id="phanloai">
                                        <option value="Công trạng" {{($model->status == 'Công trạng' ? 'selected' : '')}}>Khen thưởng theo công trạng và thành tích</option>
                                        <option value="Đợt" {{($model->status == 'Đợt' ? 'selected' : '')}}>Khen thưởng theo đợt (hoặc chuyên đề)</option>
                                        <option value="Đột xuất" {{($model->status == 'Đột xuất' ? 'selected' : '')}}>Khen thưởng đột xuất</option>
                                        <option value="Cống hiến" {{($model->status == 'Cống hiến' ? 'selected' : '')}}>Khen thưởng quá trình cống hiến</option>
                                        <option value="Niên hạn" {{($model->status == 'Niên hạn' ? 'selected' : '')}}>Khen thưởng theo niên hạn</option>
                                        <option value="Đối ngoại" {{($model->status == 'Đối ngoại' ? 'selected' : '')}}>Khen thưởng đối ngoại</option>
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