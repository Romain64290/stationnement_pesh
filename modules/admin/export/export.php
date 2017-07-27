<?php

/***** Dernière modification : 08/09/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/../../../plugins/PHPExcel-1.8//Classes/PHPExcel.php');
require(__DIR__ .'/model.inc.php');


// préparation connexion
$connect = new connection();
$export = new export($connect);

 /***********************************************************************
 * Export en cours 
 **************************************************************************/


if($_GET['export']=='encours'){
    
//modification de la variable en base pour signaler "export en cours"  
// Creation des dates de validité
$export_en_cours=$export->exportEnCoursEncours();

//Création d'un fichier d'export
 if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');
  
  
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Agglométation Pau Béarn Pyrénées")
							 ->setLastModifiedBy("Romain TALDU")
							 ->setTitle("Liste blanche stationnement")
							 ->setSubject("Liste blanche stationnement")
							 ->setDescription("Export liste blanche stationnement")
							 ->setKeywords("stationnement")
							 ->setCategory("");


// Affichage ligne 
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Entête, ligne supprimée lors de l import AFS2R');
          

        
//Section des demandes validée      
$select_valide=$export->selectValide();

 $compteur = 2;
 

	 foreach($select_valide as $key){
			
		
                 $immatriculation=htmlspecialchars($key->immatriculation);
                 $date_validite=$key->date_validite;
                 
        
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $compteur, $immatriculation);
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $compteur, $date_validite);
        


$compteur++;

         }



// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Liste blanche stationnement');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (OpenDocument)
header('Content-Type: application/vnd.oasis.opendocument.spreadsheet');
header('Content-Disposition: attachment;filename="export_listeblanche.ods"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'OpenDocument');
$objWriter->save('php://output');
exit;

}


 /***********************************************************************
 * Export validé
 **************************************************************************/

if($_GET['export']=='ok'){$export_en_cours=$export->exportEnCoursOk();}

//envoi un email de confirmation aux inscrits

 /***********************************************************************
 * Export annulé 
 **************************************************************************/

if($_GET['export']=='abort'){$export_en_cours=$export->exportEnCoursAbort();}

header('Location:index.php');
