<?php
class QCM{
    private $questions=[];
    private $appreciation;
    private $_db; // Instance de PDO 
    public function __construct($db)  {
     $this->setDb($db);     }
    
    
    public function ajouterQuestion($question){
    $this->questions[]=$question;
    return $this;
}

public function generer (){
    foreach ($this->questions as $question){
        echo '<h2>'.$question->getQuestion().'</h2>';
        echo "<br>";
        foreach($question->getArrayReponse() as $reponse){
            echo "<input type='radio'>".$reponse->getReponse()."</a>";
            echo"<br>";
        }
    }

}

public function setAppreciation(){
    
   
    
}

public function getAppreciation(){
    
}
public function setDb(PDO $db){
    $this->_db=$db;
}
}


