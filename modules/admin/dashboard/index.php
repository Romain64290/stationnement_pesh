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

$etatExport=$dashboard->etatExport();

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
    
        
      <!-- Jquerry ui pour date picker-->
  <link rel="stylesheet" href="../../../plugins/jquery-ui-1.11.4/themes/smoothness/jquery-ui.css">
  <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>    

  <style>
 #datepicker {
  position:static
}

  </style>
     
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
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">  Tableau de bord</li>
          </ol>
          
        </section>

      



  	<!-- Main content -->
        <section class="content">
        
        <!-- Info boxes -->
      <div class="row">
                  <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-car"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Nombre demandes</span>
              <span class="info-box-number"><?php $dashboard->afficheNbreDemandes();?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->    
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-wheelchair"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">PMR</span>
              <span class="info-box-number"><?php $dashboard->afficheNbrePmr();?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-medkit"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pro. Santé</span>
              <span class="info-box-number"><?php $dashboard->afficheNbrePro();?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->    
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
                                        
    
  <table id="liste_demandes" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      	<th style=" text-align: center">#</th>
                        <th>Nom /Prenom</th>
                         <th style=" text-align: center">Immatriculation</th>
                        <th style=" text-align: center">Etat demande</th>
                        <th style=" text-align: center">Modif. Etat</th>
                         <th style=" text-align: center">Dossier</th>
                        <th style=" text-align: center">Justificatifs</th>
                        <th style=" text-align: center">Date validité</th>
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
                 $dossier=$key->dossier;
                 $justificatif1=$key->justificatif1;
                 $justificatif2=$key->justificatif2;
                 
if($date_validite=="0000-00-00 00:00:00"){$date_validite="";}else{
   $date_validite= explode(" ", $date_validite);
   $date_validite=$date_validite[0];
   $date_validite= explode("-", $date_validite);
$date_validite="$date_validite[2]-$date_validite[1]-$date_validite[0]";}
    
		 
echo "
<tr>
     <td style=\"width:3%; text-align: left\">$compteur</td>
     <td style=\"width: 20%; text-align: left\">$nom $prenom </td>
         


     <td style=\"width: 10%; text-align: center\">";

if($etat_dde ==0 OR $etat_dde==1 OR $etat_dde==2 OR $etat_dde==3 OR $etat_dde==4){echo $immatriculation;} 
        
        echo"</td>
           
 
<td style=\"width: 15%; text-align: center\">";

if($etat_dde ==0) {echo "Nouvelle &nbsp; <a class=\"btn btn-info btn-xs\" href=\"#\"><i class=\"fa fa-question fa-lg\"></i></a>";}
if($etat_dde ==1) {echo "En cours &nbsp; <a class=\"btn btn-warning btn-xs\" href=\"#\"><i class=\"fa fa-question fa-lg\"></i></a>";}
if($etat_dde ==2) {echo "Validée &nbsp;  <a class=\"btn btn-success btn-xs\" href=\"#\"><i class=\"fa fa-check fa-lg\"></i></a>";}
if($etat_dde ==3) {echo "Refusée &nbsp; <a class=\"btn btn-danger btn-xs\" href=\"#\"><i class=\"fa fa-times fa-lg \"></i></a>";}
if($etat_dde ==4) {echo "Exportée &nbsp;  <a class=\"btn btn-default btn-xs\" href=\"#\"><i class=\"fa fa-check fa-lg\"></i></a>";}


echo "</td><td style=\"width: 12%; text-align: center\">";

if($etat_dde ==2 OR $etat_dde ==3 OR $etat_dde ==4) {}else{
    
 if($etatExport!=1) {

echo"<div class=\"form-group\">                    
 <select class=\"form-control\" onchange=\"onSelectChange($id_decla);\" id=\"select_$id_decla\">
 <option value=\"0\" >- Modifier -</option>";  
					   
if($etat_dde !=1) {echo " <option value=\"1\">En cours</option>";}
if($etat_dde !=2) {echo "<option value=\"2\">Validée</option>";}
if($etat_dde !=3) {echo "<option value=\"3\">Refusée</option>";}

						
echo " </select>";


                  echo " </div>";
         }      else{ echo"Export en cours...";}   
}
                  echo"</td>";
     
  echo"<td style=\"width: 11%; text-align: center\">";                
                  
                  
