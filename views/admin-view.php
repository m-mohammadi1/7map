<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7Map Panel</title>
    <link href="favicon.png" rel="shortcut icon" type="image/png">

    <link rel="stylesheet" href="assets/css/styles.css<?="?v=" . rand(99, 9999999)?>" />
    <style>
    body{
        background:#f2f2f2;
    }
    a{
        text-decoration: none;
    }
    h1{
        text-align: center;
    }

    .main-panel{
        width:1000px;
        margin:30px auto;
    }
    .box {
        background: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        box-shadow: 0px 3px 3px #EEE;
        margin-bottom: 20px;
    }
    table.tabe-locations {
        width: 100%;
        border-collapse: collapse;
    }
    .statusToggle {
        background: #eee;
        color: #686868;
        border: 0;
        padding: 3px 12px;
        border-radius: 20px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 400;
        font-family: iransans;
        display:inline-block;
        margin:0 3px;
    }
    .statusToggle.active {
        background: #0c8f10;
        color: #ffffff;
    }
    .statusToggle:hover,button.preview:hover {
        opacity: 0.7;
    }
    button.preview {
        padding: 0 10px;
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
    }
    tr {
        line-height: 36px;
    }
    tr:nth-child(2n) {
        background:#f7f7f7;
    }
    td{
        padding:0 5px;
    }
    iframe#mapWivdow {
        width: 100%;
        height: 500px;
    }
    .text-center{
        text-align: center;
    }
    </style>
</head>
<body>
    <div class="main-panel">
        <h1>پنل مدیریت <span style="color:#007bec">سون مپ</span></h1>
        <div class="box">
            <a class="statusToggle" href="<?=SITE_URL?>" target="_blank">🏠</a>
            <a class="statusToggle active" href="?status=1">فعال</a>
            <a class="statusToggle" href="?status=0">غیرفعال</a>
            <a class="statusToggle" href="?logout=1" style="float:left" target="_blank">خروج</a>
        </div>
        <div class="box">
        <table class="tabe-locations">
        <thead>
        <tr>
        <th style="width:40%">عنوان مکان</th>
        <th style="width:15%" class="text-center">تاریخ ثبت</th>
        <th style="width:10%" class="text-center">lat</th>
        <th style="width:10%" class="text-center">lng</th>
        <th style="width:25%">وضعیت</th>
        </tr>
        </thead>
        <tbody>
        <?php for($i=0;$i<10;$i++): ?>
        <tr>
            <td>نام مکان اینجا</td>
            <td class="text-center">12 خرداد 95</td>
            <td class="text-center">25.454</td>
            <td class="text-center">34.456</td>
            <td>
                <button class="statusToggle active" data-loc='111'>فعال</button> 
                <button class="statusToggle" data-loc='111'>غیر فعال</button> 
                <button class="preview" data-loc='111'>👁️‍🗨️</button> 
            </td>
        </tr>
<?php endfor; ?>        
        </tbody>
        </table>
        </div>

    </div>

    <div class="modal-overlay" style="display: none;">
        <div class="modal">
            <span class="close">x</span>
            <div class="modal-content">
                <iframe id='mapWivdow' src="#" frameborder="0"></iframe>
            </div>
        </div>
    </div>



    <script src="assets/js/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.preview').click(function() {
            $('.modal-overlay').fadeIn();
            $('#mapWivdow').attr('src','<?=SITE_URL?>');
        });
        $('.modal-overlay .close').click(function() {
            $('.modal-overlay').fadeOut();
        });
    });
    </script>
</body>
</html>
