<?php

$arr_composer=array(

    "name" => "phangoapp/framework",
    "description" => "A framework for create nice apps",
    
     "license" => "GPL",
    "authors"=> [
        array(
            "name"=> "Antonio de la Rosa",
            "email"=> "webmaster@web-t-sys.com"
        )
    ],
    
    "minimum-stability" => "dev",

    "repositories" => [array(
            "type"=> "vcs",
            "url"=> "https://github.com/phangoapp/pharouter.git"
       ), 
       array(
            "type"=> "vcs",
            "url"=> "https://github.com/phangoapp/phaview.git"
        ),
	array(
            "type"=> "vcs",
            "url"=> "https://github.com/phangoapp/phamodels.git"
        ),
        array(
            "type"=> "vcs",
            "url"=> "https://github.com/phangoapp/phautils.git"
        ),
	array(
            "type"=> "vcs",
            "url"=> "https://github.com/phangoapp/phai18n.git"
        ),
	array(
            "type"=> "vcs",
            "url"=> "https://github.com/phangoapp/phalibs.git"
        ),
        array(
            "type"=> "vcs",
            "url"=> "https://github.com/phangoapp/admin.git"
        ),
	 array(
            "type"=> "vcs",
            "url"=> "https://github.com/phangoapp/welcome.git"
        ),
         array(
            "type"=> "vcs",
            "url"=> "https://github.com/phangoapp/lang.git"
        ),
	array(
            "type"=> "vcs",
            "url"=> "https://github.com/phangoapp/phatime.git"
        )
	],

    "require" => array(

	"phangoapp/pharouter"=> "dev-master",
        "phangoapp/phaview"=> "dev-master",
	"phangoapp/phamodels"=> "dev-master",
	"phangoapp/phautils"=> "dev-master",
	"phangoapp/phai18n"=> "dev-master",
	"phangoapp/phalibs"=> "dev-master",
	"phangoapp/admin"=> "dev-master",
	"phangoapp/welcome"=> "dev-master",
	"phangoapp/lang"=> "dev-master",
	"phangoapp/phatime"=>"dev-master",
	"ext-gd"=> "*",
	"ext-libxml"=> "*",
	"league/climate"=> "dev-master"
	
    )

);

?>
