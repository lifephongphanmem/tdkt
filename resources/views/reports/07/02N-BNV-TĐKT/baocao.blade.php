@extends('reports.main_rps')
@section('custom-style')
@stop


@section('custom-script')

@stop

@section('content')
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="vertical-align: top;">
            <span style="text-transform: uppercase">Đơn vị báo cáo:</span><br>
            <span style="text-transform: uppercase;font-weight: bold">Đơn vị nhận báo cáo:</span>
            <hr style="width: 10%;vertical-align: top;  margin-top: 2px">

        </td>
        <td style="vertical-align: top;">Biểu số: 0702.N/BNV-TĐKT
        </td>
    </tr>

</table>

<p style="text-align: center; font-weight: bold; font-size: 16px;">SỐ LƯỢNG KHEN THƯỞNG CẤP NHÀ NƯỚC</p>
<p style="text-align: center; font-weight: inherit; font-size: 14px;">Năm</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
    <thead>
        <tr>
            <th rowspan="2" style="text-align: center; width: 30%"></th>
            <th rowspan="2" style="text-align: center" >Mã số</th>
            <th rowspan="2" style="text-align: center" >Đơn vị</th>
            <th rowspan="2" style="text-align: center">Tổng số</th>
            <th colspan="8" style="text-align: center" >Chia ra</th>
        </tr>
        <tr style="font-size: 10px">
            <th>Các loại huân chương, huy chương (Mỗi hình thức khen thưởng ghi riêng một cột)</th>
            <th>Giải thưởng Hồ Chí Minh</th>
            <th>Giải thưởng nhà nước</th>
            <th>Danh hiệu vinh dự nhà nước</th>
            <th>Cờ thi đua của chính phủ</th>
            <th>Băng khen của thủ tướng chính phủ</th>
            <th>Danh hiệu "Chiến sĩ thi đua toàn quốc"</th>
            <th>Các hình thức khen thưởng khác</th>
        </tr>
        <tr style="font-size: 10px">
            <th>A</th>
            <th>B</th>
            <th>C</th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
        </tr>
    </thead>
    <tbody>

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