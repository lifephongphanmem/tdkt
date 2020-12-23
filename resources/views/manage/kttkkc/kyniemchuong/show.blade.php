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
                <th style="text-transform: uppercase">Danh sách kỷ niệm chương (tỉnh Hà Bắc cũ)</td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table cellspacing="0" cellpadding="0" border="0" style="margin: 10px auto;padding-left: 10px; border-collapse: collapse;font:normal 16px Times, serif; text-align: left" >
            <tr>
                <th  width=""> Thông tin khen thưởng </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Loại khen thưởng: </td>
                <td style="padding-left: 100px;"> {{$model->loaikt}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Danh hiệu khen thưởng: </td>
                <td style="padding-left: 100px;"> {{$model->dhkt}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Số quyết định: </td>
                <td style="padding-left: 100px;"> {{$model->soqd}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Nơi trình khen: </td>
                <td style="padding-left: 100px;"> {{$model->noitrkhen}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Số được duyệt: </td>
                <td style="padding-left: 100px;"> {{$model->sodd}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Ngày tháng năm sinh: </td>
                <td style="padding-left: 100px;"> {{getDayVn($model->namsinh)}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Chính quán: </td>
                <td style="padding-left: 100px;"> {{$model->chinhquan}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Chức vụ, chỗ ở hiện nay: </td>
                <td style="padding-left: 100px;"> {{$model->cvchohn}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Loại hồ sơ kháng chiến(theo phần mềm cũ): </td>
                <td style="padding-left: 100px;"> {{$model->loaihskc}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Thời gian tham gia kháng chiến: </td>
                <td style="padding-left: 100px;"> {{getDayVn($model->tgiantgkc)}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Thời gian kháng chiến quy đổi: </td>
                <td style="padding-left: 100px;"> {{getDayVn($model->tgiankcqd)}} </td>
            </tr>
            <tr>
                <th width="30%" style="padding-left: 50px;">Ghi chú: </td>
                <td style="padding-left: 100px;"> {{$model->ghichu}} </td>
            </tr>
        </table>
    </div>
</div>