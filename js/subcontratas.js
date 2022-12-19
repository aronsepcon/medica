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

const $busqueda_boton = document.getElementById('busqueda_boton');
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
    }
  
    function listadoDni($e){
        try {
                let data4 = new FormData();
                    data4.append("doc",$e);
                    data4.append("funcion", "datosEmpleados");
                
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
            let data = new FormData();
                data.append("cut",$numero__registro_sc.value);
                data.append("empleado",$nombres__apellidos_sc.value);
                data.append("correo",$correo__electronico_sc.value);
                data.append("dni",$documento__identidad_sc.value);
                data.append("cargo",$cargo__trabajador_sc.value);
                data.append("ccostos",$centro_costos_sc.value);
                data.append("edad",$edad__trabajador_sc.value);
                data.append("sede",$sede__trabajador_sc.value);
                data.append("sexo",$sexo__trabajador_sc.value);
                data.append("fecnac",$fecha__nacimiento_sc.value);
                data.append("estado",$estado__trabajador_sc.value);
                data.append("direccion",$direccion__trabajador_sc.value);
                data.append("telefono",$telefono__trabajador_sc.value);
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
})()