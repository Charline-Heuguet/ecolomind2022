<?php


namespace Ecolomind\cpt;

class TipsPostType {

    const CPT_SLUG = "tips";

    public static function register(){
        
        register_post_type(self::CPT_SLUG, [
            'labels' => [ 
              'name' => 'Astuce',
              'all_items' => 'Toutes les astuces',
              'singular_name' => 'Astuce',
              'add_new_item' => 'Créer une astuce',
              'edit_name' => 'Modifier une astuce',
              'menu_name' => 'Astuces banana' //Affichage dans le menu du BO
            ],
            'public' => true,
            'show_in_rest' => true,
            'has_archive' => true, 

            'supports' => [ // features de ce CPT
                'title', // titre
                'editor', 
                'author', // les posts de ce CPT sont liés à un Auteur
                'thumbnail', // active les featured image
                'revisions', // active l'historique de versions
                'custom-fields',
                'tags',
                'excerpt',
                'comments' // Nos astuces pourront être commentées par les utilisateurs
            ],
            'capability_type' => 'tips',// Va générer les capabiliy edit, read, delete pour le post type à partir de la chaine de caractère CPT_SLUG (read_recipes, edit_recipes, delete_recipes) et sous categories de caps comme edit_private_recipes
            "map_meta_cap" => true,
            'menu_position' => 1, // position dans le BO de WP
            'menu_icon' => 'dashicons-book-alt' 
            
        ]);  
    }
}


?>