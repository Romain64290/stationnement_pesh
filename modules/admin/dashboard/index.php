<?php

/***** Dernière modification : 08/09/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
$menu=1;
require(__DIR__ .'/../../../include/config.inc.php');
//require(__DIR__ .'/../../../include/connexion2.inc.php');
//require(__DIR__ .'/../../../include/ancien_connexion.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');


// préparation connexion
$connect = new connection();
$dashboard = new dashboard($connect);


// verifie si l'annee des stats est selectionné ou pas
$annee_stats = empty($_POST['annee_stats']) ? date("Y") : $_POST['annee_stats'];


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
        	
 <form action="index.php" method="post">              
 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title" >Agglomération Pau Béarn Pyrénées : tableau de cumul (lombri)composteurs distribués</h3>
                <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div><!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
            
              	 <div class="row"><div class="col-md-12">
                 
                  <div class="chart"><canvas id="AggloChart" style="height: 180px;"></canvas></div>
                </div> </div>
                
                
              <div class="row">
                <div class="col-sm-2 col-xs-3">
                  <div class="description-block border-right">
                 
                    <h5 class="description-header"><?php echo $dashboard->aggloReunionComposteurs($annee_stats); ?></h5>
                    <span class="description-text">Composteurs : Réunions</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                
                <div class="col-sm-2 col-xs-3">
                  <div class="description-block border-right">
              
                    <h5 class="description-header"><?php echo $dashboard->aggloParticipantsComposteur($annee_stats); ?></h5>
                    <span class="description-text">Composteurs : Inscrits</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                 <div class="col-sm-2 col-xs-3">
                  <div class="description-block border-right">
                 
                    <h5 class="description-header"><?php echo $dashboard->aggloDistribueComposteur($annee_stats); ?></h5>
                    <span class="description-text">Composteurs : Distib.</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                
                <div class="col-sm-2 col-xs-3">
                  <div class="description-block border-right">
              
                        <h5 class="description-header"><?php echo $dashboard->aggloReunionLombri($annee_stats); ?></h5>
                    <span class="description-text">Lombri : Réunion</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                
                <div class="col-sm-2 col-xs-3">
                  <div class="description-block border-right">
                      <h5 class="description-header"><?php echo $dashboard->aggloParticipantsLombri($annee_stats); ?></h5>
                    <span class="description-text">Lombri : Inscrits</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 col-xs-3">
                  <div class="description-block">
                
                    <h5 class="description-header"><?php echo $dashboard->aggloDistribueLombri($annee_stats); ?></h5>
                    <span class="description-text">Lombri : Distrib.</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
    </div></div>
    

    
    

 			<div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Les communes organisent des réunions</h3>
                <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div><!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">     	
                      
   <div class="row">
   	<div class="col-md-12">                
                  <!-- affichage de la liste des Assistant de prévention -->   
  <table id="liste_communes" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                 
                        <th style="width: 16%;">Commune</th>
                        <th style="width: 14%; text-align: center">Compost : reunions</th>
                        <th style="width: 14%; text-align: center">Compost : inscrits</th>
                        <th style="width: 14%; text-align: center">Compost : distrib</th>
                        <th style="width: 14%; text-align: center">Lombri : reunions</th>
                        <th style="width: 14%; text-align: center">Lombri : inscrits</th>
                        <th style="width: 14%; text-align: center">Lombri : distrib</th>

             
                      </tr>
                    </thead>
                    <tbody>
                    	 <tr>
            <td style="width: 16%; text-align: left">Arbus</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,15); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,15); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,15); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,15); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,15); ?></th>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,15); ?></th>    
			</tr>
                 
                 <tr>
            <td style="width: 16%; text-align: left">Aressy</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,16); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,16); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,16); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,16); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,16); ?></th>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,16); ?></th>    
			</tr> 
                 
                    	
            <tr>
            <td style="width: 16%; text-align: left">Artigueloutan</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,1); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,1); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,1); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,1); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,1); ?></th>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,1); ?></th>    
			</tr>
			
			 <tr>
            <td style="width: 16%; text-align: left">Artiguelouve</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,17); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,17); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,17); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,17); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,17); ?></th>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,17); ?></th>    
			</tr>
			
			
			 <tr>
            <td style="width: 16%; text-align: left">Aubertin</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,18); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,18); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,18); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,18); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,18); ?></th>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,18); ?></th>    
			</tr>
			
			 <tr>
            <td style="width: 16%; text-align: left">Aussevielle</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,19); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,19); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,19); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,19); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,19); ?></th>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,19); ?></th>    
			</tr>
			
			 <tr>
            <td style="width: 16%; text-align: left">Beyrie-en-Béarn</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,20); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,20); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,20); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,20); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,20); ?></th>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,20); ?></th>    
			</tr>
			
			
			 <tr>
            <td style="width: 16%; text-align: left">Billère</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,2); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,2); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,2); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,2); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,2); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,2); ?></th>

			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Bizanos</td>
           <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,3); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,3); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,3); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,3); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,3); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,3); ?></th>

			</tr>
			
			 <tr>
            <td style="width: 16%; text-align: left">Bosdarros</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,21); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,21); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,21); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,21); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,21); ?></th>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,21); ?></th>    
			</tr>
			
			 <tr>
            <td style="width: 16%; text-align: left">Bougarber</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,22); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,22); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,22); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,22); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,22); ?></th>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,22); ?></th>    
			</tr>
			
			 <tr>
            <td style="width: 16%; text-align: left">Denguin</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,23); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,23); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,23); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,23); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,23); ?></th>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,23); ?></th>    
			</tr>
			
			 <tr>
            <td style="width: 16%; text-align: left">Gan</td>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,4); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,4); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,4); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,4); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,4); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,4); ?></th>

			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Gelos</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,5); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,5); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,5); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,5); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,5); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,5); ?></th>

			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Idron</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,6); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,6); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,6); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,6); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,6); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,6); ?></th>
        
			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Jurançon</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,7); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,7); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,7); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,7); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,7); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,7); ?></th>
    			</tr>
    			
    		 <tr>
            <td style="width: 16%; text-align: left">Laroin</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,24); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,24); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,24); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,24); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,24); ?></th>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,24); ?></th>    
			</tr>	
    			
    			
			 <tr>
            <td style="width: 16%; text-align: left">Lée</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,8); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,8); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,8); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,8); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,8); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,8); ?></th>
  
			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Lescar</td>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,9); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,9); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,9); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,9); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,9); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,9); ?></th>

			 <tr>
            <td style="width: 16%; text-align: left">Lons</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,10); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,10); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,10); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,10); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,10); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,10); ?></th>

			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Mazères-Lezons</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,11); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,11); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,11); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,11); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,11); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,11); ?></th>

			</tr>
			
			 <tr>
            <td style="width: 16%; text-align: left">Meillon</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,25); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,25); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,25); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,25); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,25); ?></th>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,25); ?></th>    
			</tr>
			
			 <tr>
            <td style="width: 16%; text-align: left">Ousse</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,14); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,14); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,14); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,14); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,14); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,14); ?></th>

			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Pau</td>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,13); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,13); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,13); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,13); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,13); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,13); ?></th>
      
			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Poey-de-Lescar</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,26); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,26); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,26); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,26); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,26); ?></th>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,26); ?></th>    
			</tr>
			
			 <tr>
            <td style="width: 16%; text-align: left">Rontigon</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,27); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,27); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,27); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,27); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,27); ?></th>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,27); ?></th>    
			</tr>
			
			 <tr>
            <td style="width: 16%; text-align: left">Saint-Faust</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,28); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,28); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,28); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,28); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,28); ?></th>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,28); ?></th>    
			</tr>
			
			 <tr>
            <td style="width: 16%; text-align: left">Sendets</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,14); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,14); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,14); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,14); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,14); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,14); ?></th>

			</tr>
			
			 <tr>
            <td style="width: 16%; text-align: left">Siros</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,29); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,29); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,29); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,29); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,29); ?></th>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,29); ?></th>    
			</tr>
			
			 <tr>
            <td style="width: 16%; text-align: left">Uzein</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,30); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,30); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,30); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,30); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,30); ?></th>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,30); ?></th>    
			</tr>
			
			 <tr>
            <td style="width: 16%; text-align: left">Uzos</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionComposteurs($annee_stats,31); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsComposteur($annee_stats,31); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueComposteur($annee_stats,31); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeReunionLombri($annee_stats,31); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeParticipantsLombri($annee_stats,31); ?></th>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeDistribueLombri($annee_stats,31); ?></th>    
			</tr>
			
			
                     </tbody>
                   
                  </table>
              
                
                     	 </div> </div>
                  
                  </div> </div>
                  
                  
                  
                  
                  
 <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Les communes bénéficient du service</h3>
                <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div><!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                      
   <div class="row">
   	<div class="col-md-12">                
                  <!-- affichage de la liste des Assistant de prévention -->   
  <table id="liste_communes2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                 
                        <th style="width: 16%;">Commune</th>
                        <th style="width: 14%; text-align: center">Composteur : distrib</th>
                        <th style="width: 14%; text-align: center">Lombri : distrib</th>
                        <th style="width: 14%; text-align: center">Inscrit(s) à une réunion</th>
                        <th style="width: 42%; text-align: center"> </th>
             
                      </tr>
                    </thead>
                    <tbody>
               <tr>
            <td style="width: 16%; text-align: left">Arbus</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,15); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,15); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,15); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Aressy</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,16); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,16); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,16); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
	   	           	
            <tr>
            <td style="width: 16%; text-align: left">Artigueloutan</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,1); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,1); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,1); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Artiguelouve</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,17); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,17); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,17); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Aubertin</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,18); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,18); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,18); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Aussevielle</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,19); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,19); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,19); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
			
			 <tr>
            <td style="width: 16%; text-align: left">Beyrie-en-Béarn</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,20); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,20); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,20); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
			
			 <tr>
            <td style="width: 16%; text-align: left">Billère</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,2); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,2); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,2); ?></th>
            <th style="width: 42%; text-align: center"> </th>

			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Bizanos</td>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,3); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,3); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,3); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
				 <tr>
            <td style="width: 16%; text-align: left">Bosdarros</td>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,21); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,21); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,21); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
					 <tr>
            <td style="width: 16%; text-align: left">Bougarber</td>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,22); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,22); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,22); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
					 <tr>
            <td style="width: 16%; text-align: left">Denguin</td>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,23); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,23); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,23); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Gan</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,4); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,4); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,4); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Gelos</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,5); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,5); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,5); ?></th>
			<th style="width: 42%; text-align: center"> </th>
			 <tr>
            <td style="width: 16%; text-align: left">Idron</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,6); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,6); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,6); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Jurançon</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,7); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,7); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,7); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
					 <tr>
            <td style="width: 16%; text-align: left">Laroin</td>
             <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,23); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,23); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,21); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Lée</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,8); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,8); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,8); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Lescar</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,9); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,9); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,9); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			 <tr>
            <td style="width: 16%; text-align: left">Lons</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,10); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,10); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,10); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Mazères-Lezons</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,11); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,11); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,11); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
				 <tr>
            <td style="width: 16%; text-align: left">Meillon</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,25); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,25); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,25); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Ousse</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,14); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,14); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,14); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
			 <tr>
            <td style="width: 16%; text-align: left">Pau</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,13); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,13); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,13); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
				 <tr>
            <td style="width: 16%; text-align: left">Poey-de-Lescar</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,26); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,26); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,26); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
				 <tr>
            <td style="width: 16%; text-align: left">Rontignon</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,27); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,27); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,27); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
				 <tr>
            <td style="width: 16%; text-align: left">Saint-Faust</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,28); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,28); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,28); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
		
			 <tr>
            <td style="width: 16%; text-align: left">Sendets</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,14); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,14); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,14); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
					 <tr>
            <td style="width: 16%; text-align: left">Siros</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,29); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,29); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,29); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
					 <tr>
            <td style="width: 16%; text-align: left">Uzein</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,30); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,30); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,30); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
					 <tr>
            <td style="width: 16%; text-align: left">Uzos</td>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceCompost($annee_stats,31); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenanceLombri($annee_stats,31); ?></th>
            <th style="width: 14%; text-align: center"><?php echo $dashboard->communeProvenance($annee_stats,31); ?></th>
            <th style="width: 42%; text-align: center"> </th>
			</tr>
			
                     </tbody>
                   
                  </table>
              
                
                     	 </div> </div>
                  
                  </div> </div>                 
                  
                  
 <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title" >Annee de statistique</h3>
                <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div><!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
            
             <div class="row">
                 <div class="col-md-12">   
            
            <div class="form-group has-feedback">
 	 <div class="input-group">
 <span class="input-group-addon">
    <span class="fa fa-pie-chart"></span>
 	 </span>
           	 <select name="annee_stats" class="form-control" onchange="this.form.submit()">
                <option value="2016" <?php if ($annee_stats ==2016){echo "selected";} ?> >Statistiques : 2016</option>
                <option value="2017" <?php if ($annee_stats ==2017){echo "selected";} ?> >Statistiques : 2017</option>
                <option value="2018" <?php if ($annee_stats ==2018){echo "selected";} ?> >Statistiques : 2018</option>
            </select>            
        
     </div>  </div>  
            </div>  </div>
                
    </div></div>                 
         	
          
            
        </form>
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
 
 <?php
 
$comp_janv =$dashboard->aggloDistribueComposteurMois($annee_stats."-01");

$comp_fev =$dashboard->aggloDistribueComposteurMois($annee_stats."-02");
$comp_fev=$comp_fev+$comp_janv;

$comp_mars =$dashboard->aggloDistribueComposteurMois($annee_stats."-03");
$comp_mars =$comp_mars+$comp_fev;

$comp_avril =$dashboard->aggloDistribueComposteurMois($annee_stats."-04");
$comp_avril =$comp_avril+$comp_mars;

$comp_mai =$dashboard->aggloDistribueComposteurMois($annee_stats."-05");
$comp_mai =$comp_mai+$comp_avril;

$comp_juin =$dashboard->aggloDistribueComposteurMois($annee_stats."-06");
$comp_juin =$comp_juin+$comp_mai;

$comp_juillet =$dashboard->aggloDistribueComposteurMois($annee_stats."-07");
$comp_juillet =$comp_juillet+$comp_juin;

$comp_aout =$dashboard->aggloDistribueComposteurMois($annee_stats."-08");
$comp_aout =$comp_aout+$comp_juillet;

$comp_sept =$dashboard->aggloDistribueComposteurMois($annee_stats."-09");
$comp_sept =$comp_sept+$comp_aout;

$comp_oct =$dashboard->aggloDistribueComposteurMois($annee_stats."-10");
$comp_oct =$comp_oct+$comp_sept;

$comp_nov =$dashboard->aggloDistribueComposteurMois($annee_stats."-11");
$comp_nov =$comp_nov+$comp_oct;

$comp_dec =$dashboard->aggloDistribueComposteurMois($annee_stats."-12");
$comp_dec =$comp_dec+$comp_nov;

$lombri_janv =$dashboard->aggloDistribueLombriMois($annee_stats."-01");

$lombri_fev =$dashboard->aggloDistribueLombriMois($annee_stats."-02");
$lombri_fev =$lombri_fev+$lombri_janv;

$lombri_mars =$dashboard->aggloDistribueLombriMois($annee_stats."-03");
$lombri_mars =$lombri_mars+$lombri_fev;

$lombri_avril =$dashboard->aggloDistribueLombriMois($annee_stats."-04");
$lombri_avril =$lombri_avril+$lombri_mars;

$lombri_mai =$dashboard->aggloDistribueLombriMois($annee_stats."-05");
$lombri_mai =$lombri_mai+$lombri_avril;

$lombri_juin =$dashboard->aggloDistribueLombriMois($annee_stats."-06");
$lombri_juin =$lombri_juin+$lombri_mai;

$lombri_juillet =$dashboard->aggloDistribueLombriMois($annee_stats."-07");
$lombri_juillet =$lombri_juillet+$lombri_juin;

$lombri_aout =$dashboard->aggloDistribueLombriMois($annee_stats."-08");
$lombri_aout =$lombri_aout+$lombri_juillet;

$lombri_sept =$dashboard->aggloDistribueLombriMois($annee_stats."-09");
$lombri_sept =$lombri_sept+$lombri_aout;

$lombri_oct =$dashboard->aggloDistribueLombriMois($annee_stats."-10");
$lombri_oct =$lombri_oct+$lombri_sept;

$lombri_nov =$dashboard->aggloDistribueLombriMois($annee_stats."-11");
$lombri_nov =$lombri_nov+$lombri_oct;

$lombri_dec =$dashboard->aggloDistribueLombriMois($annee_stats."-12");
$lombri_dec =$lombri_dec+$lombri_nov;

 ?>
 
 
   	
   	$(function () {
 

  var AggloChartCanvas = $("#AggloChart").get(0).getContext("2d");
  var AggloChart = new Chart(AggloChartCanvas);
  
    var AggloChartData = {
    labels: ["Janv.","Fév.","Mars","Avril","Mai","Juin","Juillet","Août.","Sept.","Oct.", "Nov.", "Déc."],
    datasets: [
      {
        label: "Composteurs",
        fillColor: "rgb(210, 214, 222)",
        strokeColor: "rgb(210, 214, 222)",
        pointColor: "rgb(210, 214, 222)",
        pointStrokeColor: "#c1c7d1",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgb(220,220,220)",
        data: [<?php echo "$comp_janv,$comp_fev,$comp_mars,$comp_avril,$comp_mai,$comp_juin,$comp_juillet,$comp_aout,$comp_sept,$comp_oct,$comp_nov,$comp_dec"; ?>]
      },
      {
        label: "Lombricomposteurs",
        fillColor: "rgba(60,141,188,0.9)",
        strokeColor: "rgba(60,141,188,0.8)",
        pointColor: "#3b8bba",
        pointStrokeColor: "rgba(60,141,188,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(60,141,188,1)",
        data: [<?php echo "$lombri_janv,$lombri_fev,$lombri_mars,$lombri_avril,$lombri_mai,$lombri_juin,$lombri_juillet,$lombri_aout,$lombri_sept,$lombri_oct,$lombri_nov,$lombri_dec"; ?>]
      }
    ]
  };
  
 
  var ChartOptions = {
    //Boolean - If we should show the scale at all
    showScale: true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines: false,
    //String - Colour of the grid lines
    scaleGridLineColor: "rgba(0,0,0,.05)",
    //Number - Width of the grid lines
    scaleGridLineWidth: 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,
    //Boolean - Whether the line is curved between points
    bezierCurve: true,
    //Number - Tension of the bezier curve between points
    bezierCurveTension: 0.3,
    //Boolean - Whether to show a dot for each point
    pointDot: false,
    //Number - Radius of each point dot in pixels
    pointDotRadius: 4,
    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth: 1,
    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius: 20,
    //Boolean - Whether to show a stroke for datasets
    datasetStroke: true,
    //Number - Pixel width of dataset stroke
    datasetStrokeWidth: 2,
    //Boolean - Whether to fill the dataset with a color
    datasetFill: true,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
    //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true
  };
  
    //Create the line chart
  AggloChart.Line(AggloChartData, ChartOptions);
  
  $('#liste_communes').DataTable({
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
      
      $('#liste_communes2').DataTable({
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
     

 });
   	
   </script>

</body>
</html>