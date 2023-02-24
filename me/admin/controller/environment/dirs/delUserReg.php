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
            unlink("../multipleUser/users/".$firstLetter."/".$userChange['email'].".php");
            unlink("../multipleUser/usersTemp/".$firstLetter."/".$userChange['email'].".php");
            echo "DELETED";
        }else{
            echo "noData";
        }
    }else{
            echo "Not Logged as admin";
        }
}
?>
