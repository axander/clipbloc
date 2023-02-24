<?php

	$filename =$_GET['url'];
	/*$ext=strtolower(end(explode('.', $filename)));
	switch ($ext) {
		case 'jpg':
			$mime = 'image/jpeg';
			break;
		case 'gif':
			$mime = 'image/gif';
			break;
		case 'png':
			$mime = 'image/png';
			break;
		default:
			$mime = false;
	}
        echo $mime;

	if ($mime) {
   	 	
    	//header('Content-length: '.filesize($pic));
	}*/
header("Content-type: image/png");
	readfile($filename);





?>