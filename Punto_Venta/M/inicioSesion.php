<?php
    require 'conexion.php';
    $nombre = $_POST['user'];
    $pass = $_POST['password'];
    
    
    
  
    if(!empty($nombre) && !empty($pass))
    {
        try
        {
            $stmt = $pdo->prepare('SELECT * from usuarios WHERE Nombre_Usuario = :usuario AND password = :pass');
            $stmt->bindValue(':usuario',$nombre, PDO::PARAM_STR);
            $stmt->bindValue(':pass',$pass, PDO::PARAM_STR);
            if($stmt->execute())
            {
                $resultado = $stmt->fetchColumn() > 0;
           

                if($resultado > 0)
                    return '../V/producto.php';
                else
                    echo 'Usuario no encontrado';
            }
            else
                echo 'NoYipii ejecutado';
        }
        catch (PDOException $e)
        {
            echo "<script>console.log($e)</script>";
        }
        finally
        {
            $pdo = null;
            $stmt = null;
        }
    }
    else
    {
        echo 'Campos vacios';
    }

