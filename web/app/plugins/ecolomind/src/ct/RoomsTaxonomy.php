<?php

// "rooms" taxonomy table file

namespace Ecolomind\ct;


class RoomsTaxonomy
{
    const CT_SLUG = "rooms";

    public static function register()
    {
        register_taxonomy(
            self::CT_SLUG,
            ['tips'],
            [
                'labels' => [
                    'name' => 'Pièces',
                    'new_item_name' => 'Ajouter une nouvelle pièce'
                ],
                'public' => true,
                'show_in_rest' => true,
                'hierarchical' => true
            ]
        );
    }
}