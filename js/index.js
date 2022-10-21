//import {mostrarMensaje} from "./funciones.js";

const $boton_login = document.getElementById('boton_login');
const $user_login = document.getElementById('user_login');
const $user_password = document.getElementById('user_password');

const $modal_mensaje = document.getElementsByClassName('modal_mensaje')[0];
const $mensaje = document.getElementById('mensaje_texto');


$boton_login.onclick = (e) => {
    e.preventDefault();

    try {
        if ($user_login.value == "") throw "Ingrese su usuario";
        if ($user_password.value == "") throw "Ingrese su clave";

        let data = new FormData();
        data.append('login',$user_login.value);
        data.append('clave',$user_password.value)
        data.append('funcion','validarClave')

        fetch('./inc/consultasrrhh.inc.php',{
            method: "POST",
            body: data,
        })
        .then(function(response){
            return response.json();
        })
        .then(data => {
            if(data.respuesta){
                window.location.href = "php/dashboard.inc.php";
            }else{
                mostrarMensajes("contraseña erronea","msj_error");
            }
        });

        //window.location.href = "php/dashboard.inc.php";
    } catch (error) {
        mostrarMensajes(error,"msn_error");
    }

    return false;
}

mostrarMensajes = (mensaje,clase) => {
    $mensaje.innerHTML = mensaje;
    $modal_mensaje.className = "modal_mensaje "+ clase;
    $modal_mensaje.style.right = 0;

    setTimeout(function() {
        $modal_mensaje.style.right = "-100%";
    },3500)
}