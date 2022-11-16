import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import { validar } from "./funciones.js";
import {listarVacunas} from "./cargaMasiva.js";

//import {mostrarMensaje,fadeIn,fadeOut,validar } from "./funciones.js";

const $menu_vertical = document.getElementsByClassName('menu-historias__vertical__menu');
const $opcion1 = document.getElementById('opcion1');
const $opcion2 = document.getElementById('opcion2');
const $opcion3 = document.getElementById('opcion3');
const $opcion4 = document.getElementById('opcion4');
const $opcion5 = document.getElementById('opcion5');
const $opciones = document.querySelector(".historias__vertical__menu a");

const $btn = document.createElement('button');

const $pagina1 = document.getElementById('pagina1');
const $pagina2 = document.getElementById('pagina2');
const $pagina3 = document.getElementById('pagina3');
const $pagina4 = document.getElementById('pagina4');
const $pagina5 = document.getElementById('pagina5');

const $documento_trabajador = document.getElementById('documento_trabajador');
const $nombres_trabajador = document.getElementById('nombres_trabajador')

const $radio__nombre = document.getElementById('radio__nombre');
const $radio__dni = document.getElementById('radio__dni');
const $busqueda_boton = document.getElementById('busqueda_boton');

const $uploadFile = document.getElementById("uploadFile");

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
const $telefono__trabajador = document.getElementById('telefono__trabajador');
const $edad__trabajador = document.getElementById('edad__trabajador');
const $direccion__trabajador = document.getElementById('direccion__trabajador');

const $tabla__examenes = document.getElementById('tabla__examenes');
const $tabla__examenes_body = document.getElementById('tabla__examenes_body');

const $tabla__busqueda_body = document.getElementById('tabla__busqueda_body');
const $historias__cuerpo_completo = document.getElementById('historias__cuerpo_completo');
const $busqueda_parcial = document.getElementById('busqueda_parcial');

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
const $editar_form = document.getElementById('editar_form');
const $cambiar_env = document.getElementById('cambiar_env');

const $cierre_atencion = document.getElementById('cierre_atencion');
const $cierre_form_vistp = document.getElementById('cierre_form_vistp')

const $btn__atencion__medica = document.getElementById('btn__atencion__medica');
const $atencion__medica = document.getElementById('atencion__medica');

let registro = 0;

$btn.innerHTML ="ver";
$btn.type = 'button';

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

    try{

        if ($documento_trabajador.value == "" && $nombres_trabajador.value=="" ) throw "Ingrese el número de documento";

        document.querySelectorAll(".historias__vertical__menu a").forEach(el => {
            el.classList.remove('resaltado')
        });

        document.querySelectorAll(".historias__cuerpo__pagina").forEach(el => {
            el.classList.add('oculto');
        })

        $opcion4.classList.add('resaltado');
        $pagina4.classList.remove('oculto');

        listarVacunas();

    }catch(error){
        mostrarMensaje(error,"msj_error");
    }
    
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

$radio__nombre.onclick = (e) =>{

  //  $documento_trabajador.readOnly = true;
 //   $documento_trabajador.style.color = 'gray';
    $nombres_trabajador.readOnly =false;
    $nombres_trabajador.style.color = 'black';
    $historias__cuerpo_completo.style.display = 'none';
    $busqueda_parcial.style.display = 'block';
    $documento_trabajador.value = "";
    $nombres_trabajador.value = "";
    $numero__registro.value = ""; 
    $correo__electronico.value = "";
    $nombres__apellidos.value = ""; 
    $documento__identidad.value = "";
    $sexo__trabajador.value = ""; 
    $cargo__trabajador.value = ""; 
    $centro_costos.value = ""; 
    $sede__trabajador.value = ""; 
    $estado__trabajador.value = ""; 
}

function estiloDni(){
    $busqueda_parcial.style.display = 'none';
    $historias__cuerpo_completo.style.display = 'block';
    $nombres_trabajador.readOnly = true;    
    $nombres_trabajador.style.color = 'gray';

}

