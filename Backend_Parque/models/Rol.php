<?php

class Rol {
    // Propiedades de la clase
    public $idRol;
    public $nombre_rol;

    // Constructor de la clase
    public function __construct($nombre) {
        $this->nombre_rol = $nombre;   
    }

    // Métodos de la clase
    public function obtenerTipo() {
        return $this->nombre_rol;
    }

}


?>
