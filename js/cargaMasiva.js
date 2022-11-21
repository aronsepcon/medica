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

const $validacion_Fiebre_Amar=document.getElementById("fiebre_amarilla__cnf");
const $hepatitis_B__r1 = document.getElementById("hepatitis_B__r1");
const $poliomelitis__r1 = document.getElementById("poliomelitis__r1");
const $trivirica__r1 = document.getElementById("trivirica__r1");
const $validarInmunidad = document.querySelectorAll(".validarInmunidad");
const $fecha_vac = document.querySelectorAll(".fecha_vac");
const $icono_subida = document.querySelectorAll(".fas fa-upload");

//fas fa-eye

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
    limpiar()
}

function limpiar(){
    $fecha_vacuna.value = "";
    $subida_imagen.value = "";
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
        
        if(validar($subida_imagen) || fecha1=="") throw "Error de subida";

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
                limpiar();
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

    let formData = new FormData();
    formData.append("documento",$documento_trabajador.value);
    formData.append("funcion","crearDatosVac");
    //console.log($documento_trabajador.value);
    fetch('../inc/consultasmedicas.inc.php',{
        method: "POST",
        body:formData,
    });
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

          $fiebre_amarilla__d1.value = dataJson.fecha;

          if($fiebre_amarilla__d1.value!==""){
            $validacion_Fiebre_Amar.value = "INMUNIZADO"
          }else{
            $validacion_Fiebre_Amar.value = "SIN INMUNIZAR";
          }

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

          if($hepatitis_B__d3.value!==""){
            $hepatitis_B__r1.value = "INMUNIZADO"
          }else{
            $hepatitis_B__r1.value = "SIN INMUNIZAR";
          }

          $influenza__r1.value =  dataJson.fechaIFR1;
          $influenza__r2.value =  dataJson.fechaIFR2;

          $poliomelitis__d1.value =  dataJson.fechaPLD1;
          $trivirica__d1.value =  dataJson.fechaTVD1;
          
          if($poliomelitis__d1.value!==""){
            $poliomelitis__r1.value = "INMUNIZADO"
          }else{
            $poliomelitis__r1.value = "SIN INMUNIZAR";
          }

          if($trivirica__d1.value!==""){
            $trivirica__r1.value = "INMUNIZADO"
          }else{
            $trivirica__r1.value = "SIN INMUNIZAR";
          }

          $validarInmunidad.forEach(function($validarInmunidad){
            if($validarInmunidad.value=="INMUNIZADO"){
                $validarInmunidad.style.color = "green";
            }
            else{
                $validarInmunidad.style.color = "red";
            }
          });
          /*$vista_previa_vac.forEach(function($vista_previa_vac){
            

          });*/

            if(dataJson.adjuntoFbrAmarilla!=null){
                document.getElementById("icono_fbra").style.color="green";
            }else{
                document.getElementById("icono_fbra").style.color="";
            }
            if(dataJson.adjuntoDifTD1!=null){
                document.getElementById("icono_dt_d1").style.color="green";
            }else{
                document.getElementById("icono_dt_d1").style.color="";
            }

            if(dataJson.adjuntoDifTD2!=null){
                document.getElementById("icono_dt_d2").style.color="green";
                $difteria__d2.style.fontStyle="";
                $difteria__d2.style.fontWeight = "";
            }
            else if(dataJson.adjuntoDifTD2==null && $difteria__d2.value!=""){
                document.getElementById("icono_dt_d3").style.color="";
                $difteria__d2.style.fontStyle="italic";
                $difteria__d2.style.fontWeight = "bold";
            }
            else{
                document.getElementById("icono_dt_d2").style.color="";
                $difteria__d2.style.fontStyle="";
                $difteria__d2.style.fontWeight = "";
            }
            
            if(dataJson.adjuntoDifTD3!=null){
                document.getElementById("icono_dt_d3").style.color="green";
                $difteria__d3.style.fontStyle="";
                $difteria__d3.style.fontWeight = "";
            } 
            else if(dataJson.adjuntoDifTD3==null && $difteria__d3.value!=""){
                document.getElementById("icono_dt_d3").style.color="";
                $difteria__d3.style.fontStyle="italic";
                $difteria__d3.style.fontWeight = "bold";
            }
            else{
                document.getElementById("icono_dt_d3").style.color="";
                $difteria__d3.style.fontStyle="";
                $difteria__d3.style.fontWeight = "";
            }

            if(dataJson.adjuntoDifTR1!=null){
                document.getElementById("icono_dt_r1").style.color="green";
                $difteria__r1.style.fontStyle="";
                $difteria__r1.style.fontWeight = "";
            }
            else if(dataJson.adjuntoDifTR1==null && $difteria__r1.value!=""){
                document.getElementById("icono_dt_r1").style.color="";
                $difteria__r1.style.fontStyle="italic";
                $difteria__r1.style.fontWeight = "bold";
            }
            else{
                document.getElementById("icono_dt_r1").style.color="";
                $difteria__r1.style.fontStyle="";
                $difteria__r1.style.fontWeight = "";
            }
            
            if(dataJson.adjuntoHepAD1!=null){
                document.getElementById("icono_ha_d1").style.color="green";
            }else{
                document.getElementById("icono_ha_d1").style.color="";

            }

            if(dataJson.adjuntoHepAD2!=null && $hepatitis_A__d2.value!=""){
                document.getElementById("icono_ha_d2").style.color="green";
                $hepatitis_A__d2.style.fontStyle="";
                $hepatitis_A__d2.style.fontWeight = "";
            }
            else if(dataJson.adjuntoHepAD2==null && $hepatitis_A__d2.value!=""){
                document.getElementById("icono_ha_d2").style.color="";
                $hepatitis_A__d2.style.fontStyle="italic";
                $hepatitis_A__d2.style.fontWeight = "bold";
            }
            else{
                document.getElementById("icono_ha_d2").style.color="";
                $hepatitis_A__d2.style.fontStyle="";
                $hepatitis_A__d2.style.fontWeight = "";
            }

            if(dataJson.adjuntoHepAR1!=null && $hepatitis_A__r1.value!=""){
                document.getElementById("icono_ha_r1").style.color="green";
                $hepatitis_A__r1.style.fontStyle="";
                $hepatitis_A__r1.style.fontWeight = "";
            }
            else if(dataJson.adjuntoHepAR1==null && $hepatitis_A__r1.value!=""){
                document.getElementById("icono_ha_r1").style.color="";
                $hepatitis_A__r1.style.fontStyle="italic";
                $hepatitis_A__r1.style.fontWeight = "bold";
            }else{
                document.getElementById("icono_ha_r1").style.color="";
                $hepatitis_A__r1.style.fontStyle="";
                $hepatitis_A__r1.style.fontWeight = "";
            }

            if(dataJson.adjuntoHepBD1!=null){
                document.getElementById("icono_hb_d1").style.color="green";
            }else{
                document.getElementById("icono_hb_d1").style.color="";
            }

            if(dataJson.adjuntoHepBD2!=null && $hepatitis_B__d2.value!=""){
                document.getElementById("icono_hb_d2").style.color="green";
                $hepatitis_B__d2.style.fontStyle="";
                $hepatitis_B__d2.style.fontWeight = "";
            }
            else if(dataJson.adjuntoHepBD2==null && $hepatitis_B__d2.value!=""){
                document.getElementById("icono_hb_d2").style.color="";
                $hepatitis_B__d2.style.fontStyle="italic";
                $hepatitis_B__d2.style.fontWeight = "bold";
            }
            else{
                document.getElementById("icono_hb_d2").style.color="";
                $hepatitis_B__d2.style.fontStyle="";
                $hepatitis_B__d2.style.fontWeight = "";
            }
            
            if(dataJson.adjuntoHepBD3!=null && $hepatitis_B__d3.value!=""){
                document.getElementById("icono_hb_d3").style.color="green";
                $hepatitis_B__d3.style.fontStyle="";
                $hepatitis_B__d3.style.fontWeight = "";
            } 
            else if(dataJson.adjuntoHepBD3==null && $hepatitis_B__d3.value!=""){
                document.getElementById("icono_hb_d3").style.color="";
                $hepatitis_B__d3.style.fontStyle="italic";
                $hepatitis_B__d3.style.fontWeight = "bold";
            }
            else{
                document.getElementById("icono_hb_d3").style.color="";
                $hepatitis_B__d3.style.fontStyle="";
                $hepatitis_B__d3.style.fontWeight = "";
            }

            if(dataJson.adjuntoInflR1!=null){
                document.getElementById("icono_if_r1").style.color="green";
            }else{
                document.getElementById("icono_if_r1").style.color="";
            }

            if(dataJson.adjuntoPolioD1!=null){
                document.getElementById("icono_pl_r1").style.color="green";
            }else{
                document.getElementById("icono_pl_r1").style.color="";
            }

            if(dataJson.adjuntoTrivD1!=null){
                document.getElementById("icono_tv_r1").style.color="green";
            }else{
                document.getElementById("icono_tv_r1").style.color="";
            }
            if(dataJson.adjuntoRabD1!=null){
                document.getElementById("icono_rb_d1").style.color="green";
            }else{
                document.getElementById("icono_rb_d1").style.color="";
            }
            
            if(dataJson.adjuntoRabD2!=null && $rabia__d2.value!=""){
                document.getElementById("icono_rb_d2").style.color="green";
                $rabia__d2.style.fontStyle="";
                $rabia__d2.style.fontWeight = "";
            }
            else if(dataJson.adjuntoRabD2==null && $rabia__d2.value!=""){
                document.getElementById("icono_rb_d2").style.color="";
                $rabia__d2.style.fontStyle="italic";
                $rabia__d2.style.fontWeight = "bold";
            }
            else{
                document.getElementById("icono_rb_d2").style.color="";
                $rabia__d2.style.fontStyle="";
                $rabia__d2.style.fontWeight = "";
            }

            if(dataJson.adjuntoRabD3!=null  && $rabia__d3.value!=""){
                document.getElementById("icono_rb_d3").style.color="green";
                $rabia__d3.style.fontStyle="";
                $rabia__d3.style.fontWeight = "";
            }
            else if(dataJson.adjuntoRabD3==null && $rabia__d3.value!=""){
                document.getElementById("icono_rb_d3").style.color="";
                $rabia__d3.style.fontStyle="italic";
                $rabia__d3.style.fontWeight = "bold";
            }
            else{
                document.getElementById("icono_rb_d3").style.color="";
                $rabia__d3.style.fontStyle="";
                $rabia__d3.style.fontWeight = "";
            }
            
            if(dataJson.adjuntoRabR1!=null  && $rabia__r1.value!=""){
                document.getElementById("icono_rb_r1").style.color="green"; 
                $rabia__r1.style.fontStyle="";
                $rabia__r1.style.fontWeight = "";
            }
            else if(dataJson.adjuntoRabR1==null && $rabia__r1.value!=""){
                document.getElementById("icono_rb_r1").style.color="";
                $rabia__r1.style.fontStyle="italic";
                $rabia__r1.style.fontWeight = "bold";
            }
            else{
                document.getElementById("icono_rb_r1").style.color="";
                $rabia__r1.style.fontStyle="";
                $rabia__r1.style.fontWeight = "";
            }

            if(dataJson.adjuntoTifoR1!=null){
                document.getElementById("icono_tf_r1").style.color="green";
            }else{
                document.getElementById("icono_tf_r1").style.color="";
            }
            if(dataJson.adjuntoNeumR1!=null){
                document.getElementById("icono_nm_r1").style.color="green";
            }else{
                document.getElementById("icono_nm_r1").style.color="";
            }
            
            if(dataJson.adjuntoCovidD1!=null){
                document.getElementById("icono_cv_d1").style.color="green";
            }else{
                document.getElementById("icono_cv_d1").style.color="";
            }

            if(dataJson.adjuntoCovidD2!=null && $covid__d2.value!=""){
                document.getElementById("icono_cv_d2").style.color="green"; 
                $covid__d2.style.fontStyle="";
                $covid__d2.style.fontWeight = "";
            }
            else if(dataJson.adjuntoCovidD2==null && $covid__d2.value!=""){
                document.getElementById("icono_cv_d2").style.color="";
                $covid__d2.style.fontStyle="italic";
                $covid__d2.style.fontWeight = "bold";
            }
            else{
                document.getElementById("icono_cv_d2").style.color="";
                $covid__d2.style.fontStyle="";
                $covid__d2.style.fontWeight = "";
            }
            if(dataJson.adjuntoCovidD3!=null && $covid__d3.value!=""){
                document.getElementById("icono_cv_d3").style.color="green";
                $covid__d3.style.fontStyle="";
                $covid__d3.style.fontWeight = "";
            }
            else if(dataJson.adjuntoCovidD3==null && $covid__d3.value!=""){
                document.getElementById("icono_cv_d3").style.color="";
                $covid__d3.style.fontStyle="italic";
                $covid__d3.style.fontWeight = "bold";
            }
            else{
                document.getElementById("icono_cv_d3").style.color="";
                $covid__d3.style.fontStyle="";
                $covid__d3.style.fontWeight = "";
            } 
            if(dataJson.adjuntoCovidD4!=null && $covid__d4.value!=""){
                document.getElementById("icono_cv_d4").style.color="green";
                $covid__d4.style.fontStyle="";
                $covid__d4.style.fontWeight = "";
            }else if(dataJson.adjuntoCovidD4==null && $covid__d4.value!=""){
                document.getElementById("icono_cv_d4").style.color="";
                $covid__d4.style.fontStyle="italic";
                $covid__d4.style.fontWeight = "bold";
            }else{
                document.getElementById("icono_cv_d4").style.color="";
                $covid__d4.style.fontStyle="";
                $covid__d4.style.fontWeight = "";
            }


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
   
    
}