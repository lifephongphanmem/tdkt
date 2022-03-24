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
                    <div class="caption">DANH SÁCH BÁO CÁO TẠI ĐƠN VỊ</div>
                    <div class="actions"></div>
                </div>

                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ol>
                                <li>
                                    <a href="{{url('01N-BNV-TĐKT')}}" target="_blank">Báo cáo theo mẫu 07.01N/BNV-TĐKT</a>
                                </li>
                                <li>
                                    <a href="{{url('02N-BNV-TĐKT')}}" target="_blank">Báo cáo theo mẫu 07.02N/BNV-TĐKT</a>
                                </li>
                                <li>
                                    <a href="{{url('03N-BNV-TĐKT')}}" target="_blank">Báo cáo theo mẫu 07.03N/BNV-TĐKT</a>
                                </li>


                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@stop