<?php

    require './models/Empleado.php';
    require './models/Cliente.php';
    require './models/Area.php';
    require './models/Rol.php';
    require './models/TipoArea.php';
    require './models/Anuncio.php';

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

    $exito = $stmt->execute();

    if ($exito) {
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
    //AQUI POR QUE NO IBAMOS IGUAL EN EL DB
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
    $sql = "SELECT cliente.idCliente, cliente.nit, cliente.nombre AS nombre, tipoCliente.nombre AS tipoCliente, cliente.direccion
    FROM $tabla
    JOIN tipoCliente ON cliente.tipoCliente = tipoCliente.idTipoCliente;";
    

    $stmt = $bd->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    $clientes = array();


    foreach ($result as $row) {
        $cliente = new Cliente($row->idCliente, $row->nombre,$row->nit,$row->tipoCliente,$row->direccion);
        $clientes[] = $cliente;
    }

    return $clientes;
    

}

function obtenerAreas($bd){
    
    $tabla = 'area';
    $sql = "SELECT area.idArea, area.tipoArea, area.nombre AS nombre, area.precio, area.capacidad, area.horaInicio, area.horaFin, area.descripcion,
    tipoArea.nombre AS tipoArea
    FROM $tabla
    INNER JOIN tipoArea ON area.tipoArea = tipoArea.idTipoArea;";
    

    $stmt = $bd->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    $areas = array();

    foreach ($result as $row) {
        
        $area = new Area($row->idArea, $row->tipoArea,$row->nombre,$row->precio,$row->capacidad,$row->horaInicio,$row->horaFin,$row->descripcion);
        $areas[] = $area;
    }

    return $areas;   

}


function obtenerRoles($bd){
    
    $tabla = 'rol';
    $sql = "SELECT id,nombre FROM $tabla";
    $stmt = $bd->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    $roles = array();

    foreach ($result as $row) {
        $rol = new Rol($row->id, $row->nombre);
        $roles[] = $rol;
    }

    return $roles;
 
}

function areaExiste($bd, $nombre) {
    $tabla = 'area';
    $sql = "SELECT COUNT(*) FROM $tabla WHERE nombre = :nombre";
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->execute();

    // Obtener el número de filas que coinciden con la consulta
    $numeroFilas = $stmt->fetchColumn();

    if($numeroFilas>0){
        return true;
    }else{
        return false;
    }

}

function crearArea($bd,$tipoArea,$nombre,$precio,$capacidad,$horaInicio,$horaFin,$descripcion){
    $tabla = 'area';
    $sql = "INSERT INTO $tabla (tipoArea,nombre,precio,capacidad,horaInicio,horaFin,descripcion) VALUES (:tipoArea,:nombre,:precio,:capacidad,:horaInicio,:horaFin,:descripcion)";
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':tipoArea', $tipoArea, PDO::PARAM_INT);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
    $stmt->bindParam(':capacidad', $capacidad, PDO::PARAM_INT);
    $stmt->bindParam(':horaInicio', $horaInicio, PDO::PARAM_STR);
    $stmt->bindParam(':horaFin', $horaFin, PDO::PARAM_STR);
    $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    
    $exito = $stmt->execute();

    if ($exito) {
        return true;
    } else {
        return false;
    } 
}


function tipoAreaExiste($bd, $nombre) {
    $tabla = 'tipoArea';
    $sql = "SELECT COUNT(*) FROM $tabla WHERE nombre = :nombre";
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->execute();

    // Obtener el número de filas que coinciden con la consulta
    $numeroFilas = $stmt->fetchColumn();

    if($numeroFilas>0){
        return true;
    }else{
        return false;
    }

}

function crearTipoDeArea($bd,$nombre){
    $tabla = 'tipoArea';
    $sql = "INSERT INTO $tabla (nombre) VALUES (:nombre)";
    $stmt = $bd->prepare($sql);    
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);   
    $exito = $stmt->execute();

    if ($exito) {
        return true;
    } else {
        return false;
    }  
}


function crearAnuncio($bd,$titulo,$descripcion,$fechaPublicacion,$urlImagen){

    $tabla = 'anuncio';
    $sql = "INSERT INTO $tabla (titulo,descripcion,fechaPublicacion,urlImagen) VALUES (:titulo,:descripcion,:fechaPublicacion,:urlImagen)";
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
    $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    $stmt->bindParam(':fechaPublicacion', $fechaPublicacion, PDO::PARAM_STR);
    $stmt->bindParam(':urlImagen', $urlImagen, PDO::PARAM_STR);
        
    $exito = $stmt->execute();

    if ($exito) {
        return true;
    } else {
        return false;
    } 
}


//AQUI CAMBIO 
function obtenerAnuncios($bd){
    
    $tabla = 'anuncio';

    $sql = "SELECT * FROM $tabla ORDER BY fechaPublicacion DESC";
    
    $stmt = $bd->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    
    $anuncios = array();   
    
    foreach ($result as $row) {
        $anuncio = new Anuncio($row->idAnuncio, $row->titulo, $row->descripcion, $row->fechaPublicacion, $row->urlImagen);
        $anuncios[] = $anuncio;
    }
    
    return $anuncios;
}

