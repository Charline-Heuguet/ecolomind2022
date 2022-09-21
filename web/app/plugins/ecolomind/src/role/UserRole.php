<?php

// 'User' role file

namespace Ecolomind\role;

class UserRole
{
    const ROLE_SLUG = "users";
    
    public static function register()
    {

        // Attention le contributor aura le droit d'écrire et de proposer des recette mais pas de les rendre lisibles/ les publier
        $capabilities = [
            "read" => false
        ];

        add_role(self::ROLE_SLUG, "Utilisateurs", $capabilities);
    }
}