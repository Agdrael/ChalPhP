<?php

use FFI\Exception;

require '../conexion.php';
$data = json_decode(file_get_contents('php://input'), true);
var_dump($data);
switch ($data['accion']) {
    case 1:
        $razon_social = $data['razon_social'];
        $nombre_comercial = $data['nombre_comercial'];
        $contacto = $data['contacto'];
        $nacionalidad = $data['nacionalidad'];
        try {
            $id_nacionalidad = (int) $nacionalidad;
        } catch (Exception $e) {
            echo var_dump($e->getMessage());
        }
        $domiciliado = $data['domiciliado'];
        $direccion = $data['direccion'];
        $departamento = $data['departamento'];
        $municipio = $data['municipio'];
        $act_economica = $data['act_economica'];
        $nueva_act = limpiar_cadena($act_economica);
        $telefono = $data['telefono'];
        $telefono2 = $data['telefono2'];
        if (empty($telefono2)) {
            $telefono2 = null;
        }
        $NIT = $data['NIT'];
        $Dui = $data['Dui'];
        $R_fiscal = $data['R_fiscal'];
        $Giro = $data['Giro'];
        $correo = $data['correo'];
        $Cuenta = $data['Cuenta'];
        $Cuenta_sin_puntos = str_replace('.', '', $Cuenta);
        $Cuenta_per = trim($Cuenta_sin_puntos);
        $Tamaño = $data['Tamaño'];


        if (empty($razon_social) || empty($nombre_comercial) || empty($contacto) || empty($nacionalidad) || empty($domiciliado) || empty($direccion) || empty($departamento) || empty($municipio) || empty($nueva_act) || empty($telefono) || empty($NIT) || empty($Dui) || empty($R_fiscal) || empty($Giro) || empty($Cuenta) || empty($Tamaño)) {
            echo json_encode(['status' => 'failed', 'message' => 'Rellene todos los campos vacios']);
        } else {
            try {
                //Verificar si recibo un string o int
                if ($id_nacionalidad != 0) {
                    $sentencia = $pdo->prepare("SELECT * FROM nacionalidades WHERE id_nacionalidad = :nacionalidad");
                    $sentencia->bindParam(':nacionalidad', $id_nacionalidad, PDO::PARAM_INT);
                    $sentencia->execute();
                    $obj_nacion = $sentencia->fetchAll(PDO::FETCH_OBJ);

                    if (count($obj_nacion) > 0) {
                        //asignando id_nacionalidad
                        $nacionalidad = $obj_nacion[0]->id_nacionalidad;
                    } else {
                        echo json_encode(['status' => 'failed', 'message' => 'Nose como triggear este error, si lo lograste eres un champ']);
                    }
                    /* nose si dejarlo, luego me la pienso mejor
                    else {
                        $sentencia2 = $pdo->prepare("INSERT INTO nacionalidades (nacionalidad) VALUES (:nacionalidad)");
                        $sentencia2->bindParam(':nacionalidad', $nacionalidad, PDO::PARAM_STR);
                        $sentencia2->execute();

                        $sentencia3 = $pdo->prepare("SELECT * FROM nacionalidades WHERE id_nacionalidad = :nacionalidad");
                        $sentencia3->bindParam('nacionalidad', $nacionalidad, PDO::PARAM_STR);
                        $sentencia3->execute();
                        $obj_nacion3 = $sentencia3->fetch(PDO::FETCH_OBJ);
                        if (count($obj_nacion3) > 0) {
                            //asignando id_nacionalidad
                            $nacionalidad = $obj_nacion3[0]->id_nacionalidad;
                        } else {
                            echo json_encode(['status' => 'failed', 'message' => 'No existe']);
                        }
                    }
                    */
                } else {
                    $sentencia = $pdo->prepare("INSERT INTO nacionalidades (nacionalidad) VALUES (:nacionalidad)");
                    $sentencia->bindParam(':nacionalidad', $nacionalidad, PDO::PARAM_STR);
                    $sentencia->execute();

                    $id_insert = $pdo->lastInsertId();

                    $sentencia2 = $pdo->prepare("SELECT * FROM nacionalidades WHERE id_nacionalidad = :idnacio");
                    $sentencia2->bindParam(':idnacio', $id_insert, PDO::PARAM_INT);
                    $sentencia2->execute();
                    $obj_nacion = $sentencia2->fetchAll(PDO::FETCH_OBJ);
                    if (count($obj_nacion) > 0) {
                        //asignando id_nacionalidad
                        $nacionalidad = $obj_nacion[0]->id_nacionalidad;
                    } else {
                        echo json_encode(['status' => 'failed', 'message' => 'Nose como triggear este error, si lo lograste eres un champ']);
                    }
                }

                $sentencia4 = $pdo->prepare("SELECT * FROM \"CAT-019\" WHERE valores = :valores");
                $sentencia4->bindParam(':valores', $nueva_act, PDO::PARAM_STR);
                $sentencia4->execute();
                $obj_act = $sentencia4->fetchAll(PDO::FETCH_OBJ);
                var_dump($obj_act);
                if (count($obj_act) > 0) {
                    $nueva_act = $obj_act[0]->id_act_economica;
                }



                $sentencia5 = $pdo->prepare("INSERT INTO proveedores (nombre_proveedor,n_comercial,contacto,id_nacionalidad,domiciliado,direccion,id_departamento,municipio,id_act_economica,telefono,telefono2,nit,dui,r_fiscal,correo_electronico,giro,cuenta,tamaño) VALUES (:razon_social,:nombre_comercial,:contacto,:nacionalidad,:domiciliado,:direccion,:departamento,:municipio,:act_economica, :telefono, :telefono2,:NIT,:Dui,:r_fiscal,:correo,:Giro,:Cuenta_sin_puntos,:Tama)");
                $sentencia5->bindParam(':razon_social', $razon_social, PDO::PARAM_STR);
                $sentencia5->bindParam(':nombre_comercial', $nombre_comercial, PDO::PARAM_STR);
                $sentencia5->bindParam(':contacto', $contacto, PDO::PARAM_STR);
                $sentencia5->bindParam(':nacionalidad', $nacionalidad, PDO::PARAM_INT);
                $sentencia5->bindParam(':domiciliado', $domiciliado, PDO::PARAM_STR);
                $sentencia5->bindParam(':direccion', $direccion, PDO::PARAM_STR);
                $sentencia5->bindParam(':departamento', $departamento, PDO::PARAM_STR);
                $sentencia5->bindParam('municipio', $municipio, PDO::PARAM_STR);
                $sentencia5->bindParam(':act_economica', $nueva_act, PDO::PARAM_INT);
                $sentencia5->bindParam(':telefono', $telefono, PDO::PARAM_INT);
                $sentencia5->bindParam(':telefono2', $telefono2, PDO::PARAM_INT);
                $sentencia5->bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia5->bindParam(':Dui', $Dui, PDO::PARAM_STR);
                $sentencia5->bindParam(':r_fiscal', $R_fiscal, PDO::PARAM_STR);
                $sentencia5->bindParam(':correo',$correo,PDO::PARAM_STR);
                $sentencia5->bindParam(':Giro', $Giro, PDO::PARAM_STR);
                $sentencia5->bindParam(':Cuenta_sin_puntos', $Cuenta_sin_puntos, PDO::PARAM_STR);
                $sentencia5->bindParam(':Tama', $Tamaño, PDO::PARAM_STR);
                if ($sentencia5->execute()) {
                    echo json_encode(['status' => 'success', 'message' => 'Usuario guardado con exito']);
                }
            } catch (PDOException $x) {
                echo json_encode(['status' => 'failed', 'message' => 'no se guardo por:', $x->getMessage()]);
            }
        }
        break;
}

function limpiar_cadena($cadena)
{
    return preg_replace('/^\d+:\s*/', '', $cadena);
}
