 <?php

/***** Dernière modification : 24/08/2016, Romain TALDU	*****/
 if (!isset($ss_menu)){$ss_menu="";}
 ?>    
  <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <?php echo $_SESSION['photo_membre']." class=\"img-circle\" alt=\"User Image\">";?>
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['prenom_membre'];?>  <?php echo $_SESSION['nom_membre']; ?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MENU DE NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->
          
             <li <?php if($menu==1){echo "class=\"active\"";}?>>
             <a href="../dashboard/index.php"><i class="fa fa-dashboard active"></i> <span>Tableau de bord</span></a>
            </li>
            
                         
             <li class="treeview <?php if($menu==4){echo "active";}?>">
          <a href="#">
            <i class="fa fa fa-user"></i> <span>Ajout usager</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul style="display: <?php if($menu==4){echo "yes";}else{echo "no";} ?>;" class="treeview-menu menu-open">
          	<li <?php if($ss_menu==41){echo "class=\"active\"";}?>><a href="../ajout_noemail/index.php"><i class="fa fa-circle-o"></i> Usager sans email</a></li>
          	<li <?php if($ss_menu==42){echo "class=\"active\"";}?>><a href="../ajout_specifique/index.php"><i class="fa fa-circle-o"></i> Usager spécifique</a></li>
           
           
          </ul>
        </li>
            
            
            
            
            
            
               <li <?php if($menu==2){echo "class=\"active\"";}?>>
            <a href="../export/index.php"><i class="fa fa-external-link-square"></i> <span>Export AFS2R</span></a>
            </li>
            
                
            <?php if($_SESSION['id_typemembre']==4){ ?>
             
              <li <?php if($menu==3){echo "class=\"active\"";}?>>
            <a href="../administrateurs/index.php"><i class="fa fa-users"></i> <span>Gestion des admin</span>
            </a>
            </li>
            
            <?php } ?>
            
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>