import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import {validar} from "./funciones.js";

const $exportar = document.getElementById("exportar");
const $tabla = document.getElementById("tabla");
const $formato = document.getElementById("formato");
const $ccostos = document.getElementById("ccostos");
const $descarga_formato = document.getElementById("descarga_formato");
const $buscar = document.getElementById("buscar");
const $tabla_formato_006 = document.getElementById("tabla_formato_006");

$exportar.onclick = (e) => {
    e.preventDefault();

    let data = new FormData();
    //    data.append("funcion","formato");
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
    //window.location.href = "";

    
    $descarga_formato.setAttribute("href","../formatos/Formato 006.xlsx");
    $descarga_formato.click();
}

$buscar.onclick = (e) =>{
    e.preventDefault();

    let formData = new FormData();
    formData.append("ccostos",$ccostos.value);
    formData.append("funcion","formatosTablas");
    fetch('../inc/consultasvistas.inc.php',{
        method: "POST",
        body:formData,
    })
    .then(function(response){
        return response.json();
    })
    .then(dataJson => {
        if(dataJson.respuesta){
            $tabla_formato_006.innerHTML="";
            for(let index =0;index < dataJson.lista.length;index++){
                let tr = document.createElement("tr");
                let $DTD3 = dataJson.lista[index].fechaDifTD3 == null ? "" : dataJson.lista[index].fechaDifTD3;
                tr.innerHTML = `<td>${index+1}</td>
                                <td>${dataJson.lista[index].empleadonomb}</td>
                                <td>${dataJson.lista[index].fecnac}</td>
                                <td>${dataJson.lista[index].dni}</td>
                                <td>${dataJson.lista[index].edad}</td>
                                <td>${$DTD3}</td>`;
                $tabla_formato_006.appendChild(tr);
            }
        }else{
            mostrarMensaje("No se encontraron examenes","msj_error");
        }
    })
}