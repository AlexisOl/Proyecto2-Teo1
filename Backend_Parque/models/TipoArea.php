<?php

class TipoArea {
    
    public $idTipoArea;
    public $nombre;

    // Constructor de la clase
    public function __construct($id,$nombre) {
        $this->idTipoArea = $id;   
        $this->nombre = $nombre;   
    }

    // Métodos de la clase
    public function obtenerTipo() {
        return $this->nombre;
    }

}


?>
