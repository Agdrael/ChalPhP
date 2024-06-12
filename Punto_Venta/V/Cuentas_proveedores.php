<?php
require "../M/conexion.php";
?>

<!DOCTYPE html>
<html lang="en" <head>
<meta charset="utf-8" />
<title>Chaleco</title>

<head>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- ================== BEGIN core-css ================== -->
    <link href="../assets/css/vendor.min.css" rel="stylesheet" />
    <link href="../assets/css/default/app.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" />
    <!-- ================== END core-css ================== -->

    <!--========================= JS ======================== -->
   

</head>

<body>
    <?php

    ?>
    <div class="panel panel-inverse">
        <div class="panel-heading ui-sortable-handle">
            <h4 class="panel-tittle"> Catalogo</h4>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Cuenta</th>
                        <th>Nombre</th>
                        <th>Nivel</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sentencia = $pdo->query("SELECT * FROM catalogo WHERE Cuenta LIKE '2102%' and terminal = 'T' and (nivel = 7 OR nivel= 6) ORDER BY descripcion ASC");
                    $sentencia->execute();
                    $cuenta_pro = $sentencia->fetchAll(PDO::FETCH_OBJ);
                    foreach ($cuenta_pro as $x) { ?>
                        <tr style="cursor: pointer;" onclick="LlenarActividad('<?php echo $x->cuenta ?>')">
                            <td><?php echo $x->cuenta ?></td>
                            <td><?php echo $x->descripcion ?></td>
                            <td><?php echo $x->nivel ?></td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>

    <script>
        function LlenarActividad(cuenta) { //b
            window.opener.recibirInfoCuenta(cuenta);
            window.close();
        }
    </script>
</body>