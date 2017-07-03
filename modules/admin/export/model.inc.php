<?php

/***** Dernière modification : 29/09/2016, Romain TALDU	*****/

 class dashboard {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
    }

/***********************************************************************
 * Calcul : Agglo nombre de reunion composteur
 **************************************************************************/
  
 function aggloReunionComposteurs($annee)
  {
  
  $annee="%".$annee."%";
  
  try{
  		
		$select = $this->con->prepare('SELECT COUNT(*) as nbr
		FROM reunion
        WHERE type_reunion=1 AND date_reunion LIKE :date');
		
		$select->bindParam(':date', $annee, PDO::PARAM_STR);	
				
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul du nombrede reunion composteur dans l'agglo</b>\n";
	throw $e;
        exit;
    }
	 
 $quantite=$data['nbr'];
 return $quantite;
 
  } 
  
  /***********************************************************************
 * Calcul : Agglo nombre de participants aux reunions composteur
 **************************************************************************/
  
 function aggloParticipantsComposteur($annee)
  {
  
  $annee="%".$annee."%";
  
  try{
  		
		$select = $this->con->prepare('SELECT SUM(nbr_participants) as nbr
		FROM reunion
        WHERE type_reunion=1 AND date_reunion LIKE :date');
		
		$select->bindParam(':date', $annee, PDO::PARAM_STR);	
				
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul du nombre d'inscrit aux reunions composteur dans l'agglo</b>\n";
	throw $e;
        exit;
    }
	 
 $quantite=$data['nbr'];
 if(!$quantite){$quantite=0;}
 return $quantite;
 
  } 

 /***********************************************************************
 * Calcul : Agglo nombre de composteurs distribués
 **************************************************************************/
  
 function aggloDistribueComposteur($annee)
  {
  
  $annee="%".$annee."%";
  
  try{
  		
		$select = $this->con->prepare('SELECT SUM(composteur_donne) as nbr
		FROM reunion_has_usagers
        INNER JOIN reunion ON reunion_has_usagers.id_reunion=reunion.id_reunion
        INNER JOIN  usager ON reunion_has_usagers.id_usager=usager.id_usager
        WHERE type_reunion=1 AND reunion.date_reunion LIKE :date');
		
		$select->bindParam(':date', $annee, PDO::PARAM_STR);	
				
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul du nombre composteurs distribués dans l'agglo</b>\n";
	throw $e;
        exit;
    }
	 
 $quantite=$data['nbr'];
 if(!$quantite){$quantite=0;}
 return $quantite;
 
  } 
  
  
  /***********************************************************************
 * Calcul : Agglo nombre de composteurs distribués par mois
 **************************************************************************/
  
 function aggloDistribueComposteurMois($date)
  {
  
  $date="%".$date."%";
  
  try{
  		
		$select = $this->con->prepare('SELECT SUM(composteur_donne) as nbr
		FROM reunion_has_usagers
        INNER JOIN reunion ON reunion_has_usagers.id_reunion=reunion.id_reunion
        INNER JOIN  usager ON reunion_has_usagers.id_usager=usager.id_usager
        WHERE type_reunion=1 AND reunion.date_reunion LIKE :date');
		
		$select->bindParam(':date', $date, PDO::PARAM_STR);	
				
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul du nombre composteurs distribués dans l'agglo par mois</b>\n";
	throw $e;
        exit;
    }
	 
 $quantite=$data['nbr'];
 if(!$quantite){$quantite=0;}
 return $quantite;
 
  } 
  
 /***********************************************************************
 * Calcul : Agglo nombre de reunion lombr
 **************************************************************************/
  
 function aggloReunionLombri($annee)
  {
  
  $annee="%".$annee."%";
  
  try{
  		
		$select = $this->con->prepare('SELECT COUNT(*) as nbr
		FROM reunion
        WHERE type_reunion=2 AND date_reunion LIKE :date');
		
		$select->bindParam(':date', $annee, PDO::PARAM_STR);	
				
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul du nombr ede reunion lombri dans l'agglo</b>\n";
	throw $e;
        exit;
    }
	 
 $quantite=$data['nbr'];
 return $quantite;
 
  }    


 /***********************************************************************
 * Calcul : Agglo nombre de participants aux reunions lombri
 **************************************************************************/
  
 function aggloParticipantsLombri($annee)
  {
  
  $annee="%".$annee."%";
  
  try{
  		
		$select = $this->con->prepare('SELECT SUM(nbr_participants) as nbr
		FROM reunion
        WHERE type_reunion=2 AND date_reunion LIKE :date');
		
		$select->bindParam(':date', $annee, PDO::PARAM_STR);	
				
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul du nombre d'inscrit aux reunions lombri dans l'agglo</b>\n";
	throw $e;
        exit;
    }
	 
 $quantite=$data['nbr'];
 if(!$quantite){$quantite=0;}
 return $quantite;
 
  } 

/***********************************************************************
 * Calcul : Agglo nombre de lombri distribués
 **************************************************************************/
  
 function aggloDistribueLombri($annee)
  {
  
  $annee="%".$annee."%";
  
  try{
  		
		$select = $this->con->prepare('SELECT SUM(composteur_donne) as nbr
		FROM reunion_has_usagers
        INNER JOIN reunion ON reunion_has_usagers.id_reunion=reunion.id_reunion
        INNER JOIN  usager ON reunion_has_usagers.id_usager=usager.id_usager
        WHERE type_reunion=2 AND reunion.date_reunion LIKE :date');
		
		$select->bindParam(':date', $annee, PDO::PARAM_STR);	
				
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul du nombre lombri distribués dans l'agglo</b>\n";
	throw $e;
        exit;
    }
	 
 $quantite=$data['nbr'];
 if(!$quantite){$quantite=0;}
 return $quantite;
 
  } 

 /***********************************************************************
 * Calcul : Agglo nombre de lombri distribués par mois
 **************************************************************************/
  
 function aggloDistribueLombriMois($date)
  {
  
  $date="%".$date."%";
  
  try{
  		
		$select = $this->con->prepare('SELECT SUM(composteur_donne) as nbr
		FROM reunion_has_usagers
        INNER JOIN reunion ON reunion_has_usagers.id_reunion=reunion.id_reunion
        INNER JOIN  usager ON reunion_has_usagers.id_usager=usager.id_usager
        WHERE type_reunion=2 AND reunion.date_reunion LIKE :date');
		
		$select->bindParam(':date', $date, PDO::PARAM_STR);	
				
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul du nombre de lombri distribués dans l'agglo par mois</b>\n";
	throw $e;
        exit;
    }
	 
 $quantite=$data['nbr'];
 if(!$quantite){$quantite=0;}
 return $quantite;
 
  } 
  


/***********************************************************************
 * Calcul : Commune nombre de reunion composteur
 **************************************************************************/
  
 function communeReunionComposteurs($annee,$id_commune)
  {
  
  $annee="%".$annee."%";
  
  try{
  		
		$select = $this->con->prepare('SELECT COUNT(*) as nbr
		FROM reunion
        WHERE type_reunion=1 AND id_commune=:id_commune AND date_reunion LIKE :date');
		
		$select->bindParam(':date', $annee, PDO::PARAM_STR);
		$select->bindParam(':id_commune', $id_commune, PDO::PARAM_INT);	
				
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul du nombre de reunion composteur dans la commune $id_commune</b>\n";
	throw $e;
        exit;
    }
	 
 $quantite=$data['nbr'];
 return $quantite;
 
  } 
  
  /***********************************************************************
 * Calcul : commune nombre de participants aux reunions composteur
 **************************************************************************/
  
 function communeParticipantsComposteur($annee,$id_commune)
  {
  
  $annee="%".$annee."%";
  
  try{
  		
		$select = $this->con->prepare('SELECT SUM(nbr_participants) as nbr
		FROM reunion
        WHERE type_reunion=1 AND id_commune=:id_commune AND date_reunion LIKE :date');
		
		$select->bindParam(':date', $annee, PDO::PARAM_STR);	
		$select->bindParam(':id_commune', $id_commune, PDO::PARAM_INT);
				
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul du nombre d'inscrit aux reunions composteur dans la commune $id_commune</b>\n";
	throw $e;
        exit;
    }
	 
 $quantite=$data['nbr'];
 if(!$quantite){$quantite=0;}
 return $quantite;
 
  } 
  
  
  /***********************************************************************
 * Calcul : communes nombre de composteur distribués
 **************************************************************************/
  
 function communeDistribueComposteur($annee,$id_commune)
  {
  
  $annee="%".$annee."%";
  
  try{
  		
		$select = $this->con->prepare('SELECT SUM(composteur_donne) as nbr
		FROM reunion_has_usagers
        INNER JOIN reunion ON reunion_has_usagers.id_reunion=reunion.id_reunion
        INNER JOIN  usager ON reunion_has_usagers.id_usager=usager.id_usager
        WHERE type_reunion=1 AND reunion.id_commune=:id_commune AND reunion.date_reunion LIKE :date');
		
		$select->bindParam(':date', $annee, PDO::PARAM_STR);	
		$select->bindParam(':id_commune', $id_commune, PDO::PARAM_INT);
				
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul du nombre composteur distribués dans la commune $id_commune</b>\n";
	throw $e;
        exit;
    }
	 
 $quantite=$data['nbr'];
 if(!$quantite){$quantite=0;}
 return $quantite;
 
  } 
  
  
  
 /***********************************************************************
 * Calcul : commune nombre de reunion lombr
 **************************************************************************/
  
 function communeReunionLombri($annee,$id_commune)
  {
  
  $annee="%".$annee."%";
  
  try{
  		
		$select = $this->con->prepare('SELECT COUNT(*) as nbr
		FROM reunion
        WHERE type_reunion=2 AND id_commune=:id_commune AND date_reunion LIKE :date');
		
		$select->bindParam(':date', $annee, PDO::PARAM_STR);	
		$select->bindParam(':id_commune', $id_commune, PDO::PARAM_INT);
				
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul du nombr ede reunion lombri dans la commune $id_commune</b>\n";
	throw $e;
        exit;
    }
	 
 $quantite=$data['nbr'];
 return $quantite;
 
  }    


 /***********************************************************************
 * Calcul : Commune nombre de participants aux reunions lombri
 **************************************************************************/
  
 function communeParticipantsLombri($annee,$id_commune)
  {
  
  $annee="%".$annee."%";
  
  try{
  		
		$select = $this->con->prepare('SELECT SUM(nbr_participants) as nbr
		FROM reunion
        WHERE type_reunion=2 AND id_commune=:id_commune AND date_reunion LIKE :date');
		
		$select->bindParam(':date', $annee, PDO::PARAM_STR);	
		$select->bindParam(':id_commune', $id_commune, PDO::PARAM_INT);
				
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul du nombre d'inscrit aux reunions lombri dans la commune $id_commune</b>\n";
	throw $e;
        exit;
    }
	 
 $quantite=$data['nbr'];
 if(!$quantite){$quantite=0;}
 
 return $quantite;
 
  } 

/***********************************************************************
 * Calcul : communes nombre de lombri distribués
 **************************************************************************/
  
 function communeDistribueLombri($annee,$id_commune)
  {
  
  $annee="%".$annee."%";
  
  try{
  		
		$select = $this->con->prepare('SELECT SUM(composteur_donne) as nbr
		FROM reunion_has_usagers
        INNER JOIN reunion ON reunion_has_usagers.id_reunion=reunion.id_reunion
        INNER JOIN  usager ON reunion_has_usagers.id_usager=usager.id_usager
        WHERE type_reunion=2 AND reunion.id_commune=:id_commune AND reunion.date_reunion LIKE :date');
		
		$select->bindParam(':date', $annee, PDO::PARAM_STR);	
		$select->bindParam(':id_commune', $id_commune, PDO::PARAM_INT);
				
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul du nombre lombri distribués dans la commune $id_commune</b>\n";
	throw $e;
        exit;
    }
	 
 $quantite=$data['nbr'];
 if(!$quantite){$quantite=0;}
 return $quantite;
 
  } 

/***********************************************************************
 * Calcul : Nombre de participant originaire d'une commune
 **************************************************************************/
  
 function communeProvenance($annee,$id_commune)
  {
  
  $annee="%".$annee."%";
  
  try{
  		
		$select = $this->con->prepare('SELECT COUNT(*) as nbr 
		FROM usager
        WHERE usager.id_commune=:id_commune AND usager.date_reunion LIKE :date');
		
		$select->bindParam(':date', $annee, PDO::PARAM_STR);	
		$select->bindParam(':id_commune', $id_commune, PDO::PARAM_INT);
				
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul de la provenance des inscrits $id_commune</b>\n";
	throw $e;
        exit;
    }
	 
 $quantite=$data['nbr'];
 if(!$quantite){$quantite=0;}
 return $quantite;
 
  } 


/***********************************************************************
 * Calcul : Nombre de participant originaire d'une commune ayant recupére composteur
 **************************************************************************/
  
 function communeProvenanceCompost($annee,$id_commune)
  {
  
  $annee="%".$annee."%";
  
  try{
  		
		$select = $this->con->prepare('SELECT COUNT(*) as nbr 
		FROM usager
        WHERE usager.id_commune=:id_commune AND usager.date_reunion LIKE :date AND composteur_donne=1 AND couleur_lombri=""');
		
		$select->bindParam(':date', $annee, PDO::PARAM_STR);	
		$select->bindParam(':id_commune', $id_commune, PDO::PARAM_INT);
				
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul Nombre de participant originaire d'une commune ayant recupére composteur $id_commune</b>\n";
	throw $e;
        exit;
    }
	 
 $quantite=$data['nbr'];
 if(!$quantite){$quantite=0;}
 return $quantite;
 
  } 

/***********************************************************************
 * Calcul : Nombre de participant originaire d'une commune ayant recupére Lombricomposteur
 **************************************************************************/
  
 function communeProvenanceLombri($annee,$id_commune)
  {
  
  $annee="%".$annee."%";
  
  try{
  		
		$select = $this->con->prepare('SELECT COUNT(*) as nbr 
		FROM usager
        WHERE usager.id_commune=:id_commune AND usager.date_reunion LIKE :date AND composteur_donne=1 AND couleur_lombri!=""');
		
		$select->bindParam(':date', $annee, PDO::PARAM_STR);	
		$select->bindParam(':id_commune', $id_commune, PDO::PARAM_INT);
				
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul Nombre de participant originaire d'une commune ayant recupére composteur $id_commune</b>\n";
	throw $e;
        exit;
    }
	 
 $quantite=$data['nbr'];
 if(!$quantite){$quantite=0;}
 return $quantite;
 
  } 
	
    }


