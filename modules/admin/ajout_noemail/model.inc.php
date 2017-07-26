<?php

/***** Dernière modification : 29/09/2016, Romain TALDU	*****/

 class ajout_noemail {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
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
 * Update exportEnCours (Encours)
 **************************************************************************/
  
 function exportEnCoursEncours()
  {
     
 //modification de la variable en base pour signaler "export en cours"      
try{	
$update = $this->con->prepare('UPDATE export_en_cours SET etat = 1  WHERE id = 1'); 
	    	
$update->execute();	
	}
	
	 catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors l'update exportEnCours (Encours)</b>\n";
            throw $e;
        }		

//calcul date de validité (2ans)
$date_validite=date('Y-m-d H:i:s',strtotime("+2 years"));
        
// Creation des dates de validité      
try{	
$update2 = $this->con->prepare('UPDATE decla_immat SET date_validite = :date_validite  WHERE etat_dde = 2 AND date_validite ="0000-00-00 00:00:00" '); 

$update2->bindParam(':date_validite', $date_validite, PDO::PARAM_STR);
$update2->execute();	
	}
	
        catch (Exception $f) {
            echo $f->getMessage() . " <br><b>Creation des dates de validité </b>\n";
            throw $f;
        }		

  }
 
       /***********************************************************************
 * Update exportEnCours (Abort)
 **************************************************************************/
  
 function exportEnCoursAbort()
  {
try{	
$update = $this->con->prepare('UPDATE export_en_cours SET etat = 0  WHERE id = 1'); 
	    	
$update->execute();	
	}
	
	 catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors l'update exportEnCours (Abort)</b>\n";
            throw $e;
        }		

  }
 
  
         /***********************************************************************
 * Update exportEnCours (ok)
 **************************************************************************/
  
 function exportEnCoursOk()
  {
try{	
$update = $this->con->prepare('UPDATE export_en_cours SET etat = 0  WHERE id = 1'); 
	    	
$update->execute();	
	}
	
	 catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors l'update exportEnCours (Abort)</b>\n";
            throw $e;
        }
        
   // update les statuts valide en exporte     
try{	
$update2 = $this->con->prepare('UPDATE decla_immat SET etat_dde = 4  WHERE etat_dde = 2 '); 

$update2->execute();	
	}
	
        catch (Exception $f) {
            echo $f->getMessage() . " <br><b>Erreur lors de la mise a jour de l'etat des demandes validée > exportée </b>\n";
            throw $f;
        }		
   
        
   // envoie mail de confirmation

  }
  
  
   /***********************************************************************
 * Selectionne les dmeandes validée
 **************************************************************************/
  
 function selectValide()
  {
  
  try{
  		
		$select = $this->con->prepare('SELECT *
		FROM decla_immat
                WHERE etat_dde = 2');
                
                $select->execute();
		
		$data = $select->fetchAll(PDO::FETCH_OBJ);
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors la selection des demandes validées</b>\n";
	throw $e;
        exit;
    }
	 
 return $data;
 
  } 
    }


