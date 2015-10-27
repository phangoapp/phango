<?php

use PhangoApp\PhaModels\Webmodel;
use PhangoApp\PhaUtils\Utils;
use PhangoApp\PhaModels\CoreFields\CharField;

include("../vendor/autoload.php");

Utils::load_config('config', '../settings');

$table_test=new Webmodel('table_test');
		
$table_test->register('name', new CharField(255));
$table_test->register('lastname', new CharField(255));

class WebmodelTest extends PHPUnit_Framework_TestCase
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
		
		$this->assertEquals(1, $table_test->insert(array('name' => 'Name', 'lastname' => 'LastName')));
		
	
	}
	
	/**
	* @depends testCreateTable
	* @depends testInsertRow
	*/
	
	public function testUpdateRow()
	{
		global $table_test;
		
		$this->assertEquals(1, $table_test->update(array('name' => 'Name', 'lastname' => 'LastName')));
		
	
	}
	
	/**
	* @depends testCreateTable
	* @depends testInsertRow
	*/
	
	public function testSelectRow()
	{
		global $table_test;
		
		$query=$table_test->select();
		
		$this->assertEquals(array('IdTable_test' => 1, 'name' => 'Name', 'lastname' => 'LastName'), $table_test->fetch_array($query));
	
	}
	
	/**
    * @depends testCreateTable
    * @depends testInsertRow
    */
    
    public function testSelectWhereRow()
    {
        global $table_test;
        
        $table_test->set_conditions(['WHERE name=? and lastname=?', ['Name', 'LastName']]);
        
        $query=$table_test->select();
        
        $this->assertEquals(array('IdTable_test' => 1, 'name' => 'Name', 'lastname' => 'LastName'), $table_test->fetch_array($query));
    
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
	* @depends testUpdateRow
	* @depends testSelectRow
	*/
	
	public function testDropTable()
	{
		global $table_test;
		
		$this->assertTrue(Webmodel::drop_table($table_test->name));
	
	}

}

?>
