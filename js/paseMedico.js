import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import {validar} from "./funciones.js";

const $pase_medico = document.getElementById("pase_medico");
const $mostrar_pase_medico = document.getElementById("mostrar_pase_medico");
const $cierre_pase_medico = document.getElementById("cierre_pase_medico");

$mostrar_pase_medico.onclick = (e) => {
    e.preventDefault();

    fadeIn($pase_medico);
    
    false
}

$cierre_pase_medico.onclick = (e) => {
    e.preventDefault();

    fadeOut($pase_medico);
}

