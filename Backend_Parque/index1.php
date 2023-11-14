<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, *");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "handlers.php";
include_once "handlerRecepcion.php";


if (isset($_GET['nuevoIngreso']) && $_SERVER["REQUEST_METHOD"] === "GET") {
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

  if ($_GET['action'] === 'verReservaciones' && $_SERVER["REQUEST_METHOD"] === "GET") {
    obtenerReservasRecepcion();
 }

 if (isset($_GET['buscarSiHayVenta'])  && $_SERVER["REQUEST_METHOD"] === "GET") {
  $idArea =$_GET['idArea'];
  $fecha =$_GET['fecha'];
  hayventa($idArea,$fecha);
}
  if ($_GET['action'] === 'obtenerAnuncio' && $_SERVER["REQUEST_METHOD"] === "GET") {

    obtenerAnuncio();
  }

  if(isset($_GET['buscarSiHayReservacion'])  && $_SERVER["REQUEST_METHOD"] === "GET") {
    $idArea =$_GET['idArea'];
    $fecha_reserva =$_GET['fecha_reserva'];
    hayReservacion($idArea,$fecha_reserva);
  }

  if ( $_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_GET['ingresoReservacion'])) {
        crearReserva();
    } 
  }

  

?>