<?php
 
 /***** Dernière modification : 08/07/2016, Romain TALDU	*****/
 
  /*** Définition de l'ensemble des constantes ***/ 
   
   
   
  // Adresse du serveur de base de données
  define('DB_SERVEUR', 'localhost');

  // Login
  define('DB_LOGIN','root');
 
  // Mot de passe
  define('DB_PASSWORD','eruption');
 
  // Nom de la base de données
  define('DB_NOM','stationnement');
 
  // Driver correspondant à la BDD utilisée
  define('DB_DSN','mysql:host='. DB_SERVEUR .';dbname='. DB_NOM);

    
  // DATE DU JOUR (DATE TIME)
  define('DATETIME_JOUR', date('Y-m-d H:i:s'));
  
 // From email prod
  define("FROM_EMAIL","NO-REPLY@agglo-pau.fr");
  
  
  // Réglage des locales
  setlocale(LC_ALL, 'fr_FR.UTF-8');
  
  // Adresse du site
  define('URL_SITE', 'http://stationnement.local');
  
  
  //balise <title>
  define("TITLE", "Contrôle automatisé du stationnement");
  
      // URL-CHEMIN_UPLOAD
  define('CHEMIN_UPLOAD', '/var/www/stationnement/modules/public/upload/');
  
   // MAX-SIZE-UPLOAD
  define('MAX-SIZE-UPLOAD', '1000000000');
  
  
  //LDAP
   define("LDAPSERVEUR", "192.168.1.218");
   define("LDAPTREE", "dc=LOCAL,dc=AGGLO-PAU,dc=FR");
   define("FILTERSUPERADMIN", "memberof=CN=GE-DN-DevNumerique,OU=Entités,OU=Groupes,OU=CAPBP,DC=local,DC=agglo-pau,DC=fr");
  
//$ldapuser = 'LOCAL\svc-adsync';
//$ldappass = 'hinUCeWVCuCyCP08TdcH';

  