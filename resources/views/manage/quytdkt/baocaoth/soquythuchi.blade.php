@extends('reports.main_rps')
@section('custom-style')
@stop


@section('custom-script')

@stop

@section('content')
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="vertical-align: top;">
            <span style="text-transform: uppercase">Đơn vị:{{$m_dv->tendv}} </span><br>
            <span style="text-transform: uppercase;font-weight: bold">Mã QHNS:{{$m_dv->maqhns}}</span>
            <hr style="width: 10%;vertical-align: top;  margin-top: 2px">

        </td>
        <td style="vertical-align: top;">
        </td>
    </tr>

</table>

<p style="text-align: center; font-weight: bold; font-size: 16px;">SỔ QUỸ CÁC KHOẢN THU, CHI</p>
<p style="text-align: center; font-weight: inherit; font-size: 14px;">Từ ngày {{getDayVn($inputs['tungay'])}} đến {{getDayVn($inputs['denngay'])}}</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
    <thead>
        <tr>
            <th rowspan="2" width="2%" style="text-align: center" >STT</th>
            <th rowspan="2" style="text-align: center">Ngày tháng</th>
            <th rowspan="2" style="text-align: center" >Số hiệu</th>
            <th rowspan="2" style="text-align: center">Nội dung</th>
            <th colspan="3" style="text-align: center" >Số tiền</th>
            <th rowspan="2" style="text-align: center" width="10%">Ghi chú</th>
        </tr>
        <tr >
            <th>Thu</th>
            <th>Chi</th>
            <th>Tồn</th>
        </tr>
        <tr style="font-size: 10px">
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
        </tr>
    </thead>
    <tbody>
        <?php $thu =0; $chi = 0; ?>
        @foreach($model as $key=>$tt)
            <tr>
                <td style="text-align: center">{{$key+1}}</td>
                <td style="text-align: center">{{getDayVn($tt->ngaythang)}}</td>
                <td class="active" style="font-weight: bold">{{$tt->maphieu}}</td>
                <td>{{$tt->noidung}}</td>
                @if($tt->loaiphieu == 'PT')
                    <?php $thu += $tt->sotien; ?>
                    <td style="text-align: right">{{dinhdangso($tt->sotien)}}</td>
                    <td style="text-align: right;font-weight: bold"></td>
                @endif
                @if($tt->loaiphieu == 'PC')
                    <?php $chi += $tt->sotien; ?>
                <td style="text-align: right;font-weight: bold"></td>
                <td style="text-align: right">{{dinhdangso($tt->sotien)}}</td>
                @endif
                <td style="text-align: right">{{dinhdangso($thu - $chi)}}</td>
                <td ></td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td colspan="3" style="text-align: center; font-weight: bold">Tổng cộng</td>
                <td style="text-align: right;font-weight: bold">{{dinhdangso($thu)}}</td>
                <td style="text-align: right;font-weight: bold">{{dinhdangso($chi)}}</td>
            <td style="text-align: right;font-weight: bold">{{dinhdangso($thu - $chi)}}</td>
            <td ></td>
        </tr>
    </tbody>
</table>
<table width="96%" border="0" cellspacing="0" height cellpadding="0" style="margin: 20px auto;text-align: center; height:200px">
    <tr>
        <td style="vertical-align: top;">
            <b>Người lập sổ</b><br>
            <i>(Ký, họ tên)</i>
        </td>
        <td style="vertical-align: top;">
            <b>THỦ TRƯỞNG ĐƠN VỊ</b><br>
            <i>(Ký tên, đóng dấu)</i>
        </td>
    </tr>
</table>
@stop