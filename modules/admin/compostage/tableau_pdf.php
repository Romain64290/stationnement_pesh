<?php

/***** Dernière modification : 12/09/2016, Romain TALDU	*****/


require(__DIR__ .'/../../../include/verif_session.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');

// préparation connexion
$connect = new connection();
$compostage = new compostage($connect);

$id_reunion=$_GET['id_reunion'];

$afficheReunion=$compostage->infosReunion($id_reunion);
$aficheInscrits=$compostage->afficheInscrits($id_reunion);


$date_expl=explode(" ",$afficheReunion[2]);
$heure=explode(":",$date_expl[1]);
$heure=$heure[0].":".$heure[1];
$date_debut=explode("-",$date_expl[0]);


 ?>

<!DOCTYPE html>

<html>
  <head>

<style>

td {
height:25px; 
text-align:left;
border-width:1px;
border-style:solid; 
border-color:black;
padding-left:5px;
}

h5{
color:#006997;
}

h4{
color:#006997;
}
</style>

  </head>
 
  <body class="hold-transition skin-blue sidebar-mini">
  
  	<div align="center"><img src="../../../include/img/logo_300.png" width="60" height="61"><h4>Réunion de sensibilisation au compostage</h4>
  		
   <h5> <b><?php echo $afficheReunion[10]; ?>, le <?php echo "$date_debut[2]/$date_debut[1]"; ?> à <?php echo $heure; ?></b><br>
   	 <?php echo $afficheReunion[3]; ?> <br>
    <u>Participants</u> : <?php echo $afficheReunion[7]; ?> / <?php  if($afficheReunion[8]=="0" ){echo "Illimité";}else{echo $afficheReunion[8];} ?>
    </h5>
  
</div><br>




    <table cellspacing="0" style="width: 100%; border: solid 1px black;  background: #E7E7E7; text-align: center; font-size: 8pt;">
        <tr>
            <th style="width: 5%;" >#</th>
            <th style="width: 25%;">Nom / Prénom</th>
            <th style="width: 15%; ">Téléphone</th>
            <th style="width: 25%; ">Email</th>
            <th style="width: 10%; ">Composteur demandé</th>
            <th style="width: 10%; ">Présence</th>
            <th style="width: 10%; ">Composteur donné</th>
        </tr>
       
    </table>
<table cellspacing="0" style="width: 100%; border: solid 1px black; background: #F7F7F7; text-align: center; font-size: 9pt;border-collapse:collapse;">
       
<?php

	
 /* affichage de la liste des inscrits */
                                    
$afficheInscrits=$compostage->afficheInscrits($id_reunion); 


$compteur = 1;

foreach($afficheInscrits as $key){
			
		$id_usager=$key->id_usager;
		$nom=htmlspecialchars($key->nom);
		$prenom=htmlspecialchars($key->prenom);
		$telephone=htmlspecialchars($key->telephone);
		$email=htmlspecialchars($key->email);
		$presence_reunion=$key->presence_reunion;
		$composteur_donne=$key->composteur_donne;
		
		$composteur=$key->composteur;
		$couleur_lombri=htmlspecialchars($key->couleur_lombri);
		
		if($afficheReunion[1]==1){if($composteur==1){$composteur_demande="oui";}else{$composteur_demande="non";}}
			else{if($composteur==1){$composteur_demande=$couleur_lombri;}else{$composteur_demande="non";}}
		
		 
if($compteur % 2 == 0){echo "<tr  style=\"background: #FFF;\">";}else{echo "<tr  style=\"background: #f0F0F0;\">";}
			
            echo"<td style=\"width:5%;\">$compteur</td>
            <td style=\"width: 25%; \">$nom $prenom</td>
            <td style=\"width: 15%; \">$telephone</td>
            <td style=\"width: 25%; \">$email</td>      
			<td style=\"width: 10%; \">$composteur_demande</td>
			<td style=\"width: 10%; \"></td>
			<td style=\"width: 10%; \"></td>";

echo"</tr>";
     
$compteur++;		                           
                  
}                 
                  
/* Fin de l'affichage de la liste des Inscrits */   


 

?>
 </table>	
 
 
</body>
</html>