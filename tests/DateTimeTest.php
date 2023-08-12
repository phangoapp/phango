<?php

use PhangoApp\PhaTime;
use PHPUnit\Framework\TestCase;

include("../vendor/autoload.php");

class DateTimeTest extends TestCase
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
    
        //date_default_timezone_set('UTC');
        PhaTime\DateTime::$timezone='UTC';
    
        $this->assertEquals('23:20:32', PhaTime\DateTime::format_time('20121210232032'));
    
    }
    
    public function testObtainLocaleTime()
    {
    
        //date_default_timezone_set('Europe/Madrid');
        
        PhaTime\DateTime::$timezone='Europe/Madrid';
    
        $this->assertEquals('00:20:32', PhaTime\DateTime::format_time('20121210232032'));
    
    }
    
    public function testObtainGMDate()
    {
    
        PhaTime\DateTime::$timezone='UTC';
    
        $this->assertEquals('2012/12/10', PhaTime\DateTime::format_date('20121210232032'));
    
    }
    
    public function testObtainLocaleDate()
    {
    
        PhaTime\DateTime::$timezone='Europe/Madrid';
    
        $this->assertEquals('2012/12/11', PhaTime\DateTime::format_date('20121210232032'));
    
    }
    
    public function testLocaltoGMT()
    {
    
        date_default_timezone_set('Europe/Madrid');
        $this->assertEquals('20121209232032', PhaTime\DateTime::local_to_gmt('20121210002032'));
        $this->assertEquals('20120809232032', PhaTime\DateTime::local_to_gmt('20120810012032'));
    
    }
    
    public function testObtainFormatDate()
    {
    
        PhaTime\DateTime::$timezone='UTC';
    
        $arr_time=PhaTime\DateTime::format_timedata('20121210102032PM');
        
        $this->assertEquals('22', $arr_time[3]);
        
        $arr_time=PhaTime\DateTime::format_timedata('20121210102032AM');
        
        $this->assertEquals('10', $arr_time[3]);
    
        //$this->assertEquals('2012/12/10', PhaTime\DateTime::format_date('20121210232032'));
    
    }
    
}

?>
