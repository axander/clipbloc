<?php

function mailActivacion($blocName,$reply,$message,$dir_correo, $user, $activator){
	$asunto = "Activar Usuario"; 
	$cuerpo = '<html><head><title></title></head><body bgcolor="#ffffff">';
        $cuerpo .= '<p>'.$blocName.'</p>';
        $cuerpo .= '<p>'.$message.'</p>';
	$cuerpo .= '<p>'.$activator.'</p>';
	$cuerpo .= '</body></html>';




        //para el env�o en formato HTML 
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=utf-8\r\n"; 

	//direcci�n del remitente 
	$headers .= "From: Admin <info@clipbloc.com>"; 


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

 if (isset($_POST['NAME'])){
	$name=$_POST['NAME'];
    };
 if (isset($_POST['USER'])){
	$user=$_POST['USER'];
    };
 if (isset($_POST['PWD'])){
	$pwd=$_POST['PWD'];
    };
 if (isset($_POST['EMAIL'])){
	$email=$_POST['EMAIL'];
    };
if(isset($_POST['BLOCNAME'])){
        $blocName=$_POST['BLOCNAME'];
    };
if(isset($_POST['MESSAGE'])){
        $message=$_POST['MESSAGE'];
    };
if(isset($_POST['REPLY'])){
        $reply=$_POST['REPLY'];
    };
if(isset($_POST['CODE'])){
        $CODE=$_POST['CODE'];
    };



$activator=$CODE;


$firstLetter=substr($email, 0, 1);

if (file_exists("./users/".$firstLetter."/".$email.".php")) {
    echo 'EXISTS';
}else if (file_exists("./usersTemp/".$firstLetter."/".$email.".php")) {
    echo 'EXISTSTEMP';
}else{

if(!is_dir("./usersTemp/".$firstLetter."/")){ 
        mkdir("./usersTemp/".$firstLetter."/", 0777); 
}      
   

$CUERPO="<?php\
\$data['user']='".$user."';\
\$data['pwd']='".$pwd."';\
\$data['active']=true;\
\$data['privAccess']=true;\
\$data['privContent']=true;\
\$data['type']='1';\
\$data['nick']='".$user."';\
\$data['name']='".$name."';\
\$data['surname']='surname';\
\$data['email']='".$email."';\
\$data['activator']='".$activator."';\
?>";



    
$ar=fopen("./usersTemp/".$firstLetter."/".$email.".php","w+") or
die("Problemas en la creacion");
$CUERPO= str_replace('&', '&amp;', $CUERPO);
fwrite($ar,stripslashes($CUERPO));
fclose($ar);



mailActivacion($blocName,$reply,$message,$email,$user,$activator);


echo "ACTIVEREG";




}

}else{
    throw new Exception("Error Processing Request", 1);   
}



?>
