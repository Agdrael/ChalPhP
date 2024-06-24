function CrearCuenta() {
    var inputs = document.querySelectorAll('#formulario_cta input');

    inputs.forEach(function (input) {
        if (input.type === 'text') {
            input.value = "";
            input.readOnly = false;
        }

        if (input.type === 'radio') {
            input.disabled = false;
            input.checked = false;
        }
    });
}

function actualizarCodigoCuenta(nuevoValor) {
    var txt_cuenta = document.getElementById('codigo_cuenta');
    txt_cuenta.value = nuevoValor;
    
    // Crear y despachar el evento 'input'
    var event = new Event('input', {
        bubbles: true,
        cancelable: true,
    });
    txt_cuenta.dispatchEvent(event);
}

function CancelarBoton() {
    var btn_mismolvl = document.getElementById('mismo_lvl');
    var btn_sublvl = document.getElementById('sub_cta');
    var txt_cuenta = document.getElementById('codigo_cuenta').value;
    if (txt_cuenta.length < 4) {
        btn_mismolvl.disabled = true;
        btn_sublvl.disabled = true;
    } else {
        btn_mismolvl.disabled = false;
        btn_sublvl.disabled = false;
    }
}

document.getElementById('codigo_cuenta').addEventListener('input', CancelarBoton);

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('mismo_lvl').addEventListener('click', function () {

        // Verificar que los elementos existen antes de acceder a sus valores
        const codigoElement = document.getElementById('codigo_cuenta');
        const tipoCuentaElement = document.getElementById('tipo_cuenta');
        const descripcionElement = document.getElementById('descrip');
        const nombreElement = document.getElementById('descripcion');
        const saldoElements = document.getElementsByName('tipo_saldo');

        if (!codigoElement || !tipoCuentaElement || !nombreElement) {
            console.error('Uno o más elementos no existen en el DOM');
            return;
        }

        const codigo = codigoElement.value;
        let tipo_cuenta = tipoCuentaElement.value;

        if (tipo_cuenta === "Cuenta de activo") {
            tipo_cuenta = "D";
        } else {
            tipo_cuenta = "A";
        }

        let descripcion = "x";
        if (descripcionElement) {
            descripcion = descripcionElement.value || descripcion;
        }

        const nombre = nombreElement.value;
        let saldo;

        for (let i = 0; i < saldoElements.length; i++) {
            if (saldoElements[i].checked) {
                saldo = saldoElements[i].value;
                break;
            }
        }

        const data = {
            accion: 1,
            n_cuenta: codigo,
            tipo_cuenta: tipo_cuenta,
            descripcion: descripcion,
            nombre: nombre,
            saldo: saldo
        };

        fetch('../M/Modelos_punto_venta/ModeloCatalogoCuentas.php', {
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

    document.getElementById('sub_cta').addEventListener('click',function(){
        
        // Verificar que los elementos existen antes de acceder a sus valores
        const codigoElement = document.getElementById('codigo_cuenta');
        const tipoCuentaElement = document.getElementById('tipo_cuenta');
        const descripcionElement = document.getElementById('descrip');
        const nombreElement = document.getElementById('descripcion');
        const saldoElements = document.getElementsByName('tipo_saldo');

        if (!codigoElement || !tipoCuentaElement || !nombreElement) {
            console.error('Uno o más elementos no existen en el DOM');
            return;
        }

        const codigo = codigoElement.value;
        let tipo_cuenta = tipoCuentaElement.value;

        if (tipo_cuenta === "Cuenta de activo") {
            tipo_cuenta = "D";
        } else {
            tipo_cuenta = "A";
        }

        let descripcion = "x";
        if (descripcionElement) {
            descripcion = descripcionElement.value || descripcion;
        }

        const nombre = nombreElement.value;
        let saldo;

        for (let i = 0; i < saldoElements.length; i++) {
            if (saldoElements[i].checked) {
                saldo = saldoElements[i].value;
                break;
            }
        }

        const data = {
            accion: 2,
            n_cuenta: codigo,
            tipo_cuenta: tipo_cuenta,
            descripcion: descripcion,
            nombre: nombre,
            saldo: saldo
        };

        fetch('../M/Modelos_punto_venta/ModeloCatalogoCuentas.php', {
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

