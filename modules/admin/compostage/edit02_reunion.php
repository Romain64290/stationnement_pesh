<?php

/***** Dernière modification : 08/09/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/../../../plugins/PHPMailer/class.phpmailer.php');
require(__DIR__ .'/model.inc.php');

// préparation connexion
$connect = new connection();
$compostage = new compostage($connect);

$compostage->majReunion($_POST['id_reunion'],$_POST['type_reunion'],$_POST['date'],$_POST['heure_debut'],$_POST['adresse'],$_POST['ville'],$_POST['lien_map'],$_POST['reunion_ouverte'],$_POST['limite']);

//envoi d'un email à tous les participants
$compostage->emailEditReunion($_POST['id_reunion']);

header('Location: listing.php');
