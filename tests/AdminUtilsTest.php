<?php

use PhangoApp\PhaLibs\AdminUtils;
use PhangoApp\PhaRouter\Routes;

include("../vendor/autoload.php");
/*
if(!defined('ADMIN_FOLDER'))
{

    define('ADMIN_FOLDER', 'admin');

}
  */  
    
class AdminUtilsTest extends PHPUnit_Framework_TestCase
{
	public function testAdminUtils()
	{
        
        //Routes::$root_url.'index.php/admin/index/home/module/get/op/1', AdminUtils::set_admin_link('module', array('op' => 1))
        
        $this->assertEquals(Routes::$root_url.'index.php/admin/index/home/module/get/op/1', AdminUtils::set_admin_link('module', array('op' => 1)) );
        
    }

}

?>
