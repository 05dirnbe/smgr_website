<?php 
  //header("Content-Type: application/octet-stream");
  //header("Content-Disposition: attachment; filename=".$_GET['path']);
  //readfile($_GET['path']);
    
    $filename = $_GET['filename'];
    $file = './downloads/'.$filename.'.zip';
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename=download.zip');
    header('Pragma: no-cache');
    readfile($file);
    /*ignore_user_abort(true);
    if (connection_aborted()) {
        unlink($file);
}*/
?>