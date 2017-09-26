<?php

/***** Dernière modification : 29/09/2016, Romain TALDU	*****/

 class export {

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
   // envoie mail de confirmation
   
     try{
  		
    $select = $this->con->prepare('SELECT *
    FROM decla_immat
    WHERE etat_dde = 2');
                
    $select->execute();
		
	
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de la selection des email validés</b>\n";
	throw $e;
        exit;
    }
    
        $data = $select->fetchAll(PDO::FETCH_OBJ);	

        foreach($data as $key){
            
            $mail_user= htmlspecialchars($key->email);
            $date_validite=$key->date_validite;
            $date_validite= explode(" ",$date_validite);
            $date_validite= explode("-",$date_validite[0]);
            
            $immatriculation=$key->immatriculation;
      
    
// Création d'un nouvel objet $mail
$mail = new PHPMailer();
// Encodage
$mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64'; 


//=====Corps du message
$body = "<html><head></head>
<body>
Bonjour,<br>
<br>
Votre déclaration d'immatriculation dans le système de contrôle automatisé, relative au véhicule immatriculé ".$immatriculation.", a été validée.<br>
Elle est valable jusqu'au : ".$date_validite[2]."-".$date_validite[1]."-".$date_validite[0]." <br>
<br>
Cordialement,<br>
<br>
La direction Prévention et Sécurité Publique<br>
Ville de Pau<br>
</body>
</html>";
//==========


// Expediteur, adresse de retour et destinataire :
$mail->SetFrom(FROM_EMAIL, "Ville de Pau"); //L'expediteur du mail
$mail->AddReplyTo("NO-REPLY@agglo-pau.fr", "NO REPLY"); //Pour que l'usager réponde au mail
// Si on a le nom : $mail->AddAddress("romain_taldu@hotmail.com", "Romain perso"); 
 //mail du destinataire
$mail->AddAddress($mail_user); 


// Sujet du mail
$mail->Subject = "Ville de Pau - Contrôle stationnement automatisé : demande validée";
// Le message
$mail->MsgHTML($body);


// Envoi de l'email
$mail->Send();

unset($mail);      
            
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
   
        

    // Remet la variable d'export à 0  
        
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
 * Selectionne les dmeandes validée
 **************************************************************************/
  
 function selectValide()
  {
  
  try{
  		
		$select = $this->con->prepare('SELECT *
		FROM decla_immat
                WHERE etat_dde = 2 OR  etat_dde = 4');
                
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


