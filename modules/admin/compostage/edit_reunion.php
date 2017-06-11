<?php

/***** Dernière modification : 12/09/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
$menu=2;
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');

$id_reunion=$_GET['id_reunion'];

// verifie si la varaible $ajoutparticipant existe
$ajoutparticipant = isset($_GET['ajoutparticipant']) ? $_GET['ajoutparticipant'] : NULL;

// verifie si la varaible $emailabsent existe
$emailabsent = isset($_GET['emailabsent']) ? $_GET['emailabsent'] : NULL;


// préparation connexion
$connect = new connection();
$compostage = new compostage($connect);

$result=$compostage->infosReunion($id_reunion); 
 
$date=explode(" ", $result[2]);
$date=explode("-", $date[0]);
$date="$date[2]/$date[1]/$date[0]";

$date_jour= date('Y-m-d H:i:s');


$heure_debut=explode(" ",$result[2]);
$heure_debut=explode(":",$heure_debut[1]);
$heure_debut="$heure_debut[0]:$heure_debut[1]";




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
    
 <!-- Datepicker -->
    <link rel="stylesheet" href="../../../plugins/datepicker/datepicker3.css" >   
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../plugins/datatables/dataTables.bootstrap.css">
    
  <link rel="stylesheet" href="../../../plugins/sweetalert2/sweetalert2.min.css">


  </head>
 
 <body class="hold-transition skin-blue sidebar-mini" <?php if($ajoutparticipant=="ok"){echo"onload=\"Ajoutparticipant();\"";} ?> <?php if($emailabsent=="ok"){echo"onload=\"Emailabsent();\"";} ?>>
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
            Edition d'une réunion
            
          </h1>
          <ol class="breadcrumb">
              <li><a href="../dashboard/index.php"><i class="fa fa-calendar"></i> Accueil</a></li>
            <li class="active">Edition d'une réunion</li>
          </ol>
        </section>

      



  	<!-- Main content -->
        <section class="content">
          <div class="row">
            
            <div class="col-md-12">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Réunion</h3>
               <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <form name="inscriptionForm"  id="inscriptionForm" role="form" data-toggle="validator" action="edit02_reunion.php" method="post" data-disable="false">
             	
              <div class="box-body">
               
          
       <div class="row">
            
             <div class="col-md-4">   
            
            <div class="form-group has-feedback">
 	 <div class="input-group">
 <span class="input-group-addon">
    <span class="fa fa-users"></span>
 	 </span>
           	 <select name="type_reunion" class="form-control" required  data-error="Veuillez choisir une type de réunion">
                <option value="" selected disabled="disabled">Type de réunion</option>
                <option value="1"<?php if($result[1]==1){echo"selected";}?>>Maison</option>
                <option value="2" <?php if($result[1]==2){echo"selected";}?>>Appartement</option>
            </select>            
            
  
     </div><div class="help-block with-errors"></div>   </div>  
            </div>
            
            <div class="col-md-4">        
          <div class="form-group"><div class="bootstrap-timepicker">
                    <div class="form-group">
                    
                      <div class="input-group">
                      	<div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" id="datepicker" class="form-control" placeholder="Date de la réunion" required data-error="Veuillez choisir une date" name="date" value="<?php echo $date; ?>">
                         
                      </div><!-- /.input group --><div class="help-block with-errors"></div>
                    </div><!-- /.form group -->
                  </div>
                  <!-- /.input group -->
                </div>  </div>

            
            
            
            <div class="col-md-4">        
          <div class="form-group"><div class="bootstrap-timepicker">
                    <div class="form-group">
                    
                      <div class="input-group">
                      	<div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                     
                        <input type="text" placeholder="heure début" class="form-control" data-inputmask="'alias': 'hh:mm'" data-mask required  data-error="Veuillez choisir une heure de début" name="heure_debut" value="<?php echo $heure_debut; ?>">
                        
                      </div><!-- /.input group --><div class="help-block with-errors"></div>
                    </div><!-- /.form group -->
                  </div>
                  <!-- /.input group -->
                </div>  </div>
                
   <div class="col-md-4">        
</div>
                </div>
          
      <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="fa fa-map-marker"></span>
 	 </span>
     <input type="text" class="form-control"  value="<?php echo htmlspecialchars($result[3]); ?>" placeholder="Adresse" required name="adresse" data-error="Veuillez saisir une adresse"></div>  
     <div class="help-block with-errors"></div>
   
     </div> 
     
     
     
     
     <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="fa fa-map-marker"></span>
 	 </span>
  
     <select class="form-control" name="ville" required data-error="Veuillez choisir la ville ">
  <option value="" selected disabled="disabled">Ville</option>
	<option value="15" <?php if($result[4]==15){echo"selected";}?>>Arbus</option>
   <option value="16" <?php if($result[4]==16){echo"selected";}?>>Aressy</option>
  	<option value="1" <?php if($result[4]==1){echo"selected";}?>>Artigueloutan</option>
  	<option value="17" <?php if($result[4]==17){echo"selected";}?>>Artiguelouve</option>
  	<option value="18" <?php if($result[4]==18){echo"selected";}?>>Aubertin</option>
  	<option value="19" <?php if($result[4]==19){echo"selected";}?>>Ausevielle</option>
  	<option value="20" <?php if($result[4]==20){echo"selected";}?>>Beyrie-en-Béarn</option>
	<option value="2" <?php if($result[4]==2){echo"selected";}?>>Billère</option>
	<option value="3" <?php if($result[4]==3){echo"selected";}?>>Bizanos</option>
	<option value="21" <?php if($result[4]==21){echo"selected";}?>>Bosdarros</option>
	<option value="22" <?php if($result[4]==22){echo"selected";}?>>Bougarber</option>
	<option value="23" <?php if($result[4]==23){echo"selected";}?>>Denguin</option>
	<option value="4" <?php if($result[4]==4){echo"selected";}?>>Gan</option>
	<option value="5" <?php if($result[4]==5){echo"selected";}?>>Gelos</option>
	<option value="6" <?php if($result[4]==6){echo"selected";}?>>Idron</option>
	<option value="7" <?php if($result[4]==7){echo"selected";}?>>Jurançon</option>
	<option value="24" <?php if($result[4]==24){echo"selected";}?>>Laroin</option>
	<option value="8" <?php if($result[4]==8){echo"selected";}?>>Lée</option>
	<option value="9" <?php if($result[4]==9){echo"selected";}?>>Lescar</option>
	<option value="10" <?php if($result[4]==10){echo"selected";}?>>Lons</option>
	<option value="11" <?php if($result[4]==11){echo"selected";}?>>Mazères-Lezons</option>
	<option value="25" <?php if($result[4]==25){echo"selected";}?>>Meillon</option>	
	<option value="12" <?php if($result[4]==12){echo"selected";}?>>Ousse</option>	
	<option value="13" <?php if($result[4]==13){echo"selected";}?>>Pau</option>
	<option value="26" <?php if($result[4]==26){echo"selected";}?>>Poey-de-Lescar</option>
	<option value="27" <?php if($result[4]==27){echo"selected";}?>>Rontignon</option>
	<option value="28" <?php if($result[4]==28){echo"selected";}?>>Saint-Faust</option>
	<option value="14" <?php if($result[4]==14){echo"selected";}?>>Sendets</option>	
	<option value="29" <?php if($result[4]==29){echo"selected";}?>>Siros</option>
	<option value="30" <?php if($result[4]==30){echo"selected";}?>>Uzein</option>
	<option value="31" <?php if($result[4]==31){echo"selected";}?>>Uzos</option>		
</select>     
    
     
     </div>
     
      <div class="help-block with-errors"></div>
     
     
     
     
     </div>
     
     
     
     
             
     
      <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="fa fa-google"></span>
 	 </span>
     <input type="text" class="form-control"  value="<?php echo htmlspecialchars($result[5]); ?>" placeholder="Lien Google Map" required name="lien_map" data-error="Veuillez saisir le lien google map"></div>  
     <div class="help-block with-errors"></div>
   
     </div>
          
  
        <div class="row">
            
            <div class="col-md-6">      
  <div class="form-group has-feedback">
  	
  	 <div class="input-group">
 <span class="input-group-addon">
    <span class="fa fa-users"></span>
 	 </span>
           	 <select name="reunion_ouverte" class="form-control" required  data-error="Veuillez indiquez si la réunion est ouverte ou non">
                <option value="" selected disabled="disabled">Ouverte aux autres communes ?</option>
                <option value="1"<?php if($result[6]==1){echo"selected";}?>>oui</option>
                <option value="2"<?php if($result[6]==2){echo"selected";}?>>non</option>
            </select>                       
  
     </div><div class="help-block with-errors"></div>
</div></div>

<div class="col-md-6"> 
<div class="form-group has-feedback">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-ticket"></i>
                  </div>
                  <input class="form-control" type="text"  value="<?php if($result[8]!=0){echo $result[8];}?>" placeholder="Limite du nombre de places - [illimité : ne rien mettre]"  name="limite" > </div>
                  
</div></div>
</div>

    
      <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="fa fa-user"></span>
 	 </span>
     <input type="text" class="form-control"  value="Animateur(s) : <?php echo htmlspecialchars($result[9]); ?>"  required name="animateur" data-error="Veuillez saisir un animateur" disabled="true"></div>  
     <div class="help-block with-errors"></div>
   
     </div> 
    
    
  
                
               <br>
               
              
              <!-- /.box-body -->
              <div class="box-footer">
              	<div class="row">
         	   <div class="col-md-6"> 
              	
              	 <button type="button" class="btn btn-default" onclick="window.history.go(-1); return false;"><i class="fa fa-arrow-circle-left"></i> Annuler</button>  
                <button type="submit" class="btn btn-primary" ><i class="fa fa-floppy-o"></i> &nbsp; Mettre à jour la réunion</button>
                </div>
              <div class="col-md-2"></div>
              <div class="col-md-4" align="right">
              <button type="button" class="btn btn-danger" onclick="suppReunion(<?php echo $id_reunion; ?>);">
              	<i class="fa fa-trash-o"></i>&nbsp; Supprimer la réunion</button>
              </div>
              </div>
</div>
    
              
         
             <input type="hidden" name="id_reunion" value="<?php echo $id_reunion; ?>">
              
            </form>
          </div>

            </div><!-- /.col -->
          </div><!-- /.row -->
         
          
         </div>
          
          
      <div class="row">
            
            <div class="col-md-12">
     
        <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Liste des inscrits</h3>
     <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
     
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
   
   <table id="liste_admin" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      	<th>#</th>
                        <th>Nom / Prénom</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Composteur demandé</th>
                        <th>Présence</th>
                        <th>Composteur donné</th>
                        <th>Supp.</th>
                      </tr>
                    </thead>
                    <tbody>
 <?php
                  
 /* affichage de la liste des inscrits */
                                    
