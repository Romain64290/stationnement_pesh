<?php

/***** Dernière modification : 08/09/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');


// préparation connexion
$connect = new connection();
$dashboard = new dashboard($connect);

//modification de l'etat
$dashboard->modifEtat($_GET['id_decla'],5);

//suppression de la plaque d'immatriculation
//$dashboard->immatRefuse($_POST['id_decla'],$_POST['motif']);

Header("Location:index.php");

