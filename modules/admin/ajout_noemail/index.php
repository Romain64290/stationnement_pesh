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

   
  </head>
 
  <body class="hold-transition skin-blue sidebar-mini" >
  	
  	
  	
    	
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
      <form name="inscriptionForm"  id="inscriptionForm" role="form" data-toggle="validator" action="validation_ajout_newuser.php" method="post" data-disable="false">
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
                <option value="1">Monsieur</option>
                <option value="2">Madame</option>
            </select>            
            
          </div> <div class="help-block with-errors"></div></div></div>
              	
              	 <div class="col-md-5">
          <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-user"></span>
 	 </span>
     <input type="text" class="form-control" placeholder="Nom" required name="nom" data-error="Veuillez saisir votre nom"> </div>  
     <div class="help-block with-errors"></div>
  
     </div> </div>     
          
           <div class="col-md-5">
          <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-user"></span>
 	 </span>
     <input type="text" class="form-control" placeholder="Prénom" required name="prenom" data-error="Veuillez saisir votre prénom"> </div>  
     <div class="help-block with-errors"></div>
   
     </div> </div>        
               
			 </div>	
    <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-phone"></span>
 	 </span>
     <input type="text" class="form-control" placeholder="Téléphone" required name="telephone" data-error="Veuillez saisir votre numéro de téléphone"></div>  
     <div class="help-block with-errors"></div>
   
     </div>         
          
  
          
 
          
          
 <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-home"></span>
 	 </span>
   <input type="text" class="form-control" placeholder="Adresse" required name="adresse" data-error="Veuillez saisir votre adresse postale"> 
   
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
           	<input type="text" class="form-control" placeholder="Code postal" required name="cp" data-error="Veuillez saisir un code postal">            
            
          </div> <div class="help-block with-errors"></div></div></div>
              	
              	 <div class="col-md-9">
          <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-home"></span>
 	 </span>
     <input type="text" class="form-control" placeholder="Ville" required name="ville" data-error="Veuillez saisir une commune"> </div>  
     <div class="help-block with-errors"></div>
  
     </div> </div>     
          
                
               
			 </div>	
         
            
  <div class="form-group has-feedback">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input class="form-control" type="text" pattern="^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$" placeholder="Date de naissance : DD/MM/YYYY" required name="naissance" data-error="Veuillez saisir votre date de naissance"> </div>
                   <div class="help-block with-errors"></div>
</div>

  
                
             </div>
              <!-- /.box-body -->
              <!-- /.box-body -->
              <div class="box-footer">
              	 <button type="button" class="btn btn-default" onclick="window.location.href='../dashboard/index.php'"><i class="fa fa-arrow-circle-left"></i> Annuler</button>  
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
 
   <script>
  $('#liste_usagers').DataTable({
         "stateSave": true,
         "stateDuration": 60 * 3,
          "ordering": false,
           "paging":   true,
           "language": {
            "lengthMenu": "_MENU_  enregistrements par page",
            "zeroRecords": "Désolé, aucun résultat trouvé.",
            "info": "Affichage page _PAGE_ sur _PAGES_",
            "infoEmpty": "Aucun enregistrement disponible",
            "infoFiltered": "(filtered from _MAX_ total records)",
             "search": "Recherche",
             "paginate": {
       			 "first":      "First",
       			 "last":       "Last",
        		 "next":       "Suivant",
        		 "previous":   "Précédent"
  				  },
         
        }
    });
   	
   </script>

</body>
</html>