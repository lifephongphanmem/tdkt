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
        <table cellspacing="0" cellpadding="0" border="0" style="margin: 10px auto; border-collapse: collapse;font:normal 16px Times, serif;" >
            <tr>
                <th style="text-transform: uppercase">CÂU HỎI VÀ GIẢI ĐÁP</td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table cellspacing="0" cellpadding="0" border="0" style="margin: 10px auto;padding-left: 10px; border-collapse: collapse;font:normal 16px Times, serif; text-align: left" >
            <tr>
                <th width="30%" style="padding-left: 50px;">Mã câu hỏi: </td>
                <td style="padding-left: 100px;"> {{$model->mahoidap}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Phân loại: </td>
                <td style="padding-left: 100px;"> {{$model->phanloai}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Đơn vị nhận: </td>
                <td style="padding-left: 100px;"> {{$model->donvinhan}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Nội dung câu hỏi: </td>
                <td style="padding-left: 100px;"> {{$model->noidung}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Người chuyển: </td>
                <td style="padding-left: 100px;"> {{$model->nguoichuyen}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Người trả lời: </td>
                <td style="padding-left: 100px;"> {{$model->nguoitraloi}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Câu trả lời: </td>
                <td style="padding-left: 100px;"> {{$model->cautraloi}} </td>
            </tr>

        </table>
    </div>
</div>