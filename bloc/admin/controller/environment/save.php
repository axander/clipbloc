<?php
 if (isset($_POST['method'])){
	$method=$_POST['method'];
    }
 if (isset($_POST['CUERPO'])){
	$CUERPO=$_POST['CUERPO'];
    }
 if (isset($_POST['CUERPO0'])){
	$CUERPO0=$_POST['CUERPO0'];
    }
 if (isset($_POST['URL'])){
	$URL=$_POST['URL'];
    }
 if (isset($_POST['URL0'])){
	$URL0=$_POST['URL0'];
    }
if(isset ($_POST['delJSON'])){
    $JSON=$_POST['delJSON'];
}

if(isset ($_POST['delJSON'])){
        if(is_file('../../../controller/environment/json/'.$JSON.'.json')){
            unlink('../../../controller/environment/json/'.$JSON.'.json');
            unlink('./json/'.$JSON.'.json');
        }
}

if(isset ($_POST['delPages'])){
    $delPages=explode(",",$_POST['delPages']);
    foreach ($delPages as $page){
        if (is_dir('../../../pages/'.$page)) {
              recurseRmdir('../../../pages/'.$page);
        }
        if(is_file('../../../pages/'.$page.'.html')){
            unlink('../../../pages/'.$page.'.html');
        }
    }

}
function recurseRmdir($dir) {
                $files = array_diff(scandir($dir), array('.','..'));
                foreach ($files as $file) {
                  (is_dir("$dir/$file")) ? recurseRmdir("$dir/$file") : unlink("$dir/$file");
                }
                return rmdir($dir);
              }
if (isset($_POST['type'])){
	$type=$_POST['type'];
        if(!file_exists($type))
            {
                mkdir ($type);
           
            } else {
            
            }
        $fp = fopen( $type.'/facebook.html', 'wb' );
                    $facebookData='<meta http-equiv="refresh" content="0;URL='.$_POST['fbToClip'].'" />
<meta property="og:site_name" content="'.$_POST['name'].'"/>
<meta property="og:title" content="'.$_POST['rot'].'"/>
<meta property="og:description" content="'.$_POST['desc'].'"/>
<meta property="og:url" content="'.$_POST['url'].'"/>
<meta property="og:image" content="'.$_POST['image'].'"/>
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image:width" content="760px" />
<meta property="og:image:height" content="481px" />';

                    fwrite( $fp, $facebookData);
                    fclose( $fp );
    }
if (isset($_POST['CUERPO0'])){
//in sections and footers save two different files this with codes and permissions
$string0=$CUERPO0;

$ar0=fopen($URL0,"w+") or
die("Problemas en la creacion");
$CUERPO0= str_replace('&', '&', $string0);
fwrite($ar0,stripslashes($CUERPO0));
fclose($ar0);

}


$string=$CUERPO;

$ar=fopen($URL,"w+") or
die("Problemas en la creacion");
$CUERPO= str_replace('&', '&', $string);
fwrite($ar,stripslashes($CUERPO));
fclose($ar);

header('Content-Type: text/xml');
  echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n";

?>

<response>
  <command method="<?PHP echo $method ?>">
   <message><![CDATA[<?PHP if(isset($data) ){echo htmlspecialchars(base64_encode(json_encode($data)));}else{echo base64_encode("noData");} ?>]]></message>
    <count></count>
  </command>
</response>