<?php
 if (isset($_POST['method'])){
	$method=$_POST['method'];
    };

$data = array();

include './users.php';


header('Content-Type: text/xml');
  echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n";

?>

<response>
  <command method="<?PHP echo $method ?>">
   <message><![CDATA[<?PHP if(isset($data) ){echo htmlspecialchars(base64_encode(json_encode($data)));}else{echo htmlspecialchars(base64_encode($data));} ?>]]></message>
    <count></count>
  </command>
</response>