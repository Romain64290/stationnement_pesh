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
$dashboard->modifEtat($_GET['id_decla'],2);

//suppression de la plaque d'immatriculation
//$dashboard->immatRefuse($_POST['id_decla'],$_POST['motif']);

//recherche du nom de dossier pour suppression
$dossier=$dashboard->chercheDossier($_GET['id_decla']);

$dir=CHEMIN_UPLOAD.$dossier;
//suppression des justificatifs
rrmdir($dir);

 function rrmdir($dir) {
   if (is_dir($dir)) {
     $objects = scandir($dir);
     foreach ($objects as $object) {
       if ($object != "." && $object != "..") {
         if (filetype($dir."/".$object) == "dir") rmdir($dir."/".$object); else unlink($dir."/".$object);
       }
     }
     reset($objects);
     rmdir($dir);
   }
 }




Header("Location:index.php");

