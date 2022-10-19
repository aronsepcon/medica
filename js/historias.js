import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import { validar } from "./funciones.js";


const $menu_vertical = document.getElementsByClassName('menu-historias__vertical__menu');
const $opcion1 = document.getElementById('opcion1');
const $opcion2 = document.getElementById('opcion2');
const $opcion3 = document.getElementById('opcion3');
const $opcion4 = document.getElementById('opcion4');
const $opcion5 = document.getElementById('opcion5');
const $opciones = document.querySelector(".historias__vertical__menu a");

const $pagina1 = document.getElementById('pagina1');
const $pagina2 = document.getElementById('pagina2');
const $pagina3 = document.getElementById('pagina3');
const $pagina4 = document.getElementById('pagina4');
const $pagina5 = document.getElementById('pagina5');

const $documento_trabajador = document.getElementById('documento_trabajador');
const $nombres_trabajador = document.getElementById('nombres_trabajador')

const $numero__registro = document.getElementById('numero__registro');
const $correo__electronico = document.getElementById('correo__electronico'); 
const $nombres__apellidos = document.getElementById('nombres__apellidos');
const $documento__identidad = document.getElementById('documento__identidad');
const $sexo__trabajador = document.getElementById('sexo__trabajador');
const $cargo__trabajador = document.getElementById('cargo__trabajador');
const $centro_costos = document.getElementById('centro_costos');
const $sede__trabajador = document.getElementById('sede__trabajador');
const $estado__trabajador = document.getElementById('estado__trabajador');
const $fecha__nacimiento = document.getElementById('fecha__nacimiento');
//const $telefono__trabajador = document.getElementById('telefono__trabajador');
const $direccion__trabajador = document.getElementById('direccion__trabajador');

const $tabla__examenes = document.getElementById('tabla__examenes');
const $tabla__examenes_body = document.getElementById('tabla__examenes_body');

const $tabla__busqueda_body = document.getElementById('tabla__busqueda_body');

const $tabla__atenciones = document.getElementById('tabla__atenciones');
const $tabla__atenciones_body = document.getElementById('tabla__atenciones_body');

const ficha__medica = document.getElementById('ficha__medica');
const $ficha__vistaprevia = document.getElementById('ficha__vistaprevia');

const $uploadPdf = document.getElementById('uploadPdf');
const $frame__adjunto = document.getElementById('frame__adjunto');
const $ficha__medica__correo = document.getElementById('ficha__medica__correo');
const $form_ingreso = document.getElementById('form_ingreso');

const $mail__cancel = document.getElementById('mail__cancel');
const $cierre_form = document.getElementById('cierre_form');
const $cierre_form_ing = document.getElementById('cierre_form_ing');
const $mail__accept = document.getElementById('mail__accept');

const $cierre_atencion = document.getElementById('cierre_atencion');
const $cierre_form_vistp = document.getElementById('cierre_form_vistp')

const $btn__atencion__medica = document.getElementById('btn__atencion__medica');
const $atencion__medica = document.getElementById('atencion__medica');


let registro = 0;

/** opciones */
$opcion1.onclick = (e) => {
    e.preventDefault();

    document.querySelectorAll(".historias__vertical__menu a").forEach(el => {
        el.classList.remove('resaltado');
    });

    document.querySelectorAll(".historias__cuerpo__pagina").forEach(el => {
        el.classList.add('oculto');
    })

    $opcion1.classList.add('resaltado');
    $pagina1.classList.remove('oculto');
    
   return false;
}

$opcion2.onclick = (e) => {
    e.preventDefault();

    try {
        if ($documento_trabajador.value == "" && $nombres_trabajador.value=="" ) throw "Ingrese el número de documento";

        document.querySelectorAll(".historias__vertical__menu a").forEach(el => {
            el.classList.remove('resaltado')
        });
    
        document.querySelectorAll(".historias__cuerpo__pagina").forEach(el => {
            el.classList.add('oculto');
        })
    
        $opcion2.classList.add('resaltado');
        $pagina2.classList.remove('oculto');

        listarExamenes();

    } catch (error) {
        mostrarMensaje(error,"msj_error");
    }

   return false;
}

