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
    <script src="../assets/js2/punto_venta.js"></script>

    <!-- ================== END core-css ================== -->

</head>

<body>
  
    <div class="app-content">
        <div class="row mb-3">
            <div class="col-xl-6-ui-sortable">
                <div class="panel panel-inverse">
                    <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">Productos</h4>
                    </div>
                    <div class="panel-body">
                        <form action="../M/Modelos_punto_venta/ModeloProductos.php" method="post" id="FormProductos">
                            <div class="row mb-20px">
                                <label class="form-label col-form-label col-md-1">Código:</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" placeholder="Ingrese el código..." name="codigo" id="codigo" required>
                                </div>
                            </div>
                            <div class="row mb-20px">
                                <label class="form-label col-form-label col-md-1">Descipción:</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" placeholder="Ingrese la descripción..." name="descripcion" id="descripcion" required>
                                </div>
                            </div>
                            <div class="row mb-20px">
                                <label class="form-label col-form-label col-md-1">Abreviado:</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" placeholder="Ingrese la abreviación del producto..." name="abreviado" id="abreviado" required>
                                </div>
                            </div>
                            <div class="row form-group mb-30px">
                                <div class="col-md-11">
                                    <div class="row">
                                        <label class="form-label col-form-label col-md-1">Detalle:</label>
                                        <div class="col-md-1 ">
                                            <div class="form-check pt-2 ml-3">
                                                <input class="form-check-input" type="radio" name="Bien_Servicio" onclick="disabledCuentas()" id="radio1" checked value="B" />
                                                <label class="form-check-label" for="radio1">Bien</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-check pt-2 ml-3">
                                                <input Class="form-check-input" type="radio" name="Bien_Servicio" onclick="disabledCuentas()" id="radio2" value="S" />
                                                <label class="form-check-label" for="radio2">Servicio</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <label class="form-label col-form-label col-md-1">Tipo precio:</label>
                                        <div class="col-md-1 ">
                                            <div class="form-check pt-2 ml-3">
                                                <input class="form-check-input" type="radio" name="Fijo_Variable" id="radio3" checked value="F" />
                                                <label class="form-check-label" for="radio3">Fijo</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-check pt-2 ml-3">
                                                <input Class="form-check-input" type="radio" name="Fijo_Variable" id="radio4" value="V" />
                                                <label class="form-check-label" for="radio4">Variable</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <label class="form-label col-form-label col-md-1">Impuesto:</label>
                                        <div class="col-md-1 ">
                                            <div class="form-check pt-2 ml-3">
                                                <input class="form-check-input" type="radio" name="Exenta_Afecta" id="radio5" checked value="E" />
                                                <label class="form-check-label" for="radio5">Exenta</label>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-check pt-2 ml-3">
                                                <input Class="form-check-input" type="radio" name="Exenta_Afecta" id="radio6" value="A" />
                                                <label class="form-check-label" for="radio6">Afecta</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 ">
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
                            <div class="row form-group mb-15px mt-30px">
                                <label class="form-label col-form-label col-md-1">Prec. Venta:</label>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input class="form-control" type="text" placeholder="Ingrese el precio..." name="precio" id="precio" required>
                                        </div>
                                        <label class="form-label col-form-label col-md-1">IVA:</label>
                                        <div class="col-md-1">
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" id="chk_iva" onclick="EnableIva()">
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control" type="text" placeholder="Ingrese el valor del IVA..." disabled name="iva" id="iva" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-20px">
                                <label class="form-label col-form-label col-md-1">Proveedores:</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" placeholder="Ingrese el nombre del proveedor..." name="proveedores" id="proveedores" required>
                                </div>
                            </div>
                            <div class="row form-group mb-15px">
                                <label class="form-label col-form-label col-md-1">Cuenta Inv:</label>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input class="form-control" type="number" placeholder=". . . . . . . ." name="cuenta_inv" id="cuenta_inv" required>
                                        </div>
                                        <label class="form-label col-form-label col-md-1">Descripcion_Cuenta_Inv</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mb-15px">
                                <label class="form-label col-form-label col-md-1">Cuenta Costo:</label>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input class="form-control" type="number" placeholder=". . . . . . . ." name="cuenta_cost" id="cuenta_cost" required>
                                        </div>
                                        <label class="form-label col-form-label col-md-1">Descripcion_Cuenta_Costo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mb-30px">
                                <label class="form-label col-form-label col-md-1">Cuenta Ingresos:</label>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input class="form-control" type="number" placeholder=". . . . . . . ." name="cuenta_ingreso" id="cuenta_ingreso" required>
                                        </div>
                                        <label class="form-label col-form-label col-md-1">Descripcion_Cuenta_Costo</label>
                                    </div>
                                </div>
                            </div>
                            <!-- ================== separador ================== -->
                            <div class="col-md-7">
                                <hr style="height:1px;border:none;color:#333;background-color:#333;">
                            </div>
                            <!-- ================== separador ================== -->
                            <div class="row mb-20px mt-30px">
                                <label class="form-label col-form-label col-md-1">Ubicación:</label>
                                <div class="col-sm-2">
                                    <input class="form-control" type="text" placeholder="Ingrese ubicación..." name="ubicacion" id="ubicacion" >
                                </div>
                            </div>
                            <div class="row mb-20px">
                                <label class="form-label col-form-label col-md-1">Unidad:</label>
                                <div class="col-sm-2">
                                    <input class="form-control" type="text" placeholder="Ingrese la Unidad..." name="unidad" id="unidad" >
                                </div>
                            </div>
                            <div class="row mb-20px">
                                <label class="form-label col-form-label col-md-1">Ex.Minima:</label>
                                <div class="col-sm-2">
                                    <input class="form-control" type="text" placeholder="Ingrese la Unidad..." name="ex_minima" id="ex_minima">
                                </div>
                            </div>
                            <div class="row mb-50px">
                                <label class="form-label col-form-label col-md-1">Ex.Máxima:</label>
                                <div class="col-sm-2">
                                    <input class="form-control" type="text" placeholder="Ingrese la Unidad..." name="ex_max" id="ex_max">
                                </div>
                            </div>
                            <div class="row mb-60px">
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-green">Guardar</button>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


</body>