<?php
// conexion base de datos productos 

class conexion{
    private $servidor="localhost";
    private $usuario="root";
    private $contrasenia="";
    private $conexion;

    public function __construct(){

        try{
            $this->conexion= new PDO("mysql:host=$this->servidor;dbname=album",$this->usuario,$this->contrasenia);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        } catch ( PDOException $e){
            return "falla en la conexion".$e;
        
        }

    }

    public function ejecutar($sql){  // insertar datos, eliminar datos, actualizar datos 
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }

    public function consultar($sql){  // visualizar datos 
      $sentencia=$this->conexion->prepare($sql);
      $sentencia->execute();
      return $sentencia->fetchAll();
    }  

    
    

}

?>