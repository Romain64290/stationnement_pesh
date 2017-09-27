<?php

require('/var/www/stationnement/include/config.inc.php');
require('/var/www/stationnement/include/connexion.inc.php');
require('/var/www/stationnement/modules/cron/model.inc.php');
require('/var/www/stationnement/plugins/PHPMailer/class.phpmailer.php');

// préparation connexion
$connect = new connection();
$cron = new cron($connect);

// Date jours plus 7
$date_jplus7=date('Y-m-d', strtotime('+7 days'));

// Date jours plus 30
$date_jplus30=date('Y-m-d', strtotime('+1 month'));

// Date jours plus 90
$date_jplus90=date('Y-m-d', strtotime('+3 month'));


//Verifie si demande est exporter et valide et date excate sinon envoi email tous les jours...


//selectionnne les dates de validite qui ont lieue dans 7 jours
$result=$cron->select_reunion($date_jplus7);

foreach($result as $key){
  
$id_decla= $key->id_decla;
	
$result=$cron->emailRappelValidite($id_decla,"J -7 jours");

}
 
//selectionnne les dates de validite qui ont lieue dans 30 jours
$result=$cron->select_reunion($date_jplus30);

foreach($result as $key){
  
$id_decla= $key->id_decla;
	
$result=$cron->emailRappelValidite($id_decla,"J -30 jours");

}

//selectionnne les dates de validite qui ont lieue dans 90 jours
$result=$cron->select_reunion($date_jplus90);

foreach($result as $key){
  
$id_decla= $key->id_decla;
	
$result=$cron->emailRappelValidite($id_decla,"J -90 jours");

}
