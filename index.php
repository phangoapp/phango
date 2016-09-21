<?php

use PhangoApp\PhaRouter\Routes;
use PhangoApp\PhaUtils\Utils;
use PhangoApp\PhaView\View;
use PhangoApp\PhaI18n\I18n;

include(__DIR__."/vendor/autoload.php");

if(!defined('COOKIE_SESSION_NAME'))
{

    define('COOKIE_SESSION_NAME', 'phango');

}

if(isset($_COOKIE[COOKIE_SESSION_NAME]))
{

    session_id($_COOKIE[COOKIE_SESSION_NAME]);

}

$route=new Routes();

$route->arr_finish_callbacks=array('PhangoApp\PhaModels\Webmodel::save_cache_query' => []);

Utils::load_config('config_i18n');
Utils::load_config('config');
Utils::load_config('config_views');

session_name(COOKIE_SESSION_NAME.'_session');

session_set_cookie_params(0, Routes::$root_url);

session_start();

I18n::load_lang('common');

/**Load configurations from modules**/

foreach(Routes::$apps as $admin_module)
{
    
    Utils::load_config('config', $path='vendor/'.$admin_module."/settings");
    
}

$route->response($_SERVER['REQUEST_URI']);

?>
