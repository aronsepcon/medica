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
    <section class="creacion_formatos">
        <div>
            <span>Centro de Costo</span>
            <select name="" id="ccostos">
                <option value="0">0200</option>
                <option value="1">0300</option>
                <option value="2">0600</option>
                <option value="3">2800</option>
                <option value="4">2600</option>
            </select>
            <span class="span_formato">Formato</span>
            <select name="" id="formato">
                <option value="0">001</option>
                <option value="1">006</option>
            </select>
            <span class="span_formato">DNI</span>
            <input type="text" id="dni_formato">
        </div>
        <div>
            <button type="button" id="buscar">Buscar</button>
            <button type="button" id="exportar">Exportar</button>
            <a href="" download id="descarga_formato" class="oculto"></a>
        </div>
        <div class="historias__tabla bars oculto" id="tabla_006">
            <table class="w100porcen">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Apellidos y Nombres</th>
                        <th>Fecha de Nacimiento</th>
                        <th>DNI</th>
                        <th>Edad</th>
                        <th>AREA DE TRABAJO</th>
                        <th>PUESTO DE TRABAJO</th>
                        <th>EMPRESA</th>
                        <th>CORREO ELECTRONICO</th>
                        <th>CELULAR</th>
                        <th>GRUPO SANG. Y RH</th>
                        <th>ALERGIAS</th>
                        <th>FECHA EMO</th>
                        <th>CLINICA</th>
                        <th>CONDICIÓN</th>
                        <th>PESO</th>
                        <th>TALLA</th>
                        <th>IMC</th>
                        <th>CLASIFICACION</th>
                        <th>ENVIO DE EMO EMAIL</th>
                        <th>PROGRAMADO</th>
                        <th>REALIZADO</th>
                        <th>CLINICA</th>
                        <th>CONDICIÓN</th>
                        <th>PESO</th>
                        <th>TALLA</th>
                        <th>IMC</th>
                        <th>CLASIFICACION</th>
                        <th>ENVIO DE EMO EMAIL</th>
                        <th>PROGRAMADO</th>
                        <th>REALIZADO</th>
                        <th>CLINICA</th>
                        <th>CONDICIÓN</th>
                        <th>PESO</th>
                        <th>TALLA</th>
                        <th>IMC</th>
                        <th>CLASIFICACION</th>
                        <th>ENVIO DE EMO EMAIL</th>
                        <th>REALIZADO</th>
                        <th>CLÍNICA</th>
                        <th>OBSERVACIÓNES</th>
                        <th>ENVIO DE EMO EMAIL</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tabla_formato_006"></tbody>
            </table>
        </div>
        
        <div class="historias__tabla bars" id="tabla_001">
            <table  class="w100porcen">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Año</th>
                        <th>N° HC</th>
                        <th>DNI</th>
                        <th>Apellidos y Nombres</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Puesto de trabajo</th>
                        <th>Area</th>
                        <th>Empresa</th>
                        <th>Centro de Costo</th>
                        <th>Proyecto</th>
                        <th>Fecha EMO</th>
                        <th>Tipo de Examen</th>
                        <th>Clinica</th>
                        <th>Aptitud</th>
                        <th>N° Pase Medico</th>
                        <th>Programado</th>
                        <th>Antec. Riesg. Ocupacional</th>
                        <th>Antec. Pat. Personales</th>
                        <th>Alergias</th>
                        <th>Grupo Sanguineo</th>
                        <th>Presion Arterial</th>
                        <th>Peso(kg)</th>
                        <th>Talla(mt)</th>
                        <th>IMC</th>
                        <th>Estado Nutricional</th>
                        <th>Espirometria</th>
                        <th>Ex. Rayos X</th>


                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </section>
</section>
<script src="../js/xlsx.full.min.js"></script>
<script src="../js/formatos.js?v<?php echo $random;?>" type="module"></script>
</body>
</html>