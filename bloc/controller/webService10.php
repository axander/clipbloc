<?PHP
        
        if (isset($_POST['method'])){
            $method=$_POST['method'];
        }
        $name="Clipbloc";

       
        $subject="Enviado desde Clipbloc";
        if (isset($_POST['message'])){
            $message=$_POST['message'];
        }
        
            $recept="axander_1973@hotmail.com";

	
	$destinatario = "axander_1973@hotmail.com"; 
	$asunto = "Mensaje enviado desde clipbloc"; 
	$cuerpo = ' 
			<html> 
				<head> 
   				<title>Mensaje envíado desde clipbloc</title> 
				</head> 
				<body bgcolor="#ffffff">';

        $cuerpo .= '<br><p><h1>'.$name.'</h1> Se ha puesto en contacto contigo';
        

	$cuerpo .= '<br><p><h1>Su Mensaje:</h1>'.$message;
	$cuerpo .= " </body></html>";

	//para el env�o en formato HTML 
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

	//direcci�n del remitente 
	$headers .= "From: Admin <".$recept.">\r\n"; 

	
	
	//ruta del mensaje desde origen a destino 
	//$headers .= "\r\n"; 
	
	
	//En localhost el env�o de e-mail a veces no funciona, hay que configurar algunas cosas.
	//mail($destinatario,$asunto,$cuerpo,$headers);

        mail_utf8($destinatario, $asunto , $cuerpo, $headers);

        function mail_utf8($destinatario, $asunto = '(Sin Asunto)', $mensaje = '', $cabecera = '') {
              $cabeceraPorDefecto = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=iso-8859-1\r\n';
              mail($destinatario, '=?UTF-8?B?'.base64_encode($asunto).'?=', utf8_decode($mensaje), $cabeceraPorDefecto .$cabecera);
      }



       header('Content-Type: text/xml');
  echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n";


  
?>
<response>
  <command method="<?PHP echo $method ?>">
    <message><![CDATA[<?PHP if(isset($data) ){echo htmlspecialchars(base64_encode(json_encode($data)));}else{echo base64_encode("noData");} ?>]]></message>
    </command>
</response>