<?php

class Qcm {

    private $_db;
    private $questions = [];
    private $appreciation;


    public function __construct($db){
        $this->setDb($db);
    }

    public function hydrate(){

    }

    public function setDb(PDO $db){
        $this->_db = $db;
    }
}
