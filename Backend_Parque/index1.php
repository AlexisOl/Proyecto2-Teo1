<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, *");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conexion = include_once "conexionDB.php";
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
} else {
   // echo json_encode(array("message" => "Método no permitido"));
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST['action']==='login') {

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

?>