<?php

use PhangoApp\PhaRouter\Routes;
use PhangoApp\PhaView\View;

View::$php_file=Routes::$root_url.'showmedia.php';

/**
* Property that define the static when you will go to production.
*/

View::$url_media='/media';

//View::$root_path=PhangoVar::$base_path;

/**
* Property for define the theme.
* 
*/

View::$folder_env=array('views/default');

View::$theme=basename(View::$folder_env[0]);
/*
foreach(Routes::$apps as $app)
{

	View::$folder_env[]='modules/'.$app.'/views';
	View::$media_env[]='modules/'.$app;
	
}
*/
/**
* With this method set the media files to production if the argument is true. By default is false.
* @warning Never forget set this method when you are going to production
*/

View::set_production(false);

?>