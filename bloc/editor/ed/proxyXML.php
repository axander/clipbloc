<?php
	header('Access-Control-Allow-Origin: *');
    $filename = $_GET['url'];
	header('Content-Type: text/xml');
	readfile($filename);
?>