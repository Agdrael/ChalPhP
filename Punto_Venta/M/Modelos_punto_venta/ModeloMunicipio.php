<?php
require '../conexion.php';

if(isset($_GET['codigo_departamento'])){
    $codigo_depa = $_GET['codigo_departamento'];
    try{
        $sentencia = $pdo->prepare("SELECT valores FROM \"CAT-013\" WHERE departamento = :departamento");
        $sentencia->bindParam(':departamento',$codigo_depa);
        $sentencia->execute();
        $municipios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($municipios);
    } catch (PDOException $e){
        echo json_encode(['error' => $e->getMessage()]);
    }finally{
        $sentencia = null;
        $codigo_depa = null;
    }

}