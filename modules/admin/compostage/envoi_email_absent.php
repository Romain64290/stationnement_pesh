<?php

/***** Dernière modification : 01/02/2017, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/../../../plugins/PHPMailer/class.phpmailer.php');
require(__DIR__ .'/model.inc.php');

$id_reunion=$_POST['id_reunion'];

// préparation connexion
$connect = new connection();
$compostage = new compostage($connect);

//selectionne les personnes inscrites qui ne sont pas venue à la réunion
$compostage->emailAbsent($id_reunion);

header('Location:edit_reunion.php?id_reunion='.$id_reunion.'&emailabsent=ok');