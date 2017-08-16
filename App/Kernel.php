<?php
header("Content-type:text/html;charset=utf-8");
require  'vendor/autoload.php';
define("__PUBLIC__","./Public");
Core\App::getInstance()->run();