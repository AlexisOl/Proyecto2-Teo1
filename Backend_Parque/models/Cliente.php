<?php

class Cliente {

    public $idCliente;
    public $nombre;
    public $nit;
    public $estadoSuscripcion;
    public $fechaInicioPago;
    public $tipoCliente;
    public $ubicacion;
    

    public function __construct($id,$nombre,$nit,$estadoSuscripcion,$fechaInicioPago,$tipoCliente,$ubicacion) {
        $this->idCliente = $id;   
        $this->nombre = $nombre;   
        $this->nit = $nit;   
        $this->estadoSuscripcion = $estadoSuscripcion;   
        $this->fechaInicioPago = $fechaInicioPago;   
        $this->tipoCliente = $tipoCliente;   
        $this->ubicacion = $ubicacion;   
        
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

    public function obtenerEstadoSuscripcion(){
        return $this->estadoSuscripcion;
    }

    public function obtenerFechaInicioPago(){
        return $this->fechaInicioPago;
    }

    public function obtenerTipoCliente(){
        return $this->tipoCliente;
    }

    public function obtenerUbicacion(){
        return $this->ubicacion;
    }

}

?>
