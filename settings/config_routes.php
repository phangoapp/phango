<?php

use PhangoApp\PhaRouter2\Router;

Router::$root_url='/';

Router::$app='phangoapp/welcome';

Router::$apps=['welcome'];

Router::$base_path=getcwd();

Router::$root_path=Router::$base_path.'/vendor';

?>
