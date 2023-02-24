<?php




$data = Array();

include './multipleUser/users.php';


//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{

if (isset($_POST['SRC'])){
	$SRC=$_POST['SRC'];
    }
 if (isset($_POST['DST'])){
	$DST=$_POST['DST'];
    }
if (isset($_POST['USER'])){
	$user=$_POST['USER'];
    }
 if (isset($_POST['PWD'])){
	$pwd=$_POST['PWD'];
    }



foreach ($data as $valor) {
    if($valor["user"]==$user){
       $neededObject=$valor;
       break;  
    }
}

if(isset($neededObject)){
      if($neededObject["pwd"]==$pwd){
         if($neededObject["active"]==1 && $neededObject["type"]==0){
            xcopy("../../../".$SRC, "../../../".$DST);
         }else{
            $result="NOK";
         }
     }else{
         $result="NOK";
     }
}else{
        $result="NOK";
}


echo $result;


}else{
    throw new Exception("Error Processing Request", 1);   
}








function xcopy($source, $dest, $permissions = 0755)
{
    // Check for symlinks
    if (is_link($source)) {
        return symlink(readlink($source), $dest);
    }

    // Simple copy for a file
    if (is_file($source)) {
        return copy($source, $dest);
    }

    // Make destination directory
    if (!is_dir($dest)) {
        mkdir($dest, $permissions);
    }

    // Loop through the folder
    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        // Skip pointers
        if ($entry == '.' || $entry == '..') {
            continue;
        }

        // Deep copy directories
        xcopy("$source/$entry", "$dest/$entry", $permissions);
    }

    // Clean up
    $dir->close();
    return true;
}

?>