function actualizarAnuncio($bd,$titulo,$descripcion,$id){

    try {
        $tabla = 'anuncio';
        $sql = "UPDATE $tabla SET titulo = :titulo, descripcion = :descripcion            
                WHERE idAnuncio = :id";
        
        $stmt = $bd->prepare($sql);
        
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
        $exito = $stmt->execute();
        
        if ($exito) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $th) {
        return false;
    }

    
}

function eliminarAnuncio($bd,$id){

    try {
        $tabla = 'anuncio';
        $sql = "DELETE FROM $tabla WHERE idAnuncio = :id";
        
        $stmt = $bd->prepare($sql);
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
        $exito = $stmt->execute();
        
        if ($exito) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $th) {
        return false;
    }

    
}



function obtenerAnuncioPorId($bd,$id){
    
    $tabla = 'anuncio';
    $sql = "SELECT * FROM $tabla WHERE idAnuncio = :id";
    
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    
    // Verificamos si se encontró algún resultado
    if ($result) {
        $anuncio = new Anuncio($result->idAnuncio,$result->titulo, $result->descripcion,$result->fechaPublicacion,$result->urlImagen);
        return $anuncio;
    } else {
        // No se encontró ningún resultado con ese ID
        return null;
    }
  
}

function obtenerTiposAreaAdmin($bd){
    
    $tabla = 'tipoArea';
    $sql = "SELECT idTipoArea, nombre 
    FROM $tabla";
    
    $stmt = $bd->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    $tiposArea = array();   

    foreach ($result as $row) {
        $tipo = new TipoArea($row->idTipoArea, $row->nombre);
        $tiposArea[] = $tipo;
    }

    return $tiposArea;
    

}


function obtenerAreaPorId($bd,$id){
    
    $tabla = 'area';
    $sql = "SELECT * FROM $tabla WHERE idArea = :id";
    
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    
    // Verificamos si se encontró algún resultado
    if ($result) {
        $area = new Area($result->idArea, $result->tipoArea, $result->nombre, $result->precio, $result->capacidad, $result->horaInicio, $result->horaFin, $result->descripcion);
        return $area;
    } else {
        // No se encontró ningún resultado con ese ID
        return null;
    }
  
}


function actualizarArea($bd,$tipoArea,$nombre,$precio,$capacidad,$horaInicio,$horaFin,$descripcion,$id){

    try {
        $tabla = 'area';
        $sql = "UPDATE $tabla SET tipoArea = :tipoArea, precio = :precio,
                capacidad = :capacidad, horaInicio = :horaInicio, horaFin = :horaFin, descripcion = :descripcion
                WHERE idArea = :id";
        
        $stmt = $bd->prepare($sql);
        
        $stmt->bindParam(':tipoArea', $tipoArea, PDO::PARAM_INT);
        $stmt->bindParam(':precio', $precio, PDO::PARAM_INT);
        $stmt->bindParam(':capacidad', $capacidad, PDO::PARAM_INT);
        $stmt->bindParam(':horaInicio', $horaInicio, PDO::PARAM_STR);
        $stmt->bindParam(':horaFin', $horaFin, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
        
        $exito = $stmt->execute();
        
        if ($exito) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $th) {
        return false;
    }

    
}


function actualizarNombreArea($bd,$nombre,$id){

    try {
        $tabla = 'area';
        $sql = "UPDATE $tabla SET nombre = :nombre
                WHERE idArea = :id";
        
        $stmt = $bd->prepare($sql);
        
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
        $exito = $stmt->execute();
        
        if ($exito) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $th) {
        return false;
    }

    
}

function obtenerEmpleadoPorId($bd,$id){
    
    $tabla = 'empleado';
    $sql = "SELECT * FROM $tabla WHERE idEmpleado = :id";
    
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    
    // Verificamos si se encontró algún resultado
    if ($result) {
        $empleado = new Empleado($result->idEmpleado, $result->nombre, $result->usuario, $result->rol);
        return $empleado;
    } else {
        // No se encontró ningún resultado con ese ID
        return null;
    }
  
}


function actualizarEmpleado($bd,$nombre,$rol,$id){

    try {
        $tabla = 'empleado';
        $sql = "UPDATE $tabla SET nombre = :nombre, rol = :rol
                WHERE idEmpleado = :id";
        
        $stmt = $bd->prepare($sql);
        
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':rol', $rol, PDO::PARAM_INT);
            
        $exito = $stmt->execute();
        
        if ($exito) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $th) {
        return false;
    }

    
}

function actualizarContrasenia($bd,$contrasenia,$id){

    try {
        $tabla = 'empleado';
        $sql = "UPDATE $tabla SET contrasenia = AES_ENCRYPT(:contrasenia, 'teo1_2023')
                WHERE idEmpleado = :id";
        
        $stmt = $bd->prepare($sql);
        
        $stmt->bindParam(':contrasenia', $contrasenia, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
        $exito = $stmt->execute();
        
        if ($exito) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $th) {
        return false;
    }

    
}