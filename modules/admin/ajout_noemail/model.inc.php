<?php

/***** Dernière modification : 29/09/2016, Romain TALDU	*****/

 class ajout_noemail {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
    }


/**************************************************************************
 * Insertion des facture dans la base de donnees par une societe
***************************************************************************/
 
 function save_demande($civilite,$type_decla,$nom,$prenom,$immat,$uniqid,$justificatif1,$justificatif2,$telephone,$adresse,$cp,$ville)
  {
  
  	try {
				
			
$insert = $this->con->prepare('INSERT INTO decla_immat (type_decla, civilite,nom,prenom,immatriculation,date_decla,ip_adresse,dossier,justificatif1,justificatif2,telephone,adresse,cp,ville)
VALUES(:type_decla, :civilite,:nom,:prenom,:immatriculation,:date_decla,:ip_adresse,:dossier,:justificatif1,:justificatif2,:telephone,:adresse,:cp,:ville)');
 
$insert->bindParam(':type_decla', $type_decla, PDO::PARAM_INT);
$insert->bindParam(':civilite', $civilite, PDO::PARAM_INT);
$insert->bindParam(':nom', $nom, PDO::PARAM_STR);
$insert->bindParam(':prenom', $prenom, PDO::PARAM_STR);
$insert->bindParam(':immatriculation', $immat, PDO::PARAM_STR);
$insert->bindValue(':date_decla', date('Y-m-d H:i:s'),PDO::PARAM_STR);
$insert->bindValue(':ip_adresse', $_SERVER['REMOTE_ADDR'],PDO::PARAM_STR);
$insert->bindParam(':dossier', $uniqid, PDO::PARAM_STR);
$insert->bindParam(':justificatif1', $justificatif1, PDO::PARAM_STR);
$insert->bindParam(':justificatif2', $justificatif2, PDO::PARAM_STR);
$insert->bindParam(':telephone', $telephone, PDO::PARAM_STR);
$insert->bindParam(':adresse', $adresse, PDO::PARAM_STR);
$insert->bindParam(':cp', $cp, PDO::PARAM_STR);
$insert->bindParam(':ville', $ville, PDO::PARAM_STR);

$execute=$insert->execute();		

			} 
        
        catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de l'enregistrement d'une demande</b>\n";
            throw $e;
        }   
     
     
  }
 
 
 
  /********************************
 * Upload des factures
*********************************/  
   
 function uploadFractures($file,$destination_factures,$num_document)
{			
// Creer le repertoire s'il n'existe pas
if(!is_dir($destination_factures)){mkdir($destination_factures, 0775, true);}
     
$ext = pathinfo($file['name'], PATHINFO_EXTENSION);   

$maxsize=5485760;

	
 $destination=$destination_factures.$num_document.".".$ext;  
     
    if ( $file['error'] > 0) return FALSE;

  			if ($file['size'] < $maxsize) {
  
     
		move_uploaded_file($file['tmp_name'], $destination);
                chmod($destination, 0664);}
 
return $destination;


}	


    }


