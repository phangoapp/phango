<?php

use PhangoApp\PhaUtils\Utils;
use PhangoApp\PhaI18n\I18n;
use PhangoApp\PhaModels\CoreFields\I18nField;
use PhangoApp\PhaModels\CoreFields\CharField;

include("../vendor/autoload.php");

Utils::load_config('config_i18n', '../settings');
Utils::load_config('config', '../settings');

class I18nFieldTest extends PHPUnit_Framework_TestCase
{
	public function testI18nField()
	{
        
        $field=new I18nField(new CharField());
        
        $lang_i18n=['en-US' => 'English text', 'es-ES' => 'Spanish text'];
        
        $final_value=$field->check($lang_i18n);
        
        $this->assertEquals($final_value, '{\"en-US\":\"English text\",\"es-ES\":\"Spanish text\"}');
            
        $this->assertEquals($field->show_formatted(stripslashes($final_value)), $lang_i18n[I18n::$language]);
        
    }
    
}

?>
