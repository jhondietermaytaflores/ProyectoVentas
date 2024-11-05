<?php

namespace app\controllers;
use app\models\mainModel;

class ApiController {
    private $model;

    public function __construct() {
        $this->model = new mainModel();
    }

    // Método para obtener datos de la tabla 'caja'
    public function getCajas() {
        $result = $this->model->seleccionarDatos("Normal", "caja", "*", "");
        echo json_encode($result->fetchAll(\PDO::FETCH_ASSOC));
    }

    // Método para crear un nuevo registro en 'caja'
    // public function createCaja($data) {
    //     $datos = [
    //         ["campo_nombre" => "caja_numero", "campo_marcador" => ":caja_numero", "campo_valor" => $data['caja_numero']],
    //         ["campo_nombre" => "caja_nombre", "campo_marcador" => ":caja_nombre", "campo_valor" => $data['caja_nombre']],
    //         ["campo_nombre" => "caja_efectivo", "campo_marcador" => ":caja_efectivo", "campo_valor" => $data['caja_efectivo']]
    //     ];

    //     $result = $this->model->guardarDatos("caja", $datos);
    //     echo json_encode(["success" => $result ? true : false]);
    // }

    public function getProductos() {
        $result = $this->model->seleccionarDatos("Normal", "productos", "*", "");
        echo json_encode($result->fetchAll(\PDO::FETCH_ASSOC));
    }
    

    // Otros métodos para actualizar y eliminar...
}
?>
