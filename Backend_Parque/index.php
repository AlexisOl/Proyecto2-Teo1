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

?>