<?php
require_once('lib/tcpdf/tcpdf.php');
require_once('fpdi.php');



$pdf = new FPDI('P','mm','Letter');

$pdf->setSourceFile('TestClanek6.pdf');  
  
$tplidx1 = $pdf->importPage(2);  
$pdf->addPage();  
$pdf->useTemplate($tplidx1, 10, 10, 200);  
// Generate some content for page 1  
  
$tplidx2 = $pdf->importPage(1);  
$pdf->addPage();  
$pdf->useTemplate($tplidx2, 10, 10, 90);  
// Generate some content for page 2  
  
$pdf->Output('newpdf.pdf', 'I'); 
?>