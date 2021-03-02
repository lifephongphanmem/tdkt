@extends('main')

@section('custom-style')

@stop


@section('custom-script')

@stop

@section('content')


    <h3 class="page-title">
       Báo cáo tổng hợp<small>07.01N/BNV-TĐKT</small>
    </h3>
    <!-- END PAGE HEADER-->
<hr>
    <!-- BEGIN DASHBOARD STATS -->
            {!! Form::open(['url'=>'baocao01N','target'=>'_blank' , 'id' => 'frm_bc1', 'class'=>'form-horizontal form-validate']) !!}
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Báo cáo tổng hợp 01N-BNV-TĐKT</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label><b>Từ ngày</b></label>
                                <input type="date" name="tungay" id="tungay" class="form-control"/>
                            </div>
                            <div class="col-md-6">
                                <label><b>Đến ngày</b></label>
                                <input type="date" name="denngay" id="denngay" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-success">Đồng ý</button>
                    <!--button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickBCExcel('/reports/thuetn/bcgiathuetnexcel')">Xuất Excel</button-->
                </div>
                {!! Form::close() !!}
            </div>
    @include('manage.quytdkt.baocaoth.modal-thoai')
@stop