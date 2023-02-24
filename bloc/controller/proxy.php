<?PHP

if (isset($_GET['url'])){
	$urlContent=$_GET['url'];
    }

error_reporting(0);
if(!$fichero = file_get_contents($urlContent, true)){
$error = error_get_last();
echo "Aquí apareceran tus contenidos";
}else{
echo $fichero ;
}





    
?>


