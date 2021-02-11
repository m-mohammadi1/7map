<?php

function site_url($url)
{
    return SITE_URL . $url;
}


function isAjaxRequest(){
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
        return true;
    }
    return false;
}

function redirect($url){
    header("Location: $url");
    die();
}

function diePage($msg){
    echo "<div style='padding: 30px; width: 80%; margin: 50px auto; background: #f9dede; border: 1px solid #cca4a4; color: #521717; border-radius: 5px; font-family: sans-serif;'>$msg</div>";
    die();
}

function message($msg,$cssClass = 'info', $color = '#521717', $background = '#f9dede'){
    echo "<div class='$cssClass' style=';padding: 20px; width: 80%; margin: 10px auto; background: $background; border: 1px solid #cca4a4; color: $color; border-radius: 5px;'>$msg</div>";
}



function dd($var){
    echo "<pre style='text-align: left;direction: ltr;color: #9c4100; background: #fff; z-index: 999; position: relative; padding: 10px; margin: 10px; border-radius: 5px; border-left: 3px solid #c56705;'>";
    var_dump($var);
    echo "</pre>";
}

