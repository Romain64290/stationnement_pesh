<?php

require(__DIR__ .'/../../../include/verif_session.php');
require('../../../include/config.inc.php');
require('../../../include/connexion.inc.php');
require('model.inc.php');


// préparation connexion
$connect = new connection();
$ajout_specifique = new ajout_specifique($connect);


$bonne_immat=verifImmatriculation($_POST['immatriculation']);


if(!$bonne_immat){
    Header("Location:index.php?valide=no#inscrire");
 
}else{
   
  
 // Insertion des elements dans 
$ajout_specifique->save_demande($_POST['type_decla'],$bonne_immat);
    
    		
		
	Header("Location:index.php?valide=ok#inscrire");
    


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

