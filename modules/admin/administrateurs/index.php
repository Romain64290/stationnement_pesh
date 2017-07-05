<?php

/***** Dernière modification : 05/08/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
$menu=3;
//include("../../../include/verif_droits.php");
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');

// préparation connexion
$connect = new connection();
$administrateurs = new administrateurs($connect);

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
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../plugins/datatables/dataTables.bootstrap.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">
 
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
            Gestion des administrateurs
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="../dashboard/index.php"><i class="fa fa-users"></i> Accueil</a></li>
            <li class="active">Gestion des admnistrateurs</li>
          </ol>
        </section>

      



  	<!-- Main content -->
        <section class="content">
        
                
          <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Liste des membres</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
  
     
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
   
   
   
      <!-- Affichage de la liste des administrateurs  --> 
  <table id="liste_admin" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      	<th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Etat</th>
                         <th>Modif. état</th>
                      </tr>
                    </thead>
                    <tbody>
                  
<?php 
      
 /* Affichage de la liste des administrateurs */
             
 $afficheAdmin=$administrateurs->afficheAdmin(); 
 
 $compteur = 1;

	 foreach($afficheAdmin as $key){
			
		 $id_membre=$key->id_membre;
		 $id_typemembre=$key->id_typemembre;
		 $nom_membre=htmlspecialchars($key->nom_membre);
		 $prenom_membre=htmlspecialchars($key->prenom_membre);
		 $email=htmlspecialchars($key->email);
		 $validation_inscription=$key->validation_inscription;
		 
echo "
<tr>
            <td style=\"width:10%; text-align: left\">$compteur</td>
            <td style=\"width: 22%; text-align: left\">$nom_membre</td>
            <td style=\"width: 19%; text-align: left\">$prenom_membre</td>
            <td style=\"width: 27%; text-align: left\">$email</td>";
	 
echo "<td style=\"width: 22%; text-align: left\">";
	 
if($id_typemembre ==1) {echo "Utilisateur &emsp; ";}
if($id_typemembre ==2) {echo "Rédacteur &emsp; ";}
if($id_typemembre ==3) {echo "Administrateur &emsp;&emsp; &emsp; &emsp;  ";}
if($id_typemembre ==4) {echo "Super-Administrateur &emsp; ";}
	 
	 
if($validation_inscription ==2) {echo "	 <a class=\"btn btn-danger btn-xs\" href=\"#\"><i class=\"fa fa-times fa-lg \"></i></a>";}
if($validation_inscription ==0) {echo "	 <a class=\"btn btn-warning btn-xs\" href=\"#\"><i class=\"fa fa-question fa-lg\"></i></a>";}
if($validation_inscription ==1) {echo "	 <a class=\"btn btn-success btn-xs\" href=\"#\"><i class=\"fa fa-check fa-lg\"></i></a>";}

echo "</td><td style=\"width: 11%; text-align: left\">
<div class=\"form-group\">";
                      
if($id_typemembre !=4){
                      
                    echo " <select class=\"form-control\" onchange=\"onSelectChange($id_membre);\" id=\"select_$id_membre\">
                      <option value=\"0\" >- Modifier -</option>";  
					   
if($validation_inscription !=1) {echo "<option value=\"1\">Valider</option>";}
if($validation_inscription !=0) {echo " <option value=\"0\">En attente</option>";}
if($validation_inscription !=2) {echo "<option value=\"2\">Refuser</option>";}
						
echo " </select>";}


                  echo " </div></td>";
     


	$compteur++;		
          
        }

 /* Fin de l'affichage de la liste des administrateurs */
                  
?>
                  
                    </tbody>
                   
                  </table>



  </div><!-- /.box-body -->
 
</div><!-- /.box -->


    
          
          
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
    <!-- Datatable -->
     <script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../plugins/datatables/dataTables.bootstrap.min.js"></script>
 
    <!-- jQuery UI 1.11.4 -->
    <script src="../../../plugins/jquery-ui-1.11.4/jquery-ui.min.js"></script>
  
    	
    <script>
      $(function () {

    
        $('#liste_admin').DataTable({
         "stateSave": true,
         "stateDuration": 60 * 3,
          "ordering": false,
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
     
       
        
      });
      
      
function onSelectChange($id){
   
etat = document.getElementById("select_"+$id).value;
document.location.href="change_etat.php?type=admin&id_membre="+$id+"&etat="+etat;
}
      
    </script>


  </body>
</html>


