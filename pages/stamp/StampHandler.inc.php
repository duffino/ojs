<?php
    import('classes.handler.Handler');
    //$pdf->fullPathToFile = "TestClanek.pdf";
    class StampHandler extends Handler {
        function stampingOperation($args, $request) {
             
            $templateMgr = TemplateManager::getManager($request);
            $templateMgr->display('stamp/stampingOperation.tpl');
          /*              
            require_once('lib/tcpdf/tcpdf.php'); //$_SERVER['DOCUMENT_ROOT'].
            require_once('fpdi.php'); //$_SERVER['DOCUMENT_ROOT'].
            
            //global $fullPathToFile;
            //$pdf->fullPathToFile = "TestClanek.pdf";
            require('class.php');
              
                    // initiate PDF
                    $pdf = new PDF();
                    $pdf->fullPathToFile = "c:/xampp/htdocs/ojs245/pages/stamp/TestClanek.pdf";
                    if($pdf->numPages>0) {
                        for($i=1;$i<=$pdf->numPages;$i++) {
                            $pdf->endPage();
                            $pdf->_tplIdx = $pdf->importPage($i);
                            $pdf->AddPage();
                        }
                    }
                        $file_time = time();
                        
                        $pdf->Output("$file_time.pdf", "F");//, "I"); 
                        echo "Link - edited PDF: '<a href=$file_time.pdf>Edited file</a>'";      
    
     */ 
    
    
    $articleDao =& DAORegistry::getDAO('ArticleDAO');
    $articleFileDao =& DAORegistry::getDAO('ArticleFileDAO');
    import('classes.file.ArticleFileManager');
    
    $journalId = (int) $journalId;                                                           
    
    $articles = $articleDao->getArticlesByJournalId($journalId);
    while ($article =& $articles->next()) {
    $articleFileManager = new ArticleFileManager($article->getId());
    $articleFiles =& $articleFileDao->getArticleFilesByArticle($article->getId());
    foreach ($articleFiles as $articleFile) {
        echo 'FILE';
    }
    unset($article);
    }



    
    }
            }   
?>