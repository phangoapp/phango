<?php

use PhangoApp\PhaLibs\AdminUtils;

include("../vendor/autoload.php");

define('ADMIN_FOLDER', 'admin');

class AdminUtilsTest extends PHPUnit_Framework_TestCase
{
	public function testAdminUtils()
	{
        
        $this->assertEquals('/index.php/admin/index/home/module/get/op/1', AdminUtils::set_admin_link('module', array('op' => 1)));
        
    }

}

?>
