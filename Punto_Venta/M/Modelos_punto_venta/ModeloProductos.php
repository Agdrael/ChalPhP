<?php
require '../conexion.php';
$data = json_decode(file_get_contents('php://input'), true);
$a = var_dump($data);
switch($data["accion"]){
    case 1:
        $codigo = $data["codigo"];
        $descripcion = $data["descripcion"];
        $abreviado =$data["abreviado"];
        $detalle = $data["detalle"];
        $precio = $data["precio"];
        $impuesto = $data["impuesto"];
        $proveedor = $data["proveedor"];
        $p_venta = $data["p_Venta"];
        $cta_inv = $data["cta_inv"];
        $cta_cost = $data["cta_cost"];
        $cta_ing = $data["cta_ing"];
        $ubicacion = $data["ubicacion"];
        $unidad = $data["unidad"];
        $exMin = $data["exMin"];
        $exMax = $data["exMax"];

        
        break;
}

echo json_encode($a);



