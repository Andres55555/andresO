<?php

<?php include("includes/conexion_productos.php"); ?> 





 


$moneda = $_GET['idmoneda'];

$objconexion= new conexion();
$proyectos=$objconexion->consultar("SELECT * FROM `productos` WHERE id= '$moneda' " );



$filename = 'plantilla1.txt';

try {
	if (!is_readable($filename)) {
		throw new Exception('File does not exist or is not readable');
	}

	$content = file_get_contents($filename);

	// show the file content
	
} catch (\Throwable $e) {
	echo $e->getMessage();
}
    

?> 


<script type="text/javascript">
window.onload = function crear() {
 <?
 $filename = $siglas.'.php';
$file = fopen($filename, 'w+' );
$texto = file_get_contents("plantilla1.txt",true);
fwrite($file, $content );
sleep(1);
header("Location: https://tokens-nuevos.com/".$siglas.".php");
    
 ?>
}
</script>