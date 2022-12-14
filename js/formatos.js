import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import {validar} from "./funciones.js";

const $exportar = document.getElementById("exportar");
const $tabla = document.getElementById("tabla");
const $formato = document.getElementById("formato");
const $ccostos = document.getElementById("ccostos");
const $descarga_formato = document.getElementById("descarga_formato");


$exportar.onclick = (e) => {
    e.preventDefault();

    let data = new FormData();
        data.append("funcion","formato");
  /* if($ccostos==0){
        data.append("ccostos","0200");
    }else if($ccostos==1){
        data.append("ccostos","2800");
    }else if($ccostos==2){
        data.append("ccostos","2600");
    }
/*
    if($formato==0){
        data.append("funcion","");
    }
    else if($formato==1){
        data.append("funcion","");
    }
*/
    fetch('../inc/consultasvistas.inc.php',{
        method: "POST",
        body:data,
    })
    

}