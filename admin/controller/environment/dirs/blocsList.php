<?php
  if (isset($_POST['method'])){
	$method=$_POST['method'];
    }else{
        $method="no";
}
if (isset($_GET['user'])){
	$user=$_GET['user'];
    }else{
        $user="no";
}

$listDir="../../../../editor/rmt/".$user;
$datas=array();
if (is_dir($listDir)) {
              $datas=recurseRmdir($listDir);
        }

function recurseRmdir($dir) {
                $data=array();
                $clips=array();
                $dirs = array_diff(scandir($dir), array('.','..'));
                foreach ($dirs as $bloc) {
                    if (is_dir($dir.'/'.$bloc)) {
                        if($bloc=='xml'){
                            $clips = array_diff(scandir($dir.'/'.$bloc), array('.','..'));
                                foreach ($clips as $clip) {
                                    if(is_file($dir.'/'.$bloc.'/'. $clip)){
                                        if($clip!='config.xml' && $clip!='fav.xml' && $clip!='inicio.xml' && $clip!='list.xml' && $clip!='.DS_Store'){
                                            $clipsData[]=$clip;
                                        }
                                    }
                                }
                        }else if($bloc!='xml' && $bloc!='img'){
                            $data[]= $bloc;
                        }
                    }
                }                

                return array($data,$clipsData);

              }


if(isset($datas) ){
    echo implode(",",$datas[0])."::".implode(",",$datas[1]);}else{echo "noData";
} 
?>
