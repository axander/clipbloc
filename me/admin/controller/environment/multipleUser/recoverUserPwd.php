<?php

if(isset($_POST['REPLY'])){
        $reply=$_POST['REPLY'];
    };
if(isset($_POST['MESSAGE'])){
        $message=$_POST['MESSAGE'];
    };
if(isset($_POST['CODE'])){
        $CODE=$_POST['CODE'];
    };
if(isset($_POST['MESSAGEPENDING'])){
        $messagePending=$_POST['MESSAGEPENDING'];
    };
    
if(isset($_POST['BLOCNAME'])){
        $blocName=$_POST['BLOCNAME'];
    };
function mailActivacion($blocName,$reply,$message,$dir_correo, $user, $value){
    $asunto = "Password Recovery"; 
    $cuerpo = '<html><head><title></title></head><body bgcolor="#ffffff">';
        $cuerpo .= '<p>'.$blocName.'</p>';
        $cuerpo .= '<p>'.$user.'</p>';
        $cuerpo .= '<p>'.$message.'</p>';
    $cuerpo .= '<p>'.$value.'</p>';
    $cuerpo .= '</body></html>';




        //para el env�o en formato HTML 
    $headers = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=utf-8\r\n"; 

    //direcci�n del remitente 
    $headers .= "From: Admin <".$reply.">"; 


    //direcci�n de respuesta, si queremos que sea distinta que la del remitente 
    $headers .= "Reply-To: ".$reply."\n"; 
    
    //ruta del mensaje desde origen a destino 
    //$headers .= "\r\n"; 

    
    //direcciones que recibi�n copia 
    //$headers .= "Cc: \r\n"; 
    
    //direcciones que recibir�n copia oculta 
    $headers .= "Bcc: ".$reply."\r\n"; 

    //En localhost el env�o de e-mail a veces no funciona, hay que configurar algunas cosas.
    mail($dir_correo,$asunto,$cuerpo,$headers);
    
}


//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{
 if (isset($_POST['EMAIL'])){
	$email=$_POST['EMAIL'];
    };
   $data = Array();
    $firstLetter=substr($email, 0, 1);
 if (file_exists('./users/'.$firstLetter.'/'.$email.'.php')) {
        include './usersTemp/'.$firstLetter.'/'.$email.'.php';
        if($data["email"]==$email && $data["activator"]==$CODE){
            $result="PWDWASASK";
            $PWD=$data["pwd"];
            $user=$data["nick"];
            mailActivacion($blocName,$reply,$message,$email,$user,$PWD);
        }else if($data["email"]==$email && $data["activator"]!==$CODE){
            $result="PWDWASASKCODEWRONG";
        }
 }else  if (file_exists('./usersTemp/'.$firstLetter.'/'.$email.'.php')) {
    include './usersTemp/'.$firstLetter.'/'.$email.'.php';
        include './usersTemp/'.$firstLetter.'/'.$email.'.php';
        $activator=$data["activator"];
        $user=$data["nick"];
        mailActivacion($blocName,$reply,$messagePending,$email,$user,$activator);
        $result="PWDWASASKPENDING";
 }else{
     $result="NOPWDEXIST";
  }


echo $result;



}else{
    throw new Exception("Error Processing Request", 1);   
}


?>
