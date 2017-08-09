<?php

/***** Dernière modification : 29/09/2016, Romain TALDU	*****/

 class ajout_specifique {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
    }


/**************************************************************************
 * Insertion des facture dans la base de donnees par une societe
***************************************************************************/
 
 function save_demande($type_decla,$immat)
  {
  
  	try {
				
			
$insert = $this->con->prepare('INSERT INTO decla_immat (type_decla,immatriculation)
VALUES(:type_decla, :immatriculation)');
 
$insert->bindParam(':type_decla', $type_decla, PDO::PARAM_INT);
$insert->bindParam(':immatriculation', $immat, PDO::PARAM_STR);


$execute=$insert->execute();		

			} 
        
        catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de l'enregistrement d'une demande</b>\n";
            throw $e;
        }   
     
     
  }
 
 
 


    }


