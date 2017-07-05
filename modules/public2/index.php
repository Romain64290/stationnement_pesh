<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Stationnement de la Ville de PAU</title>


    <!-- Bootstrap theme -->
   <!-- A supp si pas utile <link href="vendor/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"> -->
	<link href="css/dropzone.css" rel="stylesheet">
        <link href="css/cedric.css" rel="stylesheet">

        
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
header{
background: #188abc;
}

section.success{
background: #188abc;
}

</style>
</head>

<body id="page-top" class="index">
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
            
<!-- début formulaire (1er bloc) -->
<div class="container picto1">
	<div class="row">
		<div class="col-sm-3"></div>
			<div class="col-sm-7">
				<label class="radio-inline" style="margin-bottom:15px">
				<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="monsieur" checked> Monsieur
				</label>
				<label class="radio-inline" style="margin-bottom:15px">
				<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="madame"> Madame
				</label>
			 </div>
		<form class="form-horizontal" data-toggle="validator">
			  <div class="form-group">
					<label for="nomsociete" class="col-sm-3 control-label">Nom</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="nomsociete" placeholder="Nom" required>
						<span class="glyphicon form-control-feedback" style="margin-right:20px" aria-hidden="true"></span>
					</div>
			  </div>
			  <div class="form-group">
				<label for="nomcontact" class="col-sm-3 control-label">Prénom</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="prenom" placeholder="Prénom" required>
					<span class="glyphicon form-control-feedback" style="margin-right:20px" aria-hidden="true"></span>
				</div>
			  </div>
			  <div class="form-group">
				<label for="emailcontact" class="col-sm-3 control-label">Adresse courriel</label>
					<div class="col-sm-7">
						 <input type="email" class="form-control" id="emailcontact" placeholder="Adresse électronique" required>
						<span class="glyphicon form-control-feedback" style="margin-right:20px"  aria-hidden="true"></span>
						<div class="help-block with-errors"></div> 
					</div>
			  </div>
  
				<div class="form-group">
				<label for="telcontact" class="col-sm-3 control-label">Immatriculation</label>
					<div class="col-sm-7">
						  <input type="text" class="form-control" id="telcontact" placeholder="Plaque d'immatriculation de votre vehicule" required>
						  <span class="glyphicon form-control-feedback" style="margin-right:20px" aria-hidden="true"></span>
					</div>
				</div>
	</div>
</div>
<!-- Formulaire (2ème bloc avec P.J.) -->
<div class="container picto2">
	<div class="row">
    <label for="carte" class="col-sm-3 control-label"></label>
		<div class="col-sm-7">
			<label class="radio" style="margin-bottom:15px">
				<input type="radio" id="Radio1b" name="colorRadio" value="red"> Bénéficiaire carte européenne de stationnement
			</label>
			<label class="radio" style="margin-bottom:15px">
				<input type="radio" id="Radio2b" name="colorRadio" value="green"> Professionnels de santé
			</label>
		    <div class="red box"><h4><span class="label label-info">Documents à transmettre:</span></h4><ul>
				<li >Carte grise</li>
				<li>Carte de stationnement</li>
				</ul>
			</div>
			<div class="green box"><h4><span class="label label-info">Documents à transmettre:</span></h4><ul>
				<li>Carte grise</li>
				<li>Justificatif de qualité professionnelle</li>
			</ul></div>
		</div>
</form>
			<div class="col-sm-3"></div>
				<form action="/file-upload" class="col-sm-7 dropzone">
				<div class="col-sm-7 fallback">
				<input name="fichierafacture" type="file" multiple required>
			 </div>
			 </form>
	</div>
</div>

<br>
<div class="row" style="width:75%;margin:auto;text-align:center">
      <div class="button">
        <button class="btn btn-primary btn-lg" type="submit" style="margin-bottom:36px" >Envoyez</button>
    </div>
</div>


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
                     <div class="col-lg-8 col-lg-offset-2 text-center">
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

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>
    
      
    
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 	<script src="js/validator.js"></script>
	<script src="js/dropzone.js"></script>
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
    

</body>

</html>
