<?php

include 'bootstrap/init.php';

$errors = [];
// register user
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $action = $_GET['action'] ?? '';
    
    if ($action == 'register') {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // validation
        if (isUsernameExist($username)) {
            $errors[] = "نام کاربری تکراری است چیز دیگری وارد کنید";
        }
        if (strlen($username) < 3 || empty($username)) {
            $errors[] = "نام کاربری نباید کمتر از 3 حرف باشد";
        }
        // email
        if (isEmailExist($email)) {
            $errors[] = " ایمیل تکراری است چیز دیگری وارد کنید";
        }
        // password
        if (strlen($password) < 5 || empty($password)) {
            $errors[] = " پسورد نباید کمتر از 5 حرف باشد";
        }

        if (empty($errors))
        {
            if (createUser($_POST['name'], $_POST['username'], $_POST['email'], $_POST['password'])) {
                message("کاربر با موفقیت ایجاد شد", 'success', 'black', '#afd8ba');
                header("Location: " . site_url('user.php'));
            }
        }
    } // end main if
    else if ($action == 'login') 
    {
        if  (loginUser($_POST['username'], $_POST['password'])) {
            header("Location: " . site_url('user.php'));
        } else {
            $errors[] = "نام کاربری یا رمز ورود اشتباه است";
        }
    } 
    else {
        message("درخواست نامعتبر است");
    }
    

}


// show errors
if (!empty($errors)) {
    foreach ($errors as $error) {
        message($error);
    }
}

// logout user
if (isset($_GET['logout']))
{
    logoutUser();
}


if (isUserLoggedIn()) {
    $locations = getLocations(['user_id' => $_SESSION['loginUser']['id']]);
    include "views/user/user-view.php";
} else if (isset($_GET['action']) && $_GET['action'] == 'register') {
    include "views/user/user-register-view.php";
} else {
    include "views/user/user-login-view.php";
}