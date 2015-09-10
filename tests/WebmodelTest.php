<?php

use PhangoApp\PhaModels\Webmodel;
use PhangoApp\PhaUtils\Utils;
use PhangoApp\PhaModels\CoreFields\CharField;

include("../vendor/autoload.php");

Utils::load_config('config', '../settings');

$table_test=new Webmodel('table_test');
		
$table_test->register('name', new CharField(255));

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
		
		$this->assertEquals(1, $table_test->insert(array('name' => 'Name')));
		
	
	}
	
	/**
	* @depends testCreateTable
	*/
	
	public function testUpdateRow()
	{
		global $table_test;
		
		$this->assertEquals(1, $table_test->update(array('name' => 'Name')));
		
	
	}
	
	/**
	* @depends testCreateTable
	* @depends testInsertRow
	* @depends testUpdateRow
	*/
	
	public function testDropTable()
	{
		global $table_test;
		
		$this->assertTrue(Webmodel::drop_table($table_test->name));
	
	}

}

?>
