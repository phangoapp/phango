<?php

use PhangoApp\PhaRouter\Routes;
use PhangoApp\PhaUtils\Utils;
use PhangoApp\PhaView\View;

include(__DIR__."/vendor/autoload.php");

session_start();

$route=new Routes();

Utils::load_config('config_i18n');
Utils::load_config('config');
Utils::load_config('config_views');

$route->response($_SERVER['REQUEST_URI']);

?>
