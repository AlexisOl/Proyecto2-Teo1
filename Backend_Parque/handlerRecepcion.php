<?php

include_once "./controladores/administrador.php";
include_once "./controladores/recepcionController.php";



function obtenerReservasRecepcion() {
    
    //conexion
    $bd = include_once "conexionDB.php";

    // Invocar a la función de consulta SQL
    $result = obtenerReservar($bd);
    //retornar lo hallado
    echo json_encode($result);

}

function crearReserva(){

    //conexion
     $bd = include_once "conexionDB.php";

     
     $data = json_decode(file_get_contents("php://input"), true);

     $idReserva = $data['idReserva'];
     $nitCliente = $data['nitCliente'];
     $idArea = $data['idArea'];
     $fecha_reserva = $data['fecha_reserva'];
     $fecha_fin_reserva = $data['fecha_fin_reserva'];
     $idEmpleado = $data['idEmpleado'];
     // Invocar a la función de consulta SQL
     $result = generarReservacion($bd,$nitCliente,$idArea,$fecha_reserva,$fecha_fin_reserva,$idEmpleado);
 
     //retornar lo hallado
     echo json_encode($result);
   
}

//funcion si ya hay alguna reservacion hecha
function hayReservacion($idArea,$fecha_reserva ){

    //conexion
    $bd = include_once "conexionDB.php";

  
    // Invocar a la función de consulta SQL
    $result = buscarSiHayReservacion($bd,$fecha_reserva, $idArea);

    //retornar lo hallado
    echo json_encode($result);
}


// funcion para ver si hay ventas
function hayventa($idArea,$fecha ){

    //conexion
    $bd = include_once "conexionDB.php";

    echo "mira:".$fecha;
    echo "mira:".$idArea;
    // Invocar a la función  consulta SQL
    $result = buscarSiHayVentas($bd,$idArea, $fecha);

    //retornar lo hallado
    echo json_encode($result);
}



?>