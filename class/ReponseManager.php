<?php
class ReponseManager
{
  private $_db; // Instance de PDO
  
  public function __construct($db)
  {
    $this->setDb($db);
  }
  
  public function add(Reponse $reponse)
  {
    $q = $this->_db->prepare('INSERT INTO reponses (reponse, isTrue, id_question) VALUES(:reponse, :isTrue, :id_question)');
    $q->bindValue(':reponse', $reponse->getReponse());
    $q->bindValue(':isTrue', (int)$reponse->getIsTrue());
    $q->bindValue(':id_question', $reponse->getIdQuestion());
    $q->execute();
    
    $reponse->hydrate([
      'id' => $this->_db->lastInsertId(),
    ]);
  }


  // public function getOne(){

  // }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}