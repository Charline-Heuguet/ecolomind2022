<?php

/**
 * Plugin Name: Ecolomind
 * Version: 1
 * Author: Ecolomind
 * Plugin URI : http://localhost:8000
 */

require __FILE__ ."/security/init.php";

require __DIR__ . "/vendor/autoload.php";

 //On se créé une constante qui sera une référence à ce fichier précisement (sera utilisé au moment où on écoutera le hook permetant de détecter l'activation ou la désactivation de ce plugin)
define("ECOLOMIND_PLUGIN_ENTRY", __FILE__);


 //On instancie la class Plugin qui sera le cerveau des opérations
 $plugin = new Ecolomind\Plugin;
 $plugin->run();