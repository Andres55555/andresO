<?php
// conexion base de datos 

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

    public function getRecFrmQry($query)
    {
        //echo $query;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function consultar($sql){  // visualizar datos 
      $sentencia=$this->conexion->prepare($sql);
      $sentencia->execute();
      return $sentencia->fetchAll();
    }  

    public function loguearse($sql){  // loguearse
        $sentencia1=$this->conexion->prepare($sql);
        $sentencia1->execute();
        return $sentencia1->fetchAll();
      }  

    
    

}

?>