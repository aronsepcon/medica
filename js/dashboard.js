import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";

const $historias = document.getElementById('historias');
const $loader = document.getElementById('main__loader');
const $ficha__historias = document.getElementById('ficha__historias');
const $ficha__cargar = document.getElementById('ficha__cargar');
const $configuracion = document.getElementById('configuracion');
const $modal__esperar = document.getElementById('modal__esperar');




$historias.onclick =(e) => {
    e.preventDefault();

    fadeIn($ficha__historias);

    return false;
}

$configuracion.onclick =(e) => {
    e.preventDefault();

    $ficha__historias.style.display = "none";

    fadeIn($ficha__cargar);

    return false;
}