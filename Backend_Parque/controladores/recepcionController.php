<?php


    require './models/Reserva.php';
    require './models/Venta.php';


function obtenerReservar($bd){
    
    $tabla = 'reserva';
    $sql = "SELECT idReserva, nitCliente, idArea, fecha_reserva, fecha_fin_reserva,idEmpleado  FROM $tabla";
    $stmt = $bd->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    $reservas = array();

    foreach ($result as $row) {
        $reserva = new Reserva($row->idReserva, $row->nitCliente, $row->idArea, $row->fecha_reserva, $row->fecha_fin_reserva, $row->idEmpleado);
        $reservas[] = $reserva;
    }

    return $reservas;
    

}

function generarReservacion($bd, $nitCliente,$idArea,$fecha_reserva,$fecha_fin_reserva,$idEmpleado){

   $tabla = 'reserva';
   $sql = "INSERT INTO $tabla (nitCliente,idArea,fecha_reserva,fecha_fin_reserva,idEmpleado) VALUES (:nitCliente,:idArea,:fecha_reserva,:fecha_fin_reserva,:idEmpleado)";
   $stmt = $bd->prepare($sql);
   $stmt->bindParam(':nitCliente', $nitCliente, PDO::PARAM_STR);
   $stmt->bindParam(':idArea', $idArea, PDO::PARAM_STR);
   $stmt->bindParam(':fecha_reserva', $fecha_reserva, PDO::PARAM_STR);
   $stmt->bindParam(':fecha_fin_reserva', $fecha_fin_reserva, PDO::PARAM_STR);
   $stmt->bindParam(':idEmpleado', $idEmpleado, PDO::PARAM_STR);
   $exito = $stmt->execute();

   if ($exito) {
       return true;
   } else {
       return false;
   } 

}


function  buscarSiHayReservacion($bd,$fecha_reserva, $idArea) {
    $tabla = 'reserva';
    $sql = "SELECT COUNT(*) FROM $tabla WHERE idArea = :idArea AND fecha_reserva = :fecha_reserva";
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':idArea', $idArea, PDO::PARAM_STR);
    $stmt->bindParam(':fecha_reserva', $fecha_reserva, PDO::PARAM_STR);
    $stmt->execute();

    // Obtener el número de filas que coinciden con la consulta
    $numeroFilas = $stmt->fetchColumn();

    if($numeroFilas>0){
        return true;
    }else{
        return false;
    }
}


function  buscarSiHayVentas($bd, $idArea,$fecha) {
    $tabla = 'venta';
    $sql = "SELECT *  FROM $tabla WHERE idArea = :idArea AND fecha = :fecha";
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':idArea', $idArea, PDO::PARAM_STR);
    $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    echo $sql;
    // Obtener el número de filas que coinciden con la consulta
    $ventas = array();   

    foreach ($result as $row) {
        $venta = new Venta($row->idVenta, $row->horas,$row->idArea,$row->montoParcial,$row->descripcion,$row->idFactura,$row->fecha,$row->horainicial,$row->horafinal);
        $ventas[] = $venta;
    }

    return $ventas;
}