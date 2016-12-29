<?php

class hrmModel extends Model{
    public function __construct() {
        parent::__construct();
    }
    

    public function getBoletas(){
        $boletas = $this->_db->query("SELECT * FROM snvg_ttslog;");
        $boletas->setFetchMode(PDO::FETCH_ASSOC);
        return $boletas->fetchall();
    }
}