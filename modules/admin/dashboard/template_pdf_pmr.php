<?php

/***** Dernière modification : 12/09/2016, Romain TALDU	*****/


require(__DIR__ .'/../../../include/verif_session.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');

// préparation connexion
$connect = new connection();
$dashboard = new dashboard($connect);

//$id_reunion=$_GET['id_reunion'];

//$afficheReunion=$compostage->infosReunion($id_reunion);
//$aficheInscrits=$compostage->afficheInscrits($id_reunion);


/*$date_expl=explode(" ",$afficheReunion[2]);
$heure=explode(":",$date_expl[1]);
$heure=$heure[0].":".$heure[1];
$date_debut=explode("-",$date_expl[0]);
*/

 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"  />
<style>
.imaage {
    position:absolute;
	top:18px;
	left: 18px;
}

body {
	font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
}

.titre{
	 position:absolute;
	top:18px;
	left: 190px;
	font-size: 150%;
	font-weight: 800;

}

.blackbg{
	position:absolute;
	top:120px;
	left: 18px;
	text-align:center;
	background-color:black;
	font-weight: 300;
	color:white;
	font-size:150%;
	width:700px;
	padding: 8px;
}

.maintext{
	position:absolute;
	text-align: justify;
	top:190px;
	left: 18px;
	width:720px;
	font-size:100%;
	padding-top:24px;
	word-wrap: break-word;
}

  
.visa {
	position:absolute;
	top:940px;
	left: 400px;
	text-align:center;
	width: 240px;
	height: 90px;
	border:1px dotted black;
	padding:10px;
  } 
  
  .notabene {
	position:absolute;
	top:1040px;
	left: 18px;
	font-size:80%;
  } 
  
</style>
</head>
  <body>
		<div class="imaage">
			<img src="logo_ppp150.png" width="150"> 
		</div>
<div class="titre">
FORMULAIRE DE DÉCLARATION D'IMMATRICULATION<br>
DANS SYSTEME DE CONTROLE AUTOMATISÉ<br>
DU STATIONNEMENT DE LA VILLE DE PAU
</div>

<div class="blackbg">
Bénéficiaires de la carte européenne de stationnement<br>
ou de la carte mobilité inclusion (CMI)
</div>
<div class="maintext">
« Je soussigné, <b>
<!-- inserer code pour afficher M./Mme-->
<!-- inserer code pour afficher nom-->
<!-- inserer code pour afficher prénom-->
</b>
<br><br><b>déclare</b><br>
- être titulaire d'une carte européenne de stationnement pour personnes handicapées ou d'une carte mobilité inclusion (CMI) comportant la mention "stationnement" en cours de validité (date de fin de validité . . / . . / . . . . ), dont je joins une copie au présent dossier,
<br><br>
- être propriétaire ou utilisateur régulier du véhicule immatriculé <b>
<!-- inserer code pour afficher plaque d'immatriculation-->
</b>, dont je joins une copie de la carte grise au présent dossier,<br><br>
- demande à la Ville de Pau de bien vouloir prendre en compte ce numéro d'immatriculation dans son système de contrôle automatisé du stationnement payant, conformément à l'article L. 241-3-2 du code de l'action sociale accordant la gratuité du stationnement sur voirie aux titulaires de l'une des cartes de stationnement précitées.<br><br>
- avoir pris connaissance du fait que cette déclaration ne me dispense pas d'apposer ma carte de stationnement sur le tableau de bord de ce véhicule lorsque je l'utilise ou lorsque celui-ci est utilisé pour me véhiculer, afin de permettre les opérations de contrôle. Dans l'éventualité où je serais amené(e) à utiliser un autre véhicule que celui déclaré, je procéderai à une déclaration temporaire de celui-ci directement sur l'horodateur le plus proche de mon lieu de stationnement, en prenant garde d'apposer ma carte de stationnement sur le tableau de bord dudit véhicule.<br><br>
- m'engager à communiquer à l'accueil de la Police municipale tout changement concernant cette déclaration (changement de véhicule, etc.).<br><br>
- avoir pris connaissance du fait que cette déclaration est valable deux ans (sauf changement de situation préalable), et qu'il m'incombe de renouveler cette demande d'inscription à l'issue, en adressant un courrier ou me présentant à l'accueil de la Police municipale, ou bien en adressant un courriel à controle-stationnement@ville-pau.fr. Pour faciliter ce renouvellement de déclaration, j'autorise les services municipaux compétents à m'envoyer un message de rappel de fin d'échéance à l'adresse mail suivante: <b>
<!-- inserer code pour afficher mail-->
</b> 45 jours avant la fin de validité de cette déclaration.<br><br>
- avoir pris connaissance de mes droits concernant l'utilisation et l'accès à mes données personnelles tels que décrits ci-après :<br>
<i>Les informations recueillies à partir de ce formulaire font l’objet d’un traitement informatique destiné à la Direction Préven-
tion et Sécurité Publique de la Ville de Pau, représentée par Pascal Mercier, Directeur, pour une prise en compte de la
qualité d'ayant-droit à la gratuité du stationnement dans le système de contrôle automatisé du stationnement payant. Les
destinataires de ces données sont exclusivement les services compétents de la Direction Prévention et Sécurité Publique-
chargés d'instruire cette demande.</i><br><br>
Conformément à la loi « informatique et libertés » du 6 janvier 1978 modifiée, je dispose d’un droit d’accès et de rectification
aux informations qui me concernent. Pour cela, je peux accéder aux informations me concernant en m'adressant à :<br>
<br>
<b>
<span style="margin-left:80px;">Monsieur le Maire Pau</span><br>
<span style="margin-left:80px;">Hôtel de Ville</span><br>
<span style="margin-left:80px;">Place Royale</span><br>
<span style="margin-left:80px;">64036 Pau Cedex</span><br>
</b>
<br>
Je peux également, pour des motifs légitimes, m'opposer au traitement des données me concernant.* »<br><br><br>
Fait à ..........................., le
<!-- inserer code pour afficher date -->
</div> <!-- main text -->
<br>
<div class="visa"><b>
VISA DIRECTION PRÉVENTION<br>
ET SÉCURITÉ PUBLIQUE</b>
</div>
<div class="notabene">
* Pour en savoir plus, consultez vos droits sur le site de la CNIL.</div><br>
</body>
</html>