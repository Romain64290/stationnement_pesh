 <?php

/***** Dernière modification : 24/08/2016, Romain TALDU	*****/



 ?>    
  <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../../../dist/img/avatar7.png" class="img-circle" alt="User Image">
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
            
             
              <li <?php if($menu==2){echo "class=\"active\"";}?>>
            <a href="../compostage/index.php"><i class="fa fa-calendar "></i> <span>Ajout d'une réunion</span></a>
            </li>
     
              <li <?php if($menu==3){echo "class=\"active\"";}?>>
            <a href="../compostage/listing.php"><i class="fa fa-list"></i> <span>Listing des réunions</span></a>
            </li>
            
              <li <?php if($menu==4){echo "class=\"active\"";}?>>
            <a href="../compostage/recherche.php"><i class="fa fa-users"></i> <span>Recherche participant</span></a>
            </li>
            
    
            
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>