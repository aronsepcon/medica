<?php
    $random = rand(0,1000);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Historias</title>
</head>
<body>
    <div class="modal_mensaje msj_info" id="mensaje__sistema">
        <span id="mensaje_texto">Vamos a ver si lo muestra</span>
    </div>
    <div class="modal" id="modal__esperar">
        <div class="lds-dual-ring"></div>
	</div>
    <section class="wrap">
        <h1>Cargar Historias</h1>
        <!--<form action="" id="formUpload">
            <input type="file" name="fileUpload" id="fileUpload" accept=".xls,.xlsx" class="oculto" >
            <div id="formUpload__data">
                <h1>Seleccione o arrastre el archivo de historias que desea cargar</h1>
                <div id="formUpload__data__process">
                    <a href="#" id="btn__upload"><i class="fas fa-cloud-upload-alt"></i></a>
                </div>
            </div>
        </form>-->
        <h2>Medex</h2>
        <div>
            <form action="" id="medexForm">
                <label for="fecha__inicio__medex">Fecha Inicio</label>
                <input type="date" name="fecha__inicio__medex" id="fecha__inicio__medex" value="<?php echo date('Y-m-d')?>">
                <label for="fecha__final__medex">Fecha Final</label>
                <input type="date" name="fecha__final__medex" id="fecha__final__medex" value="<?php echo date('Y-m-d')?>">
                <label for="nro__doc">N°. Documento</label>
                <input type="text" name="nro__doc" id="nro__doc">
                <input type="submit" value="Actualizar" id="btnUpdateMedex">
            </form>
        </div>
        
    </section>
    <script src="../js/carga.js?v<?php echo $random;?>" type="module"></script>
</body>
</html>