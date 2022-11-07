import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import {validar} from "./funciones.js";
//import {listarexamenes} from "./historias";
///esto puede servir para llamar a la funcion de forma mas directa uu
const $subida_vacunas = document.querySelectorAll(".subida_vacunas");
const $ficha_vacunas = document.getElementById("ficha_vacunas");
const $cierre_form_vac = document.getElementById("cierre_form_vac");
const $fecha_vacuna = document.getElementById("fecha_vacuna");
const $subida_imagen = document.getElementById("subida_imagen");
const $envio_vacuna = document.getElementById("envio_vacuna");
const $nombre_vacuna = document.getElementById("nombre_vacuna");

$subida_vacunas.forEach(function($subida_vacunas){
    $subida_vacunas.onclick = (e) => {
        e.preventDefault();

        $nombre_vacuna.value = $subida_vacunas.getAttribute("value");

        fadeIn($ficha_vacunas);

    }
});


$cierre_form_vac.onclick = (e) => {//cierra el formulario para enviar correos
    e.preventDefault();

    fadeOut($ficha_vacunas);

}

/** 
 * Mediante el getAttribute se obtiene un valor diferenciador para el boton que planeamos usar en el envio, esto nos permite poder usar la funcion generica que abre el modal 
 * para todos pero a la vez los hace unicos, este valor se envia a la funcion para que al momento de enviar los datos al php decidida donde va exactamente
 * **/

$envio_vacuna.onclick = (e) => {
    e.preventDefault();

    //fadeOut($ficha_vacunas);

    try {
            //ver a donde se sube U:, dni o algo asi
            //ver la validacion(1 o 0) para la subida de documentos
        if(validar($subida_imagen)) throw "Error";

        const formData = new FormData();
        formData.append('fechaVacunacion',$fecha_vacuna.value);
        formData.append('subidaImagen',$subida_imagen.files[0]);

        switch($nombre_vacuna.value){//probar luego si es necesario el switch case
            case "fiebre amarilla":
                formData.append('validacion',$nombre_vacuna.value);
                break;
            case "difteTet_D1": 
                mostrarMensaje($nombre_vacuna.value,"msj_correct");
                break;
            case "difteTet_D2": 
                mostrarMensaje($nombre_vacuna.value,"msj_correct");
                break;
            case "difteTet_D3": 
                mostrarMensaje($nombre_vacuna.value,"msj_correct");
                break;
            default:
                mostrarMensaje("no xc","msj_error")
                break;
        }

        fetch("../inc/subirImagen.inc.php",{
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