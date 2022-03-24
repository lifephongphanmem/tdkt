
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .bg {
            /* The image used */
            background-image: url("{{url('images/Phoi/BangKhen.jpg')}}");
            /* Full height */
            height: 95%;
            width: 60%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            padding-left: 30px;
        }
    </style>
</head>
<body>

<div class="bg">
    <p style="text-align: left; font-weight: bold; font-size: 25px;padding-left: 80px;padding-top: 280px">Ông/Bà: {{$model->tendt}} đã đạt danh hiệu {{$model->tendanhhieutd}}</p>
    <p style="text-align: left; font-weight: bold; font-size: 25px;padding-left: 80px;padding-right: 80px;">Trong phong trào: {{$model->noidung}} </p>
    <p style="text-align: left; font-weight: bold; font-size: 15px;padding-left: 550px;">.....Ngày ... tháng ... năm </p>
    <p style="text-align: left; font-weight: bold; font-size: 20px;padding-left: 580px;">Chủ tịch </p>
</div>
</body>
</html>


