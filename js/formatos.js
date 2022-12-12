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
        data.append("funcion","formato");
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
    fetch('../inc/consultasvistas.inc.php',{
        method: "POST",
        body:data,
    })
    .then(function(response){
        if(!response.ok) throw new Error("Fallo la subida");
        return response.json();
    })
    .then(dataJson=>{
        if(dataJson.respuesta){
            let ws = XLSX.utils.json_to_sheet(dataJson.lista);
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, ws, "Hoja1");

            XLSX.utils.sheet_add_aoa(ws,[["N°","APELLIDOS Y NOMBRES","FECHA DE NACIMIENTO","DNI","EDAD","AREA DE TRABAJO","PUESTO DE TRABAJO","EMPRESA",
                    "CORREO ELECTRONICO","CELULAR","GRUPO SANG. Y RH","ALERGIAS","FECHA EMO","CLINICA","CONDICIÓN","PESO","TALLA","IMC","CLASIFICACION",
                    "ENVIO DE EMO EMAIL","PROGRAMADO","REALIZADO","CLINICA","CONDICIÓN","PESO","TALLA","IMC","CLASIFICACION","ENVIO DE EMO EMAIL",
                    "PROGRAMADO","REALIZADO","CLINICA","CONDICIÓN","PESO","TALLA","IMC","CLASIFICACION","ENVIO DE EMO EMAIL","REALIZADO","CLÍNICA",
                    "OBSERVACIÓNES","ENVIO DE EMO EMAIL","FIEBRE AMARILLA","DIFTERIA TETANO-1RA DOSIS","DIFTERIA TETANO-2DA DOSIS","DIFTERIA TETANO-3RA DOSIS",
                    "DIFTERIA TETANO-REFUERZO"]]);

            XLSX.writeFile(workbook, "lista.xlsx", { compression: true });

           console.log((ws));

        }
    });


}