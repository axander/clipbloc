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

if(isset($neededObject)){
      if($neededObject["pwd"]==$pwd){
         if($neededObject["active"]==1 && $neededObject["privAccess"]==1){
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
        $data = Array();
    $firstLetter=substr($user, 0, 1);
  if (file_exists('./users/'.$firstLetter.'/'.$user.'.php')) {
    include './users/'.$firstLetter.'/'.$user.'.php';
        if($data["email"]==$user){
            $data["user"]=$data["email"];
            $neededObject=$data;
        }
    if(isset($neededObject)){
      if($neededObject["pwd"]==$pwd){
         if($neededObject["active"]==1 && $neededObject["privContent"]==1){
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
 }else{
     $result="User Incorrecto";
  }
}

echo $result;



}else{
    throw new Exception("Error Processing Request", 1);   
}


?>
