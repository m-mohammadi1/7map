<?php
include  "../bootstrap/init.php";

if (!isAjaxRequest())
{
    diePage('Access Denied: Ajax Request only');
}


if (!empty($_POST['loc']) && is_numeric($_POST['loc'])) {
    echo toggleStatus($_POST['loc']);
} else {
    echo 0;
}