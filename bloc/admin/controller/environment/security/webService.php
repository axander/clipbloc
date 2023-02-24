<?php

include './config.php';

//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{

    
    $CUERPO='<?php\
$user= "'.$_GET['newUser'].'";\
$pwd="'.$_GET['newPassword'].'";\
?>';

    if($_GET['newUser']==="" || $_GET['newPassword']==="" || $_GET['user']==="" || $_GET['oldPassword']===""){
        echo "Some Label is empty. Please correct it and try again";
    }else if($_GET['newUser']!="" && $_GET['newPassword']!="" && $_GET['user']===$user && $_GET['oldPassword']===$pwd){
            $ar=fopen("./config.php","w+") or
            die("Problemas en la creacion");
            $CUERPO= str_replace('&', '&amp;', $CUERPO);
            fwrite($ar,stripslashes($CUERPO));
            fclose($ar);
            echo "OK";
    }else{
        echo "Old user or password not corrects.";
    }
}else{
    throw new Exception("Error Processing Request", 1);   
}
?>