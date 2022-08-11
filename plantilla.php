<?php include("includes/cabecera.php"); ?> 
<?php include("includes/conexion_bd.php");?> 

<?php session_start(); 
$arrays = $_SESSION;
?>
<?php foreach($arrays as $loggin) { ?>
<?php } ?>

<?php 
$id = $_GET["id"];
$objconexion= new conexion();
$query = "SELECT * FROM productos WHERE id=".$id;
$proyectos=$objconexion->consultar($query)
?>

<br/>
<div class="card">
<h3>  <?php if(isset($_SESSION["username"])){echo '&#129333 '.$_SESSION["username"] ;}?></h3>
</div>
<br/>
  
<div class="row row-cols-1 row-cols-md-1 g-0">
  <?php foreach($proyectos as $proyecto) { ?>
    <div class="card mb-3"  >
  <div class="row g-1">
    <div class="col-md-4">
    <img width="640" height="480" src="imagenes/<?php echo $proyecto['imagen']; ?>" class="card-img-top" alt="..." if(true){}>
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <h2 class="title">Nombre del Articulo: <?php echo $proyecto['nombre']; ?></h2>
      <br/>
      <h3 class="text">Categoria del Articulo: <?php echo $proyecto['categoria']; ?></h3>
      <h3 class="text">Descripcion del Articulo: <?php echo $proyecto['descripcion']; ?></h3>
      <h3 class="text">Nombre del Vendedor: <?php echo $proyecto['vendedor']; ?></h3>
      <br/>
      <h3 class="text">Precio del Articulo: <?php echo '$'.$proyecto['precio']; ?></h3>
      </div>
    </div>
  </div>
</div>
        


  <a class="btn btn-success" type="button" target="_blank" href="https://api.whatsapp.com/send?phone=57<?php echo $proyecto['contacto'];?>&text=Hola,%20Sr(a) <?php echo $proyecto['vendedor'];?>%20me%20gustaria%20
  conocer%20mas%20sobre%20el%20articulo <?php echo $proyecto['nombre'];?>%20N<?php echo $proyecto['id'];?>%20,<?php echo $_SESSION["user_id"];?>%20publicado%20en%20Topacio%20publicidad%20ecommerce " >Contactar vendedor para compra del Articulo </a>  
      <?php } ?>
    </div> 

        <br/>
      <?php include("includes/pie.php");?> 

      