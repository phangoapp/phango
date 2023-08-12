<?php

use PhangoApp\PhaUtils\Utils;
use PhangoApp\PhaI18n\I18n;
use PHPUnit\Framework\TestCase;

include("../vendor/autoload.php");

include('../settings/config_i18n.php');

$base_path='./tmp/';
        
$lang_path=$base_path.'/i18n/en-US';

if(!is_dir($lang_path))
{

    mkdir($lang_path, 0755, true);

}

class I18nTest extends TestCase
{
	public function testLoadLang()
	{
        global $base_path;
        
        I18n::$base_path=$base_path;

        I18n::$arr_i18n=['en-US'];

        I18n::$language='en-US';
	
        global $lang_path;
		
		//Fake config
		
		$file_lang="<?php\n\nuse PhangoApp\PhaI18n\I18n;\n\nI18n::\$lang['common']['simple_text']='This is a simple text';\n\n";
		
		file_put_contents($lang_path.'/common.php', $file_lang);
		//
		$this->assertTrue(I18n::load_lang('common'));

	}
	
	/**
    * @depends testLoadLang
    */
	
	public function testLoadLError()
	{
	
        //Clean cache loaded
        global $base_path;
        
        I18n::$base_path=$base_path;

        I18n::$arr_i18n=['en-US'];

        I18n::$language='en-US';
        
        I18n::$cache_lang=array();
	
        $this->assertFalse(I18n::load_lang('common_not_exists'));
	
	}
	
	/**
    * @depends testLoadLang
    */
    
    public function testValueLang()
    {
        global $base_path;
        
        I18n::$base_path=$base_path;

        I18n::$arr_i18n=['en-US'];

        I18n::$language='en-US';
    
        $this->assertEquals('This is a simple text', I18n::$lang['common']['simple_text']);
    
    }

}



?>
