<?php

require 'conexion_userplataforma.php';

session_start();

  if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $records = $conn->prepare('SELECT id, email, password FROM usuarios1 WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: portafolio.php");
    } else {
      $message = '!!Lo Sentimos Las Credenciales No Coinciden!!';
    }
  }

?>

