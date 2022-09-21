<?php

namespace Ecolomind\model ;

class PostDifficultyModel
{
    const TABLE_NAME = 'post_difficulty' ;

    protected $wpdbDanslemodel;

    public function __construct()
    {
        global $wpdb;
        $this->wpdbDanslemodel = $wpdb;
    }
public function create()
{    
        $charset_collate = $this->wpdbDanslemodel->get_charset_collate();

        $sql = "CREATE TABLE ".self::TABLE_NAME." (
            id mediumint(9) NOT NULL,
            post_id mediumint(9) NOT NULL,
            difficulty_id mediumint(9) NOT FULL
        ) $charset_collate;";

        $this->wpdbDanslemodel->query($sql);
}
public function drop(){
        $sql = "DROP TABLE IF EXISTS ". self::TABLE_NAME ;
        $this->wpdbDanslemodel->query($sql);
  }


}