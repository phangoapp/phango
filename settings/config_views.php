<?php

use PhangoApp\PhaRouter\Routes;
use PhangoApp\PhaView\View;

View::$php_file=Routes::$root_url.'showmedia.php';

/**
* Property that define the static when you will go to production.
*/

View::$url_media=Routes::$root_url;

//View::$root_path=PhangoVar::$base_path;

/*
foreach(Routes::$apps as $app)
{

	View::$folder_env[]='modules/'.$app.'/views';
	View::$media_env[]='modules/'.$app;
	
}
*/

?>