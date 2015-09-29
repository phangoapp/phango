<?php

use PhangoApp\PhaRouter\Routes;

Routes::$root_url='/';

Routes::$app='phangoapp/welcome';

Routes::$apps=['welcome'];

Routes::$base_path=getcwd();

Routes::$root_path=Routes::$root_path.'/vendor';

?>