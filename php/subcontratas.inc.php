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
    <title>Document</title>
</head>
<body>
<section class="wrap">
    <section class="historias__cuerpo">
        <section class="historias__cuerpo__pagina bars" > 
            <div>
                <form id="formulario_datos_trabajador">
                    <div>
                        <h3>Datos del trabajador</h3>
                        <div class="formulario_datos_trabajador_4columnas">
                            <label for="numero__registro">N° Registro</label>
                            <input type="text" name="numero__registro" readonly>
                            <label for="documento__identidad">Documento Identidad</label>
                            <input type="text" name="documento__identidad" readonly>
                            <label for="nombres__apellidos">Nombres y apellidos</label>
                            <input type="text" name="nombres__apellidos" readonly>
                            <label for="fecha__nacimiento">Fecha Nacimiento</label>
                            <input type="date" name="fecha__nacimiento" readonly>
                            <label for="correo__electronico">Correo Electrónico</label>
                            <input type="text" name="correo__electronico">
                            <label for="sexo__trabajador">Sexo :</label>
                            <input type="text" name="sexo__trabajador" readonly>
                            <label for="cargo__trabajador">Cargo :</label>
                            <input type="text" name="cargo__trabajador" readonly>
                            <label for="centro_costos">Centro de Costos :</label>
                            <input type="text" name="centro_costos" readonly>
                            <label for="sede__trabajador">Sede :</label>
                            <input type="text" name="sede__trabajador" readonly>
                            <label for="estado__trabajador">Estado :</label>
                            <input type="text" name="estado__trabajador" readonly>
                            <label for="direccion__trabajador">Dirección :</label>
                            <input type="text" name="direccion__trabajador">
                            <label for="edad__trabajador">Edad :</label>
                            <input type="text" name="edad__trabajador" readonly>
                            <label for="telefono__trabajador">Telefono :</label>
                            <input type="text" name="telefono__trabajador">
                        </div> 
                        <button type="button">Actualizar</button>
                    </div>
                </form>
            </div>
        </section>
    </section>
</section>
<script src=""></script>
</body>
</html>