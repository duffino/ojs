<?php

  class PDF extends FPDI {
    var $_tplIdx;
    var $fullPathToFile;
        
      function Header() {
      
        echo $this->fullPathToFile;
                    if(is_null($this->_tplIdx)) {
                    
                    $this->numPages = $this->setSourceFile($this->fullPathToFile); //$this->fullPathToFile
                    $this->_tplIdx = $this->importPage(1);
                    } 
                    if($this->page > 0) {
                        $this->SetFont('helvetica', 'I', 10); 
                        $this->SetTextColor(0);
                        $this->Write(15, "Cislo: 1, autor 2 cislo 3\n");
                        $this->Image('logo.png', 100, 2, 75,7);            
                    } //end IF
          $this->useTemplate($this->_tplIdx, 0, 0,200);
        }           //end HEADER
  }        //end CLASS
?>