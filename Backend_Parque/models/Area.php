<?php

class Area {

    public $idArea;
    public $nombre;
    public $tipoArea;
    public $precio;
    public $estado;
    public $capacidad;
    public $horaInicio;
    public $horaFin;
    public $descripcion;
    

    public function __construct($id,$tipoArea,$nombre,$precio,$estado,$capacidad,$horaInicio,$horaFin,$descripcion) {
        $this->idArea = $id;   
        $this->tipoArea = $tipoArea;   
        $this->nombre = $nombre;   
        $this->precio = $precio;   
        $this->estado = $estado;   
        $this->capacidad = $capacidad;   
        $this->horaInicio = $horaInicio;   
        $this->horaFin = $horaFin;   
        $this->descripcion = $descripcion;     
    }

    public function obtenerIdArea() {
        return $this->idArea;
    }

    public function obtenerNombre() {
        return $this->nombre;
    }

    public function obtenerPrecio(){
        return $this->precio;
    }

    public function obtenerEstado(){
        return $this->estado;
    }

    public function obtenerCapacidad(){
        return $this->capacidad;
    }

    public function obtenerHoraInicio(){
        return $this->horaInicio;
    }

    public function obtenerHoraFin(){
        return $this->horaFin;
    }

    public function obtenerDescripcion(){
        return $this->descripcion;
    }

    public function obtenerTipoArea(){
        return $this->tipoArea;
    }

}

?>





