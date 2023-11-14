<?php

include_once "./controladores/administrador.php";
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
    
    echo json_encode(["success" => $result]);

}

function obtenerEmpleadosAdmin() {
    
    //conexion
    $bd = include_once "conexionDB.php";

    // Invocar a la función de consulta SQL
    $result = obtenerEmpleados($bd);
    //retornar lo hallado
    echo json_encode($result);

}

function obtenerClientesAdmin() {
    
    //conexion
    $bd = include_once "conexionDB.php";

    // Invocar a la función de consulta SQL
    $result = obtenerClientes($bd);
    //retornar lo hallado
    echo json_encode($result);

}

function obtenerAreaAdmin() {
    
    //conexion
    $bd = include_once "conexionDB.php";
    
    $id = $_GET['id'];

    // Invocar a la función de consulta SQL
    $result = obtenerAreaPorId($bd,$id);
    //retornar lo hallado
    echo json_encode($result);

}

function obtenerAreasAdmin(){
    //conexion
    $bd = include_once "conexionDB.php";
    
    $result = obtenerAreas($bd);
    
    echo json_encode($result);
}

function obtenerRolesAdmin() {
    
    //conexion
    $bd = include_once "conexionDB.php";

    // Invocar a la función de consulta SQL
    $result = obtenerRoles($bd);
    //retornar lo hallado
    echo json_encode($result);

}

function obtenerTiposArea() {
    
    //conexion
    $bd = include_once "conexionDB.php";

    // Invocar a la función de consulta SQL
    $result = obtenerTiposAreaAdmin($bd);
    //retornar lo hallado
    echo json_encode($result);

}

function validarUsuarioAdmin() {
    
    //conexion
    $bd = include_once "conexionDB.php";

    //obtener usuario
    $usuario = $_GET['usuario'];

    // Invocar a la función de consulta SQL
    $result = usuarioExiste($bd,$usuario);
    //retornar lo hallado
    echo json_encode($result);

}

function crearAreaAdmin(){

     //conexion
      $bd = include_once "conexionDB.php";
 
      
      $data = json_decode(file_get_contents("php://input"), true);

      $tipoArea = $data['tipoArea'];
      $nombre = $data['nombre'];
      $precio = $data['precio'];
      $capacidad = $data['capacidad'];
      $horaInicio = $data['horaInicio'];
      $horaFin = $data['horaFin'];
      $descripcion = $data['descripcion'];
      // Invocar a la función de consulta SQL
      $result = crearArea($bd,$tipoArea,$nombre,$precio,$capacidad,$horaInicio,$horaFin,$descripcion);
  
      //retornar lo hallado
      echo json_encode($result);
    
}

function validarNombreAreaAdmin(){

    //conexion
     $bd = include_once "conexionDB.php";

     
    $nombre = $_GET['nombre'];
    
     // Invocar a la función de consulta SQL
     $result = areaExiste($bd,$nombre);
 
     //retornar lo hallado
     echo json_encode($result);
   
}

function validarNombreTipoArea(){

    //conexion
     $bd = include_once "conexionDB.php";

     
     $nombre = $_GET['nombre'];
    
     // Invocar a la función de consulta SQL
     $result = tipoAreaExiste($bd,$nombre);
 
     //retornar lo hallado
     echo json_encode($result);
   
}

function crearTipoAreaAdmin(){

    //conexion
     $bd = include_once "conexionDB.php";

     
     $data = json_decode(file_get_contents("php://input"), true);
     
     $nombre = $data['nombre'];
     
     // Invocar a la función de consulta SQL
     $result = crearTipoDeArea($bd,$nombre);
 
     //retornar lo hallado
     echo json_encode(["success" => $result]);
   
}


function crearAnuncioAdmin(){

    //conexion
     $bd = include_once "conexionDB.php";

     
     $data = json_decode(file_get_contents("php://input"), true);
     
     $titulo = $data['titulo'];
     $descripcion = $data['descripcion'];
     $urlImagen = $data['urlImagen'];
     $fechaPublicacion = date('Y/m/d');
     

     // Invocar a la función de consulta SQL
     $result = crearAnuncio($bd,$titulo,$descripcion,$fechaPublicacion,$urlImagen);
 
     //retornar lo hallado
    echo json_encode($result);
   
}
///prueba obtener

