<?php

use PhangoApp\PhaModels\Webmodel;
use PhangoApp\PhaUtils\Utils;
use PhangoApp\PhaModels\CoreFields\CharField;
use PhangoApp\PhaModels\CoreFields\IntegerField;
use PHPUnit\Framework\TestCase;

include("../vendor/autoload.php");

Utils::load_config('config', '../settings');

$table_test=new Webmodel('table_test');
		
$table_test->register('name', new CharField(255));
$table_test->register('lastname', new CharField(255));
$table_test->register('type', new IntegerField());

$table_test->fields_to_update=['name', 'lastname', 'type'];

class WebmodelTest extends TestCase
{

	public function testCreateTable()
	{
		global $table_test;
		
		$this->assertTrue($table_test->create_table());
	
	}
	
	/**
	* @depends testCreateTable
	*/
	
	public function testInsertRow()
	{
		global $table_test;
		
		$this->assertEquals(1, $table_test->insert(array('name' => 'Name', 'lastname' => 'LastName', 'type' => 1)));
		
	
	}
	
	/**
	* @depends testCreateTable
	* @depends testInsertRow
	*/
	
	public function testUpdateRow()
	{
		global $table_test;
		
		$this->assertEquals(1, $table_test->update(array('name' => 'Name', 'lastname' => 'LastName', 'type' => 1)));
		
	
	}
	
	/**
	* @depends testCreateTable
	* @depends testInsertRow
	*/
	
	public function testSelectRow()
	{
		global $table_test;
		
		$query=$table_test->select();
		
		$this->assertEquals(array('IdTable_test' => 1, 'name' => 'Name', 'lastname' => 'LastName', 'type' => 1), $table_test->fetch_array($query));
	
	}
	
	/**
    * @depends testCreateTable
    * @depends testInsertRow
    */
    
    public function testSelectWhereRow()
    {
        global $table_test;
        
        $table_test->set_conditions(['WHERE name=? and lastname=? and type=?', ['Name', 'LastName', 1]]);
        
        $table_test->set_order(['name' => ORDER_DESC]);
        
        $table_test->set_limit([1]);
        
        $query=$table_test->select();
        
        $this->assertEquals(array('IdTable_test' => 1, 'name' => 'Name', 'lastname' => 'LastName', 'type' => 1), $table_test->fetch_array($query));
    
    }
	/**
	* @depends testCreateTable
	* @depends testInsertRow
	*/
	
	public function testSelectCountRow()
	{
		global $table_test;
		
		$this->assertEquals(1, $table_test->select_count());
	
	}
	
	/**
    * @depends testCreateTable
    * @depends testInsertRow
    */
    
    public function testSetConditionsRow()
    {
        global $table_test;
        
        $table_test->set_conditions(['WHERE name=? and lastname=? and type=? and lastname IN ?', ['Name"', 'LastName"', 1, [25, 'Pepito"']]]);
        
        $this->assertEquals('WHERE name="Name\"" and lastname="LastName\"" and type=1 and lastname IN (25, "Pepito\"")', $table_test->conditions);
    
    }
	
	/**
	* @depends testCreateTable
	*/
	
	public function testDropTable()
	{
		global $table_test;
		
		$this->assertTrue(Webmodel::drop_table($table_test->name));
	
	}

}

?>
