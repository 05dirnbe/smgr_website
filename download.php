<?php 
  //header("Content-Type: application/octet-stream");
  //header("Content-Disposition: attachment; filename=".$_GET['path']);
  //readfile($_GET['path']);
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename=download.zip');
    header('Pragma: no-cache');
    readfile("./downloads/download.zip");
?>