import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import {validar} from "./funciones.js";

const $exportar = document.getElementById("exportar");
const $tabla = document.getElementById("tabla");
const $formato = document.getElementById("formato");
const $ccostos = document.getElementById("ccostos");
const $dni_formato = document.getElementById("dni_formato");
const $descarga_formato = document.getElementById("descarga_formato");
const $buscar = document.getElementById("buscar");
const $tabla_formato_006 = document.getElementById("tabla_formato_006");
const $tabla_formato_001 = document.getElementById("tabla_formato_001");
const $tabla_006 = document.getElementById("tabla_006");
const $tabla_001 = document.getElementById("tabla_001");

$formato.onchange = (e) => {
    e.preventDefault();

    if($formato.value==0){
        console.log($formato.value);
        $tabla_006.style.display = "none";
        $tabla_001.style.display = "block";
    }
    else if($formato.value==1){
        console.log($formato.value);
        $tabla_006.style.display = "block";
        $tabla_001.style.display = "none";
    }

}

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
    }*/

    if($formato.value==0){
        let dni = $dni_formato.value == "" ? null : $dni_formato.value;
        data.append("dni",dni);
        data.append("funcion","formato_001");
    }
    else if($formato.value==1){
        data.append("funcion","formato_006");
    }

    fetch('../inc/consultasvistas.inc.php',{
        method: "POST",
        body:data,
    })
    .then(function(response){
        if(response.status==200){
            if($formato.value==0){
                $descarga_formato.href = "../formatos/Formato 001.xlsx";
                $descarga_formato.download = "PSPC-120-X-PR-001-FR-001_0 Registro de Evaluaciones Ocupacionales";
            }
            else if($formato.value==1){
                $descarga_formato.href = "../formatos/Formato 006.xlsx";
                $descarga_formato.download = "PSPC-120-X-PR-001-FR-006_1 Control de EMOs y Esq  de Vacunación";
            }
            $descarga_formato.click();
        }
        else{
            mostrarMensaje("Hubo un problema","msj_error");
        }
    })
    //window.location.href = "";
}

$buscar.onclick = (e) =>{
    e.preventDefault();

    let formData = new FormData();
    formData.append("ccostos",$ccostos.value);
    if($formato.value==0){
        let dni = $dni_formato.value == "" ? null : $dni_formato.value;
        formData.append("dni",dni);
        formData.append("funcion","formatoTablas001");
        fetch('../inc/consultasvistas.inc.php',{
            method: "POST",
            body:formData,
        })
        .then(function(response){
            return response.json();
        })
        .then(dataJson => {
            if(dataJson.respuesta){
                $tabla_formato_001.innerHTML="";
                for(let index =0;index < dataJson.lista.length;index++){
                    console.log(dataJson.lista[index].fechaDTD3);
                    let tr = document.createElement("tr");
                    let $DTD3 = dataJson.lista[index].fechaDTD3 == null ? "" : dataJson.lista[index].fechaDifTD3;
                    tr.innerHTML = `<td>${index+1}</td>
                                    <td>${""}</td>
                                    <td>${dataJson.lista[index].codPaci}</td>
                                    <td>${dataJson.lista[index].dni}</td>
                                    <td>${dataJson.lista[index].nombres}</td>
                                    <td>${dataJson.lista[index].edad}</td>
                                    <td>${dataJson.lista[index].sexo}</td>
                                    <td>${dataJson.lista[index].cargo}</td>
                                    <td>${""}</td>
                                    <td>${dataJson.lista[index].empresa}</td>
                                    <td>${dataJson.lista[index].centrocostos}</td>
                                    <td>${""}</td>
                                    <td>${dataJson.lista[index].fecha}</td>
                                    <td>${dataJson.lista[index].tipo}</td>
                                    <td>${dataJson.lista[index].clinica}</td>
                                    <td>${dataJson.lista[index].aptitud}</td>
                                    <td>${dataJson.lista[index].pase}</td>
                                    <td>${dataJson.lista[index].sgtefecha}</td>
                                    <td>${""}</td>
                                    <td>${""}</td>
                                    <td>${dataJson.lista[index].alergias}</td>
                                    <td>${dataJson.lista[index].sangre}</td>
                                    <td>${dataJson.lista[index].presion}</td>
                                    <td>${dataJson.lista[index].peso}</td>
                                    <td>${dataJson.lista[index].talla}</td>
                                    <td>${dataJson.lista[index].imc}</td>
                                    <td>${dataJson.lista[index].estadoNutricional}</td>
                                    <td>${dataJson.lista[index].espirometria}</td>
                                    <td>${dataJson.lista[index].rayosx}</td>
                                    <td>${dataJson.lista[index].oftalmologia}</td>
                                    <td>${dataJson.lista[index].otoscopia}</td>
                                    <td>${dataJson.lista[index].audiometria}</td>
                                    <td>${dataJson.lista[index].osteo}</td>
                                    <td>${dataJson.lista[index].odontograma}</td>
                                    

                                    <td>${$DTD3}</td>`;
                    $tabla_formato_001.appendChild(tr);
                }
            }else{
                mostrarMensaje("No se encontraron examenes","msj_error");
            }
        })
    }
    else if($formato.value==1){
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
                    console.log(dataJson.lista[index].fechaDifTD3);
                    let tr = document.createElement("tr");
                    let $DTD3 = dataJson.lista[index].fechaDifTD3 == "01/01/1970" ? "" : dataJson.lista[index].fechaDifTD3;
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
    
}