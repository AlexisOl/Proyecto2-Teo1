<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Origin: *"); // Permitir el acceso desde cualquier origen

require_once("../index.php");

class manejo {
    private $control;

    public function __construct() {
        $this->control = new conexion();
    }


    public function verClienteNit($nit){
        return $this->control->verClienteNit("cliente",$nit );
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getClienteNit') {
    if (isset($_GET['datos'])) {
        $manejo = new manejo();
        $nit = $_GET['datos'];
        echo $nit;
        $colaboradores = $manejo->verClienteNit($nit);
        echo json_encode($colaboradores);
    } else {
        echo json_encode(array('error' => 'El parámetro datos no está presente en la solicitud'));
    }
}
?>