$radio__dni.onclick = (e) =>{
   // $documento_trabajador.readOnly = false;
   estiloDni(); 
   $documento_trabajador.style.color = 'black';
    $nombres_trabajador.value = "";
}

$tabla__busqueda_body.addEventListener("click", e=>{
    e.preventDefault();

    let accion =  e.target.parentElement.dataset.accion2;
        registro = e.target.parentElement.getAttribute("href");

    if(accion == "ingreso"){
        let dni = e.target.parentElement.dataset.dni;
        $historias__cuerpo_completo.style.display = "block";
        $busqueda_parcial.style.display = "none";
        $documento_trabajador.value = dni;
        listadoDni(dni);//ver porq ligaria pero actualmente no se puede xc
        $radio__dni.checked=true;
        estiloDni();
        $tabla__examenes_body.innerHTML = "";//para otros
        listarExamenes();
        listarVacunas();//ver si funciona esto
        //fadeOut($busqueda_parcial);
    }
})

$documento_trabajador.onkeypress = (e) => {
  var keycode = e.keyCode || e.which;
  if (keycode == 13) {
    try {
        if ($documento_trabajador.value == "" && $nombres_trabajador.value == "" ) throw "Ingrese el numero de documento";

        $historias__cuerpo_completo.style.display = 'block';
        $busqueda_parcial.style.display = 'none'
        $nombres_trabajador.readOnly = true;    
        $nombres_trabajador.style.color = 'gray';
        //ver el cambio sino asi mas directo 
        
        listadoDni(e.target.value);
        listarVacunas();

    } catch (error) {
        mostrarMensaje(error,"msj_error");
    }
  }
}

function listadoDni($e){
    let data = new FormData();
            data.append("documento",$e);
            data.append("funcion","datosColaborador");
        listarExamenes();
        fetch('../inc/consultasrrhh.inc.php',{
            method: "POST",
            body:data,
        })
        .then(function(response){
            return response.json();
        })
        .then(dataJson => {
            if (dataJson.respuesta){
              //  $numero__registro.value = dataJson.cut
              //  $estado__trabajador.value = dataJson.estado;
            }else{
                mostrarMensaje("Verifique el N°. Documento","msj_error");
            }
        })
    
        let data2 = new FormData();
            data2.append("doc",$e);
            data2.append("funcion", "datosApi");

        fetch('../inc/consultasrrhh.inc.php',{
            method: "POST",
            body:data2,
        })
        .then(function(response){
            return response.json();
        })
        .then(dataJson=>{
            if(dataJson.existe){
                $numero__registro.value = dataJson.datos[0].cut;
                $nombres__apellidos.value = dataJson.datos[0].paterno+" "+dataJson.datos[0].materno+" "+dataJson.datos[0].nombres;
                $correo__electronico.value = dataJson.datos[0].correo;
                $documento__identidad.value = dataJson.datos[0].dni;
                $cargo__trabajador.value = dataJson.datos[0].cargo;
                $centro_costos.value =dataJson.datos[0].ccostos.slice(0,4) +" "+dataJson.datos[0].sede;
                $edad__trabajador.value = dataJson.datos[0].edad;
                $sede__trabajador.value = dataJson.datos[0].sucursal;
                $sexo__trabajador.value = dataJson.datos[0].sexo;
                $fecha__nacimiento.value = dataJson.datos[0].nacimiento.slice(0,10);
                $estado__trabajador.value = dataJson.datos[0].estado;
                $nombres_trabajador.value =  dataJson.datos[0].paterno+" "+dataJson.datos[0].materno+" "+dataJson.datos[0].nombres;
                $direccion__trabajador.value = dataJson.datos[0].direccion;
                $telefono__trabajador.value = dataJson.datos[0].telefono;
            }
        })
}

