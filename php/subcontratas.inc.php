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
<form class="historias__cuerpo__busqueda" action="../inc/cargarHistoriaMedica.inc.php" method="post"> 
        <input type="text" id="documento_trabajador" name="documento_trabajador" placeholder="Documento de Identificación" value="42081842">
        <div>
            <a href="#" id="busqueda_boton"><i class="fas fa-search" ></i></a>
        </div>
    </form>
<section class="wrap">
    <section class="historias__cuerpo_completo" id="historias__cuerpo_completo" style="display: block;"><!--style="display: none;"-->
        <nav class="historias__vertical__menu">
            <a href="#" id="opcion1" class="opcion_vertical resaltado">1.- Datos Generales</a>
            <a href="#" id="opcion2" class="opcion_vertical">2.- Exámenes Médicos</a> 
            <a href="#" id="opcion3" class="opcion_vertical">3.- Atenciones Médicas</a>
            <a href="#" id="opcion4" class="opcion_vertical">4.- Vacunas</a>
            <a href="#" id="opcion5" class="opcion_vertical">5.- Documentops Adjuntos</a>
        </nav>
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
        <section class="historias__cuerpo__pagina oculto" id="pagina2">
            <div class="historias__cuerpo__agregar">
                <div>
                    <button type="button" id="abrir_pestañas" class="oculto">pestañas</button>
                    <button type="button" class="oculto">+ Subir Examenes</button >
                </div>
            </div>
            <div class="historias__tabla bars">
                <table id="tabla__examenes" class="w100porcen1">
                    <thead>
                        <tr>
                            <th width="4%">CC</th>
                            <th width="8%">Clinica</th>
                            <th width="9%">Tipo</th>
                            <th width="7%">Fecha</th>
                            <th width="5%">Aptitud</th>
                            <th width="18%">Restricciones</th>
                            <th width="28%">Observaciones</th>
                            <th width="8%">Alergias</th>
                            <th width="9%">Tipo Sangre</th>
                            <th width="6%">Historial</th>
                            <th width="6%">Correo</th>
                            <th width="6%">Ver</th>
                            <th width="6%">Cargar</th>
                        </tr>
                    </thead>
                    <tbody class="tabla__examenes_body" id="tabla__examenes_body">
                    </tbody>
                    
                </table>
            </div>
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
                    <!--button type="button">Modificar</button>
                    <button type="button">Grabar</button-->
                    <button type="button" id="mostrar_pase_medico" class="oculto">Pase Medico</button>
                </div>
                <div class="vacunas columnas_2">
                    <div>
                        <div class="item__vacuna">
                            <div>
                                <h5>Fiebre Amarilla</h5>
                            </div>
                            <div class="columnas_8">
                                <span>D1</span>
                                <input type="date" name="fiebre_amarilla__d1" id="fiebre_amarilla__d1" class="fecha_vac" readonly>
                                <a href="" id="vista_previa_vac" class="vista_previa_vac" value="fiebre amarilla"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="fiebre amarilla"><i class="fas fa-upload" id="icono_fbra"></i></a><!--cambiar id a class-->
                                <input type="text" name="fiebre_amarilla__cnf" id="fiebre_amarilla__cnf" class="validarInmunidad" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="item__vacuna">
                            <div>
                                <h5>Difteria Tetano</h5>
                            </div>
                            <div class="columnas_8">
                                <span>D1</span>
                                <input type="date" name="fiebre__d1" id="fiebre__d1" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="difteTet_D1"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="difteTet_D1"><i class="fas fa-upload" id="icono_dt_d1"></i></a>
                                <span>D2</span>
                                <input type="date" name="fiebre__d2" id="fiebre__d2" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="difteTet_D2"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="difteTet_D2"><i class="fas fa-upload" id="icono_dt_d2"></i></a>
                                <span>D3</span>
                                <input type="date" name="fiebre__d3" id="fiebre__d3" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="difteTet_D3"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="difteTet_D3"><i class="fas fa-upload" id="icono_dt_d3" ></i></a>
                                <span>R1</span>
                                <input type="date" name="fiebre__r1" id="fiebre__r1" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="difteTet_R1"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="difteTet_R1"><i class="fas fa-upload" id="icono_dt_r1"></i></a>
                                <span>R2</span>
                                <input type="date" name="fiebre__r2" id="fiebre__r2" class="R2" readonly>
                                <a href="" class="subida_vacunas" value="difteTet_R2"><i class="fas fa-upload"></i></a>
                            </div>
                        </div>
                        <br>    
                        <div class="item__vacuna">
                            <div>
                                <h5>Hepatitis A</h5>
                            </div>
                            <div class="columnas_8">
                                <span>D1</span>
                                <input type="date" name="hepatitis_A__d1" id="hepatitis_A__d1" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="HepatitisA_D1"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="HepatitisA_D1"><i class="fas fa-upload" id="icono_ha_d1"></i></a>
                                <span>D2</span>
                                <input type="date" name="hepatitis_A__d2" id="hepatitis_A__d2" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="HepatitisA_D2"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="HepatitisA_D2"><i class="fas fa-upload" id="icono_ha_d2"></i></a>
                                <span>R1</span>
                                <input type="date" name="hepatitis_A__r1" id="hepatitis_A__r1" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="HepatitisA_R1"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="HepatitisA_R1"><i class="fas fa-upload" id="icono_ha_r1"></i></a>
                                <span>R2</span>
                                <input type="date" name="hepatitis_A__r2" id="hepatitis_A__r2" class="R2" readonly>
                                <a href="" class="subida_vacunas" value="HepatitisA_R2"><i class="fas fa-upload"></i></a>
                            </div>
                        </div>
                        <br>    
                        <div class="item__vacuna">
                            <div>
                                <h5>Hepatitis B</h5>
                            </div>
                            <div class="columnas_8">
                                <span>D1</span>
                                <input type="date" name="hepatitis_B__d1" id="hepatitis_B__d1" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="HepatitisB_D1"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="HepatitisB_D1"><i class="fas fa-upload" id="icono_hb_d1"></i></a>
                                <span>D2</span>
                                <input type="date" name="hepatitis_B__d2" id="hepatitis_B__d2" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="HepatitisB_D2"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="HepatitisB_D2"><i class="fas fa-upload" id="icono_hb_d2"></i></a>
                                <span>D3</span>
                                <input type="date" name="hepatitis_B__d3" id="hepatitis_B__d3" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="HepatitisB_D3"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="HepatitisB_D3"><i class="fas fa-upload" id="icono_hb_d3"></i></a>
                                <input type="text" name="hepatitis_B__r1" id="hepatitis_B__r1" class="validarInmunidad" readonly>
                            </div>
                        </div>
                        <br>    
                        <div class="item__vacuna">
                            <div>
                                <h5>Influenza</h5>
                            </div>
                            <div class="columnas_8">
                                <span>R1</span>
                                <input type="date" name="influenza__r1" id="influenza__r1" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="Influenza_R1"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="Influenza_R1"><i class="fas fa-upload" id="icono_if_r1"></i></a>
                                <span>R2</span>
                                <input type="date" name="influenza__r2" id="influenza__r2" class="R2" readonly>
                                <a href="" class="subida_vacunas" value="Influenza_R2"><i class="fas fa-upload"></i></a>
                            </div>
                        </div>
                        <br>    
                        <div class="item__vacuna">
                            <div>
                                <h5>Poliomelitis</h5>
                            </div>
                            <div class="columnas_8">
                                <span>D1</span>
                                <input type="date" name="poliomelitis__d1" id="poliomelitis__d1" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="Polio_D1"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="Polio_D1"><i class="fas fa-upload" id="icono_pl_r1"></i></a>
                                <input type="text" name="poliomelitis__r1" id="poliomelitis__r1" class="validarInmunidad" readonly>
                            </div>
                        </div>
                        <br>    
                        <div class="item__vacuna">
                            <div>
                                <h5>Trivirica</h5>
                            </div>
                            <div class="columnas_8">
                                <span>D1</span>
                                <input type="date" name="trivirica__d1" id="trivirica__d1" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="Trivirica_D1"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="Trivirica_D1"><i class="fas fa-upload" id="icono_tv_r1"></i></a>
                                <input type="text" name="trivirica__r1" id="trivirica__r1" class="validarInmunidad" readonly>
                            </div>
                        </div>
                        <br>        
                        <div class="item__vacuna">
                            <div>
                                <h5>Rabia</h5>
                            </div>
                            <div class="columnas_8">
                                <span>D1</span>
                                <input type="date" name="rabia__d1" id="rabia__d1" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="Rabia_D1"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="Rabia_D1"><i class="fas fa-upload" id="icono_rb_d1"></i></a>
                                <span>D2</span>
                                <input type="date" name="rabia__d2" id="rabia__d2" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="Rabia_D2"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="Rabia_D2"><i class="fas fa-upload" id="icono_rb_d2"></i></a>
                                <span>D3</span>
                                <input type="date" name="rabia__d3" id="rabia__d3" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="Rabia_D3"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="Rabia_D3"><i class="fas fa-upload" id="icono_rb_d3"></i></a>
                                <span>R1</span>
                                <input type="date" name="rabia__r1" id="rabia__r1" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="Rabia_R1"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="Rabia_R1"><i class="fas fa-upload" id="icono_rb_r1"></i></a><!--subidaR1-->
                                <span>R2</span>
                                <input type="date" name="rabia__r2" id="rabia__r2" class="R2" readonly>
                                <a href="" class="subida_vacunas" value="Rabia_R2"><i class="fas fa-upload"></i></a><!--subidaR2-->                                    
                            </div>
                        </div>
                        <br>    
                        <div class="item__vacuna">
                            <div>
                                <h5>Tifoidea</h5>
                            </div>
                            <div class="columnas_8">
                                <span>R1</span>
                                <input type="date" name="tifoidea__d1" id="tifoidea__r1" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="Tifoidea_R1"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas"  value="Tifoidea_R1"><i class="fas fa-upload" id="icono_tf_r1"></i></a>
                                <span>R2</span>
                                <input type="date" name="tifoidea__r1" id="tifoidea__r2" class="R2" readonly>
                                <a href="" class="subida_vacunas"  value="Tifoidea_R2"><i class="fas fa-upload"></i></a>
                            </div>
                        </div>
                        <br>    
                        <div class="item__vacuna">
                            <div>
                                <h5>Neumococo</h5>
                            </div>
                            <div class="columnas_8">
                                <span>R1</span>
                                <input type="date" name="neumococo__d1" id="neumococo__r1" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac"  value="Neumococo_R1"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="Neumococo_R1"><i class="fas fa-upload" id="icono_nm_r1"></i></a>
                                <span>R2</span>
                                <input type="date" name="neumococo__r1" id="neumococo__r2" class="R2" readonly>
                                <a href="" class="subida_vacunas" value="Neumococo_R2"><i class="fas fa-upload"></i></a>
                            </div>
                        </div>
                        <br>    
                        <div class="item__vacuna">
                            <div>
                                <h5>COVID</h5>
                            </div>
                            <div class="columnas_8">
                                <span>D1</span>
                                <input type="date" name="covid__d1" id="covid__d1" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="COVID_D1"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="COVID_D1"><i class="fas fa-upload" id="icono_cv_d1"></i></a>
                                <span>D2</span>
                                <input type="date" name="covid__d2" id="covid__d2" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="COVID_D2"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="COVID_D2"><i class="fas fa-upload" id="icono_cv_d2"></i></a>
                                <span>D3</span>
                                <input type="date" name="covid__d3" id="covid__d3" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="COVID_D3"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="COVID_D3"><i class="fas fa-upload" id="icono_cv_d3"></i></a>
                                <span>D4</span>
                                <input type="date" name="covid__d4" id="covid__d4" class="fecha_vac" readonly>
                                <a href="" class="vista_previa_vac" value="COVID_D4"><i class="fas fa-eye"></i></a>
                                <a href="" class="subida_vacunas" value="COVID_D4"><i class="fas fa-upload" id="icono_cv_d4"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="pase_medico_form">
                        <input type="hidden" id="id_pase">
                        <input type="hidden" id="nomb_adjunto">
                        <div>
                            <span>N° Pase</span>
                            <input type="text" id="numero_pase">
                        </div>
                        <div>
                            <span>Lote</span>
                            <input type="text" id="lote_pase" hidden>
                            <input type="checkbox" name="lote56" id="lote56">
                            <label for="lote56">56</label>
                            <input type="checkbox" name="lote88" id="lote88">
                            <label for="lote88">88</label>
                            <input type="checkbox" name="pisco" id="pisco">
                            <label for="pisco">Pisco</label>
                        </div>
                        <div>
                            <span>Nombre</span>
                            <input type="text" id="nombre_pase" readonly>
                        </div>
                        <div>
                            <span>DNI</span>
                            <input type="text" id="dni_pase" readonly>
                        </div>
                        <div>
                            <span>Grupo Sanguineo</span>
                            <input type="text" id="sangre_pase" readonly>
                        </div>
                        <div>
                            <span>Alergias</span>
                            <input type="text" id="alergias_pase" readonly>
                        </div>
                        <input type="date" id="fecha_emop1" class="oculto">
                        <input type="date" id="fecha_emop2" class="oculto">
                        <input type="date" id="fecha_emop3_v" class="oculto">
                        <div>
                            <span>Fecha EMOP</span>
                            <input type="date" id="fecha_emop3">
                        </div>
                        <div>
                            <span>Clinica EMOP</span>
                            <select name="" id="clinica">
                                <option value="1">MEDEX</option>
                                <option value="2">SERFARMED</option>
                                <option value="3">LAS AMERICAS</option>
                            </select>
                        </div>
                        <input type="date" id="fecha_emoa1" class="oculto">
                        <input type="date" id="fecha_emoa2" class="oculto">
                        <input type="date" id="fecha_emoa_v" class="oculto">
                        <div>
                            <span>Fecha EMOA</span>
                            <input type="date" id="fecha_emo">
                        </div>
                        <div>
                            <span>Clinica EMOA</span>
                            <select name="" id="clinicaEmoA">
                                <option value="1">MEDEX</option>
                                <option value="2">SERFARMED</option>
                                <option value="3">LAS AMERICAS</option>
                            </select>
                        </div>
                        <div>
                            <span>Fecha Vigencia</span>
                            <input type="date" id="fecha_vigencia">
                        </div>
                        <div>
                            <span>Motivo</span>
                            <select name="" id="obs_pase">
                                <option value="0">EMOA</option>
                                <option value="1">Vacuna</option>
                                <option value="2">Medica</option>
                            </select>
                            <input type="text" id="medicamotivotext" hidden>                            
                        </div>
                        <div>
                            <span>Cargar Pase</span>
                            <input type="file" name="subirPdf" id="subirPdf" accept=".jpg,.jpeg,.png,.pdf" class="oculto">
                            <a href="#" class="vista_pase" id="vista_pase"><i class="fas fa-eye"></i></a>
                            <a href="#" class="subida_pase" id="subida_pase" value="subida_pase"><i class="fas fa-upload"></i></a><!--cambiar id a class-->
                        </div>
                        <button type="button" id="enviar_pase_medico">Enviar Pase Medico</button>
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
<script src="../js/historias.js?v<?php echo $random;?>" type="module"></script>    
</body>
</html>