<?php

require './models/Empleado.php';

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


/*function usuarioExiste($bd, $usuario) {
    $tabla = 'empleado';
    $sql = "SELECT COUNT(*) FROM $tabla WHERE usuario = :usuario";
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->execute();

    // Obtener el número de filas que coinciden con la consulta
    $numeroFilas = $stmt->fetchColumn();

    // Devolver true si el usuario existe, false de lo contrario
    return $numeroFilas > 0;
}*/