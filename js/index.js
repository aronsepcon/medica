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

        window.location.href = "php/dashboard.inc.php";
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