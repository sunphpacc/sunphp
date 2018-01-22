<?php
/**
 * This is the call of the user demo sunphp entry
 */
//error_reporting(0);
use Sunphp\Sun;
require_once __DIR__ . '/Sunphp/Sun.php';
//Open to set the default template
\Sunphp\Lib\Configs\Config::$template = "Default";
//Run sunphp
$sun = new Sun();
/**
 * Default shutdown debugging
 * Debug set to 1
 */
$sun->setRunMode(1);
$sun->run();



