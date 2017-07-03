<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stationnement PESH</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/dropzone.css" rel="stylesheet">
	<link href="css/cedric.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->	
  </head>
<body>
 <!-- header -->
<div class="container-fluid">
	<div class="row" style="text-align:center">
	<div class="col-sm-4"></div>
	<div class="col-sm-2" style="margin:0 auto"><img src="img/logo_100.png" alt="logo PESH"></div>
	<div class="col-sm-2" style="margin:0 auto"><img src="img/logo_pau.png" alt="logo Pau" style="margin-top:10px;"></div>
	<div class="col-sm-4"></div>
	<div class="col-sm-12">
		<h2>Stationnement PESH</h2>
	</div>
</div>
</div>
<!-- fin header -->
<!-- Page 1 (fil d'ariane)
<ul class="steps-progress-bar">
    <li id="first-step" class="active"><p>Inscription</p></li>
    <li id="second-step" class=""><p>Justificatif</p></li>
</ul> 
-->
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
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
					</div>
			  </div>
			  <div class="form-group">
				<label for="nomcontact" class="col-sm-3 control-label">Prénom</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="prenom" placeholder="Prénom" required>
					<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				</div>
			  </div>
			  <div class="form-group">
				<label for="emailcontact" class="col-sm-3 control-label">Adresse courriel</label>
					<div class="col-sm-7">
						 <input type="email" class="form-control" id="emailcontact" placeholder="Adresse électronique" required>
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div> 
					</div>
			  </div>
  
				<div class="form-group">
				<label for="telcontact" class="col-sm-3 control-label">Immatriculation</label>
					<div class="col-sm-7">
						  <input type="text" class="form-control" id="telcontact" placeholder="Plaque d'immatriculation de votre vehicule" required>
						  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
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

<!-- fin formulaire -->
<div class="container-fluid" style="background-color: rgba(255, 255, 255, 0.5);">
	<div class="row" style="margin:16px">
	<div class="col-sm-6" style="text-align:left">
	<h6>Communauté d'Agglomération de Pau 2017</h6>
	</div>
		<div class="col-sm-6" style="text-align:right">
	<img src="img/logo_dn.png">
	</div>
	</div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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