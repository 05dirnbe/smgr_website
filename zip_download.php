<?php
include 'ChromePhp.php';

ChromePhp::log("Start ziping");

$files = $_POST["files"];
$filename = $_POST["filename"];
$substring_length = strlen("data/root/");
ChromePhp::log("Save zip as " .$filename);
ChromePhp::log("Got file list");
ChromePhp::log($files);

$zipname = 'downloads/' .$filename. '.zip';
$zip = new ZipArchive;
$zip->open($zipname, ZipArchive::CREATE|ZipArchive::OVERWRITE);


foreach ($files as $file) {
    if (is_dir($file)) {
        continue;
    }
    else{
        ChromePhp::log("Found File: ".$file);
        $zip->addFile($file, substr($file, $substring_length));
    }
}

$zip->close();
ChromePhp::log('Finished ziping');
    

?>
