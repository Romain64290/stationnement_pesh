<?php

/***** Dernière modification : 27/09/2016, Romain TALDU	*****/

require(__DIR__ .'/../../include/config.inc.php');
require(__DIR__ .'/../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');

$id_user=$_GET['id_user'];
$id_reunion=$_GET['id_reunion'];
$email=$_GET['email'];

// préparation connexion
$connect = new connection();
$front= new front($connect);

$front->supprimeInscription($id_user,$id_reunion,$email);

?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo constant("TITLE"); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../include/css/bootstrap.css">
        <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
     <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/font-awesome-4.6.3/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../plugins/ionicons-2.0.1/css/ionicons.min.css">

   

<style>
	.profile-header div {
	display: inline-block;
	vertical-align: bottom;
	float: none;
	margin: -2px;
	}
	footer {
	font-size:12px;
	color:#555;
    display: block;
	background-color:#eee;
	padding:6px;
	margin-top:80px;
	}
</style>

</head>


<body>
	
<div class="container">
<img src="../../include/img/bgBandeauHaut.png" class="img-responsive" align="right">
		<div class="page-header">
		<div class="row profile-header">
  <div class="col-md-2"><img src="../../include/img/lombric80.png" class="img-responsive"></div>
  <div class="col-md-10"><p class="text-left"><h2>Réunions d'information sur le compostage</h2></p></div>
		</div>
		</div>
	
 <div class="row">
 <div class="col-md-3">
 </div>

 <div class="col-md-6">
 	
 	<br><br>
 	
<div class="box box-solid box-success">
  <div class="box-header with-border">
  	<span class='glyphicon glyphicon-ok'></span>
    <h3 class="box-title">Confirmation de votre désinscription</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->

    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    Nous vous confirmons votre désinscription à la reunion suivante : <br>

 	<?php   
 	
$infoReunion=$front->infosReunion($id_reunion);
 	
 	 $date_reunion=$infoReunion['date_reunion'];
		 $nom_commune=$infoReunion['nom_commune'];
		 $adresse=htmlspecialchars($infoReunion['adresse']);
		 $lien_map=htmlspecialchars($infoReunion['lien_map']);
	
	
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
		 
echo"<b>Reunion le $date_debut[2] $date_mois[1] à $heure - $nom_commune - $adresse  </b><a href=\"$lien_map\" target=\"_blank\"> (voir l'adresse sur Google Map)</a>";

?>    
   

    
      </div><!-- /.box-body 

</div><!-- /.box -->
</div>



 <div class="col-md-3">
 </div>
 </div>



        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
  	
 

 <footer>
Réalisé par le Service Développements et Innovations Numériques - 2016
</footer>
 </div>
   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    
     <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
     <script src="../../plugins/jquery-ui-1.11.4/jquery-ui.min.js"></script>


 

  </body>
</html>
