<?php

use PhangoApp\PhaView\View;
use PHPUnit\Framework\TestCase;

include("../vendor/autoload.php");

View::$cache_directory='tmp/cache';

class ViewTest extends TestCase
{
    /*
    public function testObtainTimeStampField()
    {
    
        $timestamp=PhaTime\DateTime::obtain_timestamp('20121210232032');
      
        $this->assertEquals('891549276752', $timestamp );
    
    }*/
    
    //Is utc the time 
    
    public function testEscapeView()
    {
        /*
        @unlink('./tmp/cache/views/default/test/testing.php');
        @unlink('./tmp/cache/views/default/test/testing_echo.php');
    
        $view=View::load_view(['Test variable escaping <script language="javascript">alert(\'xss_attack\');</script>'], 'test/testing');
    
        $this->assertEquals('Test variable escaping &lt;script language=&quot;javascript&quot;&gt;alert(&#39;xss_attack&#39;);&lt;/script&gt;', $view);
        
        $view=View::load_view(['Test variable escaping <script language="javascript">alert(\'xss_attack\');</script>'], 'test/testing_echo');
    
        $this->assertEquals('Test variable escaping &lt;script language=&quot;javascript&quot;&gt;alert(&#39;xss_attack&#39;);&lt;/script&gt;Thing', $view);
        */
    
    }
    
}

?>
