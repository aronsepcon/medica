import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import { validar } from "./funciones.js";

(function(){
const $opcion1_sc = document.getElementById('opcion1_sc');
const $opcion2_sc = document.getElementById('opcion2_sc');
const $opcion3_sc = document.getElementById('opcion3_sc');
const $opcion4_sc = document.getElementById('opcion4_sc');
const $opcion5_sc = document.getElementById('opcion5_sc');

const $pagina1_sc = document.getElementById('pagina1_sc');
const $pagina2_sc = document.getElementById('pagina2_sc');
const $pagina3_sc = document.getElementById('pagina3_sc');
const $pagina4_sc = document.getElementById('pagina4_sc');
const $pagina5_sc = document.getElementById('pagina5_sc');

const $documento_trabajador_sc = document.getElementById('documento_trabajador_sc');
const $tabla__examenes_body = document.getElementById('tabla__examenes_body_sc');

const $busqueda_boton_sc = document.getElementById('busqueda_boton_sc');
const $actualizarSubcontratas = document.getElementById('actualizarSubcontratas');

const $numero__registro_sc = document.getElementById('numero__registro_sc');
const $correo__electronico_sc = document.getElementById('correo__electronico_sc'); 
const $nombres__apellidos_sc = document.getElementById('nombres__apellidos_sc');
const $documento__identidad_sc = document.getElementById('documento__identidad_sc');
const $sexo__trabajador_sc = document.getElementById('sexo__trabajador_sc');
const $cargo__trabajador_sc = document.getElementById('cargo__trabajador_sc');
const $centro_costos_sc = document.getElementById('centro_costos_sc');
const $sede__trabajador_sc = document.getElementById('sede__trabajador_sc');
const $estado__trabajador_sc = document.getElementById('estado__trabajador_sc');
const $fecha__nacimiento_sc = document.getElementById('fecha__nacimiento_sc');
const $telefono__trabajador_sc = document.getElementById('telefono__trabajador_sc');
const $edad__trabajador_sc = document.getElementById('edad__trabajador_sc');
const $direccion__trabajador_sc = document.getElementById('direccion__trabajador_sc');
const $empresa__trabajador_sc = document.getElementById('empresa__trabajador_sc');

    $opcion1_sc.onclick = (e) => {
        e.preventDefault();

        document.querySelectorAll(".historias__vertical__menu a").forEach(el => {
            el.classList.remove('resaltado');
        });

        document.querySelectorAll(".historias__cuerpo__pagina").forEach(el => {
            el.classList.add('oculto');
        })

        $opcion1_sc.classList.add('resaltado');
        $pagina1_sc.classList.remove('oculto');
        
    return false;
    }

    $opcion2_sc.onclick = (e) => {
        e.preventDefault();

        try {
            if ($documento_trabajador_sc.value == "") throw "Ingrese el número de documento";

            document.querySelectorAll(".historias__vertical__menu a").forEach(el => {
                el.classList.remove('resaltado')
            });
        
            document.querySelectorAll(".historias__cuerpo__pagina").forEach(el => {
                el.classList.add('oculto');
            })
        
            $opcion2_sc.classList.add('resaltado');
            $pagina2_sc.classList.remove('oculto');

        } catch (error) {
            mostrarMensaje(error,"msj_error");
        }

    return false;
    }

    $opcion3_sc.onclick = (e) => {
        e.preventDefault();

        try{

            if ($documento_trabajador_sc.value == "") throw "Ingrese el número de documento";

            document.querySelectorAll(".historias__vertical__menu a").forEach(el => {
                el.classList.remove('resaltado')
            });

            document.querySelectorAll(".historias__cuerpo__pagina").forEach(el => {
                el.classList.add('oculto');
            })

            $opcion3_sc.classList.add('resaltado');
            $pagina3_sc.classList.remove('oculto');
            

        }catch(error){
            mostrarMensaje(error,"msj_error");
        }

    return false;
    }

    $opcion4_sc.onclick = (e) => {
        e.preventDefault();

        try{

            if ($documento_trabajador_sc.value == "" ) throw "Ingrese el número de documento";

            document.querySelectorAll(".historias__vertical__menu a").forEach(el => {
                el.classList.remove('resaltado')
            });

            document.querySelectorAll(".historias__cuerpo__pagina").forEach(el => {
                el.classList.add('oculto');
            })

            $opcion4_sc.classList.add('resaltado');
            $pagina4_sc.classList.remove('oculto');

        }catch(error){
            mostrarMensaje(error,"msj_error");
        }
        
    return false;
    }

    $opcion5_sc.onclick = (e) => {
        e.preventDefault();

        document.querySelectorAll(".historias__vertical__menu a").forEach(el => {
            el.classList.remove('resaltado')
        });

        document.querySelectorAll(".historias__cuerpo__pagina").forEach(el => {
            el.classList.add('oculto');
        })

        $opcion5_sc.classList.add('resaltado');
        $pagina5_sc.classList.remove('oculto');
        
    return false;
    }

    $busqueda_boton_sc.onclick = (e) => {
        e.preventDefault();
        try {
            if ($documento_trabajador_sc.value == "") throw "Ingrese el numero de documento";

            //ver el cambio sino asi mas directo         
            listadoDni($documento_trabajador_sc.value);
            console.log($documento_trabajador_sc.value);
        } catch (error) {
            mostrarMensaje(error,"msj_error");
        }
    }
    /*
    $documento_trabajador_sc.onkeydown = (e) => {
        var keycode = e.key ;
        if (keycode === 'Enter') {
            try {
                if ($documento_trabajador_sc.value == "") throw "Ingrese el numero de documento";

                //ver el cambio sino asi mas directo         
                listadoDni(e.target.value);
                console.log($documento_trabajador_sc.value);
            } catch (error) {
                mostrarMensaje(error,"msj_error");
            }
        }
    }*/
  
    function listadoDni($e){
        try {
                let data4 = new FormData();
                    data4.append("doc",$e);
                    data4.append("funcion", "datosEmpleados");
                    listarExamenes();
                fetch('../inc/consultasmedicas.inc.php',{
                    method: "POST",
                    body:data4,
                })
                .then(function(response){
                    console.log(response.status);
                    return response.json();
                })
                .then(dataJson=>{
                    if(dataJson.respuesta){
                        
                        $numero__registro_sc.value = dataJson.lista[0].cut;
                        $nombres__apellidos_sc.value = dataJson.lista[0].nombres;
                        $correo__electronico_sc.value = dataJson.lista[0].correo ;
                        $documento__identidad_sc.value =dataJson.lista[0].dni;
                        $cargo__trabajador_sc.value = dataJson.lista[0].cargo;
                        $centro_costos_sc.value = dataJson.lista[0].ccostos;
                        $edad__trabajador_sc.value = dataJson.lista[0].edad;//aqui xd
                        $sede__trabajador_sc.value = dataJson.lista[0].sede;
                        $sexo__trabajador_sc.value = dataJson.lista[0].sexo;
                        $fecha__nacimiento_sc.value = dataJson.lista[0].fecnac;//aqui tmb
                        $estado__trabajador_sc.value = dataJson.lista[0].estado;
                        $direccion__trabajador_sc.value = dataJson.lista[0].direccion ;
                        $telefono__trabajador_sc.value = dataJson.lista[0].telefono;     
                        $empresa__trabajador_sc.value = dataJson.lista[0].empresa;  
                    } 
                });
        } catch (error) {
            mostrarMensaje(error,"msj_error");
            console.log(error);
        }
    }
    
    
    $actualizarSubcontratas.onclick = (e) => {
        e.preventDefault();
        try {
            console.log($empresa__trabajador_sc.value);
            let fec_nac= new Date($fecha__nacimiento_sc.value.slice(0,10)).getTime();
            let diff_mes = Date.now()-fec_nac;
            let edad1 = new Date(diff_mes);
            let año = edad1.getUTCFullYear();
            let edad = Math.abs(año-1970);
            let data = new FormData();
                data.append("cut",$numero__registro_sc.value);
                data.append("empleado",$nombres__apellidos_sc.value);
                data.append("correo",$correo__electronico_sc.value);
                data.append("dni",$documento__identidad_sc.value);
                data.append("cargo",$cargo__trabajador_sc.value);
                data.append("ccostos",$centro_costos_sc.value);
                data.append("edad",edad);
                data.append("sede",$sede__trabajador_sc.value);
                data.append("sexo",$sexo__trabajador_sc.value);
                data.append("fecnac",$fecha__nacimiento_sc.value);
                data.append("estado",$estado__trabajador_sc.value);
                data.append("direccion",$direccion__trabajador_sc.value);
                data.append("telefono",$telefono__trabajador_sc.value);
                data.append("empresa",$empresa__trabajador_sc.value);
                data.append("funcion","actualizarEmpleado");
            fetch('../inc/consultasmedicas.inc.php',{
                method: "POST",
                body:data,
            })
            .then(function(response){
                console.log("status:"+response.status);
                //console.log(response.json());
                return response.json();
            })  
            .then(dataJson => {
                if (dataJson.respuesta){
                    mostrarMensaje("Se ha actualizado el registro","msj_correct");
                }else{
                    mostrarMensaje("Hubo un problema con el servidor","msj_error");
                }
            })
        } catch (error) {
            mostrarMensaje(error,"msj_error");
        }
    }
    
    function listarExamenes(){

        let data = new FormData();
        data.append("documento",$documento_trabajador_sc.value);
        data.append("funcion","listarExamenes");
  
        fetch('../inc/consultasmedicas.inc.php',{
            method: "POST",
            body:data,
        }).then(function(response){
            return response.json();
        }).then(dataJson => {
            if (dataJson.respuesta){
                $tabla__examenes_body.innerHTML = "";
    
                for (let index = 0; index < dataJson.lista.length; index++) {
                    let tr = document.createElement("tr");
                    let $cnt_costos = dataJson.lista[index].ccostos == null ? " " : dataJson.lista[index].ccostos ;
                    let $clase_enviado = dataJson.lista[index].enviado == null ? 'no__enviado' : 'enviado';
                    let $titulo_enviado = dataJson.lista[index].enviado == null ? 'Pendiente Envio' : 'Enviado';
                    let $sangre_tipo = dataJson.lista[index].sangre == null ? "" : dataJson.lista[index].sangre;
                    let $icono_enviado = dataJson.lista[index].enviado == null ? '<i class="fas fa-external-link-alt"></i>' :'<i class="fas fa-check" style="color:green"></i>';
                    let $icono_cargado = dataJson.lista[index].adjunto == null ? '<i class="fas fa-upload"></i>' : '<i class="fas fa-upload" style="color:green"></i>';
                    let $restricciones = dataJson.lista[index].restricciones == null ? " " : dataJson.lista[index].restricciones;
                    let $recomendaciones = dataJson.lista[index].recomendaciones == null ? " " : dataJson.lista[index].recomendaciones; 
                    console.log(dataJson.lista[index].clinica);
                    tr.innerHTML = `<td>${$cnt_costos}</td>
                                    <td>${dataJson.lista[index].clinica}</td>
                                    <td class="pl10px">${dataJson.lista[index].tipo}</td>
                                    <td>${dataJson.lista[index].fecha}</td>
                                    <td>${dataJson.lista[index].aptitud}</td>
                                    <td>${$recomendaciones}</td>
                                    <td>${$restricciones}</td>
                                    <td>${dataJson.lista[index].alergias}</td>
                                    <td>${$sangre_tipo}</td>
                                    <td><a href="${dataJson.lista[index].id}" data-accion="abrirHistoria"><i class="fas fa-address-book"></a></td>
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

})()