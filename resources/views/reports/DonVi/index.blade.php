<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 24/06/2016
 * Time: 4:00 PM
 */
        ?>
@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
@stop

@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption text-uppercase">DANH SÁCH BÁO CÁO TẠI ĐƠN VỊ</div>
                    <div class="actions"></div>
                </div>

                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ol>
                                <li>
                                    <a href="#" data-target="#modal-canhan" data-toggle="modal"
                                       onclick="dutoanluong('{{$furl.'don_vi/dutoanluong'}}')">Theo cá nhân</a>
                                </li>

                                <li>
                                    <a href="#" data-target="#modal-tapthe" data-toggle="modal" title="Dữ liệu chi trả theo tổng hợp lương tại đơn vị"
                                       onclick="chitraluong('{{$furl.'don_vi/chitraluong'}}')">Theo tập thể</a>
                                </li>
                                <li>
                                    <a href="#" data-target="#modal-phongtrao" data-toggle="modal" title="Dữ liệu chi trả theo tổng hợp lương tại đơn vị"
                                       onclick="chitraluong('{{$furl.'don_vi/chitratheonkp'}}')">Theo phong trào thi đua khen thưởng</a>

                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-canhan" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'BaoCaoDonVi/CaNhan','target'=>'_blank' ,'method'=>'post' ,'id' => 'thoaibangluong', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-dialog modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Thông tin kết xuất</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label"> Chọn đối tượng</label>
                        <div class="col-md-8">
                            {!! Form::select('madt',array_column($m_canhan->toarray(),'tendt','madt'),null,array('id' => 'madt', 'class' => 'form-control'))!!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"> Từ ngày</label>
                        <div class="col-md-8">
                            {!!Form::input('date','ngaytu',date('Y').'-01-01', array('id' => 'ngaytu','class' => 'form-control'))!!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"> Đến ngày</label>
                        <div class="col-md-8">
                            {!!Form::input('date','ngayden', date('Y').'-12-31', array('id' => 'ngayden','class' => 'form-control'))!!}
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Đồng ý</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

    <div id="modal-tapthe" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'BaoCaoDonVi/TapThe','target'=>'_blank' ,'method'=>'post' ,'id' => 'thoaibangluong', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-dialog modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Thông tin kết xuất</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label"> Chọn tập thể</label>
                        <div class="col-md-8">
                            {!! Form::select('madonvi',array_column($m_tapthe->toarray(),'tendonvi','madonvi'),null,array('id' => 'madonvi', 'class' => 'form-control'))!!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"> Từ ngày</label>
                        <div class="col-md-8">
                            {!!Form::input('date','ngaytu',date('Y').'-01-01', array('id' => 'ngaytu','class' => 'form-control'))!!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"> Đến ngày</label>
                        <div class="col-md-8">
                            {!!Form::input('date','ngayden', date('Y').'-12-31', array('id' => 'ngayden','class' => 'form-control'))!!}
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Đồng ý</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

    <div id="modal-phongtrao" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'BaoCaoDonVi/PhongTrao','target'=>'_blank' ,'method'=>'post' ,'id' => 'thoaibangluong', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-dialog modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Thông tin kết xuất</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label"> Tên phong trào</label>
                        <div class="col-md-8">
                            {!! Form::select('kihieudhtd',array_column($m_phongtrao->toarray(),'noidung','kihieudhtd'),null,array('id' => 'kihieudhtd', 'class' => 'form-control'))!!}
                        </div>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Đồng ý</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop