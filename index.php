<?php
require_once(__DIR__."/config/autoload.php");
$db = new PDO('mysql:host=127.0.0.1;dbname=qcm', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
$qcm = new Qcm();
$manager = new Qcm($db);


$question1 = new Question('POO signifie?');
$question1->ajouterReponse(new Reponse('Php Orienté Objet'));
$question1->ajouterReponse(new Reponse('ProgrammatiOn Orientée'));
$question1->ajouterReponse(new Reponse('Programmation Orientée Objet', Reponse::BONNE_REPONSE));
$question1->setExplications('Sans commentaires si vous avez eu faux :-°');
$qcm->ajouterQuestion($question1);

$question2 = new Question('Qui est cthulhu?');
$question2->ajouterReponse(new Reponse('un prêtre extraterrestre', Reponse::BONNE_REPONSE));
$question2->ajouterReponse(new Reponse('une marque de chaussure'));
$question2->ajouterReponse(new Reponse('obi wan kennobi'));
$question2->setExplications('Sans commentaires si vous avez eu faux :-°');
$qcm->ajouterQuestion($question2);
 
 
$qcm->setAppreciation(array('0-10' => 'Pas top du tout ...',
                            '10-20' => 'Très bien ...'));
$qcm->generer();


?>

