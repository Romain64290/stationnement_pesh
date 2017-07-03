<?php

/***** Dernière modification : 04/08/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
//include("../../../include/verif_droits.php");
require(__DIR__ .'/../../../plugins/PHPMailer/class.phpmailer.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');

// préparation connexion
$connect = new connection();
$administrateurs = new administrateurs($connect);

$id_membre=$_GET['id_membre'];
$etat=$_GET['etat'];
$type=$_GET['type'];

// Met a jour l'etat de l'administrateur/AdP
$administrateurs->changeEtat($id_membre,$etat);

//Si admin est validé
// recupere l'email de l'admin et envoi l'email de confirmation de validation
if($etat==1){
$mail_user=$administrateurs->recupMailUser($id_membre);

$administrateurs->envoiMailValidation($mail_user);

}


if ($type=='admin'){header('Location:index.php');}else{header('Location:adp.php');}
?>