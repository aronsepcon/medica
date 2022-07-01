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
                <li><a href="../php/historias.inc.php" id="historias" target="frame__loader" title="Historias Clínicas"><i class="far fa-file-alt"></i></a></li>
                <li><a href="#"><i class="fas fa-chart-bar"></i></a></li>
                <li><a href="../php/atenciones.inc.php" id="atenciones" target="frame__loader" title="Atenciones Médicas"><i class="fas fa-user-md"></i></a></li>
                <li><a href="#" title="Control de medicamentos"><i class="fas fa-box"></i></a></li>
                <li><a href="#" title="Configuración"><i class="fas fa-cog"></i></a></li>
            </ul>
        </div>
        <div class="main__loader">
            <iframe src="" frameborder="0" id="frame__loader" name="frame__loader"></iframe>
        </div>
    </div>
    <script src="../js/dashboard.js"></script>
</body>
</html>