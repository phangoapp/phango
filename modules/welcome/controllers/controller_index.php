<?php

use PhangoApp\PhaRouter\Controller;
use PhangoApp\PhaView\View;

class indexController extends Controller {

	public function home()
	{
		
		echo View::load_view(array('Hello world', '<p>This is an example of the power of Phango!!</p><p>PHP version: ' . phpversion()), 'welcome/home');
	
	}

	//A example with symlink
	
	public function page($integer, $string)
	{
		
		echo View::load_view(array('Example', '<p>First element: '.$integer.'</p><p>Second element: '.$string.'</p>'), 'welcome/home');
		
	}

}

?>
