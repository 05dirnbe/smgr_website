<?php
include 'ChromePhp.php';

define("UPPER_BOUND", 6, true);
define("EXPERATION_BOUND", 24, true);

$old_files = array();

if ($handle = opendir('/downloads')){
    while (false !== ($entry = readdir($handle))) {
        if($entry != "." && $entry != ".."){
            $old_files[filemtime($entry)] =$entry;
        }
    }

    closedir($handle);

    ksort($old_files);

    $experation_date = time() - EXPERATION_BOUND * 60 * 60;
    $del_array = array();

    foreach ($old_files as $cur_file) {
        if(filemtime($cur_file) < $experation_date) {
            unlink($cur_file);
            $del_array.array_push($cur_file);
        }
    }

    foreach ($del_array as $del_file){
        $key = array_search($del_file);
        unset($old_files[$key]);
    }

    $del_iterator =  count($old_files) - UPPER_BOUND;

    if($del_iterator > 0){
        for ($i = 0; $i < $del_iterator; $i++){
            array_pop($old_files);
        }
    }
}




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
