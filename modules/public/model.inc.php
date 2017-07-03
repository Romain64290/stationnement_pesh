<?php

/***** Dernière modification : 08/09/2016, Romain TALDU	*****/

class front {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
    }
	

/**************************************************************************
 Ajoute un usager à une reunion
***************************************************************************/

// Ajout dans la base utilisateur
function ajoutUser($nom,$prenom,$adresse,$commune,$email,$telephone,$id_reunion,$couleur,$formation_ss_composteur)
  {
				
if($formation_ss_composteur==""){$composteur=1;}else{$composteur=$formation_ss_composteur;};
	
$temp=explode("_", $id_reunion);
$id_reunion=$temp[0];
$date_reunion=$temp[1];
	
		try {
				
			
$insert = $this->con->prepare('INSERT INTO usager (nom,prenom,adresse,id_commune,email,telephone,composteur,couleur_lombri,date_inscription,ip_adresse,date_reunion)
VALUES(:nom,:prenom,:adresse,:id_commune,:email,:telephone,:composteur,:couleur_lombri,:date_inscription,:ip_adresse,:date_reunion)');
 	
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

			




// Recupération des infos réunions
 try{
    	
		$select = $this->con->prepare('SELECT * 
		FROM reunion
		INNER JOIN communes ON communes.id_commune = reunion.id_commune
		WHERE id_reunion = :id_reunion
	    ');	
			
		$select->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);		
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'affichage de la réunion</b>\n";
	throw $e;
        exit;
    }

$date_reunion=$data['date_reunion'];
$nom_commune=$data['nom_commune'];
$adresse=htmlspecialchars($data['adresse']);
$lien_map=htmlspecialchars($data['lien_map']);
$type_reunion=$data['type_reunion'];
	
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

// Création d'un nouvel objet $mail
$mail = new PHPMailer();

// Encodage
$mail->CharSet = 'UTF-8';

//=====Corps du message
$body = "<html><head></head>
<body>
Bonjour,<br>
<br>";

if($type_reunion==1) 
{$body .= "Nous vous confirmons votre inscription à la formation compostage suivante: <br>";} 
else{$body .= "Nous vous confirmons votre inscription à la formation lombricompostage suivante: <br>";}

$body .= "<ul>
<li><b>Reunion le $date_debut[2] $date_mois[1] à $heure - $nom_commune - $adresse  </b><a href=\"$lien_map\" target=\"_blank\"> (voir l'adresse sur Google Map)</a> [<a href=\"".URL_SITE."/modules/compostage/validation_desinscription.php?id_user=$lastId&id_reunion=$id_reunion&email=$email\">Se désinscrire</a>]</li>
</ul>";

if($type_reunion==1) 
{$body .= "
La formation durera environ 30 minutes.<br>
Le composteur (13kg) vous sera remis en kit et rentre dans n'importe quelle voiture.<br>
En vous remerciant pour votre engagement,<br>";} 

else{$body .= "
Le lombricompostage ne peut se faire que sous certaines conditions, notamment de place disponible dans l'appartement. Pour confirmer votre inscription un guide composteur vous contactera par téléphone pour vérifier ces conditions. <br>";}

$body .= "
<br>
Cordialement, <br>
La Direction développement durable et déchets.<br>
05 59 14 64 30 <br>
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

}