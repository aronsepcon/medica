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
<div class="modal" id="ficha__vistaprevia_s">    
    <div class="inside h90p">
        <button type="button" id="cierre_form_ing_s">X</button>
        <iframe src="" id="frame__adjunto_s"></iframe>
    </div>    
</div>
<div class="modal" id="ficha__vistaprevia_vac_s">  
    <div class="inside h90p">
        <button type="button" id="cierre_form_vp_vac_s">X</button>
        <div class="pest_sup" id="pest_sup_vac_s">
            <a href="#" value="vac" class="alejar"><i class="fas fa-minus"></i></a>
            <a href="#" value="vac" class="acercar"><i class="fas fa-plus"></i></a>
            <a href="#" id="descarga_vac_s" download><i class="fas fa-download desc"></i></a>
        </div>
        <div class="marco" id="marco_s">
            <img src="" id="imagen_s" alt="">
        </div>
    </div>    
</div>
<div class="modal" id="hc_subcontrata">
    <div class="w150porcen hc">
        <button type="button" id="cierre_historia_clinica_sc">X</button>

    </div>
</div>
<div class="modal" id="pestañas_s">
        <div class="inside h90p">
            <button type="button" id="cierre_pestañas_s">X</button>
                <div class="tab-container">
                    <a href="#" id="tab1_s" class="tab_s" value="tab1_s,tab-content-r1_s">Pestaña 1</a>
                    <a href="#" id="tab2_s" class="tab_s" value="tab2_s,tab-content-r2">Pestaña 2</a>
                    <a href="#" id="tab3_s" class="tab_s" value="tab3_s,tab-content-r3_s">Pestaña 3</a>
                    <a href="#" id="tab4_s" class="tab_s" value="tab4_s,tab-content-r4_s">Pestaña 4</a>         
                </div>
                <div class="tab-content"  id="tab-content-r4_s">
                    <div class="pest_sup" id="pest_sup_r4_s">
                        <a href="#" value="r4" class="alejar"><i class="fas fa-minus"></i></a>
                        <a href="#" value="r4" class="acercar"><i class="fas fa-plus"></i></a>
                        <a href="#" id="descarga_s" download><i class="fas fa-download desc"></i></a>
                    </div>
                    <div class="marco" id="marco_r4_s">
                        <img src="" class="img_pestaña" id="imagen_pestaña_r4_s" alt="">  
                    </div>
                    <iframe src="" id="adjunto_pestaña_r4_s" ></iframe>      
                </div>
                <div class="tab-content" id="tab-content-r3">
                        <div class="pest_sup" id="pest_sup_r3_s">
                            <a href="#" value="r3" class="alejar"><i class="fas fa-minus"></i></a>
                            <a href="#" value="r3" class="acercar"><i class="fas fa-plus"></i></a>
                            <a href="#" id="descarga_2_s" download><i class="fas fa-download desc"></i></a>
                        </div>
                        <div class="marco" id="marco_r3_s">
                            <img src="" class="img_pestaña" id="imagen_pestaña_r3_s" alt=""> 
                        </div>    

                        <iframe src="" id="adjunto_pestaña_r3_s" ></iframe>   
                </div>
                <div class="tab-content" id="tab-content-r2">
                        <div class="pest_sup" id="pest_sup_r2_s">
                            <a href="#" value="r2" class="alejar"><i class="fas fa-minus"></i></a>
                            <a href="#" value="r2" class="acercar"><i class="fas fa-plus"></i></a>
                            <a href="" id="descarga_3_s" download><i class="fas fa-download desc"></i></a>
                        </div>
                        <div class="marco" id="marco_r2_s">
                            <img src="" class="img_pestaña" id="imagen_pestaña_r2_s" alt=""> 
                        </div>
                        <iframe src="" id="adjunto_pestaña_r2_s" ></iframe>    
                </div>
                <div class="tab-content" id="tab-content-r1">
                        <div class="pest_sup" id="pest_sup_r1_s">
                            <a href="#" value="r1" class="alejar"><i class="fas fa-minus"></i></a>
                            <a href="#" value="r1" class="acercar"><i class="fas fa-plus"></i></a>
                            <a href="#" id="descarga_1_s" download><i class="fas fa-download desc"></i></a>
                        </div>
                        <div class="marco" id="marco_r1_s">
                            <img src="" class="img_pestaña" id="imagen_pestaña_s" alt="">
                        </div>
                        <iframe src="" id="adjunto_pestaña_r1_s"></iframe>
                </div> 
        </div>
    </div>
    <div class="modal" id="pestañas_rabia_s">
        <div class="inside h90p">
            <button type="button" id="cierre_pestañas_rabia_s">X</button>
                <div class="tab-container">
                    <a href="#" id="tab1_r_s" class="tab_r_s" value="tab1_r_s,tab-content-rab-r1">Pestaña 1</a>
                    <a href="#" id="tab2_r_s" class="tab_r_s" value="tab2_r_s,tab-content-rab-r2">Pestaña 2</a>
                    <a href="#" id="tab3_r_s" class="tab_r_s" value="tab3_r_s,tab-content-rab-r3">Pestaña 3</a>
                    <a href="#" id="tab4_r_s" class="tab_r_s" value="tab4_r_s,tab-content-rab-r4">Pestaña 4</a>
                    <a href="#" id="tab5_s" class="tab_r_s" value="tab5_s,tab-content-r5">Pestaña 5</a>
                    <a href="#" id="tab6_s" class="tab_r_s" value="tab6_s,tab-content-r6">Pestaña 6</a>
                    <a href="#" id="tab7_s" class="tab_r_s" value="tab7_s,tab-content-r7">Pestaña 7</a>
                </div>
                <div class="tab-content" id="tab-content-r7">
                    <div class="pest_sup" id="pest_sup_rab_7_s">
                        <a href="#" value="r7_rab" class="alejar"><i class="fas fa-minus"></i></a>
                        <a href="#" value="r7_rab" class="acercar"><i class="fas fa-plus"></i></a>
                        <a href="" id="descarga_rab_7_s" download><i class="fas fa-download desc"></i></a>
                    </div>
                    <div class="marco" id="marco_rabia_r7_s">
                        <img src="" id="imagen_pestaña_rabia_r7_s" alt="">
                    </div>
                    <iframe src="" id="adjunto_pestaña_rabia_r7_s"></iframe>
                </div>
                <div class="tab-content" id="tab-content-r6">
                    <div class="pest_sup" id="pest_sup_rab_6_s">
                        <a href="#" value="r6_rab" class="alejar"><i class="fas fa-minus"></i></a>
                        <a href="#" value="r6_rab" class="acercar"><i class="fas fa-plus"></i></a>
                        <a href="" id="descarga_rab_6_s" download><i class="fas fa-download desc"></i></a>
                    </div>
                    <div class="marco" id="marco_rabia_r6_s">
                        <img src="" id="imagen_pestaña_rabia_r6_s" alt="">
                    </div>
                    <iframe src="" id="adjunto_pestaña_rabia_r6_s"></iframe>
                </div>

                <div class="tab-content" id="tab-content-r5">
                    <div class="pest_sup" id="pest_sup_rab_5_s">
                        <a href="#" value="r5_rab" class="alejar"><i class="fas fa-minus"></i></a>
                        <a href="#" value="r5_rab" class="acercar"><i class="fas fa-plus"></i></a>
                        <a href="" id="descarga_rab_5_s" download><i class="fas fa-download desc"></i></a>
                    </div>
                    <div class="marco" id="marco_rabia_r5_s">
                        <img src="" id="imagen_pestaña_rabia_r5_s" alt="">
                    </div>
                    <iframe src="" id="adjunto_pestaña_rabia_r5_s"></iframe>
                </div>
               
                <div class="tab-content" id="tab-content-rab-r4">
                    <div class="pest_sup" id="pest_sup_rab_4_s">
                        <a href="#" value="r4_rab" class="alejar"><i class="fas fa-minus"></i></a>
                        <a href="#" value="r4_rab" class="acercar"><i class="fas fa-plus"></i></a>
                        <a href="" id="descarga_rab_4_s" download><i class="fas fa-download desc"></i></a>
                    </div>
                    <div class="marco" id="marco_rabia_r4_s">
                        <img src="" id="imagen_pestaña_rabia_r4_s" alt="">
                    </div>
                    <iframe src="" id="adjunto_pestaña_rabia_r4_s"></iframe>
                </div>
                
                <div class="tab-content" id="tab-content-rab-r3">
                    <div class="pest_sup" id="pest_sup_rab_3_s"> 
                        <a href="#" value="r3_rab" class="alejar"><i class="fas fa-minus"></i></a>
                        <a href="#" value="r3_rab" class="acercar"><i class="fas fa-plus"></i></a>
                        <a href="" id="descarga_rab_3_s" download><i class="fas fa-download desc"></i></a>
                    </div>
                    <div class="marco" id="marco_rabia_r3_s">
                        <img src="" id="imagen_pestaña_rabia_r3_s" alt="">
                    </div>
                    <iframe src="" id="adjunto_pestaña_rabia_r3_s"></iframe>
                </div>
        
                <div class="tab-content" id="tab-content-rab-r2">
                    <div class="pest_sup" id="pest_sup_rab_2_s">
                        <a href="#" value="r2_rab" class="alejar"><i class="fas fa-minus"></i></a>
                        <a href="#" value="r2_rab" class="acercar"><i class="fas fa-plus"></i></a>
                        <a href="" id="descarga_rab_2_s" download><i class="fas fa-download desc"></i></a>
                    </div>
                    <div class="marco" id="marco_rabia_r2_s">
                        <img src="" id="imagen_pestaña_rabia_r2_s" alt="">
                    </div>
                    <iframe src="" id="adjunto_pestaña_rabia_r2_s"></iframe>
                </div>
        
                <div class="tab-content" id="tab-content-rab-r1">
                    <div class="pest_sup" id="pest_sup_rab_1_s">
                        <a href="#" value="r1_rab" class="alejar"><i class="fas fa-minus"></i></a>
                        <a href="#" value="r1_rab" class="acercar"><i class="fas fa-plus"></i></a>
                        <a href="" id="descarga_rab_1_s" download><i class="fas fa-download desc"></i></a>
                    </div>
                    <div class="marco" id="marco_rabia_r1_s">
                        <img src="" id="imagen_pestaña_rabia_s" alt="">
                    </div>
                    <iframe src="" id="adjunto_pestaña_rabia_r1_s"></iframe>
                </div>
        </div>
    </div>
