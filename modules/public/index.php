<?php

/***** Dernière modification : 19/07/2017, Romain TALDU	*****/

require(__DIR__ .'/../../include/config.inc.php');

// verifie si la variable $valide existe => demande effectuée
$valide = isset($_GET['valide']) ? $_GET['valide'] : NULL;

// les session permettent de garder en memoire la saisie en cas de demande rejet pour mauvaise plaque d'immatriculation
session_start();
if(!isset($_SESSION['civilite'])){$_SESSION['civilite']=1;}


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
<!-- Theme CSS -->
    <link rel="stylesheet" href="css/freelancer.min.css" >
    
      <link rel="stylesheet" href="../../../plugins/sweetalert2/sweetalert2.min.css">
    
    <link rel="stylesheet" href="css/cedric.css" >

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  
<style>
header{
background: #188abc;
}
section.success{
background: #188abc;
}

.profile-header div {
display: inline-block;
vertical-align: bottom;
float: none;
margin: -2px;
	}

.btn-file {
  position: relative;
  overflow: hidden;
}
.btn-file input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 100%;
  min-height: 100%;
  font-size: 100px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  background: red;
  cursor: inherit;
  display: block;
}
input[readonly] {
  background-color: white !important;
  cursor: text !important;
}
</style>


</head>

<body id="page-top" class="index"  <?php if($valide=="ok"){echo"onload=\"Valide_ok();\"";} ?><?php if($valide=="no"){echo"onload=\"Valide_no();\"";} ?><?php if($valide=="upload"){echo"onload=\"Valide_upload();\"";} ?>>
<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top"><img src="img/logo_pau.png" alt="logo Pau" style="margin-top:-20px;"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                     <li class="page-scroll">
                        <a href="#inscrire">S'inscrire</a>
                    </li>
                    
                    <li class="page-scroll">
                        <a href="#about">Comment ca marche ?</a>
                    </li>
                    
                    <li class="page-scroll">
                        <a href="#contact">Nous Contacter</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="../../include/img/logo_300.png" alt="">
                    <div class="intro-text">
                        <h2 class="name">Stationnement de la Ville de PAU</h2>
                         <!--<hr class="star-light"> -->
                        <span class="skills">Déclaration d'immatriculation dans le système de contrôle automatisé</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="inscrire">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>S'inscrire</h2>
                    <hr class="star-primary">
                </div>
            </div>
            
<form name="formulaire" role="form" class="form-horizontal" data-toggle="validator" action="upload.php" method="post" enctype="multipart/form-data">

    
	<div class="row">
		<div class="col-sm-3"></div>
			<div class="col-sm-7">
				<label class="radio-inline" style="margin-bottom:15px">
				<input type="radio" name="civilite" id="civilite1" value="1" <?php if($_SESSION['civilite']==1)  {echo "checked";} ?>> Monsieur
				</label>
				<label class="radio-inline" style="margin-bottom:15px">
				<input type="radio" name="civilite" id="civilite2" value="2" <?php if($_SESSION['civilite']==2)  {echo "checked";} ?> > Madame
				</label>
			 </div>
		
			  <div class="form-group">
					<label for="nom" class="col-sm-3 control-label">Nom</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php if(isset($_SESSION['nom']))  {echo $_SESSION['nom'];} ?>" required>
						<span class="glyphicon form-control-feedback" style="margin-right:20px" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
					</div>
			  </div>
			  <div class="form-group">
				<label for="prenom" class="col-sm-3 control-label">Prénom</label>
				<div class="col-sm-7">
                                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" value="<?php if(isset($_SESSION['prenom']))  {echo $_SESSION['prenom'];} ?>" required>
					<span class="glyphicon form-control-feedback" style="margin-right:20px" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
				</div>
			  </div>
			  <div class="form-group">
				<label for="email" class="col-sm-3 control-label">Adresse courriel</label>
					<div class="col-sm-7">
						 <input type="email" class="form-control" id="email" name="email" placeholder="Adresse électronique" value="<?php if(isset($_SESSION['email']))  {echo $_SESSION['email'];} ?>" required>
						<span class="glyphicon form-control-feedback" style="margin-right:20px"  aria-hidden="true"></span>
						<div class="help-block with-errors"></div> 
					</div>
			  </div>
  
				<div class="form-group">
				<label for="immatriculation" class="col-sm-3 control-label">Immatriculation</label>
					<div class="col-sm-7">
						  <input type="text" class="form-control" id="immatriculation" name="immatriculation" placeholder="Plaque d'immatriculation de votre vehicule" value="<?php if(isset($_SESSION['immatriculation']))  {echo $_SESSION['immatriculation'];} ?>" required>
						  <span class="glyphicon form-control-feedback" style="margin-right:20px" aria-hidden="true"></span>
                                                  <div class="help-block with-errors"></div>
					</div>
				</div>
	</div>




