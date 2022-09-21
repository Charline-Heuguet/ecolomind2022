<?php

namespace Ecolomind;

use Ecolomind\ct\DifficultyTaxonomy;
use Ecolomind\ct\IngredientsTaxonomy;
use Ecolomind\ct\RoomsTaxonomy;
use Ecolomind\ct\TargetTaxonomy;
use Ecolomind\ct\ToolsTaxonomy;
use Ecolomind\role\ModeratorRole;
use Ecolomind\role\UserRole;

class Plugin
{

    public function run()
    {
 //Dans une classe, la fonction add_action à besoin de connaitre, en plus du nom de la fonction à exécuté, le contexte d'execution
 add_action('init', [$this, 'onInit']);
        
 //Lorsque l'on active le plugin on effectue l'action 
 register_activation_hook(ECOLOMIND_PLUGIN_ENTRY, [$this, "onPluginActivation"]);

 //Le callback s'execute à la desactivation du plugin
 register_deactivation_hook(ECOLOMIND_PLUGIN_ENTRY, [$this, "onPluginDeactivation"]);
        
    }
    
    public function onPluginActivation(){

        // Taxonomies
        DifficultyTaxonomy::register();
        IngredientsTaxonomy::register();
        RoomsTaxonomy::register();
        TargetTaxonomy::register();
        ToolsTaxonomy::register();

        //Roles    
        ModeratorRole::register();
        UserRole::register();

    }

    public function onPluginDeactivation(){



    }

    public function onInit(){

        DifficultyTaxonomy::register();
        IngredientsTaxonomy::register();
        RoomsTaxonomy::register();
        TargetTaxonomy::register();
        ToolsTaxonomy::register();
        
    }
}

