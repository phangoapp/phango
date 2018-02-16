<?php

use PhangoApp\PhaRouter2\Router;
use PhangoApp\PhaView\View;

View::$php_file=Router::$root_url.Router::$base_file.'/showmedia';

/**
* Property that define the static when you will go to production.
*/

View::$url_media=Router::$root_url;

//View::$root_path=PhangoVar::$base_path;


foreach(Router::$apps as $app)
{

	View::$folder_env[]='vendor/'.$app.'/views';
	View::$media_env[]='vendor/'.$app;
	
}


?>