<label for="type_decla" class="col-sm-3 control-label">Documents à transmettre</label>
		<div class="col-sm-7">
                     <div class="form-group">
			<label class="radio" style="margin-bottom:15px;margin-left:20px;">
				<input type="radio"  name="type_decla" value="pmr" required> Bénéficiaire carte européenne de stationnement
			</label>
			<label class="radio" style="margin-bottom:15px;margin-left:20px;">
				<input type="radio"  name="type_decla" value="pro" required> Professionnels de santé
			</label>
		    <div class="pmr box"><h4><span class="label label-info">Documents à transmettre:</span></h4><ul>
				<li >Document 1 : Carte grise</li>
				<li>Document 2 : Carte de stationnement</li>
				</ul>
			</div>
			<div class="pro box"><h4><span class="label label-info">Documents à transmettre:</span></h4><ul>
				<li>Document 1 : Carte grise</li>
				<li>Document 2 : Justificatif de qualité professionnelle</li>
			</ul></div>
		</div></div>

			<div class="col-sm-3"></div>
				
				<div class="col-sm-7">
		  <div class="input-group">
                <span class="input-group-btn">
                  <span class="btn btn-primary btn-file">Document 1 &hellip; <input type="file" name="upload1" id="upload1" required accept="application/pdf,image/*">
                  </span>
                </span>
                      <input type="text" class="form-control" readonly placeholder="5 Mo max par fichier">
                  </div><br>
                                     <div class="input-group">
                <span class="input-group-btn">
                  <span class="btn btn-primary btn-file">Document 2 &hellip; <input type="file" name="upload2" id="upload2" required accept="application/pdf,image/*">
                  </span>
                </span>
                                         <input type="text" class="form-control" readonly placeholder="5 Mo max par fichier">
            </div>
                  <div class="alert alert-block alert-danger" id="upload_div" style="display:none">
      <strong>Attention !</strong>  Vous devez transmettre des documents ! 
       </div>
			 </div>
	</div>

    
        
    
    
<br>
<div class="row" style="width:75%;margin:auto;text-align:center">
   <!--  <div style="color:red"align="center"> Taille maximale :  5 Mo par fichier </div><br><br> -->
      <div class="button">
        <button class="btn btn-primary btn-lg" type="submit" style="margin-bottom:36px" >Envoyer</button>
    </div>
</div>

</form>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Comment ça marche ?</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p align="justify">La Ville de Pau met en place un système automatisé de contrôle du stationnement. Ce système permettra notamment de lutter plus efficacement contre l'utilisation frauduleuse des cartes de stationnement réservées aux personnes à mobilité réduite.</p>
                </div>
                <div class="col-lg-4">
                    <p align="justify" >Afin de pouvoir être identifié comme titulaire de la carte européenne de stationnement, de la carte mobilité inclusion(CMI) ou professionnel de santé  nous vous invitons à déclarer le numéro d'immatriculation de votre véhicule qui sera alors prise en compte dans le système de contrôle pour une période de 2 ans.</p>
                </div>
                     <div class="col-lg-8 col-lg-offset-2 text-center page-scroll">
                    <a href="#inscrire" class="btn btn-lg btn-outline">
                         S'inscrire
                    </a>
                </div>
                           </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Nous contacter</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                      <div class="footer-above">
            <div class="container">
                <div class="row" align="center">
                    <br>
                        <h3>Direction Prévention et Sécurité Publique <br> de la ville de Pau</h3>
                        <br> <p align="center">Police  municipale
                            <br>1 bis rue Lapouble 
                            <br> 64000 Pau
                            <br> <a href="mailto:controle-stationnement@ville-pau.fr">controle-stationnement@ville-pau.fr</a>
                        <br><br> <br><img src="img/picto01.png" alt="" >&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/picto02.png" alt="logo Pau" ><br></p>
                 
                </div>
            </div>
        </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
  
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright 2017 &copy; Communauté d’agglomération Pau Béarn Pyrénées / Direction du numérique

                    </div>
                </div>
            </div>
        </div>
    </footer>

        
    
    
 

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>


    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>
    
    <script src="../../../plugins/sweetalert2/sweetalert2.min.js"></script>
    
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 	<script src="../../include/js/validator.js"></script>
	
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
	
<!-- Pour afficher texte quand clic bouton radio -->
<script type="text/javascript">
            
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>

 <script type="text/javascript">


   $("form").on("submit", function() {

$erreur="no";

      if($('#upload1').val()<1 && $('#upload2').val()<1) {
      	
		
        $("div.form-group").addClass("has-error");

        $("#upload_div").show("slow").delay(6000).hide("slow");
        
         $erreur="ok";}

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


function Valide_ok() {
  	  
  swal({
  title: 'Demande d\'inscription enregistrée !',
  text: "Vous serez informé(e) email du traitement de votre demande.",
  type: 'success',

})
    
 }  
 
 function Valide_upload() {
  	  
  swal({
  title: 'Demande d\'inscription refusée !',
  text: "Un problème est survenu dans le transfert de fichiers.",
  type: 'error',

})
    
 }
 


function Valide_no() {
  	  
  swal({
  title: 'Demande d\'inscription refusée !',
  text: "La plaque d'immatriculation saisie n'est pas conforme.",
  type: 'error',

})
    
 } 
</SCRIPT>
    

</body>

</html>