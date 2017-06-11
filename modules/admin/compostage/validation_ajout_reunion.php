
<?php

/***** Dernière modification : 24/08/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
//include("../../../include/verif_droits.php");
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');

// préparation connexion
$connect = new connection();
$compostage = new compostage($connect);

$result=$compostage->ajoutReunion($_POST['type_reunion'],$_POST['date'],$_POST['heure_debut'],$_POST['adresse'],$_POST['ville'],$_POST['lien_map'],$_POST['reunion_ouverte'],$_POST['limite'],$_POST['animateur']);

$menu=2;
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
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
     <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../plugins/font-awesome-4.6.3/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../../plugins/ionicons-2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
   
    <link rel="stylesheet" href="../../../dist/css/skins/skin-blue.min.css">
    
 
    



  </head>
 
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    	
<?php
require(__DIR__ .'/../../../include/main_header.php');
require(__DIR__ .'/../../../include/main_slidebar.php');
?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Ajout d'une réunion
            
          </h1>
          <ol class="breadcrumb">
              <li><a href="../dashboard/index.php"><i class="fa fa-calendar"></i> Accueil</a></li>
            <li class="active">Ajout d'une réunion</li>
          </ol>
        </section>

      



  	<!-- Main content -->
        <section class="content">
        	
        	<br> 	<br>
          <div class="row">
             <div class="col-md-1">
             	</div>
            <div class="col-md-8">
             
               	
               	
            
               	



<div class="box box-solid box-success">
  <div class="box-header with-border">
  	<span class='glyphicon glyphicon-ok'></span>
    <h3 class="box-title">Confirmation d'enregistrement</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->

    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    Réunion enregistrée avec succès !
    
      </div><!-- /.box-body -->

</div><!-- /.box -->

 

              
          



            </div><!-- /.col -->
           <div class="col-md-3">
             	</div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
   
 <?php require(__DIR__ .'/../../../include/footer_back.php'); ?>
   
   
    <!-- REQUIRED JS SCRIPTS -->
    <!-- jQuery 2.1.4 -->
    <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../../bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/app.min.js"></script>
    
    <!-- jQuery UI 1.11.4 -->
     <script src="../../../plugins/jquery-ui-1.11.4/jquery-ui.min.js"></script>
 

  </body>
</html>
