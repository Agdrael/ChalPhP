<?php
require '../M/conexion.php';
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


</head>

<body>

    <div class="app-content">
        <div class="row mb-3">
            <div class="col-xl-6-ui-sortable">
                <div class="panel panel-inverse">
                    <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">Proveedores</h4>
                    </div>
                    <div class="panel-body">
                        <form method="post" id="FormProductos">
                            <div class="row mb-20px">
                                <label class="form-label col-form-label col-md-1">Razon Social :</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" placeholder="Ingrese razon social (nombre) ..." name="razon_social" id="razon_social" required>
                                </div>
                            </div>
                            <div class="row mb-20px">
                                <label class="form-label col-form-label col-md-1">Nom Comercial:</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" placeholder="Ingrese Nombre comercial..." name="nombre_comercial" id="nombre_comercial" required>
                                </div>
                            </div>
                            <div class="row mb-30px">
                                <label class="form-label col-form-label col-md-1">Contacto:</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" placeholder="Ingrese el contacto..." name="contacto" id="contacto" required>
                                </div>
                            </div>
                            <!-- ================== separador ================== -->
                            <div class="col-md-7">
                                <hr style="height:1px;border:none;color:#333;background-color:#333;">
                            </div>
                            <!-- ================== separador ================== -->
                            <div class="row form-group mb-15px mt-30px">
                                <label class="form-label col-form-label col-md-1">Nacionalidad:</label>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <select onchange="Nacionalidad()" class="form-select" name="nacionalidad" id="nacionalidad">
                                                <!=====php para traer nacionalidades=====>

                                                    <?php
                                                    try {
                                                        $sentencia = $pdo->query("SELECT * FROM nacionalidades");
                                                        $sentencia->execute();
                                                        $obj_nacionalidad = $sentencia->fetchAll(PDO::FETCH_OBJ);
                                                        print_r($obj_nacionalidad);
                                                        foreach ($obj_nacionalidad as $x) { ?>

                                                            <option value="<?php echo $x->id_nacionalidad ?>"><?php echo $x->nacionalidad ?></option>

                                                    <?php }
                                                    } catch (PDOException $x) {
                                                        echo $x;
                                                    }

                                                    ?>
                                                    <option value="otro">Otro..</option>
                                            </select>
                                        </div>
                                        <label class="form-label col-form-label col-md-2">Nueva nacionalidad:</label>
                                        <div class="col-md-3">
                                            <input class="form-control" type="text" placeholder="Ingrese nueva nacionalidad..." disabled name="n_pais" id="n_pais" required>
                                        </div>

                                    </div>
                                </div>
                                <div class="row form-group mb-15px mt-10px">
                                    <div class="col-md-11">
                                        <div class="row">
                                            <label class="form-label col-form-label col-md-1">Domiciliado:</label>
                                            <div class="col-md-1 ">
                                                <div class="form-check pt-2 ml-3">
                                                    <input class="form-check-input" type="radio" name="Domiciliado" id="radio1" checked value="S" />
                                                    <label class="form-check-label" for="radio1">Si</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-check pt-2 ml-3">
                                                    <input Class="form-check-input" type="radio" name="Domiciliado" id="radio2" value="N" />
                                                    <label class="form-check-label" for="radio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-20px">
                                    <label class="form-label col-form-label col-md-1">Dirección:</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" placeholder="Ingrese la dirección..." name="direccion" id="direccion" required>
                                    </div>
                                </div>
                                <div class="row form-group mb-15px">
                                    <label class="form-label col-form-label col-md-1">Departamento:</label>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <select class="form-select" name="departamento" id="departamento">
                                                    <!=====php para traer departamentos=====>
                                                        <?php
                                                        try {
                                                            $sentencia = $pdo->query("SELECT codigo,valores FROM \"CAT-012\"");
                                                            $sentencia->execute();
                                                            $obj_depa = $sentencia->fetchAll(PDO::FETCH_OBJ);
                                                            foreach ($obj_depa as $y) {
                                                        ?>
                                                                <option value="<?php echo $y->codigo; ?>"><?php echo $y->valores; ?></option>
                                                        <?php }
                                                        } catch (PDOException $x) {
                                                            echo $x;
                                                        } ?>
                                                </select>
                                            </div>
                                            <label class="form-label col-form-label col-md-1">Municipio:</label>
                                            <div class="col-md-3">
                                                <select class="form-select" name="municipio" id="municipio">
                                                    <option value="">Seleccione un municipio</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ================== separador ================== -->
                                <div class="col-md-7">
                                    <hr style="height:1px;border:none;color:#333;background-color:#333;">
                                </div>
                                <!-- ================== separador ================== -->
                                <div class="row mb-20px mt-30px">
                                    <label class="form-label col-form-label col-md-1">Act economica:</label>
                                    <div class="col-sm-5">
                                        <input onclick="Actividad_Economica()" class="form-control" type="text" placeholder="Ingrese actividad economica..." name="act_economica" id="act_economica" required>
                                    </div>
                                </div>
                                <div class="row form-group mb-15px">
                                    <label class="form-label col-form-label col-md-1">Telefono:</label>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" placeholder="Ingrese el numero telefonico..." name="telefono" id="telefono" required>
                                            </div>
                                            <label class="form-label col-form-label col-md-1">Telefono 2:</label>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" placeholder="Ingrese el numero telefonico..." name="telefono2" id="telefono2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group mb-15px">
                                    <label class="form-label col-form-label col-md-1">NIT:</label>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" placeholder="Ingrese el registro fiscal..." name="NIT" id="NIT" required>
                                            </div>
                                            <label class="form-label col-form-label col-md-1">DUI:</label>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" placeholder="Ingrese el Dui..." name="Dui" id="Dui" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group mb-15px">
                                    <label class="form-label col-form-label col-md-1">R.Fiscal:</label>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" placeholder="Ingrese el registro fiscal" name="R_fiscal" id="R_fiscal" required>
                                            </div>
                                            <label class="form-label col-form-label col-md-1">Giro:</label>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" placeholder="Ingrese el Giro..." name="Giro" id="Giro" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-25px">
                                    <label class="form-label col-form-label col-md-1">Correo electronico:</label>
                                    <div class="col-md-5">
                                        <input  class="form-control" type="text" placeholder="Ingrese correo electronico..." name="correo" id="correo" required>
                                    </div>
                                </div>
                                <!-- ================== separador ================== -->
                                <div class="col-md-7">
                                    <hr style="height:1px;border:none;color:#333;background-color:#333;">
                                </div>
                                <!-- ================== separador ================== -->
                                <div class="row mb-20px mt-30px">
                                    <label class="form-label col-form-label col-md-1">Cuenta:</label>
                                    <div class="col-sm-2">
                                        <input onclick="Cuenta_proveedor()" class="form-control" type="text" placeholder=". . . . . . . ." name="Cuenta" id="Cuenta" required>
                                    </div>
                                    <label id="nom_cuenta" class="form-label col-form-label col-md-3" hidden>a</label>
                                </div>
                                <div class="row form-group mb-30px">
                                    <div class="col-md-11">
                                        <div class="row">
                                            <label class="form-label col-form-label col-md-1">Catagoría:</label>
                                            <div class="col-md-1 ">
                                                <div class="form-check pt-2 ml-3">
                                                    <input class="form-check-input" type="radio" name="Tamaño" id="radio1" checked value="P" />
                                                    <label class="form-check-label" for="radio1">Pequeño</label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-check pt-2 ml-3">
                                                    <input Class="form-check-input" type="radio" name="Tamaño" id="radio2" value="M" />
                                                    <label class="form-check-label" for="radio2">Mediano</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-check pt-2 ml-3">
                                                    <input Class="form-check-input" type="radio" name="Tamaño" id="radio3" value="G" />
                                                    <label class="form-check-label" for="radio3">Grande</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-60px">
                                    <div class="col-md-1">
                                        <button type="button" id="guardar_proveedor" class="btn btn-green">Guardar</button>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-gray">Limpiar</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="../assets/js/vendor.min.js"></script>
    <script src="../assets/js2/IngresarProveedor.js"></script>
    <script>
        //Form proveedores 
        function Actividad_Economica() {
            window.open('tablas/ActEconomica.php', 'miniatura', 'width=500,height=700');
        }

        function Cuenta_proveedor() {
            window.open('tablas/Cuentas_proveedores.php', 'miniatura', 'width=500,height=700');
        }


        function recibirInfo(codigo, nombre) {
            const informacion = codigo + ": " + nombre
            document.getElementById('act_economica').value = informacion;
        }

        function recibirInfoCuenta(cuenta, nombre) {
            var total = "";
            var control = 0;
            for (var i = 0; i < 9; i++) {
                if (i < 2) {
                    total += cuenta[control] + ".";
                    control++;
                } else if (control < cuenta.length) {
                    total += cuenta[control] + cuenta[control + 1] + ".";
                    control += 2;
                } else {
                    total += " .";
                }
            }
            total = total.substring(0, total.length - 1);

            document.getElementById('Cuenta').value = total;
            document.getElementById('nom_cuenta').textContent = nombre;
            document.getElementById('nom_cuenta').hidden = false;
        }


        //-------------------Obtener el municipio respectivo al departamento
        document.getElementById('departamento').addEventListener('change', function() {
            var codigoDepa = this.value;
            var SelectMunicipio = document.getElementById('municipio');

            SelectMunicipio.innerHTML = '<option value="">Cargando...</option>';
            if (codigoDepa) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "../M/Modelos_punto_venta/ModeloMunicipio.php?codigo_departamento=" + codigoDepa, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var municipios = JSON.parse(xhr.responseText);
                        SelectMunicipio.innerHTML = '<option value="">Seleccione un municipio</option>';
                        if (municipios.error)
                            alert(municipios.error)
                        else {
                            municipios.forEach(function(municipio) {
                                var option = document.createElement('option');
                                option.value = municipio.valores;
                                option.textContent = municipio.valores;
                                SelectMunicipio.appendChild(option);
                            });
                        }
                    }
                };
                xhr.send();
            } else {
                SelectMunicipio.innerHTML = '<option value="">Seleccione un municipio</option>';
            }
        })
    </script>

</body>