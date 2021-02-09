<?php

include 'bootstrap/init.php';

$errors = [];
// register user
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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

}

// login user
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login_user'])) {
    if  (loginUser($_POST['username'], $_POST['password'])) {
        header("Location: " . site_url('user.php'));
    } else {
        $errors[] = "نام کاربری یا رمز ورود اشتباه است";
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
    include "views/user-view.php";
} else if (isset($_GET['action']) && $_GET['action'] == 'register') {
    include "views/user-register-view.php";
} else {
    include "views/user-login-view.php";
}