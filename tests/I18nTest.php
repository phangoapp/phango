<?php

use PhangoApp\PhaUtils\Utils;
use PhangoApp\PhaI18n\I18n;

include("../vendor/autoload.php");

$base_path='./tmp/i18n';
        
$lang_path=$base_path.'/common/i18n/en-US';

if(!is_dir($lang_path))
{

    mkdir($lang_path, 0755, true);

}

I18n::$base_path=$base_path;

I18n::$arr_i18n=['en-US'];

I18n::$language='en-US';

class I18nTest extends PHPUnit_Framework_TestCase
{
	public function testLoadLang()
	{
	
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
	
	public function testLoadLang2()
	{
	
        //Clean cache loaded
        
        I18n::$cache_lang=array();
	
        $this->assertFalse(I18n::load_lang('common_not_exists'));
	
	}
	
	/**
    * @depends testLoadLang
    */
    
    public function testValueLang()
    {
    
        $this->assertEquals('This is a simple text', I18n::$lang['common']['simple_text']);
    
    }

}

?>
