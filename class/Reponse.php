<?php
    
class Reponse{
    private $reponse;
    const BONNE_REPONSE= TRUE;
    const MAUVAISE_REPONSE= FALSE;
    public function __construct($reponse)
    {
      $this->reponse=$reponse;
    }
    public function getReponse()
    {
      return $this->reponse;
      
    }
}