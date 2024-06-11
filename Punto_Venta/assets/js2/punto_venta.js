/*
document.getElementById('FormProductos').addEventListener('submit'), function (event) {
    var codigo = document.getElementById('codigo').value;
    var descripcion = document.getElementById('descripcion').value;
    var abreviado = document.getElementById('abreviado').value;
    const bien_servicio = document.getElementsByName('Bien_Servicio');
    const fijo_variable = document.getElementsByName('Fijo_Variable');
    const exenta_afecta = document.getElementsByName('Exenta_Afecta');
    var precio = document.getElementById('precio').value;
    var iva = document.getElementById('iva').value;
    var cuenta_inv = document.getElementById('cuenta_inv').value;
    var cuenta_cos = document.getElementById('cuenta_cost').value;
    var cuenta_ing = document.getElementById('cuenta_ingreso').value;
    var ubicacion = document.getElementById('ubicacion').value;
    var unidad = document.getElementById('unidad').value;
    var ex_min = document.getElementById('ex_minima').value;
    var ex_max = document.getElementById('ex_max').value;


    //asignacion fijoVariable
    for (var i = 0; i < fijo_variable.length; i++) {
        if (fijo_variable[i].checked)
            fijo_variable = fijo_variable[i].value;
    }

    //asignacion bienServicio
    for (var i = 0; i < bien_servicio.length; i++) {
        if (bien_servicio[i].checked)
            bien_servicio = bien_servicio[i].value;
    }

    //asignacion exenta
    for (var i = 0; i < exenta_afecta.length; i++) {
        if (exenta_afecta[i].checked)
            exenta_afecta = exenta_afecta[i].value;
    }
}

 let formData = new FormData(document.getElementById('FormProductos'));
fetch('../M/Modelo_punto_venta/ModeloProductos.php',{
    method: 'POST',
    body: formData
}).then(response => response.text()).then(data => {
    console.log(data);
}).then(error =>{
    console.error(error);
});
*/



function EnableIva(){
    var ivaChk = document.getElementById('chk_iva');
    var txtBoxIva = document.getElementById('iva');

    if(txtBoxIva.disabled = !ivaChk.checked){
        txtBoxIva.value = "";
    }
    
    
}

function disabledCuentas(){
    var Bien = document.getElementById('radio1');
    var Servicio = document.getElementById('radio2');
    var cuenta_inv = document.getElementById('cuenta_inv');
    var cuenta_cos = document.getElementById('cuenta_cost');

    if(Servicio.checked){
        cuenta_inv.disabled = true;
        cuenta_inv.value = "";
        cuenta_cos.disabled = true;
        cuenta_cos.value = "";
    }

    if(Bien.checked){
        cuenta_inv.disabled = false;
        cuenta_inv.value = "";
        cuenta_cos.disabled = false;
        cuenta_cos.value = "";
    }
}


