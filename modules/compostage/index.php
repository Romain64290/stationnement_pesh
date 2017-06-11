<?php

/***** Dernière modification : 08/09/2016, Romain TALDU	*****/

require(__DIR__ .'/../../include/config.inc.php');

require(__DIR__ .'/../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');


// préparation connexion
$connect = new connection();
$front= new front($connect);

if(isset($_POST['nom'])){$nom=$_POST['nom'];}else{$nom="";};
if(isset($_POST['prenom'])){$prenom=$_POST['prenom'];}else{$prenom="";};
if(isset($_POST['commune'])){$id_commune=$_POST['commune'];}else{$id_commune="";};
if(isset($_POST['adresse'])){$adresse=$_POST['adresse'];}else{$adresse="";};
if(isset($_POST['email'])){$email=$_POST['email'];}else{$email="";};
if(isset($_POST['telephone'])){$telephone=$_POST['telephone'];}else{$telephone="";};

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
	
<h3><p class="bg-success">&nbsp; Inscription individuelle</p></h3>

	<form class="form-horizontal" data-toggle="validator" action="ajout_user.php" method="post" name="formulaire">
	
			
			
  <div class="form-group">
    <label for="nom" class="col-sm-3 control-label">Nom</label>
    <div class="col-sm-5">
	<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required value="<?php echo $nom; ?>">
	  <span class="glyphicon form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div> 
    </div>
    
  </div>
  <div class="form-group">
    <label for="prenom" class="col-sm-3 control-label">Prénom</label>
    <div class="col-sm-5">
	<input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required value="<?php echo $prenom; ?>">
	  <span class="glyphicon form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div> 
    </div>
    
  </div>
  
  <div class="form-group">
    <label for="adresse" class="col-sm-3 control-label">Adresse</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="adresse" placeholder="Adresse" required value="<?php echo $adresse; ?>">
	  <span class="glyphicon form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div> 
    </div>
  </div>
    <div class="form-group">
    <label for="commune" class="col-sm-3 control-label">Commune</label>
    <div class="col-sm-5">
<select class="form-control" name="commune" id="commune" required>
  <option value="" selected disabled="disabled">Votre commune</option>
  		
	<option value="15" <?php if($id_commune==15){echo"selected";}?>>Arbus</option>
   <option value="16" <?php if($id_commune==16){echo"selected";}?>>Aressy</option>
  	<option value="1" <?php if($id_commune==1){echo"selected";}?>>Artigueloutan</option>
  	<option value="17" <?php if($id_commune==17){echo"selected";}?>>Artiguelouve</option>
  	<option value="18" <?php if($id_commune==18){echo"selected";}?>>Aubertin</option>
  	<option value="19" <?php if($id_commune==19){echo"selected";}?>>Ausevielle</option>
  	<option value="20" <?php if($id_commune==20){echo"selected";}?>>Beyrie-en-Béarn</option>
	<option value="2" <?php if($id_commune==2){echo"selected";}?>>Billère</option>
	<option value="3" <?php if($id_commune==3){echo"selected";}?>>Bizanos</option>
	<option value="21" <?php if($id_commune==21){echo"selected";}?>>Bosdarros</option>
	<option value="22" <?php if($id_commune==22){echo"selected";}?>>Bougarber</option>
	<option value="23" <?php if($id_commune==23){echo"selected";}?>>Denguin</option>
	<option value="4" <?php if($id_commune==4){echo"selected";}?>>Gan</option>
	<option value="5" <?php if($id_commune==5){echo"selected";}?>>Gelos</option>
	<option value="6" <?php if($id_commune==6){echo"selected";}?>>Idron</option>
	<option value="7" <?php if($id_commune==7){echo"selected";}?>>Jurançon</option>
	<option value="24" <?php if($id_commune==24){echo"selected";}?>>Laroin</option>
	<option value="8" <?php if($id_commune==8){echo"selected";}?>>Lée</option>
	<option value="9" <?php if($id_commune==9){echo"selected";}?>>Lescar</option>
	<option value="10" <?php if($id_commune==10){echo"selected";}?>>Lons</option>
	<option value="11" <?php if($id_commune==11){echo"selected";}?>>Mazères-Lezons</option>
	<option value="25" <?php if($id_commune==25){echo"selected";}?>>Meillon</option>	
	<option value="12" <?php if($id_commune==12){echo"selected";}?>>Ousse</option>	
	<option value="13" <?php if($id_commune==13){echo"selected";}?>>Pau</option>
	<option value="26" <?php if($id_commune==26){echo"selected";}?>>Poey-de-Lescar</option>
	<option value="27" <?php if($id_commune==27){echo"selected";}?>>Rontignon</option>
	<option value="28" <?php if($id_commune==28){echo"selected";}?>>Saint-Faust</option>
	<option value="14" <?php if($id_commune==14){echo"selected";}?>>Sendets</option>	
	<option value="29" <?php if($id_commune==29){echo"selected";}?>>Siros</option>
	<option value="30" <?php if($id_commune==30){echo"selected";}?>>Uzein</option>
	<option value="31" <?php if($id_commune==31){echo"selected";}?>>Uzos</option>		
	
		
