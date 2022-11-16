import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import {validar} from "./funciones.js";

const $pase_medico = document.getElementById("pase_medico");
const $mostrar_pase_medico = document.getElementById("mostrar_pase_medico");
const $cierre_pase_medico = document.getElementById("cierre_pase_medico");
const $documento_trabajador = document.getElementById("documento_trabajador");
const $fiebre_A = document.getElementById("fiebre_A");
const $nombre_pase = document.getElementById("nombre_pase");
const $dni_pase = document.getElementById("dni_pase");
const $sangre_pase = document.getElementById("sangre_pase");
const $alergias_pase = document.getElementById("alergias_pase");

$mostrar_pase_medico.onclick = (e) => {
    e.preventDefault();

    fadeIn($pase_medico);
    paseMedico()
    false
}

$cierre_pase_medico.onclick = (e) => {
    e.preventDefault();

    fadeOut($pase_medico);
}


function paseMedico(){
    let data = new FormData();
    //console.log($fiebre_amarilla__d1.value);
    data.append("documento",$documento_trabajador.value);
    data.append("funcion","datosVacunacion");
    fetch('../inc/consultasmedicas.inc.php',{
        method: "POST",
        body:data,
    })
    .then(function(response){
        return response.json();
    })
    .then(dataJson => {
        if (dataJson.respuesta){
            $fiebre_A.value = dataJson.fecha;
        }else{
            mostrarMensaje("Verifique el N°. Documento","msj_error");
        }
    
    });

    let data2 = new FormData();
    data2.append("documento",$documento_trabajador.value);
    data2.append("funcion","listarExamenes");
    fetch('../inc/consultasmedicas.inc.php',{
        method: "POST",
        body:data2,
    })
    .then(function(response){
        return response.json();
    })
    .then(dataJson => {
        if (dataJson.respuesta){
            $nombre_pase.value = dataJson.lista[0].paciente;
            $dni_pase.value = dataJson.lista[0].dni;
            $sangre_pase.value = dataJson.lista[0].sangre;
            $alergias_pase.value = dataJson.lista[0].alergias;
        }else{
            mostrarMensaje("Verifique el N°. Documento","msj_error");
        }
    
    });
}
