<?php

// 'tools" taxonomy table file

namespace Ecolomind\ct;


class ToolsTaxonomy 
{
    const CT_SLUG = "tools";

    public static function register()
    {
        register_taxonomy(
            self::CT_SLUG,
            ['post'],
            [
                'labels' => [
                    'name' => 'Ustensiles',
                    'new_item_name' => 'Ajouter un nouvel ustensile'
                ],
                'public' => true,
                'show_in_rest' => true
            ]
        );
    }
}