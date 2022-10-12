<?php
    $random = rand(0,1000);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v<?php echo $random; ?>" type="text/css">
    <script src="js/historias.js"></script>
    <title>Sepcon Area - Médica</title>
</head>
<body>
<div class="modal_mensaje">
    <span id="mensaje_texto">Vamos a ver si lo muestraaa</span>
</div>
<div class="modal" id="modalEsperar">
    <button type="button" id="cierre_form_ing">X</button>
        <div class="loadingio-spinner-spinner-5ulcsi06hlf">
            <div class="ldio-fifgg00y5y">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
<div class="formulario-container">
    <form action="" ><!--id="form_ingreso"-->
        <div class="container">
            <div class="group">      
                <input type="text" id="user_login" name="user_login" required >
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Nombre</label>
            </div>
            <div class="group">      
                <input type="password" id="user_password" name="user_password" required >
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Contraseña</label>
            </div>
            <button id="boton_login">Ingresar</button>
        </div>
    </form>
</div>
<script src="js/index.js?v<?php echo $random; ?>"></script>
</body>
</html>