<?php
  if (isset($_POST['method'])){
	$method=$_POST['method'];
    }else{
        $method="no";
}

$listDir="../../../../editor/rmt";
$data=array();
if (is_dir($listDir)) {
              $data=recurseRmdir($listDir);
        }

function recurseRmdir($dir) {
                $dirs = array_diff(scandir($dir), array('.','..'));
                foreach ($dirs as $bloc) {
                    if (is_dir($dir.'/'.$bloc)) {
                        $data[]= $bloc;
                    }
                }
                return $data;
              }


if(isset($data) ){
    echo implode(",",$data);}else{echo "noData";
} 
?>
