<?php
class Question {
   private $question;
   private $reponses=[];
   private $explication;
 
   public function __construct($question) {
      $this->question = $question;
    
   }
 
   public function ajouterReponse($reponse) {
      array_push($this->reponses,$reponse);
   
   }
 
   public function setExplications($explication) {
      $this->explication = $explication;
      return $this;
   }
 
   public function getQuestion() {
      return $this->question;
   }
 
   public function getExplication() {
      return $this->explication;
   }

   public function getArrayReponse() {
            return $this->reponses;
            

    }
 }
