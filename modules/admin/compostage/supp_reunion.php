<?php

/***** Dernière modification : 27/09/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/../../../plugins/PHPMailer/class.phpmailer.php');
require(__DIR__ .'/model.inc.php');

$id_reunion=$_GET['id_reunion'];


// préparation connexion
$connect = new connection();
$compostage = new compostage($connect);

//envoi d'un email à tous les participants
$compostage->emailSuppReunion($id_reunion);

//suppression de la reunion, des inscrits et des jointures
$compostage->suppReunion($id_reunion);

header('Location:listing.php');