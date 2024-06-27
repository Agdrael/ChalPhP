<?php
require "../../M/conexion.php";
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
    <link href="../../assets/css/vendor.min.css" rel="stylesheet" />
    <link href="../../assets/css/default/app.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" />
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
            <div class="table-responsive">

                <table id="data-table-keytable" width="100%" class="table table-striped table-bordered align-middle text-nowrap">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Actividad Economica</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sentencia = $pdo->query("SELECT codigo , valores FROM \"CAT-019\"");
                        $sentencia->execute();
                        $Act_eco = $sentencia->fetchAll(PDO::FETCH_OBJ);
                        foreach ($Act_eco as $x) { ?>
                            <tr style="cursor: pointer;" onclick="LlenarActividad('<?php echo $x->codigo; ?>','<?php echo $x->valores; ?>')">
                                <td><?php echo $x->codigo ?></td>
                                <td><?php echo $x->valores ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <!--========================= JS ======================== -->
    <script src="../../assets/js/vendor.min.js"></script>

    <!-- ================== BEGIN page-js ================== -->
    <script src="../../assets/plugins/datatables.net/js/dataTables.min.js"></script>
    <script src="../../assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="../../assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="../../assets/plugins/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../../assets/plugins/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js"></script>
    <script src="../../assets/js/demo/table-manage-keytable.demo.js"></script>
    <script src="../../assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
    <script src="../../assets/js/demo/render.highlight.js"></script>
    <!-- ================== END page-js ================== -->

    <script>
        function LlenarActividad(codigo, nombre) { //b
            window.opener.recibirInfo(codigo, nombre);
            window.close();
        }
    </script>
</body>