$afficheInscrits=$compostage->afficheInscrits($id_reunion); 


$compteur = 1;

foreach($afficheInscrits as $key){
			
		$id_usager=$key->id_usager;
		$nom=htmlspecialchars($key->nom);
		$prenom=htmlspecialchars($key->prenom);
		$telephone=htmlspecialchars($key->telephone);
		$email=htmlspecialchars($key->email);
		$presence_reunion=$key->presence_reunion;
		$composteur_donne=$key->composteur_donne;
		
		// nom/prenom fentre alerte
		$nomjs=$nom." ".$prenom;
		
		$composteur=$key->composteur;
		$couleur_lombri=htmlspecialchars($key->couleur_lombri);
		
		if($result[1]==1){if($composteur==1){$composteur_demande="oui";}else{$composteur_demande="non";}}
			else{if($composteur==1){$composteur_demande=$couleur_lombri;}else{$composteur_demande="non";}}
		
		 
echo"
<tr>
            <td style=\"width:5%; text-align: left\">$compteur</td>
            <td style=\"width: 20%; text-align: left\">$nom $prenom</td>
            <td style=\"width: 10%; text-align: left\">$telephone</td>
            <td style=\"width: 20%; text-align: left\">$email</td>      
			<td style=\"width: 10%; text-align: left\">$composteur_demande</td>
			<td style=\"width: 10%; text-align: left\"><input type=\"checkbox\"";

if ($presence_reunion == 1){echo " onclick=\"location.href='change_presence.php?id_user=$id_usager&etat=0&id_reunion=$id_reunion';\" checked ></td>";}else{echo " onclick=\"location.href='change_presence.php?id_user=$id_usager&etat=1&id_reunion=$id_reunion';\"></td>";}		

echo"
	
			<td style=\"width: 10%; text-align: left\"><input type=\"checkbox\"";
			
if ($composteur_donne== 1){echo " onclick=\"location.href='change_composteur.php?id_user=$id_usager&etat=0&id_reunion=$id_reunion';\" checked ></td>";}else{echo " onclick=\"location.href='change_composteur.php?id_user=$id_usager&etat=1&id_reunion=$id_reunion';\"></td>";}					

echo"			
			<td style=\"width: 15%; text-align: center\">
			<a href=\"#\" onclick=\"suppUser($id_reunion,$id_usager,new String('$nomjs'));\">
			<span class=\"label label-danger\"><i class=\"fa fa-trash-o\"></i>&nbsp;Supp.</span></a></td>		
</tr>";
     
$compteur++;		                           
                  
}                 
                  
