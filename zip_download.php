<?php
include 'ChromePhp.php';

ChromePhp::log("Start ziping");

$files = $_POST["files"];
ChromePhp::log("Got file list");
ChromePhp::log($files);

$zipname = 'downloads/download.zip';
$zip = new ZipArchive;
$zip->open($zipname, ZipArchive::CREATE|ZipArchive::OVERWRITE);

foreach ($files as $file) {
    if (is_dir($file)) {
        continue;
    }
    else{
        ChromePhp::log("Found File: ".$file);
        $zip->addFile($file);
    }
}

$zip->close();
ChromePhp::log('Finished ziping');
    

?>
