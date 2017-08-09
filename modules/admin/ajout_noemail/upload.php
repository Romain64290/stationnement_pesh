<?php

require(__DIR__ .'/../../../include/verif_session.php');
require('../../../include/config.inc.php');
require('../../../include/connexion.inc.php');
require('model.inc.php');


// préparation connexion
$connect = new connection();
$ajout_noemail = new ajout_noemail($connect);

if($_POST['type_decla']=="pmr"){$type_decla=1;}else{$type_decla=2;}

$_SESSION['civilite'] = $_POST['civilite'];
$_SESSION['prenom'] = $_POST['prenom'];
$_SESSION['nom'] = $_POST['nom'];
$_SESSION['immatriculation'] = $_POST['immatriculation'];
$_SESSION['telephone'] = $_POST['telephone'];
$_SESSION['adresse'] = $_POST['adresse'];
$_SESSION['cp'] = $_POST['cp'];
$_SESSION['ville'] = $_POST['ville'];
$_SESSION['type_decla'] = $type_decla;






$bonne_immat=verifImmatriculation($_POST['immatriculation']);


if(!$bonne_immat){
    Header("Location:index.php?valide=no#inscrire");
 
}else{
   
 
 // $uniqid => nom de dossier plus securisé pour les pieces jointes
$uniqid=uniqid();


//Chemin de destination des documents
$destination_factures=CHEMIN_UPLOAD.$uniqid."/";

//recupere l'imatriculation reformatée


//upload des fichiers, test d'encryptage, envoi des fichier cryptés par email	
$televersement="ok";

if($_FILES['upload1']['size'] > 0) {$resultat_upload1=$ajout_noemail->uploadFractures($_FILES['upload1'],$destination_factures,1);}
if($_FILES['upload2']['size'] > 0) {$resultat_upload2=$ajout_noemail->uploadFractures($_FILES['upload2'],$destination_factures,2);}

if((!$resultat_upload1) OR (!$resultat_upload2)) {Header("Location:index.php?valide=upload#inscrire"); exit;} 

else{

    $justificatif1 ="1.".pathinfo($_FILES['upload1']['name'], PATHINFO_EXTENSION);
    $justificatif2 ="2.".pathinfo($_FILES['upload2']['name'], PATHINFO_EXTENSION);
    
 // Insertion des elements dans 
$ajout_noemail->save_demande($_POST['civilite'],$type_decla,$_POST['nom'],$_POST['prenom'],$bonne_immat,$uniqid,$justificatif1,$justificatif2,$_POST['telephone'],$_POST['adresse'],$_POST['cp'],$_POST['ville']);
    
    		
		
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

