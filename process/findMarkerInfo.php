<?php
include  "../bootstrap/init.php";

if (!isAjaxRequest())
{
    diePage('Access Denied: Ajax Request only');
}

$loc = getLocationByLatlng($_POST['lat'], $_POST['lng']);

$loc_json = json_encode($loc);
echo $loc_json;