function obtenerAnuncio() {

    //conexion
    $bd = include_once "conexionDB.php";

    // Invocar a la función de consulta SQL
    $result = obtenerAnuncios($bd);
    //retornar lo hallado
    echo json_encode($result);
}

function obtenerAnunciosAdmin() {
    
    //conexion
    $bd = include_once "conexionDB.php";

    // Invocar a la función de consulta SQL
    $result = obtenerAnuncios($bd);
    //retornar lo hallado
    echo json_encode($result);

}

function actualizarAreaAdmin(){
    
    //conexion
    $bd = include_once "conexionDB.php";
     
    $data = json_decode(file_get_contents("php://input"), true);

    $id = $data['idArea'];
    $tipoArea = $data['tipoArea'];
    $nombre = $data['nombre'];
    $precio = $data['precio'];
    $capacidad = $data['capacidad'];
    $horaInicio = $data['horaInicio'];
    $horaFin = $data['horaFin'];
    $descripcion = $data['descripcion'];

    // Invocar a la función de consulta SQL
    $result = actualizarArea($bd,$tipoArea,$nombre,$precio,$capacidad,$horaInicio,$horaFin,$descripcion,$id);
  
    //retornar lo hallado
    echo json_encode(["success" => $result]);

}

function actualizarNombreAreaAdmin(){

    $bd = include_once "conexionDB.php";
     
    $data = json_decode(file_get_contents("php://input"), true);

    $id = $data['id'];
    $nombre = $data['nombre'];
    
    // Invocar a la función de consulta SQL
    $result = actualizarNombreArea($bd,$nombre,$id);
  
    //retornar lo hallado
    echo json_encode(["success" => $result]);

}

function obtenerEmpleadoIdAdmin(){
    
    //conexion
    $bd = include_once "conexionDB.php";
    
    $id = $_GET['id'];

    // Invocar a la función de consulta SQL
    $result = obtenerEmpleadoPorId($bd,$id);
    //retornar lo hallado
    echo json_encode($result);

}

function actualizarEmpleadoAdmin(){

    //conexion
    $bd = include_once "conexionDB.php";

    //Decodificar si es necesario
    $data = json_decode(file_get_contents("php://input"), true);

    //obtener id
    $id = $data['idEmpleado'];

    //obtener nombre
    $nombre = $data['nombre'];

    //obtener rol
    $rol = $data['rol'];
  
    // Invocar a la función de consulta SQL

    $result = actualizarEmpleado($bd, $nombre, $rol, $id);
    //retornar lo hallado
    
    echo json_encode(["success" => $result]);

}

function actualizarContraseniaAdmin(){
    
        //conexion
        $bd = include_once "conexionDB.php";

        //Decodificar si es necesario
        $data = json_decode(file_get_contents("php://input"), true);
    
        //obtener id
        $id = $data['idEmpleado'];
    
        //obtener nombre
        $contrasenia = $data['contrasenia'];
       
        $result = actualizarContrasenia($bd, $contrasenia, $id);
        //retornar lo hallado
        
        echo json_encode(["success" => $result]);

}

function obtenerAnuncioIdAdmin(){
    
    //conexion
    $bd = include_once "conexionDB.php";
    
    $id = $_GET['id'];

    // Invocar a la función de consulta SQL
    $result = obtenerAnuncioPorId($bd,$id);
    //retornar lo hallado
    echo json_encode($result);


}

function actualizarAnuncioAdmin(){

    //conexion
    $bd = include_once "conexionDB.php";
     
    $data = json_decode(file_get_contents("php://input"), true);
    
    $id = $data['idAnuncio'];
    $titulo = $data['titulo'];
    $descripcion = $data['descripcion'];
  
    // Invocar a la función de consulta SQL
    $result = actualizarAnuncio($bd,$titulo,$descripcion,$id);

    //retornar lo hallado
   echo json_encode($result);

}

function eliminarAnuncioAdmin(){

    //conexion
    $bd = include_once "conexionDB.php";

    $id = $_GET['idAnuncio'];

    // Invocar a la función de consulta SQL
    $result = eliminarAnuncio($bd, $id);

    // Retornar lo encontrado
    echo json_encode($result);


}

?>