<?php
require "../M/conexion.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
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

    <div id="content" class="app-content">
        <div class="row mb-3">
            <div class="col-xl-6 ui-sortable">
                <div class="panel panel-inverse" data-sortable-id="form-stuff-1" data-init="true">
                    <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">Productos</h4>
                    </div>
                    <div class="panel-body">
                        <form id="FormProductos">
                            <div class="row mb-20px">
                                <label class="form-label col-form-label col-md-2">Código:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="codigo_qr" id="codigo_qr"  >

                                </div>
                            </div>
                            <div class="row mb-20px">
                                <label class="form-label col-form-label col-md-2">Descipción:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" placeholder="Ingrese la descripción..." name="descripcion" id="descripcion" required>
                                </div>
                            </div>
                            <div class="row mb-20px">
                                <label class="form-label col-form-label col-md-2">Abreviado:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" placeholder="Ingrese la abreviación del producto..." name="abreviado" id="abreviado" required>
                                </div>
                            </div>
                            <div class="row form-group mb-30px">
                                <div class="col-md-11">
                                    <div class="row">
                                        <label class="form-label col-form-label col-md-2">Detalle:</label>
                                        <div class="col-md-6 mb-15px">
                                            <div class="form-check pt-2 ml-3">
                                                <input class="form-check-input" type="radio" name="Bien_Servicio" onclick="disabledCuentas()" id="radio1" checked value="B" />
                                                <label class="form-check-label" for="radio1">Bien</label>
                                            </div>
                                            <div class="form-check pt-2 ml-3">
                                                <input class="form-check-input" type="radio" name="Bien_Servicio" onclick="disabledCuentas()" id="radio2" value="S" />
                                                <label class="form-check-label" for="radio2">Servicio</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="form-label col-form-label col-md-2">Tipo precio:</label>
                                        <div class="col-md-6 mb-15px">
                                            <div class="form-check pt-2 ml-3">
                                                <input class="form-check-input" type="radio" name="Fijo_Variable" id="radio3" checked value="F" />
                                                <label class="form-check-label" for="radio3">Fijo</label>
                                            </div>
                                            <div class="form-check pt-2 ml-3">
                                                <input class="form-check-input" type="radio" name="Fijo_Variable" id="radio4" value="V" />
                                                <label class="form-check-label" for="radio4">Variable</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="form-label col-form-label col-md-2">Impuesto:</label>
                                        <div class="col-md-6 mb-15px">
                                            <div class="form-check pt-2 ml-3">
                                                <input class="form-check-input" type="radio" name="Exenta_Afecta" id="radio5" checked value="E" />
                                                <label class="form-check-label" for="radio5">Exenta</label>
                                            </div>
                                            <div class="form-check pt-2 ml-3">
                                                <input class="form-check-input" type="radio" name="Exenta_Afecta" id="radio6" value="A" />
                                                <label class="form-check-label" for="radio6">Afecta</label>
                                            </div>
                                            <div class="form-check pt-2 ml-3">
                                                <input class="form-check-input" type="radio" name="Exenta_Afecta" id="radio7" value="N" />
                                                <label class="form-check-label" for="radio7">No Sujeta</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ================== separador ================== -->
                            <div class="col-md-7">
                                <hr style="height:1px;border:none;color:#333;background-color:#333;">
                            </div>
                            <!-- ================== separador ================== -->
                            <div class="row mb-20px">
                                <label class="form-label col-form-label col-md-2">Proveedores:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" onclick="Cuenta_proveedor()" type="text" placeholder="Ingrese el nombre del proveedor..." name="proveedores" id="proveedores" required>
                                </div>
                            </div>
                            <div class="row form-group mb-15px mt-30px">
                                <label class="form-label col-form-label col-md-2">Prec. Venta:</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input class="form-control" type="text" placeholder="Ingrese el precio..." name="precio" id="precio" required>
                                        </div>
                                        <label class="form-label col-form-label col-md-2">IVA incluido</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row form-group mb-15px">
                                <label class="form-label col-form-label col-md-2">Cuenta Inv:</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input class="form-control" onclick="Cuenta_inv()"  type="number" placeholder=". . . . . . . ." name="cuenta_inv" id="cuenta_inv" required>
                                        </div>
                                        <label id="labelCuentaInv" class="form-label col-form-label col-md-6" hidden>Descripcion_Cuenta_Inv</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mb-15px">
                                <label class="form-label col-form-label col-md-2">Cuenta Costo:</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input class="form-control" onclick="Cuenta_costo()" type="number" placeholder=". . . . . . . ." name="cuenta_cost" id="cuenta_cost" required>
                                        </div>
                                        <label id="lblCuentaCos" class="form-label col-form-label col-md-6" hidden>Descripcion_Cuenta_Costo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mb-30px">
                                <label class="form-label col-form-label col-md-2">Cuenta Ingresos:</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input class="form-control" onclick="Cuenta_ing()" type="number" placeholder=". . . . . . . ." name="cuenta_ingreso" id="cuenta_ingreso" required>
                                        </div>
                                        <label id="lblCuentaIng" class="form-label col-form-label col-md-6" hidden>Descripcion_Cuenta_Costo</label>
                                    </div>
                                </div>
                            </div>
                            <!-- ================== separador ================== -->
                            <div class="col-md-7">
                                <hr style="height:1px;border:none;color:#333;background-color:#333;">
                            </div>
                            <!-- ================== separador ================== -->
                            <div class="row mb-20px mt-30px">
                                <label class="form-label col-form-label col-md-2">Ubicación:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" placeholder="Ingrese ubicación..." name="ubicacion" id="ubicacion">
                                </div>
                            </div>
                            <div class="row mb-20px">
                                <label class="form-label col-form-label col-md-2">Unidad:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" placeholder="Ingrese la Unidad..." name="unidad" id="unidad">
                                </div>
                            </div>
                            <div class="row mb-20px">
                                <label class="form-label col-form-label col-md-2">Ex.Minima:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" placeholder="Ingrese la Unidad..." name="ex_minima" id="ex_minima">
                                </div>
                            </div>
                            <div class="row mb-50px">
                                <label class="form-label col-form-label col-md-2">Ex.Máxima:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" placeholder="Ingrese la Unidad..." name="ex_max" id="ex_max">
                                </div>
                            </div>
                            <div class="row mb-60px">
                                <div class="col-md-2">
                                    <button type="button" id="guardarProducto" class="btn btn-green w-100">Guardar</button>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary w-100">Actualizar</button>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger w-100">Eliminar</button>
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
                                        <th>Codigo</th>
                                        <th>Descripcion</th>
                                        <th>Grupo</th>
                                        <th>Cta.Inventario</th>
                                        <th>Cta.Gastos</th>
                                        <th>Cta.Ingresos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sentencia1  = $pdo->query("SELECT codigo, descripcion,ubicacion,cuenta_inv,cuenta_gas,cuenta_ing FROM productos");
                                    $sentencia1->execute();
                                    $obj_numero = $sentencia1->fetchAll(PDO::FETCH_OBJ);
                                    foreach ($obj_numero as $x) { ?>
                                        <tr>
                                            <td><?php echo $x->codigo ?></td>
                                            <td><?php echo $x->descripcion ?></td>
                                            <td><?php echo $x->ubicacion ?></td>
                                            <td><?php echo $x->cuenta_inv ?></td>
                                            <td><?php echo $x->cuenta_gas ?></td>
                                            <td><?php echo $x->cuenta_ing ?></td>
                                        </tr>
                                    <?php } ?>
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
    <script src="../assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
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

    <script src="../assets/js2/IngresarProducto.js"></script>
    <script>

        

        function Cuenta_proveedor() {
            window.open('tablas/Cuentas_proveedores.php', 'miniatura', 'width=700,height=700');
        }

        function Recibir_proveedor(cuenta){
            const nombreProveedor = cuenta;
            document.getElementById('proveedores').value = cuenta;
        }

        function Cuenta_inv(){
            window.open('tablas/Cuenta_inv.php','miniatura','width=600, height=700');
        }

        function Recibir_Inv(cuenta,nombre){
            const cuentaInv = cuenta;
            const nombreProveedor = nombre;
            document.getElementById('cuenta_inv').value = cuenta;
            document.getElementById('labelCuentaInv').textContent = nombre;
            document.getElementById('labelCuentaInv').hidden = false;
        }

        function Cuenta_costo(){
            window.open('tablas/Cuenta_gas.php','miniatura','width=600, height=700');
        }

        function Recibir_Cos(cuenta,nombre){
            const cuentaCos = cuenta;
            const nombreProveedor = nombre;
            document.getElementById('cuenta_cost').value = cuenta;
            document.getElementById('lblCuentaCos').textContent = nombre;
            document.getElementById('lblCuentaCos').hidden = false;
        }       

        function Cuenta_ing(){
            window.open('tablas/Cuenta_ing.php','miniatura','width=600, height=700');
        }

        function Recibir_Ing(cuenta,nombre){
            const cuentaIng = cuenta;
            const nombreProveedor = nombre;
            document.getElementById('cuenta_ingreso').value = cuenta;
            document.getElementById('lblCuentaIng').textContent = nombre;
            document.getElementById('lblCuentaIng').hidden = false;
        }  
    </script>
</body>

</html>