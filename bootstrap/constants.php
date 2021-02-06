<?php

define('DS', DIRECTORY_SEPARATOR);
// site Url
define('SITE_URL', 'http://7learn.php/7map/');
// site root
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . '7map/');
// preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
// site title
define('SITE_TITLE', 'My Map Project pmod');

// get types from json file
$json = file_get_contents(SITE_ROOT . "bootstrap/types.json");
$typesArr = json_decode($json, true);
// define location tpyes depend on json file
define('LocationTypes', $typesArr);
