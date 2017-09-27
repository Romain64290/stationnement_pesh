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
FROM decla_immat
WHERE date_validite LIKE :date AND email <>""');

$select->execute(array(
		':date' => "%$date%" 
		));
		
$data = $select->fetchAll(PDO::FETCH_OBJ);			
		
 }
 
		
catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de la selection des dates de validité</b>\n";
	throw $e;
        exit;
    }

return $data;

 }
  
 
 /***********************************************************************
 * Envoi d'un email aux usgers dont l'inscription se périme à J-90, J-30, J-7
 **************************************************************************/
  
 function emailRappelValidite($id_decla,$type)
  {
  
  // reupération des informations sur la reunion
  try{
    	
		$select = $this->con->prepare('SELECT * 
	    FROM decla_immat
	    WHERE id_decla  = :id_decla');
				
		
		$select->bindParam(':id_decla', $id_decla, PDO::PARAM_STR);
		$select->execute();
		
		$info_usager = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de la récupération des informations usager</b>\n";
	throw $e;
        exit;
    }
  

$immatriculation=$info_usager['immatriculation'];
$mail_user=htmlspecialchars($info_usager['email']);

$date_validite=$info_usager['date_validite'];
 $date_validite= explode(" ",$date_validite);
 $date_validite= explode("-",$date_validite[0]);

    
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
Votre déclaration d'immatriculation dans le système de contrôle automatisé arrive à échéance le ".$date_validite[2]."-".$date_validite[1]."-".$date_validite[0].".<br>
Vous pouvez la renouveler dès à présent en cliquant sur le lien suivant : <a href=\"https://declaration-immat.agglo-pau.fr\">https://declaration-immat.agglo-pau.fr</a><br>
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
$mail->Subject = "Ville de Pau - Contrôle stationnement automatisé : Fin de validité ".$type;
// Le message
$mail->MsgHTML($body);


// Envoi de l'email
$mail->Send();

unset($mail);


      
  
	
  }
 
 
}