<?php

class Question {
    protected $id;
    protected $sujet;
    private $description;

    public function __construct($arrayQuestion){
        $this->hydrate($arrayQuestion);
    }
    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value)
        {
          $method = 'set'.ucfirst($key);
          
          if (method_exists($this, $method))
          {
            $this->$method($value);
          }
        }
    }
    public function getSujet(){
       return $this->sujet;
    }
    public function setSujet($sujet){
        $this->sujet = $sujet;
    }

    public function setDescription($description){
        $this->description = $description;
    }
    public function getDescription(){
        return $this->description;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }



}