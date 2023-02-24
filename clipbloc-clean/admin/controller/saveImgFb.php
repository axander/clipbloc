<?php

    if (isset($GLOBALS["HTTP_RAW_POST_DATA"]))
{
	// Get the data
	$imageData=$GLOBALS['HTTP_RAW_POST_DATA'];

	// Remove the headers (data:,) part.  
	// A real application should use them according to needs such as to check image type
	$filteredData=substr($imageData, strpos($imageData, ",")+1);

	// Need to decode before saving since the data we received is already base64 encoded
	$unencodedData=base64_decode($filteredData);
	
	//echo "unencodedData".$unencodedData;

	// Save file.  This example uses a hard coded filename for testing, 
	// but a real application can specify filename in POST variable
	if($_GET['ext']=="png"){
		header('Content-Type: image/png');
	}else if($_GET['ext']=="jpg"){
		header('Content-Type: image/jpeg');
	}
	header("Content-Disposition: attachment; filename=".$_GET['endName'].".".$_GET['ext']);


        if(!is_dir($_GET['URL'])){
            mkdir($_GET['URL'], 0311, true);
        }
        $fp = fopen( $_GET['URL'].$_GET['endName'].".jpg", 'wb' );
      
	
	fwrite( $fp, $unencodedData);
	fclose( $fp );
	$name = ''; $type = ''; $size = ''; $error = '';
	function compress_image($source_url, $destination_url, $quality) {
  
		$info = getimagesize($source_url);

    		if ($info['mime'] == 'image/jpeg')
        			$image = imagecreatefromjpeg($source_url);

    		elseif ($info['mime'] == 'image/gif')
        			$image = imagecreatefromgif($source_url);

   		elseif ($info['mime'] == 'image/png')
        			$image = imagecreatefrompng($source_url);

    		imagejpeg($image, $destination_url, $quality);

                


		return $destination_url;
	}
        if(isset($_GET['compress'])){
           $compression=$_GET['compress'];
        }else{
            $compression=100;
        }
        if($_GET['ext']!="png"){
            compress_image($_GET['URL'].$_GET['endName'].".".$_GET['ext'], $_GET['URL'].$_GET['endName'].".".$_GET['ext'], $compression);
        }

	if ($_POST) {

                

    		if ($_FILES["file"]["error"] > 0) {
        			$error = $_FILES["file"]["error"];
    		} 
    		else if (($_FILES["file"]["type"] == "image/gif") || 
			($_FILES["file"]["type"] == "image/jpeg") || 
			($_FILES["file"]["type"] == "image/png") || 
			($_FILES["file"]["type"] == "image/pjpeg")) {

        			$url = $_GET['URL'].$_GET['endName'];

        			$filename = compress_image($_GET['URL'].$_GET['endName'].".".$_GET['ext'], $url, 80);
        			$buffer = file_get_contents($url);

        			/* Force download dialog... */
        			header("Content-Type: application/force-download");
        			header("Content-Type: application/octet-stream");
        			header("Content-Type: application/download");

			/* Don't allow caching... */
        			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

        			/* Set data type, size and filename */
        			header("Content-Type: application/octet-stream");
        			header("Content-Transfer-Encoding: binary");
        			header("Content-Length: " . strlen($buffer));
        			header("Content-Disposition: attachment; filename=$url");

        			/* Send our file... */
        			echo $buffer;
    		}else {
        			$error = "Uploaded image should be jpg or gif or png";
    		}
	}
}
?>