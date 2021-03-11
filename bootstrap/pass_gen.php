<?php 

if (isset($_POST['pass_gen'])) {
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
    echo $pass;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PASS Generate</title>
</head>
<body>

<form action="" method="post">
    <input type="text" name="password">
    <input type="submit" name="pass_gen" value="generate">
</form>
    
</body>
</html>