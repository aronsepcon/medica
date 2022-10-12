
export function mostrarMensaje(mensaje,clase){
    const $ventana_mensaje = document.getElementById("mensaje__sistema");
    const $mensaje_ventana = document.getElementById("mensaje_texto");

    $mensaje_ventana.innerHTML = mensaje;
    $ventana_mensaje.className = "modal_mensaje " + clase;
    $ventana_mensaje.style.right = 0;

    setTimeout(function() {
        $ventana_mensaje.style.right = "-100%";
    },3500)
}

/*  Funciones  */
export function fadeIn(element) {
    element.style.display = "block";
    element.style.opacity = 0.1;
    let op = 0;
    var timer = setInterval(() => {
        if (op >= 1) {
            clearInterval(timer);
        }

        op += 0.1;
        element.style.opacity = op;
    }, 50);
}

export function fadeOut(element) {
    element.style.opacity = 1;
    let op = 1;
    var timer = setInterval(() => {
        if (op <= 0) {
            clearInterval(timer);
            element.style.display = "none";
        }

        op -= 0.1;
        element.style.opacity = op;
    }, 50);
}

export function validar($fileUpload) {
    // Obtener nombre de archivo
    let archivo = $fileUpload.value,
    // Obtener extensión del archivo
        extension = archivo.substring(archivo.lastIndexOf('.'),archivo.length);
    // Si la extensión obtenida no está incluida en la lista de valores
    // del atributo "accept", mostrar un error.
    if($fileUpload.getAttribute('accept').split(',').indexOf(extension) < 0) {
        return true;
    }else {
        return false;
    }
}
