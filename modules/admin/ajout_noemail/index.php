<?php

/***** Dernière modification : 08/09/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
$menu=4;
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');


// préparation connexion
$connect = new connection();
$ajout_noemail = new ajout_noemail($connect);

// verifie si la variable $valide existe => demande effectuée
$valide = isset($_GET['valide']) ? $_GET['valide'] : NULL;

// les session permettent de garder en memoire la saisie en cas de demande rejet pour mauvaise plaque d'immatriculation

if(!isset($_SESSION['civilite'])){$_SESSION['civilite']=1;}
if(!isset($_SESSION['type_decla'])){$_SESSION['type_decla']=1;}

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
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.css">
     <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../plugins/font-awesome-4.6.3/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../../plugins/ionicons-2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
   
    <link rel="stylesheet" href="../../../dist/css/skins/skin-blue.min.css">
     <!-- DataTables -->
    <link rel="stylesheet" href="../../../plugins/datatables/dataTables.bootstrap.css">
    
     <link rel="stylesheet" href="../../../plugins/sweetalert2/sweetalert2.min.css">
    
    
    
 <style>
     
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
 
  <body class="hold-transition skin-blue sidebar-mini" <?php if($valide=="ok"){echo"onload=\"Valide_ok();\"";}  if($valide=="no"){echo"onload=\"Valide_no();\"";} if($valide=="upload"){echo"onload=\"Valide_upload();\"";} ?>> 	

  	
    	
<?php
require(__DIR__ .'/../../../include/main_header.php');
require(__DIR__ .'/../../../include/main_slidebar.php');
?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Ajout d'usager n'ayant pas d'adresse email
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-user"></i> Accueil</a></li>
            <li class="active">  Ajout Usager</li>
          </ol>
          
        </section>

      



  	<!-- Main content -->
        <section class="content">
        	
     
 <div class="box box-primary">
      <form name="formulaire" role="form" data-toggle="validator" action="upload.php" method="post" enctype="multipart/form-data">
 
          <div class="box-body">
           
           
            <div class="row">
            
             <div class="col-md-2">
           
             	
                <div class="form-group has-feedback">
              <div class="input-group">
    <span class="input-group-addon">
    <span class="fa fa-venus-mars"></span>
 	 </span>
           	 <select name="civilite" class="form-control" required  data-error="Veuillez choisir votre civilité">
                <option value="" selected disabled="disabled">Civilité</option>
                <option value="1" <?php if($_SESSION['civilite']==1)  {echo "checked";} ?>>Monsieur</option>
                <option value="2"<?php if($_SESSION['civilite']==2)  {echo "checked";} ?>>Madame</option>
            </select>            
            
          </div> <div class="help-block with-errors"></div></div></div>
              	
              	 <div class="col-md-5">
          <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-user"></span>
 	 </span>
     <input type="text" class="form-control" placeholder="Nom" required name="nom" data-error="Veuillez saisir votre nom" value="<?php if(isset($_SESSION['nom']))  {echo $_SESSION['nom'];} ?>"> </div>  
     <div class="help-block with-errors"></div>
  
     </div> </div>     
          
           <div class="col-md-5">
          <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-user"></span>
 	 </span>
     <input type="text" class="form-control" placeholder="Prénom" required name="prenom" data-error="Veuillez saisir votre prénom" value="<?php if(isset($_SESSION['prenom']))  {echo $_SESSION['prenom'];} ?>"> </div>  
     <div class="help-block with-errors"></div>
   
     </div> </div>        
               
			 </div>	
                  
                            <div class="row">
            
             <div class="col-md-3">
           
             	
                <div class="form-group has-feedback">
              <div class="input-group">
    <span class="input-group-addon">
    <span class="fa fa-user"></span>
 	 </span>
           	 <select name="type_decla" class="form-control" required  data-error="Veuillez choisir le type de demande">
                <option value="" selected disabled="disabled">Type d'usager</option>
                <option value="1" <?php if($_SESSION['type_decla']==1)  {echo "checked";} ?>>PMR</option>
                <option value="2" <?php if($_SESSION['type_decla']==2)  {echo "checked";} ?>>PRO</option>
            </select>                      
            
          </div> <div class="help-block with-errors"></div></div></div>
              	
              	 <div class="col-md-9">
                     
                                 
  <div class="form-group has-feedback">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-car"></i>
                  </div>
                  <input class="form-control" type="text"  placeholder="Plaque d'immatriculation" required name="immatriculation" data-error="Veuillez saisir une plaque d'immatriculation" value="<?php if(isset($_SESSION['immatriculation']))  {echo $_SESSION['immatriculation'];} ?>"> </div>
                   <div class="help-block with-errors"></div>
</div>
         </div>     
          
                
               
			 </div>	
                  
                  
    <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-phone"></span>
 	 </span>
     <input type="text" class="form-control" placeholder="Téléphone" required name="telephone" data-error="Veuillez saisir votre numéro de téléphone" value="<?php if(isset($_SESSION['telephone']))  {echo $_SESSION['telephone'];} ?>"></div>  
     <div class="help-block with-errors"></div>
   
     </div>         
          
  
          
 
          
          
 <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-home"></span>
 	 </span>
   <input type="text" class="form-control" placeholder="Adresse" required name="adresse" data-error="Veuillez saisir votre adresse postale" value="<?php if(isset($_SESSION['adresse']))  {echo $_SESSION['adresse'];} ?>"> 
   
     </div>
     
       <div class="help-block with-errors"></div>
     
      
     </div> 
                  
                  
                  
                  
                    
            <div class="row">
            
             <div class="col-md-3">
           
             	
                <div class="form-group has-feedback">
              <div class="input-group">
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-home"></span>
 	 </span>
           	<input type="text" class="form-control" placeholder="Code postal" required name="cp" data-error="Veuillez saisir un code postal" value="<?php if(isset($_SESSION['cp']))  {echo $_SESSION['cp'];} ?>">            
            
          </div> <div class="help-block with-errors"></div></div></div>
              	
              	 <div class="col-md-9">
          <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-home"></span>
 	 </span>
     <input type="text" class="form-control" placeholder="Ville" required name="ville" data-error="Veuillez saisir une commune" value="<?php if(isset($_SESSION['ville']))  {echo $_SESSION['ville'];} ?>"> </div>  
     <div class="help-block with-errors"></div>
  
     </div> </div>     
          
                
               
			 </div>	
         

               
    
                  
                  
                            <div class="row">
            
             <div class="col-md-6">
           
             	
                <div class="form-group has-feedback">
                     <div class="input-group">
              <span class="input-group-btn">
                  <span class="btn btn-default btn-file">Carte grise &hellip; <input type="file" name="upload1" id="upload1" required accept="application/pdf,image/*">
                  </span>
                </span>
                      <input type="text" class="form-control" readonly placeholder="5 Mo max par fichier"></div></div>
                      
         <div class="alert alert-block alert-danger" id="upload_div" style="display:none">
      <strong>Attention !</strong>  Vous devez transmettre des documents ! 
       </div>    
             
             </div>
              	
 <div class="col-md-6">
           
                        <div class="form-group has-feedback">
                     <div class="input-group">
              <span class="input-group-btn">
                  <span class="btn btn-default btn-file">Justificatif &hellip; <input type="file" name="upload2" id="upload2" required accept="application/pdf,image/*">
                  </span>
                </span>
                      <input type="text" class="form-control" readonly placeholder="5 Mo max par fichier"></div></div>
                      
  
 
 </div>           	
	              
                
             </div>
              <!-- /.box-body -->
              <!-- /.box-body -->
              <div class="box-footer">
              	 <button type="reset" class="btn btn-default" ><i class="fa fa-arrow-circle-left"></i> Annuler</button>  
                <button type="submit" class="btn btn-primary" ><i class="fa fa-floppy-o"></i> &nbsp; Créer l'utilisateur</button>
              </div>
            </form>
              </div>
    
                     	 </div> 
              

            
            
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
   
 <?php require(__DIR__ .'/../../../include/footer_back.php'); ?>
   
	
  	
<!-- jQuery 2.2.3 -->
<script src="../../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../../bootstrap/js/bootstrap.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="../../../plugins/chartjs/Chart.js"></script>
<!-- FastClick -->
<script src="../../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/app.min.js"></script>  
<!-- Datatable -->
<script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../../plugins/datatables/dataTables.bootstrap.min.js"></script>

 <script src="../../../plugins/sweetalert2/sweetalert2.min.js"></script>
    
     
 <script src="../../../include/js/validator.js"></script>
	

 
   <script>

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
        
   </script>

</body>
</html>