<?php
session_start();
if(isset($_SESSION) && isset($_SESSION["user"])){
$name=$_SESSION["name"];
$user=$_SESSION["user"];
$type=$_SESSION["type"];
$pwd=$_SESSION["pwd"];
$privContent=$_SESSION["privContent"];
$privAccess=$_SESSION["privAccess"];
$nick=$_SESSION["nick"];

}else{
$user=null;
$type='null';
$pwd='null';
$privContent='null';
$privAccess='null';
$nick='null';
$name='null';
}
function url_origin($s, $use_forwarded_host=false)
{
    $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
    $sp = strtolower($s['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
    $port = $s['SERVER_PORT'];
    $port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
    $host = ($use_forwarded_host && isset($s['HTTP_X_FORWARDED_HOST'])) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
    $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
    return $protocol . '://' . $host;
}
function full_url($s, $use_forwarded_host=false)
{
    return url_origin($s, $use_forwarded_host) . $s['REQUEST_URI'];
}
$absolute_url = full_url($_SERVER);
$absolute_url = substr($absolute_url, 0,strrpos($absolute_url, '/')).'/'; 

/*if(isset($_GET["lan"])){
   $user_language_GET=$_GET["lan"];
}else{
   //Creamos una funci�n que detecte el idioma del navegador del cliente. 
    function getUserLanguage() {  
        $idioma =substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2); 
        return $idioma;  
        } 

    //Almacenamos dicho idioma en una variable 
     $user_language=getUserLanguage(); 
    //De acuerdo al idioma hacemos una o varias redirecciones. 
    if($user_language!='es'){ 
        header( 'Location: '.$absolute_url.'en' ); 
    }
}*/    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>clipbloc - Information Ecosystem</title>

<meta id="myViewPort" name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=1.0, user-scalable=1">
<meta name="format-detection" content="telephone=yes"> 
<link rel="shortcut icon" href="http://clipbloc.com/images/favicon2.png" type="image/png" />
<link rel="stylesheet" href="./css/resources/bootstrap.min.css">

<link rel="stylesheet" id="pe_theme_compressed-css" href="./css/css1.css" type="text/css" media="">

<script>
var mvp = document.getElementById('myViewPort');
if (navigator.userAgent.match(/iPad/i) )
{
    mvp.setAttribute('content','width=device-width, initial-scale=1, maximum-scale=2.0, user-scalable=1"');
}else if( navigator.userAgent.match(/Android|webOS|iPhone|iPod|Blackberry/i)){
    mvp.setAttribute('content','width=device-width, initial-scale=0.5, maximum-scale=1.0, user-scalable=1"');
}

var userData={};
userData.user=<?php echo '"'.$user.'"' ?>;
userData.type=<?php echo '"'.$type.'"' ?>;
userData.pwd=<?php echo '"'.$pwd.'"' ?>;
userData.privContent=<?php echo '"'.$privContent.'"' ?>;
userData.privAccess=<?php echo '"'.$privAccess.'"' ?>;
userData.nick=<?php echo '"'.$nick.'"' ?>;
userData.name=<?php echo '"'.$name.'"' ?>;
</script>


<script src="./js/resources/libs/jquery/jquery-2.1.3.min.js"></script>


<script type='text/javascript' src='./js/resources/libs/knockout-3.3.0/knockout-min.js'></script>

<script>
var fbId = <?php  if (isset($_GET["view"])){ echo '"'.$_GET["view"].'"'; }else{ echo "null";}   ?> ;
</script>

<script type="text/javascript" src="./js/core.lib.min.js"></script>

</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
<div style="padding-right:60px">
    <div onclick="fixContent()" id="fixPB" ></div>
</div>
<div class="container-fluid nopadding" >
    <div id="headerContainer">
        <div id="imgHeader">
        </div>
        <div class="row nopadding" >
            <div id="header" class="col-xs-12" >
                <div class="row" >
                    <div class="col-xs-6 col-md-3" >
                        <div class="inner" >
                            <div class="logoContainner" ><span class="logo" onclick="initialized()"><span class="logoRot2"></span></div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div id="innerUser">
                            <div id="userLogged"></div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div id="innerLan">
                            <div id="lanPB" onclick="selLan()" ></div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-md-3">
                        <div id="innerPrivate">
                            <div id="privatePB" onclick="goEdit()" ></div>
                        </div>
                     </div>
                </div>
            </div>
            <div class="col-xs-12 nopadding" id="menuHorizontal">
                        <div id="collapse-bar" >
                            <div id="collapse-button" onclick="collapseMenu()">
                                <img src="./images/collapse-menu.png" />
                            </div>
                        </div>
                        <div id="menu" class="col-xs-12" data-bind="foreach : tabs ">
                            <div class="innerMenu" data-bind="visible:$data.active,attr: {'id':'menu_'+date},html:rot,click:$parent.SelSection,style: { width: function(){ return $parent.count+'%' ; }()}">
                               
                            </div>
                        </div>
            </div>
        </div>
      </div>
    <div id="content" >
    </div>
</div>
<div id="footerContainer">
    <div class="row" >
        <div id="footer" class="col-xs-12" data-bind="foreach : tabs ">
            <div class="innerFoot" data-bind="visible:$data.active,attr: {'id':'foot_'+date},html:rot,click:$parent.SelFoot,style: { width: function(){ return $parent.count+'%' ; }()}">
               
            </div>
        </div>
    </div>
</div>
<div id="submenuList">
    <ul id='submenuFloat-list' class='submenuFloat' data-bind='foreach:tabs'>
        <li data-bind='text:rot'>
        <li>
    </ul>
</div>
<div id="loginDiv"></div>
<div id="loggedDiv"></div>
</body>
</html>