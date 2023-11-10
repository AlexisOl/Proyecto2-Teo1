<?php

class Anuncio {

    public $idAnuncio;
    public $titulo;
    public $descripcion;
    public $fecha_inicio;
    public $fecha_fin;
    public $idEmpleado;
    public $idArea;


    public function __construct($id,$titulo,$descripcion,$fecha_inicio,$fecha_fin,$idEmpleado,$idArea) {
        $this->idAnuncio = $id;   
        $this->titulo = $titulo;   
        $this->descripcion = $descripcion;   
        $this->fecha_inicio = $fecha_inicio;   
        $this->fecha_fin = $fecha_fin;   
        $this->idEmpleado = $idEmpleado;   
        $this->idArea = $idArea;   
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
        return $this->fecha_inicio;
    }

    public function obtenerFechaFin() {
        return $this->fecha_fin;
    }

    public function obtenerIdEmpleado() {
        return $this->idEmpleado;
    }

    public function obtenerIdArea() {
        return $this->idArea;
    }

}

?>






