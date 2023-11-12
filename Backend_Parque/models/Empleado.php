<?php

class Empleado {

    public $idEmpleado;
    public $nombre;
    public $usuario;
    public $rol;


    public function __construct($id,$nombre,$usuario,$rol) {
        $this->idEmpleado = $id;   
        $this->nombre = $nombre;   
        $this->usuario = $usuario;   
        $this->rol = $rol;   
    }


    public function obtenerIdEmpleado() {
        return $this->idEmpleado;
    }

    public function obtenerNombre() {
        return $this->nombre;
    }

    public function obtenerUsuario() {
        return $this->usuario;
    }

    public function obtenerRol() {
        return $this->rol;
    }

}

?>
