<?php

// 'difficulty' taxonomy table file

namespace Ecolomind\ct;


class DifficultyTaxonomy 
{
    const CT_SLUG = "difficulty";

    public static function register()
    {
        register_taxonomy(
            self::CT_SLUG,
            ['post'],
            [
                'labels' => [
                    'name' => 'Difficulté',
                    'new_item_name' => 'Ajouter une nouvelle difficulté'
                ],
                'public' => true,
                'show_in_rest' => true
            ]
        );
    }
}