$uploadFile.onchange = (e) =>{//para la carga masiva de PDFs
    e.preventDefault();

    var totalFiles = $uploadFile.files.length;

    if(totalFiles>0){
        if(totalFiles>20){
            mostrarMensaje("Limite 20 archivos","msj_error");//mostrar exceso
        }
        else{
            try {
                if(validar($uploadFile)) throw 'Archivo no valido';
                const formData = new FormData();

                for(var index=0; index<totalFiles;index++){
                    formData.append('files', $uploadFile.files[index]);

                    fetch('../inc/importarMasivaPdf.inc.php',{
                        method: 'POST',
                        body : formData 
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.respuesta) {
                            mostrarMensaje("Documento subido","msj_correct");
                        }else{
                            mostrarMensaje("Hubo un error al subir el archivo","msj_error");
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    })
                }
                listarExamenes();
            } catch (error) {
                mostrarMensaje(error,"msj_error");
            }
        }
    }else{
        mostrarMensaje("elija un documento","msj_error");
    }
}

$nombres_trabajador.onkeypress = (e) => {
    var keycode = e.keyCode || e.which;
  if (keycode == 13) {
    try {
        if ($nombres_trabajador.value == "" && $documento_trabajador.value == "") throw "Ingrese un valor";
        $documento_trabajador.value = "";
        listarNombres(e.target.value);

    } catch (error) {
        mostrarMensaje(error,"msj_error");
    }
  }
}

