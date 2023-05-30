<?php

session_start();
define('PROJECT_ROOT', dirname(__DIR__));
require 'vendor/autoload.php';
require "vendor/larapack/dd/src/helper.php";

  $_ENV['routes']= require "routes/web.php";
require 'app/helpers/funciones.php';
require 'viteconfig.php';

require 'config/config.php';
require 'app/views/recursos.php';

require 'config/services.php';

url('canales');




$core = new core\Core($container);

$core->run();

