<?php

/***** Dernière modification : 08/09/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
$menu=2;
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');


// préparation connexion
$connect = new connection();
$export = new export($connect);

if($_GET['export']=='ok'){$export_en_cours=$export->exportEnCoursOk();}
if($_GET['export']=='encours'){$export_en_cours=$export->exportEnCoursEncours();}
if($_GET['export']=='abort'){$export_en_cours=$export->exportEnCoursAbort();}

header('Location:index.php');
