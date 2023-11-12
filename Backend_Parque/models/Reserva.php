<?php

class Reserva {

    public $idReserva;
    public $nitCliente;
    public $idArea;
    public $fecha_reserva;
    public $fecha_fin_reserva;
    public $idEmpleado;


    public function __construct($id,$nitCliente,$idArea,$fecha_reserva,$fecha_fin_reserva,$idEmpleado) {
        $this->idReserva = $id;   
        $this->nitCliente = $nitCliente;   
        $this->idArea = $idArea;   
        $this->fecha_reserva = $fecha_reserva;   
        $this->fecha_fin_reserva = $fecha_fin_reserva;   
        $this->idEmpleado = $idEmpleado;   
    }


    public function obtenerIdReserva() {
        return $this->idReserva;
    }

    public function obtenerNitCliente() {
        return $this->nitCliente;
    }

    public function obtenerIdArea() {
        return $this->idArea;
    }

    public function obtenerFechaInicioReserva() {
        return $this->fecha_reserva;
    }

    public function obtenerFechaFinReserva() {
        return $this->fecha_fin_reserva;
    }

    public function obtenerIdEmpleado() {
        return $this->idEmpleado;
    }

}

?>






