function CrearCuenta(){
    var codigo = document.getElementById('codigo_cuenta').value="";
    var cuenta = document.getElementById('tipo_cuenta').value="";
    var value = document.getElementById('descripcion').value="";
    var r1 = document.getElementById('radio1');
    var r2 = document.getElementById('radio2').checked = false;

    r1.checked = false;
    r2.checked = false;
    let array =[codigo,cuenta,value];
    array.forEach(habilitar);

}

function habilitar(item){
    item.readonly = false;
}