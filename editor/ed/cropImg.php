<?php
        if(isset($_POST['NUM'])){
            $imgNum = $_POST['NUM'];
            $file = $imgNum . '.png';   
        }else{
            $file = 'UPLOAD_DIR' . uniqid() . '.png';
        }
	
   	$img = $_POST['CUERPO'];
	$DIR = $_POST['URL'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
        
    $unencodedData=base64_decode($img);
	if (file_exists('../'.$DIR)) {
		
	} else {
		@mkdir( '../'.$DIR );
	}
    $fp = fopen( '../'.$DIR.$file, 'wb' );
    fwrite( $fp, $unencodedData);
    fclose( $fp );
	echo($file);
 
	

?>