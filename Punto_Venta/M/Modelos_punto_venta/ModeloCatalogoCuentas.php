<?php
require '../conexion.php';

$data = json_decode(file_get_contents('php://input'), true);
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

$sentencia = $pdo->prepare('SELECT * FROM  catalogo WHERE cuenta = :cuenta');
$sentencia->bindParam(':cuenta',$cuenta_modificada);
$sentencia->execute();
$resultado = $sentencia->fetchAll();

if(empty($resultado)){
    $respueta = [
        'status' => 'succes',
        'message' => 'Se puede guardar la cuenta',
        'alert_type' => 'succes'
    ];
}else{
    $response = [
        'status' => 'warning',
        'message' => 'Se encontro una cuenta.',
        'alert_type' => 'warning' // Tipo de alerta de Bootstrap
    ];
}


echo json_encode($response);
// echo json_encode(['status' => 'success', 'message' => 'Data received successfully']);
