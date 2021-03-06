<?php
 function chargerClasse($classname)
 {
   require 'class/'. $classname.'.php';
 }
 
 spl_autoload_register('chargerClasse');
$db = new PDO('mysql:host=127.0.0.1;dbname=qcm', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.


$manager = new Qcm($db);
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
  $AllQuestion = $questionManager->get();
  foreach ($AllQuestion as $question) {
  ?>
     <br> <div class="title"><?= $question->getSujet()?></div><br>
    <?php
    $AllReponse = $reponseManager->getReponseByQuestion($question->getId()); ?>
      <div class="rep">
  <?php
    foreach ($AllReponse as $reponse) { ?>
  
        <input class="form-check-input ok" type="checkbox" value="" id="flexCheckDefault" data-info="<?= $reponse->getIsTrue()?>">
        <?= $reponse->getReponse()?>
      <br>
  
  <?php } ?>
<button class="valide">Valider</button>
    </div>
  <?php
  }

?>
<br>
   
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO_QCM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="/QCM/css/main.css"rel="stylesheet" >
</head>
<body>

<a href="/QCM/formulaire.php" >Ajouter une question</a>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="/QCM/js/main.js"></script>
</html>
