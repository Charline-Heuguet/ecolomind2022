<?php

namespace Ecolomind\model ;

class PostDifficultyModel
{
    const TABLE_NAME = 'post_difficulty' ;

    protected $wpdbDanslemodel;

    public function __construct()
    {
        global $wpdb;
        $this->wpdbDanslemodel = $wpdb ;
    }


    public function create(){ 
        
        
        $charset_collate = $this->wpdbDanslemodel->get_charset_collate();

        $sql = "CREATE TABLE ".self::TABLE_NAME." (
            id int(3) NOT NULL AUTO_INCREMENT,
            post_id int(3) NOT NULL,
            level varchar(20) NOT NULL,
            primary key (id)
        ) $charset_collate;";

        $this->wpdbDanslemodel->query($sql);
}

    public function drop(){
        $sql = "DROP TABLE IF EXISTS ". self::TABLE_NAME ;
        $this->wpdbDanslemodel->query($sql);
  }

}