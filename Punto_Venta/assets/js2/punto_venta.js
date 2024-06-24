

//Form productos
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

//proveedor









