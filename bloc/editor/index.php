<?php
include 'config/varsUsu.php';
echo (' <html>');
echo ('<style type="text/css">body {overflow: hidden};</style>');
    echo ('<link rel="stylesheet" href="css/css1.css">');
    echo ('<script type="text/javascript" src="../js/resources/libs/jquery/jquery-2.1.3.min.js"></script>');

    echo ('<script type="text/javascript" src="js/maidPress.min.js"></script>');


echo ('<script type="text/javascript">
function eventWindowLoaded(){
MaidPress("'.$maidcode.'","","'.$env.'",true,"0","'.$usuario.'",true);}
if (document.addEventListener) {
document.addEventListener("DOMContentLoaded", eventWindowLoaded, false);
}');
echo ('</script>');
echo ("<script type='text/javascript'>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41233082-2', 'a-awds.com');
  ga('send', 'pageview');");

echo ('</script>');
echo ('<link rel="apple-touch-icon-precomposed" href="./'.$maidcode.'img/apple-touch-icon.png" /><link rel="apple-touch-startup-image" href="./'.$maidcode.'img/iPadSplash.png" />');
echo ('<link rel="clipbloc icon" href="./'.$maidcode.'img/favicon2.png" type="image/x-icon" /><link rel="shortcut icon" href="./'.$maidcode.'img/favicon2.png" type="image/png" /><head>');
echo ('<meta name="viewport" content="width=device-height"/>');
echo ('<meta name="apple-mobile-web-app-capable" content="yes"/>');
echo ('<title>Editor clipbloc</title>');
echo ('<body id="flashTable" bgcolor="#ffffff" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onorientationchange="updateOrientation();" onLoad="updateOrientation();">');
echo ('</body>');
echo ('</html>');
?>