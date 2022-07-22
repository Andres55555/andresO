<?php
   // registro de nuevos usuario con base de datos para administracion de portafolio.
  require 'includes/conexion_useradmin.php';
  
  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password, nombres) VALUES (:email, :password, :nombres)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':nombres', $_POST['nombres']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = '!!Nuevo Usuario creado con exito!!';
    } else {
      $message = '!!Lo Sentimos El Usuario No Pudo Ser Creado!!';
    }
  }
?>
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
   Registrar Usuario Admin
   </div>
   <div class="card-body">

   <form action="registrar_useradmin.php" method="post">

Usuario: <input class="form-control" type="text" placeholder="&#129333; Usuario_Correo" name="email" >
<br/>
Contraseña: <input class="form-control" type="password" placeholder="&#128272; Contraseña" name="password" >
<br/>
Confirmar Contraseña: <input class="form-control" type="password" placeholder="&#128273; Confirmar_Contraseña" name="confirm_password" >
<br/>
Nombres: <input class="form-control" type="text" placeholder="&#128113; Nombres_Completos" name="nombres" >
<div class="card-header">
   <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
   <div class="card-body">
<button class="btn btn-success" type="sumit">Registrar Usuario</button>   <a class="btn btn-success" type="button" href="inicia_s.php">Inicia Session</a>  




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
