<?php

/***** Dernière modification : 08/09/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
$menu=2;
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');


// préparation connexion
$connect = new connection();
$export = new export($connect);

$etatExport=$export->etatExport();

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
           Export AFS2R
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-external-link"></i> Accueil</a></li>
            <li class="active">  Export AFS2R</li>
          </ol>
          
        </section>

      



  	<!-- Main content -->
        <section class="content">
        	
     
 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title" >Exportation vers le logiciel AFS2R</h3>
                <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div><!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
         
              
                  <h3><u> Etape 1 :  Générer le fichier d'export </u></h3>
                
                  Téléchargez le fichier et importez le dans le logciel AFS2R.<br>
                  <u>Remarque :</u> Lorsque cette étape est activée, il est impossible pour les autres utilsateurs de modifier les demandes en cours.
                  <br> <br>
                  
                 

                  <button type="button" class="btn btn-primary" onclick="location.href='export.php?export=encours';"><i class="fa fa-download"></i> &nbsp; Télécharger le fichier *.xls</button>
     
        

                 
                  
                  <br><br>
              <h3><u>Etape 2 : Finaliser l'export</u></h3>
              Si l'export dans le logiciel métier s'est correctement déroulé vous pouvez archiver les demandes validées, sinon vous pouvez annuler l'export pour re-essayer ultérieurement.<br><br>
              
              <button type="button" class="btn btn-danger" 
                  <?php  if($etatExport==0){echo "disabled=`\"true\"";} ?>
                      onclick="location.href='export.php?export=abort';">Annuler l'export </button> &nbsp;&nbsp;&nbsp;&nbsp;   
                      
              <button type="button" class="btn btn-success" 
                  <?php  if($etatExport==0){echo "disabled=`\"true\"";} ?>
                      onclick="location.href='export.php?export=ok';">Valider l'export</button>   <br><br>
                
                
      

  <strong>Attention!</strong> Si vous avez réalisé l'etape 1, mais que le bouton "valider l'export" reste désactivé, veuillez réactualiser la page.
<br>
        
              </div>
    
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