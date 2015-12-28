<?php

use PhangoApp\PhaTime;

include("../vendor/autoload.php");

class DateTimeTest extends PHPUnit_Framework_TestCase
{
    /*
    public function testObtainTimeStampField()
    {
    
        $timestamp=PhaTime\DateTime::obtain_timestamp('20121210232032');
      
        $this->assertEquals('891549276752', $timestamp );
    
    }*/
    
    //Is utc the time 
    
    public function testObtainGMTime()
    {
    
        date_default_timezone_set('UTC');
    
        $this->assertEquals('23:20:32', PhaTime\DateTime::format_time('20121210232032'));
    
    }
    
    public function testObtainLocaleTime()
    {
    
        date_default_timezone_set('Europe/Madrid');
    
        $this->assertEquals('00:20:32', PhaTime\DateTime::format_time('20121210232032'));
    
    }
    
    public function testObtainGMDate()
    {
    
        date_default_timezone_set('UTC');
    
        $this->assertEquals('2012/12/10', PhaTime\DateTime::format_date('20121210232032'));
    
    }
    
    public function testObtainLocaleDate()
    {
    
        date_default_timezone_set('Europe/Madrid');
    
        $this->assertEquals('2012/12/11', PhaTime\DateTime::format_date('20121210232032'));
    
    }
    
}

?>