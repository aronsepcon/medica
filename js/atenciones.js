import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import {validar} from "./funciones.js";

const $RegistrarAtencion = document.getElementById("RegistrarAtencion");
const $atencion__medica = document.getElementById("atencion__medica_usuario");
const $cierre_atencion_med = document.getElementById("cierre_atencion_med");
const $lista_medicamentos = document.getElementById("lista_medicamentos");
const $producto_inventario = document.getElementById("producto_inventario");
const $lista_inventario = document.getElementById("lista_inventario");
const $cierre_lista_inv = document.getElementById("cierre_lista_inv");
const $busqueda_atencion = document.getElementById('busqueda_atencion');
const $edad__trabajador_atencion = document.getElementById('edad__trabajador_atencion');
const $retorno_atencion = document.getElementById('retorno_atencion');
const $guardar_atencion = document.getElementById('guardar_atencion');
const $modal_inventario = document.getElementById('modal_inventario');
const $tabla_inventario = document.getElementById('tabla_inventario');

$RegistrarAtencion.onclick = (e) => {
    e.preventDefault();

    fadeIn($atencion__medica);

    return false;
}

$cierre_atencion_med.onclick = (e) => {
    e.preventDefault();

    fadeOut($atencion__medica);

    return false;
}

$retorno_atencion.onclick = (e) => {
    e.preventDefault();

    fadeOut($atencion__medica);

    return false;
}

$modal_inventario.onclick = (e) => {
    e.preventDefault();

    fadeIn($lista_inventario);

    return false;
}

$lista_medicamentos.onclick = (e) => {
    e.preventDefault();

    listarInventario($producto_inventario.value);

    return false;
}

$cierre_lista_inv.onclick = (e) => {
    e.preventDefault();

    fadeOut($lista_inventario);

    return false
}

$busqueda_atencion.onkeydown = (e) => {
    let codeK = e.key;
    if(codeK === 'Enter'){
        try {
            listarAtenciones(e.target.value);
            console.log(e.target.value);
        } catch (error) {
            mostrarMensaje(error,"msj_error");
        }
    }
}

function listarAtenciones($e){
    let data = new FormData();
    data.append("doc",$e);
    data.append("funcion","datosApi");
    fetch('../inc/consultasrrhh.inc.php',{
        method: "POST",
        body: data,
    })
    .then(function(response){
        return response.json();
    })
    .then(dataJson =>{
        if(dataJson.existe){
            let fec_nac= new Date(dataJson.datos[0].nacimiento.slice(0,10)).getTime();
            let diff_mes = Date.now()-fec_nac;
            let edad1 = new Date(diff_mes);
            let año = edad1.getUTCFullYear();
            let edad = Math.abs(año-1970);

            $edad__trabajador_atencion.value = edad;
        }
    })
}

$tabla_inventario.addEventListener("click", e=>{
    e.preventDefault();
    let accion =  e.target.parentElement.dataset.accion;
    let idreg = e.target.parentElement.getAttribute("href");
    if(accion=="enviarInventario"){

    }
});

function listarInventario($nomb){
    let data2 = new FormData();
    data2.append("nombre",$nomb);
    data2.append("funcion","listarInventario");
    fetch('../inc/consultasgestor.inc.php',{
        method: "POST",
        body: data2,
    })
    .then(function(response){
        return response.json();
    })
    .then(dataJson =>{
        if(dataJson.respuesta){
            console.log(dataJson.lista[0].ccodprod);
            $tabla_inventario.innerHTML = "";

            for(let index=0;index<dataJson.lista.length;index++){
                let tr = document.createElement("tr");
                
                tr.innerHTML = `<td>
                                    <a href="${dataJson.lista[index].idcprod}" data-accion="enviarInventario">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                                <td>${dataJson.lista[index].cdesprod}</td>
                                <td>${""}</td>   
                                <td>${""}</td>
                                <td>${""}</td>
                                <td>${""}</td>
                                <td>${dataJson.lista[index].nund}</td>`;
                $tabla_inventario.appendChild(tr);
            }
        }else{
            mostrarMensaje("No se encontro","msj_error");
        }
    });
}
/*
$guardar_atencion.onclick = (e) => {
    e.preventDefault();
    try {
        let formData = new FormData();
        formData.append("documento",);
        formData.append("funcion","");
        fetch('../inc/consultasmedicas.inc.php',{
            method: "POST",
            body: data,
        })
    } catch (error) {
        mostrarMensaje(error,"msj_error");

    }
} */