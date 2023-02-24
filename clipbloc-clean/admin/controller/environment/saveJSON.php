<?php
 if (isset($_POST['method'])){
	$method=$_POST['method'];
    }
 if (isset($_POST['CUERPO'])){
	$CUERPO=$_POST['CUERPO'];
    }
if (isset($_POST['JSON'])){
	$JSON=$_POST['JSON'];
    }
 if (isset($_POST['URL'])){
	$URL=$_POST['URL'];
    }
 if (isset($_POST['URL0'])){
	$URL0=$_POST['URL0'];
    }



$ar=fopen($URL,"w+") or
die("Problemas en la creacion");
$CUERPO= str_replace('&', '&amp;', $CUERPO);
fwrite($ar,stripslashes($CUERPO));


$ar=fopen($URL0,"w+") or
die("Problemas en la creacion");
$CUERPO= str_replace('&', '&amp;', '{"items":[]}' );
fwrite($ar,stripslashes($CUERPO));

$ar=fopen($JSON,"w+") or
die("Problemas en la creacion");
$CUERPO= str_replace('&', '&amp;', '{"items":[]}' );
fwrite($ar,stripslashes($CUERPO));


fclose($ar);

header('Content-Type: text/xml');
  echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n";

?>

<response>
  <command method="<?PHP echo $method ?>">
   <message><![CDATA[<?PHP if(isset($data) ){echo htmlspecialchars(base64_encode(json_encode($data)));}else{echo base64_encode("noData");} ?>]]></message>
    <count></count>
  </command>
</response>