$opcion3.onclick = (e) => {
    e.preventDefault();

    try{

        if ($documento_trabajador.value == "" && $nombres_trabajador.value=="" ) throw "Ingrese el número de documento";

        document.querySelectorAll(".historias__vertical__menu a").forEach(el => {
            el.classList.remove('resaltado')
        });

        document.querySelectorAll(".historias__cuerpo__pagina").forEach(el => {
            el.classList.add('oculto');
        })

        $opcion3.classList.add('resaltado');
        $pagina3.classList.remove('oculto');
        
        listarConsultas();

    }catch(error){
        mostrarMensaje(error,"msj_error");
    }

   return false;
}

$opcion4.onclick = (e) => {
    e.preventDefault();

    document.querySelectorAll(".historias__vertical__menu a").forEach(el => {
        el.classList.remove('resaltado')
    });

    document.querySelectorAll(".historias__cuerpo__pagina").forEach(el => {
        el.classList.add('oculto');
    })

    $opcion4.classList.add('resaltado');
    $pagina4.classList.remove('oculto');
    
   return false;
}

$opcion5.onclick = (e) => {
    e.preventDefault();

    document.querySelectorAll(".historias__vertical__menu a").forEach(el => {
        el.classList.remove('resaltado')
    });

    document.querySelectorAll(".historias__cuerpo__pagina").forEach(el => {
        el.classList.add('oculto');
    })

    $opcion5.classList.add('resaltado');
    $pagina5.classList.remove('oculto');
    
   return false;
}

$documento_trabajador.onkeypress = (e) => {
  var keycode = e.keyCode || e.which;
  if (keycode == 13) {
    try {
        if ($documento_trabajador.value == "" && $nombres_trabajador.value == "" ) throw "Ingrese el numero de documento";

        let data = new FormData();
            data.append("documento",e.target.value);
            data.append("funcion","datosColaborador");

        fetch('../inc/consultasrrhh.inc.php',{
            method: "POST",
            body:data,
        })
        .then(function(response){
            return response.json();
        })
        .then(dataJson => {
            if (dataJson.respuesta){
                $numero__registro.value = dataJson.cut
                $nombres__apellidos.value = dataJson.nombres;
                $correo__electronico.value = dataJson.correo;
                $documento__identidad.value = dataJson.dni;
                $cargo__trabajador.value = dataJson.cargo;
                $sexo__trabajador.value = dataJson.codSexo;
                $centro_costos.value = dataJson.ccostos;
                $sede__trabajador.value = dataJson.sede;
                $estado__trabajador.value = dataJson.estado;
                $fecha__nacimiento.value = dataJson.fecnac;
           //     $telefono__trabajador.value = dataJson.telefono;
                $direccion__trabajador.value = dataJson.direccion; 
                $tabla__examenes_body.innerHTML = "";
                $tabla__atenciones_body.innerHTML = "";
                $nombres_trabajador.value = dataJson.nombres;
            }else{
                mostrarMensaje("Verifique el N°. Documento","msj_error");
            }
        })

    } catch (error) {
        mostrarMensaje(error,"msj_error");
    }
  }
}

