

//Form productos
function EnableIva() {
    var ivaChk = document.getElementById('chk_iva');
    var txtBoxIva = document.getElementById('iva');

    if (txtBoxIva.disabled = !ivaChk.checked) {
        txtBoxIva.value = "";
    }


}

function disabledCuentas() {
    var Bien = document.getElementById('radio1');
    var Servicio = document.getElementById('radio2');
    var cuenta_inv = document.getElementById('cuenta_inv');
    const lblCuenta_inv = document.getElementById('labelCuentaInv');
    var cuenta_cos = document.getElementById('cuenta_cost');
    const lvlCuenta_cos = document.getElementById('lblCuentaCos');

    if (Servicio.checked) {
        cuenta_inv.disabled = true;
        cuenta_inv.value = "";

        cuenta_cos.disabled = true;
        cuenta_cos.value = "";
        lblCuenta_inv.hidden = true;
        lblCuenta_inv.textContent = " ";
        lvlCuenta_cos.hidden = true;
        lvlCuenta_cos.textContent = " ";
    }

    if (Bien.checked) {
        cuenta_inv.disabled = false;
        cuenta_inv.value = "";
        cuenta_cos.disabled = false;
        cuenta_cos.value = "";
    }
}


document.addEventListener('DOMContentLoaded', function () {
    const qrInput = document.getElementById('codigo_qr');
    qrInput.focus();

    document.getElementById('guardarProducto').addEventListener('click', function () {
        const codigoQr = document.getElementById('codigo_qr').value;
        const descripcion = document.getElementById('descripcion').value;
        const abreviado = document.getElementById('abreviado').value;

        
        //Bien o servicio
        var detalle = document.getElementsByName('Bien_Servicio');
        var detalleBS = "No seleccionado";
        for (var i = 0; i < detalle.length; i++) {
            if (detalle[i].checked) {
                detalleBS = detalle[i].value;
                break;
            }
        }

        //Tipo Precio
        var precio = document.getElementsByName('Fijo_Variable');
        var precioFV = "No seleccionado";
        for (var i = 0; i < precio.length; i++) {
            if (precio[i].checked) {
                precioFV = precio[i].value;
                break;
            }
        }

        //impuesto
        var impuesto = document.getElementsByName('Exenta_Afecta');
        var impuestoEA = "No seleccionado";
        for (var i = 0; i < impuesto.length; i++) {
            if (impuesto[i].checked) {
                impuestoEA = impuesto[i].value;
                break;
            }
        }

        const proveedor = document.getElementById('proveedores').value;
        const P_Venta = document.getElementById('precio').value;

        var Cuenta_inv = document.getElementById('cuenta_inv').value;
        var Cuenta_inv2 = "Na";
        if (Cuenta_inv.trim() !== "") {
            Cuenta_inv2 = Cuenta_inv;
        }
        var Cuenta_cost = document.getElementById('cuenta_cost').value;
        var Cuenta_cost2 = "Na";
        if (Cuenta_cost.trim() !== "") {
            Cuenta_cost2 = Cuenta_cost;
        }

        const Cuenta_ing = document.getElementById('cuenta_ingreso').value;

        const ubicacion = document.getElementById('ubicacion').value;
        const ubi = "Na";
        if (ubicacion.trim() !== "") {
            ubi = ubicacion;
        }

        const unidad = document.getElementById('unidad').value;
        const uni = "Na";
        if (unidad.trim() !== "") {
            uni = unidad;
        }

        const exMin = document.getElementById('ex_minima').value;
        const Minima = "Na";
        if (exMin.trim() !== "") {
            Minima = exMin;
        }

        const ex_max = document.getElementById('ex_max').value;
        const maxima = "Na";
        if (ex_max.trim() !== "") {
            maxima = ex_max;
        }

        const data = {
            accion: 1,
            codigo: codigoQr,
            descripcion: descripcion,
            abreviado: abreviado,
            detalle: detalleBS,
            precio: precioFV,
            impuesto: impuestoEA,
            proveedor: proveedor,
            p_Venta: P_Venta,
            cta_inv: Cuenta_inv2,
            cta_cost: Cuenta_cost2,
            cta_ing: Cuenta_ing,
            ubicacion: ubi,
            unidad: uni,
            exMin: Minima,
            exMax: maxima
        }

        fetch('../M/Modelos_punto_venta/ModeloProductos.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
            .then(response => response.text())
            .then(text => {
                console.log('Response Text:', text);
                try {
                    const data = JSON.parse(text);
                    console.log('nice:', data);
                } catch (error) {
                    console.error('JSON parse error:', error);
                }
            })
            .catch((error) => {
                console.error('F:', error);
            });

    });



});








