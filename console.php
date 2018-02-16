<?php

//Loading libraries with includes, don't need more sofisticated methods...

ini_set('html_errors', 0);

require(__DIR__."/vendor/autoload.php");

use PhangoApp\PhaRouter2\Router;
use PhangoApp\PhaUtils\Utils;
use PhangoApp\PhaView\View;
use PhangoApp\PhaI18n\I18n;

Router::$base_path=__DIR__;

chdir(Router::$base_path);

Utils::load_config('config_routes');
Utils::load_config('config_i18n');
Utils::load_config('config');
Utils::load_config('config_views');
Utils::load_config('config_apps');

/**Load configurations from modules**/

foreach(Router::$apps as $admin_module)
{
    
    Utils::load_config('config', $path='vendor/'.$admin_module."/settings");
    
}

/*
include('libraries/fields/corefields.php');
include('libraries/forms/coreforms.php');
*/

I18n::load_lang('common');

//Load extra libraries

/*Utils::load_libraries(array('fields/corefields'));
Utils::load_libraries(array('forms/coreforms'));*/

//date_default_timezone_set (MY_TIMEZONE);

$utility_console=1;

//load_lang('common', 'user');

$model=array();

//Check arguments

define('OPTS', 'm:c:');

$longopts=array();

$options = getopt(OPTS, $longopts);

$climate = new League\CLImate\CLImate;

if(!isset($options['m']) && !isset($options['c']))
{

	//die("Use: php console.php -m=module -c=console_controller [more arguments for daemon]\n");
	
	$climate->white()->backgroundBlack()->out("Use: php console.php -m=group/module -c=console_controller [more arguments for daemon]");
	die;
}

$module=@Utils::form_text($options['m']);

$console_controller=@Utils::form_text(basename($options['c']));

//Include console_controller

$controller=__DIR__.'/vendor/'.$module.'/console/controller_'.$console_controller.'.php';

\PhangoApp\PhaView\View::$folder_env[]='vendor/'.$module.'/views';

if(file_exists($controller))
{

	include($controller);
	
	$script_base_controller=$module;

	$function_console=$console_controller.'Console';

	if( function_exists($function_console) )
	{
	
		/*
         * $longopts  = array(
            "required:",     // Valor obligatorio
            "optional::",    // Valor opcional
            "option",        // Sin valores
            "opt",           // Sin valores
        );*/
        
        $info_function=new ReflectionFunction($function_console);
        
        $arr_opts=array();
        
        $arr_params=array();
        
        foreach( $info_function->getParameters() as $param )
        {
            
            $name=$param->getName();
            
            if($param->isOptional())
            {
                
                $arr_opts[]=$name.'::';
                
                $arr_params[]='--'.$name.'=[optional]';
                
            }
            else
            {
                
                $arr_opts[]=$name.':';
                $arr_params[]='--'.$name.'=[required]';
                
            }
            
            
            
        }
        
        $final_params=getopt('', $arr_opts);
        
        $required_parameters=count($final_params);
        
        if($info_function->getNumberOfRequiredParameters()>$required_parameters)
        {
            
            $climate->white()->backgroundBlack()->out("Use: php console.php -m=group/module -c=console_controller ".implode(' ', $arr_params));
            die;
            
        }
        
        call_user_func_array($function_console, $final_params);
	
	}
	else
	{
		$climate->white()->backgroundRed()->out("Error: Don't exists the function with name ".$function_console." in ".$controller."...");
		exit(1);
	
	}

}
else
{

	$climate->white()->backgroundRed()->out("Error: Don't exists the controller ".$controller." for console statement...");
	exit(1);

}

/**
*  Function for obtain options from console. The opts use the format of getopt function
*/

function get_opts_console($my_opts, $arr_opts=array())
{

	return getopt(OPTS.$my_opts, $arr_opts);

}

?>