$nombres_trabajador.onkeypress = (e) => {
    var keycode = e.keyCode || e.which;
  if (keycode == 13) {
    try {
        if ($nombres_trabajador.value == "" && $documento_trabajador.value == "") throw "Ingrese un valor";
/*
        let data = new FormData();
            data.append("documento",e.target.value);
            data.append("funcion","nombreColaborador");

        fetch('../inc/consultasrrhh.inc.php',{
            method: "POST",
            body:data,
        })
        .then(function(response){
            return response.json();
        })
        .then(dataJson => {
            if (dataJson.respuesta){
                $numero__registro.value = dataJson.cut
                $nombres__apellidos.value = dataJson.nombres;
                $correo__electronico.value = dataJson.correo;
                $documento__identidad.value = dataJson.dni;
                $cargo__trabajador.value = dataJson.cargo;
                $sexo__trabajador.value = dataJson.codSexo;
                $centro_costos.value = dataJson.ccostos;
                $sede__trabajador.value = dataJson.sede;
                $estado__trabajador.value = dataJson.estado;
                $fecha__nacimiento.value = dataJson.fecnac;
          //      $telefono__trabajador.value = dataJson.telefono;
                $direccion__trabajador.value = dataJson.direccion; 
                $tabla__examenes_body.innerHTML = "";
                $tabla__atenciones_body.innerHTML = "";
                $documento_trabajador.value = dataJson.dni;
            }else{
                mostrarMensaje("Verifique el N°. Documento","msj_error");
            }
        })*/

        let data = new FormData();
        data.append("documento",e.target.value);
        data.append("funcion","buscarEmpleados");
        
        fetch('../inc/consultasrrhh.inc.php',{
            method: "POST",
            body: data,
        })
        .then(function(response){
            return response.json();
        })
        .then(dataJson =>{
            if(dataJson.respuesta){
                $tabla__busqueda_body.innerHTML = "";
                
                for (let index = 0; index < dataJson.lista.length; index++) {
                    let tr = document.createElement("tr");
                    tr.innerHTML =`<td>${dataJson.lista[index].dni}</td>
                                <td>${dataJson.lista[index].nombres}</td>
                                <td>26</td> 
                                <td>${dataJson.lista[index].sede}</td>
                                <td><ahref><></td>`
                    $tabla__busqueda_body.appendChild(tr);    
                }
            }else{
            mostrarMensaje("No se encontraron empleados","msj_error");}
        })


    } catch (error) {
        mostrarMensaje(error,"msj_error");
    }
  }
}

$btn__atencion__medica.onclick = (e) => {
    e.preventDefault();

    fadeIn($atencion__medica);

    return false;
}

$tabla__examenes_body.addEventListener("click", e=>{
    e.preventDefault();

    let accion =  e.target.parentElement.dataset.accion;
    
    registro = e.target.parentElement.getAttribute("href");
    let adjunto =  e.target.parentElement.dataset.atach;
    
        if ( accion == "previewFile" ){ 
                
            if(adjunto=="null"){
                fadeIn($form_ingreso)               
            }else{
                $frame__adjunto.setAttribute("src", '../hc/'+adjunto);        
                fadeIn($ficha__vistaprevia);
                }
        }else if (accion == "uploadFile"){
            $uploadPdf.click(); 
        }else if (accion == "sendMail") {
            try {
            let examen = e.target.parentElement.dataset.examen,
                fecha  = e.target.parentElement.dataset.fecha,
                registro = e.target.parentElement.getAttribute("href"),
                adjunto = e.target.parentElement.dataset.adjunto,
                clinica = e.target.parentElement.dataset.clinica;
            
                let data = new FormData();
                data.append("documento",$documento_trabajador.value);
                data.append("funcion","datosColaborador");
                fetch('../inc/consultasrrhh.inc.php',{
                    method: "POST",
                    body:data,
                })
                .then(function(response){
                    return response.json();
                })
                .then(dataJson => {
                    if (dataJson.respuesta){
                        document.getElementById("asunto__correo").value = (dataJson.codcos).slice(0,4) + " EMO - "+ examen +" "+dataJson.nombres; //slice(iniciocadena, fincadena)
                        document.getElementById("nombre__correo").value = dataJson.nombres;
                        document.getElementById("direccion__correo").value = dataJson.correo;
                        document.getElementById("fecha__examen").value = fecha;
                        document.getElementById("id__examen").value = registro;
                        document.getElementById("adjunto_examen").value = adjunto;
                        document.getElementById('clinica__examen').value = clinica;
                    
                        fadeIn($ficha__medica__correo);
                    }else{
                        mostrarMensaje("Verifique el N°. Documento","msj_error");
                    }
                })
        } catch (error) {
            mostrarMensaje("Verifique el N°. Documento","msj_error");
        } 
    }

    return false;
})

$tabla__atenciones_body.addEventListener("click", e=>{
    e.preventDefault();

    let accion =  e.target.parentElement.dataset.accion;
    
    registro = e.target.parentElement.getAttribute("href");
    let adjunto =  e.target.parentElement.dataset.atach;

    if ( accion == "previewFile" ){ 
                
        if(adjunto=="null"){
            fadeIn($form_ingreso)               
        }else{
            $frame__adjunto.setAttribute("src", '../hc/'+adjunto);        
            fadeIn($ficha__vistaprevia);
        }
    }
})

