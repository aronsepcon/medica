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
                <option value="3">2830</option>
                <option value="4">3100</option>
            </select>
            <span class="span_formato">Formato</span>
            <select name="" id="formato">
                <option value="0">001</option>
                <option value="1">006</option>
            </select>
            <span class="span_formato">DNI</span>
            <input type="text" id="dni_formato">
            <label for="activo_sc" id="label_ac">Activo</label>
            <input type="checkbox" name="estado" id="activo_sc">
            <label for="cesado_sc">Cesado</label>
            <input type="checkbox" name="estado" id="cesado_sc">
        </div>
        <div>
            <button type="button" id="buscar">Buscar</button>
            <button type="button" id="exportar">Exportar</button>
            <button type="button" id="probar" >Probar</button>
            <a href="" id="descarga_formato" class="oculto" download></a>
        </div>
        <div class="historias__tabla bars oculto" id="tabla_006">
            <table class="w100porcen">
                <thead>
                    <tr>
                        <th colspan="12"></th>
                        <th colspan="8" style="background-color: lightblue;">EXAMEN PREOCUPACIONAL</th>
                        <th colspan="19" style="background-color: #007EFC;">EXAMEN PERIODICO</th>
                        <th colspan="4">EMO RETIRO</th>
                        <th style="background-color: yellowgreen;">Fiebre Amarilla</th>
                        <th colspan="4" style="background-color: grey;">Difteria Tetano </th>
                        <th colspan="3">Hepatitis A</th>
                        <th colspan="3">Hepatitis B</th>
                        <th colspan="2">Influenza</th>
                        <th colspan="1">Poliomelitis</th>
                        <th colspan="1">Trivirica</th>
                        <th colspan="4">Rabia</th>
                        <th colspan="2">Tifoidea</th>
                        <th colspan="2">Neumococo</th>
                        <th colspan="4">COVID-19</th>
                    </tr>
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
                        <th>PROGRAMADO</th>
                        <th>REALIZADO</th>
                        <th>CLÍNICA</th>
                        <th>OBSERVACIÓNES</th>
                        <th>ENVIO DE EMO EMAIL</th>
                        <th>1ra Dosis</th>
                        <th>1ra Dosis</th>
                        <th>2da Dosis</th>
                        <th>3ra Dosis</th>
                        <th>Refuerzo</th>
                        <th>1ra Dosis</th>
                        <th>2da Dosis</th>
                        <th>Refuerzo</th>
                        <th>1ra Dosis</th>
                        <th>2da Dosis</th>
                        <th>3ra Dosis</th>
                        <th>1ra Dosis</th>
                        <th>Refuerzo</th>
                        <th>1ra Dosis</th>
                        <th>1ra Dosis</th>
                        <th>1ra Dosis</th>
                        <th>2da Dosis</th>
                        <th>3ra Dosis</th>
                        <th>Refuerzo</th>
                        <th>1ra Dosis</th>
                        <th>Refuerzo</th>
                        <th>1ra Dosis</th>
                        <th>Refuerzo</th>
                        <th>1ra Dosis</th>
                        <th>2da Dosis</th>
                        <th>3ra Dosis</th>
                        <th>4ta Dosis</th>
                    </tr>
                </thead>
                <tbody id="tabla_formato_006"></tbody>
            </table>
        </div>
        <div class="historias__tabla bars oculto" id="tabla_006_oficina">
            <table class="w100porcen">
                <thead>
                    <tr>
                        <th colspan="12"></th>
                        <th colspan="8" style="background-color: lightblue;">EXAMEN PREOCUPACIONAL</th>
                        <th colspan="45" style="background-color: #007EFC;">EXAMEN PERIODICO</th>
                        <th colspan="4">EMO RETIRO</th>
                        <th style="background-color: yellowgreen;">Fiebre Amarilla</th>
                        <th colspan="4" style="background-color: grey;">Difteria Tetano </th>
                        <th colspan="3">Hepatitis A</th>
                        <th colspan="3">Hepatitis B</th>
                        <th colspan="2">Influenza</th>
                        <th colspan="1">Poliomelitis</th>
                        <th colspan="1">Trivirica</th>
                        <th colspan="4">Rabia</th>
                        <th colspan="2">Tifoidea</th>
                        <th colspan="2">Neumococo</th>
                        <th colspan="4">COVID-19</th>
                    </tr>
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
                        <th>1ra Dosis</th>
                        <th>1ra Dosis</th>
                        <th>2da Dosis</th>
                        <th>3ra Dosis</th>
                        <th>Refuerzo</th>
                        <th>1ra Dosis</th>
                        <th>2da Dosis</th>
                        <th>Refuerzo</th>
                        <th>1ra Dosis</th>
                        <th>2da Dosis</th>
                        <th>3ra Dosis</th>
                        <th>1ra Dosis</th>
                        <th>Refuerzo</th>
                        <th>1ra Dosis</th>
                        <th>1ra Dosis</th>
                        <th>1ra Dosis</th>
                        <th>2da Dosis</th>
                        <th>3ra Dosis</th>
                        <th>Refuerzo</th>
                        <th>1ra Dosis</th>
                        <th>Refuerzo</th>
                        <th>1ra Dosis</th>
                        <th>Refuerzo</th>
                        <th>1ra Dosis</th>
                        <th>2da Dosis</th>
                        <th>3ra Dosis</th>
                        <th>4ta Dosis</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="historias__tabla bars" id="tabla_001">
            <table  class="w100porcen">
                <thead>
                    <tr>
                        <th colspan="83" ></th>
                        <th style="background-color: yellowgreen;">Fiebre Amarilla</th>
                        <th colspan="4" style="background-color: grey;">Difteria Tetano </th>
                        <th colspan="3">Hepatitis A</th>
                        <th colspan="3">Hepatitis B</th>
                        <th colspan="2">Influenza</th>
                        <th colspan="1">Poliomelitis</th>
                        <th colspan="1">Trivirica</th>
                        <th colspan="4">Rabia</th>
                        <th colspan="2">Tifoidea</th>
                        <th colspan="2">Neumococo</th>
                        <th colspan="4">COVID-19</th>
                    </tr>
                    <tr>
                        <th>N°</th>
                        <th>Año</th>
                        <th>N° HC</th>
                        <th>DNI</th>
                        <th>Apellidos y Nombres</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Puesto de trabajo</th>
                        <th width="3%">Area</th>
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
                        <th>Ev. Oftalmologica</th>
                        <th>Otoscopia</th>
                        <th>Ex. Audiometrico</th>
                        <th>Ev. Osteomuscular</th>
                        <th>Ex. Odontologico</th>
                        <th>EKG</th>
                        <th>Prueba de Esfuerzo</th>
                        <th>Riesgo Coronario</th>
                        <th>Ex. Psicologico</th>
                        <th>Ex. de Altura</th>
                        <th>Ex. Espacio Confinado</th>
                        <th>Ex. Psicosensometrico</th>
                        <th>HBG/dl</th>
                        <th>HTO%</th>
                        <th>Ex. Gota Gruesa</th>
                        <th>Leucocitos</th>
                        <th>Recuento de Plaquetas</th>
                        <th>Colesterol mg/dl</th>
                        <th>HDL mg/dl</th>
                        <th>LDL mg/dl</th>
                        <th>Trigliceridos mg/dl</th>
                        <th>TGP U/L</th>
                        <th>Glucosa mg/dl</th>
                        <th>Urea mg/dl</th>
                        <th>Ac. Urico mg/dl</th>
                        <th>Creatinina mg/dl</th>
                        <th>VDRL</th>
                        <th>RPD</th>
                        <th>Toxiscreen</th>
                        <th>Ant. de Superf. HepB</th>
                        <th>Parasit. Seriado</th>
                        <th>Hisopado Nasofaringeo</th>
                        <th>Ex. de orina</th>
                        <th>Diagnostico 1</th>
                        <th>CIE-10</th>
                        <th>Diagnostico 2</th>
                        <th>CIE-10</th>
                        <th>Diagnostico 3</th>
                        <th>CIE-10</th>
                        <th>Diagnostico 4</th>
                        <th>CIE-10</th>
                        <th>Diagnostico 5</th>
                        <th>CIE-10</th>
                        <th>Diagnostico 6</th>
                        <th>CIE-10</th>
                        <th>Recom. a Enf. Ocupac.</th>
                        <th>Recom. a Enf. Comun.</th>
                        <th>Trat. Medico Actual</th>
                        <th>Ingresa a Programa 1</th>
                        <th>Ingresa a Programa 2</th>
                        <th>Ingresa a Programa 3</th>
                        <th>Ingresa a Programa 4</th>
                        <th>Ingresa a Programa 5</th>
                        <th>Ingresa a Programa 6</th>
                        <th>1ra Dosis</th>
                        <th>1ra Dosis</th>
                        <th>2da Dosis</th>
                        <th>3ra Dosis</th>
                        <th>Refuerzo</th>
                        <th>1ra Dosis</th>
                        <th>2da Dosis</th>
                        <th>Refuerzo</th>
                        <th>1ra Dosis</th>
                        <th>2da Dosis</th>
                        <th>3ra Dosis</th>
                        <th>1ra Dosis</th>
                        <th>Refuerzo</th>
                        <th>1ra Dosis</th>
                        <th>1ra Dosis</th>
                        <th>1ra Dosis</th>
                        <th>2da Dosis</th>
                        <th>3ra Dosis</th>
                        <th>Refuerzo</th>
                        <th>1ra Dosis</th>
                        <th>Refuerzo</th>
                        <th>1ra Dosis</th>
                        <th>Refuerzo</th>
                        <th>1ra Dosis</th>
                        <th>2da Dosis</th>
                        <th>3ra Dosis</th>
                        <th>4ta Dosis</th>
                    </tr>
                </thead>
                <tbody  id="tabla_formato_001"></tbody>
            </table>
        </div>
    </section>
</section>
<script src="../js/xlsx.full.min.js"></script>
<script src="../js/formatos.js?v<?php echo $random;?>" type="module"></script>
</body>
</html>