<?PHP

if (isset($_GET['url'])){
	$urlContent=$_GET['url'];
    }
if (isset($_GET['userBridge'])){
	$userBridge=$_GET['userBridge'];
    }
if (isset($_GET['pwdBridge'])){
	$pwdBridge=$_GET['pwdBridge'];
    }

error_reporting(0);
if(!$fichero = file_get_contents($urlContent, true)){
$error = error_get_last();
echo "Aquí apareceran tus contenidos";
}else{
echo $fichero ;
}





    
?>


