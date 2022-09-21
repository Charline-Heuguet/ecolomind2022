<?php

/**
 * Plugin Name: Ecolomind
 * Version: 1
 * Author: Ecolomind
 * Plugin URI : http://localhost:8000
*/

// Désactivation de la sécurité du plugin qui fait bugger ce dernier a voir avec les backs. a réactiver une fois le fichier sécurité fonctionnel
/*include plugin_dir_path(__FILE__) . 'security/init.php'; */


require __DIR__ . "/vendor/autoload.php";

// We define a named constant. Its value is the full path and name of ecolomind.php
define("ECOLOMIND_PLUGIN_ENTRY", __FILE__);


// Instantiation of the class Plugin
$plugin = new Ecolomind\Plugin;

// run() is defined in Plugin.php
$plugin->run();


?>