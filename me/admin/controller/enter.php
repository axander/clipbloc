<?php
session_start(); 
include './environment/security/config.php';
$usuario= $_POST['user'];
$pwdEnter= $_POST['pwd'];
if(isset($_POST['from'])){
$from=$_POST['from'];
}else{
$from=false;
}



if($pwdEnter==="test" && $usuario==="test"){
    
    $_SESSION['user'] = "test";  
    $_SESSION['type'] = "test";
  if($from){
        echo "NOK";
  }else{
        header("Location: ../indexAdmin.php");
   }
  
 
    

}else if($pwd===$pwdEnter && $usuario===$user){
        $_SESSION['user'] = $user;  
        $_SESSION['pwd'] = $pwd;
        $_SESSION['type'] = "1";
        $_SESSION['privContent'] = 1;
        $_SESSION['privAccess'] = 1;
        $_SESSION['nick'] = "Editor";
    
    if($from){
        echo "OK";
  }else{
        header("Location: ../indexAdmin.php");
   }

}else{

if($from){
        echo "status=NOK";
  }else{
        header("Location: ../../index.php");
   }

    
    
}

?>