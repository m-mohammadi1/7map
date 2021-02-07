<?php


function isLoggedIn()
{
    return isset($_SESSION['login']);
}

function logout()
{
    unset($_SESSION['login']);
}

function login($username, $password) 
{
    global $users;

    if (
        array_key_exists($username, $users) 
        && 
        password_verify($password, $users[$username])
        ) {
        $_SESSION['login'] = 1;
        return true;
    }
    return false;
}