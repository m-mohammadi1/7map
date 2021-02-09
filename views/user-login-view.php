<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به بخش کاربری</title>
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
    form {
        width: 350px;
        margin: 20px auto;
    }
    input {
        border-radius: 5px;
        border: 1px solid #b9daf8;
        font-size: 20px;
        width: 100%;
        text-align: left;
        padding: 5px 20px;
        box-sizing: border-box;
        margin: 5px;
    }
    </style>
</head>
<body>
    <div class="main-panel">
    <h1>ورود به بخش کاربری <span style="color:#007bec"><?= SITE_NAME; ?></span></h1>
        <div class="box">
            <form action="user.php" method="post">
                <input type="text" name="username" placeholder="Username" autocomplete="off"><br>
                <input type="password" name="password" placeholder="Password" autocomplete="off"><br>
                <input type="submit" name="login_user" value="Login" style="text-align: center">
            </form>
        </div>
        <div style="text-align: center;"><a style="text-decoration: none;color: #007bec;" href="<?= site_url('user.php?action=register'); ?>">اکانت ندارید؟ ثبت نام کنید</a></div>
    </div>
</body>
</html>
