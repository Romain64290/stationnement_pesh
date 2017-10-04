<?php

/***** Dernière modification : 08/09/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/../../../plugins/PHPMailer/class.phpmailer.php');
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
            ->setCellValue('A1', 'Plaque')
            ->setCellValue('B1', 'Description')
            ->setCellValue('C1', 'Durée de vie')
            ->setCellValue('D1', 'JourAutorisé')
            ->setCellValue('E1', 'Liste des zones')
            ->setCellValue('F1', 'Liste des Natinfs')
            ->setCellValue('G1', 'Natinf')
            ->setCellValue('H1', 'Alerte Croisement')
            ->setCellValue('I1', 'Type')
           ->setCellValue('J1', 'DébutPériode1')
            ->setCellValue('K1', 'FinPériode1')
            ->setCellValue('L1', 'DébutPériode2')
            ->setCellValue('M1', 'FinPériode2')
            ->setCellValue('N1', 'DébutPériode3')
            ->setCellValue('O1', 'FinPériode3');

        
//Section des demandes validée      
$select_valide=$export->selectValide();

 $compteur = 2;
 

	 foreach($select_valide as $key){
			
		
  $immatriculation=htmlspecialchars($key->immatriculation);
                 
  $date_validite=$key->date_validite;
  
  $now   = time();
  $date_validite = strtotime($date_validite);
  
  $difference = $date_validite - $now;
  
  $difference= round($difference / 3600);
  if ($difference <0){$difference=0;}
                 
  $type_decla=$key->type_decla;
                 
  switch ($type_decla) {
    case 1:
        $type_decla="PMR";
        break;
    case 2:
        $type_decla="Prof de santé";
        break;
    case 3:
        $type_decla="Services de polices / Gendarmerie";
        $difference="";
        break;
    case 4:
        $type_decla="Pool agglo";
        $difference="";
        break;
   case 5:
       $type_decla="CCAS - Pro Santé";
       $difference="";
       break;
   case 6:
       $type_decla="Temporaire";
       $difference="";
       break;
}
                 

    
        
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $compteur, $immatriculation);
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $compteur, $type_decla);
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $compteur, $difference);
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $compteur,"");
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $compteur, "");
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $compteur, "");
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $compteur, "");
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7, $compteur, "Non");
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8, $compteur, 0);
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(9, $compteur, "");
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(10, $compteur, "");
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(11, $compteur, "");
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(12, $compteur, "");
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(13, $compteur, "");
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(14, $compteur, "");
        


$compteur++;

         }

   $compteur--;
   
     $objPHPExcel->getActiveSheet()
    ->getStyle('A2:A'.$compteur)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);  
     
     $objPHPExcel->getActiveSheet()
    ->getStyle('B2:B'.$compteur)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
     
   /*  
     $objPHPExcel->getActiveSheet()
    ->getStyle('C2:C2048')
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);*/
         
       $objPHPExcel->getActiveSheet()
    ->getStyle('E2:E'.$compteur)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);  
     
         $objPHPExcel->getActiveSheet()
    ->getStyle('F2:F'.$compteur)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
         
      $objPHPExcel->getActiveSheet()
    ->getStyle('G2:G'.$compteur)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
      
        $objPHPExcel->getActiveSheet()
    ->getStyle('H2:H'.$compteur)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
         
     
     $objPHPExcel->getActiveSheet()
    ->getStyle('J2:J'.$compteur)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME4); 
          
    $objPHPExcel->getActiveSheet()
    ->getStyle('K2:K'.$compteur)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME4); 
               
    $objPHPExcel->getActiveSheet()
    ->getStyle('L2:L'.$compteur)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME4); 
                    
     $objPHPExcel->getActiveSheet()
    ->getStyle('M2:M'.$compteur)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME4); 
     
      $objPHPExcel->getActiveSheet()
    ->getStyle('N2:N'.$compteur)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME4); 
                         
    $objPHPExcel->getActiveSheet()
    ->getStyle('O2:O'.$compteur)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME4);     


// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('AGL_Liste blanche stationnement');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Create a new worksheet called "My Data"
$myWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'My Data');
// Attach the "My Data" worksheet as the first worksheet in the PHPExcel object
$objPHPExcel->addSheet($myWorkSheet, 1);

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="liste.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

exit;

}


 /***********************************************************************
 * Export validé
 **************************************************************************/

if($_GET['export']=='ok'){$export_en_cours=$export->exportEnCoursOk();}



 /***********************************************************************
 * Export annulé 
 **************************************************************************/

if($_GET['export']=='abort'){$export_en_cours=$export->exportEnCoursAbort();}

header('Location:index.php');
