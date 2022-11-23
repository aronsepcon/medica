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
const $enviar_pase = document.getElementById("enviar_pase_medico");
const $numero_pase = document.getElementById("numero_pase");
const $fecha_emo = document.getElementById("fecha_emo");
const $fecha_vigencia = document.getElementById("fecha_vigencia");

$mostrar_pase_medico.onclick = (e) => {
    e.preventDefault();

    fadeIn($pase_medico);
    //paseMedico()
    return false;
}

$cierre_pase_medico.onclick = (e) => {
    e.preventDefault();

    fadeOut($pase_medico);
}

$enviar_pase.onclick = (e) => {
    e.preventDefault();
    if($numero_pase.value=="" && $fecha_vigencia.value==""){
        mostrarMensaje("Ingrese una fecha o codigo de pase","msj_error");
    }else{
        enviarPase();
    }
}

export function paseMedico(){
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
            //validar tipo de examen ---->  dataJson.lista[0].tipo;
            $fecha_emo.value = dataJson.lista[0].fecha_emo;
        }else{
            mostrarMensaje("Verifique el N°. Documento","msj_error");
        }
    
    });

    let data3 = new FormData();
    data3.append("documento",$documento_trabajador.value);
    data3.append("funcion","listarPases");
    fetch('../inc/consultasmedicas.inc.php',{
        method: "POST",
        body:data3,
    })
    .then(function(response){
        return response.json();
    })
    .then(dataJson => {
        if (dataJson.respuesta){
            $numero_pase.value=dataJson.lista[0].numero_pase;
            $fecha_vigencia.value=dataJson.lista[0].fecha_vigencia;
        }
        else{
            $numero_pase.value="";
            $fecha_vigencia.value="";
        }
    });   
}

function enviarPase(){
    let data = new FormData();
    data.append("num_pase", $numero_pase.value);
    data.append("nombre", $nombre_pase.value);
    data.append("documento", $dni_pase.value);
    data.append("grupo_sangre", $sangre_pase.value );
    data.append("alergias", $alergias_pase.value);
    data.append("fecha_emo",$fecha_emo.value);
    data.append("fecha_vigencia",$fecha_vigencia.value);
    data.append("funcion","enviarPase");
    fetch('../inc/consultasmedicas.inc.php',{
        method:"POST",
        body:data,
    })
    .then(function(response){
        return response.json();
    })  
    .then(dataJson => {
        if (dataJson.respuesta){
            mostrarMensaje("Se ha agregado el pase medico","msj_correct");
        }
        else{
            mostrarMensaje("Verifique el N°. Documento","msj_error");
        }
    }

    )
}