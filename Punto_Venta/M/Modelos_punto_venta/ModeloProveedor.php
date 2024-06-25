<?php
require '../conexion.php';
$data = json_decode(file_get_contents('php://input'), true);
var_dump($data);
switch ($data['accion']) {
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
        $nueva_act = limpiar_cadena($act_economica);
        $telefono = $data['telefono'];
        $telefono2 = $data['telefonoo'];
        if (empty($telefono2)) {
            $telefono2 = null;
        }
        $NIT = $data['NIT'];
        $Dui = $data['Dui'];
        $R_fiscal = $data['R_fiscal'];
        $Giro = $data['Giro'];
        $Cuenta = $data['Cuenta'];
        $Cuenta_sin_puntos = str_replace('.', '', $Cuenta);
        $Tamaño = $data['Tamaño'];

        if (empty($razon_social) || empty($nombre_comercial) || empty($contacto) || empty($nacionalidad) || empty($domiciliado) || empty($direccion) || empty($departamento) || empty($municipio) || empty($nueva_act) || empty($telefono) || empty($NIT) || empty($Dui) || empty($R_fiscal) || empty($Giro) || empty($Cuenta) || empty($Tamaño)) {
            echo json_encode(['status' => 'failed', 'message' => 'Rellene todos los campos vacios']);
        } else {
            try {
                //Verificar si existe la nacionalidad

                $sentencia = $pdo->prepare("SELECT * FROM nacionalidades WHERE nacionalidad = :nacionalidad");
                $sentencia->bindParam(':nacionalidad', $nacionalidad, PDO::PARAM_STR);
                $sentencia->execute();
                $obj_nacion = $sentencia->fetchAll(PDO::FETCH_OBJ);

                if (count($obj_nacion) > 0) {
                    //asignando id_nacionalidad
                    $nacionalidad = $obj_nacion[0]->id;
                } else {
                    $sentencia2 = $pdo->prepare("INSERT INTO nacionalidades (nacionalidad) VALUES (:nacionalidad)");
                    $sentencia2->bindParam(':nacionalidad', $nacionalidad, PDO::PARAM_STR);
                    $sentencia2->execute();

                    $sentencia3 = $pdo->prepare("SELECT * FROM nacionalidades WHERE nacionalidad = :nacionalidad");
                    $sentencia3->bindParam('nacionalidad', $nacionalidad, PDO::PARAM_STR);
                    $sentencia3->execute();
                    $obj_nacion3 = $sentencia3->fetch(PDO::FETCH_OBJ);
                    if (count($obj_nacion3) > 0) {
                        //asignando id_nacionalidad
                        $nacionalidad = $obj_nacion3[0]->id;
                    } else {
                        echo json_encode(['status' => 'failed', 'message' => 'No existe']);
                    }
                }
                $sentencia4 = $pdo->prepare("SELECT id_act_economica FROM \"CAT-019\" WHERE valores = :valores");
                $sentencia4->bindParam(':valores', $nueva_act, PDO::PARAM_STR);
                $sentencia4->execute();
                $obj_act = $sentencia4->fetch(PDO::FETCH_OBJ);
                if (count($obj_act) > 0) {
                    $nueva_act = $obj_act[0]->id;
                }


                $sentencia5 = $pdo->prepare("INSERT INTO proveedores (nombre_proveedor,n_comercial,contacto,id_nacionalidad,domiciliado,direccion,id_departamento,municipio,id_act_economica,telefono,telefono2,nit,dui,r_fiscal,giro,cuenta,tamaño) VALUES (:razon_social,:nombre_comercial,:contacto,:nacionalidad,:domiciliado,:direccion,:departamento,:municipio,:act_economica, :telefono, :telefono2,:NIT,:Dui,:r_fiscal,:Giro,:Cuenta_sin_puntos,:Tamaño)");
                $sentencia5->bindParam(':razon_social', $razon_social, PDO::PARAM_STR);
                $sentencia5->bindParam(':nombre_comercial', $nombre_comercial, PDO::PARAM_STR);
                $sentencia5->bindParam(':contacto', $contacto, PDO::PARAM_STR);
                $sentencia5->bindParam(':nacionalidad', $nacionalidad, PDO::PARAM_INT);
                $sentencia5->bindParam(':domiciliado', $domiciliado, PDO::PARAM_STR_CHAR);
                $sentencia5->bindParam(':direccion', $direccion, PDO::PARAM_STR);
                $sentencia5->bindParam(':departamento', $departamento, PDO::PARAM_STR);
                $sentencia5->bindParam(':act_economica', $nueva_act, PDO::PARAM_INT);
                $sentencia5->bindParam(':telefono', $telefono, PDO::PARAM_INT);
                $sentencia5->bindParam(':telefono2', $telefono2, PDO::PARAM_INT);
                $sentencia5->bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia5->bindParam(':Dui', $Dui, PDO::PARAM_STR);
                $sentencia5->bindParam(':r_fiscal', $r_fiscal, PDO::PARAM_STR);
                $sentencia5->bindParam(':Giro', $Giro, PDO::PARAM_STR);
                $sentencia5->bindParam(':Cuenta_sin_puntos', $Cuenta_sin_puntos, PDO::PARAM_STR);
                $sentencia5->bindParam(':Tamaño', $Tamaño, PDO::PARAM_STR_CHAR);
                if($sentencia5->execute()){
                    echo json_encode(['status' => 'success', 'message' => 'Usuario guardado con exito']);
                }

            } catch (PDOException $x) {
                echo json_encode(['status' => 'failed', 'message' =>$x->getMessage()]);
            }
        }
        break;
}

function limpiar_cadena($cadena)
{
    return preg_replace('/^\d+:\s*/', '', $cadena);
}


