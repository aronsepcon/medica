import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";

const $historias = document.getElementById('historias');
const $loader = document.getElementById('main__loader');
const $ficha__historias = document.getElementById('ficha__historias');
const $ficha__cargar = document.getElementById('ficha__cargar');
const $configuracion = document.getElementById('configuracion');
const $modal__esperar = document.getElementById('modal__esperar');
const $permisos = document.getElementById('permisos1');
const $permisos_panel = document.getElementById('permisos_panel');
const $cargar__estadisticas = document.getElementById('cargar__estadisticas');
const $estadisticas = document.getElementById('estadisticas');


$historias.onclick =(e) => {
    e.preventDefault();

    fadeIn($ficha__historias);
    fadeOut($cargar__estadisticas);

    return false;
}

$estadisticas.onclick = (e) => {
    e.preventDefault();

    fadeIn($cargar__estadisticas);
    fadeOut($ficha__cargar);
    fadeOut($ficha__historias);
    fadeOut($permisos_panel);

    return false;
}

$configuracion.onclick =(e) => {
    e.preventDefault();

    $ficha__historias.style.display = "none";

    fadeIn($ficha__cargar);

    return false;
}

$permisos.onclick = (e) => {
    e.preventDefault();

    //$permisos_panel.display = "block";
    fadeOut($ficha__cargar);
    fadeOut($cargar__estadisticas);
    fadeOut($ficha__historias);
    fadeIn($permisos_panel);

    return false;   
}