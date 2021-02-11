<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت نام در سایت <?= SITE_NAME; ?></title>
    <link href="favicon.png" rel="shortcut icon" type="image/png">

    <link rel="stylesheet" href="assets/css/styles.css<?="?v=" . rand(99, 9999999)?>" />
    <link rel="stylesheet" href="assets/css/views-style.css<?="?v=" . rand(99, 9999999)?>" />
    
</head>
<body>
    <div class="main-panel">
    <h1> ثبت نام در سایت <span style="color:#007bec"><?= SITE_NAME; ?></span></h1>
        <div class="box">
            <form action="<?= site_url('user.php?action=register') ?>" method="post">
                <input type="text" name="name" placeholder="Enter Your Name" required autocomplete="off"><br>
                <input type="text" name="username" placeholder="Enter Your Username" required autocomplete="off"><br>
                <input type="email" name="email" placeholder="Enter Your Email" required autocomplete="off"><br>
                <input type="password" name="password" placeholder="Enter Your Password" required autocomplete="off"><br>
                <input type="submit" name="register" value="ثبت نام" style="text-align: center">
            </form>
        </div>
    </div>

</body>
</html>
