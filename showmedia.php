<?php

use PhangoApp\PhaRouter\Routes;
use PhangoApp\PhaView\View;
use PhangoApp\PhaUtils\Utils;

include(__DIR__.'/vendor/autoload.php');

//Define the views folders based on app installed and global config of the app.

Utils::load_config('config');
Utils::load_config('config_views');

//Set the theme folder media folder_env

View::$media_env=array(View::$folder_env[0]);

//Here don't worry about check ten directories for find view.

foreach(Routes::$apps as $app)
{

	View::$folder_env[]='vendor/'.$app.'/views';
	View::$media_env[]='vendor/'.$app;
	
}



View::load_media_file($_SERVER['REQUEST_URI']);

?>