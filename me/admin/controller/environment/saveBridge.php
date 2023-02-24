<?php
 if (isset($_POST['method'])){
	$method=$_POST['method'];
    }
 if (isset($_POST['CUERPO'])){
	$CUERPO=$_POST['CUERPO'];
    }

 if (isset($_POST['URL'])){
	$URL=$_POST['URL'];
    }
 if (isset($_POST['BRIDGE'])){
	$BRIDGE=$_POST['BRIDGE'];
    }

session_start();

if(isset($_SESSION["bridge"]) && $_SESSION["bridge"]==trim($BRIDGE)){

$string=$CUERPO;

$ar=fopen($URL,"w+") or
die("Problemas en la creacion");
$CUERPO= str_replace('&', '&', $string);
fwrite($ar,stripslashes($CUERPO));
fclose($ar);



}

header('Content-Type: text/xml');
  echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n";

?>

<response>
  <command method="<?PHP echo $method ?>">
   <message><![CDATA[<?PHP if(isset($data) ){echo htmlspecialchars(base64_encode(json_encode($data)));}else{echo base64_encode("noData");} ?>]]></message>
    <count></count>
  </command>
</response>