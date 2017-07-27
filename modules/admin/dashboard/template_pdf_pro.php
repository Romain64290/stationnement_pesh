<?php

/***** Dernière modification : 12/09/2016, Romain TALDU	*****/


require(__DIR__ .'/../../../include/verif_session.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');

// préparation connexion
$connect = new connection();
$dashboard = new dashboard($connect);

$id_decla=$_GET['id_decla'];

$aficheInscrit=$dashboard->afficheInscrit($id_decla);

$date_expl=explode(" ",$aficheInscrit['date_decla']);
$date_expl=explode("-",$date_expl[0]);
$date_decla="$date_expl[2]/$date_expl[1]/$date_expl[0]";

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
	top:150px;
	left: 18px;
	width:720px;
	font-size:100%;
	padding-top:24px;
	word-wrap: break-word;
}

  
.visa {
	position:absolute;
	font-size:80%;
	top:950px;
	left: 410px;
	text-align:center;
	width: 240px;
	height: 80px;
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
Professionnels de santé
</div>
<div class="maintext">
« Je soussigné, <b>
<?php
 if($aficheInscrit['civilite']==1){echo "M. ";}else{echo"Mme ";}
 echo htmlspecialchars($aficheInscrit['prenom']); echo" ";echo htmlspecialchars($aficheInscrit['nom']);

 ?>
</b>
<br><br><b>déclare</b><br>
- être titulaire d'un caducée médical en cours de validité, pour lequel je joins un justificatif (attestation d'inscription à l'ordre des médecins/infirmiers, attestation d'employeur, etc.) au présent dossier,
<br><br>
- utiliser le véhicule immatriculé <b>
<?php echo htmlspecialchars($aficheInscrit['immatriculation']); ?>
</b> comme véhicule principal dans le cadre d'inter ventions médicales au domicile de mes patients, et pour lequel je joins une copie de la carte grise au présent dossier,<br>
- demander à la Ville de Pau de bien vouloir prendre en compte ce numéro d'immatriculation dans son système de contrôle
automatisé du stationnement afin d'être identifié(e) comme professionnel de santé, conformément à :<br>
<div style="margin-left:20px;">- la circulaire du ministère de l'Intérieur du 17 mars 1986 précisant que «<i> les infirmières et infirmiers appelés à donner
des soins à domicile lorsqu'ils utilisent leur véhicule dans le cadre de l'exercice de leur activité professionnelle [...]
soient admis au bénéfice de certaines tolérances dès lors que l'infraction éventuellement commise n'est pas de nature
à gêner exagérément la circulation publique ni, a fortiori, à porter atteinte à la sécurité des autres usagers</i> ».</div><br>
<div style="margin-left:20px;">- la circulaire du ministère de l'Intérieur du 26 janvier 1995 précisant que « <i>Les véhicules des médecins arborant le
caducée, ou ceux des sages-femmes arborant leur insigne professionnel, pourront bénéficier de mesures de tolérance
en matière de stationnement irrégulier dès lors que leurs propriétaires sont appelés à exercer leurs activités profes-
sionnelles au domicile de leurs patients, ou à proximité de leur domicile en cas d'astreinte et essentiellement pour satis-
faire à leurs obligations, en cas d'urgence. Ces stationnements irréguliers ne doivent pour autant pas être de nature à
gêner exagérément la circulation générale ou constituer un danger pour les autres usagers, notamment des piétons</i> ».</div>
<br>
- avoir pris connaissance du fait que cette déclaration ne me dispense pas d'apposer mon caducée médical sur le tableau
de bord de mon véhicule lorsque je l'utilise à des fins professionnelles afin de permettre les opérations de contrôle.
<br><br>
- m'engager à communiquer aux services de la Ville de Pau tout changement concernant cette déclaration (changement de
véhicule, changement de situation, etc.).<br><br>
- avoir pris connaissance du fait que cette déclaration est valable deux ans (sauf changement de situation préalable), et qu'il
m'incombe de renouveler cette demande d'inscription à l'issue, en adressant un courrier ou en me présentant à l'accueil de la
Police municipale, ou bien en adressant un courriel à controle-stationnement@ville-pau.fr. Pour faciliter ce renouvellement de
déclaration, j'autorise les services municipaux compétents à m'envoyer un message de rappel de fin d'échéance à l'adresse mail
suivante <b>
<?php echo htmlspecialchars($aficheInscrit['email']); ?>
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
<div style="margin-left:80px;">Monsieur le Maire Pau<br>
Hôtel de Ville<br>
Place Royale<br>
64036 Pau Cedex</div></b><br>
Je peux également, pour des motifs légitimes, m'opposer au traitement des données me concernant.* »<br><br><br>
Fait le 
<?php echo $date_decla; ?>
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