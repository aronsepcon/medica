<?php
    $random = rand(0,1000);
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
    <div class="historias__cuerpo__busqueda">
        <input type="text" id="documento_trabajador" name="documento_trabajador" placeholder="Documento de Identificación">
        <div>
            <a href="#"><i class="fas fa-search"></i></a>
        </div>
    </div>
    <hr>
    <nav class="historias__vertical__menu">
        <a href="#" id="opcion1" class="opcion_vertical resaltado">1.- Datos Generales</a>
        <a href="#" id="opcion2" class="opcion_vertical">2.- Evaluaciones Peliminares</a> 
        <a href="#" id="opcion3" class="opcion_vertical">3.- Exámenes Médicos</a> 
        <a href="#" id="opcion4" class="opcion_vertical">4.- Atenciones Médicas</a>
        <a href="#" id="opcion5" class="opcion_vertical">5.- Vacunas</a>
        <a href="#" id="opcion6" class="opcion_vertical">6.- Documentops Adjuntos</a>
    </nav>
    <section class="historias__cuerpo">
        <section class="historias__cuerpo__pagina bars" id="pagina1"> 
            <div>
                <form id="formulario_datos_trabajador">
                    <input type="file" name="archivos__adjustos" id="archivos__adjustos" class="oculto">
                    <input type="file" name="archivos__consuta" id="archivos__consuta" class="oculto">
                    <div>
                        <h3>Datos del trabajador</h3>
                        <div class="formulario_datos_trabajador_4columnas">
                            <label for="numero__registro">N° Registro</label>
                            <input type="text" name="numero__registro" id="numero__registro">
                            <label for="documento__identidad">Documento Identidad</label>
                            <input type="text" name="documento__identidad" id="documento__identidad">
                            <label for="nombres__apellidos">Nombres y apellidos</label>
                            <input type="text" name="nombres__apellidos" id="nombres__apellidos">
                            <label for="fecha__nacimiento">Fecha Nacimiento</label>
                            <input type="date" name="fecha__nacimiento" id="fecha__nacimiento">
                            <label for="tipo__examen">Tipo Examen</label>
                            <input type="text" name="tipo__examen" id="tipo__examen">
                            <label for="clinica__atencion">Clinica Atencion</label>
                            <input type="text" id="clinica__atencion" name="clinica__atencion">
                            <label for="aptitud">Aptitud</label>
                            <input type="text" name="aptitud" id="aptitud">
                            <label for="empresa">Empresa</label>
                            <input type="text" name="empresa" id="empresa">
                            <label for="fecha_examen_ocupacional">Fecha Examen Ocupacional</label>
                            <input type="text" name="fecha_examen_ocupacional" id="fecha_examen_ocupacional">
                            <label for="numero__pase__medico">Número pase médico</label>
                            <input type="text" name="numero__pase__medico" id="numero__pase__medico">
                            <label for="proximo__examen">Proximo exámen</label>
                            <input type="date" name="proximo__examen" id="proximo__examen">
                        </div> 
                    </div>
                </form>
            </div>
        </section>
        <section class="historias__cuerpo__pagina oculto" id="pagina2">
            <div class="historias__cuerpo__agregar">
                <div>
                    <button type="button">+ Agregar Evaluacion</button>
                </div>
            </div>
            <div class="historias__tabla bars">
                <table id="tabla_evaluaciones" class="w150porcen">
                    <thead>
                        <th>
                            <td><i class="far fa-address-book"></i></td>
                            <td>Tipo</td>
                            <td>Peso</td>
                            <td>IMC</td>
                            <td>P. Esfuerzo</td>
                            <td>Antecedente Exp. Factor</td>
                            <td>Riesgo Ocupacional</td>
                            <td>Antecedentes</td>
                            <td>Patológicos Personal</td>
                            <td>Espirometria</td>
                            <td>Oftalmologica</td>
                            <td>Audiometria</td>
                            <td>PA(mHg)</td>
                            <td>Otoscopia</td>
                            <td>Osteomuscular</td>
                            <td>Odontoestomalogia</td>
                            <td>EKG</td>
                            <td>Rayos X</td>
                            <td>Psicologico</td>
                            <td>Psicosem</td>
                            <td>Altura</td>
                            <td><i class="fas fa-paperclip"></i></td>
                        </th>
                    </thead>
                </table>
            </div>
        </section>
        <section class="historias__cuerpo__pagina oculto" id="pagina3">
            <div class="historias__cuerpo__agregar">
                <div>
                    <button type="button">+ Agregar Examen</button>
                </div>
            </div>
            <div class="historias__tabla bars">
                <table id="tabla__examenes" class="w150porcen">
                    <thead>
                        <th>
                            <td><i class="far fa-address-book"></i></td>
                            <td>Tipo</td>
                            <td>HBG</td>
                            <td>HTO</td>
                            <td>Gota G</td>
                            <td>Plaquetas</td>
                            <td>Colesterol</td>
                            <td>HDL</td>
                            <td>LDL</td>
                            <td>Trigloceridos</td>
                            <td>TGP</td>
                            <td>Glucosa</td>
                            <td>Urea</td>
                            <td>Acido Urico</td>
                            <td>Creatinina</td>
                            <td>VDRL</td>
                            <td>RPR</td>
                            <td>Toxiscreen</td>
                            <td>Parasitología</td>
                            <td>H. Naofaringe</td>
                            <td><i class="fas fa-paperclip"></i></td>
                        </th>
                    </thead>
                </table>
            </div>
        </section>
        <section class="historias__cuerpo__pagina oculto" id="pagina4">
            <div class="historias__cuerpo__agregar">
                <div>
                    <button type="button">+ Agregar Atención</button>
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
                </table>
            </div>
        </section>
        <section class="historias__cuerpo__pagina oculto" id="pagina5">
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
        <section class="historias__cuerpo__pagina oculto" id="pagina6">
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
                </table>
            </div>   
        </section>
        <div class="navigator__commands">
            <button type="button">Anterior</button>
            <button type="button">Siguiente</button>
        </div>
    </section>
    <script src="../js/historias.js"></script>
</body>
</html>