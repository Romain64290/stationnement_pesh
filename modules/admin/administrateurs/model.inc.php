<?php

/***** Dernière modification : 18/07/2017, Romain TALDU	*****/

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
 * Envoi Email administrateur validé
 **************************************************************************/
  
 function envoiMailValidation($mail_user)
  {
  
	
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
Nous vous confirmons votre inscription à l'espace d'administration du système de contrôle automatisé de stationnement<br>
Vous pouvez désormais vous connecter avec votre adresse email et le mot de passe choisi<br><br>
Cordialement
</body>
</html>";
//==========


// Expediteur, adresse de retour et destinataire :
$mail->SetFrom(FROM_EMAIL, "Ville de Pau"); //L'expediteur du mail
$mail->AddReplyTo("NO-REPLY@agglo-pau.fr", "NO REPLY"); //Pour que l'usager réponde au mail

 //mail du destinataire
$mail->AddAddress($mail_user); 


// Sujet du mail
$mail->Subject = "Ville de Pau - Système de contrôle automatisé de stationnement";
// Le message
$mail->MsgHTML($body);

// Envoi de l'email
$mail->Send();

unset($mail);
	
}
  
  
  
  
  
  
  
}
			