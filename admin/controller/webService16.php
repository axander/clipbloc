<?php



//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{

    //obtenemos el archivo a subir
    $file = $_FILES['archivo']['name'];
    $destiny = $_POST['destiny'];

    //comprobamos si existe un directorio para subir el archivo
    //si no es así, lo creamos
    if(!is_dir("../../".$destiny."/")) 
        mkdir("../../".$destiny."/", 0777);
     
    //comprobamos si el archivo ha subido
    if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],"../../".$destiny."/".$file))
    {
       sleep(3);//retrasamos la petición 3 segundos
       echo "../".$destiny."/".$file;//devolvemos el nombre del archivo para pintar la imagen
    }
}else{
    throw new Exception("Error Processing Request", 1);   
}
?>