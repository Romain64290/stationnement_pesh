<?php

/***** Dernière modification : 21/09/2016, Romain TALDU	*****/


require(__DIR__ .'/../../../include/verif_session.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');

// préparation connexion
$connect = new connection();
$compostage = new compostage($connect);

$id_reunion=$_GET['id_reunion'];

$afficheInscrits=$compostage->afficheInscrits($id_reunion);

 ?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Fiche Retrait Composteur</title>
		<style>
			h3, h4, h5 {
				text-align: center;
				font-weight: 500;
			}
			body {
				padding: 0px;
				margin: 0px;
				font-size: 90%;
				font-family: Arial, Helvetica, sans-serif;
			}
			.container {
				position: relative;
				margin: 0px auto;
				width: 100%;
				max-width: 1200px;
				background-color: #fff;
			}
		</style>
	</head>
	<body>
		
<?php 
foreach($afficheInscrits as $key){
			
		
		$nom=htmlspecialchars($key->nom);
	    $prenom=htmlspecialchars($key->prenom);
		$telephone=htmlspecialchars($key->telephone);
		$email=htmlspecialchars($key->email);
		$adresse=htmlspecialchars($key->adresse);
		$date_reunion=htmlspecialchars($key->date_reunion);
		$nom_commune=htmlspecialchars($key->nom_commune);
		

?>		
		
		
		<div class="container">
			<img src="img/ppp.png">
	<br>	<br>	<br>	<br>	<br>	<br>	<br>	<br>
			<b><h3 style="color:#808000"> CHARTE D'ENGAGEMENT
			<br>
			A la pratique du Lombricompostage
			<br>
			</h3></b> <h3 style="text-align:left"><b>En valorisant mes déchets de la cuisine :</b></h3>
			<ul>
				<li>
					Je participe à la réduction des déchets
				</li>
				<li>
					J'évite le transport et le traitement des déchets
				</li>
				<li>
					J'évite l'incinération des déchets valorisable
				</li>
				<li>
					J'obtiens du compost, engrais naturel pour mes plantes
				</li>
				
			</ul>
	
				<b>En contre partie, le bénéficiaire s'engage à respecter les clauses suivantes :</b>
			<br><br>
			<ul>
				<li>
			<b>Utiliser</b> exclusivement ce lombricomposteur, sur le territoire de la Communauté d'Agglomération de Pau-Pyrénées afin de permettre le recyclage des biodéchets.
			</li>
				</ul>	
				<ul>
			<li><b>Répondre</b> aux demandes éventuelles de la Communauté d'Agglomération Pau-Pyrénées, concernant la performance du Lombricomposteur et les difficultés éventuelles rencontrées lors de son utilisation.
			</li>
				
			</ul>
			<br>
			<b>La CDAPP s'engage à :</b>
		<ul>
				<li>
			Être à votre <b>écoute</b> et à <b>répondre</b> à toutes vos questions concernant le compostage individuel.
			</li>
				</ul>	
			<br>
			<h5> Communauté d'Agglomération de Pau-Pyrénées
			<br>
			Direction Développement Durable et Déchets
			<br>
			39 avenue Larribau – 64000 PAU
			<br>
			05 59 14 64 30
			<br>
			collecte@agglo-pau.fr
			<br>
			</h5>
			<hr style="border-top: dotted 1px;" />
			<span style="Line-Height: 1.6;"> Partie à remplir <i>(réservée à la CDAPP)</i>
				<br>
				<br>
				Nom/Prénom: <?php echo "$nom $prenom";?>
				<br>
				Adresse: <?php echo "$adresse, $nom_commune";?>
				<br>
				Tél: <?php echo $telephone;?>
				<br>
				Email: <?php echo $email;?>
				<br>
				Date de remise : <?php echo $date_reunion;?>
				<br>
				<h5><u>Signature avec la mention « lu et approuvé »</u></h5> </span>
			<br>
		</div>
		<page></page>
<?php } ?>		
		
	</body>
	
</html>
