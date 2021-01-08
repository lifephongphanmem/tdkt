<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$pageTitle}}</title>
    <link rel="shortcut icon" href="{{ url('images/LIFESOFT.png')}}" type="image/x-icon">
    <style type="text/css">
        body {
            font: normal 14px/16px time, serif;
        }
        table, p {
            width: 98%;
            margin: auto;
        }
        table tr td:first-child {
            text-align: center;
        }
        td, th {
            padding: 10px;
        }
        p{
            padding: 5px;
        }
        tr{
            padding: 20px;
        }
        span {
            text-transform: uppercase;
            font-weight: bold;
        }
        @media print {
            .in{
                display: none !important;
            }
        }
    </style>
</head>

<div class="in" style="margin-left: 20px;">
    <input type="submit" onclick=" window.print()" value="In kê khai"  />
</div>

<body style="font:normal 14px Times, serif;">

<div class="row">
    <div class="col-md-12">
        <table cellspacing="0" cellpadding="0" border="0" style="  border-collapse: collapse;font:normal 16px Times, serif;" >
            <tr>
                <th width="50%"></td>
                <th width="" style="text-align: center">Cộng hòa xã hội chủ nghĩa Việt Nam </td>
            </tr>
            <tr>
                <th style="padding-top: 1px">Số:</td>
                <th style="padding-top: 1px">Độc lập - Tự do - Hạnh phúc</td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table cellspacing="0" cellpadding="0" border="0" style="margin: 10px auto; border-collapse: collapse;font:normal 16px Times, serif;" >
            <tr>
                <th style="text-transform: uppercase">DANH SÁCH ĐĂNG KÝ THI ĐUA</td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table cellspacing="0" cellpadding="0" border="0" style="margin: 10px auto;padding-left: 10px; border-collapse: collapse;font:normal 16px Times, serif; text-align: left" >
            <tr>
                <th  width=""> Thông tin đăng ký thi đua </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Kí hiệu danh hiệu thi đua: </td>
                <td style="padding-left: 100px;"> {{$model->kihieudhtd}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Danh hiệu thi đua: </td>
                <td style="padding-left: 100px;"> {{$model->tendanhhieutd}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Hình thức khen thưởng: </td>
                <td style="padding-left: 100px;"> {{$model->tenhinhthuckt}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Tên đối tượng được khen: </td>
                <td style="padding-left: 100px;"> {{$model->tendtkt}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Phụ cấp lãnh đạo: </td>
                <td style="padding-left: 100px;"> {{$model->phucapld}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Chức danh lãnh đạo: </td>
                <td style="padding-left: 100px;"> {{$model->chucdanhld}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Chức vụ: </td>
                <td style="padding-left: 100px;"> {{$model->chucvu}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Đơn vị công tác hoặc Địa chỉ: </td>
                <td style="padding-left: 100px;"> {{$model->dvdcct}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Số quyết định: </td>
                <td style="padding-left: 100px;"> {{$model->soqd}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Năm: </td>
                <td style="padding-left: 100px;"> {{$model->nam}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Ngày ký: </td>
                <td style="padding-left: 100px;"> {{getDayVn($model->ngayky)}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Người ký: </td>
                <td style="padding-left: 100px;"> {{$model->nguoiky}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Loại hình khen thưởng: </td>
                <td style="padding-left: 100px;"> {{$model->tenloaihinhkt}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Ngày tháng năm sinh: </td>
                <td style="padding-left: 100px;"> {{getDayVn($model->namsinh)}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Chính quán (Nguyên quán): </td>
                <td style="padding-left: 100px;"> {{$model->chinhquan}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Trú quán: </td>
                <td style="padding-left: 100px;"> {{$model->truquan}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Tính chất tặng: </td>
                <td style="padding-left: 100px;"> {{$model->tctang}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Quốc tịch: </td>
                <td style="padding-left: 100px;"> {{$model->tenqt}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Ghi chú: </td>
                <td style="padding-left: 100px;"> {{$model->ghichu}} </td>
            </tr>
        </table>
    </div>
</div>