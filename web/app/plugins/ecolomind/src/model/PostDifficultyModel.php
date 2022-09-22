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
            difficulty_id int(3) NOT NULL,
            primary key (id)
        ) $charset_collate;";

        $this->wpdbDanslemodel->query($sql);
}

    public function drop(){
        $sql = "DROP TABLE IF EXISTS ". self::TABLE_NAME ;
        $this->wpdbDanslemodel->query($sql);
  }
  
 
    /*  public function insert_data_into_table(){
        $data=[
                "id" => 1,
                "post_id " => 1,
                "difficulty_id" => 1,
        ];

        $this->wpdbDanslemodel->insert(self::TABLE_NAME, $data);

    }  */  

}