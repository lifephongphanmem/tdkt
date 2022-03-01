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
    <input type="submit" onclick=" window.print()" value="In báo cáo"  />
</div>

<body style="font:normal 14px Times, serif;">

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
    <table cellspacing="0" cellpadding="0" border="0" style="margin: 10px auto; border-collapse: collapse;font:normal 16px Times, serif;" >
        <tr>
            <th style="text-transform: uppercase">DANH SÁCH HỒ SƠ THI ĐUA</td>
        </tr>
    </table>
    <table class="header" width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 25px; text-align: left;">
        <tr >
            <th  width=""> Thông tin đăng ký thi đua </td>
        </tr>
        <tr >
            <td style="text-align: left">
                Đơn vị: {{$m_donvi->tendv}}
            </td >
        </tr>
        <tr >
            <td style="text-align: left">
                Phong trào: {{$m_phongtrao->where('maphongtrao',$model->plphongtrao)->first()->noidung}}
            </td >
        </tr>
        <tr>
            <td style="text-align: left">
                Nội dung thi đua: {{$model->noidung}}
            </td>
        </tr>
        <tr>
            <td style="text-align: left">
                Danh sách cá nhân, tập thể tham gia thi đua khen thưởng:
            </td>
        </tr>
    </table>
    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
        <thead>
        <tr>
            <th>STT</th>
            <th>Đối tượng</th>
            <th>Phân loại</th>
            <th>Địa chỉ</th>
            <th>Danh hiệu thi đua</th>
            <th>Ghi chú</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0;;?>
        @foreach($modelct as $ct)
            <?php $i++;?>
            <tr>
                <tr class="odd gradeX">
                    <td style="text-align: center">{{$i}}</td>
                    <td>{{$modeldt->where('madt',$ct->madt)->first()->tendt}}</td>
                    <td >{{$m_pl->where('maplct',$modeldt->where('madt',$ct->madt)->first()->phanloaict)->first()->tenplct}}</td>
                    <td style="text-align: center">{{$modeldt->where('madt',$ct->madt)->first()->diachi}}</td>
                    <td style="text-align: center">{{$ct->tendanhhieutd}}</td>
                    <td style="text-align: center"></td>
                </tr>
            </tr>
        @endforeach
        </tbody>
    </table>
