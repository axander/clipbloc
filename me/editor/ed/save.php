<?php
$CUERPO=$_POST["CUERPO"];
$URL=$_POST["URL"];

$URLdir=$_POST["URLdir"];
$html=$_POST["html"];
$img=$_POST["img"];

echo $URLdir;
if(!is_dir("../".$URLdir)){
    mkdir ("../".$URLdir);
            }

$html=str_replace("\\","",$html);

$fp = fopen( "../".$URLdir.'/clipbloc.html', 'wb' );
fwrite( $fp, $html);
fclose( $fp );



$image = str_replace('data:image/png;base64,', '', $img);
$image = str_replace(' ', '+', $image);
$unencodedData=base64_decode($image);
$fp = fopen( "../".$URLdir.'/img.png', 'wb' );
fwrite( $fp, $unencodedData);
fclose( $fp );






$ar=fopen("../".$URL,"w+") or
die("Problemas en la creacion");
$CUERPO= str_replace('&', '&amp;', $CUERPO);
fwrite($ar,stripslashes(utf8_encode($CUERPO)));
fclose($ar);
echo($URL);


?>