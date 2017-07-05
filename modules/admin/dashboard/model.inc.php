<?php

/***** Dernière modification : 29/09/2016, Romain TALDU	*****/

 class dashboard {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
    }

/***********************************************************************
 * Affiche liste des demandes
 **************************************************************************/
  
 function afficheDemandes()
  {
  
  try{
  		
		$select = $this->con->prepare('SELECT *
		FROM decla_immat');
		
		$select->execute();
		
		$data = $select->fetchAll(PDO::FETCH_OBJ);
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors l'affichage de la liste des demandes</b>\n";
	throw $e;
        exit;
    }
	 
 return $data;
 
  } 
	
    }


