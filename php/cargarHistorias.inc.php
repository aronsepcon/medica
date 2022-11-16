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
        <!--h1>Cargar Historias</h1>
        <form action="" id="formUpload">
            <input type="file" name="fileUpload" id="fileUpload" accept=".xls,.xlsx" class="oculto" >
            <div id="formUpload__data">
                <div id="formUpload__data__process">
                    <a href="#" id="btn__upload"><i class="fas fa-cloud-upload-alt"></i></a>
                </div>
            </div>
        </form-->
        <h2>Medex</h2>
        <div>
            <h3>API</h3>
            <form action="" id="medexForm">
                <label for="fecha__inicio__medex">Fecha Inicio</label>
                <input type="date" name="fecha__inicio__medex" id="fecha__inicio__medex" value="<?php echo date('Y-m-d')?>">
                <label for="fecha__final__medex">Fecha Final</label>
                <input type="date" name="fecha__final__medex" id="fecha__final__medex" value="<?php echo date('Y-m-d')?>">
                <label for="nro__doc">N°. Documento</label>
                <input type="text" name="nro__doc" id="nro__doc">
                <input type="submit" value="Actualizar" id="btnUpdateMedex">
            </form>
            <h2>Excel</h2>
            <form action="" id="formUpload">
                <input type="file" name="fileUpload" id="fileUpload" accept=".xls,.xlsx" class="oculto" >
                <div id="formUpload__data">
                    <div id="formUpload__data__process">
                        <a href="#" id="btn__upload"><i class="fas fa-cloud-upload-alt"></i></a>
                    </div>
                </div>
                <label>Subir documentos</label>
                <select name="elegirClinicaExcel" id="elegirClinicaExcel" readonly>
                    <option value="0"></option>
                    <option value="1">MEDEX</option>
                    <option value="2">SERFARMED</option>
                    <option value="3">LAS AMERICAS</option>
                </select>
            </form>
        </div>
        <br>
        <!--h2>Serfarmed</h2>
        <div>
            <h3>Excel</h3>
                <form action="" id="formUpload">
                    <input type="file" name="fileUpload" id="fileUpload" accept=".xls,.xlsx" class="oculto">
                    <div id="formUpload__data"  >
                        <div id="formUpload__data__process">
                            <a href="#" id="btn__uploadSerfarmed"><i class="fas fa-cloud-upload-alt"></i></a>
                        </div>
                    </div>
                    <label>Subir documentos</label>
                </form> 
        </div>
        <br>
        <h2>Las Americas</h2>
        <div>
            <h3>Excel</h3>
            <form action="" id="formUpload">
                <input type="file" name="fileUpload" id="fileUpload" accept=".xls,.xlsx" class="oculto" >
                <div id="formUpload__data">
                    <div id="formUpload__data__process">
                        <a href="#" id="btn__uploadAmericas"><i class="fas fa-cloud-upload-alt"></i></a>
                        
                    </div>
                </div>
                <label>Subir documentos</label>
            </form> 
        </div-->

        <h2>Carga Masiva</h2>
        <div>
            <form method='post' action='' enctype='multipart/form-data'>
                <input type="file" name="file" id="subidaMasiva" accept=".xls,.xlsx" multiple>
                <div id="formUpload__data">
                    <div id="formUpload__data__process">
                        <a href="#" id="btn__uploadPDF"></i></a>
                    </div>
                </div>    
            </form>
        </div>

    </section>
    <script src="../js/carga.js?v<?php echo $random;?>" type="module"></script>
</body>
</html>