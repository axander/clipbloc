<?PHP
        

        if (isset($_POST['name'])){
            $name=$_POST['name'];
        }
        if (isset($_POST['email'])){
            $email=$_POST['email'];
        }
        if (isset($_POST['mensaje'])){
            $message=$_POST['mensaje'];
        }
        if (isset($_POST['recept'])){
            $recept=$_POST['recept'];
        }

     

       
        $subject="Enviado desde vladimirtocados";
        
       
            

	
	$destinatario = $recept; 
	$asunto = "Mensaje enviado desde vladimirtocados"; 
	$cuerpo = ' 
			<html> 
				<head> 
   				<title>Mensaje envíado desde vladimirtocados</title> 
				</head> 
				<body bgcolor="#ffffff">';

        
  if (isset($_POST['img'])){
    $cuerpo .= '<br><p><h1>'.$name.'</h1>('.$email.')</br>Se ha puesto en contacto contigo para consultarte:</br>';
    $cuerpo .= '<br><img width="100" src="'.$_POST['img'].'" />';
    $cuerpo .= '<br><p><h1>Modelo:</h1>'.$_POST['modelo'];
  }else{
    $cuerpo .= '<br><p><h1>'.$name.'</h1>('.$email.')</br>Se ha puesto en contacto contigo para consultarte:</br>';
  }
	$cuerpo .= '<br><p><h1>Su Mensaje:</h1>'.$message;
	$cuerpo .= " </body></html>";

	//para el env�o en formato HTML 
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
  $headers .= "From: Admin <".$recept.">\r\n"; 
  $headers .= "Cc: vladstraticiuc@gmail.com,axander_1973@hotmail.com\r\n"; 
	//direcci�n del remitente 
	

	
	
	//ruta del mensaje desde origen a destino 
	//$headers .= "\r\n"; 
	
	
	//En localhost el env�o de e-mail a veces no funciona, hay que configurar algunas cosas.
	//mail($destinatario,$asunto,$cuerpo,$headers);
        
       

        function mail_utf8($destinatario, $asunto = '(Sin Asunto)', $mensaje = '', $cabecera = '') {
              $cabeceraPorDefecto = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=iso-8859-1\r\n';
              if(mail($destinatario, '=?UTF-8?B?'.base64_encode($asunto).'?=', utf8_decode($mensaje), $cabeceraPorDefecto .$cabecera)){
              		echo "OK";
              }else{
              		echo "NOK";
              }
      }



        mail_utf8($destinatario, $asunto , $cuerpo, $headers);


 
  
?>