<?php
   // registro de nuevos usuarios Topacio.
  require 'conexion_useradmin.php';
  
   $message = '';  
 
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO usuarios2 (nombres, email, password, celular, ciudad, direccion, rol) VALUES (:nombres, :email, :password, :celular, :ciudad, :direccion, :rol)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombres', $_POST['nombres']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':celular', $_POST['celular']);
    $stmt->bindParam(':ciudad', $_POST['ciudad']);
    $stmt->bindParam(':direccion', $_POST['direccion']);
    $stmt->bindParam(':rol', $_POST['rol']);

    if ($stmt->execute()) {
      $message = '!!Nuevo Usuario creado con exito ya puedes ingresar con tu usuario y Contraseña en el Item Iniciar Session!!';
    } else {
      $message = '!!Lo Sentimos El Usuario No Pudo Ser Creado!!';
    }

  }
?>