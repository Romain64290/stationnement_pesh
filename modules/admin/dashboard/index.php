<?php

/***** Dernière modification : 08/09/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
$menu=1;
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');


// préparation connexion
$connect = new connection();
$dashboard = new dashboard($connect);



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
           Tableau de bord
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-user"></i> Accueil</a></li>
            <li class="active">  Tableau de bord</li>
          </ol>
          
        </section>

      



  	<!-- Main content -->
        <section class="content">
        	
     
 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title" >Indicateurs</h3>
                <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div><!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
            <div class="row">
               
              <!-- /.row -->
            </div>
        
              </div>
    
                     	 </div> 
            
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title" >Liste des demandes</h3>
                <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div><!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
            <div class="row">
       <div class="table-responsive">          
              <!-- Affichage de la liste des administrateurs  --> 
  <table id="liste_demandes" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      	<th>#</th>
                        <th>Type</th>
                        <th>Nom /Prenom</th>
                        <th>Etat demande</th>
                        <th>Modif. Etat</th>
                         <th>Dossier</th>
                        <th>Justificatifs</th>
                        <th>Date validité</th>
                      </tr>
                    </thead>
                    <tbody>
                  
<?php 
      
 /* Affichage de la liste des demandes */       
 $afficheListe=$dashboard->afficheDemandes(); 
 
 $compteur = 1;

	 foreach($afficheListe as $key){
			
		 $id_decla=$key->id_decla;
		 $type_decla=$key->type_decla;
		 $nom=htmlspecialchars($key->nom);
		 $prenom=htmlspecialchars($key->prenom);
		 $email=htmlspecialchars($key->email);
                 $immatriculation=htmlspecialchars($key->immatriculation);
                 $etat_dde=$key->etat_dde;
                 $date_validite=$key->date_validite;
                 
 if($date_validite=="0000-00-00 00:00:00") {$date_validite="";} else{
   $date_validite= explode(" ", $date_validite);
   $date_validite=$date_validite[0];
   $date_validite= explode("-", $date_validite);
   $date_validite="$date_validite[2]-$date_validite[1]-$date_validite[0]";
 }      
		 
echo "
<tr>
            <td style=\"width:3%; text-align: left\">$compteur</td>
                
<td style=\"width: 3%; text-align: left\">";
	 
if($type_decla ==1) {echo "	 <a class=\"btn btn-primary btn-xs\" href=\"#\"><i class=\"fa fa-wheelchair fa-lg \"></i></a></td>";}
if($type_decla ==2) {echo "	 <a class=\"btn btn-danger btn-xs\" href=\"#\"><i class=\"fa fa-medkit fa-lg\"></i></a></td>";}

 echo "     <td style=\"width: 15%; text-align: left\">$nom $prenom </td>
           
 
<td style=\"width: 15%; text-align: left\">";
if($etat_dde ==2) {echo "  <a class=\"btn btn-danger btn-xs\" href=\"#\"><i class=\"fa fa-times fa-lg \"></i></a>";}
if($etat_dde ==0) {echo "<a class=\"btn btn-warning btn-xs\" href=\"#\"><i class=\"fa fa-question fa-lg\"></i></a>";}
if($etat_dde ==1) {echo "Validée &nbsp;  <a class=\"btn btn-success btn-xs\" href=\"#\"><i class=\"fa fa-check fa-lg\"></i></a>";}


echo "</td><td style=\"width: 12%; text-align: left\">";
    


echo"<div class=\"form-group\">                    
 <select class=\"form-control\" onchange=\"onSelectChange($id_decla);\" id=\"select_$id_decla\">
 <option value=\"0\" >- Modifier -</option>";  
					   
if($etat_dde !=1) {echo "<option value=\"1\">Valider</option>";}
if($etat_dde !=0) {echo " <option value=\"0\">En attente</option>";}
if($etat_dde !=2) {echo "<option value=\"2\">Refuser</option>";}
						
echo " </select>";


                  echo " </div></td>
     

 <td style=\"width: 5%; text-align: left\"><a href=\"dossier_pdf.php?id_decla=$id_decla\" target=\"_blank\"><span class=\"label label-primary\"><i class=\"fa fa-download\"></i> &nbsp; PDF</span></a></td>    
<td style=\"width:10%; text-align: left\">
<ul>
<li><a href=\"#\"> Fichier 1</a></li>
<li><a href=\"#\"> Fichier 2</a></li>
</ul>

</td>
<td style=\"width:10%; text-align: left\">$date_validite</td>";

	$compteur++;		
          
        }

 /* Fin de l'affichage de la liste des administrateurs */
                  
?>
                  
                    </tbody>
                   
                  </table>     
                
       </div>
                
                
                
              <!-- /.row -->
            </div>
        
              </div>
    
                     	 </div> 
              
                     	 
            
            
        </section><!-- /.content -->
      </div>
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
  $('#liste_demandes').DataTable({
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