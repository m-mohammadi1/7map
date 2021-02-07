<?php

include 'bootstrap/init.php';

//  get locations by id
if (isset($_GET['loc'])) {
    $location = getLocation($_GET['loc']);
}


include 'views/index-view.php';

