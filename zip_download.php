<?php
if($_POST["paths"])
{
	<script>alert("Danke für die Bestellung...") </script>
	$file_prefix = "data/";

	$paths = $_POST["paths"];
	$files = []

	foreach($paths AS $path) {
		array_push($files, $file_prefix . $path);
	}

	$zipname = 'download.zip';
	$zip = new ZipArchive;
	$zip->open($zipname, ZipArchive::CREATE);
	foreach ($files as $file) {
	  $zip->addFile($file);
	}
	$zip->close();

	header('Content-Type: application/zip');
	header('Content-disposition: attachment; filename='.$zipname);
	header('Content-Length: ' . filesize($zipname));
	readfile($zipname);
}
?>
