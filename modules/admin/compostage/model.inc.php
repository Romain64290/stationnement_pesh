<?php

/***** Dernière modification : 12/09/2016, Romain TALDU	*****/

class compostage {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
    }
	
	
/**************************************************************************
 Ajout d'une réunion
***************************************************************************/
 
 
 function ajoutReunion ($type_reunion,$date,$heure_debut,$adresse,$ville,$lien_map,$reunion_ouverte,$limite,$animateur)
  {
  	
	
$date=explode("/",$date);
$date_reunion="$date[2]-$date[1]-$date[0] $heure_debut";	
 
		try {
$insert = $this->con->prepare('INSERT INTO reunion (type_reunion,date_reunion,adresse,id_commune,lien_map,reunion_ouverte,limite_participants,animateur)
VALUES(:type_reunion,:date_reunion,:adresse,:id_commune,:lien_map,:reunion_ouverte,:limite_participants,:animateur)');
 	
$insert->bindParam(':type_reunion', $type_reunion, PDO::PARAM_INT);
$insert->bindParam(':date_reunion', $date_reunion, PDO::PARAM_STR);
$insert->bindParam(':adresse', $adresse, PDO::PARAM_STR);
$insert->bindParam(':id_commune', $ville, PDO::PARAM_INT);
$insert->bindParam(':lien_map', $lien_map, PDO::PARAM_STR);
$insert->bindParam(':reunion_ouverte', $reunion_ouverte, PDO::PARAM_INT);
$insert->bindParam(':limite_participants', $limite, PDO::PARAM_INT);
$insert->bindParam(':animateur', $animateur, PDO::PARAM_STR);

$execute=$insert->execute();		

			} 
        
        catch (Exception $f) {
            echo $f->getMessage() . " <br><b>Erreur lors de la creation de la réunion</b>\n";
            throw $f;
        }
  	
 
 				
}

/**************************************************************************
 Affichage des réunions
***************************************************************************/  

function afficheReunion()
  {
  
  try{
    	
		$select = $this->con->prepare('SELECT * 
		FROM reunion
		INNER JOIN communes ON communes.id_commune=reunion.id_commune
	    ORDER BY date_reunion DESC');	
				
		$select->execute();
		
		$data = $select->fetchAll();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'affichage du listing des réunions</b>\n";
	throw $e;
        exit;
    }
	 
 return $data;
  }   

/***********************************************************************
 * Edition d'une reunion
 **************************************************************************/
  
 function infosReunion($id_reunion)
 
 {
 
  try{
    	
		$select = $this->con->prepare('SELECT * 
	    FROM reunion
	    INNER JOIN communes ON communes.id_commune=reunion.id_commune
		WHERE id_reunion  = :id_reunion');
				
		
		$select->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'affichage de la réunion</b>\n";
	throw $e;
        exit;
    }
	 
 return $data;
  } 
  
  

/***********************************************************************
 * Mise à jour d'une réunion
 **************************************************************************/
  
 function majReunion($id_reunion,$type_reunion,$date,$heure_debut,$adresse,$ville,$lien_map,$reunion_ouverte,$limite)
  {
 
$date=explode("/",$date);
$date_reunion="$date[2]-$date[1]-$date[0] $heure_debut"; 	
	
	try{	
$update = $this->con->prepare('UPDATE reunion SET type_reunion = :type_reunion,date_reunion = :date_reunion,adresse = :adresse,id_commune = :id_commune,lien_map = :lien_map,reunion_ouverte = :reunion_ouverte,limite_participants = :limite  WHERE id_reunion = :id_reunion'); 

$update->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);	    	
$update->bindParam(':type_reunion', $type_reunion, PDO::PARAM_INT);
$update->bindParam(':date_reunion', $date_reunion, PDO::PARAM_STR);
$update->bindParam(':adresse', $adresse, PDO::PARAM_STR);
$update->bindParam(':id_commune', $ville, PDO::PARAM_INT);
$update->bindParam(':lien_map', $lien_map, PDO::PARAM_STR);
$update->bindParam(':reunion_ouverte', $reunion_ouverte, PDO::PARAM_INT);
$update->bindParam(':limite', $limite, PDO::PARAM_INT);
$update->execute();	
	}
	
	 catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de la mise à jour d'une réunion</b>\n";
            throw $e;
        }		

  }
  
  /***********************************************************************
 * Affichage des inscrit à une reunion
 **************************************************************************/
  
 function afficheInscrits($id_reunion)
 
 {
 
  try{
    	
		$select = $this->con->prepare('SELECT * 
	    FROM reunion_has_usagers
	    INNER JOIN usager ON reunion_has_usagers.id_usager=usager.id_usager
	    INNER JOIN communes ON usager.id_commune=communes.id_commune
		WHERE reunion_has_usagers.id_reunion  = :id_reunion
		ORDER BY usager.nom ASC');
				
		
		$select->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
		$select->execute();
		
		$data = $select->fetchAll(PDO::FETCH_OBJ);
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'affichage de la réunion</b>\n";
	throw $e;
        exit;
    }
	 
 return $data;
 
 }
 
 /***********************************************************************
 * Mise à jour des composteurs donnés
 **************************************************************************/
  
 function changeComposteur($id_usager,$etat)
  {
 
	
	try{	
$update = $this->con->prepare('UPDATE usager SET composteur_donne = :composteur_donne WHERE id_usager = :id_usager'); 

$update->bindParam(':composteur_donne', $etat, PDO::PARAM_INT);	    	
$update->bindParam(':id_usager', $id_usager, PDO::PARAM_INT);
$update->execute();	
	}
	
	 catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de la mise à jour du don d'un composteur</b>\n";
            throw $e;
        }		

  }
/***********************************************************************
 * Mise à jour des présences aux réunions
 **************************************************************************/
  
 function changePresence($id_usager,$etat)
  {
 
	
	try{	
$update = $this->con->prepare('UPDATE usager SET presence_reunion = :presence_reunion WHERE id_usager = :id_usager'); 

$update->bindParam(':presence_reunion', $etat, PDO::PARAM_INT);	    	
$update->bindParam(':id_usager', $id_usager, PDO::PARAM_INT);
$update->execute();	
	}
	
	 catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de la mise à jour des présence à une réunion</b>\n";
            throw $e;
        }		

  }
  
  /***********************************************************************
 * Suppression d'un utilisateur
 **************************************************************************/
  
 function supUser($id_usager,$id_reunion)
  {
 
	
//décrementation du nombre d'utilisateur dans la table reunion
	try{	
$update = $this->con->prepare('UPDATE reunion SET nbr_participants = nbr_participants - 1  WHERE id_reunion  = :id_reunion'); 

$update->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
$update->execute();	
	}
	
	 catch (Exception $g) {
            echo $g->getMessage() . " <br><b>Erreur lors de la décrementation de la table reunion</b>\n";
            throw $g;
        }		

// suppression de l'usager 
try{ 	 	
$delete = $this->con->prepare('DELETE 
		FROM usager
		WHERE id_usager  = :id_usager ');
						
$delete->bindParam(':id_usager', $id_usager, PDO::PARAM_INT);
$delete->execute();	
		}

 	catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de la suppression d'un inscrit</b>\n";
            throw $e;
        }	


// supression de la table de jointure
try{ 	 	
$delete = $this->con->prepare('DELETE 
		FROM reunion_has_usagers
		WHERE id_usager  = :id_usager ');
						
$delete->bindParam(':id_usager', $id_usager, PDO::PARAM_INT);
$delete->execute();	
		}

 	catch (Exception $f) {
            echo $f->getMessage() . " <br><b>Erreur lors de la suppression de la jointure d'un inscrit</b>\n";
            throw $f;
        }	

  }
 /***********************************************************************
 * Affichage des inscrits à l'ensemble des reunions
 **************************************************************************/
  
 function afficheTousInscrits()
 
 {
 
  try{
    	
		$select = $this->con->prepare('SELECT * 
	    FROM usager
        INNER JOIN communes ON communes.id_commune=usager.id_commune
        ORDER BY nom');
				
		$select->execute();
		
		$data = $select->fetchAll(PDO::FETCH_OBJ);
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'affichage des inscrits</b>\n";
	throw $e;
        exit;
    }
	 
 return $data;
 
 } 
 
  /***********************************************************************
 * comptage present à une reunion
 **************************************************************************/
  
 function comptePresents($id_reunion)
 
 {
 
  try{
    	
		$select = $this->con->prepare('SELECT COUNT(*) as nbr FROM reunion_has_usagers
	    INNER JOIN usager ON reunion_has_usagers.id_usager=usager.id_usager
	    INNER JOIN reunion ON reunion_has_usagers.id_reunion=reunion.id_reunion
		WHERE reunion.id_reunion  = :id_reunion AND usager.presence_reunion = 1');
				
		
		$select->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
		$select->execute();
		
		$data = $select->fetch();
		$quantite=$data['nbr'];
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du comptage des présents</b>\n";
	throw $e;
        exit;
    }
	 
 return $quantite;
 
 }

 /***********************************************************************
 * comptage present à une reunion
 **************************************************************************/
  
 function compteComposteurs($id_reunion)
 
 {
 
  try{
    	
		$select = $this->con->prepare('SELECT COUNT(*) as nbr FROM reunion_has_usagers
	    INNER JOIN usager ON reunion_has_usagers.id_usager=usager.id_usager
	    INNER JOIN reunion ON reunion_has_usagers.id_reunion=reunion.id_reunion
		WHERE reunion.id_reunion  = :id_reunion AND usager.composteur_donne = 1');
				
		
		$select->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
		$select->execute();
		
		$data = $select->fetch();
		$quantite=$data['nbr'];
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du comptage des composteurs</b>\n";
	throw $e;
        exit;
    }
	 
 return $quantite;
 
 }
 
  /***********************************************************************
 * Envoi d'un email aux inscrits lors de la modification d'une reunion
 **************************************************************************/
  
 function emailEditReunion($id_reunion)
  {
  
  // reupération des information sur la reunion
  try{
    	
		$select = $this->con->prepare('SELECT * 
	    FROM reunion
	    INNER JOIN communes ON communes.id_commune=reunion.id_commune
		WHERE id_reunion  = :id_reunion');
				
		
		$select->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
		$select->execute();
		
		$info_reunion = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'affichage de la réunion</b>\n";
	throw $e;
        exit;
    }
  
$date_reunion=$info_reunion['date_reunion'];
$nom_commune=$info_reunion['nom_commune'];
$adresse=htmlspecialchars($info_reunion['adresse']);
$lien_map=htmlspecialchars($info_reunion['lien_map']);
	
$date_expl=explode(" ",$date_reunion);
$heure=explode(":",$date_expl[1]);
$heure=$heure[0].":".$heure[1];
$date_debut=explode("-",$date_expl[0]);
		 
switch ($date_debut[1]) {
	case '1': $date_mois[1]="Janvier";break;
	case '2': $date_mois[1]="Février";break;
	case '3': $date_mois[1]="Mars";break;
	case '4': $date_mois[1]="Avril";break;
	case '5': $date_mois[1]="Mai";break;
	case '6': $date_mois[1]="Juin";break;
	case '7': $date_mois[1]="Juillet";break;
	case '8': $date_mois[1]="Août";break;
	case '9': $date_mois[1]="Septembre";break;
	case '10': $date_mois[1]="Octobre";break;
	case '11': $date_mois[1]="Novembre";break;
	case '12': $date_mois[1]="Décembre";break;  
}
  
  // selection des emails de tous les inscrits
   try{
    	
		$select = $this->con->prepare('SELECT * 
	    FROM reunion_has_usagers
	    INNER JOIN usager ON reunion_has_usagers.id_usager=usager.id_usager
		WHERE reunion_has_usagers.id_reunion  = :id_reunion');
				
		
		$select->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
		$select->execute();
		
		$liste_inscrits = $select->fetchAll(PDO::FETCH_OBJ);
		
		}
		
	 catch (PDOException $f){
       echo $f->getMessage() . " <br><b>Erreur lors de l'affichage de la réunion</b>\n";
	throw $f;
        exit;
    }
  
   
  // envoi d'un email à chaque inscrit
  
  foreach ($liste_inscrits as $key) 
  	{
  	
	
$email=$key->email;
$id_usager=$key->id_usager;	

// Création d'un nouvel objet $mail
$mail = new PHPMailer();

// Encodage
$mail->CharSet = 'UTF-8';

//=====Corps du message
$body = "<html><head></head>
<body>
Bonjour,<br>
<br>
Nous vous informons que la réunion de sensiblisation (lombri)compostage suivante a été modifiée: <br>
<ul>
<li><b>Reunion le $date_debut[2] $date_mois[1] à $heure - $nom_commune - $adresse  </b><a href=\"$lien_map\" target=\"_blank\"> (voir l'adresse sur Google Map)</a> [<a href=\"".URL_SITE."/modules/compostage/validation_desinscription.php?id_user=$id_usager&id_reunion=$id_reunion&email=$email\">Se désinscrire</a>]</li>
</ul>
<br>Veuillez nous excuser de ce changement<br>
Pour tout renseignement complémentaire, vous pouvez nous contacter au 05 59 14 64 30<br><br>
Salutations<br>
<br>
</body>
</html>";
//==========


// Expediteur, adresse de retour et destinataire :
$mail->SetFrom(FROM_EMAIL, "Agglomération Pau-Pyrénées"); //L'expediteur du mail
$mail->AddReplyTo("NO-REPLY@agglo-pau.fr", "NO REPLY"); //Pour que l'usager réponde au mail
//mail du destinataire
$mail->AddAddress($email); 

// Sujet du mail
$mail->Subject = "[MODIFICATION] Réunion de sensibilisation au compostage";
// Le message
$mail->MsgHTML($body);


// Envoi de l'email
$mail->Send();

unset($mail);

      
 	 }
  
	
  }
 
 
 /***********************************************************************
 * Envoi d'un email aux inscrit lors de la supp d'une reunion
 **************************************************************************/
  
 function emailSuppReunion($id_reunion)
  {
  
  // reupération des information sur la reunion
  try{
    	
		$select = $this->con->prepare('SELECT * 
	    FROM reunion
	    INNER JOIN communes ON communes.id_commune=reunion.id_commune
		WHERE id_reunion  = :id_reunion');
				
		
		$select->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
		$select->execute();
		
		$info_reunion = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'affichage de la réunion</b>\n";
	throw $e;
        exit;
    }
  
$date_reunion=$info_reunion['date_reunion'];
$nom_commune=$info_reunion['nom_commune'];
$adresse=htmlspecialchars($info_reunion['adresse']);
$lien_map=htmlspecialchars($info_reunion['lien_map']);
	
$date_expl=explode(" ",$date_reunion);
$heure=explode(":",$date_expl[1]);
$heure=$heure[0].":".$heure[1];
$date_debut=explode("-",$date_expl[0]);
		 
switch ($date_debut[1]) {
	case '1': $date_mois[1]="Janvier";break;
	case '2': $date_mois[1]="Février";break;
	case '3': $date_mois[1]="Mars";break;
	case '4': $date_mois[1]="Avril";break;
	case '5': $date_mois[1]="Mai";break;
	case '6': $date_mois[1]="Juin";break;
	case '7': $date_mois[1]="Juillet";break;
	case '8': $date_mois[1]="Août";break;
	case '9': $date_mois[1]="Septembre";break;
	case '10': $date_mois[1]="Octobre";break;
	case '11': $date_mois[1]="Novembre";break;
	case '12': $date_mois[1]="Décembre";break;  
}
  
  // selection des emails de tous les inscrits
   try{
    	
		$select = $this->con->prepare('SELECT * 
	    FROM reunion_has_usagers
	    INNER JOIN usager ON reunion_has_usagers.id_usager=usager.id_usager
		WHERE reunion_has_usagers.id_reunion  = :id_reunion');
				
		
		$select->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
		$select->execute();
		
		$liste_inscrits = $select->fetchAll(PDO::FETCH_OBJ);
		
		}
		
	 catch (PDOException $f){
       echo $f->getMessage() . " <br><b>Erreur lors de l'affichage de la réunion</b>\n";
	throw $f;
        exit;
    }
  
   
  // envoi d'un email à chaque inscrit
  
  foreach ($liste_inscrits as $key) 
  	{
  	
	
$email=$key->email;

// Création d'un nouvel objet $mail
$mail = new PHPMailer();

// Encodage
$mail->CharSet = 'UTF-8';

//=====Corps du message
$body = "<html><head></head>
<body>
Bonjour,<br>
<br>
Nous vous informons que la réunion de sensiblisation (lombri)compostage suivante a été annulée: <br>
<ul>
<li><b>Reunion le $date_debut[2] $date_mois[1] à $heure - $nom_commune - $adresse  </b></li>
</ul>
<br>Veuillez nous excuser pour ce désagrément<br>
Pour tout renseignement complémentaire, vous pouvez nous contacter au 05 59 14 64 30<br><br>
Salutations<br>
<br>
</body>
</html>";
//==========


// Expediteur, adresse de retour et destinataire :
$mail->SetFrom(FROM_EMAIL, "Agglomération Pau-Pyrénées"); //L'expediteur du mail
$mail->AddReplyTo("NO-REPLY@agglo-pau.fr", "NO REPLY"); //Pour que l'usager réponde au mail
//mail du destinataire
$mail->AddAddress($email); 

// Sujet du mail
$mail->Subject = "[ANNULATION] Réunion de sensibilisation au compostage";
// Le message
$mail->MsgHTML($body);


// Envoi de l'email
$mail->Send();

unset($mail);

      
 	 }
  
	
  }
 
 
 
 
  /***********************************************************************
 * Suppression d'une reunion
 **************************************************************************/
  
 function suppReunion($id_reunion)
  {
 

// suppression de la reunion
try{ 	 	
$delete = $this->con->prepare('DELETE 
		FROM reunion
		WHERE id_reunion  = :id_reunion ');
						
$delete->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
$delete->execute();	
		}

 	catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de la suppression de la reunion </b>\n";
            throw $e;
        }	

	
//suppression des inscrits

try{ 	 	
$delete = $this->con->prepare('DELETE usager
FROM usager
INNER JOIN reunion_has_usagers
ON reunion_has_usagers.id_usager = usager.id_usager
WHERE reunion_has_usagers.id_reunion = :id_reunion ');
						
$delete->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
$delete->execute();	
		}

 	catch (Exception $h) {
            echo $h->getMessage() . " <br><b>Erreur lors de la suppression des inscrits </b>\n";
            throw $h;
        }	



	
	
// supression de la table de jointure
try{ 	 	
$delete = $this->con->prepare('DELETE 
		FROM reunion_has_usagers
		WHERE id_reunion  = :id_reunion ');
						
$delete->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
$delete->execute();	
		}

 	catch (Exception $f) {
            echo $f->getMessage() . " <br><b>Erreur lors de la suppression de la jointure</b>\n";
            throw $f;
        }	

  }
 
 
 /**************************************************************************
 Ajoute un usager à une reunion via le backoffice
***************************************************************************/

// Ajout dans la base utilisateur
function ajoutUser($nom,$prenom,$adresse,$commune,$email,$telephone,$id_reunion,$couleur,$date_reunion)
  {
				
$composteur=1;
	
	
		try {
				
			
$insert = $this->con->prepare('INSERT INTO usager (nom,prenom,adresse,id_commune,email,telephone,composteur,couleur_lombri,date_inscription,ip_adresse,presence_reunion,composteur_donne,date_reunion)
VALUES(:nom,:prenom,:adresse,:id_commune,:email,:telephone,:composteur,:couleur_lombri,:date_inscription,:ip_adresse,:presence_reunion,:composteur_donne,:date_reunion)');
 	
$insert->bindParam(':nom', $nom, PDO::PARAM_STR);
$insert->bindParam(':prenom', $prenom, PDO::PARAM_STR);
$insert->bindParam(':adresse', $adresse, PDO::PARAM_STR);
$insert->bindParam(':id_commune', $commune, PDO::PARAM_INT);
$insert->bindParam(':email', $email, PDO::PARAM_STR);
$insert->bindParam(':telephone', $telephone, PDO::PARAM_STR);
$insert->bindParam(':composteur', $composteur, PDO::PARAM_INT);
$insert->bindParam(':couleur_lombri', $couleur, PDO::PARAM_STR);
$insert->bindValue(':date_inscription', date('Y-m-d H:i:s'),PDO::PARAM_STR);
$insert->bindValue(':ip_adresse', $_SERVER['REMOTE_ADDR'],PDO::PARAM_STR);
$insert->bindValue(':presence_reunion','1',PDO::PARAM_INT);
$insert->bindValue(':composteur_donne','1',PDO::PARAM_INT);
$insert->bindParam(':date_reunion', $date_reunion, PDO::PARAM_STR);

$execute=$insert->execute();		

			} 
        
        catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de l'ajout de l'utilisateur à la réunion</b>\n";
            throw $e;
        }
  	
// recupération de l'id de l'utilisateur
$lastId = $this->con->lastInsertId();
  	

// Ajout table de jointure
	try {
						
$insert2 = $this->con->prepare('INSERT INTO reunion_has_usagers (id_reunion,id_usager)
VALUES(:id_reunion,:id_usager)');
 	
$insert2->bindParam(':id_reunion', $id_reunion, PDO::PARAM_STR);
$insert2->bindParam(':id_usager', $lastId, PDO::PARAM_INT);

$execute2=$insert2->execute();		

			} 
        
        catch (Exception $f) {
            echo $f->getMessage() . " <br><b>Erreur lors de l'ajout dans la table de jointure</b>\n";
            throw $f;
        }

        
//incrementation du nombre d'utilisateur dans la table reunion
	try{	
$update = $this->con->prepare('UPDATE reunion SET nbr_participants = nbr_participants + 1  WHERE id_reunion  = :id_reunion'); 

$update->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
$update->execute();	
	}
	
	 catch (Exception $g) {
            echo $g->getMessage() . " <br><b>Erreur lors de l'incrementation de la table reunion</b>\n";
            throw $g;
        }		


}


/***********************************************************************
 * Envoi d'un email aux inscrit qui ne sont pas venus à la reunion
 **************************************************************************/
  
 function emailAbsent($id_reunion)
  {
  
  // reupération des information sur la reunion
  try{
    	
		$select = $this->con->prepare('SELECT * 
	    FROM reunion
	    INNER JOIN communes ON communes.id_commune=reunion.id_commune
		WHERE id_reunion  = :id_reunion');
				
		
		$select->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
		$select->execute();
		
		$info_reunion = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'affichage de la réunion</b>\n";
	throw $e;
        exit;
    }
  
$date_reunion=$info_reunion['date_reunion'];
$nom_commune=$info_reunion['nom_commune'];
$adresse=htmlspecialchars($info_reunion['adresse']);
$lien_map=htmlspecialchars($info_reunion['lien_map']);
	
$date_expl=explode(" ",$date_reunion);
$heure=explode(":",$date_expl[1]);
$heure=$heure[0].":".$heure[1];
$date_debut=explode("-",$date_expl[0]);
		 
switch ($date_debut[1]) {
	case '1': $date_mois[1]="Janvier";break;
	case '2': $date_mois[1]="Février";break;
	case '3': $date_mois[1]="Mars";break;
	case '4': $date_mois[1]="Avril";break;
	case '5': $date_mois[1]="Mai";break;
	case '6': $date_mois[1]="Juin";break;
	case '7': $date_mois[1]="Juillet";break;
	case '8': $date_mois[1]="Août";break;
	case '9': $date_mois[1]="Septembre";break;
	case '10': $date_mois[1]="Octobre";break;
	case '11': $date_mois[1]="Novembre";break;
	case '12': $date_mois[1]="Décembre";break;  
}
  
  // selection des emails des inscrits non présent
   try{
 
		
		$select = $this->con->prepare('SELECT * 
	    FROM reunion_has_usagers
	    INNER JOIN usager ON reunion_has_usagers.id_usager=usager.id_usager
	    INNER JOIN communes ON usager.id_commune=communes.id_commune
		WHERE reunion_has_usagers.id_reunion  = :id_reunion AND usager.presence_reunion = 0
		ORDER BY usager.nom ASC');
				
		
		$select->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
		$select->execute();
		
		$data = $select->fetchAll(PDO::FETCH_OBJ);
	//	return $data;
		
		}
		
	 catch (PDOException $f){
       echo $f->getMessage() . " <br><b>Erreur lors de l'affichage de la réunion</b>\n";
	throw $f;
        exit;
    }
  
   
  // envoi d'un email à chaque inscrit
 
  foreach ($data as $key) 
  	{
  	
	
$email=$key->email;

// Création d'un nouvel objet $mail
$mail = new PHPMailer();

// Encodage
$mail->CharSet = 'UTF-8';

//=====Corps du message

$body = "<html><head></head>
<body>
Bonjour,<br>
<br>
Vous étiez inscrits à la réunion du $date_debut[2] $date_mois[1] à $heure ($nom_commune) pour venir retirer un (lombri)composteur, mais, sauf erreur de notre part, vous n'êtes pas venu. <br>
Pour des raisons pratiques et pour permettre au plus grand nombre d'y participer, il est préférable de nous informer en cas d'empêchement pour que nous puissions inscrire une autre personne à votre place (nous avons une liste d'attente importante pour retirer un composteur).<br>
Si vous souhaitez vous réinscrire, nous vous invitons à <a href=\"http://www.agglo-pau.fr/au-quotidien/les-dechets/98-compostage/487-demander-un-composteur-gratuit-et-se-former.html\">cliquer ici</a> <br>
En cas de besoin, merci de nous contacter par mail à <a href=\"mailto:collecte@agglo-pau.fr\">collecte@agglo-pau.fr</a> ou par téléphone au 05 59 14 64 30<br><br>
Salutations<br>
<br>
</body>
</html>";
//==========


// Expediteur, adresse de retour et destinataire :
$mail->SetFrom(FROM_EMAIL, "Agglomération Pau-Pyrénées"); //L'expediteur du mail
$mail->AddReplyTo("NO-REPLY@agglo-pau.fr", "NO REPLY"); //Pour que l'usager réponde au mail
//mail du destinataire
$mail->AddAddress($email); 

// Sujet du mail
$mail->Subject = "Réunion de sensibilisation au compostage";
// Le message
$mail->MsgHTML($body);


// Envoi de l'email
$mail->Send();

unset($mail);

      
 	 }
 
 //Enregistrement "email envoyé" dans la fiche réunion
	try{	
$update = $this->con->prepare('UPDATE reunion SET email_absent = 1  WHERE id_reunion  = :id_reunion'); 

$update->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
$update->execute();	
	}
	
	 catch (Exception $g) {
            echo $g->getMessage() . " <br><b>Erreur lors de l'incrementation de la table reunion</b>\n";
            throw $g;
        }		
 
 
  
	
  }
 
}