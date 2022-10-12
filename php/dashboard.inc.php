<?php
    $random = rand(0,1000);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css?v<?php echo $random; ?>" type="text/css">
    <link rel="stylesheet" href="../css/all.css" type="text/css">
    <title>Sepcon Area - Médica</title>
    
</head>
<body>
    <div class="modal_mensaje msj_info" id="mensaje__sistema">
        <span id="mensaje_texto">Vamos a ver si lo muestra</span>
    </div>
    <div class="modal" id="modal__esperar">
        <div class="lds-dual-ring">
        </div>
	</div>
    <div class="main">
        <div class="main__title">
            <div class="main__title__logo">
                  
            </div>
            <div class="main_title_user_data">
                <div class="main__title__img"></div>
                <div class="main__title__description">
                    <p>Jhon Curi</p>
                    <p>Practicante TI</p>
                </div>
            </div>
        </div>
        <div class="main__menu">
            <ul>
                <li><a href="#" title="Ir Inicio"><i class="fas fa-home"></i></a></li>
                <li><a href="#" id="historias" title="Historias Clínicas"><i class="far fa-file-alt"></i></a></li>
                <li><a href="#"><i class="fas fa-chart-bar"></i></a></li>
                <li><a href="#" id="atenciones" target="frame__loader" title="Atenciones Médicas"><i class="fas fa-user-md"></i></a></li>
                <li><a href="#" title="Control de medicamentos"><i class="fas fa-box"></i></a></li>
                <li><a href="#" title="Configuración" id="configuracion"><i class="fas fa-cog"></i></a></li>
            </ul>
        </div>
        <div class="main__loader" id="main__loader">
            <div id="ficha__historias" class="fichas oculto">
                <?php include_once( '../php/historias.inc.php' ); ?>
            </div>

            <div id="ficha__cargar" class="fichas oculto">
                <?php include_once( '../php/cargarHistorias.inc.php' ); ?>
            </div>
        </div>
    </div>
    <script src="../js/funciones.js" type="module"></script>
    <script src="../js/dashboard.js" type="module"></script>
</body>
</html>