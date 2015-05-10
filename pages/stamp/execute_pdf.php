<?php
             //
            

// UPLOAD FORM //

  // konfigurace
  /*
  $uploadDir = './soubory'; // adresar, kam se maji nahrat obrazky (bez lomitka na konci)
  $allowedExt = array('pdf', 'PDF'); // pole s povolenymi priponami
   
  // zpracovani uploadu
  if(isset($_FILES['soubory']) && is_array($_FILES['soubory']['name'])) {
   
      $counter = 0;
      $allowedExt = array_flip($allowedExt);
      foreach($_FILES['soubory']['name'] as $klic => $nazev) {
   
          $fileName = basename($nazev);
          $tmpName = $_FILES['soubory']['tmp_name'][$klic];
   
          // kontrola souboru
          if(
              !is_uploaded_file($tmpName)
              || !isset($allowedExt[strtolower(pathinfo($fileName, PATHINFO_EXTENSION))])
          ) {                               
              // neplatny soubor nebo pripona
              continue;
          }
   
          // presun souboru
          if(move_uploaded_file($tmpName, "{$uploadDir}".DIRECTORY_SEPARATOR."{$fileName}")) {
              ++$counter;
          }
   
      }
   
      if($counter>0)
            { echo "<p>Bylo nahráno {$counter} z ".sizeof($_FILES['soubory']['name'])." souborů.</p>";
            
            //
            
            //
       */
require_once('lib/tcpdf/tcpdf.php'); //$_SERVER['DOCUMENT_ROOT'].
require_once('fpdi.php'); //$_SERVER['DOCUMENT_ROOT'].

// Original file with multiple pages 
$fullPathToFile = "TestClanek.php";   // "{$uploadDir}".DIRECTORY_SEPARATOR."{$fileName}"; //


require_once('class.php');
        
        // initiate PDF
        $pdf = new PDF();
        
        // add a page
        //$pdf->AddPage("schval.pdf");
        //$pdf->AddPage();
        
    
        if($pdf->numPages>1) {
            for($i=2;$i<=$pdf->numPages;$i++) {
                $pdf->endPage();
                $pdf->_tplIdx = $pdf->importPage($i);
                $pdf->AddPage();
                //$pdf->SetPrintHeader(false);
                //$pdf->SetPrintFooter(false);
            }
        }

        // or Output the file as forced download
            $file_time = time();
            
            $pdf->Output("$file_time.pdf", "F");//, "I"); 
            echo "Odkaz na výsledný soubor: '<a href=$file_time.pdf>Upravený soubor</a>'";
?>