/* Fin de l'affichage de la liste des Inscrits */   

?>                
                  
                    </tbody>
                   
                  </table>



  </div><!-- /.box-body -->
 
</div><!-- /.box -->
     
  
          
          </div>
          </div>
          
 
 
  <div class="row">
            
            <div class="col-md-12">
              <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Ajouter un participant</h3>
               <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
                <form name="inscriptionForm"  id="inscriptionForm" role="form" data-toggle="validator" action="ajout_participant.php" method="post" data-disable="false">
                <input type="hidden" name="id_reunion" value="<?php echo $id_reunion; ?>">
                 <input type="hidden" name="date_reunion" value="<?php echo $date; ?>">
              <div class="box-body">
           
           
            <div class="row">
            
           
              	
              	 <div class="col-md-6">
          <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-user"></span>
 	 </span>
     <input type="text" class="form-control" placeholder="Nom" required name="nom" data-error="Veuillez saisir votre nom"> </div>  
     <div class="help-block with-errors"></div>
  
     </div> </div>     
          
           <div class="col-md-6">
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
    <span class="glyphicon glyphicon-envelope"></span>
 	 </span>
     <input type="email" class="form-control" placeholder="Email" required name="email" data-error="Veuillez saisir votre email">  </div> 
     <div class="help-block with-errors"></div>
  
     </div>     
     
      <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-home"></span>
 	 </span>
     <input type="adresse" class="form-control" placeholder="Adresse" required name="adresse" data-error="Veuillez saisir votre adresse">  </div> 
     <div class="help-block with-errors"></div>
  
     </div>     
          
          
          
 <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-home"></span>
 	 </span>
    <select name="commune" class="form-control" required  data-error="Veuillez choisir votre lieu de résidence">
   <option value="" selected disabled="disabled">Lieu de résidence</option>
   <option value="15" >Arbus</option>
   <option value="16" >Aressy</option>
  	<option value="1" >Artigueloutan</option>
  	<option value="17" >Artiguelouve</option>
  	<option value="18" >Aubertin</option>
  	<option value="19" >Ausevielle</option>
  	<option value="20" >Beyrie-en-Béarn</option>
	<option value="2" >Billère</option>
	<option value="3" >Bizanos</option>
	<option value="21" >Bosdarros</option>
	<option value="22" >Bougarber</option>
	<option value="23" >Denguin</option>
	<option value="4" >Gan</option>
	<option value="5" >Gelos</option>
	<option value="6" >Idron</option>
	<option value="7" >Jurançon</option>
	<option value="24" >Laroin</option>
	<option value="8" >Lée</option>
	<option value="9" >Lescar</option>
	<option value="10" >Lons</option>
	<option value="11" >Mazères-Lezons</option>
	<option value="25" >Meillon</option>	
	<option value="12" >Ousse</option>	
	<option value="13" >Pau</option>
	<option value="26" >Poey-de-Lescar</option>
	<option value="27" >Rontignon</option>
	<option value="28" >Saint-Faust</option>
	<option value="14" >Sendets</option>	
	<option value="29" >Siros</option>
	<option value="30" >Uzein</option>
	<option value="31" >Uzos</option>		
                 </select>      
   
     
     
     </div>
     
       <div class="help-block with-errors"></div>
     
     
   
      </div>     
         
