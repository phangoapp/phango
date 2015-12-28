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
    
    public function testChoiceField()
    {
    
        
    
    }
    
    public function testDateField()
    {
    
        
    
    }
}

?>