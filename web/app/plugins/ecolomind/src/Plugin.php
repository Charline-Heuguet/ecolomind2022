<?php

namespace Ecolomind;

use Ecolomind\model\PostDifficultyModel;

class Plugin
{

    public function run()
    {
        add_action('init', [$this, 'onInit']); 
        register_activation_hook(ECOLOMIND_PLUGIN_ENTRY, [$this, "onPluginActivation"]);
        register_deactivation_hook(ECOLOMIND_PLUGIN_ENTRY, [$this, "onPluginDeactivation"]);
        
    }
    public function onPluginActivation(){
        $activateCustomTable = new PostDifficultyModel;
        $activateCustomTable->create();
     /*    $insert_data_into_table= new PostDifficultyModel;
        $insert_data_into_table->insert_data_into_table();  */
    }
    public function onPluginDeactivation(){
        $activateCustomTable = new PostDifficultyModel;
        $activateCustomTable->drop();
    }
    public function onInit(){  
    }
}

