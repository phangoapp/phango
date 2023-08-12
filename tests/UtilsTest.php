<?php


use PhangoApp\PhaUtils\Utils;
use PHPUnit\Framework\TestCase;

include("../vendor/autoload.php");

Utils::load_config('config', '../settings');

class UtilsModTest extends TestCase
{
	public function testSlugify()
	{
		
		$this->assertEquals('esto-es-un-texto', Utils::slugify('Esto es un texto'));
		
	
	}
	
	public function testFormText()
    {
        
        $this->assertEquals('&quot;Esto es un texto&quot;', Utils::form_text('"Esto es un texto"'));
        
    
    }
    
    public function testFormTextHTML()
    {
    
        $allowedtags['p']=array('pattern' => '/&lt;p.*?&gt;(.*?)&lt;\/p&gt;/s', 'replace' => '<p_tmp>$1</p_tmp>','example' => '<p></p>');;
        
        $this->assertEquals('<p>alert(&quot;shit&quot;);This is a html text</p>', Utils::form_text_html( '<p><script>alert("shit");</script>This is a html text</p>' , $allowedtags));
        
    
    }
    
    public function testWrapWords()
    {
        
        $this->assertEquals('This is ...', Utils::wrap_words('This is a phrase', 2));
        
    
    }

}

?>
