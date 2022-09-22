<?php

namespace Ecolomind;


use Ecolomind\model\PostDifficultyModel;
use Ecolomind\ct\DifficultyTaxonomy;
use Ecolomind\ct\IngredientsTaxonomy;
use Ecolomind\ct\RoomsTaxonomy;
use Ecolomind\ct\TargetTaxonomy;
use Ecolomind\ct\ToolsTaxonomy;
use Ecolomind\role\ModeratorRole;
use Ecolomind\role\UserRole;
use Ecolomind\cpt\TipsPostType;

class Plugin
{

    public function run()
    {

      
        
        // add_action adds a callback function to an action hook
        add_action('init', [$this, 'onInit']);
     
        // Sets the activation hook for a plugin
        register_activation_hook(ECOLOMIND_PLUGIN_ENTRY, [$this, "onPluginActivation"]);

        // Sets the deactivation hook for a plugin

        register_deactivation_hook(ECOLOMIND_PLUGIN_ENTRY, [$this, "onPluginDeactivation"]);
        
    }
    public function onPluginActivation(){

        $activateCustomTable = new PostDifficultyModel;
        $activateCustomTable->create();
     /*    $insert_data_into_table= new PostDifficultyModel;
        $insert_data_into_table->insert_data_into_table();  */

        

        // Taxonomies
        DifficultyTaxonomy::register();
        IngredientsTaxonomy::register();
        RoomsTaxonomy::register();
        TargetTaxonomy::register();
        ToolsTaxonomy::register();

        //Roles    
        ModeratorRole::register();
        UserRole::register();

        //CPT
        TipsPostType::addCapsToAdmin();

    }
    public function onPluginDeactivation(){

        $activateCustomTable = new PostDifficultyModel;
        $activateCustomTable->drop();
        UserRole::unregister();
    }
  

    public function onInit(){

        DifficultyTaxonomy::register();
        IngredientsTaxonomy::register();
        RoomsTaxonomy::register();
        TargetTaxonomy::register();
        ToolsTaxonomy::register();
        TipsPostType::register();        

    }
}

