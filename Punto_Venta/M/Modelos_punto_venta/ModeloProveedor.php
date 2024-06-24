<?php
require '../conexion.php';
$data = json_decode(file_get_contents('php://input'), true);

switch($data['accion']){
    case 1:
        $razon_social = $data['razon_social'];
        $nombre_comercial = $data['nombre_comercial'];
        $contacto = $data['contacto'];
        $nacionalidad = $data['nacionalidad'];
        $domiciliado = $data['domiciliado'];
        $direccion = $data['direccion'];
        $departamento = $data['departamento'];
        $municipio = $data['municipio'];
        $act_economica = $data['act_economica'];
        $telefono = $data['telefono'];
        $telefono2 = $data['telefono2'];
        $NIT = $data['NIT'];
        $Dui = $data['Dui'];
        $R_fiscal = $data['R_fiscal'];
        $Giro = $data['Giro'];
        $Cuenta = $data['Cuenta'];
        $Tamaño = $data['Tamaño'];

        if(empty($razon_social)||empty($nombre_comercial)||empty($contacto)||empty($nacionalidad)|| empty($domiciliado)||empty($direccion)||empty($departamento)||empty($municipio)||empty($act_economica)||empty($telefono)||empty($telefono2)||empty($NIT)||empty($Dui)||empty($R_fiscal)||empty($Giro)||empty($Cuenta)||empty($Tamaño)){
            echo json_encode(['status' => 'failed', 'message' => 'Campos vacios']);
        }else{
            try{
                $sentencia = $pdo->prepare("INSERT INTO proveedores (nombre_proveedor,id_nacionalidad,n_comercial,contacto,domiciliado,direccion,id_departamento,municipio,id_act_economica,telefono,telefono2,nit,dui,r_fiscal,giro,cuenta,categoria) VALUES (:nombre,:,:nacionalidad, :n_comercial, :contacto, :domicialiado, :direccion, :id_depa, :municipio, :id_act_eco, :telefono, :telefono2, :nit, :dui, :r_fiscal, :giro, :cuenta, :categoria)");
                $sentencia->bindParam(':nombre',$razon_social, PDO::PARAM_STR);
            }catch(PDOException $x){

            }finally{

            }
        }
}
echo json_encode(['status' => 'success', 'message' => 'Data received successfully']);