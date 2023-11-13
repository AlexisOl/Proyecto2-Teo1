<?php

// index.php
// Este archivo será el punto de entrada principal y dirigirá las solicitudes a las funciones correspondientes.

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, *");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Content-Security-Policy: default-src 'self' http://localhost;");



include_once "router.php";


//VER MANIANA NO ME JALO :n
$router = new Router();

$router->addRoute("POST", "/Backend_Parque/login", "login");
$router->addRoute("POST", "/Backend_Parque/registrar-empleado", "registrarEmpleado");
$router->addRoute("GET", "/Backend_Parque/obtener-empleados-admin", "obtenerEmpleadosAdmin");
$router->addRoute("GET", "/Backend_Parque/obtener-clientes-admin", "obtenerClientesAdmin");
$router->addRoute("GET", "/Backend_Parque/obtener-areas-admin", "obtenerAreasAdmin");
$router->addRoute("GET", "/Backend_Parque/prueba", "prueba");




$router->route();
/*

class conexion {
    private $host = 'localhost';
    private $dbname = 'parque';
 
    //--------------------------
    // SOLO CAMBIAR EN BASE A SUS CREDENCIALES  ----------------
    //--------------------------
    private $username = 'adminstracionParque';
    private $password = 'TuContrasenaSegura';
 
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
     public function verClientes($tabla){
         $sql = "SELECT * FROM " . $tabla . ";";
         $generarAccion = $this->conexion->query($sql);
         return $generarAccion->fetchAll();
     }
 
     public function verClienteNit($tabla, $nit) {
         $sql = "SELECT * FROM  '$tabla' WHERE nit = '$nit'";
         echo $sql;
         $stmt = $this->conexion->prepare($sql);
         $stmt->bindParam(':nit', $nit, PDO::PARAM_STR);
         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_OBJ); 
     }
     
 }
 
 
 
 
 if ($_SERVER["REQUEST_METHOD"] === "POST") {
if (isset($_GET['ingresoFactura'])) {
    // para el ingreso de facturas
    $bd = include_once "conexionDB.php";
    $data = json_decode(file_get_contents("php://input"), true);
    $detalle = $data['detalle'];
    $nitCliente = $data['nitCliente'];
    $fecha = $data['fecha'];

    // Formatea la fecha al formato de MySQL (AAAA-MM-DD)
    $fechaFormateada = (new DateTime($fecha))->format('Y-m-d');

    // Ahora utiliza la fecha formateada en la consulta SQL
    $sql = "INSERT INTO factura(detalle, nitCliente, fecha) VALUES ('$detalle', '$nitCliente', '$fechaFormateada');";

    if ($bd->query($sql) === TRUE) {
        echo json_encode($data); // Send successful response
    } else {
        $response = array("error" => "Error creating new record");
        echo json_encode($response); // Send error response
    }
}
else if(isset($_GET['ingresoVentaDetallada'])) {
          // para el ingreso de facturas
          $bd = include_once "conexionDB.php";
          $data = json_decode(file_get_contents("php://input"), true);
          $horas = $data['horas'];
          $idArea = $data['idArea'];
          $montoParcial = $data['montoParcial'];
          $descripcion ="";
          $idFactura = $data['idFactura'];
          $fechaVenta = $data['fechaVenta'];
  
          // Formatea la fecha al formato de MySQL (AAAA-MM-DD)
          $fechaFormateada = (new DateTime($fechaVenta))->format('Y-m-d');
          
        // Now utilizes a prepared statement to prevent SQL injection
        $sql = "INSERT INTO venta(horas, idArea, montoParcial, descripcion, idFactura) VALUES ('$horas', '$idArea','$montoParcial', '$descripcion', '$idFactura');";
        echo $sql;

        
        if ($bd->query($sql) === TRUE) {
          echo json_encode($data); // Send successful response
      } else {
          $response = array("error" => "Error creating new record");
          echo json_encode($response); // Send error response
      }

     
          
  }else if(isset($_GET['ingresoFacturaAsociada'])){
        // para el ingreso de facturas
        $bd = include_once "conexionDB.php";
        $data = json_decode(file_get_contents("php://input"), true);
        $idEmpleado = $data['idEmpleado'];
        $idFactura = $data['idFactura'];
        
        // Now utilizes a prepared statement to prevent SQL injection
        $sql = "INSERT INTO empleadoFactura(idEmpleado, idFactura) VALUES ('$idEmpleado', '$idFactura');";
        echo $sql;

        
        if ($bd->query($sql) === TRUE) {
        echo json_encode($data); // Send successful response
    } else {
        $response = array("error" => "Error creating new record");
        echo json_encode($response); // Send error response
    }
  } else {
      $conexion = new conexion();
      $data = json_decode(file_get_contents("php://input"), true);
      $nombre = $data['nombre'];
      $nit = $data['nit'];
      $estado = $data['estado'];
      $ubicacion = $data['ubicacion'];
      echo $ubicacion;
      echo $nombre;
      $sql = "INSERT INTO cliente(nombre, nit, estado, ubicacion) VALUES ('$nombre', '$nit', '$estado', '$ubicacion');";
      echo $sql;
      
      if ($conexion->ejecucion($sql) === TRUE) {
          echo "Nuevo registro creado correctamente";
      } else {
          echo "Error: " . $sql . "<br>" ;
      }
      echo json_encode($data);
  }

 } else {
    // echo json_encode(array("message" => "Método no permitido"));
 }
 
 
 ///para ver por nit
 if (isset($_GET["verCliente"]) && $_SERVER["REQUEST_METHOD"] === "GET") {
     $bd = include_once "conexionDB.php";
 
     if (isset($_GET["verCliente"])) {
         $nit = $_GET['verCliente'];
         $tabla = 'cliente'; // Asegúrate de tener la variable $tabla definida adecuadamente
 
         $sql = "SELECT * FROM $tabla WHERE nit = :nit";
         $stmt = $bd->prepare($sql);
         $stmt->bindParam(':nit', $nit, PDO::PARAM_STR);
         $stmt->execute();
         $result = $stmt->fetchAll(PDO::FETCH_OBJ);
 
         if (!empty($result)) {
             echo json_encode($result);
         } else {
             echo json_encode(array('error' => 'No se encontraron resultados para el parámetro nit proporcionado'));
         }
     } else {
         echo json_encode(array('error' => 'El parámetro nit no está presente en la solicitud'));
     }
 }
 
 //para ver general
 if ($_GET['action'] === 'getColaboradores' && $_SERVER["REQUEST_METHOD"] === "GET") {
     $bd = include_once "conexionDB.php";
        
     $tabla = 'cliente'; // Asegúrate de tener la variable $tabla definida adecuadamente
 
         $sql = "SELECT * FROM $tabla";
         $stmt = $bd->query($sql);
         $result = $stmt->fetchAll(PDO::FETCH_OBJ);
 
         if (!empty($result)) {
             echo json_encode($result);
         } else {
             echo json_encode(array('error' => 'No se encontraron resultados para el parámetro nit proporcionado'));
         }
 
 }
 
 
 if ($_GET['verArea'] === '1' && $_SERVER["REQUEST_METHOD"] === "GET") {
     $bd = include_once "conexionDB.php";
        
     $tabla = 'area'; // Asegúrate de tener la variable $tabla definida adecuadamente
 
         $sql = "SELECT * FROM $tabla";
         $stmt = $bd->query($sql);
         $result = $stmt->fetchAll(PDO::FETCH_OBJ);
 
         if (!empty($result)) {
             echo json_encode($result);
         } else {
             echo json_encode(array('error' => 'No se encontraron resultados para el parámetro nit proporcionado'));
         }
 
 }


 if (isset($_GET['verFactura']) && $_SERVER["REQUEST_METHOD"] === "GET") {
  $bd = include_once "conexionDB.php";
     
  $tabla = 'factura'; // Asegúrate de tener la variable $tabla definida adecuadamente

  $nitCliente = $_GET['verFactura'];
  $detalle = $_GET['detalleFactura'];
  $fecha = $_GET['fechaFactura'];


  $sql = "SELECT * FROM $tabla WHERE nitCliente = :nitCliente AND detalle = :detalle AND fecha = :fecha";
  $stmt = $bd->prepare($sql);
  $stmt->bindParam(':nitCliente', $nitCliente, PDO::PARAM_STR);
  $stmt->bindParam(':detalle', $detalle, PDO::PARAM_STR);
  $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_OBJ);

  if (!empty($result)) {
      echo json_encode($result);
  } else {
      echo json_encode(array('error' => 'No se encontraron resultados para el parámetro nit proporcionado'));
  }
}


// controlador para enviar las facturas
if (isset($_GET['verFacturasGlobales']) && $_SERVER["REQUEST_METHOD"] === "GET") {
    $bd = include_once "conexionDB.php";
    $tabla = 'venta'; 
  
    $sql = "SELECT * FROM $tabla";
    $stmt = $bd->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
  
    if (!empty($result)) {
        echo json_encode($result);
    } else {
        echo json_encode(array('error' => 'No se encontraron resultados para el parámetro nit proporcionado'));
    }
  }
  */

?>