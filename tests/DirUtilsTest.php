<?php


use PhangoApp\PhaUtils\Utils;
use PHPUnit\Framework\TestCase;

include("../vendor/autoload.php");

Utils::load_config('config', '../settings');

class DirUtilsTest extends TestCase
{
	public function testSlugify()
	{
		
		$this->assertEquals('esto-es-un-texto', Utils::slugify('Esto es un texto'));
		
	
	}
    
    public function testSlugifyStrange()
	{
		
		$this->assertEquals('esto-es-un-textoperdon-nino-anadidura--piton', Utils::slugify('Esto es un texto?[]perdón niño añadidura # Pitón'));
		
	
	}

}

?>
