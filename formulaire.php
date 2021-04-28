<?php
 function chargerClasse($classname)
 {
   require 'class/'. $classname.'.php';
 }
 
 spl_autoload_register('chargerClasse');
$db = new PDO('mysql:host=127.0.0.1;dbname=qcm', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.


$questionManager = new QuestionManager($db);
$reponseManager = new ReponseManager($db);
if (isset($_POST['sujet']) && isset($_POST['reponse1']) &&  isset($_POST['reponse2']) && isset($_POST['reponse3'])&& isset($_POST['description'])) {
  
    $question = new Question(['sujet'=> $_POST['sujet'] , 'description' => $_POST['description']]);
    $questionManager->add($question);
  
 
  
    $reponse = new Reponse(['reponse' => $_POST['reponse1'], 'isTrue' => true, 'idQuestion' => $question->getId()]);
    $reponse2 = new Reponse(['reponse' => $_POST['reponse2'], 'isTrue' => false, 'idQuestion' => $question->getId()]);
    $reponse3 = new Reponse(['reponse' => $_POST['reponse3'], 'isTrue' => false, 'idQuestion' => $question->getId()]);
    $reponseManager->add($reponse);
    $reponseManager->add($reponse2);
    $reponseManager->add($reponse3);
    
  }
  $allQuestions = $questionManager->get();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link href="/QCM/css/main.css"rel="stylesheet" >
</head>
<body>
<div class="container-form">
      <form action="" method="post">
          <div class="formulaire">
            Question : <input type="text" name="sujet" maxlength="240" style="margin-bottom: 10px;"/><br>
            Réponse 1 (bonneReponse) : <input type="text" name="reponse1" maxlength="240" style="margin-bottom: 10px;"/><br>
            Réponse 2 : <input type="text" name="reponse2" maxlength="240" style="margin-bottom: 10px;"/><br>
            Réponse 3 : <input type="text" name="reponse3" maxlength="240" style="margin-bottom: 10px;"/><br>
            Description : <input type="text" name="description" maxlength="240" style="margin-bottom: 10px;"/><br>
          
            <input type="submit"  name="question" style="margin-bottom: 10px">
          </div>
      </form>
     
  </div>
  <a href="/QCM/index.php" >Index</a>
</body>
</html>