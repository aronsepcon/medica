import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import {validar} from "./funciones.js";
import {paseMedico} from "./historias.js";

const $pase_medico = document.getElementById("pase_medico");
const $mostrar_pase_medico = document.getElementById("mostrar_pase_medico");
const $cierre_pase_medico = document.getElementById("cierre_pase_medico");

const $documento_trabajador = document.getElementById("documento_trabajador");
const $fiebre_A = document.getElementById("fiebre_A");

const $id_pase = document.getElementById("id_pase");
const $nomb_adjunto = document.getElementById("nomb_adjunto");
const $lote_pase = document.getElementById("lote_pase");
const $obs_pase = document.getElementById("obs_pase");
const $nombre_pase = document.getElementById("nombre_pase");
const $dni_pase = document.getElementById("dni_pase");
const $sangre_pase = document.getElementById("sangre_pase");
const $alergias_pase = document.getElementById("alergias_pase");
const $lote56 = document.getElementById("lote56");
const $lote88 = document.getElementById("lote88");
const $pisco = document.getElementById("pisco");
const $enviar_pase = document.getElementById("enviar_pase_medico");
const $numero_pase = document.getElementById("numero_pase");
const $clinicaEmoA = document.getElementById("clinicaEmoA");
const $clinica = document.getElementById("clinica");
const $fecha_emoA1 = document.getElementById("fecha_emoa1");
const $fecha_emoA2 = document.getElementById("fecha_emoa2");
const $fecha_emo = document.getElementById("fecha_emo");
const $fecha_emo_v = document.getElementById("fecha_emoa_v");
const $fecha_emoP1 = document.getElementById("fecha_emop1");
const $fecha_emoP2 = document.getElementById("fecha_emop2");
const $fecha_emoP3 = document.getElementById("fecha_emop3");
const $fecha_emoP3_v = document.getElementById("fecha_emop3_v");
const $fecha_vigencia = document.getElementById("fecha_vigencia");
const $medicamotivotext = document.getElementById("medicamotivotext");

const $subida_pase = document.getElementById("subida_pase");
const $subirPdf = document.getElementById("subirPdf");
const $vista_pase = document.getElementById("vista_pase");

const $frame__adjunto = document.getElementById('frame__adjunto');
const $ficha__vistaprevia = document.getElementById('ficha__vistaprevia');
const $ficha__vistaprevia_vac = document.getElementById("ficha__vistaprevia_vac");
const $display_image = document.getElementById("imagen");


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

$obs_pase.onclick = (e) => {
    e.preventDefault()

    if($obs_pase.value==2){
        $medicamotivotext.hidden= false;
    }else{
        $medicamotivotext.hidden= true;
    }
}

$enviar_pase.onclick = (e) => {
    e.preventDefault();
    if($numero_pase.value=="" && $fecha_vigencia.value==""){
        mostrarMensaje("Ingrese una fecha o codigo de pase","msj_error");
    }else if($subirPdf.files.length==0){
        mostrarMensaje("elija un documento","msj_error");
    }else{
        enviarPase();
    }
}

$vista_pase.onclick = (e) =>{
    e.preventDefault();
    console.log($nomb_adjunto.value);
    if($subida_pase.style.color=="green"){
        let formato = ($nomb_adjunto.value).split('.');
        if(formato[1]=="pdf"){
            $frame__adjunto.setAttribute("src",'../pases/'+$nomb_adjunto.value);
            fadeIn($ficha__vistaprevia);
        }else if(formato[1]=="jpeg"){
            $display_image.src = '../pases/'+$nomb_adjunto.value;
            fadeIn($ficha__vistaprevia_vac);
            (document.getElementById("descarga_vac")).setAttribute("href","../vacunas/"+$nomb_adjunto.value);
        }else{
            mostrarMensaje("Existe un problema","msj_error");
        }
    }else{
        mostrarMensaje("No existe un documento","msj_error");
    }
}

$subida_pase.onclick = (e) => {
    e.preventDefault();
    $subirPdf.click();
    return false;
}    

function enviarPase(){

    let validacionEmoP="";
    if($fecha_emo=="" && $fecha_emo_v==""){//agregar hasta 5 U:
        validacionEmoP = "validacionEmoA1";
    }else if($fecha_emoA2.value=="" && $fecha_emo_v.value!=""){
        validacionEmoP = "validacionEmoA2";
    }else if($fecha_emoA1.value=="" && $fecha_emoA2.value!=""){
        validacionEmoP = "validacionEmoA3";
    }else{
        validacionEmoP = "validacionEmoA1";
    }
        console.log(validacionEmoP);
        console.log($fecha_emo.value);
        console.log($fecha_emoA2.value);

    let data = new FormData();
    data.append('subidaPase',$subirPdf.files[0]);
    data.append("num_pase", $numero_pase.value);
    data.append("lote_pase", $lote_pase.value);
    data.append("obs_pase", $obs_pase.value);
    data.append("nombre", $nombre_pase.value);
    data.append("documento", $dni_pase.value);
    data.append("grupo_sangre", $sangre_pase.value );
    data.append("alergias", $alergias_pase.value);
    data.append("clinicaEmoA",$clinicaEmoA.value);
    data.append("clinica",$clinica.value);
    data.append("fecha_emo",$fecha_emo.value);
    data.append("fecha_emop",$fecha_emoP3.value);
    data.append("fecha_vigencia",$fecha_vigencia.value);
    data.append("medica_motivo_txt",$medicamotivotext.value);
    data.append("lote56",$lote56.checked);
    data.append("lote88",$lote88.checked);
    data.append("pisco",$pisco.checked);
    if($id_pase.value !=""){
        data.append("funcion","actualizarPase");
        data.append("validaEmoP",validacionEmoP);
        data.append("id",$id_pase.value);
    }else{
        data.append("funcion","enviarPase");
    }
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
            paseMedico();
        }else{
            mostrarMensaje("Verifique el N??. Documento","msj_error");
        }
    })
}