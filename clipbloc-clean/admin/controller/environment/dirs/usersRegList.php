<?php
if (isset($_POST['itemABC'])){
    $itemABC=$_POST['itemABC'];
    //comprobar que está logado el admin  
    include '../security/config.php';
    session_start(); 
    //comprobamos que sea una petición ajax
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
    {
        if(isset($_SESSION)){
              if($_SESSION['user']==$user && $_SESSION['pwd']==$pwd){
                    $listUsersDir="../multipleUser/users/".$itemABC;
                    $data=array();
                    $dataJSON["items"]=null;
                    $dataJSONContainer=array();


                    function recurseRmdir($dir,$itemABC) {
                                    $dirs = array_diff(scandir($dir), array('.','..'));
                                    foreach ($dirs as $bloc) {
                                        if (is_file($dir.'/'.$bloc)) {
                                            include "../multipleUser/users/".$itemABC.'/'.$bloc;
                                            $dataJSONContainer[]= $data;
                                        }
                                    }
                                    return $dataJSONContainer;
                                  }

                    if (is_dir($listUsersDir)) {
                                  $dataJSON["items"]=recurseRmdir($listUsersDir,$itemABC);
                            }
                    if(isset($data) ){
                        header('Content-Type: application/json');
                        echo json_encode($dataJSON);
                    } 
              }else{
                    echo "Not logged as admin";
              }
        }
    }
}
?>
