import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import {validar} from "./funciones.js";

const $buscar_acceso = document.getElementById('buscar_acceso');
const $nombre_acceso = document.getElementById("nombre_acceso");
const $dar_acceso = document.getElementById('dar_acceso');
const $elegir_acceso = document.getElementById('elegir_acceso');
const $nombre_terceros = document.getElementById('nombre_terceros');
const $ruc_terceros = document.getElementById('ruc_terceros');
const $registrar_terceros = document.getElementById('registrar_terceros');
const $opcionUsuarios = document.getElementById('opcionUsuarios');
const $opcionTerceros = document.getElementById('opcionTerceros');
const $acceso1 = document.getElementById('acceso1');
const $acceso2 = document.getElementById('acceso2');

$opcionUsuarios.onclick = (e) => {
    e.preventDefault();
    document.querySelectorAll(".historias__vertical__menu a").forEach(el => {
        el.classList.remove('resaltado');
    });

    document.querySelectorAll(".accesos").forEach(el => {
        el.classList.add('oculto');
    })

    $opcionUsuarios.classList.add('resaltado');
    $acceso1.classList.remove('oculto');
}

$opcionTerceros.onclick = (e) => {
    e.preventDefault();
    document.querySelectorAll(".historias__vertical__menu a").forEach(el => {
        el.classList.remove('resaltado');
    });

    document.querySelectorAll(".accesos").forEach(el => {
        el.classList.add('oculto');
    })

    $opcionTerceros.classList.add('resaltado');
    $acceso2.classList.remove('oculto');
}

$buscar_acceso.onkeydown = (e) =>{
    var keycode = e.keyCode || e.which;
    if (keycode == 13) {
        try {
            if($buscar_acceso.value=="") throw "Ingrese un valor";
            buscarAcceso(e.target.value);
        } catch (error) {
            mostrarMensaje(error,"msj_error");
        }
    }
}

function buscarAcceso($e){
    let data = new FormData();
    data.append("documento",$e);
    data.append("funcion","datosColaborador");
    fetch('../inc/consultasrrhh.inc.php',{
        method: "POST",
        body:data,
    })
    .then(function(response){
        return response.json();
    })
    .then(dataJson => {
        if (dataJson.respuesta){
          $nombre_acceso.value = dataJson.nombres;
          //  $estado__trabajador.value = dataJson.estado;
        }else{
            mostrarMensaje("Verifique el N°. Documento","msj_error");
        }
    })
}

$dar_acceso.onclick = (e) => {
    e.preventDefault();

    if($buscar_acceso.value == "" && $nombre_acceso.value == ""){
        mostrarMensaje("Ingrese un valor","msj_error");
    }else{ 
        //mostrarMensaje($elegir_acceso.value,"msj_error");
        try {
            let data = new FormData();
            data.append("documento",$buscar_acceso.value);
            data.append("acceso",$elegir_acceso.value)
            data.append("funcion","modificarAcceso");
            fetch('../inc/consultasrrhh.inc.php',{
                method: "POST",
                body:data,
            })
            .then(function(response){
                return response.json();
            })
            .then(dataJson => {
                if (dataJson.respuesta){
                    $buscar_acceso.value="";
                    $nombre_acceso.value="";
                    mostrarMensaje("Se ha modificado el acceso","msj_correct");
                }
                else{
                    mostrarMensaje("Verifique el N°. Documento","msj_error");
                }
            })
        } catch (error) {
            mostrarMensaje(error,"msj_error");
        }
    }
}

$registrar_terceros.onclick = (e) => {
    e.preventDefault();

    try {
        let formData = new FormData();
        formData.append("ruc",$ruc_terceros.value);
        formData.append("nombre",$nombre_terceros.value);
        formData.append("funcion","registrarTerceros");
        fetch('../inc/consultasmedicas.inc.php',{
            method: "POST",
            body:formData,
        })
        .then(function(response){
            return response.json();
        })
        .then(dataJson => {
            if (dataJson.respuesta){
                mostrarMensaje("Se ha Registrado el RUC","msj_correct");
            }
            else{
                mostrarMensaje("Hubo un problema","msj_error");
            }
        })
    } catch (error) {
        mostrarMensaje(error,"msj_error");
    }
}