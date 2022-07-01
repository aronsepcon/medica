const $menu_vertical = document.getElementsByClassName('menu-historias__vertical__menu');
const $opcion1 = document.getElementById('opcion1');
const $opcion2 = document.getElementById('opcion2');
const $opcion3 = document.getElementById('opcion3');
const $opcion4 = document.getElementById('opcion4');
const $opcion5 = document.getElementById('opcion5');
const $opcion6 = document.getElementById('opcion6');
const $opciones = document.querySelector(".historias__vertical__menu a");

const $pagina1 = document.getElementById('pagina1');
const $pagina2 = document.getElementById('pagina2');
const $pagina3 = document.getElementById('pagina3');
const $pagina4 = document.getElementById('pagina4');
const $pagina5 = document.getElementById('pagina5');
const $pagina6 = document.getElementById('pagina6');


const $documento_trabajador = document.getElementById('documento_trabajador');

const $numero__registro = document.getElementById('numero__registro');
const $documento__identidad = document.getElementById('documento__identidad'); 
const $nombres__apellidos = document.getElementById('nombres__apellidos');
const $fecha__nacimiento =  document.getElementById('fecha__nacimiento');
const $tipo__examen =   document.getElementById('tipo__examen');


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

    document.querySelectorAll(".historias__vertical__menu a").forEach(el => {
        el.classList.remove('resaltado')
    });

    document.querySelectorAll(".historias__cuerpo__pagina").forEach(el => {
        el.classList.add('oculto');
    })

    $opcion2.classList.add('resaltado');
    $pagina2.classList.remove('oculto');
    
   return false;
}

$opcion3.onclick = (e) => {
    e.preventDefault();

    document.querySelectorAll(".historias__vertical__menu a").forEach(el => {
        el.classList.remove('resaltado')
    });

    document.querySelectorAll(".historias__cuerpo__pagina").forEach(el => {
        el.classList.add('oculto');
    })

    $opcion3.classList.add('resaltado');
    $pagina3.classList.remove('oculto');
    
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

$opcion6.onclick = (e) => {
    e.preventDefault();

    document.querySelectorAll(".historias__vertical__menu a").forEach(el => {
        el.classList.remove('resaltado')
    });

    document.querySelectorAll(".historias__cuerpo__pagina").forEach(el => {
        el.classList.add('oculto');
    })

    $opcion6.classList.add('resaltado');
    $pagina6.classList.remove('oculto');
    
   return false;
}


$documento_trabajador.onkeypress = (e) => {
  var keycode = e.keyCode || e.which;
  if (keycode == 13) {
    $numero__registro.value = "006071";
    $documento__identidad.value = "20036250";
    $nombres__apellidos.value = "CESAR AURELIO ARROYO NUÑEZ";
    $fecha__nacimiento.value = "1972-02-25";
    $tipo__examen.value = "ANUAL";
  }
}
