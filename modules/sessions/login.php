<?php 

/***** Dernière modification : 02/08/2016, Romain TALDU	*****/

require('../../include/config.inc.php');

$login=$_POST['login']."@LOCAL.AGGLO-PAU.FR";
 
$ldapconn = ldap_connect(LDAPSERVEUR) or die("Could not connect to LDAP server.");

// a creuser......
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

if($ldapconn) {
    // binding to ldap server
    $ldapbind = ldap_bind($ldapconn,$login,$_POST['password']);
    // verify binding
    if ($ldapbind) {
               
        $result = ldap_search($ldapconn,LDAPTREE,'(&(samaccountname='.$_POST['login'].')('.FILTERSUPERADMIN.'))') or die ("Error in search query: ".ldap_error($ldapconn));
        $data = ldap_get_entries($ldapconn, $result); }
        
        // erreur identification
        else{ header ('location: ../../admin/index.php?erreur=1');exit;}
        
        
        $nbr=$data["count"];
        
        if($nbr==1){
            
        
  
        session_start();
  
        $_SESSION['id_membre'] = $data[0]['samaccountname'][0];
	$_SESSION['type_membre'] = "Super adminstrateur";
        $_SESSION['id_typemembre'] = 4;
        
        $_SESSION['nom_membre'] = $data[0]["sn"][0];
        $_SESSION['prenom_membre'] = $data[0]["givenname"][0];
        
         if(isset($data[0]["thumbnailphoto"][0])) {    
                
            $photo=base64_encode($data[0]["thumbnailphoto"][0]); 
            
            $_SESSION['photo_membre']= "<img src=\"data:image/jpeg;base64, $photo\"";
            
               }else{
            $_SESSION['photo_membre']= "<img src=\"../../../dist/img/avatar7.png\" class=\"user-image\" alt=\"User Image\">";
            }
 
       
        
        header ('location: ../../modules/admin/dashboard/index.php');    

            
            
        }
        else{
            //erreur d'authentification
         header ('location: ../../admin/index.php?erreur=2');   
        }
}  
   
               


