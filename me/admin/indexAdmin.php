<?php 
//include 'config/vars.php';
session_start(); 
if(isset($_SESSION['user'])){ 
           // Lo dejas entrar a la pagina 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    /*if (!$enlace = mysql_connect($host, $user, $password)) {
            echo 'No pudo conectarse a mysql';
            exit;
    }
    if (!mysql_select_db($dbname, $enlace)) {
            echo 'No pudo seleccionar la base de datos';
            exit;
    }*/
   
}else{  
        echo("<meta http-equiv='refresh' content='0;URL=index.php'>");
} 
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Admin clipbloc</title>

<meta name="viewport" content="width=device-width, initial-scale=.5, maximum-scale=1.0, user-scalable=0">
<meta name="format-detection" content="telephone=yes"> 

<link rel="shortcut icon" href="./images/nodefine.png" type="image/png" />

<link rel="stylesheet" href="./css/resources/bootstrap.min.css" />

<link rel="stylesheet" id="pe_theme_compressed-css" href="./css/css1.css" type="text/css" media="" />

<script src="./js/resources/libs/jquery/jquery-2.1.3.min.js"></script>



<script type='text/javascript' src='./js/resources/libs/knockout-3.3.0/knockout-min.js'></script>

<script type="text/javascript" src="./js/core.lib.min.js"></script>


</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
<input  type="hidden" name="userSession" id="userSession" value="<?php echo $_SESSION['user'] ?>" >
<div class="container-fluid" id="all">
    <div class="row" >
        <div id="header" class="col-xs-12 corpColor" >
            
            <div id="serialCode">Initialized</div>
            <div id="logoutPB" >
                <a href="./controller/logout.php" >Salir</a>
            </div>
        </div>
    </div>
    <div class="row" >
       
    </div>
    <div id="content" >
    </div>
    
    
</div>
<div id="menuContainer">
    <div class="logo">Admin</div>
    <div id="lanPB">Choose Language</div>
    <div id="menu" class="col-xs-12" data-bind="foreach : tabs ">
      <div class="innerMenu" data-bind="attr: {'id':'menu_'+date},text:rot,click:$parent.SelSection">
          opciones de menu
      </div>
    </div>
 </div>
</body>
</html>