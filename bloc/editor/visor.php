<?php
include 'config/vars.php';
$usuario= $_GET['u'];
$bloc= $_GET['bloc'];
$link = mysql_connect ($host, $user, $password, $dbname) or die ("<center>No se puede conectar con la base de datos\n</center>\n");
$query=" SELECT *FROM `usuarios` WHERE `usuario` LIKE '$usuario'LIMIT 0 , 30";
$result=mysql_db_query ($dbname, $query, $link);
$row = mysql_fetch_array ($result);
echo (' <html>');

echo ('<link rel="stylesheet" href="css/css1.css">');
echo ('<link href="http://fonts.googleapis.com/css?family=Marcellus+SC|Raleway+Dots|Comfortaa" rel="stylesheet" type="text/css">');
echo ('<script type="text/javascript" src="js/maidPress.min.js"></script>');
echo ('<script type="text/javascript">
function eventWindowLoaded(){
		MaidPress("'.$row['maidcode'].$bloc.'/","","'.$env.'","true","2","'.$row['usuario'].'");
}
document.write("<script defer src=js/ie_onload.js><"+"/script>");
if (document.addEventListener) {
document.addEventListener("DOMContentLoaded", eventWindowLoaded, false);
}');
echo ('</script>');
echo ('<link rel="image_src" type="image/jpeg" href="'.$env.$row['maidcode'].$bloc.'img/facebook-thumbnails.jpg"/>');
echo ('<link rel="apple-touch-icon-precomposed" href="'.$env.$row['maidcode'].$bloc.'img/apple-touch-icon.png" /><link rel="apple-touch-startup-image" href="'.$env.$row['maidcode'].$bloc.'img/iPadSplash.png" />');
echo ('<link rel="shortcut icon" href="'.$env.$row['maidcode'].$bloc.'img/favicon.ico" /> <link rel="shortcut icon" href="'.$env.$row['maidcode'].$bloc.'img/favicon.png" type="image/png" /><head>');
echo ('<meta name="viewport" content="width=device-height"/>');
echo ('<meta name="apple-mobile-web-app-capable" content="yes"/>');
echo ('<title>'.$row['usuario'].'</title>');
echo ('<body id="flashTable" bgcolor="#ffffff" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onorientationchange="updateOrientation();" onLoad="updateOrientation();">');
echo ('</body>');
echo ('</html>');
mysql_free_result($result);
mysql_close($link);
//cierra la conexion
?>