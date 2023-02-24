<?PHP
//comprobamos que sea una petición ajax



if (isset($_POST['oriPath'])){
	$oriPath=$_POST['oriPath'];
    }
if (isset($_POST['code'])){
	$code=$_POST['code'];
    }
if (isset($_POST['target'])){
	$target=$_POST['target'];
    }
if (isset($_POST['clip'])){
	$clip=$_POST['clip'];
    }



$data = file_get_contents("../json/".$target.".json");

$collection = json_decode($data, true);
$exists=false;
foreach ($collection["items"] as $item) {
    if($item["date"]==$clip && !isset($item["import"])){
        $exists=true;
        echo "NOT EXISTS" ;
        break;
    }else if( $item["date"]==$clip && $item["import"]==true ){
       if($item["importCode"]==="" || $item["importCode"]===$code ){
            error_reporting(0);
            if(!$fichero = file_get_contents($oriPath."/pages/"."$clip".".html", true)){
                echo "NOT EXISTS" ;
                $exists=true;
                $error = error_get_last();
                echo "File Error";
                break;
            }else{
                $exists=true;
                echo $fichero ;
                break;
            }
           break;
       }else{
          $exists=true;
          echo "notPermitted";
          break;
       }
       
    }

}
if(!$exists){
    echo "NOT EXISTS" ;
} 


?>


