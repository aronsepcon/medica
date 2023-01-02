import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import {validar} from "./funciones.js";

const $probar = document.getElementById("probar");
const $exportar = document.getElementById("exportar");
const $tabla = document.getElementById("tabla");
const $formato = document.getElementById("formato");
const $ccostos = document.getElementById("ccostos");
const $dni_formato = document.getElementById("dni_formato");
const $activo_sc = document.getElementById("activo_sc");
const $cesado_sc = document.getElementById("cesado_sc");
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
    
    if(($activo_sc.checked==false && $cesado_sc.checked ==false)/* || ($activo_sc.checked==true && $cesado_sc.checked ==true)*/){
        mostrarMensaje("Elegir entre Activos o Cesados","msj_error");
        throw "opciones";
    }
    let activo = $activo_sc.checked == true ? 1 : 0;
    let cesado = $cesado_sc.checked == true ? 1 : 0;
    let dni = $dni_formato.value == "" ? null : $dni_formato.value;
    let data = new FormData();
        data.append("ccostos",$ccostos.value);
        data.append("activo",activo);
        data.append("cesado",cesado);
        data.append("dni",dni);
    if($formato.value==0){
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
            setTimeout(()=>{
                $descarga_formato.click();
            },3000);//testear la cantidad de tiempo
        }
        else{
            mostrarMensaje("Hubo un problema","msj_error");
        }
    })
    //window.location.href = "";
}    

$probar.onclick = (e) =>{
    e.preventDefault();

    let data = new FormData();
    data.append("funcion","union006");
    fetch('../inc/consultasvistas.inc.php',{
        method: "POST",
        body:data,
    })
    .then(function(response){
        return response.json();
    })
    .then(dataJson => {
        if(dataJson.respuesta){
            console.log(dataJson.lista);
        }
    })
}

