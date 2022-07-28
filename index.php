

<?php include("includes/cabecera.php");  ?> 
<?php include("includes/conexion_bd.php"); ?> 
<?php include("includes/conexion_useradmin.php"); ?>
<?php include_once('includes/paginator.class.php'); 
  $pages	=	new Paginator();
?>



<?php 
$objconexion= new conexion();
?>

<?php

	$condition	=	'';
	if (isset($_REQUEST['producto']) and $_REQUEST['producto'] != "") {
		$condition	.=	' AND nombre LIKE "%' . $_REQUEST['producto'] . '%" ';
	}

	//Main queries
	$pages->default_ipp	=	8;
	$sql 	= $objconexion->consultar("SELECT * FROM productos WHERE 1 " . $condition . "");
	$pages->items_total	=	count($sql);
	$pages->mid_range	= 4;
	$pages->paginate();

	$proyectos	=   $objconexion->consultar("SELECT * FROM productos WHERE 1 " . $condition . " ORDER BY id DESC " . $pages->limit . "");

	?>


<div class="p-4 bg-light">
    <div class="container">
        <h1 class="display-7">Bienvenido   </h1>
        <p class="lead">Topacio publicidad ecommerce</p>
        <hr class="my-2">
        
        <nav class="navbar bg-light">
  <div class="container-fluid">
    <form action class="d-flex" role="search" method="GET" >
      <input class="form-control me-2" type="search" placeholder="Busqueda de Productos" name="producto">
      <button class="btn btn-outline-success" type="submit" name="enviar" > Buscar  </button>
    </form>
  </div>
</nav>
    </div>
</div>

<div class="row marginTop">
			<div class="col-sm-12 paddingLeft pagerfwt">
				<?php if ($pages->items_total > 0) { ?>
					<?php echo $pages->display_pages(); ?>
					<?php echo $pages->display_items_per_page(); ?>
					<?php echo $pages->display_jump_menu(); ?>
				<?php } ?>
			</div>
		</div>

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

