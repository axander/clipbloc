<?php

if (isset($_POST['clip'])){
	$clip=$_POST['clip'];
    }
if (isset($_POST['target'])){
	$target=$_POST['target'];
    }

//$data = file_get_contents("../json/".$target.".json");


$exists=false;
if($data = file_get_contents("../json/".$target.".json")){
   $collection = json_decode($data, true);
   foreach ($collection["items"] as $item) {
    if($item["date"]==$clip && !isset($item["bridge"])){
        $exists=true;
        echo "OK" ;
        break;
    }else if( $item["date"]==$clip && $item["bridge"]==true ){
            if($item["bridgeCode"]==="*" || $item["bridgeCode"]===""){
                $exists=true;
                echo "OK" ;
                break;
            }else{
                $exists=true;
                echo "askCode" ;
                break;
            }
    }
  }
if(!$exists){
    echo "NOK" ;
} 


}else{
   echo "NOT EXISTS" ;
}


?>