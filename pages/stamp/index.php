<?php
  switch($op) {
      case 'stampingOperation':
            define('HANDLER_CLASS', 'StampHandler');
            import('pages.stamp.StampHandler');
            break;
  }
?>