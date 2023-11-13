<?php

class Anuncio {

    public $idAnuncio;
    public $titulo;
    public $descripcion;
    public $fechaInicio;
    public $fechaFin;
    
    public function __construct($titulo,$descripcion,$fecha_inicio,$fecha_fin) {
        $this->titulo = $titulo;   
        $this->descripcion = $descripcion;   
        $this->fechaInicio = $fecha_inicio;   
        $this->fechaFin = $fecha_fin; 
    }


    public function obtenerIdAnuncio() {
        return $this->idAnuncio;
    }

    public function obtenerTitulo() {
        return $this->titulo;
    }

    public function obtenerDescripcion() {
        return $this->descripcion;
    }

    public function obtenerFechaInicio() {
        return $this->fechaInicio;
    }

    public function obtenerFechaFin() {
        return $this->fechaFin;
    }

}

?>






