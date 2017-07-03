<?php

/***** Dernière modification : 05/08/2016, Romain TALDU	*****/

class administrateurs {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
    }


 /***********************************************************************
 * Affichage des administrateurs
 **************************************************************************/
  
 function afficheAdmin()
  {
  	
 
 // recherche des administrateurs
 
	try{
$select =$this->con->prepare('SELECT *
						FROM membres
						WHERE id_typemembre =3 OR id_typemembre =4
						ORDER BY validation_inscription ASC, nom_membre ASC
						');
							
$select->execute();

$data = $select->fetchAll(PDO::FETCH_OBJ);	
} 
        
        catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur de la recherche des Administrateurs</b>\n";
            throw $e;
        }	 
      
return $data;

 }


 /***********************************************************************
 * Affichage des assistants de prévention
 **************************************************************************/
  
 function afficheAdP()
  {

// recherche des AdP

	try{	
$select = $this->con->prepare('SELECT *
						FROM membres
						WHERE id_typemembre =2
						ORDER BY validation_inscription ASC, nom_membre ASC
						');
							
$select->execute();
$data = $select->fetchAll(PDO::FETCH_OBJ);	
		} 
        
        catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur de la recherche des AdP</b>\n";
            throw $e;
        }
		
return $data;

}
	 

 /***********************************************************************
 * Verification des zones autorisées
 **************************************************************************/
  
 function verif_zone($zone,$id_membre)
  {
 
	try{
$select = $this->con->prepare('SELECT COUNT(*) as nbr FROM membres_has_zone
                        WHERE id_membre= :id_membre AND id_zone= :zone');
		
$select->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);
$select->bindParam(':zone', $zone, PDO::PARAM_INT);
$select->execute();		

$result = $select->fetch();
       }

 	catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de la verification des zones autorisées</b>\n";
            throw $e;
        }	


$quantite=$result['nbr'];
		
if ($quantite !=0){return TRUE;}else{return FALSE;}
      
   
}
/***********************************************************************
 * Modification des zones autorisées
 **************************************************************************/
  
 function changeZone($id_membre,$id_zone,$etat)
  {
 
	

  if($etat=="off"){
 
 	try{ 	 	
$delete = $this->con->prepare('DELETE 
		FROM membres_has_zone
		WHERE id_membre  = :id_membre AND id_zone  = :id_zone');
						
$delete->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);
$delete->bindParam(':id_zone', $id_zone, PDO::PARAM_INT);
$delete->execute();	
		}

 	catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de la modification des zones autorisées</b>\n";
            throw $e;
        }	


  }
  else{

$insert = $this->con->prepare('INSERT INTO membres_has_zone (id_membre,id_zone)
VALUES(:id_membre,:id_zone)');
     	
$insert->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);
$insert->bindParam(':id_zone', $id_zone, PDO::PARAM_INT);
$insert->execute();	
  }		


		
}
/***********************************************************************
 * Modification de l'etat des membres (valide ou refuser)
 **************************************************************************/
  
 function changeEtat($id_membre,$etat)
  {
	try{	
$update = $this->con->prepare('UPDATE membres SET validation_inscription = :etat  WHERE id_membre = :id_membre'); 
	    	
$update->bindParam(':etat', $etat, PDO::PARAM_INT);
$update->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);
$update->execute();	
	}
	
	 catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de la modification de l'etat d'un membre</b>\n";
            throw $e;
        }		

  }

/***********************************************************************
 * Reuperer Email Participant
 **************************************************************************/
  
 function recupMailUser($id_membre)
  {
  	
		
	try{
$select = $this->con->prepare('SELECT * FROM membres
		WHERE id_membre = :id_membre');
		
$select->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);
$select->execute();	
	}
	
	 catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de la recupération de l'email d'un utilisateur</b>\n";
            throw $e;
        }	
		
	 
       if ($result = $select->fetch()) {
        
           $select->closeCursor();
		   
		  $recup_email=$result['email'];
		   
	
}
	   
 
return  $recup_email; 	   
	}
		



/***********************************************************************
 * Envoi Email administrateur/AdP validé
 **************************************************************************/
  
 function envoiMailValidation($mail_user)
  {
  
	
// Création d'un nouvel objet $mail
$mail = new PHPMailer();
// Encodage
$mail->CharSet = 'UTF-8';

//=====Corps du message
$body = "<html><head></head>
<body>
Bonjour,<br>
<br>
Nous vous confirmons votre inscription à l'espace d'administration DRH Formulaires <br>
Vous pouvez désormais vous connecter avec votre adresse email et le mot de passe choisi<br><br>
Cordialement
</body>
</html>";
//==========


// Expediteur, adresse de retour et destinataire :
$mail->SetFrom(FROM_EMAIL, "Agglomération Pau-Pyrénées"); //L'expediteur du mail
$mail->AddReplyTo("NO-REPLY@agglo-pau.fr", "NO REPLY"); //Pour que l'usager réponde au mail

 //mail du destinataire
$mail->AddAddress($mail_user); 


// Sujet du mail
$mail->Subject = "Agglomération Pau-Pyrénées - DRH Formulaires";
// Le message
$mail->MsgHTML($body);

// Envoi de l'email
$mail->Send();

unset($mail);
	
}
  
  
  
  
  
  
  
}
			