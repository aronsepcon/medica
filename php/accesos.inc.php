<?php
    $random = rand(0,1000);

    if($_SESSION['logged'] == false){
        session_unset();
        session_destroy();
        header('location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css?v<?php echo $random; ?>" type="text/css">
    <link rel="stylesheet" href="../css/all.css" type="text/css">
    <title>Sepcon Area - Médica</title>
</head>
<body>
<section class="wrap">
    <section class="accesos">
        <h4>Buscar</h4>
        <input type="text" name="buscar_acceso" id="buscar_acceso" placeholder="ingrese un dni">
        <div>
            <input type="text" id="nombre_acceso" readonly>
            <select name="" id="elegir_acceso">
                <option value="0">Acceso Basico</option>
                <option value="1">Acceso Usuarios</option>
            </select>
        </div>
        <button id="dar_acceso">Dar Acceso</button>
    </section>
    <section>
        <h4>Terceros</h4>
        <label for="ruc_terceros">Ruc</label>
        <input type="text" id="ruc_terceros">
        <label for="nombre_terceros">Nombre</label>
        <input type="text" id="nombre_terceros">
        <button id="registrar_terceros">Registrar</button>
    </section>
</section> 
<script src="../js/accesos.js?v<?php echo $random;?>" type="module"></script>
</body>
</html>