$buscar.onclick = (e) =>{
    e.preventDefault();
    if(($activo_sc.checked==false && $cesado_sc.checked ==false) /*|| ($activo_sc.checked==true && $cesado_sc.checked ==true)*/){
        mostrarMensaje("Elegir entre Activos o Cesados","msj_error");
        throw "opciones";
    }
    let dni = $dni_formato.value == "" ? null : $dni_formato.value;
    let activo = $activo_sc.checked == true ? 1 : 0;
    let cesado = $cesado_sc.checked == true ? 1 : 0;
    let formData = new FormData();
        formData.append("ccostos",$ccostos.value);
        formData.append("dni",dni);
        formData.append("activo",activo);
        formData.append("cesado",cesado);
    if($formato.value==0){

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
                    let tr = document.createElement("tr");
                    let $FA = dataJson.lista[index].fechaFbrA == null ? "" : dataJson.lista[index].fechaFbrA;
                    let $DTD1 = dataJson.lista[index].fechaDTD1 == null ? "" : dataJson.lista[index].fechaDTD1;
                    let $DTD2 = dataJson.lista[index].fechaDTD2 == null ? "" : dataJson.lista[index].fechaDTD2;
                    let $DTD3 = dataJson.lista[index].fechaDTD3 == null ? "" : dataJson.lista[index].fechaDTD3;
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
                                    <td>${dataJson.lista[index].ekg}</td>
                                    <td>${dataJson.lista[index].pEsfuerzo}</td>
                                    <td>${dataJson.lista[index].riesgoCoronario}</td>
                                    <td>${dataJson.lista[index].psicologia}</td>
                                    <td>${""}</td>
                                    <td>${""}</td>
                                    <td>${""}</td>
                                    <td>${""}</td>
                                    <td>${""}</td>
                                    <td>${dataJson.lista[index].gotaGruesa}</td>
                                    <td>${dataJson.lista[index].leucocitos}</td>
                                    <td>${dataJson.lista[index].plaquetas}</td>
                                    <td>${dataJson.lista[index].colesterol}</td>
                                    <td>${dataJson.lista[index].hdl}</td>
                                    <td>${dataJson.lista[index].ldl}</td>
                                    <td>${dataJson.lista[index].trigliceridos}</td>
                                    <td>${dataJson.lista[index].tgp}</td>
                                    <td>${dataJson.lista[index].glucosa}</td>
                                    <td>${dataJson.lista[index].ureaSanguinea}</td>
                                    <td>${dataJson.lista[index].acidoUrico}</td>
                                    <td>${dataJson.lista[index].creatinina}</td>
                                    <td>${dataJson.lista[index].vdrl}</td>
                                    <td>${""}</td>
                                    <td>${""}</td>
                                    <td>${""}</td>
                                    <td>${""}</td>
                                    <td>${""}</td>
                                    <td>${""}</td>
                                    <td>${dataJson.lista[index].diagno1}</td>
                                    <td>${dataJson.lista[index].cod1}</td>
                                    <td>${dataJson.lista[index].diagno2}</td>
                                    <td>${dataJson.lista[index].cod2}</td>
                                    <td>${dataJson.lista[index].diagno3}</td>
                                    <td>${dataJson.lista[index].cod3}</td>
                                    <td>${dataJson.lista[index].diagno4}</td>
                                    <td>${dataJson.lista[index].cod4}</td>
                                    <td>${dataJson.lista[index].diagno5}</td>
                                    <td>${dataJson.lista[index].cod5}</td>
                                    <td>${dataJson.lista[index].diagno6}</td>
                                    <td>${dataJson.lista[index].cod6}</td>
                                    <td>${""}</td>
                                    <td>${""}</td>
                                    <td>${""}</td>
                                    <td>${""}</td>
                                    <td>${""}</td>
                                    <td>${""}</td>
                                    <td>${""}</td>
                                    <td>${""}</td>
                                    <td>${""}</td>
                                    <td>${$FA}</td>
                                    <td>${$DTD1}</td>
                                    <td>${$DTD2}</td>
                                    <td>${$DTD3}</td>`;
                    $tabla_formato_001.appendChild(tr);
                }
            }else{
                mostrarMensaje("No se encontraron examenes","msj_error");
            }
        })
    }
    else if($formato.value==1){
        formData.append("funcion","union006");
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
                                    <td>${dataJson.lista[index].ccostos}</td>
                                    <td>${dataJson.lista[index].cargo}</td>
                                    <td>${dataJson.lista[index].empresa}</td>
                                    <td>${dataJson.lista[index].correo}</td>
                                    <td>${dataJson.lista[index].telefono}</td>
                                    <td>${dataJson.lista[index].grupoSangre}</td>
                                    <td>${dataJson.lista[index].alergias}</td>
                                    <td>${dataJson.lista[index].fecha}</td>
                                    <td>${dataJson.lista[index].nomb_clinica}</td>
                                    <td>${dataJson.lista[index].aptitud}</td>
                                    <td>${dataJson.lista[index].peso}</td>
                                    <td>${dataJson.lista[index].talla}</td>
                                    <td>${dataJson.lista[index].imc}</td>
                                    <td>${dataJson.lista[index].estadoNutricional}</td>
                                    <td>${dataJson.lista[index].enviado}</td>
                                    <td>${dataJson.lista[index].programadopre}</td>
                                    <td>${dataJson.lista[index].fechap1}</td>
                                    <td>${dataJson.lista[index].clinica1}</td>
                                    <td>${dataJson.lista[index].aptitud1}</td>
                                    <td>${dataJson.lista[index].peso1}</td>
                                    <td>${dataJson.lista[index].talla1}</td>
                                    <td>${dataJson.lista[index].imc1}</td>
                                    <td>${dataJson.lista[index].estadoNutricional1}</td>
                                    <td>${dataJson.lista[index].enviado1}</td>
                                    <td>${dataJson.lista[index].programado1}</td>
                                    <td>${dataJson.lista[index].fechap2}</td>
                                    <td>${dataJson.lista[index].clinica2}</td>
                                    <td>${dataJson.lista[index].aptitud2}</td>
                                    <td>${dataJson.lista[index].peso2}</td>
                                    <td>${dataJson.lista[index].talla2}</td>
                                    <td>${dataJson.lista[index].imc2}</td>
                                    <td>${dataJson.lista[index].estadoNutricional2}</td>
                                    <td>${dataJson.lista[index].enviado2}</td>
                                    <td>${dataJson.lista[index].programado2}</td>
                                    <td>${dataJson.lista[index].fechar}</td>
                                    <td>${dataJson.lista[index].nomb_clinicar}</td>
                                    <td>${dataJson.lista[index].observaciones}</td>
                                    <td>${dataJson.lista[index].fechaFbrAmarilla}</td>
                                    <td>${dataJson.lista[index].fechaDifTD1}</td>
                                    <td>${dataJson.lista[index].fechaDifTD2}</td>
                                    <td>${$DTD3}</td>`;
                    $tabla_formato_006.appendChild(tr);
                }
            }else{
                mostrarMensaje("No se encontraron examenes","msj_error");
            }
        })
    }
    
}