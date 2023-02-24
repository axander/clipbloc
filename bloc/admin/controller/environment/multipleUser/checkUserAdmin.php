<?php

$data = Array();

include './users.php';


//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{

$user=$_GET['USER'];
$pwd=$_GET['PWD'];






foreach ($data as $valor) {
    if($valor["user"]==$user){
       $neededObject=$valor;
       break;  
    }
}

if(isset($neededObject) ){
      if($neededObject["pwd"]==$pwd){
         if($neededObject["active"]==1 && $neededObject["type"]==0){
            session_start();
            foreach ($neededObject as $clave => $valor) {
                    //guardamos en sesion los datos del usuario
                    $_SESSION[$clave]=$valor;
            }
            $result=json_encode($neededObject);
         }else{
            $result="Blocked";
         }
     }else{
         $result="Incorrecto";
     }
}else{
        $result="User Incorrecto";
}

echo $result;



}else{
    throw new Exception("Error Processing Request", 1);   
}


?>
