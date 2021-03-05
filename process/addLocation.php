<?php
include  "../bootstrap/init.php";

if (!isAjaxRequest())
{
    diePage('Access Denied: Ajax Request only');
}


// add location
try {
    if (empty($_POST['title']) || empty($_POST['phone'])  || empty($_POST['description'])) {
        echo "لطفا تمامی فیلد ها را پر کنید";
        return ;
    }
    if (addLocation($_POST)) {
        echo "مکان مورد نظر با موفقیت ثبت شد و در انتظار تایید است";
    } else {
        echo "مشکلی در ذخیره مکان پیش آمد دوباره تلاش کنید";
    }
} catch (PDOException $e) {
    echo "مشکلی در پردازش فرآیند بوجود آمد";
}