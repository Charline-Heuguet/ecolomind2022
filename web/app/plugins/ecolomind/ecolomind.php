<?php

/**
 * Plugin Name: Ecolomind
 * Version: 1
 * Author: Ecolomind
 * Plugin URI : http://localhost:8000
*/


// Inclusion of a security file. We had the path wrong the first time
include plugin_dir_path(__FILE__) . 'src/security/init.php';



require __DIR__ . "/vendor/autoload.php";

// We define a named constant. Its value is the full path and name of ecolomind.php
define("ECOLOMIND_PLUGIN_ENTRY", __FILE__);


// Instantiation of the class Plugin
$plugin = new Ecolomind\Plugin;

// run() is defined in Plugin.php
$plugin->run();


?>