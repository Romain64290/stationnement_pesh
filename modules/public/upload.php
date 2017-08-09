<?php

require('../../include/config.inc.php');
require('../../include/connexion.inc.php');
require('model.inc.php');
require('../../plugins/PHPMailer/class.phpmailer.php');

// préparation connexion
$connect = new connection();
$publique= new publique($connect);

session_start();
// Détruit toutes les variables de session
$_SESSION = array();

$_SESSION['civilite'] = $_POST['civilite'];
$_SESSION['prenom'] = $_POST['prenom'];
$_SESSION['nom'] = $_POST['nom'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['immatriculation'] = $_POST['immatriculation'];

if($_POST['type_decla']=="pmr"){$type_decla=1;}else{$type_decla=2;}

$bonne_immat=verifImmatriculation($_POST['immatriculation']);


if(!$bonne_immat){
    Header("Location:index.php?valide=no#inscrire");
 
}else{
   
 session_destroy();
   
 // $uniqid => nom de dossier plus securisé pour les pieces jointes
$uniqid=uniqid();


//Chemin de destination des documents
$destination_factures=CHEMIN_UPLOAD.$uniqid."/";

//recupere l'imatriculation reformatée


//upload des fichiers, test d'encryptage, envoi des fichier cryptés par email	
$televersement="ok";

if($_FILES['upload1']['size'] > 0) {$resultat_upload1=$publique->uploadFractures($_FILES['upload1'],$destination_factures,1);}
if($_FILES['upload2']['size'] > 0) {$resultat_upload2=$publique->uploadFractures($_FILES['upload2'],$destination_factures,2);}

if((!$resultat_upload1) OR (!$resultat_upload2)) {Header("Location:index.php?valide=upload#inscrire"); exit;} 

else{

    $justificatif1 ="1.".pathinfo($_FILES['upload1']['name'], PATHINFO_EXTENSION);
    $justificatif2 ="2.".pathinfo($_FILES['upload2']['name'], PATHINFO_EXTENSION);
    
 // Insertion des elements dans 
$publique->save_demande($_POST['civilite'],$type_decla,$_POST['nom'],$_POST['prenom'],$_POST['email'],$bonne_immat,$uniqid,$justificatif1,$justificatif2);
    
    
//envoiEmailConfirmation($_POST['email_societe'],$_FILES['upload1']['name'],$_FILES['upload2']['name'],$_FILES['upload3']['name'],$_FILES['upload4']['name'],$_FILES['upload5']['name']);		
		
	Header("Location:index.php?valide=ok#inscrire");
    
}

}
  
   
   
  

function verifImmatriculation($immatriculation, &$propre = null)
{
    $p = '#^([0-9]+|[a-z]+)(?:\s|-)?([a-z]+|[0-9]+)(?:\s|-)?([a-z]+|[0-9]+)$#i';
    if (preg_match('#^(?(?!ss|ww)[a-hj-np-tv-z]{2})(?:\s|-)?[0-9]{3}(?:\s|-)?(?(?!ss)[a-hj-np-tv-z]{2})$#i', $immatriculation))
    {
        $propre = strtoupper(preg_replace($p, '$1$2$3', $immatriculation));
        return true;
    }
    elseif (preg_match('#^[0-9]{1,4}(?:\s|-)?[a-hj-np-tv-z]{2,3}(?:\s|-)?(?:97[1-6]|0[1-9]|[1-8][0-9]|9[1-5]|2[ab])$#i', $immatriculation))
    {
        $propre = strtoupper(preg_replace($p, '$1$2$3', $immatriculation));  
        return $propre;
    }
    else
    {
        return false;
    }
}