if($etat_dde ==0 OR $etat_dde==1 ){
 if($type_decla==1){  
 echo"<a href=\"genere_pdf_pmr.php?id_decla=$id_decla\" target=\"_blank\"><span class=\"label label-primary\"><i class=\"fa fa-download\"></i> &nbsp; PDF</span></a>";}
 else{
  echo"<a href=\"genere_pdf_pro.php?id_decla=$id_decla\" target=\"_blank\"><span class=\"label label-primary\"><i class=\"fa fa-download\"></i> &nbsp; PDF</span></a>";    
 }
}
 
 echo"</td>";    


echo"<td style=\"width:20%; text-align: center\">";

if($etat_dde ==0 OR $etat_dde==1 ){
echo"| <a href=\"../../public/upload/$dossier/$justificatif1\" target=\"_blank\"> Justif. 1</a> | <a href=\"../../public/upload/$dossier/$justificatif2\" target=\"_blank\"> Justif. 2</a> | ";}    


echo"</td>
<td style=\"width:15%; text-align: center\">$date_validite <br> ";
 
if($etat_dde==1 ){
echo"<a href=\"#\" onclick=\"modifDate($id_decla);\">Reduire la date</a> ";}
            
           echo"</td></tr>";

	$compteur++;		
          
        }

 /* Fin de l'affichage de la liste des administrateurs */
                  
?>
                  
                    </tbody>
                   
                  </table>     
       
              </div>
    
                     	 </div> 
              
                     	 
            
            
        </section><!-- /.content -->
      </div>
      </div><!-- /.content-wrapper -->
   
 <?php require(__DIR__ .'/../../../include/footer_back.php'); ?>
   
	
      <!-- jQuery 2.1.4 -->
<script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>	

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

 <script src="../../../plugins/jquery-ui-1.11.4/jquery-ui.min.js"></script>
 
 
 <script>
     
     
 function modifDate(id_decla) {
        
 swal({
  title: 'Etes vous sure de vouloir reduire la date de validité ?',
  html:"Uniquement si la validité des documents est inférieure à 2 ans ! <br><br><form name=\"formulaire\" id=\"formulaire\" method=\"post\" action=\"modif_date.php\"><div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"fa fa-calendar\"></i></div> <input type=\"text\" id=\"datepicker\" class=\"form-control\" placeholder=\"Date de l'activité\" required data-error=\"Veuillez choisir une date\" name=\"date\"></div><input type=\"hidden\" name=\"id_decla\" value=\""+id_decla+"\"></form>",  
    type: 'warning',
  showCancelButton: true,
  showLoaderOnConfirm: true,
  allowOutsideClick: false,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Oui, on modifie !',
  cancelButtonText: 'Annuler !',
onOpen: function() {
    	$( "#datepicker" ).datepicker({
altField: "#datepicker",
closeText: 'Fermer',
prevText: 'Précédent',
nextText: 'Suivant',
currentText: 'Aujourd\'hui',
monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
weekHeader: 'Sem.',
dateFormat: 'dd-mm-yy',
firstDay : 1
});
    },
    preConfirm: function() {
      return Promise.resolve($('#datepicker').datepicker('getDate'));
    }
  }).then(function () {
 $("#formulaire").submit();

}); 

}


 
function refuseDemande(id_decla) {
        
 swal({
  title: 'Etes vous sure de vouloir refuser cette demande?',
  text:"Vous pouvez preciser le motif du refus ! <br><form name=\"formulaire\" id=\"formulaire\" method=\"post\" action=\"refuse_demande.php\"><textarea name=\"motif\" class=\"swal2-textarea\" style=\"display: block;\">Motif du refus : </textarea><input type=\"hidden\" name=\"id_decla\" value=\""+id_decla+"\"></form>",
        
  type: 'warning',
  showCancelButton: true,
  showLoaderOnConfirm: true,
  allowOutsideClick: false,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Oui, on supprime !',
  cancelButtonText: 'Annuler !'
}).then(function () {
 $("#formulaire").submit();

}); 

}
       
function onSelectChange($id){
   
etat = document.getElementById("select_"+$id).value;

if(etat==1){document.location.href="demande_encours.php?id_decla="+$id;}
if(etat==2){document.location.href="demande_ok.php?id_decla="+$id;}
if(etat==3){refuseDemande($id);}


}
   
 
    </script>
 
   
</body>
</html>