<?php

/***** Dernière modification : 17/09/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
$menu=3;
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
           Liste des réunions
            
          </h1>
          <ol class="breadcrumb">
              <li><a href="../dashboard/index.php"><i class="fa fa-calendar"></i> Accueil</a></li>
            <li class="active"> Liste des réunions</li>
          </ol>
        </section>

      



  	<!-- Main content -->
        <section class="content">
          <div class="row">
            
            <div class="col-md-12">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Liste des réunions </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
             	
              <div class="box-body">
               	
             
              	
   <!-- Affichage de la liste des fiches accueil  --> 
  <table id="liste_admin" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      	<th>#</th>
                        <th>Réunion</th>
                        <th>Type</th>
                        <th>Inscrit(s)</th>
                         <th>Présent(s)</th>
                          <th>Composteur(s)</th>
                        <th>Liste participants</th>
                        <th>Chartes Personnalisées</th>
                       
                      </tr>
                    </thead>
                    <tbody>
              	
              	 <?php 
 
             	 
 $afficheReunion=$compostage->afficheReunion();
				
$compteur=1;		 
				 
foreach($afficheReunion as $key){
	
			$id_reunion=$key["id_reunion"];
			$type_reunion=$key["type_reunion"];
			$date_reunion=$key["date_reunion"];
			$adresse=htmlspecialchars($key["adresse"]);
			$nom_comune=$key["nom_commune"];
			$lien_map=htmlspecialchars($key["lien_map"]);
			$reunion_ouverte=$key["reunion_ouverte"];
			$nbr_participants=$key["nbr_participants"];
			$limite_participants=$key["limite_participants"];
			
			if($type_reunion==1){$type_reunion="Maison";}else{$type_reunion="Appartement";}			
			if($limite_participants==0){$limite_participants="Illimité";}		
					
		
			//setlocale (LC_TIME, 'fr_FR');
			//setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
			//$date_debut=date("d F Y", strtotime($date_reunion)); 
			
			$date_expl=explode(" ",$date_reunion);
			$heure=explode(":",$date_expl[1]);
			$heure=$heure[0].":".$heure[1];
			$date_debut=explode("-",$date_expl[0]);
			
			$nbr_presents=$compostage->comptePresents($id_reunion);		   
		   	$nbr_composteurs=$compostage->compteComposteurs($id_reunion);
		
			echo "<tr>
                        <td>$compteur</td>
                        <td><a href=\"edit_reunion.php?id_reunion=".$id_reunion."\"> $nom_comune, le $date_debut[2]/$date_debut[1] à $heure</a></td>
                        <td>$type_reunion</td>
                        <td>$nbr_participants / $limite_participants</td>
                        <td align=\"center\">$nbr_presents</td>
                        <td align=\"center\">$nbr_composteurs</td>
                        <td align=\"center\"><a href=\"liste_pdf.php?id_reunion=".$id_reunion."\" target=\"_blank\"><span class=\"label label-primary\"><i class=\"fa fa-download\"></i> &nbsp; PDF</span></a></td>";
                       
			if($key["type_reunion"]==1)	
				{echo"<td align=\"center\"><a href=\"charte_comp_pdf.php?id_reunion=".$id_reunion."\" target=\"_blank\"><span class=\"label label-primary\"><i class=\"fa fa-download\"></i> &nbsp; PDF</span></a></td>";}
			else{echo"<td align=\"center\"><a href=\"charte_lombri_pdf.php?id_reunion=".$id_reunion."\" target=\"_blank\"><span class=\"label label-primary\"><i class=\"fa fa-download\"></i> &nbsp; PDF</span></a></td>";}
                     echo"</tr>";
		
	$compteur++;    
}
	 
				  ?>
              	 	
              	   </tbody>
                   
                  </table>	
              	 	
              	 	
                </div> 
           
          </div>

            </div><!-- /.col -->
          </div><!-- /.row -->
      
          
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
    
    <script>
      $(function () {

    
        $('#liste_admin').DataTable({
         "stateSave": true,
         "stateDuration": 60 * 3,
          "ordering": false,
           "language": {
            "lengthMenu": "_MENU_  enregistements par page",
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
       </script>

</body>
</html>