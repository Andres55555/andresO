<?php
require 'includes/inicia_Sesion.php';
?>

<!DOCTYPE html>
<html lang="en">
<html>
  <head>  
    <meta charset="utf-8">
    <title>Iniciar Session</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> 
  </head>
  <body>

  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>

    <div class="container">

<div class="row">
 <div class="col-md-4">
 </div>
 <div class="col-md-4">
 <br/>
 <div class="card">
   <div class="card-header">
   Iniciar Session
   </div>
   <div class="card-body">

   <form action="inicia_s.php" method="post">

Usuario: <input class="form-control" type="text" placeholder="&#129333; usuario" name="email" >
<br/>
Contraseña: <input class="form-control" type="password" placeholder="&#128272; contraseña" name="password" >
<div class="card-Light">
   <?php if(!empty($message)): ?>
       <?= $message ?>
    <?php endif; ?>
    <br/>
    </div>  
<button class="btn btn-success col-md-12" type="submit">lngresar Topacio publicidad ecommerce  </button>
 </div> 

  </body>
</html>
