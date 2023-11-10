<?php

class Area {

    public $idArea;
    public $nombre;
    public $precio;
    public $estado;
    public $capacidad;
    public $horaInicio;
    public $horaFin;
    

    public function __construct($id,$nombre,$precio,$estado,$capacidad,$horaInicio,$horaFin) {
        $this->idCliente = $id;   
        $this->nombre = $nombre;   
        $this->precio = $precio;   
        $this->estado = $estado;   
        $this->capacidad = $capacidad;   
        $this->horaInicio = $horaInicio;   
        $this->horaFin = $horaFin;   
        
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

}

?>





