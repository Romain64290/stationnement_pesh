<?php

/***** Dernière modification : 01/02/2017, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$telephone=$_POST['telephone'];
$adresse=$_POST['adresse'];
$commune=$_POST['commune'];

$id_reunion=$_POST['id_reunion'];
$date_reunion=$_POST['date_reunion'];

// verifie si la varaible $couleur existe ou non 
$couleur = isset($_POST['couleur']) ? $_POST['couleur'] : NULL;

// préparation connexion
$connect = new connection();
$compostage = new compostage($connect);

//envoi d'un usager à la réunion
$compostage->ajoutUser($nom,$prenom,$adresse,$commune,$email,$telephone,$id_reunion,$couleur,$date_reunion);

header('Location:edit_reunion.php?id_reunion='.$id_reunion.'&ajoutparticipant=ok');