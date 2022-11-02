<?php
    session_start();
    $random = rand(0,1000);
    
    if($_SESSION['logged'] == false){
        session_unset();
        session_destroy();
        header('location: ../index.php');
    }
   // echo $_SESSION['sede'];
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
                    <p>Bienvenido</p>
                    <p><?php echo $_SESSION['nombres']?></p>
                </div>
                <a href="../inc/logout.inc.php" class="href">Cerrar</a>
            </div>
        </div>
        <div class="main__menu">
            <ul>
                <li><a href="#" title="Ir Inicio"><i class="fas fa-home"></i></a></li>
                <li><a href="#" id="historias" title="Historias Clínicas"><i class="far fa-file-alt"></i></a></li>
                <li><a href="#"><i class="fas fa-chart-bar"></i></a></li>
                <li><a href="#" title="Control de medicamentos"><i class="fas fa-box"></i></a></li>
                <li><a href="#" id="atenciones" title="Atenciones Médicas"><i class="fas fa-user-md"></i></a></li><!-- target="frame__loader"-->
                <li><a href="#" title="Subida" id="configuracion"><i class="fas fa-file-upload"></i></a></li>
            <?php if($_SESSION['acceso']==1){?>
                <li><a href="#" title="Permisos" id="permisos"><i class="fas fa-cog" style="display: block;margin-top: 21.5px;"></i></a></li>
            <?php }else{?>
                <li><a href="#" title="Permisos" id="permisos"><i class="fas fa-cog" style="display: none;"></i></a></li>
            <?php }?>
            </ul>
        </div>
        <div class="main__loader" id="main__loader">
            <div id="ficha__historias" class="fichas oculto">
                <?php include_once( '../php/historias.inc.php' ); ?>
            </div>

            <div id="ficha__cargar" class="fichas oculto">
                <?php include_once( '../php/cargarHistorias.inc.php' ); ?>
            </div>

            <div id="permisos_panel" class="permisos_panel" style="display: none;">
                <?php include_once('../php/accesos.inc.php');?>
            </div>
        </div>
    </div>
    <script src="../js/funciones.js" type="module"></script>
    <script src="../js/dashboard.js" type="module"></script>
</body>
</html>