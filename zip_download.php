<?php
if($_POST["files"])
{
	$files = $_POST["files"];

	$zipname = 'download.zip';
	$zip = new ZipArchive;
	$zip->open($zipname, ZipArchive::CREATE);
	foreach ($files as $file) {
          if (!is_dir($file))
            $zip->addFile($file);
	}
	$zip->close();

	header("Content-Disposition: attachment; filename=\"" . basename($zipname) . "\"");
        header("Content-Type: application/force-download");
        header("Content-Length: " . filesize($zipname));
        header("Connection: close");      
	
	
	
}
?>
