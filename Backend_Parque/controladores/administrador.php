<?php

require './models/Empleado.php';
require './models/Cliente.php';
require './models/Area.php';

function validarCredenciales($bd, $usuario, $contrasenia) {

    $tabla = 'empleado';
    $sql = "SELECT idEmpleado, nombre, usuario, rol FROM $tabla WHERE usuario = :usuario AND contrasenia = AES_ENCRYPT(:contrasenia, 'teo1_2023')";
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->bindParam(':contrasenia', $contrasenia, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    
    if(!empty($result)){
        
        $empleado = new Empleado(
            $result[0]->idEmpleado,
            $result[0]->nombre,
            $result[0]->usuario,
            $result[0]->rol
        );
        
        return $empleado;

    }else{
        return 'error';
    }

    
}

function insertarEmpleado($bd, $nombre, $usuario, $contrasenia, $rol) {

    $tabla = 'empleado';
    $sql = "INSERT INTO $tabla (nombre,usuario,contrasenia,rol) VALUES (:nombre,:usuario,AES_ENCRYPT(:contrasenia,'teo1_2023'),:rol)";
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->bindParam(':contrasenia', $contrasenia, PDO::PARAM_STR);
    $stmt->bindParam(':rol', $rol, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt) {
        return true;
    } else {
        return false;
    }
    
}


function usuarioExiste($bd, $usuario) {
    $tabla = 'empleado';
    $sql = "SELECT COUNT(*) FROM $tabla WHERE usuario = :usuario";
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->execute();

    // Obtener el número de filas que coinciden con la consulta
    $numeroFilas = $stmt->fetchColumn();

    // Devolver true si el usuario existe, false de lo contrario

    if($numeroFilas>0){
        return true;
    }else{
        return false;
    }

}

function obtenerEmpleados($bd){
    
    $tabla = 'empleado';
    $sql = "SELECT idEmpleado, nombre, usuario, rol FROM $tabla";
    $stmt = $bd->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    $empleados = array();

    foreach ($result as $row) {
        $empleado = new Empleado($row->idEmpleado, $row->nombre, $row->usuario, $row->rol);
        $empleados[] = $empleado;
    }

    return $empleados;
    

}

function obtenerClientes($bd){
    
    $tabla = 'cliente';
    $sql = "SELECT cliente.idCliente, cliente.nit, cliente.nombre AS nombre, tipoCliente.nombre AS tipoCliente, cliente.estadoSuscripcion, cliente.fechaInicioPago, cliente.direccion
    FROM $tabla
    JOIN tipoCliente ON cliente.tipoCliente = tipoCliente.idTipoCliente;";
    

    $stmt = $bd->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    $clientes = array();


    foreach ($result as $row) {
        $cliente = new Cliente($row->idCliente, $row->nombre,$row->nit, $row->estadoSuscripcion, $row->fechaInicioPago,$row->tipoCliente,$row->direccion);
        $clientes[] = $cliente;
    }

    return $clientes;
    

}

function obtenerAreas($bd){
    
    $tabla = 'area';
    $sql = "SELECT area.idArea, area.tipoArea, area.nombre AS nombre, area.precio, area.estado, area.capacidad, area.horaInicio, area.horaFin, area.descripcion,
    tipoArea.nombre AS tipoArea
    FROM $tabla
    INNER JOIN tipoArea ON area.tipoArea = tipoArea.idTipoArea;";
    

    $stmt = $bd->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    $areas = array();


    foreach ($result as $row) {
        
        $area = new Area($row->idArea, $row->tipoArea,$row->nombre,$row->precio,$row->estado,$row->capacidad,$row->horaInicio,$row->horaFin,$row->descripcion);
        $areas[] = $area;
    }

    return $areas;
    

}