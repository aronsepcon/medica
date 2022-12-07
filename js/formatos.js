import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import {validar} from "./funciones.js";

const $exportar = document.getElementById("exportar");
const $tabla = document.getElementById("tabla");
const $formato = document.getElementById("formato");
const $ccostos = document.getElementById("ccostos");

$exportar.onclick = (e) => {
    e.preventDefault();

    let data = new FormData();
        data.append("documento",42081842);
        data.append("funcion","listarConsultas");
   /* if($ccostos==0){
        data.append("ccostos","2100");
    }else if($ccostos==1){
        data.append("ccostos","2300");
    }else if($ccostos==2){
        data.append("ccostos","2600");
    }

    if($formato==0){
        data.append("funcion","");
    }
    else if($formato==1){
        data.append("funcion","");
    }
*/
    
    fetch('../inc/consultasmedicas.inc.php',{
        method: "POST",
        body:data,
    })
    .then(function(response){
        return response.json();
    })
    .then(dataJson=>{
        if(dataJson.respuesta){
            let ws = XLSX.utils.json_to_sheet(dataJson.lista);
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, ws, "Hoja1");

            XLSX.writeFile(workbook, "lista.xlsx", { compression: true });

           console.log((ws));

        }
    });


}