</select><div class="help-block with-errors"></div> 
    </div>
   
	</div>
  <div class="form-group">
    <label for="email" class="col-sm-3 control-label">email</label>
    <div class="col-sm-5">
      <input type="email" class="form-control" name="email" placeholder="Adresse email" required value="<?php echo $email; ?>"><small>Votre adresse email ne sera pas utilisée à des fins publicitaires	</small>
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
	<div class="help-block with-errors"></div> 
 </div>
  </div>
      <div class="form-group">
    <label for="telephone" class="col-sm-3 control-label">Téléphone</label>
    <div class="col-sm-5">
      <input type="tel" class="form-control" name="telephone" placeholder="Téléphone" required value="<?php echo $telephone; ?>">
	  <span class="glyphicon form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div> 
    </div>
  </div>
  <br>
  <h3><p class="bg-success">&nbsp; Choisir sa réunion d'information</p></h3>
      <div class="form-group">
    <label class="col-sm-3 control-label"></label>
	<div class="col-sm-5">
		
		
	
	  <!-- Tab panes -->
	<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#maison" aria-controls="maison" role="tab" data-toggle="tab" onfocus="this.blur()" onclick="this.blur()">Maison avec jardin</a></li>
    <li role="presentation"><a href="#appartement" aria-controls="profile" role="appartement" data-toggle="tab" onfocus="this.blur()" onclick="this.blur()">Appartement</a></li>
  </ul>

  <div class="tab-content">
  	
 <div role="tabpanel" class="tab-pane fade in active" id="maison" name="maison">
 <b>Choix de la date de la réunion</b>
<select class="form-control" size="6" onchange="change_appartement()" name="maison2" id="maison2">

<?php 
	
// Si l'utilisateur a selectionné sa commune tu affiche les possiblite
if($id_commune!=""){
		
$Maison=$front->afficheReunionMaison($id_commune); 
	
if (!$Maison){echo"<option disabled >Aucune date de programmée pour cette commune</option>";}

foreach($Maison as $key){
			
		 $id_reunion=$key->id_reunion;
		 $date_reunion=$key->date_reunion;
		 $nom_commune=$key->nom_commune;
		 $adresse=htmlspecialchars($key->adresse);
	
	
$date_expl=explode(" ",$date_reunion);
$heure=explode(":",$date_expl[1]);
$heure=$heure[0].":".$heure[1];
$date_debut=explode("-",$date_expl[0]);
		 
switch ($date_debut[1]) {
	case '1': $date_mois[1]="Janv.";break;
	case '2': $date_mois[1]="Fév.";break;
	case '3': $date_mois[1]="Mars";break;
	case '4': $date_mois[1]="Avril";break;
	case '5': $date_mois[1]="Mai";break;
	case '6': $date_mois[1]="Juin";break;
	case '7': $date_mois[1]="Juillet";break;
	case '8': $date_mois[1]="Août";break;
	case '9': $date_mois[1]="Sept.";break;
	case '10': $date_mois[1]="Oct.";break;
	case '11': $date_mois[1]="Nov.";break;
	case '12': $date_mois[1]="Déc.";break;
	
}		
		 
echo"<option value=\"".$id_reunion."_$date_debut[2]/$date_debut[1]/$date_debut[0]\">$date_debut[2] $date_mois[1] à $heure - $nom_commune - $adresse</option>";
}

}else{echo"<option disabled >Veuillez choisir une commune pour voir les dates</option>";}

 ?>  
  
</select>
<br>

</div>



    <div role="tabpanel" class="tab-pane fade" id="appartement" name="appartement">
    	 <b>Choix de la date de la réunion</b>
