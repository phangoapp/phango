<?php

/**
* Cli for generate composer.json files for install the system...
*
*/

$file='composer.php';

$options=getopt('c:');

if(isset($options['c']))
{

	$file=$options['c'];

}

if(!is_file($file))
{

	echo "Don't exists the composer.php file\n";

	exit(1);

}

include($file);

//$root_dir=__DIR__.'/modules/';

$arr_dir=array(); //scandir($root_dir);

//print_r($arr_dir);

foreach($arr_dir as $dir)
{

	$arr_extra=array();

	if(!preg_match('/^\./', $dir))
	{

		//echo $dir."\n";
		
		$final_file=$root_dir.$dir.'/extra_composer.php';
		
		if(is_file($final_file))
		{
		
			include($final_file);
		
		}
		
	}

}


$composer_content=json_encode($arr_composer, JSON_PRETTY_PRINT)."\n";

if(!file_put_contents(__DIR__.'/composer.json', $composer_content))
{

    echo "Error: cannot create composer.json. Please, check directory permissions for it...\n";

}

?>
