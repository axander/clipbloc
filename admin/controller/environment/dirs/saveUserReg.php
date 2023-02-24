<?php
session_start(); 
if(isset($_SESSION)){
    include '../security/config.php';
    if($_SESSION['user']==$user && $_SESSION['pwd']==$pwd){
        if (isset($_POST['user'])){
            $user = json_decode(stripslashes ($_POST['user']));
            foreach( $user  as $index => $r){
               $userChange[$index]=$r;
            }
            $firstLetter=substr($userChange['email'], 0, 1);
            $CUERPO="<?php\
            \$data['user']='".$userChange['user']."';\
            \$data['pwd']='".$userChange['pwd']."';\
            \$data['active']=".$userChange['active'].";\
            \$data['privAccess']=".$userChange['privAccess'].";\
            \$data['privContent']=".$userChange['privContent'].";\
            \$data['type']=".$userChange['type'].";\
            \$data['nick']='".$userChange['nick']."';\
            \$data['name']='".$userChange['name']."';\
            \$data['surname']='".$userChange['surname']."';\
            \$data['email']='".$userChange['email']."';\
            \$data['activator']='".$userChange['activator']."';\
            ?>";
            $ar=fopen("../multipleUser/users/".$firstLetter."/".$userChange['email'].".php","w+") or
            die("Problemas en la creacion");
            $CUERPO= str_replace('&', '&amp;', $CUERPO);
            fwrite($ar,stripslashes($CUERPO));
            fclose($ar);
            echo "OK";
        }else{
            echo "noData";
        }
    }else{
            echo "Not Logged as admin";
        }
}
?>
