<?php

include 'bootstrap/init.php';

$errors = [];
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
        }

    }


    if (!empty($errors)) {
        foreach ($errors as $error) {
            message($error);
        }
    }

}



include "views/user-login-view.php";