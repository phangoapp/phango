*<?php

use PhangoApp\PhaModels\Webmodel;
use PhangoApp\PhaUtils\Utils;
use PhangoApp\PhaModels\CoreFields\CharField;
use PhangoApp\PhaModels\CoreFields\PasswordField;
use PhangoApp\PhaModels\CoreFields\EmailField;
use PhangoApp\PhaModels\Forms\PasswordForm;
use PhangoApp\PhaLibs\LoginClass;
use PhangoApp\PhaModels\ExtraModels\UserPhangoModel;

include("../vendor/autoload.php");

Utils::load_config('config', '../settings');

$user_test=new UserPhangoModel('user_test');

$user_test->register('name', new CharField(255));
$user_test->register('username', new CharField(255));
$user_test->register('password', new PasswordField(255));
$user_test->register('email', new EmailField(255));
$user_test->register('token', new CharField(255));

$user_test->create_forms();

$user_test->forms['repeat_password']=new PasswordForm('repeat_password');

$login_class=new LoginClass($user_test, 'username', 'password', 'token', $arr_user_session=array(), $arr_user_insert=array());

$login_class->field_mail='email';

class LoginTest extends PHPUnit_Framework_TestCase
{

    public function testCreateTableUser()
    {
        global $user_test;
        
        $this->assertTrue($user_test->create_table());
        
    }
    
    /**
    * @depends testCreateTableUser
    */
    
    public function testCreateUser()
    {
        global $user_test, $login_class;
        
        $_POST['username']='new_user';
        $_POST['password']='new_password';
        $_POST['repeat_password']='new_password';
        $_POST['email']='example@example.com';
        
        $login_class->arr_user_insert=array_keys($_POST);
        
        $this->assertTrue($login_class->create_account(), $user_test->std_error);
    
    }
    
    //Cannot test login because cookies are sended previusly and give output error
    
    /*
    
    public function testLoginUser()
    {
        global $user_test, $login_class;
        
        $this->assertTrue($login_class->login('new_user', 'new_password'));
        
        $this->assertFalse($login_class->login('new_user_blah', 'new_password_blah'));
        
    }
    
    */
    
    /**
    * @depends testCreateTableUser
    */
    
    public function testDropTable()
    {
        global $user_test;
        
        $this->assertTrue(Webmodel::drop_table($user_test->name));
    
    }
    

}

?>
