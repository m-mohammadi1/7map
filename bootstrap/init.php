<?php

include "constants.php";
include "config.php";


try {
    $pdo = new PDO("mysql:host=" . $database->host. ";dbname=".$database->name. ";charset=utf8", $database->user, $database->pass);
} catch (PDOException $e) {
    var_dump($pdo);
    die("Could not connect to database");
}


include SITE_ROOT . DS . "libs/lib-helpers.php";
include SITE_ROOT . DS . "libs/lib-locations.php";
include SITE_ROOT . DS . "libs/lib-users.php";