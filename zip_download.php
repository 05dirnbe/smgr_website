<?php
include 'ChromePhp.php';

ChromePhp::log("Start ziping");
$perl = new Perl();
$perl->require("test2.pl");
ChromePhp::log("Finished ziping");;

?>

