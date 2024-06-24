<?php
require '../conexion.php';
$data = json_decode(file_get_contents('php://input'), true);

switch ($data['accion']) {
    case 1:
        $cuenta = $data['n_cuenta'];

        // Modificando cuenta recibida para generar un nuevo número
        $length_cuenta = strlen($cuenta);

        // Convertir la cadena en un array de caracteres para manipular cada dígito
        $cuenta_array = str_split($cuenta);

        // Modificar los dos últimos dígitos
        $incremento = 1;
        for ($i = $length_cuenta - 1; $i >= $length_cuenta - 2; $i--) {
            $nuevo_valor = $cuenta_array[$i] + $incremento;
            if ($nuevo_valor == 10) {
                $cuenta_array[$i] = 0;
                $incremento = 1; // Propaga el acarreo
            } else {
                $cuenta_array[$i] = $nuevo_valor;
                $incremento = 0; // No hay acarreo, detener el incremento
            }
        }

        // Convertir el array de vuelta a una cadena
        $cuenta_modificada = implode('', $cuenta_array);

        $tipo_cuenta = $data['tipo_cuenta'];
        $descripcion = $data['descripcion'];
        $nombre = $data['nombre'];
        $saldo = $data['saldo'];

        try {
            $sentencia = $pdo->prepare('SELECT * FROM  catalogo WHERE cuenta = :cuenta');
            $sentencia->bindParam(':cuenta', $cuenta_modificada);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();

            if (empty($resultado)) {
                $response = [
                    'status' => 'succes',
                    'message' => 'Se puede guardar la cuenta',
                    'alert_type' => 'success'
                ];
            } else {
                $response = [
                    'status' => 'warning',
                    'message' => 'Se encontro una cuenta.',
                    'alert_type' => 'warning' // Tipo de alerta de Bootstrap
                ];
            }
        } catch (PDOException $x) {
            echo json_encode(['error' => $x->getMessage()]);
        } finally {
            $sentencia = null;
            $pdo = null;
        }


        echo json_encode($response);
        // echo json_encode(['status' => 'success', 'message' => 'Data received successfully']);
        break;

    case 2:
        $cuenta = $data['n_cuenta'];
        $length_cuenta = strlen($cuenta);
        if ($length_cuenta > 16) {
            $response = [
                'status' => 'warning',
                'message' => 'Supera la cantidad max',
                'alert_type' => 'error'
            ];
            echo json_encode($response);
        } else {
            $cuenta = $data['n_cuenta'];
            $busqueda = $cuenta . '%';
            $cuenta .= '01';
            $length_cuenta = strlen($cuenta);

            try {
                $sentencia = $pdo->prepare("SELECT cuenta FROM catalogo WHERE cuenta LIKE :busqueda AND LENGTH(cuenta) = 6 AND RIGHT(cuenta, 2) BETWEEN '01' AND '99' ORDER BY cuenta");
                $sentencia->bindParam(':busqueda', $busqueda, PDO::PARAM_STR);
                $sentencia->execute();
                $obj_cuentas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                
                $cuenta_arr = [];
                foreach ($obj_cuentas as $x) {
                    $cuenta_arr[] = $x['cuenta'];
                }

              
                function incrementar_sufijo($cuenta)
                {
                    $prefijo = substr($cuenta, 0, -2);
                    $subfijo = substr($cuenta, -2); // Obtener el sufijo
                    $subfijo = (int)$subfijo + 1; // Incrementar el sufijo

                    // Convertir el sufijo a un string con dos dígitos
                    $subfijo = str_pad($subfijo, 2, '0', STR_PAD_LEFT);

                    return $prefijo . $subfijo; //
                }

                // Verificar si $cuenta está en el arreglo y ajustar
                while (in_array($cuenta, $cuenta_arr)) {
                    $cuenta = incrementar_sufijo($cuenta);
                }

                echo json_encode(['cuenta' => $cuenta]);
            } catch (PDOException $e) {
                echo json_encode(['error' => $e->getMessage()]);
            }finally{
                $sentencia = null;
                $obj_cuentas = null;
            }
        }

        break;
}
