<?php

/***** Dernière modification : 12/09/2016, Romain TALDU	*****/

class includes {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
    }
/***********************************************************************
 * Compte le nbre dde d'Admin en attente
 **************************************************************************/
  
 function adminAttente()
  {
   
	
	try { 
$select = $this->con->prepare('SELECT COUNT(*) as nbr FROM membres
                        WHERE validation_inscription= :etat');

$select->bindValue(':etat', 0, PDO::PARAM_INT);
$select->execute();	
	}
	catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors du calcul du nombre d'admin en attente/b>\n";
            throw $e;
        	}



$result = $select->fetch();
$quantite=$result['nbr'];
		
		
if ($quantite!=0){$resultat="<small class=\"label pull-right bg-yellow\">$quantite</small>";}else{$resultat="";}

return  $resultat;
      
   
}
 
 
}