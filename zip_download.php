<?php
include 'ChromePhp.php';

// List all files as paths
$file_paths = array();

ChromePhp::log("Start ziping");

function listFolderFiles(&$dir, &$file_paths, &$path){
    $ffs = scandir($dir);
    //$path = $path .'/'.$dir;
    //ChromePhp::log($ffs);
    foreach($ffs as $ff){
        if($ff != '.' && $ff != '..'){
            if(is_dir($dir.'/'.$ff)) {
                //$path = $path . $dir;
                //listFolderFiles($dir.'/'.$ff, $file_paths, $path);           
            }    
            else {
                //file = $dir.'/'.$ff;
                //array_push($file_paths, $file);
                //ChromePhp::log("Path added to file list: " $file);
            }

        }
    }
}


$files = $_POST["files"];
ChromePhp::log("Got file list");
ChromePhp::log($files);

foreach ($files as $file) {
    if (is_dir($file)) {
        ChromePhp::log("Found folder! " . $file);
        $path = "data/root";
        listFolderFiles($file, $file_paths, $path);
    }
    else
        array_push($file_paths, $file);
}

$zipname = 'downloads/download.zip';
$zip = new ZipArchive;
$zip->open($zipname, ZipArchive::CREATE|ZipArchive::OVERWRITE);

/*foreach ($files as $file) {
    if (is_dir($file)) {
        ChromePhp::log("BLAAA");
    }
    else
        ChromePhp::log("BL!!!!AAA");
        array_push($file_paths, $file);
}*/

foreach ($file_paths as $file_name) {
        ChromePhp::log("Found File: ".$file_name);
        $zip->addFile($file_name);
}
$zip->close();
ChromePhp::log('Finished ziping');
    

?>
