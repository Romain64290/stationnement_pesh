<?php

/***** Dernière modification : 12/09/2016, Romain TALDU	*****/

class publique {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
    }

 
 
 /**************************************************************************
 * Insertion des facture dans la base de donnees par une societe
***************************************************************************/
 
 function save_demande($civilite,$type_decla,$nom,$prenom,$email,$immat,$uniqid,$justificatif1,$justificatif2)
  {
  
  	try {
				
			
$insert = $this->con->prepare('INSERT INTO decla_immat (type_decla, civilite,nom,prenom,email,immatriculation,date_decla,ip_adresse,dossier,justificatif1,justificatif2)
VALUES(:type_decla, :civilite,:nom,:prenom,:email,:immatriculation,:date_decla,:ip_adresse,:dossier,:justificatif1,:justificatif2)');
 
$insert->bindParam(':type_decla', $type_decla, PDO::PARAM_INT);
$insert->bindParam(':civilite', $civilite, PDO::PARAM_INT);
$insert->bindParam(':nom', $nom, PDO::PARAM_STR);
$insert->bindParam(':prenom', $prenom, PDO::PARAM_STR);
$insert->bindParam(':email', $email, PDO::PARAM_STR);
$insert->bindParam(':immatriculation', $immat, PDO::PARAM_STR);
$insert->bindValue(':date_decla', date('Y-m-d H:i:s'),PDO::PARAM_STR);
$insert->bindValue(':ip_adresse', $_SERVER['REMOTE_ADDR'],PDO::PARAM_STR);
$insert->bindParam(':dossier', $uniqid, PDO::PARAM_STR);
$insert->bindParam(':justificatif1', $justificatif1, PDO::PARAM_STR);
$insert->bindParam(':justificatif2', $justificatif2, PDO::PARAM_STR);

$execute=$insert->execute();		

			} 
        
        catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de l'enregistrement d'une demande</b>\n";
            throw $e;
        }   
     
     
  }
 
 
 
  /********************************
 * Upload des factures
*********************************/  
   
 function uploadFractures($file,$destination_factures,$num_document)
{			
// Creer le repertoire s'il n'existe pas
if(!is_dir($destination_factures)){mkdir($destination_factures, 0775, true);}
     
$ext = pathinfo($file['name'], PATHINFO_EXTENSION);   

$maxsize=5485760;

	
 $destination=$destination_factures.$num_document.".".$ext;  
     
    if ( $file['error'] > 0) return FALSE;

  			if ($file['size'] < $maxsize) {
  
     
		move_uploaded_file($file['tmp_name'], $destination);
                chmod($destination, 0664);}
 
return $destination;


}	



 /*******************************************************
 * Envoi email societe de confirmation upload
********************************************************/ 

function envoiEmailConfirmation($email_societe,$upload1,$upload2,$upload3,$upload4,$upload5)

{
	
// Envoi des emails

// Création d'un nouvel objet $mail
$mail = new PHPMailer();
// Encodage
$mail->CharSet = 'UTF-8';

// creation de la liste des factures envoyées 
$liste_factures_societe=$upload1."  ".$upload2."  ".$upload3."  ".$upload4."  ".$upload5;


//=====Corps du message
$body = "<html><head></head>
<body>
Bonjour,<br>
<br>
Nous vous remercions du dépôt de votre (vos) facture(s) sur notre site.  Elles seront prises en compte dans les meilleurs délais.<br>
Les factures déposées sont : ".$liste_factures_societe."<br>
<br>
Salutations<br>
<br>
</body>
</html>";
//==========


// Expediteur, adresse de retour et destinataire :
$mail->SetFrom("NO-REPLY@agglo-pau.fr", "Agglomération Pau-Pyrénées"); //L'expediteur du mail
$mail->AddReplyTo("NO-REPLY@agglo-pau.fr", "NO REPLY"); //Pour que l'usager réponde au mail

// Si on a le nom $mail->AddAddress("romain_taldu@hotmail.com", "Romain perso"); 
 //mail du destinataire
$mail->AddAddress($email_societe); 


// Sujet du mail
$mail->Subject = "Agglomération Pau-Pyrénées - Accusé de dépôt de facture";
// Le message
$mail->MsgHTML($body);

//Attach a file
//$mail->addAttachment('colas-pau_158_2.pdf');
//$mail->addAttachment('elcom-reso_147_1.pdf');

// Envoi de l'email
$mail->Send();

unset($mail);


	
}




}
