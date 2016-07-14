<?php

phpinfo();
if($_POST["files"])
{
	$files = $_POST["files"];

	$zipname = 'downloads/download.zip';
	$zip = new ZipArchive;
	$zip->open($zipname, ZipArchive::CREATE);
	foreach ($files as $file) {
          if (!is_dir($file))
            $zip->addFile($file);
	}
	$zip->close();
	
}
?>