<?php if($result[1]==2){ ?>
           
<div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-tint"></span>
 	 </span>
    <select name="couleur" class="form-control" required  data-error="Veuillez choisir la couleur du composteur">
   <option value="" selected disabled="disabled">Couleur du lombricomposteur</option>
   <option value="vert">Vert anis</option>
  <option value="noir">Noir</option>
  <option value="beige">Beige</option>
  <option value="framboise">Framboise</option>
   </select>      
      
     </div>
      <div class="help-block with-errors"></div>
       </div>   
    
<?php } ?>                
                
                
                
                
                
             </div>
              <!-- /.box-body -->
              <!-- /.box-body -->
              <div class="box-footer">
              	 <button type="reset" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Annuler</button>  
                <button type="submit" class="btn btn-primary" ><i class="fa fa-floppy-o"></i> &nbsp; Ajouter le participant</button>
              </div>
            </form>
            
          </div>

            </div><!-- /.col -->
          </div><!-- /.row -->
 
 
  <div class="row">
            
            <div class="col-md-12">
              <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Envoyer un email aux absents</h3>
               <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
                <form name="inscriptionForm"  id="inscriptionForm" role="form" data-toggle="validator" action="envoi_email_absent.php" method="post" data-disable="false">
                <input type="hidden" name="id_reunion" value="<?php echo $id_reunion; ?>">
              <div class="box-body">
           
           
            <div class="row">
            <div class="col-md-12">
     
           
           
           <?php
           $etat_bouton="";
           $detail_disabled ="";
           
		   //verifie si date reunion est passé et si email pas deja envoye
           if($result[2]>$date_jour){ $etat_bouton="disabled"; $detail_disabled ="La date de la réunion n'est pas encore passée";}
		   else{if($result[10]==1){$etat_bouton="disabled";$detail_disabled="L'email à déja été envoyé";}}
		   
             
           
           
           ?>
           
           
           
           
  
              	<button type="submit" class="btn btn-warning" <?php echo $etat_bouton; ?>><i class="fa fa-floppy-o"></i> &nbsp; Envoyer l'email aux absents</button> &nbsp;&nbsp;&nbsp;<?php echo $detail_disabled; ?>
              	
               
			 </div>	
 </div>	
 	
                
                
                
                
             </div>
              <!-- /.box-body -->
              <!-- /.box-body -->
              <div class="box-footer">
              	
                
              </div>
            </form>
            
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
   
  
    
     <!-- InputMask -->
    <script src="../../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../../plugins/input-mask/jquery.inputmask.extensions.js"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="../../../plugins/jquery-ui-1.11.4/jquery-ui.min.js"></script>
    
       <!-- Datepicker -->
    <script src="../../../plugins/datepicker/bootstrap-datepicker.js"></script> 
    <script src="../../../plugins/datepicker/locales/bootstrap-datepicker.fr.js"></script> 
    
    <!--Validation du formulaire -->
    <script src="../../../include/js/validator.js"></script>
    <script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../plugins/datatables/dataTables.bootstrap.min.js"></script>

     <script src="../../../plugins/sweetalert2/sweetalert2.min.js"></script>
     <script src="https://cdn.jsdelivr.net/es6-promise/latest/es6-promise.auto.min.js"></script> <!-- IE support -->
    
    	
    <script>
      $(function () {

      
  		//masque de saisie heure 
         $("#datemask").inputmask("hh:mm", {"placeholder": "hh:mm"});
         $("[data-mask]").inputmask();      
       
        
        // datepicker Jquery UI
  	$('#datepicker').datepicker({
    	 weekStart:1,
    	 color: 'orange',
		 format: 'dd/mm/yyyy',
		 language: "fr-FR", 
		 autoclose: true
		  });
		  
		  
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
      
 function suppUser(idreunion,iduser,utilisateur) {
  	  
  swal({
  title: 'Etes vous sûr de vouloir supprimer cet utilisateur ?',
  text: ""+utilisateur,
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Oui, on supprime !',
  cancelButtonText: 'Annuler !'
}).then(function () {
 document.location.href="supp_user.php?id_user="+iduser+"&id_reunion="+idreunion;
})
    
 }   
 
  function suppReunion(idreunion) {
  	  
  swal({
  title: 'Etes vous sûr de vouloir supprimer cette réunion ?',
  text: "",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Oui, on supprime !',
  cancelButtonText: 'Annuler !'
}).then(function () {
 document.location.href="supp_reunion.php?id_reunion="+idreunion; 
 
 
 })
    
 }        
      
 function Ajoutparticipant() {
  	  
  swal({
  title: 'Participant ajouté avec succès !',
  text: "",
  type: 'success',

})
    
 }     
 
 function Emailabsent() {
  	  
  swal({
  title: 'Email aux absents envoyé avec succès !',
  text: "",
  type: 'success',

})
    
 }             
      
      
      
    </script>


 
  </body>
</html>