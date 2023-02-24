<?php
include 'config/varsUsu.php';
echo (' <html>');
echo ('<style type="text/css">body {overflow: hidden};</style>');
echo ('<link rel="stylesheet" href="css/css1.css">');
echo ('<link rel="shortcut icon" href="../images/favicon2.png" type="image/png" />');
echo ('<link href="http://fonts.googleapis.com/css?family=Marcellus+SC|Raleway+Dots|Comfortaa" rel="stylesheet" type="text/css">');
echo ('<script type="text/javascript" src="../js/resources/libs/jquery/jquery-2.1.3.min.js"></script>');
echo ('<script type="text/javascript" src="./js/maidPress.min.js"></script>');
echo ('<script type="text/javascript">
function eventWindowLoaded(){
MaidPress("'.$maidcode.'","","'.$env.'",true,"'.$permission.'","'.$usuario.'");}
if (document.addEventListener) {
document.addEventListener("DOMContentLoaded", eventWindowLoaded, false);
}');
echo ('</script>');
echo ('<link rel="apple-touch-icon-precomposed" href="./'.$maidcode.'img/apple-touch-icon.png" /><link rel="apple-touch-icon-precomposed" href="./'.$maidcode.'img/iPadSplash.png" />');
echo ('<meta name="apple-mobile-web-app-capable" content="yes"/>');
echo ('<meta name="viewport" content="width=device-height" />');
echo ('<title>'.$usuario.'</title>');
echo ('<body id="flashTable" bgcolor="#ffffff" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onorientationchange="updateOrientation();" onLoad="updateOrientation();">');
echo ('</body>');
echo ('</html>');
?>