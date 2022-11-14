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
const $difteria__r1 = document.getElementById("fiebre__r1");
const $difteria__r2 = document.getElementById("fiebre__r2");

const $hepatitis_A__d1 = document.getElementById("hepatitis_A__d1");
const $hepatitis_A__d2 = document.getElementById("hepatitis_A__d2");
const $hepatitis_A__r1 = document.getElementById("hepatitis_A__r1");
const $hepatitis_A__r2 = document.getElementById("hepatitis_A__r2");

const $hepatitis_B__d1 = document.getElementById("hepatitis_B__d1");
const $hepatitis_B__d2 = document.getElementById("hepatitis_B__d2");
const $hepatitis_B__d3 = document.getElementById("hepatitis_B__d3");

const $influenza__r1 = document.getElementById("influenza__r1");
const $influenza__r2 = document.getElementById("influenza__r2");

const $poliomelitis__d1 = document.getElementById("poliomelitis__d1");
const $trivirica__d1 = document.getElementById("trivirica__d1");

const $rabia__d1 = document.getElementById("rabia__d1");
const $rabia__d2 = document.getElementById("rabia__d2");
const $rabia__d3 = document.getElementById("rabia__d3");
const $rabia__r1 = document.getElementById("rabia__r1");
const $rabia__r2 = document.getElementById("rabia__r2");

const $tifoidea__r1 = document.getElementById("tifoidea__r1");
const $tifoidea__r2 = document.getElementById("tifoidea__r2");

const $neumococo__r1 = document.getElementById("neumococo__r1");
const $neumococo__r2 = document.getElementById("neumococo__r2");

const $covid__d1 = document.getElementById("covid__d1");
const $covid__d2 = document.getElementById("covid__d2");
const $covid__d3 = document.getElementById("covid__d3");
const $covid__d4 = document.getElementById("covid__d4");

const $validacion_Fiebre_Amar=document.getElementById("fiebre_amarilla__cnf")

const $cierre_form_vp_vac = document.getElementById("cierre_form_vp_vac");
const $ficha__vistaprevia_vac = document.getElementById("ficha__vistaprevia_vac");
const $vista_previa_vac = document.querySelectorAll(".vista_previa_vac");
//const $vista_previa_vac = document.getElementById("vista_previa_vac");
const $frame__adjunto_vac = document.getElementById("frame__adjunto_vac");
const $display_image = document.getElementById("imagen");


$subida_vacunas.forEach(function($subida_vacunas){
    $subida_vacunas.onclick = (e) => {
        e.preventDefault();

        $nombre_vacuna.value = $subida_vacunas.getAttribute("value");

        fadeIn($ficha_vacunas);
        return false;
    }
});

$cierre_form_vp_vac.onclick = (e) => {
    e.preventDefault();

    fadeOut($ficha__vistaprevia_vac);
}

$vista_previa_vac.forEach(function($vista_previa_vac){
    $vista_previa_vac.onclick = (e) => {
        e.preventDefault();

        mostrarImagen($vista_previa_vac.getAttribute("value"));
        
        return false;
    }
});

function mostrarImagen($value){
    try {     
        const data = new FormData();
        data.append('documento', $documento_trabajador.value);
        data.append('validacion',$value);//sino se define se pasa como un null y da error
        data.append('funcion','buscarImagen');
        fetch('../inc/consultasmedicas.inc.php',{
            method: "POST",
            body:data,
        })
        .then(response => response.json())
        .then(dataJson => {
            if (dataJson.respuesta){
                $display_image.src = "../vacunas/"+dataJson.imagen;
                console.log(dataJson.imagen);    
                fadeIn($ficha__vistaprevia_vac);
                //q valide un switch case con $value y luego en la funcion ver si el siguiente adjunto existe
                //sino darle estilo, cursiva para la fecha--- ver si aplica algo mas
            }else{
                mostrarMensaje("No hay imagen","msj_error");
            }
        })

    } catch (error) {
        mostrarMensaje(error,"msj_error");  
    }
       
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
                listarVacunas();
                mostrarMensaje("Documento subido","msj_correct");
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
    console.log($fiebre_amarilla__d1.value);
    validacion();
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
          $difteria__r1.value =  dataJson.fechaDTR1;
          $difteria__r2.value =  dataJson.fechaDTR2;

          $hepatitis_A__d1.value =  dataJson.fechaHAD1;
          $hepatitis_A__d2.value =  dataJson.fechaHAD2;
          $hepatitis_A__r1.value =  dataJson.fechaHAR1;
          $hepatitis_A__r2.value =  dataJson.fechaHAR2;

          $hepatitis_B__d1.value =  dataJson.fechaHBD1;
          $hepatitis_B__d2.value =  dataJson.fechaHBD2;
          $hepatitis_B__d3.value = dataJson.fechaHBD3;

          $influenza__r1.value =  dataJson.fechaIFR1;
          $influenza__r2.value =  dataJson.fechaIFR2;

          $poliomelitis__d1.value =  dataJson.fechaPLD1;
          $trivirica__d1.value =  dataJson.fechaTVD1;

          $rabia__d1.value =  dataJson.fechaRBD1;
          $rabia__d2.value =  dataJson.fechaRBD2;
          $rabia__d3.value =  dataJson.fechaRBD3;
          $rabia__r1.value =  dataJson.fechaRBR1;
          $rabia__r2.value =  dataJson.fechaRBR2;

          $tifoidea__r1.value =  dataJson.fechaTFR1;
          $tifoidea__r2.value =  dataJson.fechaTFR2;

          $neumococo__r1.value =  dataJson.fechaNMR1;
          $neumococo__r2.value =  dataJson.fechaNMR2;

          $covid__d1.value =  dataJson.fechaCVD1;
          $covid__d2.value =  dataJson.fechaCVD2;
          $covid__d3.value =  dataJson.fechaCVD3;
          $covid__d4.value =  dataJson.fechaCVD4;

        }else{
            mostrarMensaje("Verifique el N°. Documento","msj_error");
        }
    })
}

function validacion(){
    if($fiebre_amarilla__d1.value!==""){
        $validacion_Fiebre_Amar.value = "INMUNIZADO"
    }else{
        $validacion_Fiebre_Amar.value = "SIN INMUNIZAR";
    }
    
}