<?php
include  "../bootstrap/init.php";

if (!isAjaxRequest())
{
    diePage('Access Denied: Ajax Request only');
}

if (empty($_POST['keyword'])) {
    echo "چیزی یافت نشد بیشتر سرچ کنید";
    die;
}
$searchResults = search($_POST['keyword']);


foreach ($searchResults as $loc) {
    echo
    "
    <a href='".SITE_URL."?loc=$loc->id' style='text-decoration: none; color: #091004;'>
    <div class='result-item' data-lat='{$loc->lat}' data-lng='{$loc->lng}'>
    <span style='min-width: 50px; text-align: center;' class='loc-type'>".LocationTypes[$loc->type]."</span>
    <span class='loc-title'>{$loc->title}</span>
    </div>
    </a>
    ";
}