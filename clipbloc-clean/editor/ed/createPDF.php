<?php
require('fpdf.php');
$DIR = $_GET['URL'];
$W = $_GET['w'];
$H = $_GET['h'];
$numPages = $_GET['numPages'];
class PDF extends FPDF
{
	
	function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
	
}
	$pdf = new PDF();
	$pdf->AliasNbPages();
	
function listarArchivos( $path,$pdf,$numPages,$W,$H){
	
	// Abrimos la carpeta que nos pasan como parámetro
	$dir = opendir($path);
	// Leo todos los ficheros de la carpeta
	$arrayImg=array();
	while ($elemento = readdir($dir)){
		// Tratamos los elementos . y .. que tienen todas las carpetas
		if( $elemento != "." && $elemento != ".."){
			// Si es una carpeta
			if( is_dir($path.$elemento) ){
				// Muestro la carpeta
			// Si es un fichero
			} else {
				// Muestro el fichero
				array_push($arrayImg, $path.$elemento);
				//$pdf->AddPage(Portrait,A4);
				//$pdf->Image($path.$elemento,0,0,$W,$H);
				// Go to 1.5 cm from bottom
				//$pdf->SetY(-15);
				// Select Arial italic 8
				//$pdf->SetFont('Arial','I',8);
				// Print current and total page numbers
				//$pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');
			}
		}
	}
	sort($arrayImg);
	for ($i = 0; $i < $numPages; $i++) {
		$pdf->AddPage(Portrait,A4);
		$pdf->Image($arrayImg[$i],0,0,$W,$H);

}
	
	
}
// Llamamos a la función para que nos muestre el contenido de la carpeta gallery
listarArchivos($DIR,$pdf,$numPages,$W,$H);
  $pdf->Output(); 		 
?>