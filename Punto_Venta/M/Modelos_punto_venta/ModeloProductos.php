<?php
require '../conexion.php';
$codigo = $_POST['codigo'];
$descripcion = $_POST['descripcion'];
$abreviado = $_POST['abreviado'];
$bien_servicio = $_POST['Bien_Servicio'];
$tipo_precio = $_POST['Fijo_Variable'];
$exento_afecta = $_POST['Exenta_Afecta'];
$precio =$_POST['precio'];
if( !empty($_POST['iva']))
    $iva = $_POST['iva'];
else{
    $iva = 0;
}
$proveedor = $_POST['proveedores'];
$cuenta_inv = $_POST['cuenta_inv'];
$cuenta_cost = $_POST['cuenta_cost'];
$cuenta_ingreso =$_POST['cuenta_ingreso'];
$ubicacion = $_POST ['ubicacion'];
$unidad = $_POST['unidad'];
$ex_min = $_POST['ex_minima'];
$ex_max = $_POST['ex_max'];


//funcion de contaduria
if(!empty($codigo)&&!empty($descripcion)&&!empty($abreviado)&&!empty($bien_servicio)&&!empty($tipo_precio)&&!empty($exento_afecta)&&!empty($precio)&&!empty($iva)&&!empty($proveedor)&&!empty($cuenta_inv)&&!empty($cuenta_cost)&&!empty($cuenta_ingreso)){
    
}