$uploadPdf.onchange = (e) => {
    e.preventDefault();

    try {
        if (validar($uploadPdf)) throw 'Archivo inválido. No se permite la extensión ';

        const formData = new FormData();
        formData.append('fileUpload',$uploadPdf.files[0]);
        formData.append('indice',registro);//pasa por post idreg
        formData.append('documento',$documento_trabajador.value);//pasar por un post el dni
        formData.append('funcion','listarExamenes');
        formData.append('nombres',$nombres__apellidos.value);
        //pasar indice a una consulta
        fetch ('../inc/cargarHistoriaMedica.inc.php',{

            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.respuesta) {
                mostrarMensaje("Documento subido","msj_correct");
                let adjunto = "../hc/"+data.archivo;
                console.log(adjunto);
                $frame__adjunto.setAttribute("src", adjunto);
                //Window.location.reload();
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


    return false;
}

$mail__cancel.onclick = (e) => {
    e.preventDefault();

    fadeOut($ficha__medica__correo);

    return false
}

$cierre_form.onclick = (e) => {
    e.preventDefault();

    fadeOut($ficha__medica__correo);
}

$cierre_form_ing.onclick = (e) => {
    e.preventDefault();

    fadeOut($ficha__vistaprevia);
}

$cierre_form_vistp.onclick = (e) => {
    e.preventDefault();

    fadeOut($form_ingreso);
}

$cierre_atencion.onclick = (e) => {
    e.preventDefault();

    fadeOut($atencion__medica);
}

$mail__accept.onclick = (e) => {
    e.preventDefault();

    try {

        if ($documento_trabajador.value == "" && $nombres_trabajador.value=="") throw "Ingrese el número de documento";
        if (document.getElementById("clinica__examen").value == "" ) throw "Ingrese el nombre de la clinica";
        if (document.getElementById("adjunto_examen").value == "" ) throw "No se adjunto el exmane médico";

        let data = new FormData();

        data.append("examen",document.getElementById("id__examen").value);
        data.append("nombre",document.getElementById("nombre__correo").value);
        data.append("asunto",document.getElementById("asunto__correo").value);
        data.append("direccion",document.getElementById("direccion__correo").value);
        data.append("fecha",document.getElementById("fecha__examen").value);
        data.append("clinica",document.getElementById("clinica__examen").value);
        data.append("adjunto",document.getElementById("adjunto_examen").value);
        data.append("funcion","enviarCorreo");

        fadeIn(document.getElementById("modal__esperar"));

        fetch('../inc/consultasmedicas.inc.php',{
            method: 'POST',
            body:data,
        })
        .then(function(response){
            return response.json();
        })
        .then(dataJson => {
            if (dataJson.respuesta){
                listarExamenes();
                fadeOut(document.getElementById("modal__esperar"));
                mostrarMensaje("Examén medico enviado","msj_correct");
            }
        });

    } catch (error) {
        mostrarMensaje(error,"msj_error");
    }


    return false
}
/*
function buscarEmpleados(){
    let data = new FormData();
    data.append("documento",$documento_trabajador.value);
    data.append("funcion","buscarEmpleados");
    
    fetch('../inc/consultasrrhh.inc.php',{
        method: "POST",
        body: data,
    })
    .then(function(response){
        return response.json();
    })
    .then(dataJson =>{
        if(dataJson.respuesta){
            $tabla__busqueda_body.innerHTML = "";
            
            for (let index = 0; index < dataJson.lista.length; index++) {
                let tr = document.createElement("tr");
                tr.innerHTML =`<td>${dataJson.lista[index].dni}</td>
                               <td>${dataJson.lista[index].nombres}</td>
                               <td>26</td> 
                               <td>${dataJson.lista[index].sede}</td>
                               <td><ahref><></td>`
                $tabla__busqueda_body.appendChild(tr);    
            }
        }else{
        mostrarMensaje("No se encontraron examenes","msj_error");}
    })
}   */

function listarExamenes(){

        let data = new FormData();
        data.append("documento",$documento_trabajador.value);
        data.append("funcion","listarExamenes");
  
        fetch('../inc/consultasmedicas.inc.php',{
            method: "POST",
            body:data,
        })
        .then(function(response){
            return response.json();
        })
        .then(dataJson => {
            if (dataJson.respuesta){
                $tabla__examenes_body.innerHTML = "";
    
                for (let index = 0; index < dataJson.lista.length; index++) {
                    let tr = document.createElement("tr");
                    let $clase_enviado = dataJson.lista[index].enviado == null ? 'no__enviado' : 'enviado';
                    let $titulo_enviado = dataJson.lista[index].enviado == null ? 'Pendiente Envio' : 'Enviado';
                    let $icono_enviado = dataJson.lista[index].enviado == null ? '<i class="fas fa-external-link-alt"></i>' :'<i class="fas fa-check" style="color:green"></i>';
                    let $icono_cargado = dataJson.lista[index].adjunto == null ? '<i class="fas fa-upload"></i>' : '<i class="fas fa-upload" style="color:green"></i>';
                    let $restricciones = dataJson.lista[index].restricciones == null ? " " : dataJson.lista[index].restricciones;
                    let $recomendaciones = dataJson.lista[index].recomendaciones == null ? " " : dataJson.lista[index].recomendaciones; 
    
                    tr.innerHTML = `<td>${dataJson.lista[index].clinica}</td>
                                    <td class="pl10px">${dataJson.lista[index].tipo}</td>
                                    <td>${dataJson.lista[index].fecha}</td>
                                    <td>${dataJson.lista[index].aptitud}</td>
                                    <td>${$recomendaciones}</td>
                                    <td>${$restricciones}</td>
                                    <td>${dataJson.lista[index].alergias}</td>
                                    <td>${dataJson.lista[index].sangre}</td>
                                    <td class="textoCentro">
                                        <a href="${dataJson.lista[index].id}" data-accion="sendMail" 
                                                                              data-examen="${dataJson.lista[index].tipo}" 
                                                                              data-fecha="${dataJson.lista[index].fecha}"
                                                                              data-adjunto="${dataJson.lista[index].adjunto}"
                                                                              data-clinica="${dataJson.lista[index].clinica}"
                                                                              class="${$clase_enviado}"
                                                                              title="${$titulo_enviado}">${$icono_enviado}</a>
                                    </td>
                                    <td class="textoCentro">
                                        <a href="${dataJson.lista[index].id}" data-accion="previewFile" data-atach="${dataJson.lista[index].adjunto}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <td class="textoCentro">
                                        <a href="${dataJson.lista[index].id}" data-accion="uploadFile">
                                            ${$icono_cargado}
                                        </a>
                                    </td>`;
    
                    $tabla__examenes_body.appendChild(tr);
                }
                
            }else{
                mostrarMensaje("No se encontraron examenes","msj_error");
            }
        })

};

function listarConsultas(){
    let data = new FormData();
    data.append("documento",$documento_trabajador.value);
    data.append("funcion","listarConsultas");

    fetch('../inc/consultasmedicas.inc.php',{
        method: "POST",
        body:data,
    })
    .then(function(response){
        return response.json();
    })
    .then(
        dataJson => {
            if (dataJson.respuesta){
                $tabla__atenciones_body.innerHTML = "";
                /*
                for (let index = 0; index < dataJson.lista.length; index++) {
                    let tr = document.createElement("tr");
                    let $restricciones = dataJson.lista[index].restricciones == null ? " " : dataJson.lista[index].restricciones;
                    let $recomendaciones = dataJson.lista[index].recomendaciones == null ? " " : dataJson.lista[index].recomendaciones;
                   //cambiar estas columnas y sus variables a consultar
                    tr.innerHTML = `<td>${dataJson.lista[index].id}</td>
                                    <td class="pl10px">${dataJson.lista[index].tipo}</td>
                                    <td>${dataJson.lista[index].fecha}</td>
                                    <td>${$recomendaciones}</td>
                                    <td>${dataJson.lista[index].alergias}</td>
                                    <td class="textoCentro">
                                        <a href="${dataJson.lista[index].id}" data-accion="previewFile" data-atach="${dataJson.lista[index].adjunto}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>`;
                    $tabla__atenciones_body.appendChild(tr);
                }*/
            }else{
                mostrarMensaje("No se encontraron examenes","msj_error");
            }
        })
};


