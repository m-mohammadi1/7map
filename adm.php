<?php

include 'bootstrap/init.php';

// login users
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $action = $_GET['action'] ?? '';
    if ($action == 'login') {
        if (!login($_POST['username'], $_POST['password'])) {
            message('نام کاربری یا رمز عبور اشتباه است');
        }
    }
    
}
// logout users
if (isset($_GET['logout'])) {
    logout();
}



if (isLoggedIn()) {
    $params = $_GET ?? [];
    $locations = getLocations($params);
    include 'views/admin/admin-view.php';
} else {
    include 'views/admin/admin-login-view.php';
}