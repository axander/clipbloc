<?PHP
        
       
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
  $cuerpo .= '<br>El siguiente modelo acaba de ser visitado desde <h1>'.$_POST['country'].'</h1></br>';
  $cuerpo .= '<br><img width="100" src="'.$_POST['img'].'" />';
	$cuerpo .= " </body></html>";

	
		//para el env�o en formato HTML 
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
  $headers .= "From: Admin <".$recept.">\r\n"; 
  $headers .= "Cc: axander_1973@hotmail.com,vladstraticiuc@gmail.com\r\n"; 
	//direcci�n del remitente 
        
       

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