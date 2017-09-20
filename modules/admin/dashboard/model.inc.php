<?php

/***** Dernière modification : 29/09/2016, Romain TALDU	*****/

 class dashboard {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
    }

  /***********************************************************************
 * Affiche nombre de demandes
 **************************************************************************/
  
 function afficheNbreDemandes()
  {
      
	try{
$select = $this->con->prepare('SELECT COUNT(*) as nbr 
FROM decla_immat');

$select->execute();
	}
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul du nombre de demandes </b>\n";
	throw $e;
        exit;
    }

$result = $select->fetch();

$quantite=$result['nbr'];
		
	      echo $quantite;
      
   
}  

  /***********************************************************************
 * Affiche nombre de Pmr
 **************************************************************************/
  
 function afficheNbrePmr()
  {
      
	try{
$select = $this->con->prepare('SELECT COUNT(*) as nbr 
FROM decla_immat
WHERE type_decla = 1');

$select->execute();
	}
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul du nombre de demandes PMR</b>\n";
	throw $e;
        exit;
    }

$result = $select->fetch();

$quantite=$result['nbr'];
		
	      echo $quantite;
      
   
}  


  /***********************************************************************
 * Affiche nombre de Pro
 **************************************************************************/
  
 function afficheNbrePro()
  {
      
	try{
$select = $this->con->prepare('SELECT COUNT(*) as nbr 
FROM decla_immat
WHERE type_decla = 2');

$select->execute();
	}
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul du nombre de demandes PRO </b>\n";
	throw $e;
        exit;
    }

$result = $select->fetch();

$quantite=$result['nbr'];
		
	      echo $quantite;
      
   
}  

  /***********************************************************************
 * Affiche nombre d'usager specifiques
 **************************************************************************/
  
 function afficheNbreSpe()
  {
      
	try{
$select = $this->con->prepare('SELECT COUNT(*) as nbr 
FROM decla_immat
WHERE type_decla = 3 OR type_decla = 4 OR type_decla = 5');

$select->execute();
	}
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul du nombre de demandes PMR</b>\n";
	throw $e;
        exit;
    }

$result = $select->fetch();

$quantite=$result['nbr'];
		
	      echo $quantite;
      
   
}  

   
/***********************************************************************
 * Affiche liste des demandes
 **************************************************************************/
  
 function afficheDemandes()
  {
  
  try{
  		
		$select = $this->con->prepare('SELECT *
		FROM decla_immat
                ORDER BY etat_dde ASC, nom ASC');
		
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
  
  
   
/***********************************************************************
 * Affiche un Inscrit
 **************************************************************************/
  
 function afficheInscrit($id_decla)
  {
  
  try{
  		
		$select = $this->con->prepare('SELECT *
		FROM decla_immat
                WHERE id_decla = :id_decla');
                
                $select->bindParam(':id_decla', $id_decla, PDO::PARAM_INT);
		
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors l'affichage d'un inscrit</b>\n";
	throw $e;
        exit;
    }
	 
 return $data;
 
  } 
  
  /***********************************************************************
 * Affiche de l'etat d'exportation
 **************************************************************************/
  
 function etatExport()
  {
  
  try{
  		
		$select = $this->con->prepare('SELECT *
		FROM export_en_cours
                WHERE id = 1');
                
                $select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors l'affichage de l'etat d'export</b>\n";
	throw $e;
        exit;
    }
	 
 return $data['etat'];
 
  }
	
/***********************************************************************
 * Modification de la date de validite
 **************************************************************************/
  
 function modifDate($id_decla,$date)
        
         
  {
$date=explode("-", $date);
$date="$date[2]-$date[1]-$date[0]";  
     
	try{	
$update = $this->con->prepare('UPDATE decla_immat SET date_validite = :date  WHERE id_decla = :id_decla'); 
	    	
$update->bindParam(':date', $date, PDO::PARAM_STR);
$update->bindParam(':id_decla', $id_decla, PDO::PARAM_INT);
$update->execute();	
	}
	
	 catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de la modification de la date de validité</b>\n";
            throw $e;
        }		

  }
  
  /***********************************************************************
 * Changement d'etat 
 **************************************************************************/
  
 function modifEtat($id_decla,$etat)
        
         
  {
 
     
	try{	
$update = $this->con->prepare('UPDATE decla_immat SET etat_dde =:etat  WHERE id_decla = :id_decla'); 
	    	
$update->bindParam(':id_decla', $id_decla, PDO::PARAM_INT);
$update->bindParam(':etat', $etat, PDO::PARAM_INT);
$update->execute();	
	}
	
	 catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de la modification de l'etat de demande </b>\n";
            throw $e;
        }		

  }
  
  
    /***********************************************************************
 * Retourne le numéro de dossier
 **************************************************************************/
  
 function chercheDossier($id_decla)
  {
  
  try{
  		
		$select = $this->con->prepare('SELECT *
		FROM decla_immat
                WHERE id_decla = :id_decla');
                
                $select->bindParam(':id_decla', $id_decla, PDO::PARAM_INT);
                $select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors dela recherche du nom de dossier</b>\n";
	throw $e;
        exit;
    }
	 
 return $data['dossier'];
 
  }
	
  
  
 /***********************************************************************
 * Fonction repartition par état de demande
 **************************************************************************/
  
//  resultat attendu ex : 5, 10, 15,20,30,20

 function afficheRepartitionDemandes()
  {
   
  
$nouvelle=0;
$encours=0;
$validee=0;
$rejetee=0;
$exportee=0;
$perimee=0;


// recupere l'etat de demandes de tous les usagers
	try{
$select = $this->con->prepare('SELECT etat_dde 
FROM decla_immat');

$select->execute();
		}
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul de la Fonction repartition par état de demande</b>\n";
	throw $e;
        exit;
    }

$data = $select->fetchAll(PDO::FETCH_OBJ);	

foreach($data as $key){
			
$etat=$key->etat_dde;
		
		

//swith case qui incremente les variables de repartition d'etat de demande
switch ($etat) 
{ 
    case 0 : 
    ++$nouvelle;
    break;
    case 1 :
    ++$encours;
    break;
    case 2 :
    ++$validee;
    break;
    case 3 :
    ++$rejetee;
    break;
    case  4  :
    ++$exportee;
    break;
    case  5 :
    ++$perimee;
    break;

 
	
}	

	
	 }





$repartition="$nouvelle,$encours,$validee,$rejetee,$exportee,$perimee";
		
 echo $repartition;
      
   
}  
 
  
  
  
    }


