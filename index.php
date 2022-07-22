

<?php include("includes/cabecera.php");  ?> 
<?php include("includes/conexion_bd.php"); ?> 
<?php include("includes/conexion_useradmin.php"); ?>
<?php 
$objconexion= new conexion();
$proyectos=$objconexion->consultar("SELECT * FROM `productos`");
?>

<div class="p-4 bg-light">
    <div class="container">
        <h1 class="display-7">Bienvenido   </h1>
        <p class="lead">Topacio publicidad ecommerce</p>
        <hr class="my-2">
        
        <nav class="navbar bg-light">
  <div class="container-fluid">
    <form action class="d-flex" role="search" method="GET" >
      <input class="form-control me-2" type="search" placeholder="Busqueda de Productos" name="busqueda">
      <button class="btn btn-outline-success" type="submit" name="enviar" > Buscar  </button>
    </form>
  </div>
</nav>
    </div>
</div>
<?php
$conexion=mysqli_connect("localhost","root","","album"); 
$where="";

if(isset($_GET['enviar'])){
  $busqueda= $_GET['busqueda'];


	if (isset($_GET['busqueda']))
	{
		$where="WHERE nombre LIKE'%".$busqueda."%' OR categoria  LIKE'%".$busqueda."%'";
	}
  
}

?>


<div class="row row-cols-1 row-cols-md-3 g-4">
 
<?php foreach($proyectos as $proyecto) { ?>

  <div class="col">
    <div class="card">
      <img src="imagenes/<?php echo $proyecto['imagen']; ?>" class="card-img-top" alt="..." if(true){}>
      <div class="card-body">
      <h5 class="card-title"><?php echo $proyecto['nombre']; ?></h5>
        <p class="card-text"><?php echo $proyecto['precio']; ?></p>
      </div>
    </div>
  </div>

  <?php } ?>
    
</div>


<?php include("includes/pie.php");?>  

