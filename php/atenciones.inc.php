<?php
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
<section class="wrap">
    <div class="modal" id="atencion__medica_usuario">
        <div class="inside w55porcen">
            <button type="button" id="cierre_atencion_med">X</button>
            <div><h1>Atencion Médica</h1></div>
            <div>
                <input type="text" class="oculto" id="dni_paciente">
                <label for="fecha__atencion">Fecha :</label>
                <input type="date" name="fecha__atencion" id="fecha__atencion">
                <select name="" id="hora__atencion">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>                          
                <label for="hora__atencion">horas</label>
            </div>
            <hr>
            <div class="data__atencion__medica">
                <h3>Funciones Vitales :</h3> 
                <form action="" id="form__atencion__medica">
                    <section id="funciones__vitales">
                        <label for="presion__arterial">P.A.:</label>
                        <input type="text" name="presion__arterial" id="presion__arterial">
                        <span>/</span>
                        <input type="text" id="mmhg_atencion">
                        <span>mmHg</span>

                        <label for="frecuencia__cardiaca">F.C.:</label>
                        <input type="number" name="frecuencia__cardiaca" id="frecuencia__cardiaca">
                        <span>Lat x Min</span>

                        <label for="frecuencia__respiratoria">F.R.:</label>
                        <input type="number" name="frecuencia__respiratoria" id="frecuencia__respiratoria">
                        <span>Resp x Min</span>

                        <label for="temperatura">T:</label>
                        <input type="number" name="temperatura" id="temperatura">
                        <span>°C</span>
                    </section>
                    <hr>
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
            <hr>
            <div>
                <h3>Tratamiento</h3>
                <input type="text" id="id_prod_inv" class="oculto">
                <input type="text" id="stock_prod_inv" class="oculto">
                <label for="producto">Producto</label>
                <input type="text" id="nombre_prod_inv" readonly>
                <a href="#" id="modal_inventario"><i class="fas fa-search"></i></a>
                <label for="">Cantidad</label>
                <input type="text" id="cant_prod">
                <div>
                    <label for="">Indicaciones</label>
                    <textarea name="" id="indicaciones_inv" cols="20" rows="4"></textarea>
                </div>
                <button id="agregar_trat">Agregar</button>
                <div class="historias__tabla"> 
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Producto</th>
                                <th>Medida</th>
                                <th>Tipo</th>
                                <th>Cantidad</th>
                                <th>Indicaciones</th>
                            </tr>
                        </thead>
                        <tbody id="lista_receta"></tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div>
                <label for="">Procedimiento</label>
                <select name="" id="">
                    <option value="">IM</option>
                    <option value="">EV</option>
                    <option value="">Sutura</option>
                    <option value="">Curacion</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>      
                <label for="">Cantidad</label>
                <input type="text">
                <button>Agregar</button>
            </div>
            <hr>
            <div>
                <label for="">Observaciones</label> 
                <textarea name="" id="observaciones_atencion" cols="30" rows="10"></textarea>
            </div>
            <hr>
            <div>
                <button id="guardar_atencion">Guardar</button>
                <button id="retorno_atencion">Regresar</button>
            </div>
        </div>
    </div>
    <div class="modal" id="lista_inventario">
        <section class="inside w55porcen" >
            <button type="button" id="cierre_lista_inv">X</button>
            <div>
                <label for="producto_inventario">Ingrese una palabra para buscar el producto</label>
                <input type="text" id="producto_inventario">
                <button  id="lista_medicamentos">Buscar</button>
            </div>
            <div class="historias__tabla">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombre Generico</th>
                            <th>Nombre Comercial</th>
                            <th>Tipo</th>
                            <th>Unidad de Medida</th>
                            <th>Presentacion</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody id="tabla_inventario"></tbody>
                </table>
            </div>
        </section>
    </div>
    <section class="historias__cuerpo">
        <section>
            <input type="text" id="busqueda_atencion">
        </section>
        <h3>Registro de Pacientes</h3>   
            <section class="historias__cuerpo__pagina bars" id="pagina1_atencion"> 
                <div>
                    <form id="formulario_datos_trabajador">
                        <div>
                            <h3>Datos del trabajador</h3>
                            <div class="formulario_datos_trabajador_4columnas">
                                <label for="numero__registro_atencion">N° Registro</label>
                                <input type="text" name="numero__registro_atencion" id="numero__registro_atencion" readonly>
                                <label for="documento__identidad_atencion">Documento Identidad</label>
                                <input type="text" name="documento__identidad_atencion" id="documento__identidad_atencion" readonly>
                                <label for="nombres__apellidos_atencion">Nombres y apellidos</label>
                                <input type="text" name="nombres__apellidos_atencion" id="nombres__apellidos_atencion" readonly>
                                <label for="fecha__nacimiento_atencion">Fecha Nacimiento</label>
                                <input type="date" name="fecha__nacimiento_atencion" id="fecha__nacimiento_atencion" readonly>
                                <label for="correo__electronico_atencion">Correo Electrónico</label>
                                <input type="text" name="correo__electronico_atencion" id="correo__electronico_atencion" readonly>
                                <label for="sexo__trabajador_atencion">Sexo :</label>
                                <input type="text" name="" id="sexo__trabajador_atencion" readonly>
                                <label for="cargo__trabajador_atencion">Cargo :</label>
                                <input type="text" name="cargo__trabajador_atencion" id="cargo__trabajador_atencion" readonly>
                                <label for="centro_costos_atencion">Centro de Costos :</label>
                                <input type="text" name="centro_costos_atencion" id="centro_costos_atencion" readonly>
                                <label for="sede__trabajador_atencion">Sede :</label>
                                <input type="text" name="sede__trabajador_atencion" id="sede__trabajador_atencion" readonly>
                                <label for="estado__trabajador_atencion">Estado :</label>
                                <input type="text" name="estado__trabajador_atencion" id="estado__trabajador_atencion" readonly>
                                <label for="direccion__trabajador_atencion">Dirección :</label>
                                <input type="text" name="direccion__trabajador_atencion" id="direccion__trabajador_atencion" readonly>
                                <label for="edad__trabajador_atencion">Edad :</label>
                                <input type="text" name="edad__trabajador_atencion" id="edad__trabajador_atencion" readonly>
                                <label for="telefono__trabajador_atencion">Telefono :</label>
                                <input type="text" name="telefono__trabajador_atencion" id="telefono__trabajador_atencion" readonly>
                                <label for="empresa__trabajador_atencion">Empresa :</label>
                                <input type="text" name="" id="empresa__trabajador_atencion" readonly>
                                <label for="">Antecedentes</label>
                                <input type="text">
                            </div> 
                            <button type="button" id="RegistrarAtencion">Registrar</button>
                        </div>
                    </form>
                </div>
        </section>
    </section>
</section>
<script src="../js/atenciones.js?v<?php echo $random;?>" type="module"></script>
</body>
</html>