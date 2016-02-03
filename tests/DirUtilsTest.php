<?php


use PhangoApp\PhaUtils\Utils;

include("../vendor/autoload.php");

Utils::load_config('config', '../settings');

class UtilsTest extends PHPUnit_Framework_TestCase
{
	public function testSlugify()
	{
		
		$this->assertEquals('esto-es-un-texto', Utils::slugify('Esto es un texto'));
		
	
	}

}

?>
