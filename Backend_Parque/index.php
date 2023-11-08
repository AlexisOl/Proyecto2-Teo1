<?php


class conexion {
   private $host = 'localhost';
   private $dbname = 'parque';

   //--------------------------
   // SOLO CAMBIAR EN BASE A SUS CREDENCIALES  ----------------
   //--------------------------
   private $username = 'adminstracionParque';
   private $password = 'Teori@sistemas1';

   private $conexion;

   private $existencia;
   public function __construct(){
    try {
        // Crear una nueva conexión PDO
        $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
    
        // Configurar el modo de error para mostrar excepciones
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Resto de operaciones con la base de datos...
    } catch (PDOException $e) {
        // Manejo de errores
        echo "Error de conexión: " . $e->getMessage();
    }
   }


   public function ejecucion($sql) {
    $this->conexion->exec($sql);
    // crea ejecucion
    return $this->conexion->lastInsertId();
   }

   // para select

   public function consult($sql) {
    $valor = $this->conexion->prepare($sql);
    $valor->execute();
    return $valor->fetchAll();
   }


    //noticias
    public function muestraNoticias($tabla){
        $sql = "SELECT * FROM " . $tabla . ";";
        $generarAccion = $this->conexion->query($sql);
        return $generarAccion->fetchAll();
    
    }

   
}



?>