function listarNombres($e){
    let data2 = new FormData();
    data2.append("documento",$e);
    data2.append("funcion","buscarEmpleados");

    fetch('../inc/consultasrrhh.inc.php',{
        method: "POST",
        body: data2,
    })
    .then(function(response){
        return response.json();
    })
    .then(dataJson =>{
        if(dataJson.respuesta){
            $tabla__busqueda_body.innerHTML = "";
            
            for (let index = 0; index < dataJson.lista.length; index++) {
                //const btn = "<button id='press'  class='Ver'>Ver</button>";
                let tr = document.createElement("tr");
                tr.innerHTML =`<td>${dataJson.lista[index].dni}</td>
                                <td>${dataJson.lista[index].nombres}</td>
                                <td>${dataJson.lista[index].estado}</td> 
                                <td>${dataJson.lista[index].sede}</td>
                                <td>
                                    <a href="" data-accion2="ingreso"
                                               data-dni="${dataJson.lista[index].dni}"
                                               ><i class="fas fa-address-book"></i></a>
                                </td>
                                `;
                $tabla__busqueda_body.appendChild(tr);   
                
                
            }
        }else{
        mostrarMensaje("No se encontraron empleados","msj_error");}
    })


}
$busqueda_boton.onclick = (e) => {
    e.preventDefault();

    if($radio__dni.click && $nombres_trabajador.value == ""){
        listadoDni($documento_trabajador.value);
        //listarExamenes();
    }
    else if($radio__nombre.click && $documento_trabajador.value==""){
        listarNombres($nombres_trabajador.value);
    }
    else if($radio__nombre.click && $documento_trabajador.value!==""){
        listadoDni($documento_trabajador.value);
        estiloDni();
        $radio__dni.checked=true;
    }
    else if($nombres_trabajador!=="" && $documento_trabajador.value!==""){
        listadoDni($documento_trabajador.value);
        estiloDni();
    }
    else throw  "Ingrese un valor";

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
                fadeIn($form_ingreso)  //por aqui se debe buscar              
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

                let data = new FormData();//aqui es la correccion al cambio de query
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
                        document.getElementById("asunto__correo").value = adjunto;//confirmar nomas uu
                        //(dataJson.ccorreo) + "-EMO-"+ /*tipoEMO */examen+"-"+dataJson.dni+"-"+dataJson.nombres+"-"+clinica+"-"+fecha;
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

/*
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
})*/

$uploadPdf.onchange = (e) => {
    e.preventDefault();

    try {
        if (validar($uploadPdf)) throw 'Archivo inválido. No se permite la extensión ';

        const formData = new FormData();
        formData.append('fileUpload',$uploadPdf.files[0]);
        formData.append('indice',registro);
        fetch ('../inc/cargarHistoriaMedica.inc.php',{
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.respuesta) {
                mostrarMensaje("Documento subido","msj_correct");
                listarExamenes();
                let adjunto = "../hc/"+data.archivo;
               // console.log(adjunto);
                $frame__adjunto.setAttribute("src", adjunto);
                //$opcion2.click();
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
//var editable = true 


$editar_form.onclick = (e) => {
    e.preventDefault();
        if ($editar_form.innerHTML == "Editar"){
            $editar_form.innerHTML = "Editando"
            document.getElementById("direccion__correo").readOnly =false;
            $editar_form.style.backgroundColor = "red";
            $editar_form.style.color = "black";
        }else{
            $editar_form.innerHTML = "Editar";
            document.getElementById("direccion__correo").readOnly =true;
            $editar_form.style.backgroundColor = "green";//ver esto u:
            $editar_form.style.color = "white";
        } 

}

$cierre_form.onclick = (e) => {//cierra el formulario para enviar correos
    e.preventDefault();

    fadeOut($ficha__medica__correo);
  
    $editar_form.innerHTML = "Editar"
    document.getElementById("direccion__correo").readOnly =true;
    $editar_form.style.backgroundColor = "green";//ver esto u:
    $editar_form.style.color = "white";
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

$cambiar_env.onclick = (e) => {
    e.preventDefault();

    try{

        let data = new FormData();
        data.append("examen",document.getElementById("id__examen").value);
        data.append("funcion","buscarEnvio");
        fetch('../inc/consultasmedicas.inc.php',{
            method: "POST",
            body:data,
        })
        .then(function(response){
            return response.json();
        })
        .then(dataJson => {
            if (dataJson.respuesta){
                let formData = new FormData();
                formData.append("examen",document.getElementById("id__examen").value);
                if(dataJson.enviado==1){
                    formData.append("funcion","validarEnvio");
                }
                else{
                    formData.append("funcion","actualizarExamen");
                }
                fetch('../inc/consultasmedicas.inc.php',{
                    method: 'POST',
                    body:formData,
                });
                listarExamenes();
            }
        })

        
        fadeOut($ficha__medica__correo);
    }catch(error){
        mostrarMensaje(error,"msj_error");
    }
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

        fadeOut($ficha__medica__correo);
        //fadeIn(document.getElementById("modal__esperar"));

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
                //fadeOut(document.getElementById("modal__esperar"));
                mostrarMensaje("Examén medico enviado","msj_correct");
            }
            else{
                mostrarMensaje("Hubo un problema", "msj_error")
            }
        });

    } catch (error) {
        mostrarMensaje(error,"msj_error");
    }


    return false
}

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
                    let $cnt_costos = dataJson.lista[index].ccostos == null ? " " : dataJson.lista[index].ccostos ;
                    let $clase_enviado = dataJson.lista[index].enviado == null ? 'no__enviado' : 'enviado';
                    let $titulo_enviado = dataJson.lista[index].enviado == null ? 'Pendiente Envio' : 'Enviado';
                    let $icono_enviado = dataJson.lista[index].enviado == null ? '<i class="fas fa-external-link-alt"></i>' :'<i class="fas fa-check" style="color:green"></i>';
                    let $icono_cargado = dataJson.lista[index].adjunto == null ? '<i class="fas fa-upload"></i>' : '<i class="fas fa-upload" style="color:green"></i>';
                    let $restricciones = dataJson.lista[index].restricciones == null ? " " : dataJson.lista[index].restricciones;
                    let $recomendaciones = dataJson.lista[index].recomendaciones == null ? " " : dataJson.lista[index].recomendaciones; 
                    
                    tr.innerHTML = `<td>${$cnt_costos}</td>
                                    <td>${dataJson.lista[index].clinica}</td>
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

}

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
}


