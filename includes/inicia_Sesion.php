<?php

require 'conexion_useradmin.php';



  if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $records = $conn->prepare('SELECT id, email, password, nombres FROM usuarios2 WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    

    session_start();

    

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['username'] = $results['nombres'];
      $_SESSION['user_id'] = $results['id'];
      header("Location: portafolio.php");
    } else {
      $message = '!!Lo Sentimos Las Credenciales No Coinciden!!';
    }
  }


  function acceso_user() {
    $nombre=$_POST['email'];
    $password=$_POST['password'];
    session_start();
    $_SESSION['nombre']=$nombre;

    $conexion=mysqli_connect("localhost","root","","r_user");
    $consulta= "SELECT * FROM user WHERE nombre='$nombre' AND password='$password'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);


    if($results['rol'] == 1){ //admin

        header('Location: portafolio.php');

    }else if($results['rol'] == 2){//lector
        header('Location: ../views/lector.php');
    }
    
    
    else{

        header('Location: login.php');
        session_destroy();

    }
  }

?>

