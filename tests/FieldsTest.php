<?php

use PhangoApp\PhaModels\CoreFields;

include("../vendor/autoload.php");

class FieldsTest extends PHPUnit_Framework_TestCase
{

    public function testCheckCharField()
    {
    
        $field=new CoreFields\CharField(255);
        
        $value="sorry\"";
        
        //sorry&quot;
        
        $this->assertEquals('sorry&quot;', $field->check($value) );
    
    }
    
    public function testCheckBooleanField()
    {
    
        $field=new CoreFields\BooleanField();
        
        $value=1;
        
        $this->assertEquals(1,  $field->check($value) );
        
        $value=0;
        
        $this->assertEquals(0, $field->check($value) );
        
        $value=25;
        
        $this->assertEquals(0, $field->check($value) );
    
    }
    
    public function testDoubleField()
    {
        
        $field=new CoreFields\DoubleField();
        
        $double=-3.7536687;

        $this->assertEquals(-3.7536687, $field->check($double) );
        
        $this->assertEquals(0, $field->check('"word"') );
        
    }
    
    public function testPhoneField()
    {
        
        
    }
    
    public function testChoiceField()
    {
    
        
    
    }
    
    public function testDateField()
    {
        
        $field=new CoreFields\DateField();
        
        $date='20160124122510';
        
        $this->assertEquals('20160124112510', $field->check($date) );
        
    }
}

?>
