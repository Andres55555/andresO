<?php
include('includes/conexion.php');

$limit=5;
$pag=(int)$_GET['pag'];
if($pag<1)
{
	$pag=1;
}
$offset=($pag-1)*$limit;

$busqueda=$conexion->query("SELECT * FROM productos LIMIT $offset, $limit");
$busquedaTotal=$conexion->query("SELECT * FROM productos");
$total=$busquedaTotal->rowCount();

$tabla.='<table class="table"><tr class="bg-primary">
		<th>ID</th>
		<th>NOMBRE</th>
		<th>CARRERA</th>
		<th>GRUPO</th></tr>
		 ';

while($alumnosFila=$busqueda->fetch(PDO::FETCH_ASSOC))
{
	$tabla.='<tr><td>'.$alumnosFila['id'].'</td>
				 <td>'.$alumnosFila['nombre'].'</td>
				 <td>'.$alumnosFila['carrera'].'</td>
				 <td>'.$alumnosFila['grupo'].'</td></tr>';
}

$tabla.='<tr><td class="text-center" colspan="4">';

	$totalPag=ceil($total/$limit);
	$links=array();
	for($i=1; $i<=$totalPag; $i++)
	{
		$links[]="<a style='border:solid 1px blue; padding-left:.6%; padding-right:.6%; padding-top:.25%; padding-bottom:.25%;' href=\"?pag=$i\">$i</a>";
	}

	$tabla.=''.implode(" ", $links);


$tabla.='</td></tr></table>';
?>