<select class="form-control" size="4" onchange="change_maison()" name="appartement2" id="appartement2">
<?php
// Si l'utilisateur a selectionné sa commune tu affiche les possiblite
if($id_commune!=""){
		
$Appartement=$front->afficheReunionAppartement($id_commune); 
	
if (!$Appartement){echo"<option disabled >Aucune date de programmée pour cette commune</option>";}


foreach($Appartement as $key){
			
		 $id_reunion=$key->id_reunion;
		 $date_reunion=$key->date_reunion;
		 $nom_commune=$key->nom_commune;
		 $adresse=htmlspecialchars($key->adresse);
	
	
$date_expl=explode(" ",$date_reunion);
$heure=explode(":",$date_expl[1]);
$heure=$heure[0].":".$heure[1];
$date_debut=explode("-",$date_expl[0]);
		 
switch ($date_debut[1]) {
	case '1': $date_mois[1]="Janv.";break;
	case '2': $date_mois[1]="Fév.";break;
	case '3': $date_mois[1]="Mars";break;
	case '4': $date_mois[1]="Avril";break;
	case '5': $date_mois[1]="Mai";break;
	case '6': $date_mois[1]="Juin";break;
	case '7': $date_mois[1]="Juillet";break;
	case '8': $date_mois[1]="Août";break;
	case '9': $date_mois[1]="Sept.";break;
	case '10': $date_mois[1]="Oct.";break;
	case '11': $date_mois[1]="Nov.";break;
	case '12': $date_mois[1]="Déc.";break;
	
}		
		 
echo"<option value=\"".$id_reunion."_$date_debut[2]/$date_debut[1]/$date_debut[0]\">$date_debut[2] $date_mois[1] à $heure - $nom_commune - $adresse</option>";
}

}else{echo"<option disabled >Veuillez choisir une commune pour voir les dates</option>";}

 ?>  
 </select><br>
 
<b>Choix de la couleur du composteur</b>
<select class="form-control" size="4" name="couleur" id="couleur">
  <option value="vert">Vert anis</option>
  <option value="noir">Noir</option>
  <option value="beige">Beige</option>
  <option value="framboise">Framboise</option>
</select>
 <br>

	</div>
	
	   </div>
	   	   
	   <div class="alert alert-block alert-danger" id="collectivite_div" style="display:none">
      <strong>Attention !</strong>  Vous devez choisir une date de réunion ! 
       </div>
       <div class="alert alert-block alert-danger" id="couleur_div" style="display:none">
      <strong>Attention !</strong>  Vous devez choisir une couleur pour votre lombricomposteur ! 
       </div>
	   

	
		<br>
		
	
					<div class="button">
					<button class="btn btn-success btn-sm" type="submit">Valider</button>
					</div>

</div>

</div> <!-- fin row-->
</form>
</div> <!-- fin container-->
<footer>
Réalisé par le Service Développements et Innovations Numériques - 2016
</footer>
   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    
     <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
     <script src="../../plugins/jquery-ui-1.11.4/jquery-ui.min.js"></script>
	<!-- Validateur de formulaire -->
     <script src="../../include/js/validator.js"></script>
	







<script type="text/javascript">
 
function change_maison()
{  document.getElementById('maison2').selectedIndex = -1;  }


function change_appartement()
{ document.getElementById('appartement2').selectedIndex = -1; 
  document.getElementById('couleur').selectedIndex = -1; }






$(function(){
	 $("#commune").change(function(){
  
    document.formulaire.action = "index.php";
    document.formulaire.method = "POST";
	document.formulaire.submit()   
  });
	

    $("form").on("submit", function() {

$erreur="no";

      if($('#maison2').val()<1 && $('#appartement2').val()<1) {
      	
		
        $("div.form-group").addClass("has-error");

        $("#collectivite_div").show("slow").delay(4000).hide("slow");
        
         $erreur="ok";

     														 }
     														 
     if( !$('#appartement2').val()<1 && $('#couleur').val()<1) {
     	   $("div.form-group").addClass("has-error");

        $("#couleur_div").show("slow").delay(4000).hide("slow");
         $erreur="ok";

     														 }
      
 	
 		
if($erreur=="ok"){return false;}
   										 });
   										 
 								 

 					 });
  



$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
        
    });
      
    
    
    
    
});



</SCRIPT>
    	
  </body>
</html>
