<?php
  if (isset($_POST['method'])){
	$method=$_POST['method'];
    }else{
        $method="no";
}

$listDir="../../../../editor/rmt/themes";
$data=[];
if (is_dir($listDir)) {
              $data=recurseRmdir($listDir);
        }

function recurseRmdir($dir) {
                $data;
                $dirs = array_diff(scandir($dir), array('.','..'));
                foreach ($dirs as $bloc) {
                    echo $bloc;
                    $data[]= $bloc;
                }
                return $data;
              }

header('Content-Type: text/xml');
  echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n";

?>

<response>
  <command method="<?PHP echo $method ?>">
   <message><![CDATA[<?PHP if(isset($data) ){echo implode(",",$data);}else{echo "noData";} ?>]]></message>
    <count></count>
  </command>
</response>