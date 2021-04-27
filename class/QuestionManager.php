<?php
class QuestionManager
{
  private $_db; // Instance de PDO
  
  public function __construct($db)
  {
    $this->setDb($db);
  }
  
  public function add(Question $question)
  {
    $q = $this->_db->prepare('INSERT INTO questions (sujet, description) VALUES(:sujet, :description)');
    $q->bindValue(':sujet', $question->getSujet());
    $q->bindValue(':description', $question->getDescription($question));
    $q->execute();
    
    $question->hydrate([
      'id' => $this->_db->lastInsertId(),
    ]);
  }
  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}