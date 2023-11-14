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
include_once "handlers.php";
/*
include_once "router.php";

$router = new Router();

$router->addRoute("POST", "/Backend_Parque/login", "login");
$router->addRoute("POST", "/Backend_Parque/registrar-empleado", "registrarEmpleado");
$router->addRoute("GET", "/Backend_Parque/obtener-empleados-admin", "obtenerEmpleadosAdmin");
$router->addRoute("GET", "/Backend_Parque/obtener-area-admin", "obtenerAreaAdmin");
//$router->addRoute("PUT", "/Backend_Parque/actualizar-empleado", "actualizarEmpleadoAdmin");
$router->addRoute("GET", "/Backend_Parque/obtener-clientes-admin", "obtenerClientesAdmin");
$router->addRoute("GET", "/Backend_Parque/obtener-areas-admin", "obtenerAreasAdmin");
//$router->addRoute("PUT", "/Backend_Parque/actualizar-area-admin", "actualizarAreaAdmin");
$router->addRoute("GET", "/Backend_Parque/obtener-roles-admin", "obtenerRolesAdmin");
$router->addRoute("GET", "/Backend_Parque/validar-usuario-admin", "validarUsuarioAdmin");
$router->addRoute("GET", "/Backend_Parque/obtener-tipos-area", "obtenerTiposArea");
//$router->addRoute("PUT", "/Backend_Parque/actualizar-tipo-area-admin", "actualizarAreaAdmin");
$router->addRoute("GET", "/Backend_Parque/validar-nombre-area", "validarNombreAreaAdmin");
$router->addRoute("POST", "/Backend_Parque/crear-area", "crearAreaAdmin");
$router->addRoute("GET", "/Backend_Parque/validar-nombre-tipo-area", "validarNombreTipoArea");
$router->addRoute("POST", "/Backend_Parque/crear-tipo-area", "crearTipoAreaAdmin");
$router->addRoute("POST", "/Backend_Parque/crear-anuncio", "crearAnuncio");
//$router->addRoute("PUT", "/Backend_Parque/actualizar-anuncio-admin", "actualizarAreaAdmin");
$router->addRoute("GET", "/Backend_Parque/obtener-anuncios", "obtenerAnuncios");




$router->route();

*/




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
    } else if (isset($_GET['ingresoVentaDetallada'])) {
        // para el ingreso de facturas
        $bd = include_once "conexionDB.php";
        $data = json_decode(file_get_contents("php://input"), true);
        $horas = $data['horas'];
        $idArea = $data['idArea'];
        $montoParcial = $data['montoParcial'];
        $descripcion = ""; // Aquí deberías incluir la lógica para obtener la descripción
        $idFactura = $data['idFactura'];
        $fecha = $data['fecha']; // Supongo que es $fechaVenta en lugar de $fecha
        $horainicial = $data['horainicial'];
        $horafinal = $data['horafinal'];

        // Formatea la fecha al formato de MySQL (AAAA-MM-DD)
        $fechaFormateada = (new DateTime($fechaVenta))->format('Y-m-d');

        // Now utilizes a prepared statement to prevent SQL injection
        $sql = "INSERT INTO venta(horas, idArea, montoParcial, descripcion, idFactura, fecha, horainicial,horafinal ) VALUES ('$horas', '$idArea','$montoParcial', '$descripcion', '$idFactura', '$fechaFormateada', '$horainicial', '$horafinal');";
        echo $sql;


        if ($bd->query($sql) === TRUE) {
            echo json_encode($data); // Send successful response
        } else {
            $response = array("error" => "Error creating new record");
            echo json_encode($response); // Send error response
        }
    } else if (isset($_GET['ingresoFacturaAsociada'])) {
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
    } else if (isset($_GET['login'])) {

        login();

    } else if (isset($_GET['registrarEmpleado'])) {

        registrarEmpleado();
    } else if (isset($_GET['crear-tipo-area'])) {

        crearTipoAreaAdmin();
    } else if (isset($_GET['crear-area'])) {

        crearAreaAdmin();
    } else if (isset($_GET['actualizar-area'])) {

        actualizarAreaAdmin();
    } else if (isset($_GET['actualizar-nombre-area'])) {

        actualizarNombreAreaAdmin();
    } else if (isset($_GET['actualizar-empleado-admin'])) {

        actualizarEmpleadoAdmin();
    } else if (isset($_GET['actualizar-contrasenia-empleado-admin'])) {

        actualizarContraseniaAdmin();
    } else if (isset($_GET['actualizar-anuncio-admin'])) {

        actualizarAnuncioAdmin();
    } else if (isset($_GET['crear-anuncio'])) {

        crearAnuncioAdmin();

        echo json_encode($data); // Send successful response
    } else {
        $response = array("error" => "Error creating new record");
        echo json_encode($response); // Send error response
    }
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



if (isset($_GET['nuevo']) && $_SERVER["REQUEST_METHOD"] === "GET") {
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




// UTLIMOS PEDRO: aqui PARA PROBAR RUTA
if ($_GET['action'] === 'verEmpleado' && $_SERVER["REQUEST_METHOD"] === "GET") {

    //invocar al handler
    obtenerEmpleadosAdmin();
}

if ($_GET['action'] === 'obtener-clientes-admin' && $_SERVER["REQUEST_METHOD"] === "GET") {

    obtenerClientesAdmin();
}

if ($_GET['action'] === 'obtener-areas-admin' && $_SERVER["REQUEST_METHOD"] === "GET") {

    obtenerAreasAdmin();
}


if ($_GET['action'] === 'obtener-area-admin' && $_SERVER["REQUEST_METHOD"] === "GET") {

    obtenerAreaAdmin();
}

if ($_GET['action'] === 'obtener-roles-admin' && $_SERVER["REQUEST_METHOD"] === "GET") {

    obtenerRolesAdmin();
}

if ($_GET['action'] === 'validar-usuario-admin' && $_SERVER["REQUEST_METHOD"] === "GET") {

    validarUsuarioAdmin();
}

if ($_GET['action'] === 'obtener-tipos-area' && $_SERVER["REQUEST_METHOD"] === "GET") {

    obtenerTiposArea();
}


if ($_GET['action'] === 'validar-nombre-area' && $_SERVER["REQUEST_METHOD"] === "GET") {

    validarNombreAreaAdmin();
}

if ($_GET['action'] === 'validar-nombre-tipo-area' && $_SERVER["REQUEST_METHOD"] === "GET") {

    validarNombreTipoArea();
}

if ($_GET['action'] === 'obtener-anuncios' && $_SERVER["REQUEST_METHOD"] === "GET") {

    obtenerAnunciosAdmin();
}

if ($_GET['action'] === 'obtener-empleado-id-admin' && $_SERVER["REQUEST_METHOD"] === "GET") {

    obtenerEmpleadoIdAdmin();
}

if ($_GET['action'] === 'obtener-anuncio-id-admin' && $_SERVER["REQUEST_METHOD"] === "GET") {

    obtenerAnuncioIdAdmin();
}

if ($_SERVER["REQUEST_METHOD"] === "DELETE") {

    eliminarAnuncioAdmin();
}
