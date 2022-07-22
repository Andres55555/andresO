
<?php require 'includes/Registro_usuarios2.php'; ?>

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

   <form action="Registro_usuariosTopacio.php" method="post">

Nombres: <input require class="form-control" type="text" placeholder="&#128113; Nombres_Completos" name="nombres" >
<br/>
Usuario: <input require class="form-control" type="text" placeholder="&#129333; Usuario_Correo" name="email" >
<br/>
Contraseña: <input require class="form-control" type="password" placeholder="&#128272; Contraseña" name="password" >
<br/>
Numero Celular: <input require class="form-control" type="text" placeholder="&#128241; Numero_Celular" name="celular" >
<br/>
Ciudad: <input require class="form-control" type="text" placeholder="&#127753; Ciudad Donde Reside" name="ciudad" >
<br/>
Direccion: <input require class="form-control" type="text" placeholder="&#127969; Direccion Del Domicilio" name="direccion" >
<br/>
Tipo de usuario: <input  require class="form-control" type="hidden"  name="rol" value="2" readonly >
<br/>
<div class="card-header">
   <div class="card-body">
<button class="btn btn-success" type="sumit">Registrar Usuario</button>   <a class="btn btn-success" type="button" href="inicia_s.php">Inicia Session</a>  
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
</div>

</div>


  </body>
</html>
