<?php

include_once "./controladores/administrador.php";


function login() {
    //conexion
    $bd = include_once "conexionDB.php";
    //Decodificar si es necesario
    
    $data = json_decode(file_get_contents("php://input"), true);
    //obtener usuario
    $usuario = $data['usuario'];

    //obtener contraseña
    $contrasenia = $data['contrasenia'];

    // Invocar a la función de consulta SQL
    $result = validarCredenciales($bd, $usuario,$contrasenia);

    //retornar lo hallado
    echo json_encode($result);

}

function registrarEmpleado() {
    
    //conexion
    $bd = include_once "conexionDB.php";

    //Decodificar si es necesario
    $data = json_decode(file_get_contents("php://input"), true);

    //obtener usuario
    $usuario = $data['usuario'];

    //obtener nombre
    $nombre = $data['nombre'];

    //obtener contraseña
    $contrasenia = $data['contrasenia'];

    //obtener rol
    $rol = $data['rol'];
    

    // Invocar a la función de consulta SQL

    $result = insertarEmpleado($bd, $nombre, $usuario, $contrasenia, $rol);
    //retornar lo hallado
    echo json_encode($result);

}




?>