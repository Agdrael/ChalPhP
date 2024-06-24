function Nacionalidad(){
    var otro = document.getElementById('nacionalidad').value;
    var txtnacionalidad = document.getElementById('n_pais');

    if(otro == "otro")
        txtnacionalidad.disabled = false;
    else
        txtnacionalidad.disabled = true;
}

document.addEventListener('DOMContentLoaded', function (){
    document.getElementById('guardar_proveedor').addEventListener('click',function(){
        var razon_social = document.getElementById('razon_social').value;
        var nombre_comercial = document.getElementById('nombre_comercial').value;
        var contacto = document.getElementById('contacto').value;
        var nacionalidad = document.getElementById('nacionalidad').value;
        if(nacionalidad == "otro"){
            nacionalidad = document.getElementById('n_pais').value;
        }
        var domiciliado = document.querySelector('input[name="Domiciliado"]:checked');
        var direccion = document.getElementById('direccion').value;
        var departamento = document.getElementById('departamento').value;
        var municipio = document.getElementById('municipio').value;
        var act_economica = document.getElementById('act_economica').value;
        var telefono = document.getElementById('telefono').value;
        var tele2 = document.getElementById('telefono2').value;
        var telefono2 = "Na";
        if(tele2){
           telefono2 = tele2.value ;
        }
        var NIT = document.getElementById('NIT').value;
        var Dui = document.getElementById('Dui').value;
        var R_fiscal = document.getElementById('R_fiscal').value;
        var Giro = document.getElementById('Giro').value;
        var Cuenta = document.getElementById('Cuenta').value;
        var Tamaño = document.querySelector('input[name="Tamaño"]:checked');

        const data ={
            accion: 1,
            razon_social: razon_social,
            nombre_comercial: nombre_comercial,
            contacto: contacto,
            nacionalidad: nacionalidad,
            domiciliado: domiciliado,
            direccion: direccion,
            departamento: departamento,
            municipio: municipio,
            act_economica: act_economica,
            telefono: telefono,
            telefono2: telefono2,
            NIT: NIT,
            Dui: Dui,
            R_fiscal: R_fiscal,
            Giro: Giro,
            Cuenta: Cuenta,
            Tamaño: Tamaño
        }

        fetch('../M/Modelos_punto_venta/ModeloProveedor.php',{
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