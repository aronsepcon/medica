import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import {validar} from "./funciones.js";

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
const $enviar_pase = document.getElementById("enviar_pase_medico");
const $numero_pase = document.getElementById("numero_pase");
const $fecha_emo = document.getElementById("fecha_emo");
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
    }
    else{
        $medicamotivotext.hidden= true;
    }
}

$enviar_pase.onclick = (e) => {
    e.preventDefault();
    if($numero_pase.value=="" && $fecha_vigencia.value==""){
        mostrarMensaje("Ingrese una fecha o codigo de pase","msj_error");
    }else if($subirPdf.files.length==0){
        mostrarMensaje("elija un documento","msj_error");
    }
    else{
        enviarPase();
    }
}

$vista_pase.onclick = (e) =>{
    e.preventDefault();
    
    if($subida_pase.style.color=="green"){
        let formato = ($nomb_adjunto.value).split('.')
        if(formato[1]=="pdf"){
            $frame__adjunto.setAttribute("src",'../pases/'+$dni_pase.value+'.pdf');
            fadeIn($ficha__vistaprevia);
        }else if(formato[1]=="jpeg"){
            $display_image.src = '../pases/'+$dni_pase.value+'.jpeg';
            fadeIn($ficha__vistaprevia_vac);
        }
        else{
            mostrarMensaje("Existe un problema","msj_error");
        }
    }
    else{
        mostrarMensaje("No existe un documento","msj_error");
    }

}
/*
export function paseMedico(){

    let data2 = new FormData();
    data2.append("documento",$documento_trabajador.value);
    data2.append("funcion","listarExamenes");
    fetch('../inc/consultasmedicas.inc.php',{
        method: "POST",
        body:data2,
    })
    .then(function(response){
        return response.json();
    })
    .then(dataJson => {
        if (dataJson.respuesta){
            $nombre_pase.value = dataJson.lista[0].paciente;
            $dni_pase.value = dataJson.lista[0].dni;
            $sangre_pase.value = dataJson.lista[0].sangre;
            $alergias_pase.value = dataJson.lista[0].alergias;
            //validar tipo de examen ---->  dataJson.lista[0].tipo;
            $fecha_emo.value = dataJson.lista[0].fecha_emo;
        }else{
            mostrarMensaje("Verifique el N°. Documento","msj_error");
        }
    
    });

    let data3 = new FormData();
    data3.append("documento",$documento_trabajador.value);
    data3.append("funcion","listarPases");
    fetch('../inc/consultasmedicas.inc.php',{
        method: "POST",
        body:data3,
    })
    .then(function(response){
        return response.json();
    })
    .then(dataJson => {
        if (dataJson.respuesta){
            $id_pase.value = dataJson.lista[0].id;
            $numero_pase.value=dataJson.lista[0].numero_pase;
            $fecha_vigencia.value=dataJson.lista[0].fecha_vigencia;

            if(dataJson.lista[0].adjunto_pase){
                $subida_pase.style.color="green";
            }
            else{
                $id_pase.value ="";
                $subida_pase.style.color="";
            }
        }
        else{
            $id_pase.value ="";
            $numero_pase.value="";
            $fecha_vigencia.value="";
            $subida_pase.style.color="";
        }
    });   
}*/

$subida_pase.onclick = (e) => {
    e.preventDefault();
    $subirPdf.click();
    return false;
}    

//console.log($subirPdf.files.length);


function enviarPase(){
    let data = new FormData();
    data.append('subidaPase',$subirPdf.files[0]);
    data.append("num_pase", $numero_pase.value);
    data.append("lote_pase", $lote_pase.value);
    data.append("obs_pase", $obs_pase.value);
    data.append("nombre", $nombre_pase.value);
    data.append("documento", $dni_pase.value);
    data.append("grupo_sangre", $sangre_pase.value );
    data.append("alergias", $alergias_pase.value);
    data.append("fecha_emo",$fecha_emo.value);
    data.append("fecha_vigencia",$fecha_vigencia.value);
    if($id_pase.value !=""){
        data.append("funcion","actualizarPase");
        data.append("id",$id_pase.value);
    }
    else{
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
        }
        else{
            mostrarMensaje("Verifique el N°. Documento","msj_error");
        }
    }

    )
}