<div class="modal" id="ficha_vacunas_s">
    <div class="inside w30porcen h15p">
        <div>
            <input type="text" name="nombre_vacuna" id="nombre_vacuna_s">
            <button type="button" id="cierre_form_vac_s" class="cierre_form">X</button>
            <input type="date" id="fecha_vacuna_s" class="fecha_vacuna">
            <div>
                <input type="file" name="file" id="subida_imagen_s" accept=".jpg,.jpeg,.png,.pdf" >                      
            </div>
            <div class="opciones">
                <center><button type="button" id="envio_vacuna_s">Enviar</button></center>
            </div>
        </div>
    </div>
</div>
<form class="historias__cuerpo__busqueda"> 
        <input type="text" id="documentos" placeholder="test" class="oculto">
        <input type="text" id="documento_trabajador_sc" name="documento_trabajador" placeholder="Documento de Identificación" value="42081842">
        <div>
            <a href="#" id="busqueda_boton_sc"><i class="fas fa-search" ></i></a>
        </div>
    </form>
<section class="wrap">
    <section class="historias__cuerpo_completo" id="historias__cuerpo_completo" style="display: block;"><!--style="display: none;"-->
        <nav class="historias__vertical__menu">
            <a href="#" id="opcion1_sc" class="opcion_vertical resaltado">1.- Datos Generales</a>
            <a href="#" id="opcion2_sc" class="opcion_vertical">2.- Exámenes Médicos</a> 
            <a href="#" id="opcion3_sc" class="opcion_vertical">3.- Atenciones Médicas</a>
            <a href="#" id="opcion4_sc" class="opcion_vertical">4.- Vacunas</a>
            <a href="#" id="opcion5_sc" class="opcion_vertical">5.- Documentops Adjuntos</a>
        </nav>
        <section class="historias__cuerpo">
            <section class="historias__cuerpo__pagina bars" id="pagina1_sc"> 
                <div>
                    <form id="formulario_datos_trabajador">
                        <input type="file" id="uploadPdfSc" accept=".pdf" class="oculto">
                        <div>
                            <h3>Datos del trabajador</h3>
                            <div class="formulario_datos_trabajador_4columnas">
                                <label for="numero__registro_sc">N° Registro</label>
                                <input type="text" name="numero__registro_sc" id="numero__registro_sc">
                                <label for="documento__identidad_sc">Documento Identidad</label>
                                <input type="text" name="documento__identidad_sc" id="documento__identidad_sc">
                                <label for="nombres__apellidos_sc">Nombres y apellidos</label>
                                <input type="text" name="nombres__apellidos_sc" id="nombres__apellidos_sc">
                                <label for="fecha__nacimiento_sc">Fecha Nacimiento</label>
                                <input type="date" name="fecha__nacimiento_sc" id="fecha__nacimiento_sc">
                                <label for="correo__electronico_sc">Correo Electrónico</label>
                                <input type="text" name="correo__electronico_sc" id="correo__electronico_sc">
                                <label for="sexo__trabajador_sc">Sexo :</label>
                                <select name="" id="sexo__trabajador_sc">
                                    <option value="MASCULINO">MASCULINO</option>
                                    <option value="FEMENINO">FEMENINO</option>
                                </select>
                                <label for="cargo__trabajador_sc">Cargo :</label>
                                <input type="text" name="cargo__trabajador_sc" id="cargo__trabajador_sc">
                                <label for="centro_costos_sc">Centro de Costos :</label>
                                <input type="text" name="centro_costos_sc" id="centro_costos_sc">
                                <label for="sede__trabajador_sc">Sede :</label>
                                <input type="text" name="sede__trabajador_sc" id="sede__trabajador_sc">
                                <label for="estado__trabajador_sc">Estado :</label>
                                <input type="text" name="estado__trabajador_sc" id="estado__trabajador_sc">
                                <label for="direccion__trabajador_sc">Dirección :</label>
                                <input type="text" name="direccion__trabajador_sc" id="direccion__trabajador_sc">
                                <label for="edad__trabajador_sc">Edad :</label>
                                <input type="text" name="edad__trabajador_sc" id="edad__trabajador_sc">
                                <label for="telefono__trabajador_sc">Telefono :</label>
                                <input type="text" name="telefono__trabajador_sc" id="telefono__trabajador_sc">
                                <label for="empresa__trabajador_sc">Empresa :</label>
                                <select name="" id="empresa__trabajador_sc">
                                    <option value="1">AISLASISTEMAS SAC</option>
                                    <option value="2">ALERCOGE SAC</option>
                                    <option value="3">ASEC PERU SAC</option>
                                    <option value="4">ATLAS COPCO PERU SAC</option>
                                    <option value="5">CATHODIC PROTECTION OF PERU SAC</option>
                                    <option value="6">CERTIFICACIONES Y CALIBRACIONES SAC</option>
                                    <option value="7">EMMERSON PROCESS MANAGEMENT DEL PERU SAC</option>
                                    <option value="8">FIMA MONTAJES SAC</option>
                                    <option value="9">FIMA SA</option>
                                    <option value="10">GERDIPAC INDUSTRIAL EIRL</option>
                                    <option value="11">HUERTA MINING SERVICE SAC</option>
                                    <option value="12">IMARK SOLUCIONES INTEGRALES SAC</option>
                                    <option value="13">AISLASISTEMAS.SAC</option>
                                </select>
                            </div> 
                            <button type="button" id="actualizarSubcontratas">Actualizar</button>
                        </div>
                    </form>
                </div>
            </section>
            <section class="historias__cuerpo__pagina oculto" id="pagina2_sc">
                <div class="historias__cuerpo__agregar">
                    <div>
                        <button type="button" id="abrir_pestañas" class="oculto">pestañas</button>
                        <!--button type="button" class="oculto">+ Subir Examenes</button -->
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
                        <tbody class="tabla__examenes_body" id="tabla__examenes_body_sc">
                        </tbody>
                        
                    </table>
                </div>
            </section>
            <section class="historias__cuerpo__pagina oculto" id="pagina3_sc">
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
            <section class="historias__cuerpo__pagina oculto" id="pagina4_sc">
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
                                <div class="separacion">
                                    <span>D1</span>
                                    <input type="date" name="fiebre_amarilla__d1" id="fiebre_amarilla__d1_s" class="fecha_vac" readonly>
                                    <a href="" id="vista_previa_vac_s" class="vista_previa_vac_s" value="fiebre amarilla"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="fiebre amarilla"><i class="fas fa-upload" id="icono_fbra_s"></i></a><!--cambiar id a class-->
                                    <input type="text" name="fiebre_amarilla__cnf" id="fiebre_amarilla_s__cnf" class="validarInmunidad_s" readonly>
                                </div>
                            </div>
                            <br>
                            <div class="item__vacuna">
                                <div>
                                    <h5>Difteria Tetano</h5>
                                </div>
                                <div class="columnas_8">
                                    <span>D1</span>
                                    <input type="date" name="fiebre__d1" id="fiebre__d1_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s" value="difteTet_D1"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="difteTet_D1"><i class="fas fa-upload" id="icono_dt_d1_s"></i></a>
                                    <span>D2</span>
                                    <input type="date" name="fiebre__d2" id="fiebre__d2_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s" value="difteTet_D2"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="difteTet_D2"><i class="fas fa-upload" id="icono_dt_d2_s"></i></a>
                                    <span>D3</span>
                                    <input type="date" name="fiebre__d3" id="fiebre__d3_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s" value="difteTet_D3"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="difteTet_D3"><i class="fas fa-upload" id="icono_dt_d3_s" ></i></a>
                                    <span>R1</span>
                                    <input type="date" name="fiebre__r1" id="fiebre__r1_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s" value="difteTet_R1"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="difteTet_R1"><i class="fas fa-upload" id="icono_dt_r1_s"></i></a>
                                    <span>R2</span>
                                    <input type="date" name="fiebre__r2" id="fiebre__r2_s" class="R2" readonly>
                                    <a href="" class="subida_vacunas_s" value="difteTet_R2"><i class="fas fa-upload"></i></a>
                                </div>
                            </div>
                            <br>    
                            <div class="item__vacuna">
                                <div>
                                    <h5>Hepatitis A</h5>
                                </div>
                                <div class="columnas_8">
                                    <span>D1</span>
                                    <input type="date" name="hepatitis_A__d1" id="hepatitis_A__d1_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s" value="HepatitisA_D1"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="HepatitisA_D1"><i class="fas fa-upload" id="icono_ha_d1_s"></i></a>
                                    <span>D2</span>
                                    <input type="date" name="hepatitis_A__d2" id="hepatitis_A__d2_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s" value="HepatitisA_D2"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="HepatitisA_D2"><i class="fas fa-upload" id="icono_ha_d2_s"></i></a>
                                    <span>R1</span>
                                    <input type="date" name="hepatitis_A__r1" id="hepatitis_A__r1_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s" value="HepatitisA_R1"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="HepatitisA_R1"><i class="fas fa-upload" id="icono_ha_r1_s"></i></a>
                                    <span>R2</span>
                                    <input type="date" name="hepatitis_A__r2" id="hepatitis_A__r2_s" class="R2" readonly>
                                    <a href="" class="subida_vacunas_s" value="HepatitisA_R2"><i class="fas fa-upload"></i></a>
                                </div>
                            </div>
                            <br>    
                            <div class="item__vacuna">
                                <div>
                                    <h5>Hepatitis B</h5>
                                </div>
                                <div >
                                    <div class="columnas_8">
                                        <span>D1</span>
                                        <input type="date" name="hepatitis_B__d1" id="hepatitis_B__d1_s" class="fecha_vac" readonly>
                                        <a href="" class="vista_previa_vac_s" value="HepatitisB_D1"><i class="fas fa-eye"></i></a>
                                        <a href="" class="subida_vacunas_s" value="HepatitisB_D1"><i class="fas fa-upload" id="icono_hb_d1_s"></i></a>
                                        <span>D2</span>
                                        <input type="date" name="hepatitis_B__d2" id="hepatitis_B__d2_s" class="fecha_vac" readonly>
                                        <a href="" class="vista_previa_vac_s" value="HepatitisB_D2"><i class="fas fa-eye"></i></a>
                                        <a href="" class="subida_vacunas_s" value="HepatitisB_D2"><i class="fas fa-upload" id="icono_hb_d2_s"></i></a>
                                    </div>
                                    <div class="separacion hepb_sep">
                                        <span>D3</span>
                                        <input type="date" name="hepatitis_B__d3" id="hepatitis_B__d3_s" class="fecha_vac" readonly>
                                        <a href="" class="vista_previa_vac_s" value="HepatitisB_D3"><i class="fas fa-eye"></i></a>
                                        <a href="" class="subida_vacunas_s" value="HepatitisB_D3"><i class="fas fa-upload" id="icono_hb_d3_s"></i></a>
                                        <input type="text" name="hepatitis_B__r1" id="hepatitis_B__r1_s" class="validarInmunidad_s" readonly>
                                    </div>
                                </div>
                            </div>
                            <br>    
                            <div class="item__vacuna">
                                <div>
                                    <h5>Influenza</h5>
                                </div>
                                <div class="columnas_8">
                                    <span>R1</span>
                                    <input type="date" name="influenza__r1" id="influenza__r1_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s" value="Influenza_R1"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="Influenza_R1"><i class="fas fa-upload" id="icono_if_r1_s"></i></a>
                                    <span>R2</span>
                                    <input type="date" name="influenza__r2" id="influenza__r2_s" class="R2" readonly>
                                    <a href="" class="subida_vacunas_s" value="Influenza_R2"><i class="fas fa-upload"></i></a>
                                </div>
                            </div>
                            <br>    
                            <div class="item__vacuna">
                                <div>
                                    <h5>Poliomelitis</h5>
                                </div>
                                <div class="separacion">
                                    <span>D1</span>
                                    <input type="date" name="poliomelitis__d1" id="poliomelitis__d1_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s" value="Polio_D1"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="Polio_D1"><i class="fas fa-upload" id="icono_pl_r1_s"></i></a>
                                    <input type="text" name="poliomelitis__r1" id="poliomelitis__r1_s" class="validarInmunidad_s" readonly>
                                </div>
                            </div>
                            <br>    
                            <div class="item__vacuna">
                                <div>
                                    <h5>Trivirica</h5>
                                </div>
                                <div class="separacion">
                                    <span>D1</span>
                                    <input type="date" name="trivirica__d1" id="trivirica__d1_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s" value="Trivirica_D1"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="Trivirica_D1"><i class="fas fa-upload" id="icono_tv_r1_s"></i></a>
                                    <input type="text" name="trivirica__r1" id="trivirica__r1_s" class="validarInmunidad_s" readonly>
                                </div>
                            </div>
                            <br>        
                            <div class="item__vacuna">
                                <div>
                                    <h5>Rabia</h5>
                                </div>
                                <div class="columnas_8">
                                    <span>D1</span>
                                    <input type="date" name="rabia__d1" id="rabia__d1_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s" value="Rabia_D1"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="Rabia_D1"><i class="fas fa-upload" id="icono_rb_d1_s"></i></a>
                                    <span>D2</span>
                                    <input type="date" name="rabia__d2" id="rabia__d2_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s" value="Rabia_D2"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="Rabia_D2"><i class="fas fa-upload" id="icono_rb_d2_s"></i></a>
                                    <span>D3</span>
                                    <input type="date" name="rabia__d3" id="rabia__d3_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s" value="Rabia_D3"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="Rabia_D3"><i class="fas fa-upload" id="icono_rb_d3_s"></i></a>
                                    <span>R1</span>
                                    <input type="date" name="rabia__r1" id="rabia__r1_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s" value="Rabia_R1"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="Rabia_R1"><i class="fas fa-upload" id="icono_rb_r1_s"></i></a><!--subidaR1-->
                                    <span>R2</span>
                                    <input type="date" name="rabia__r2" id="rabia__r2_s" class="R2" readonly>
                                    <a href="" class="subida_vacunas_s" value="Rabia_R2"><i class="fas fa-upload"></i></a><!--subidaR2-->                                    
                                </div>
                            </div>
                            <br>    
                            <div class="item__vacuna">
                                <div>
                                    <h5>Tifoidea</h5>
                                </div>
                                <div class="columnas_8">
                                    <span>R1</span>
                                    <input type="date" name="tifoidea__d1" id="tifoidea__r1_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s" value="Tifoidea_R1"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s"  value="Tifoidea_R1"><i class="fas fa-upload" id="icono_tf_r1_s"></i></a>
                                    <span>R2</span>
                                    <input type="date" name="tifoidea__r1" id="tifoidea__r2_s" class="R2" readonly>
                                    <a href="" class="subida_vacunas_s"  value="Tifoidea_R2"><i class="fas fa-upload"></i></a>
                                </div>
                            </div>
                            <br>    
                            <div class="item__vacuna">
                                <div>
                                    <h5>Neumococo</h5>
                                </div>
                                <div class="columnas_8">
                                    <span>R1</span>
                                    <input type="date" name="neumococo__d1" id="neumococo__r1_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s"  value="Neumococo_R1"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="Neumococo_R1"><i class="fas fa-upload" id="icono_nm_r1_s"></i></a>
                                    <span>R2</span>
                                    <input type="date" name="neumococo__r1" id="neumococo__r2_s" class="R2" readonly>
                                    <a href="" class="subida_vacunas_s" value="Neumococo_R2"><i class="fas fa-upload"></i></a>
                                </div>
                            </div>
                            <br>    
                            <div class="item__vacuna">
                                <div>
                                    <h5>COVID</h5>
                                </div>
                                <div class="columnas_8">
                                    <span>D1</span>
                                    <input type="date" name="covid__d1" id="covid__d1_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s" value="COVID_D1"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="COVID_D1"><i class="fas fa-upload" id="icono_cv_d1_s"></i></a>
                                    <span>D2</span>
                                    <input type="date" name="covid__d2" id="covid__d2_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s" value="COVID_D2"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="COVID_D2"><i class="fas fa-upload" id="icono_cv_d2_s"></i></a>
                                    <span>D3</span>
                                    <input type="date" name="covid__d3" id="covid__d3_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s" value="COVID_D3"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="COVID_D3"><i class="fas fa-upload" id="icono_cv_d3_s"></i></a>
                                    <span>D4</span>
                                    <input type="date" name="covid__d4" id="covid__d4_s" class="fecha_vac" readonly>
                                    <a href="" class="vista_previa_vac_s" value="COVID_D4"><i class="fas fa-eye"></i></a>
                                    <a href="" class="subida_vacunas_s" value="COVID_D4"><i class="fas fa-upload" id="icono_cv_d4_s"></i></a>
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
                                <input type="text" id="nombre_pase_s" readonly>
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
            <section class="historias__cuerpo__pagina oculto" id="pagina5_sc">
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
</section>
<script src="../js/subcontratas.js?v<?php echo $random;?>" type="module"></script>    
<script src="../js/vacunasSubcontratas.js?v<?php echo $random;?>" type="module"></script>    
</body>
</html>