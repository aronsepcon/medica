import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import {validar} from "./funciones.js";
//import {listarexamenes} from "./historias";
///esto puede servir para llamar a la funcion de forma mas directa uu
const $documento_trabajador = document.getElementById('documento_trabajador');
const $subida_vacunas = document.querySelectorAll(".subida_vacunas");
const $ficha_vacunas = document.getElementById("ficha_vacunas");
const $cierre_form_vac = document.getElementById("cierre_form_vac");
const $fecha_vacuna = document.getElementById("fecha_vacuna");
const $subida_imagen = document.getElementById("subida_imagen");
const $envio_vacuna = document.getElementById("envio_vacuna");
const $nombre_vacuna = document.getElementById("nombre_vacuna");

const $fiebre_amarilla__d1 = document.getElementById("fiebre_amarilla__d1");
const $difteria__d1 = document.getElementById("fiebre__d1");
const $difteria__d2 = document.getElementById("fiebre__d2");
const $difteria__d3 = document.getElementById("fiebre__d3");


const $cierre_form_vp_vac = document.getElementById("cierre_form_vp_vac");
const $ficha__vistaprevia_vac = document.getElementById("ficha__vistaprevia_vac");
//const $vista_previa_vac = document.querySelectorAll(".vista_previa_vac");
const $vista_previa_vac = document.getElementById(".vista_previa_vac");
const $frame__adjunto_vac = document.getElementById("frame__adjunto_vac");


$subida_vacunas.forEach(function($subida_vacunas){
    $subida_vacunas.onclick = (e) => {
        e.preventDefault();

        $nombre_vacuna.value = $subida_vacunas.getAttribute("value");

        fadeIn($ficha_vacunas);
        return false;
    }
});
/*
$vista_previa_vac.forEach(function($vista_previa_vac){
    $vista_previa_vac.onclick = (e) => {
        e.preventDefault();

        fadeIn($ficha__vistaprevia_vac);
    }
});
*//*
$vista_previa_vac.onclick = (e) => {
    e.preventDefault();

    fadeIn($ficha__vistaprevia_vac);
}*/ 

$cierre_form_vp_vac.onclick = (e) => {
    e.preventDefault();

    fadeOut($ficha__vistaprevia_vac);
}


$cierre_form_vac.onclick = (e) => {//cierra el formulario para enviar correos
    e.preventDefault();

    fadeOut($ficha_vacunas);

}

/** 
 * Mediante el getAttribute se obtiene un valor diferenciador para el boton que planeamos usar en el envio, 
 * esto nos permite poder usar la funcion generica que abre el modal para todos pero a la vez los hace unicos,
 * este valor se envia a la funcion para que al momento de enviar los datos al php decidida donde va exactamente
 * **/

$envio_vacuna.onclick = (e) => {
    e.preventDefault();

    // mostrarMensaje($subida_imagen.files[0],"msj_correct");
    //fadeOut($ficha_vacunas);
    var fecha1 = $fecha_vacuna.value;
    var documento = $documento_trabajador.value;
    var tipovacuna = $nombre_vacuna.value;

    if($subida_imagen.files && $subida_imagen.files[0])
        console.log("archivo seleccionado:",$subida_imagen.files[0]);    

    try {
            //ver a donde se sube U:, dni o algo asi
            //ver la validacion(1 o 0) para la subida de documentos
        fadeOut($ficha_vacunas);
        
        if(validar($subida_imagen)) throw "Error";

        const formData = new FormData();
        formData.append('fechaVacunacion',fecha1);
        formData.append('subidaImagen',$subida_imagen.files[0]);//es el envio del documento
        formData.append('documento',documento)
        formData.append('validacion',tipovacuna);

        fetch("../inc/subirImagen.inc.php",{
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.respuesta) {
                mostrarMensaje("Documento subido","msj_correct");
                listarVacunas();
                validacion();//ver aqui luego
            }else{
                mostrarMensaje("Hubo un error al subir el archivo","msj_error");
            }
        })
        .catch(error => {
            console.error(error);
        })
        
    } catch (error) {
        mostrarMensaje(error,"msj_error");  
    }

}

export function listarVacunas(){
    let data = new FormData();
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
          $fiebre_amarilla__d1.value = dataJson.fecha;
          $difteria__d1.value = dataJson.fechaDTD1;
          $difteria__d2.value = dataJson.fechaDTD2;
          $difteria__d3.value = dataJson.fechaDTD3;
        }else{
            mostrarMensaje("Verifique el N°. Documento","msj_error");
        }
    })
}

function validacion(){
    if($fiebre_amarilla__d1.value!==null){
        document.getElementById("fiebre_amarilla__cnf").innerHTML = "INMUNIZADO"
    }
}