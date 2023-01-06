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
                <div>
                    <button type="button" id="editar_form" class="editar_form">Editar</button>                
                    <button type="button" id="cambiar_env" class="cambiar_env">Validar</button>
                </div>
                <label for="asunto__correo">Asunto :</label>
                <input type="text" name="asunto__correo" id="asunto__correo" readonly>
                <label for="direccion__correo">Correo electrónico</label>
                <input type="mail" name="direccion__correo" id="direccion__correo" readonly>
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
   
    <form class="historias__cuerpo__busqueda" method="post">
        <div>
            <input type="radio" name="filtrado" id="radio__nombre">
            <label for="radio__nombre">Por Nombre</label>
            <input type="radio"  name="filtrado" id="radio__dni" checked>
            <label for="radio__dni">Por DNI</label>
        </div>    
        <input type="text" id="nombres_trabajador" name="nombres_trabajador" style="color:gray" placeholder="Nombres" value="" readonly>
        <input type="text" id="documento_trabajador" name="documento_trabajador" placeholder="Documento de Identificación" value="42081842">
        <div>
            <a href="#" id="busqueda_boton"><i class="fas fa-search" ></i></a>
        </div>
    </form>
    <div class="modal" id="pase_medico">
        <div class="inside w55porcen h60p">
            <button type="button" id="cierre_pase_medico">X</button>
        </div>
    </div>
    <div class="modal" id="ficha__vistaprevia">    
        <div class="inside h90p">
            <button type="button" id="cierre_form_ing">X</button>
            <iframe src="" id="frame__adjunto"></iframe>
        </div>    
    </div>
    <div class="modal" id="ficha__vistaprevia_vac">  
        <div class="inside h90p">
            <button type="button" id="cierre_form_vp_vac">X</button>
            <div class="pest_sup" id="pest_sup_vac">
                <a href="#" value="vac" class="alejar"><i class="fas fa-minus"></i></a>
                <a href="#" value="vac" class="acercar"><i class="fas fa-plus"></i></a>
                <a href="#" id="descarga_vac" download><i class="fas fa-download desc"></i></a>
            </div>
            <div class="marco" id="marco">
                <img src="" id="imagen" alt="">
            </div>
        </div>    
    </div>

    <div class="modal" id="pestañas">
        <div class="inside h90p">
            <button type="button" id="cierre_pestañas">X</button>
                <div class="tab-container">
                    <a href="#" id="tab1" class="tab" value="tab1,tab-content-r1">Pestaña 1</a>
                    <a href="#" id="tab2" class="tab" value="tab2,tab-content-r2">Pestaña 2</a>
                    <a href="#" id="tab3" class="tab" value="tab3,tab-content-r3">Pestaña 3</a>
                    <a href="#" id="tab4" class="tab" value="tab4,tab-content-r4">Pestaña 4</a>         
                </div>
                <div class="tab-content"  id="tab-content-r4">
                        <div class="pest_sup" id="pest_sup_r4">
                            <a href="#" value="r4" class="alejar"><i class="fas fa-minus"></i></a>
                            <a href="#" value="r4" class="acercar"><i class="fas fa-plus"></i></a>
                            <a href="#" id="descarga" download><i class="fas fa-download desc"></i></a>
                        </div>
                        <div class="marco" id="marco_r4">
                            <img src="" class="img_pestaña" id="imagen_pestaña_r4" alt="">  
                        </div>
                        <iframe src="" id="adjunto_pestaña_r4" ></iframe>      
                </div>
                <div class="tab-content" id="tab-content-r3">
                        <div class="pest_sup" id="pest_sup_r3">
                            <a href="#" value="r3" class="alejar"><i class="fas fa-minus"></i></a>
                            <a href="#" value="r3" class="acercar"><i class="fas fa-plus"></i></a>
                            <a href="#" id="descarga_2" download><i class="fas fa-download desc"></i></a>
                        </div>
                        <div class="marco" id="marco_r3">
                            <img src="" class="img_pestaña" id="imagen_pestaña_r3" alt=""> 
                        </div>    

                        <iframe src="" id="adjunto_pestaña_r3" ></iframe>   
                </div>
                <div class="tab-content" id="tab-content-r2">
                        <div class="pest_sup" id="pest_sup_r2">
                            <a href="#" value="r2" class="alejar"><i class="fas fa-minus"></i></a>
                            <a href="#" value="r2" class="acercar"><i class="fas fa-plus"></i></a>
                            <a href="" id="descarga_3" download><i class="fas fa-download desc"></i></a>
                        </div>
                        <div class="marco" id="marco_r2">
                            <img src="" class="img_pestaña" id="imagen_pestaña_r2" alt=""> 
                        </div>
                        <iframe src="" id="adjunto_pestaña_r2" ></iframe>    
                </div>
                <div class="tab-content" id="tab-content-r1">
                        <div class="pest_sup" id="pest_sup_r1">
                            <a href="#" value="r1" class="alejar"><i class="fas fa-minus"></i></a>
                            <a href="#" value="r1" class="acercar"><i class="fas fa-plus"></i></a>
                            <a href="#" id="descarga_1" download><i class="fas fa-download desc"></i></a>
                        </div>
                        <div class="marco" id="marco_r1">
                            <img src="" class="img_pestaña" id="imagen_pestaña" alt="">
                        </div>
                        <iframe src="" id="adjunto_pestaña_r1"></iframe>
                </div> 
        </div>
    </div>
        

    <div class="modal" id="pestañas_rabia">
        <div class="inside h90p">
            <button type="button" id="cierre_pestañas_rabia">X</button>
                <div class="tab-container">
                    <a href="#" id="tab1_r" class="tab_r" value="tab1_r,tab-content-rab-r1">Pestaña 1</a>
                    <a href="#" id="tab2_r" class="tab_r" value="tab2_r,tab-content-rab-r2">Pestaña 2</a>
                    <a href="#" id="tab3_r" class="tab_r" value="tab3_r,tab-content-rab-r3">Pestaña 3</a>
                    <a href="#" id="tab4_r" class="tab_r" value="tab4_r,tab-content-rab-r4">Pestaña 4</a>
                    <a href="#" id="tab5" class="tab_r" value="tab5,tab-content-r5">Pestaña 5</a>
                    <a href="#" id="tab6" class="tab_r" value="tab6,tab-content-r6">Pestaña 6</a>
                    <a href="#" id="tab7" class="tab_r" value="tab7,tab-content-r7">Pestaña 7</a>
                </div>
                <div class="tab-content" id="tab-content-r7">
                    <div class="pest_sup" id="pest_sup_rab_7">
                        <a href="#" value="r7_rab" class="alejar"><i class="fas fa-minus"></i></a>
                        <a href="#" value="r7_rab" class="acercar"><i class="fas fa-plus"></i></a>
                        <a href="" id="descarga_rab_7" download><i class="fas fa-download desc"></i></a>
                    </div>
                    <div class="marco" id="marco_rabia_r7">
                        <img src="" id="imagen_pestaña_rabia_r7" alt="">
                    </div>
                    <iframe src="" id="adjunto_pestaña_rabia_r7"></iframe>
                </div>
                <div class="tab-content" id="tab-content-r6">
                    <div class="pest_sup" id="pest_sup_rab_6">
                        <a href="#" value="r6_rab" class="alejar"><i class="fas fa-minus"></i></a>
                        <a href="#" value="r6_rab" class="acercar"><i class="fas fa-plus"></i></a>
                        <a href="" id="descarga_rab_6" download><i class="fas fa-download desc"></i></a>
                    </div>
                    <div class="marco" id="marco_rabia_r6">
                        <img src="" id="imagen_pestaña_rabia_r6" alt="">
                    </div>
                    <iframe src="" id="adjunto_pestaña_rabia_r6"></iframe>
                </div>

                <div class="tab-content" id="tab-content-r5">
                    <div class="pest_sup" id="pest_sup_rab_5">
                        <a href="#" value="r5_rab" class="alejar"><i class="fas fa-minus"></i></a>
                        <a href="#" value="r5_rab" class="acercar"><i class="fas fa-plus"></i></a>
                        <a href="" id="descarga_rab_5" download><i class="fas fa-download desc"></i></a>
                    </div>
                    <div class="marco" id="marco_rabia_r5">
                        <img src="" id="imagen_pestaña_rabia_r5" alt="">
                    </div>
                    <iframe src="" id="adjunto_pestaña_rabia_r5"></iframe>
                </div>
               
                <div class="tab-content" id="tab-content-rab-r4">
                    <div class="pest_sup" id="pest_sup_rab_4">
                        <a href="#" value="r4_rab" class="alejar"><i class="fas fa-minus"></i></a>
                        <a href="#" value="r4_rab" class="acercar"><i class="fas fa-plus"></i></a>
                        <a href="" id="descarga_rab_4" download><i class="fas fa-download desc"></i></a>
                    </div>
                    <div class="marco" id="marco_rabia_r4">
                        <img src="" id="imagen_pestaña_rabia_r4" alt="">
                    </div>
                    <iframe src="" id="adjunto_pestaña_rabia_r4"></iframe>
                </div>
                
                <div class="tab-content" id="tab-content-rab-r3">
                    <div class="pest_sup" id="pest_sup_rab_3"> 
                        <a href="#" value="r3_rab" class="alejar"><i class="fas fa-minus"></i></a>
                        <a href="#" value="r3_rab" class="acercar"><i class="fas fa-plus"></i></a>
                        <a href="" id="descarga_rab_3" download><i class="fas fa-download desc"></i></a>
                    </div>
                    <div class="marco" id="marco_rabia_r3">
                        <img src="" id="imagen_pestaña_rabia_r3" alt="">
                    </div>
                    <iframe src="" id="adjunto_pestaña_rabia_r3"></iframe>
                </div>
        
                <div class="tab-content" id="tab-content-rab-r2">
                    <div class="pest_sup" id="pest_sup_rab_2">
                        <a href="#" value="r2_rab" class="alejar"><i class="fas fa-minus"></i></a>
                        <a href="#" value="r2_rab" class="acercar"><i class="fas fa-plus"></i></a>
                        <a href="" id="descarga_rab_2" download><i class="fas fa-download desc"></i></a>
                    </div>
                    <div class="marco" id="marco_rabia_r2">
                        <img src="" id="imagen_pestaña_rabia_r2" alt="">
                    </div>
                    <iframe src="" id="adjunto_pestaña_rabia_r2"></iframe>
                </div>
        
                <div class="tab-content" id="tab-content-rab-r1">
                    <div class="pest_sup" id="pest_sup_rab_1">
                        <a href="#" value="r1_rab" class="alejar"><i class="fas fa-minus"></i></a>
                        <a href="#" value="r1_rab" class="acercar"><i class="fas fa-plus"></i></a>
                        <a href="" id="descarga_rab_1" download><i class="fas fa-download desc"></i></a>
                    </div>
                    <div class="marco" id="marco_rabia_r1">
                        <img src="" id="imagen_pestaña_rabia" alt="">
                    </div>
                    <iframe src="" id="adjunto_pestaña_rabia_r1"></iframe>
                </div>
        </div>
    </div>
    <div class="modal" id="historia_clinica">
        <div class="w150porcen hc">
            <button type="button" id="cierre_historia_clinica">X</button>
            <div class="caja-4cols">
                <div class="caja-union-4-25cols">
                    <div class="registro_historia_clinica caja">
                        <div>
                            <label for="">Nro de Registro</label>
                            <input type="text" id="idreg" readonly><!--de donde sale?--Igual preguntar luego e.e-->
                        </div>
                        <div>
                            <label for="">Documento de identidad</label>
                            <input type="text" id="documento_hc" readonly>
                            <label for="">Telefono</label>
                            <input type="text" id="telefono_hc" readonly>
                        </div>
                        <div>
                            <label for="">Nombre Trabajador</label>
                            <input type="text" id="nombre_hc" readonly>
                        </div>
                        <div>
                            <label for="">Fecha de Nacimiento</label>
                            <input type="date" id="fecnac_hc" readonly>
                            <label for="">Area</label>
                            <input type="text" id="area_hc" readonly>
                        </div>
                        <div>
                            <label for="">Cargo</label>
                            <input type="text" id="cargo_hc"readonly>
                            <label for="">Centro de Costos</label>
                            <input type="text" id="ccostos_hc" readonly> 
                        </div>
                        <div>
                            <label for="">Cliente/Operador</label>
                            <input type="text" readonly> 
                            <label for="">Empresa</label>
                            <input type="text" id="empresa_hc" readonly>
                        </div>
                        <div>
                            <label for="">Tipo de Examen</label>
                            <input type="text" id="tipoExa_hc" readonly> 
                            <label for="">Fecha Ex. Ocup.</label><!--ver q es ocupacional-->
                            <input type="text" id="fecha_hc" readonly>
                        </div>
                        <div>
                            <label for="">Clinica</label>
                            <input type="text" id="clinica_hc" readonly>
                            <label for="">N° de Pase Medico</label>
                            <input type="text" id="pase_hc" readonly>
                        </div>
                        <div>
                            <label for="">Aptitud</label>
                            <input type="text" id="actitud_hc" readonly>
                            <label for="">Sgte Examen</label>
                            <input type="text" id="sgtefecha" readonly>
                        </div>
                    </div>
                    <div class="caja eval_caja">
                        <label for="">Eval. Preliminares</label>
                        <div class="pre_3">
                            <label for="">Edad</label>
                            <input type="text" id="edad_hc" readonly>
                            <label for="">Peso(kg)</label>
                            <input type="text" id="peso_hc" readonly>
                            <label for="">IMC</label>
                            <input type="text" id="imc_hc" readonly>
                        </div>
                        <div class="pre_3">
                            <label for="">Grupo Sanguineo</label>
                            <input type="text" id="sangre_hc" readonly>
                            <label for="">Talla (mt)</label>
                            <input type="text" id="talla_hc" readonly>
                            <label for="">Sexo</label>
                            <input type="text" id="sexo_hc" readonly>
                        </div>
                        <div class="eval_extra">
                            <label for="">Alergia</label>
                            <input type="text" id="alergias_hc" readonly>
                            <label for="">Prueba de Esfuerzo</label>
                            <input type="text" id="pEsfuerzo_hc" readonly>
                            <label for="">Antec. Psicologicos</label>
                            <input type="text" id="ant_psi_hc" readonly>
                            <label for="">Antec. Riesg. Ocupacional</label>
                            <input type="text">
                            <label for="">Estado Nutricional</label>
                            <input type="text" id="estadoNut_hc">
                            <label for="">Espirometria</label>
                            <input type="text" id="espiro_hc">
                            <label for="">Ev. Oftalmologica</label>
                            <input type="text" id="evOftalmo_hc">
                        </div>
                        <div>
                            <label for="">Otoscopia</label>
                            <input type="text" id="">
                            <label for="">Ev. Audiometria</label>
                            <input type="text" id="evAudio_hc">
                        </div>
                            
                        <div>
                            <label for="">Ev. Osteomuscular</label>
                            <input type="text" id="evOsteo_hc">
                            <label for="">Ev. PA(mHg)</label>
                            <input type="text">
                        </div>
                    
                        <div class="eval_extra">
                            <label for="">Ev. Ondontoestomat.</label>
                            <input type="text">
                            <label for="">Ev. EKG</label>
                            <input type="text">
                            <label for="">Examen Rayos X</label>
                            <input type="text"id="exRayX_hc">
                        </div>
                        <div>
                            <label for="">Exa. Psicologico</label>
                            <input type="text" id="exPsi_hc">
                            <label for="">Exa. Altura</label>
                            <input type="text" id="exAltura_hc">
                        </div>
                        <div>
                            <label for="">Exa. Psicosem.</label>
                            <input type="text">
                            <label for="">Exa. Espa. Confi.</label>
                            <input type="text">
                        </div>
                    </div>
                </div>
                    
                <div class="caja exacaja">
                    <label for="">Examenes</label>
                    <div class="examen">
                        <label for="">HBG</label>
                        <input type="text" id="hbg_hc" readonly>
                        <label for="">HTO</label>
                        <input type="text" id="hto_hc" readonly>
                        <label for="">Gota G.</label>
                        <input type="text" id="gota_hc" readonly>
                        <label for="">Plaquetas</label>
                        <input type="text" id="plaquetas_hc" readonly>
                        <label for="">Colesterol</label>
                        <input type="text" id="colesterol_hc" readonly>
                        <label for="">HDL</label>
                        <input type="text" id="hdl_hc" readonly>
                        <label for="">LDL</label>
                        <input type="text" id="ldl_hc" readonly>
                        <label for="">Triglic.</label>
                        <input type="text" id="triglic_hc" readonly>
                        <label for="">TGP</label>
                        <input type="text" id="tgp_hc">
                        <label for="">TGO</label>
                        <input type="text" id="tgo_hc">
                        <label for="">Glucosa</label>
                        <input type="text" id="glucosa_hc" readonly>
                        <label for="">Urea</label>
                        <input type="text" id="urea_hc">
                        <label for="">Ac. Urico</label>
                        <input type="text" id="acUrico_hc" readonly>
                        <label for="">Creatinina</label>
                        <input type="text" id="creatinina_hc" readonly>
                        <label for="">VDRL</label>
                        <input type="text" id="vdrl_hc" readonly>
                        <label for="">RPR</label>
                        <input type="text" id="rpr_hc" readonly>
                        <label for="">Toxiscreen</label>
                        <input type="text" id="toxic_hc" readonly>
                        <label for="">RCV</label>
                        <input type="text" id="rcv_hc" readonly>
                        <label for="">Leucocitos</label>
                        <input type="text" id="leucocitos_hc" readonly>
                        <label for="">A.S. Hep.B</label>
                        <input type="text" id="hepB_hc" readonly>
                        <label for="">Ex. Parasit.</label>
                        <input type="text" readonly>
                        <label for="">H. Nasofar.</label>
                        <input type="text" readonly>
                        <label for="">Ex. Orina</label>
                        <input type="text" readonly>
                    </div>
                </div>
                <div class="caja diag_caja">
                    <label for="">Diagnosticos y Recomendaciones</label>
                    <div>
                        <label for="">1er. Diagnostico</label>
                        <input type="text" id="diag_hc_1" readonly>
                        <label for="">2do. Diagnostico</label>
                        <input type="text" id="diag_hc_2" readonly>
                        <label for="">3er. Diagnostico</label>
                        <input type="text" id="diag_hc_3" readonly>
                        <label for="">4to. Diagnostico</label>
                        <input type="text" id="diag_hc_4" readonly>
                        <label for="">5to. Diagnostico</label>
                        <input type="text" id="diag_hc_5" readonly>
                        <label for="">6to. Diagnostico</label>
                        <input type="text" id="diag_hc_6" readonly>
                        <label for="">Recomend. a Enf. Ocupac.</label>
                        <input type="text" readonly>
                        <label for="">Recomend. a Enf. Comunes</label>
                        <input type="text" readonly>
                        <label for="">Trat. Med. Actual</label>
                        <input type="text" readonly>
                        <label for="">Ing. Programa 1</label>
                        <input type="text" readonly>
                        <label for="">Ing. Programa 2</label>
                        <input type="text" readonly>
                        <label for="">Ing. Programa 3</label>
                        <input type="text" readonly>
                        <label for="">Ing. Programa 4</label>
                        <input type="text" readonly>
                        <label for="">Ing. Programa 5</label>
                        <input type="text" readonly>
                        <label for="">Ing. Programa 6</label>
                        <input type="text" readonly>
                    </div>
                </div>
                <div class="caja_vacunas caja">
                    <label for="">Vacunas</label>
                    <div class="grid_hc">
                        <label for="">Fiebre Amarilla</label>
                        <div>
                            <label for="">D1</label>
                            <input type="date" id="fa_hc" readonly>
                        </div>
                    </div>
                    <div class="grid_hc">
                        <label for="">Difteria Tetano</label>
                        <div>
                            <label for="">D1</label>
                            <input type="date" id="dt_d1_hc" readonly>
                            <label for="">D2</label>
                            <input type="date" id="dt_d2_hc" readonly>
                            <label for="">D3</label>
                            <input type="date" id="dt_d3_hc" readonly>
                            <label for="">R1</label>
                            <input type="date" id="dt_r1_hc" readonly>
                        </div>
                    </div>
                    <div class="grid_hc">
                        <label for="">Hepatitis A</label>
                        <div>
                            <label for="">D1</label>
                            <input type="date" id="ha_d1_hc" readonly>
                            <label for="">D2</label>
                            <input type="date" id="ha_d2_hc" readonly>
                            <label for="">R1</label>
                            <input type="date" id="ha_r1_hc" readonly>
                        </div>
                    </div>
                    <div class="grid_hc">
                        <label for="">Hepatitis B</label>
                        <div>
                            <label for="">D1</label>
                            <input type="date" id="hb_d1_hc" readonly>
                            <label for="">D2</label>
                            <input type="date" id="hb_d2_hc" readonly>
                            <label for="">D3</label>
                            <input type="date" id="hb_d3_hc" readonly> 
                        </div>               
                    </div>
                    <div class="grid_hc">
                        <label for="">Influenza</label>
                        <div>
                            <label for="">R1</label>
                            <input type="date" id="if_r1_hc" readonly>
                            <label for="">R2</label>
                            <input type="date" id="if_r2_hc" readonly>  
                        </div>     
                    </div>
                    <div class="grid_hc">
                        <label for="">Poliomelitis</label>
                        <div>
                            <label for="">D1</label>
                            <input type="date" id="pm_d1_hc" readonly>
                        </div>
                    </div> 
                    <div class="grid_hc">
                        <label for="">Trivirica</label>
                        <div>
                            <label for="">D1</label>
                            <input type="date" id="tv_d1_hc" readonly>
                        </div>
                    </div>
                    <div class="grid_hc">
                        <label for="">Rabia</label>
                        <div>
                            <label for="">D1</label>
                            <input type="date" id="rb_d1_hc" readonly>
                            <label for="">D2</label>
                            <input type="date" id="rb_d2_hc" readonly>
                            <label for="">D3</label>
                            <input type="date" id="rb_d3_hc" readonly>
                            <label for="">R1</label>
                            <input type="date" id="rb_r1_hc" readonly>
                        </div>
                    </div>
                    <div class="grid_hc">
                        <label for="">Tifoidea</label>
                        <div>
                            <label for="">R1</label>
                            <input type="date" id="tf_r1_hc" readonly>
                            <label for="">R2</label>
                            <input type="date" id="tf_r2_hc" readonly> 
                        </div>
                    </div>
                    <div class="grid_hc">
                        <label for="">Neumococo</label>
                        <div>
                            <label for="">R1</label>
                            <input type="date" id="nm_r1_hc" readonly>
                            <label for="">R2</label>
                            <input type="date" id="nm_r2_hc" readonly> 
                        </div>
                    </div>
                    <div class="grid_hc">
                        <label for="">COVID</label>
                        <div>
                            <label for="">D1</label>
                            <input type="date" id="cv_d1_hc" readonly>
                            <label for="">D2</label>
                            <input type="date" id="cv_d2_hc" readonly>
                            <label for="">D3</label>
                            <input type="date" id="cv_d3_hc" readonly>
                            <label for="">D4</label>
                            <input type="date" id="cv_d4_hc" readonly>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="ficha_vacunas">
        <div class="inside w30porcen h15p">
            <div>
                <input type="hidden" name="nombre_vacuna" id="nombre_vacuna">
                <button type="button" id="cierre_form_vac" class="cierre_form">X</button>
                <input type="date" id="fecha_vacuna" class="fecha_vacuna">
                <div>
                    <input type="file" name="file" id="subida_imagen" accept=".jpg,.jpeg,.png,.pdf" >                      
                </div>
                <div class="opciones">
                    <center><button type="button" id="envio_vacuna">Enviar</button></center>
                </div>
            </div>
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
    <section id="busqueda_parcial" class="busqueda_parcial" style="display: none;" > 
        <div class="tabla__busqueda bars">
            <table id="tabla__busqueda" class="w100porcen">
                <thead>
                    <tr>
                        <th width=8%>DNI</th>
                        <th>Nombres y Apellidos</th>
                        <th>Estado</th>
                        <th>Sede</th>
                        <th>Ver</th>
                    </tr>
                </thead>
                <tbody id="tabla__busqueda_body"></tbody>
            </table>
        </div>
    </section>
    <section class="historias__cuerpo_completo" id="historias__cuerpo_completo" style="display: block;"><!--style="display: none;"-->
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
                                <input type="text" name="correo__electronico" id="correo__electronico">
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
                                <label for="direccion__trabajador">Dirección :</label>
                                <input type="text" name="direccion__trabajador" id="direccion__trabajador">
                                <label for="edad__trabajador">Edad :</label>
                                <input type="text" name="edad__trabajador" id="edad__trabajador" readonly>
                                <label for="telefono__trabajador">Telefono :</label>
                                <input type="text" name="telefono__trabajador" id="telefono__trabajador">
                            </div> 
                            <button type="button" id="actualizarReg">Actualizar</button>
                        </div>
                    </form>
                </div>
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
                                <div class="separacion">
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
                                <div >
                                    <div class="columnas_8">
                                        <span>D1</span>
                                        <input type="date" name="hepatitis_B__d1" id="hepatitis_B__d1" class="fecha_vac" readonly>
                                        <a href="" class="vista_previa_vac" value="HepatitisB_D1"><i class="fas fa-eye"></i></a>
                                        <a href="" class="subida_vacunas" value="HepatitisB_D1"><i class="fas fa-upload" id="icono_hb_d1"></i></a>
                                        <span>D2</span>
                                        <input type="date" name="hepatitis_B__d2" id="hepatitis_B__d2" class="fecha_vac" readonly>
                                        <a href="" class="vista_previa_vac" value="HepatitisB_D2"><i class="fas fa-eye"></i></a>
                                        <a href="" class="subida_vacunas" value="HepatitisB_D2"><i class="fas fa-upload" id="icono_hb_d2"></i></a>
                                    </div>
                                    <div class="separacion hepb_sep">
                                        <span>D3</span>
                                        <input type="date" name="hepatitis_B__d3" id="hepatitis_B__d3" class="fecha_vac" readonly>
                                        <a href="" class="vista_previa_vac" value="HepatitisB_D3"><i class="fas fa-eye"></i></a>
                                        <a href="" class="subida_vacunas" value="HepatitisB_D3"><i class="fas fa-upload" id="icono_hb_d3"></i></a>
                                        <input type="text" name="hepatitis_B__r1" id="hepatitis_B__r1" class="validarInmunidad" readonly>
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
                                <div class="separacion">
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
                                <div class="separacion">
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
                            <div class="pase_grid">
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
    <script src="../js/cargaMasiva.js?v<?php echo $random;?>" type="module"></script>
    <script src="../js/paseMedico.js?v<?php echo $random;?>" type="module"></script>
    <script src="../js/funciones.js" type="module"></script>
    <script src="../js/historias.js?v<?php echo $random;?>" type="module"></script>    
</body>
</html>