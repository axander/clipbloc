<?php
 if (isset($_POST['method'])){
	$method=$_POST['method'];
    }
 if (isset($_POST['DIR'])){
	$DIR=$_POST['DIR'];
    }
 if (isset($_POST['URL'])){
	$URL=$_POST['URL'];
    }

if(!file_exists($DIR))
            {
                mkdir ($DIR);
           
            } else {
            
            }
if (file_exists($URL)) 
	{
		$fil = fopen($URL, "r");
		$dat = fread($fil, filesize($URL)); 
		$data= $dat+1;
		fclose($fil);
		$fil = fopen($URL, "w");
		fwrite($fil, $dat+1);
	}
	else
	{
		$fil = fopen($URL, "w");
		fwrite($fil, 1);
		$data= '1';
		fclose($fil);
	}
header('Content-Type: text/xml');
  echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n";
?>
<response>
  <command method="<?PHP echo $method ?>">
   <message><![CDATA[<?PHP if(isset($data) ){echo htmlspecialchars(base64_encode($data));}else{echo base64_encode("noData");} ?>]]></message>
    <count></count>
  </command>
</response>