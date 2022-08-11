<?php include("includes/cabecera.php"); ?> 
<?php require 'includes/Registro_usuarios.php'; ?>
<br/>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>


<div class="row">
 <div class="col-md-4">
 </div>
 <div class="col-md-4">
 <br/>
 <div class="card">
   <div class="card-header">
   Registrar Usuario Topacio ecommerce
   </div>
   <div class="card-body">

   <form action="Registro_usuarios.php" method="post">

Nombres: <input require class="form-control" type="text" placeholder="&#128113; Nombres_Completos" name="nombres" >
<br/>
Usuario: <input require class="form-control" type="email" placeholder="&#129333; Usuario_Correo" name="email" >
<br/>
Contraseña: <input require class="form-control" type="password" placeholder="&#128272; Contraseña" name="password" >
<br/>
Numero Celular: <input require class="form-control" type="tel" placeholder="&#128241; Numero_Celular" name="celular" >
<br/>
Ciudad: <input require class="form-control" type="text" placeholder="&#127753; Ciudad Donde Reside" name="ciudad" >
<br/>
Direccion: <input require class="form-control" type="text" placeholder="&#127969; Direccion Del Domicilio" name="direccion" > 
<input  require class="form-control" type="hidden"  name="rol" value="2" readonly >

<div class="card-Light">
   <div class="card-body">
<button class="btn btn-success col-md-12" type="sumit">Registrar Usuario</button>
<?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>





</form>
   </div>
   <div class="card-footer text-muted">
   </div>
 </div>


 </div>
 <div class="col-md-4">
   
 </div> 
 <a class="btn btn-secondary" type="button" href="Políticas.php">Políticas de Privacidad</a>   
</div>
<br/>
</div>


  </body>
</html>

