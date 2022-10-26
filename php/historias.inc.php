<?php
    //session_start();
    $random = rand(0,1000);
    if($_SESSION['logged'] == false){
        session_unset();
        session_destroy();
        header('location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css?v<?php echo $random; ?>" type="text/css">
    <link rel="stylesheet" href="../css/all.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <div class="modal" id="ficha__medica">
        <div class="inside h90p">
            <div><h1>EXAMEN MEDICO OCUPACIONAL</h1></div>
            <div>2022-016587</div>

            <div class="columnas12">
                <label>Historia Clinica N°</label>
                <label>00465739</label>
                <label>Historia Clinica N°</label>
                <label>00465739</label>
            </div>
        </div>    
    </div>
    <div class="modal" id="ficha__medica__correo">
        <div class="inside w25porcen">
            <div>
                <button type="button" id="cierre_form" class="cierre_form">X</button>
                <h1>Enviar Correo</h1>
            </div>
            <hr>
            <div class="mail__data">
                <input type="hidden" name="id__examen" id="id__examen">
                <input type="hidden" name="nombre__correo" id="nombre__correo">
                <input type="hidden" name="adjunto_examen" id="adjunto_examen">

                <label for="asunto__correo">Asunto :</label>
                <input type="text" name="asunto__correo" id="asunto__correo">
                <label for="direccion__correo">Correo electrónico</label>
                <input type="mail" name="direccion__correo" id="direccion__correo">
                <label for="fecha__examen">Fecha Examen Medico:</label>
                <input type="text" name="fecha__examen" id="fecha__examen"  readonly>
                <label for="clinica__examen">Nombre Clinica:</label>
                <input type="text" name="clinica__examen" id="clinica__examen" class="mayusculas" readonly>
                <div class="opciones">
                    <button type="button" id="mail__accept">Enviar</button>
                    <button type="button" id="mail__cancel">Cancelar</button>
                </div> 
            </div>
        </div>
           
    </div>
    <div class="modal" id="form_ingreso">
        <div class="inside w75porcen">
            <button type="button" id="cierre_form_vistp">X</button>
            <h1>No hay documentos en la plataforma</h1>
        </div>
    </div>
    <div class="modal_mensaje msj_info" id="mensaje__sistema">
        <span id="mensaje_texto">Vamos a ver si lo muestra</span>
    </div>
   
    <form class="historias__cuerpo__busqueda" action="../inc/cargarHistoriaMedica.inc.php" method="post">
        <div>
            <input type="radio" name="filtrado" id="radio__nombre">
            <label for="nombre">Por Nombre</label>
            <input type="radio"  name="filtrado" id="radio__dni">
            <label for="dni">Por DNI</label>
        </div>    
        <input type="text" id="nombres_trabajador" name="nombres_trabajador" placeholder="Nombres" value="" style="display: none;">
        <input type="text" id="documento_trabajador" name="documento_trabajador" placeholder="Documento de Identificación" value="42081842">
        <div>
            <a href="#"><i class="fas fa-search" ></i></a>
        </div>
    </form>
    <div class="modal" id="ficha__vistaprevia">    
        <div class="inside h90p">
            <button type="button" id="cierre_form_ing">X</button>
            <iframe src="" id="frame__adjunto"></iframe>
        </div>    
    </div>
    <div class="modal" id="modal__esperar">
        <div class="lds-dual-ring"></div>
	</div>
    <div class="modal" id="atencion__medica">
        <div class="inside w55porcen">
            <button type="button" id="cierre_atencion">X</button>
            <div><h1>Atencion Médica</h1></div>
            <div>
                <label for="fecha__atencion">Fecha :</label>
                <input type="date" name="fecha__atencion" id="fecha__atencion">
            </div>
            <div class="data__atencion__medica">
                <h3>Funciones Vitales :</h3> 
                <hr>
                <form action="" id="form__atencion__medica">
                    <section id="funciones__vitales">
                        <div>
                            <label for="presion__arterial">P.A.:</label>
                            <input type="text" name="presion__arterial" id="presion__arterial">
                            <span>mmHg</span>
                        </div>
                        <div>
                            <label for="frecuencia__cardiaca">F.C.:</label>
                            <input type="number" name="frecuencia__cardiaca" id="frecuencia__cardiaca">
                            <span>Lat x Min</span>
                        </div>
                        <div>
                            <label for="frecuencia__respiratoria">F.R.:</label>
                            <input type="number" name="frecuencia__respiratoria" id="frecuencia__respiratoria">
                            <span>Resp x Min</span>
                        </div>
                        <div>
                            <label for="temperatura">Temp.:</label>
                            <input type="number" name="temperatura" id="temperatura">
                            <span>*C</span>
                        </div>
                    </section>
                    <section class="atencion__medica-2-50cols">
                        <div class="seccion__izquierda">
                            <div>
                                <label for="motivo__atencion">Motivo Atencion</label>
                                <select name="motivo__atencion" id="motivo__atencion">
                                    <option value="-1">Seleccione opcion</option>
                                    <option value="1">Consulta Médica Ambulatoria</option>
                                </select>
                            </div>
                            <div>
                                <label for="tipo__atencion">Nuevo/Control</label>
                                <select name="tipo__atencion" id="tipo__atencion">
                                    <option value="-1">Seleccione opcion</option>
                                    <option value="1">Nuevo</option>
                                    <option value="2">Control</option>
                                </select>
                            </div>
                            <div>
                                <label for="anamnesis">Anamnesis</label>
                                <textarea name="anamnesis" id="anamnesis">

                                </textarea>
                            </div>
                            <div>
                                <label for="clase__diagnostico">Clase de Diagnóstico</label>
                                <select name="tipo__atencion" id="tipo__atencion">
                                    <option value="-1">Seleccione opcion</option>
                                    <option value="1">Nuevo</option>
                                    <option value="2">Control</option>
                                </select>
                            </div>
                            <div>
                                <label for="diagnostico__cie">Diagnóstico CIE</label>
                                <div>
                                    <input type="text" name="diagnostico__cie" id="diagnostico__cie">
                                    <a href="#"><i class="fas fa-search"></i></a>
                                </div>
                            </div>
                            <div>
                                <label for="diagnostico__secundario">Diagnóstico Secundario</label>
                                <textarea name="diagnostico__secundario" id="diagnostico__secundario">

                                </textarea>
                            </div>
                        </div>
                        <div class="seccion__derecha">
                            <div>
                                <h3>En caso de accidentes de trabajo</h3>
                                <div>
                                    <label for="mec__acc__trab">Mec.Acc.Trab.</label>
                                    <select name="mec__acc__trab" id="mec__acc__trab">
                                        <option value="-1">Seleccione opcion</option>
                                        <option value="1">Nuevo</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="parte__cuerpo">Parte del Cuerpo</label>
                                    <select name="parte__cuerpo" id="parte__cuerpo">
                                        <option value="-1">Seleccione opcion</option>
                                        <option value="1">Nuevo</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="Clasificacion">Clasificacion.</label>
                                    <select name="Clasificacion" id="Clasificacion">
                                        <option value="-1">Seleccione opcion</option>
                                        <option value="1">Nuevo</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <h3>En caso de enfermedades relacionadas al trabajo</h3>
                                <div>
                                    <label for="factor__riesgo">Factor de Riesgo.</label>
                                    <select name="factor__riesgo" id="factor__riesgo">
                                        <option value="-1">Seleccione opcion</option>
                                        <option value="1">Nuevo</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="Clasificacion__trabajo">Clasificacion.</label>
                                    <select name="Clasificacion__trabajo" id="Clasificacion__trabajo">
                                        <option value="-1">Seleccione opcion</option>
                                        <option value="1">Nuevo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>
    
    <hr>
    <section id="busqueda_parcial" style="display: none;" > 
        <div class="tabla__busqueda bars">
            <table id="tabla__busqueda" class="w100porcen1">
                <thead>
                    <tr>
                        <th width=8%>DNI</th>
                        <th>Nombres y Apellidos</th>
                        <th>Edad</th>
                        <th>Sede</th>
                        <th>Ver</th>
                    </tr>
                </thead>
                <tbody id="tabla__busqueda_body"></tbody>
            </table>
        </div>
    </section>
    <section class="historias__cuerpo_completo" id="historias__cuerpo_completo" style="display: none;"><!--style="display: none;"-->
        <nav class="historias__vertical__menu">
            <a href="#" id="opcion1" class="opcion_vertical resaltado">1.- Datos Generales</a>
            <a href="#" id="opcion2" class="opcion_vertical">2.- Exámenes Médicos</a> 
            <a href="#" id="opcion3" class="opcion_vertical">3.- Atenciones Médicas</a>
            <a href="#" id="opcion4" class="opcion_vertical">4.- Vacunas</a>
            <a href="#" id="opcion5" class="opcion_vertical">5.- Documentops Adjuntos</a>
        </nav>
        <section class="historias__cuerpo">
            <section class="historias__cuerpo__pagina bars" id="pagina1"> 
                <div>
                    <form id="formulario_datos_trabajador">
                        <input type="file" name="uploadPdf" id="uploadPdf" accept=".pdf" class="oculto">
                        <div>
                            <h3>Datos del trabajador</h3>
                            <div class="formulario_datos_trabajador_4columnas">
                                <label for="numero__registro">N° Registro</label>
                                <input type="text" name="numero__registro" id="numero__registro" readonly>
                                <label for="documento__identidad">Documento Identidad</label>
                                <input type="text" name="documento__identidad" id="documento__identidad" readonly>
                                <label for="nombres__apellidos">Nombres y apellidos</label>
                                <input type="text" name="nombres__apellidos" id="nombres__apellidos" readonly>
                                <label for="fecha__nacimiento">Fecha Nacimiento</label>
                                <input type="date" name="fecha__nacimiento" id="fecha__nacimiento" readonly>
                                <label for="correo__electronico">Correo Electrónico</label>
                                <input type="text" name="correo__electronico" id="correo__electronico" readonly>
                                <label for="sexo__trabajador">Sexo :</label>
                                <input type="text" name="sexo__trabajador" id="sexo__trabajador" readonly>
                                <label for="cargo__trabajador">Cargo :</label>
                                <input type="text" name="cargo__trabajador" id="cargo__trabajador" readonly>
                                <label for="centro_costos">Centro de Costos :</label>
                                <input type="text" name="centro_costos" id="centro_costos" readonly>
                                <label for="sede__trabajador">Sede :</label>
                                <input type="text" name="sede__trabajador" id="sede__trabajador" readonly>
                                <label for="estado__trabajador">Estado :</label>
                                <input type="text" name="estado__trabajador" id="estado__trabajador" readonly>
                                <!--label for="telefono__trabajador">Telefono :</label>
                                <input type="text" name="telefono__trabajador" id="telefono__trabajador" readonly-->
                                <label for="direccion__trabajador">Dirección :</label>
                                <input type="text" name="direccion__trabajador" id="direccion__trabajador" readonly>
                                <label for="edad__trabajador">Edad :</label>
                                <input type="text" name="edad__trabajador" id="edad__trabajador" readonly>
                            </div> 
                        </div>
                    </form>
                </div>
            </section>
            <section class="historias__cuerpo__pagina oculto" id="pagina2">
                <div class="historias__cuerpo__agregar">
                    <div>
                        <button type="button">+ Agregar Examen</button>
                    </div>
                </div>
                <div class="historias__tabla bars">
                    <table id="tabla__examenes" class="w100porcen1">
                        <thead>
                            <tr>
                                <th width="8%">Clinica</th>
                                <th width="10%">Tipo</th>
                                <th width="7%">Fecha</th>
                                <th width="5%">Aptitud</th>
                                <th width="20%">Restricciones</th>
                                <th width="20%">Observaciones</th>
                                <th width="8%">Alergias</th>
                                <th width="10%">Tipo Sangre</th>
                                <th width="6%">Correo</th>
                                <th width="6%">Ver</th>
                                <th width="6%">Cargar</th>
                            </tr>
                        </thead>
                        <tbody class="tabla__examenes_body" id="tabla__examenes_body">
                        </tbody>
                        
                    </table>
            </section>
            <section class="historias__cuerpo__pagina oculto" id="pagina3">
                <div class="historias__cuerpo__agregar">
                    <div>
                        <button type="button" id="btn__atencion__medica">+ Agregar Atención</button>
                    </div>
                </div>
                <div class="historias__tabla bars">
                    <table id="tabla__atenciones" class="w100porcen">
                        <thead>
                            <th>
                                <td><i class="far fa-address-book"></i></td>
                                <td>Tipo</td>
                                <td>Fecha</td>
                                <td>Diagnostico</td>
                                <td>Detalle</td>
                                <td>Tratamientto Médico</td>
                                <td><i class="fas fa-paperclip"></i></td>
                            </th>
                        </thead>
                        <tbody id="tabla__atenciones_body"></tbody>
                    </table>
                </div>
            </section>
            <section class="historias__cuerpo__pagina oculto" id="pagina4">
                <div class="historias__cuerpo__agregar">
                    <div>
                        <button type="button">Modificar</button>
                        <button type="button">Grabar</button>
                    </div>
                    <div class="vacunas columnas_2">
                        <div class="vacunas">
                            <div class="item__vacuna">
                                <div>
                                    <h5>Fiebre Amarilla</h5>
                                </div>
                                <div class="columnas_8">
                                    <span>D1</span>
                                    <input type="date" name="influenza__d1" id="influenza__d1">
                                    <span>R1</span>
                                    <input type="date" name="influenza__r1" id="influenza__r1">
                                </div>
                            </div>
                            <div class="item__vacuna">
                                <div>
                                    <h5>Fiebre Amarilla</h5>
                                </div>
                                <div class="columnas_8">
                                    <span>D1</span>
                                    <input type="date" name="fiebre__d1" id="fiebre__d1">
                                    <span>D2</span>
                                    <input type="date" name="fiebre__d2" id="fiebre__d2">
                                    <span>R1</span>
                                    <input type="date" name="fiebre__r1" id="fiebre__r1">
                                </div>
                            </div>
                            <div class="item__vacuna">
                                <div>
                                    <h5>Hepatitis Tipo B</h5>
                                </div>
                                <div class="columnas_8">
                                    <span>D1</span>
                                    <input type="date" name="fiebre__d1" id="fiebre__d1">
                                    <span>D2</span>
                                    <input type="date" name="fiebre__d2" id="fiebre__d2">
                                    <span>R1</span>
                                    <input type="date" name="fiebre__r1" id="fiebre__r1">
                                </div>
                            </div>
                            <div class="item__vacuna">
                                <div>
                                    <h5>Tetanos</h5>
                                </div>
                                <div class="columnas_8">
                                    <span>D1</span>
                                    <input type="date" name="influenza__d1" id="influenza__d1">
                                    <span>R1</span>
                                    <input type="date" name="influenza__r1" id="influenza__r1">
                                </div>
                            </div>
                            <div class="item__vacuna">
                                <div>
                                    <h5>Rabia</h5>
                                </div>
                                <div class="columnas_8">
                                    <span>D1</span>
                                    <input type="date" name="influenza__d1" id="influenza__d1">
                                    <span>D2</span>
                                    <input type="date" name="influenza__d1" id="influenza__d1">
                                    <span>D3</span>
                                    <input type="date" name="influenza__d1" id="influenza__d1">
                                    <span>R1</span>
                                    <input type="date" name="influenza__r1" id="influenza__r1">
                                </div>
                            </div>    
                            <div class="item__vacuna">
                                <div>
                                    <h5>Influenza</h5>
                                </div>
                                <div class="columnas_8">
                                    <span>D1</span>
                                    <input type="date" name="influenza__d1" id="influenza__d1">
                                    <span>R1</span>
                                    <input type="date" name="influenza__r1" id="influenza__r1">
                                </div>
                            </div>
                            <div class="item__vacuna">
                                <div>
                                    <h5>Tifoidea</h5>
                                </div>
                                <div class="columnas_8">
                                    <span>D1</span>
                                    <input type="date" name="tifoidea__d1" id="tifoidea__d1">
                                    <span>R1</span>
                                    <input type="date" name="tifoidea__r1" id="tifoidea__r1">
                                </div>
                            </div>
                            <div class="item__vacuna">
                                <div>
                                    <h5>Trivirica</h5>
                                </div>
                                <div class="columnas_8">
                                    <span>D1</span>
                                    <input type="date" name="trivirica__d1" id="trivirica__d1">
                                    <span>R1</span>
                                    <input type="date" name="trivirica__r1" id="trivirica__r1">
                                </div>
                            </div>
                            <div class="item__vacuna">
                                <div>
                                    <h5>Poliomelitis</h5>
                                </div>
                                <div class="columnas_8">
                                    <span>D1</span>
                                    <input type="date" name="trivirica__d1" id="trivirica__d1">
                                    <span>R1</span>
                                    <input type="date" name="trivirica__r1" id="trivirica__r1">
                                </div>
                            </div>
                        </div>
                        <div>
                            <img src="../img/userImg.jpg">
                        </div>
                    </div>
                </div>
            </section>
            <section class="historias__cuerpo__pagina oculto" id="pagina5">
                <div class="historias__cuerpo__agregar">
                    <div>
                        <button type="button">+ Agregar Documento</button>
                    </div>
                </div>
                <div class="historias__tabla bars">
                    <table id="tabla__atenciones" class="w100porcen">
                        <thead>
                            <th>
                                <td><i class="far fa-address-book"></i></td>
                                <td>N°</td>
                                <td>Tipo de documento</td>
                                <td>Nombre Documento</td>
                                <td>Detalle</td>
                                <td>Fecha</td>
                                <td>Correo</td>
                                <td><i class="fas fa-paperclip"></i></td>
                            </th>
                        </thead>
                        <tbody id="tabla__atenciones_adjunto"></tbody>
                    </table>
                </div>   
            </section>
        </section>
    </section>
    <script src="../js/funciones.js" type="module"></script>
    <script src="../js/historias.js?v<?php echo $random;?>" type="module"></script>    
</body>
</html>