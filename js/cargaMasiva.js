import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import {validar} from "./funciones.js";
//import {listarexamenes} from "./historias";

const $subida_vacunas = document.getElementById("subida_vacunas");
const $ficha_vacunas = document.getElementById("ficha_vacunas");
const $cierre_form_vac = document.getElementById("cierre_form_vac");
const $fecha_vacuna = document.getElementById("fecha_vacuna");
const $subida_imagen = document.getElementById("subida_imagen");
const $envio_vacuna = document.getElementById("envio_vacuna");

$subida_vacunas.onclick = (e) => {
    e.preventDefault();

    fadeIn($ficha_vacunas);

    return false;
}

$cierre_form_vac.onclick = (e) => {//cierra el formulario para enviar correos
    e.preventDefault();

    fadeOut($ficha_vacunas);

}

$envio_vacuna.onchange = (e) => {
    e.preventDefault();

    try {
        if(validar($subida_imagen)) throw "Error";

        const formData = new FormData();
        formData.append('fechaVacunacion',$fecha_vacuna.value);
        formData.append('subidaImagen',$subida_imagen.value);
        fetch("../inc/.inc.php",{
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.respuesta) {
                mostrarMensaje("Documento subido","msj_correct");
            }else{
                mostrarMensaje("Hubo un error al subir el archivo","msj_error");
            }
        })
        .catch(error => {
            console.error(error);
        })
    } catch (error) {
        
    }
}