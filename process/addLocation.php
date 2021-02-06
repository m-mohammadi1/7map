<?php
include  "../bootstrap/init.php";

if (!isAjaxRequest())
{
    diePage('Access Denied: Ajax Request only');
}


// add location
try {
    if (addLocation($_POST)) {
        echo "مکان مورد نظر با موفقیت ثبت شد و در انتظار تایید است";
    } else {
        echo "مشکلی در ذخیره مکان پیش آمد دوباره تلاش کنید";
    }
} catch (PDOException $e) {
    echo "مشکلی در پردازش فرآیند بوجود آمد";
}