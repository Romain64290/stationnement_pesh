<?php

/***** Dernière modification : 12/09/2016, Romain TALDU	*****/

class cron {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
    }
	
 /***********************************************************************
 * Selction des réunions à 48h
 **************************************************************************/

 function select_reunion($date)
 {
 	
	
  try{
    	
$select = $this->con->prepare('SELECT * 
FROM reunion
WHERE date_reunion LIKE :date');

$select->execute(array(
		':date' => "%$date%" 
		));
		
$data = $select->fetchAll(PDO::FETCH_OBJ);			
		
 }
 
		
catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de la selection des réunions</b>\n";
	throw $e;
        exit;
    }

return $data;

 }
  
 
 /***********************************************************************
 * Envoi d'un email aux inscrits lors de la modification d'une reunion
 **************************************************************************/
  
 function emailRappelReunion($id_reunion)
  {
  
  // reupération des informations sur la reunion
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
  	
$id_usager=$key->id_usager;	
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
Nous vous rappelons votre inscription à la réunion de sensiblisation (lombri)compostage suivante : <br>
<ul>
<li><b>Reunion le $date_debut[2] $date_mois[1] à $heure - $nom_commune - $adresse  </b><a href=\"$lien_map\" target=\"_blank\"> (voir l'adresse sur Google Map)</a> </li>
</ul>
En cas d'indisponibilité de votre part, pensez à vous désinscrire [<a href=\"".URL_SITE."/modules/compostage/validation_desinscription.php?id_user=$id_usager&id_reunion=$id_reunion&email=$email\">Se désinscrire</a>]
<br><br>
Cordialement, <br>
La Direction développement durable et déchets.<br>
05 59 14 64 30 <br>
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
$mail->Subject = "[RAPPEL] - Réunion de sensibilisation au compostage";
// Le message
$mail->MsgHTML($body);


// Envoi de l'email
$mail->Send();

unset($mail);

      
 	 }
  
	
  }
 
 
}