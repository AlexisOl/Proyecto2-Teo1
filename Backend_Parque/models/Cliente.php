<?php

class Cliente {

    public $idCliente;
    public $nombre;
    public $nit;
    public $tipoCliente;
    public $direccion;
    

    public function __construct($id,$nombre,$nit,$tipoCliente,$ubicacion) {
        $this->idCliente = $id;   
        $this->nombre = $nombre;   
        $this->nit = $nit;   
        $this->tipoCliente = $tipoCliente;   
        $this->direccion = $ubicacion;   
        
    }

    public function obtenerIdCliente() {
        return $this->idCliente;
    }

    public function obtenerNombre() {
        return $this->nombre;
    }

    public function obtenerNit(){
        return $this->nit;
    }

    public function obtenerTipoCliente(){
        return $this->tipoCliente;
    }

    public function obtenerUbicacion(){
        return $this->direccion;
    }

}

?>
