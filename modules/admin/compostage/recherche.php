<?php

/***** Dernière modification : 13/09/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
$menu=4;
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');


// préparation connexion
$connect = new connection();
$compostage = new compostage($connect);

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
            Recherche participant
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="../index.php"><i class="fa fa-users"></i> Accueil</a></li>
            <li class="active">Recherche participant</li>
          </ol>
        </section>

      



  	<!-- Main content -->
        <section class="content">
        
                
          <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Liste des participants</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">


<!-- affichage de la liste des Assistant de prévention -->   
  <table id="liste_admin" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      	<th>#</th>
                        <th>Nom /Prénom</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Ville</th>
                        <th>Date inscription</th>
                         <th>Réunion</th>
                         <th>Présence</th>
                         <th>Composteur donné</th>
                      </tr>
                    </thead>
                    <tbody>
                  
                  <?php 

/* affichage de la liste des Inscrits*/
                                    
$afficheTousInscrits=$compostage->afficheTousInscrits(); 


$compteur = 1;

foreach($afficheTousInscrits as $key){
			
		 $id_usager=$key->id_usager;
		 $nom=htmlspecialchars($key->nom);
		 $prenom=htmlspecialchars($key->prenom);
		 $adresse=htmlspecialchars($key->adresse);
		 $email=htmlspecialchars($key->email);
		 $telephone=htmlspecialchars($key->telephone);
		 $date_reunion=htmlspecialchars($key->date_reunion);
		 $date_inscription=$key->date_inscription;
		 $nom_commune=$key->nom_commune;
		 $composteur_donne=$key->composteur_donne;
		 if($composteur_donne==0){$composteur_donne="non";}else{$composteur_donne="oui";}
		  $presence_reunion=$key->presence_reunion;
		 if($presence_reunion==0){$presence_reunion="non";}else{$presence_reunion="oui";}
		 
		 $date_inscription=explode(" ", $date_inscription);
		 $date_inscription=explode("-", $date_inscription[0]);
		 
echo"
<tr>
            <td style=\"width:3%; text-align: left\">$compteur</td>
            <td style=\"width: 15%; text-align: left\">$nom $prenom</td>
            <td style=\"width: 15%; text-align: left\">$telephone</td>
            <td style=\"width: 15%; text-align: left\">$email</td>      
			<td style=\"width: 15%; text-align: left\">$adresse</td>
			<td style=\"width: 11%; text-align: left\">$nom_commune</td>
			<td style=\"width: 8%; text-align: left\">$date_inscription[2]/$date_inscription[1]/$date_inscription[0]</td>
			<td style=\"width: 8%; text-align: left\">$date_reunion</td>
			<td style=\"width: 5%; text-align: left\">$presence_reunion</td>
			<td style=\"width: 5%; text-align: left\">$composteur_donne</td>
			
			</tr>";
     
$compteur++;		                           
                  
}                 
                  
/* Fin de l'affichage de la liste des Inscrits*/   
               
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
document.location.href="change_etat.php?type=adp&id_membre="+$id+"&etat="+etat;
}
      
    </script>


  </body>
</html>