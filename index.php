<?php

use PhangoApp\PhaRouter2\Router;
use PhangoApp\PhaUtils\Utils;
use PhangoApp\PhaView\View;
use PhangoApp\PhaI18n\I18n;

include(__DIR__."/vendor/autoload.php");


$route=new Router();

$route->arr_finish_callbacks=array('PhangoApp\PhaModels\Webmodel::save_cache_query' => []);

Utils::load_config('config_i18n');
Utils::load_config('config_routes');
Utils::load_config('config_apps');
Utils::load_config('config');
Utils::load_config('config_views');

if(!defined('COOKIE_SESSION_NAME'))
{

    define('COOKIE_SESSION_NAME', 'phango');

}

session_name(COOKIE_SESSION_NAME.'_session');

session_set_cookie_params(0, Router::$root_url);

session_start();

I18n::load_lang('common');

/**Load configurations from modules**/

foreach(Router::$apps as $admin_module)
{
    
    Utils::load_config('config', $path='vendor/'.$admin_module."/settings");
    
}

date_default_timezone_set(PhangoApp\PhaTime\DateTime::$timezone);

$path_info=isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';

$route->response($path_info);

?>
