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

include_once "router.php";

$router = new Router();

$router->addRoute("POST", "/Backend_Parque/login", "login");
$router->addRoute("POST", "/Backend_Parque/registrar-empleado", "registrarEmpleado");
$router->addRoute("GET", "/Backend_Parque/obtener-empleados-admin", "obtenerEmpleadosAdmin");
$router->addRoute("GET", "/Backend_Parque/obtener-clientes-admin", "obtenerClientesAdmin");
$router->addRoute("GET", "/Backend_Parque/obtener-areas-admin", "obtenerAreasAdmin");




$router->route();


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
?>