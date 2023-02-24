<?php
include 'config/vars.php';
$usuario= $_POST['user'];
$pwd= $_POST['pwd'];

if (!$enlace = mysql_connect($host, $user, $password)) {
		echo 'No pudo conectarse a mysql';
		exit;
	}
	
	if (!mysql_select_db($dbname, $enlace)) {
		echo 'No pudo seleccionar la base de datos';
		exit;
	}



$query=" SELECT * FROM `usuarios` WHERE `email`='$usuario' LIMIT 0 , 30";
$result=mysql_query ($query, $enlace);
$row = mysql_fetch_array ($result);
if($row['password']==$pwd){

    echo ('<html>');
    echo ('<head>');
    echo ('<link href="http://fonts.googleapis.com/css?family=Marcellus+SC|Raleway+Dots|Comfortaa" rel="stylesheet" type="text/css">');
    echo ('<style type="text/css">body {overflow: hidden};</style>');
    echo ('<link rel="stylesheet" href="css/css1.css">');
    echo ('<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>');

    echo ('<script type="text/javascript" src="js/maidPress.min.js"></script>');
    echo ('<script type="text/javascript">
    function eventWindowLoaded(){
        MaidPress("'.$row['maidcode'].'","","'.$env.'",true,"'.$row['permission'].'","'.$row['usuario'].'");}
        if (document.addEventListener) {
        document.addEventListener("DOMContentLoaded", eventWindowLoaded, false);

    }');
    echo ('</script>');
    echo ('<link rel="apple-touch-icon-precomposed" href="./'.$row['maidcode'].'img/apple-touch-icon.png" /><link rel="apple-touch-startup-image" href="./'.$row['maidcode'].'img/iPadSplash.png" />');
    echo ('<meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=1.0, user-scalable=1">');
    echo ('<meta name="apple-mobile-web-app-capable" content="yes"/>');
    echo ('<link rel="shortcut icon" href="./'.$row['maidcode'].'img/favicon.ico" /> <link rel="shortcut icon" href="./'.$row['maidcode'].'img/favicon.png" type="image/png" /><head>');
    echo ('<title>'.$row['usuario'].'</title>');
     echo ('</head>');
    echo ('<body id="flashTable" bgcolor="#ffffff" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onorientationchange="updateOrientation();" onLoad="updateOrientation();" >');
    echo ('</body>');
    echo ('</html>');
}else{
echo ("incorrecto");
}
mysql_free_result($result);
mysql_close($enlace);
//cierra la conexion
?>