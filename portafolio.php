<?php  include("includes/conexion_useradmin.php");?>
<?php include("includes/cabecera.php"); ?> 
<?php include("includes/conexion_bd.php");?> 


<?php

// enviar valores a db
if($_POST){
$nombre=$_POST['nombre'];   
$categoria=$_POST['categoria'];
$fecha= new DateTime();
$imagen=$fecha->getTimestamp()."_".$_FILES['archivo']['name'];
$imagen_Temporal=$_FILES['archivo']['tmp_name'];
move_uploaded_file($imagen_Temporal,"imagenes/".$imagen);
$precio=$_POST['precio'];
$descripcion=$_POST['descripcion'];
$vendedor=$_POST['vendedor'];
$contacto=$_POST['contacto'];
$correo=$_POST['correo'];
$objconexion= new conexion();
$sql="INSERT INTO `productos` (`id`, `nombre`, `categoria`, `imagen`, `precio`, `descripcion`, `vendedor`, `contacto`, `correo`) VALUES (NULL,'$nombre','$categoria', '$imagen',$precio,'$descripcion','$vendedor',$contacto,'$correo');";
$objconexion->ejecutar($sql);
header ("location:portafolio.php");
}

if($_GET){
    
    // borrar informacion de base de datos 

    $id=$_GET['borrar'];
    $objconexion= new conexion();
    $imagen=$objconexion->consultar("SELECT imagen FROM `productos` WHERE id=".$id);
    unlink("imagenes/".$imagen[0]['imagen']);
    $sql="DELETE FROM `productos` WHERE `productos`.`id` =".$id;
    $objconexion->ejecutar($sql); 

}

$objconexion= new conexion();
$proyectos=$objconexion->consultar("SELECT * FROM `productos`");


?>
<br/>

<div class="container">
    <div class="row">
        <div class="col-md-4">

        <div class="card">
    <div class="card-header">
        Registrar Producto
    </div>
    <div class="card-body">
    <form action="portafolio.php" method="post" enctype="multipart/form-data">

Nombre del producto: <input require class="form-control" type="text" name="nombre" id="">  
<br/>
Categoria del producto: <select require class="form-control" type="text" name="categoria" id="">
<option value="Agro">Agro</option> 
<option value="Alimentos">Alimentos</option>
<option value="Arte">Arte</option>
<option value="Bebes">Bebes</option>
<option value="Belleza">Belleza</option>
<option value="Deportes">Deportes</option>
<option value="Electrodomesticos">Electrodomesticos</option>
<option value="Fiesta">Fiesta</option>
<option value="Herramientas">Herramientas</option>
<option value="Hogar">Hogar</option>
<option value="Instrumentos Musicales">Instrumentos Musicales</option>
<option value="Joyeria">Joyeria</option>
<option value="Juegos">Juegos</option>
<option value="Lectura">Lectura</option>
<option value="Multimedia">Multimedia</option>
<option value="Ropa">Ropa</option>
<option value="Servicios">Servicios</option>
<option value="Tecnologia">Tecnologia</option>
<option value="vehiculos">vehiculos</option>
</select>
<br/>
Imagen: <input require class="form-control" type="file" name="archivo" id="">
<br/>
Precio: <input require class="form-control" type="text" name="precio" id="">
<br/>
Descripcion: <textarea require class="form-control" name="descripcion" id="" cols="30" rows="3"></textarea>
<br/>
vendedor: <input require class="form-control" type="text" name="vendedor" id="">
<br/>
contacto: <input require class="form-control" type="text" name="contacto" id="">
<br/>
correo electrónico: <input require class="form-control" type="text" name="correo" id="">
<br/>

<input class="btn btn-success" type="submit" value="Enviar Datos">   <a class="btn btn-success" type="button" href="registro_useradmin.php">Nuevo Usuario</a>  
    </div>
</div>
 
        </div>
        <div class="col-md-6">
        <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Vendedor</th>
            <th>Contacto</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($proyectos as $proyecto) { ?>
            
        <tr>
            <td><?php echo $proyecto['id']; ?></td>
            <td><?php echo $proyecto['nombre']; ?></td>
            <td><?php echo $proyecto['categoria']; ?></td>
            <td><img width="150" src="imagenes/<?php echo $proyecto['imagen']; ?>" alt="" sizes="" srcset=""></td>
            <td><?php echo $proyecto['precio']; ?></td>
            <td><?php echo $proyecto['descripcion']; ?></td>
            <td><?php echo $proyecto['vendedor']; ?> </td>
            <td><?php echo $proyecto['contacto']; ?></td>
            <td><?php echo $proyecto['correo']; ?></td>
            <td><a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>">Eliminar</a></td>
        </tr>
        <?php } ?>
       
    </tbody>
</table>

        </div>
        
    </div>
</div>




<?php include("includes/pie.php");?> 