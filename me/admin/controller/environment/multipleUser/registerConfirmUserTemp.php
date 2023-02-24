<?php



//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{
 if (isset($_POST['EMAIL'])){
	$email=$_POST['EMAIL'];
    };
 if (isset($_POST['CODE'])){
	$code=$_POST['CODE'];
    };
   $data = Array();
    $firstLetter=substr($email, 0, 1);
 if (file_exists('./users/'.$firstLetter.'/'.$email.'.php')) {
        $result="WASCONFIRMED";
 }else  if (file_exists('./usersTemp/'.$firstLetter.'/'.$email.'.php')) {
    include './usersTemp/'.$firstLetter.'/'.$email.'.php';
        if($data["email"]==$email && $data["activator"]==$code){
            if(!is_dir("./users/".$firstLetter."/")){ 
                    mkdir("./users/".$firstLetter."/", 0777); 
            }  
            copy("./usersTemp/".$firstLetter."/".$email.".php", "./users/".$firstLetter."/".$email.".php");
            $result="OK";
        }else{
            $result="NOK";
        }
    
 }else{
     $result="NOTEXISTS";
  }


echo $result;



}else{
    throw new Exception("Error Processing Request", 1);   
}


?>
