<?php

/***** Dernière modification : 18/07/2017, Romain TALDU	*****/

class administrateurs {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
    }


 /***********************************************************************
 * Affichage des administrateurs
 **************************************************************************/
  
 function afficheAdmin()
  {
  	 
 // recherche des administrateurs
 $ldapconn = ldap_connect(LDAPSERVEUR) or die("Could not connect to LDAP server.");

// a creuser......
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

if($ldapconn) {
    // binding to ldap server
    $ldapbind = ldap_bind($ldapconn,LDAPUSER,LDAPPASS);
    // verify binding
    if ($ldapbind) {
               
        $result = ldap_search($ldapconn,LDAPTREE,FILTERSUPERADMIN) or die ("Error in search query: ".ldap_error($ldapconn));
        $data = ldap_get_entries($ldapconn, $result); }
        
        // erreur identification
       // else{ header ('location: ../../admin/index.php?erreur=1');exit;}
        
        //trie du tableau
     usort($data, array($this, 'comparer'));

        
        // fonction qui compare les valeurs post_name l'une à l'autre
       
}
      
return $data;


  
}

function comparer($a, $b) {
       return strcmp($a["sn"][0], $b["sn"][0]);
	}
        
        }