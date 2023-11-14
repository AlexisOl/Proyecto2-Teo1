<?php

class Anuncio {

    public $idAnuncio;
    public $titulo;
    public $descripcion;
    public $fechaPublicacion;
    public $urlImagen;
    
    public function __construct($idAnuncio,$titulo,$descripcion,$fechaPublicacion,$urlImagen) {
        $this->idAnuncio = $idAnuncio;   
        $this->titulo = $titulo;   
        $this->descripcion = $descripcion;   
        $this->fechaPublicacion = $fechaPublicacion;   
        $this->urlImagen = $urlImagen; 
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
        return $this->fechaPublicacion;
    }

    public function obtenerUrl() {
        return $this->urlImagen;
    }

}

?>
