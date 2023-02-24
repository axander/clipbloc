<?php 
if(isset($_SESSION)){
session_destroy();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>clipbloc admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="format-detection" content="telephone=yes"> 

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<link rel="shortcut icon" href="../images/favicon2.png" type="image/png" />
<link rel="stylesheet" id="pe_theme_compressed-css" href="../css/css01.css" type="text/css" media="">

<script type="text/javascript" src="./js/login.js"></script>




</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
<div class="container" >
    <div class="site-wrapper">
        <div class="child">
                        <form name="form1" method="post" action="<?php $env ?>./controller/enter.php">
                        <input type="hidden" name="view" value="<?php if(isset($_GET["view"])){ echo $_GET["view"];} ?>" >
                          <ul>

                            
                            <li id="logo">clipbloc
                            </li>
                            <li style="padding-bottom:10px">
                                <input name="user" type="text" id="user" value=""  placeholder="user"  required>
                            </li>
                            <li style="padding-bottom:10px">
                                <input name="pwd" type="password" id="pwd" placeholder="Password" required/>
                            </li>
                            <li>
                              <input type="submit" name="send" id="send" value="GO" />
                            </li>
                          </ul>
                        </form>
         </div>
    </div>
</div>
</body>
</html>