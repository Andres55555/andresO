<?php
   // registro de nuevos usuarios administradores.
   require 'conexion_useradmin.php';
  
   $message = '';  
 
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO usuarios1 (nombres, email, password, celular, rol) VALUES (:nombres, :email, :password, :celular, :rol)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombres', $_POST['nombres']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':celular', $_POST['celular']);
    $stmt->bindParam(':rol', $_POST['rol']);

    if ($stmt->execute()) {
      $message = '!!Nuevo Usuario creado con exito!!';
    } else {
      $message = '!!Lo Sentimos El Usuario No Pudo Ser Creado!!';
    }

  }
?>