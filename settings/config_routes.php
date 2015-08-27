<?php

use PhangoApp\PhaRouter\Routes;

Routes::$root_url='/';

Routes::$app='app';

Routes::$apps=['app'];

Routes::$base_path=getcwd();

Routes::$root_path=Routes::$root_path.'/modules';

?>