<?php

include '../config/varsUsu.php';

//reajuste del env para apuntar al directorio que contiene las imagenes
$env_adjust=(string) $env;
$env_adjust = trim($env_adjust, '/');
$env_adjust = substr($env_adjust, 0,strrpos($env_adjust, '/')).'/'; 


$rootDir='../rmt/';
$listDir="";
if (is_dir($rootDir)) {
              recurseRmdir($rootDir,$listDir,$env_adjust);
}

function recurseRmdir($rootDir,$dir,$env) {
                $clips=array();
                $clipsData=array();
                $dirs = array_diff(scandir($rootDir.$dir), array('.','..'));
                foreach ($dirs as $bloc) {
                    if (is_dir($rootDir.$dir.$bloc)) {
                        if($bloc=='img'){
                            $clips = array_diff(scandir($rootDir.$dir.$bloc), array('.','..'));
                                foreach ($clips as $clip) {
                                    if(is_file($rootDir.$dir.$bloc.'/'. $clip)){
                                            echo $env.'rmt/'.$dir.$bloc.'/'. $clip.'::'.$dir.',';
                                    }
                                }
                        }else if($bloc!='xml'){
                            $newDir=$dir.$bloc."/";
                            recurseRmdir($rootDir,$newDir,$env);
                        }
                    }
                }                
              }

?>
