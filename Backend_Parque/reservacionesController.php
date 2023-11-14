<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, *");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if (isset($_GET['verRecervaciones']) && $_SERVER["REQUEST_METHOD"] === "GET") {
    $bd = include_once "conexionDB.php";
    $tabla = 'reserva'; 
  
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


?>