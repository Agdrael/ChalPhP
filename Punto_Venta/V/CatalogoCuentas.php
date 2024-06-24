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
    <!-- ================== END core-css ================== -->
    <!-- ================== BEGIN page-css ================== -->
    <link href="../assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css" rel="stylesheet" />
    <!-- ================== END page-css ================== -->





</head>

<body>
    <div class="container">
        <div class="alert-container"></div>
        <div class="data-container"></div>
    </div>
    <div id="content" class="app-content">
        <div class="row mb-3">
            <div class="col-xl-6 ui-sortable">
                <div class="panel panel-inverse" data-sortable-id="form-stuff-1" data-init="true">
                    <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">Catalogo de cuentas</h4>
                    </div>
                    <div class="panel-body">
                        <form id="formulario_cta">
                            <div class="row mb-50px justify-content-center">
                                <div class="col-md-2">
                                    <input type="button" onclick="CrearCuenta()" value="Cta Nueva" class="btn btn-primary w-100">
                                </div>
                                <div class="col-md-2">
                                    <input type="button" id="mismo_lvl" value="Mismo Nv" class="btn btn-primary w-100" disabled>
                                </div>
                                <div class="col-md-2">
                                    <input type="button" id="sub_cta"  value="Sub - Cta" class="btn btn-primary w-100" disabled>
                                </div>
                                <div class="col-md-2">
                                    <input type="button" onclick="Guardar()" value="Guardar" class="btn btn-green w-100" disabled>
                                </div>
                                <div class="col-md-2">
                                    <input type="button" onclick="Eliminar()" value="Eliminar" class="btn btn-danger w-100">
                                </div>
                            </div>

                            <div class="row mb-15px">
                                <label class="form-label col-form-label col-md-2">Código Cuenta:</label>
                                <div class="col-md-9">
                                    <input type="text" onchange="CancelarBoton()" id="codigo_cuenta" class="form-control mb-5px" placeholder=". . . . . . . ." readonly maxlength="16">
                                </div>
                            </div>
                            <div class="row mb-15px">
                                <label class="form-label col-form-label col-md-2">Tipo de cuenta:</label>
                                <div class="col-md-9">
                                    <input type="text" id="tipo_cuenta" class="form-control mb-5px" placeholder="" readonly>
                                </div>
                            </div>

                            <div class="row mb-15px">
                                <label class="form-label col-form-label col-md-2">Descripción:</label>
                                <div class="col-md-9">
                                    <input type="text" id="descrip" class="form-control mb-5px" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="row mb-15px">
                                <label class="form-label col-form-label col-md-2">Nom Centro:</label>
                                <div class="col-md-9">
                                    <input type="text" id="descripcion" class="form-control mb-5px" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="row mb-15px">
                                <label class="form-label col-form-label col-md-2">Tipo saldo:</label>
                                <div class="col-md-2 pt-2">
                                    <input Class="form-check-input" type="radio" name="tipo_saldo" id="radio1" value="D" disabled /> <!--Pasivo/--->
                                    <label class="form-check-label" for="radio1">Deudor</label>
                                </div>
                                <div class="col-md-2 pt-2">
                                    <input Class="form-check-input" type="radio" name="tipo_saldo" id="radio2" value="A" disabled /> <!--Activo/--->
                                    <label class="form-check-label" for="radio2">Acredetor</label>
                                </div>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 ui-sortable">
                <div class="panel panel-inverse" data-sortable-id="table-basic-6">


                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="data-table-keytable" width="100%" class="table table-striped table-bordered align-middle text-nowrap">
                                <thead>
                                    <tr>

                                        <th>Cuenta</th>
                                        <th>Nombre de la cuenta</th>
                                        <th>T.saldo</th>
                                        <th>Ult</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sentencia1  = $pdo->query("SELECT
                                                        cuenta,
                                                        descripcion,
                                                        tipo_saldo,
                                                        nivel
                                                        FROM catalogo");

                                    $sentencia1->execute();
                                    $obj_numero = $sentencia1->fetchAll(PDO::FETCH_OBJ);
                                    foreach ($obj_numero as $x) { ?>
                                        <tr onclick="llevarDatos('<?php echo $x->cuenta ?>','<?php echo $x->tipo_saldo ?>','<?php echo $x->descripcion ?>')">
                                            <td><?php echo $x->cuenta ?></td>
                                            <td><?php echo $x->descripcion ?></td>
                                            <td><?php
                                                if ($x->tipo_saldo == 'D')
                                                    echo "Deudor";
                                                else
                                                    echo "Acreedor";
                                                ?>
                                            </td>
                                            <td><?php if ($x->nivel == 7)
                                                    echo "si";
                                                else
                                                    echo "";
                                                ?>
                                            </td>
                                        <?php } ?>


                                        </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--========================= JS ======================== -->
    <script src="../assets/js/vendor.min.js"></script>

    <!-- ================== BEGIN page-js ================== -->
    <script src="../assets/plugins/datatables.net/js/dataTables.min.js"></script>
    <script src="../assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="../assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="../assets/plugins/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../assets/plugins/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js"></script>
    <script src="../assets/js/demo/table-manage-keytable.demo.js"></script>
    <script src="../assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
    <script src="../assets/js/demo/render.highlight.js"></script>
    <!-- ================== END page-js ================== -->

    <Script src="../assets/js2/CatalogoCuentas.js"> </script>

    <script>
        function llevarDatos(N_cuenta, Tipo_Cuenta, nombre_cuenta) {

            actualizarCodigoCuenta(N_cuenta);
            if (Tipo_Cuenta == 'D') {
                document.getElementById('tipo_cuenta').value = "Cuenta de activo";
                document.getElementById('radio1').checked = true;
                document.getElementById('radio2').checked = false;
            } else {
                document.getElementById('tipo_cuenta').value = "Cuenta de pasivo";
                document.getElementById('radio1').checked = false;
                document.getElementById('radio2').checked = true;
            }


            document.getElementById('descripcion').value = nombre_cuenta;

        }

        document.getElementById('codigo_cuenta').addEventListener('input', function() {
            CancelarBoton();
        });

        window.onload = function() {
            CancelarBoton();
        };



        //ajax
        $(document).ready(function() {
            $.ajax({
                url: '../M/Modelos_punto_venta/ModeloCatalogoCuentas.php',
                method: 'GET',
                warning: function(response) {
                    var data = JSON.parse(response);

                    var alerta = '<div class="alert alert-' + data.alert_type + ' alert-dismissible fade show" role="alert">' +
                        data.message +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '</button>' +
                        '</div>';

                    $('#alert-container').html(alerta);

                    // Manejar clic en el botón "Continuar"
                    $('#continue-button').on('click', function() {
                        // Lógica para continuar el proceso
                        alert('Continuar con el proceso');
                        // Por ejemplo, puedes hacer otra solicitud AJAX para continuar el proceso
                        // $.ajax({
                        //     url: 'otro_script_php.php',
                        //     method: 'POST',
                        //     data: { action: 'continuar' },
                        //     success: function(response) {
                        //         // Manejar la respuesta
                        //     }
                        // });
                    });

                    // Manejar clic en el botón "Cancelar"
                    $('#cancel-button').on('click', function() {
                        // Lógica para cancelar el proceso
                        alert('Proceso cancelado');
                        // Ocultar la alerta
                        $('#alert-container').empty();
                    });

                    // Si hay datos, mostrarlos
                    if (data.status === 'success' && data.data) {
                        var dataHTML = '<ul>';
                        $.each(data.data, function(index, item) {
                            dataHTML += '<li>' + JSON.stringify(item) + '</li>';
                        });
                        dataHTML += '</ul>';
                        $('#data-container').html(dataHTML);
                    }
                }
            })
        });
    </script>

</body>