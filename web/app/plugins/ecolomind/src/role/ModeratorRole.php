<?php

// 'Moderator' role file

namespace Ecolomind\role;

class ModeratorRole

{ 
  const ROLE_SLUG = "moderator";

  public static function register(){
    $capabilities = [
        'moderate_comments' => true,
        'delete_posts' => true,
        'edit_posts' => true,
        'publish_posts' => true,
        'manage_categories' => true,
        'manage_links' => true,
        'edit_others_posts' => true,
        'delete_others_posts' => true,
        'edit_published_posts' => true,
        'upload_files' => true,
        'delete_published_posts' => true,
        'read' => true,
    ];

    add_role(self::ROLE_SLUG, "Modérateur", $capabilities);

  }

  public static function unregister()
  {
      remove_role(self::ROLE_SLUG);
  }

}