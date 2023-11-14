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

//$router->addRoute("POST", "/Backend_Parque/login", "login");
//$router->addRoute("POST", "/Backend_Parque/registrar-empleado", "registrarEmpleado");
//$router->addRoute("GET", "/Backend_Parque/obtener-empleados-admin", "obtenerEmpleadosAdmin");
//$router->addRoute("GET", "/Backend_Parque/obtener-area-admin", "obtenerAreaAdmin");
//$router->addRoute("PUT", "/Backend_Parque/actualizar-empleado", "actualizarEmpleadoAdmin");
//$router->addRoute("GET", "/Backend_Parque/obtener-clientes-admin", "obtenerClientesAdmin");
//$router->addRoute("GET", "/Backend_Parque/obtener-areas-admin", "obtenerAreasAdmin");
//$router->addRoute("PUT", "/Backend_Parque/actualizar-area-admin", "actualizarAreaAdmin");
//$router->addRoute("GET", "/Backend_Parque/obtener-roles-admin", "obtenerRolesAdmin");
//$router->addRoute("GET", "/Backend_Parque/validar-usuario-admin", "validarUsuarioAdmin");
//$router->addRoute("GET", "/Backend_Parque/obtener-tipos-area", "obtenerTiposArea");
//$router->addRoute("PUT", "/Backend_Parque/actualizar-tipo-area-admin", "actualizarAreaAdmin");
//$router->addRoute("GET", "/Backend_Parque/validar-nombre-area", "validarNombreAreaAdmin");
//$router->addRoute("POST", "/Backend_Parque/crear-area", "crearAreaAdmin");
//$router->addRoute("GET", "/Backend_Parque/validar-nombre-tipo-area", "validarNombreTipoArea");
//$router->addRoute("POST", "/Backend_Parque/crear-tipo-area", "crearTipoAreaAdmin");
//$router->addRoute("POST", "/Backend_Parque/crear-anuncio", "crearAnuncio");
//$router->addRoute("PUT", "/Backend_Parque/actualizar-anuncio-admin", "actualizarAreaAdmin");
//$router->addRoute("GET", "/Backend_Parque/obtener-anuncios", "obtenerAnuncios");


$router->route();

?>