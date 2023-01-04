import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import {validar} from "./funciones.js";

//import {listarexamenes} from "./historias";
///esto puede servir para llamar a la funcion de forma mas directa uu
const $documento_trabajador = document.getElementById('documento_trabajador_sc');
const $subida_vacunas = document.querySelectorAll(".subida_vacunas_s");
const $ficha_vacunas = document.getElementById("ficha_vacunas_s");
const $cierre_form_vac = document.getElementById("cierre_form_vac_s");
const $fecha_vacuna = document.getElementById("fecha_vacuna_s");
const $subida_imagen = document.getElementById("subida_imagen_s");
const $envio_vacuna = document.getElementById("envio_vacuna_s");
const $nombre_vacuna = document.getElementById("nombre_vacuna_s");
const $nombre_trabajador = document.getElementById('nombre_pase_s');

const $adj_val_dt = document.getElementById('adj_val_dt');

const $fiebre_amarilla__d1 = document.getElementById("fiebre_amarilla__d1_s");
const $difteria__d1 = document.getElementById("fiebre__d1_s");
const $difteria__d2 = document.getElementById("fiebre__d2_s");
const $difteria__d3 = document.getElementById("fiebre__d3_s");
const $difteria__r1 = document.getElementById("fiebre__r1_s");
const $difteria__r2 = document.getElementById("fiebre__r2_s");

const $hepatitis_A__d1 = document.getElementById("hepatitis_A__d1_s");
const $hepatitis_A__d2 = document.getElementById("hepatitis_A__d2_s");
const $hepatitis_A__r1 = document.getElementById("hepatitis_A__r1_s");
const $hepatitis_A__r2 = document.getElementById("hepatitis_A__r2_s");

const $hepatitis_B__d1 = document.getElementById("hepatitis_B__d1_s");
const $hepatitis_B__d2 = document.getElementById("hepatitis_B__d2_s");
const $hepatitis_B__d3 = document.getElementById("hepatitis_B__d3_s");

const $influenza__r1 = document.getElementById("influenza__r1_s");
const $influenza__r2 = document.getElementById("influenza__r2_s");

const $poliomelitis__d1 = document.getElementById("poliomelitis__d1_s");
const $trivirica__d1 = document.getElementById("trivirica__d1_s");

const $rabia__d1 = document.getElementById("rabia__d1_s");
const $rabia__d2 = document.getElementById("rabia__d2_s");
const $rabia__d3 = document.getElementById("rabia__d3_s");
const $rabia__r1 = document.getElementById("rabia__r1_s");
const $rabia__r2 = document.getElementById("rabia__r2_s");

const $tifoidea__r1 = document.getElementById("tifoidea__r1_s");
const $tifoidea__r2 = document.getElementById("tifoidea__r2_s");

const $neumococo__r1 = document.getElementById("neumococo__r1_s");
const $neumococo__r2 = document.getElementById("neumococo__r2_s");

const $covid__d1 = document.getElementById("covid__d1_s");
const $covid__d2 = document.getElementById("covid__d2_s");
const $covid__d3 = document.getElementById("covid__d3_s");
const $covid__d4 = document.getElementById("covid__d4_s");

const $validacion_Fiebre_Amar=document.getElementById("fiebre_amarilla_s__cnf");
const $hepatitis_B__r1 = document.getElementById("hepatitis_B__r1_s");
const $poliomelitis__r1 = document.getElementById("poliomelitis__r1_s");
const $trivirica__r1 = document.getElementById("trivirica__r1_s");
const $validarInmunidad_s = document.querySelectorAll(".validarInmunidad_s");//cambiar tmb la variable
const $fecha_vac = document.querySelectorAll(".fecha_vac");
const $icono_subida = document.querySelectorAll(".fas fa-upload");
const $descarga = document.getElementById("descarga_s");

const $pest_sup_r1 = document.getElementById("pest_sup_r1_s");
const $pest_sup_r2 = document.getElementById("pest_sup_r2_s");
const $pest_sup_r3 = document.getElementById("pest_sup_r3_s");
const $pest_sup_r4 = document.getElementById("pest_sup_r4_s");

const $pest_sup_rab_r1 = document.getElementById("pest_sup_rab_1_s");
const $pest_sup_rab_r2 = document.getElementById("pest_sup_rab_2_s");
const $pest_sup_rab_r3 = document.getElementById("pest_sup_rab_3_s");
const $pest_sup_rab_r4 = document.getElementById("pest_sup_rab_4_s");
const $pest_sup_rab_r5 = document.getElementById("pest_sup_rab_5_s");
const $pest_sup_rab_r6 = document.getElementById("pest_sup_rab_6_s");
const $pest_sup_rab_r7 = document.getElementById("pest_sup_rab_7_s");

const $cierre_form_vp_vac = document.getElementById("cierre_form_vp_vac_s");
const $ficha__vistaprevia_vac = document.getElementById("ficha__vistaprevia_vac_s");
const $vista_previa_vac = document.querySelectorAll(".vista_previa_vac_s");
//const $vista_previa_vac = document.getElementById("vista_previa_vac");
const $frame__adjunto_vac = document.getElementById("frame__adjunto_vac");
const $display_image = document.getElementById("imagen_s");
const $frame__adjunto = document.getElementById('frame__adjunto_s');
const $ficha__vistaprevia = document.getElementById('ficha__vistaprevia_s');

const $abrir_pestañas = document.getElementById("abrir_pestañas");
const $pestañas = document.getElementById("pestañas_s");
const $cierre_form_ing = document.getElementById('cierre_form_ing_s');
const $cierre_pestañas = document.getElementById("cierre_pestañas_s");
const $pestañas_rabia = document.getElementById("pestañas_rabia_s");
const $cierre_pestañas_rabia = document.getElementById("cierre_pestañas_rabia_s");

const $img_pestaña = document.querySelectorAll(".img_pestaña_s");
const $acercar = document.querySelectorAll(".acercar");
const $alejar = document.querySelectorAll(".alejar");

const $display_image_pest_r1 = document.getElementById("imagen_pestaña_s");
const $display_image_pest_r2 = document.getElementById("imagen_pestaña_r2_s");
const $display_image_pest_r3 = document.getElementById("imagen_pestaña_r3_s");
const $display_image_pest_r4 = document.getElementById("imagen_pestaña_r4_s");

const $display_image_pest_rabia = document.getElementById("imagen_pestaña_rabia_s");
const $display_image_pest_rabia_r2 = document.getElementById("imagen_pestaña_rabia_r2_s");
const $display_image_pest_rabia_r3 = document.getElementById("imagen_pestaña_rabia_r3_s");
const $display_image_pest_rabia_r4 = document.getElementById("imagen_pestaña_rabia_r4_s");
const $display_image_pest_rabia_r5 = document.getElementById("imagen_pestaña_rabia_r5_s");
const $display_image_pest_rabia_r6 = document.getElementById("imagen_pestaña_rabia_r6_s");
const $display_image_pest_rabia_r7 = document.getElementById("imagen_pestaña_rabia_r7_s");

const $adjunto_pestaña_r1 = document.getElementById("adjunto_pestaña_r1_s");
const $adjunto_pestaña_r2 = document.getElementById("adjunto_pestaña_r2_s");
const $adjunto_pestaña_r3 = document.getElementById("adjunto_pestaña_r3_s");
const $adjunto_pestaña_r4 = document.getElementById("adjunto_pestaña_r4_s");

const $adjunto_pestaña_rabia_r1 = document.getElementById("adjunto_pestaña_rabia_r1_s");
const $adjunto_pestaña_rabia_r2 = document.getElementById("adjunto_pestaña_rabia_r2_s");
const $adjunto_pestaña_rabia_r3 = document.getElementById("adjunto_pestaña_rabia_r3_s");
const $adjunto_pestaña_rabia_r4 = document.getElementById("adjunto_pestaña_rabia_r4_s");
const $adjunto_pestaña_rabia_r5 = document.getElementById("adjunto_pestaña_rabia_r5_s");
const $adjunto_pestaña_rabia_r6 = document.getElementById("adjunto_pestaña_rabia_r6_s");
const $adjunto_pestaña_rabia_r7 = document.getElementById("adjunto_pestaña_rabia_r7_s");

const $tab1 = document.getElementById("tab1_s"); 
const $tab2 = document.getElementById("tab2_s"); 
const $tab3 = document.getElementById("tab3_s"); 
const $tab4 = document.getElementById("tab4_s"); 

$subida_vacunas.forEach(function($subida_vacunas){
    $subida_vacunas.onclick = (e) => {
        e.preventDefault();

        $nombre_vacuna.value = $subida_vacunas.getAttribute("value");

        fadeIn($ficha_vacunas);
        return false;
    }
});


$cierre_form_ing.onclick = (e) => {
    e.preventDefault();

    fadeOut($ficha__vistaprevia);
}

$abrir_pestañas.onclick = (e) => {
    e.preventDefault();

    fadeIn($pestañas);
}

$cierre_pestañas.onclick = (e) => {
    e.preventDefault();
    
    $tab4.style.display='none';
    $tab3.style.display='none';
    $tab2.style.display='none';
    $tab1.style.display='none';
    $pest_sup_r4.style.display = 'none';
    $pest_sup_r2.style.display = 'none';
    $pest_sup_r3.style.display = 'none';
    $pest_sup_r1.style.display = 'none';
    $adjunto_pestaña_r4.style.display = 'none';
    $display_image_pest_r4.style.display = 'none';
    $adjunto_pestaña_r3.style.display = 'none';
    $display_image_pest_r3.style.display = 'none';
    $adjunto_pestaña_r2.style.display = 'none';
    $display_image_pest_r2.style.display = 'none';
    $adjunto_pestaña_r1.style.display = 'none';
    $display_image_pest_r1.style.display = 'none';

    fadeOut($pestañas);
}

$cierre_pestañas_rabia.onclick = (e) => {
    e.preventDefault();

    fadeOut($pestañas_rabia);
}

$cierre_form_vp_vac.onclick = (e) => {
    e.preventDefault();

    fadeOut($ficha__vistaprevia_vac);
}

$vista_previa_vac.forEach(function($vista_previa_vac){
    $vista_previa_vac.onclick = (e) => {
        e.preventDefault();

        mostrarImagen($vista_previa_vac.getAttribute("value"));
        
        return false;
    }
});

const $tab = document.querySelectorAll(".tab_s");

$tab.forEach(function($tab){
    $tab.onclick = (e) => {
        e.preventDefault();

        let $r =$tab.getAttribute("value").split(",")
        show($r[0],$r[1]);
    }
})

var selected="tab4_s";//crear uno parecido a show para rabia e.e
var disp="tab-content-r4_s";

function show(a,b){
    document.getElementById(selected).style.backgroundColor = "rgb(150,150,150)";
    document.getElementById(disp).style.display = "none";
    document.getElementById(a).style.backgroundColor = "rgb(48, 37, 123)";       
    document.getElementById(b).style.display = "block";
    selected=a;
    disp=b;
}

const $tab_r = document.querySelectorAll(".tab_r_s");//para la rabia 

$tab_r.forEach(function($tab_r){
    $tab_r.onclick = (e) => {
        e.preventDefault();

        let $r =$tab_r.getAttribute("value").split(",")
        showR($r[0],$r[1]);
    }
})

var selectedR="tab7_s";//crear uno parecido a show para rabia e.e
var dispR="tab-content-r7";

function showR(a,b)
{
    document.getElementById(selectedR).style.backgroundColor = "rgb(150,150,150)";
    document.getElementById(dispR).style.display = "none";
    document.getElementById(a).style.backgroundColor = "rgb(48, 37, 123)";       
    document.getElementById(b).style.display = "block";
    selectedR=a;
    dispR=b;
}

function mostrarImagen($value){
    try {     
        const data = new FormData();
        data.append('documento', $documento_trabajador.value);
        data.append('validacion',$value);//sino se define se pasa como un null y da error
        data.append('funcion','buscarImagen');
        fetch('../inc/consultasmedicas.inc.php',{
            method: "POST",
            body:data,
        })
        .then(response => response.json())
        .then(dataJson => {
            if (dataJson.respuesta){
                if(dataJson.adjunto){
                    if($value=="difteTet_R1" || $value=="Tifoidea_R1" || $value=="HepatitisA_R1" || $value=="Neumococo_R1"){
                       
                        if(dataJson.adjunto[0]==null){
                            $tab4.style.display='none';
                        }else{
                            $tab4.style.display='inline';
                            let adj1=dataJson.adjunto[0].split('.');
                            console.log(adj1[1]);
                            if(adj1[1]=="jpeg"){
                                document.getElementById("marco_r4_s").style.display = "block";
                                $display_image_pest_r4.src="../vacunas/"+dataJson.adjunto[0];//adjunto[0]
                                $adjunto_pestaña_r4.style.display = 'none';
                                $display_image_pest_r4.style.display = 'block';
                                $pest_sup_r4.style.display = 'block';
                            }else if(adj1[1]=="pdf"){
                                document.getElementById("marco_r4_s").style.display = "none";
                                $adjunto_pestaña_r4.style.display = 'block';
                                $display_image_pest_r4.style.display = 'none';
                                $pest_sup_r4.style.display = 'none';
                                $adjunto_pestaña_r4.setAttribute("src","../vacunas/"+dataJson.adjunto[0]);
                            }
                            $descarga.setAttribute("href","../vacunas/"+dataJson.adjunto[0]);
                        }

                        if(dataJson.adjunto[1]==null){
                            $tab3.style.display='none';
                        }else{
                            $tab3.style.display="inline";
                            let adj2=dataJson.adjunto[1].split('.');//si es null no lo abre U:
                            if(adj2[1]=="jpeg"){
                                document.getElementById("marco_r3_s").style.display = "block";
                                $display_image_pest_r3.src="../vacunas/"+dataJson.adjunto[1];//adjunto[0]
                                $adjunto_pestaña_r3.style.display = 'none';
                                $display_image_pest_r3.style.display = 'block';
                                $pest_sup_r3.style.display = 'block';
                            }else if(adj2[1]=="pdf"){
                                document.getElementById("marco_r3_s").style.display = "none";
                                $adjunto_pestaña_r3.style.display = 'block';
                                $display_image_pest_r3.style.display = 'none';     
                                $pest_sup_r3.style.display = 'none';                        
                                $adjunto_pestaña_r3.setAttribute("src","../vacunas/"+dataJson.adjunto[1]);
                            }
                            (document.getElementById("descarga_2_s")).setAttribute("href","../vacunas/"+dataJson.adjunto[1]);
                        }

                        if(dataJson.adjunto[2]==null){
                            $tab2.style.display='none';
                        }else{
                            $tab2.style.display='inline';
                            let adj3=dataJson.adjunto[2].split('.');
                            if(adj3[1]=="jpeg"){
                                document.getElementById("marco_r2_s").style.display = "block";
                                $display_image_pest_r2.src="../vacunas/"+dataJson.adjunto[2];//adjunto[0]
                                $adjunto_pestaña_r2.style.display = 'none';
                                $display_image_pest_r2.style.display = 'block';
                                $pest_sup_r2.style.display = 'block';                        
                            }
                            else if(adj3[1]=="pdf"){
                                document.getElementById("marco_r2_s").style.display = "none";
                                $adjunto_pestaña_r2.style.display = 'block';
                                $display_image_pest_r2.style.display = 'none';  
                                $pest_sup_r2.style.display = 'none';
                                $adjunto_pestaña_r2.setAttribute("src","../vacunas/"+dataJson.adjunto[2]);
                            }
                            (document.getElementById("descarga_3_s")).setAttribute("href","../vacunas/"+dataJson.adjunto[2]);
                            console.log(dataJson.adjunto[2]);
                        }
                        
                        if(dataJson.adjunto[3]==null){
                            $tab1.style.display='none';
                        }else{
                            $tab1.style.display='inline';
                            let adj4=dataJson.adjunto[3].split('.');
                            if(adj4[1]=="jpeg"){
                                document.getElementById("marco_r1_s").style.display = "block";
                                $adjunto_pestaña_r1.style.display = 'none';
                                $display_image_pest_r1.style.display = 'block';
                                $pest_sup_r1.style.display = 'block';                        
                                $display_image_pest_r1.src="../vacunas/"+dataJson.adjunto[3];//empieza en el ultima --- complicado U:
                            }
                            else if(adj4[1]=="pdf"){
                                document.getElementById("marco_r1_s").style.display = "none";
                                $adjunto_pestaña_r1.style.display = 'block';
                                $display_image_pest_r1.style.display = 'none';   
                                $pest_sup_r1.style.display = 'none';                                               
                                $adjunto_pestaña_r1.setAttribute("src","../vacunas/"+dataJson.adjunto[3]);
                            }
                            (document.getElementById("descarga_1_s")).setAttribute("href","../vacunas/"+dataJson.adjunto[3]);
                        }
                    
                        fadeIn($pestañas);
                        
                    }else if($value=="Rabia_R1"){
                        if(dataJson.adjunto[0]==null){
                            document.getElementById("tab7_s").style.display="none";
                            $pest_sup_rab_r7.style.display = 'none';
                        }else{
                            document.getElementById("tab7_s").style.display="inline";
                            let adj7 = dataJson.adjunto[0].split('.');
                            if(adj7[1]=="jpeg"){
                                document.getElementById("marco_rabia_r7_s").style.display = "block";
                                $display_image_pest_rabia_r7.style.display = "block";
                                $adjunto_pestaña_rabia_r7.style.display = "none";
                                $pest_sup_rab_r7.style.display = 'block';
                                $display_image_pest_rabia_r7.src="../vacunas/"+dataJson.adjunto[0];
                            }
                            else if(adj7[1]=="pdf"){
                                document.getElementById("marco_rabia_r7_s").style.display = "none";
                                $display_image_pest_rabia_r7.style.display = "none";
                                $adjunto_pestaña_rabia_r7.style.display = "block";
                                $pest_sup_rab_r7.style.display = 'none';
                                $adjunto_pestaña_rabia_r7.setAttribute("src","../vacunas/"+dataJson.adjunto[0]);
                            }
                            (document.getElementById("descarga_rab_7_s")).setAttribute("href","../vacunas/"+dataJson.adjunto[0]);
                        }
                        if(dataJson.adjunto[1]==null){
                            document.getElementById("tab6_s").style.display="none";
                        }else{
                            document.getElementById("tab6_s").style.display="inline";
                            let adj6 = dataJson.adjunto[1].split('.');
                            if(adj6[1]=="jpeg"){
                                document.getElementById("marco_rabia_r6_s").style.display = "block";
                                $display_image_pest_rabia_r6.style.display = "block";
                                $adjunto_pestaña_rabia_r6.style.display = "none";
                                $pest_sup_rab_r6.style.display = 'block';
                                $display_image_pest_rabia_r6.src="../vacunas/"+dataJson.adjunto[1];
                            }else if(adj6[1]=="pdf"){
                                document.getElementById("marco_rabia_r6_s").style.display = "none";
                                $display_image_pest_rabia_r6.style.display = "none";
                                $adjunto_pestaña_rabia_r6.style.display = "block";
                                $pest_sup_rab_r6.style.display = 'none';
                                $adjunto_pestaña_rabia_r6.setAttribute("src","../vacunas/"+dataJson.adjunto[1]);
                            }
                            (document.getElementById("descarga_rab_6_s")).setAttribute("href","../vacunas/"+dataJson.adjunto[1]);
                        }
                        if(dataJson.adjunto[2]==null){
                            document.getElementById("tab5_s").style.display="none";
                        }else{
                            document.getElementById("tab5_s").style.display="inline";
                            let adj5 = dataJson.adjunto[2].split('.');
                            if(adj5[1]=="jpeg"){
                                document.getElementById("marco_rabia_r5_s").style.display = "block";
                                $display_image_pest_rabia_r5.style.display = "block";
                                $adjunto_pestaña_rabia_r5.style.display = "none";
                                $pest_sup_rab_r5.style.display = 'block';
                                $display_image_pest_rabia_r5.src="../vacunas/"+dataJson.adjunto[2];
                            }else if(adj5[1]=="pdf"){
                                document.getElementById("marco_rabia_r5_s").style.display = "none";
                                $display_image_pest_rabia_r5.style.display = "none";
                                $adjunto_pestaña_rabia_r5.style.display = "block";
                                $pest_sup_rab_r5.style.display = 'none';
                                $adjunto_pestaña_rabia_r5.setAttribute("src","../vacunas/"+dataJson.adjunto[2]);
                            }
                            (document.getElementById("descarga_rab_5_s")).setAttribute("href","../vacunas/"+dataJson.adjunto[2]);
                        }

                        if(dataJson.adjunto[3]==null){
                            document.getElementById("tab4_r_s").style.display='none';
                        }else{
                            let adj4 = dataJson.adjunto[3].split('.');
                            if(adj4[1]=="jpeg"){
                                document.getElementById("marco_rabia_r4_s").style.display = "block";
                                $display_image_pest_rabia_r4.style.display = "block";
                                $adjunto_pestaña_rabia_r4.style.display = "none";
                                $pest_sup_rab_r4.style.display = 'block';
                                $display_image_pest_rabia_r4.src="../vacunas/"+dataJson.adjunto[3];
                            }else if(adj4[1]=="pdf"){
                                document.getElementById("marco_rabia_r4_s").style.display = "none";
                                $display_image_pest_rabia_r4.style.display = "none";
                                $adjunto_pestaña_rabia_r4.style.display = "block";
                                $pest_sup_rab_r4.style.display = 'none';
                                $adjunto_pestaña_rabia_r4.setAttribute("src","../vacunas/"+dataJson.adjunto[3]);

                            }
                            (document.getElementById("descarga_rab_4_s")).setAttribute("href","../vacunas/"+dataJson.adjunto[3]);
                        }

                        if(dataJson.adjunto[4]==null){
                            document.getElementById("tab3_r").hidden=true;
                        }else{
                            let adj3 = dataJson.adjunto[4].split('.');
                            if(adj3[1]=="jpeg"){
                                document.getElementById("marco_rabia_r3_s").style.display = "block";
                                $display_image_pest_rabia_r3.style.display = "block";
                                $adjunto_pestaña_rabia_r3.style.display = "none";
                                $pest_sup_rab_r3.style.display = 'block';
                                $display_image_pest_rabia_r3.src="../vacunas/"+dataJson.adjunto[4];
                            }else if(adj3[1]=="pdf"){
                                document.getElementById("marco_rabia_r3_s").style.display = "none";
                                $display_image_pest_rabia_r3.style.display = "none";
                                $adjunto_pestaña_rabia_r3.style.display = "block";
                                $pest_sup_rab_r3.style.display = 'none';
                                $adjunto_pestaña_rabia_r3.setAttribute("src","../vacunas/"+dataJson.adjunto[4]);
                            }
                            (document.getElementById("descarga_rab_3_s")).setAttribute("href","../vacunas/"+dataJson.adjunto[4]);
                        }

                        if(dataJson.adjunto[5]==null){//aqui es 5
                            document.getElementById("tab2_r_s").style.display="none";
                        }else{
                            document.getElementById("tab2_r_s").style.display="inline";
                            let adj2 = dataJson.adjunto[5].split('.');
                            if(adj2[1]=="jpeg"){
                                document.getElementById("marco_rabia_r2_s").style.display = "block";
                                $display_image_pest_rabia_r2.style.display = "block";
                                $adjunto_pestaña_rabia_r2.style.display = "none";
                                $pest_sup_rab_r2.style.display = 'block';
                                $display_image_pest_rabia_r2.src="../vacunas/"+dataJson.adjunto[5];
                            }
                            else if(adj2[1]=="pdf"){
                                document.getElementById("marco_rabia_r2_s").style.display = "none";
                                $display_image_pest_rabia_r2.style.display = "none";
                                $adjunto_pestaña_rabia_r2.style.display = "block";
                                $pest_sup_rab_r2.style.display = 'none';
                                $adjunto_pestaña_rabia_r2.setAttribute("src","../vacunas/"+dataJson.adjunto[5]);
                            }
                            (document.getElementById("descarga_rab_2_s")).setAttribute("href","../vacunas/"+dataJson.adjunto[5]);
                        }

                        if(dataJson.adjunto[6]==null){
                            document.getElementById("tab1_r_s").style.display="none";
                        }else{
                            document.getElementById("tab1_r_s").style.display="inline";
                            let adj1 = dataJson.adjunto[6].split('.');
                            if(adj1[1]=="jpeg"){
                                document.getElementById("marco_rabia_r1_s").style.display = "block";
                                $display_image_pest_rabia.style.display = "block";
                                $adjunto_pestaña_rabia_r1.style.display = "none";
                                $pest_sup_rab_r1.style.display = 'block';
                                $display_image_pest_rabia.src="../vacunas/"+dataJson.adjunto[6];
                            }else if(adj1[1]=="pdf"){
                                document.getElementById("marco_rabia_r1_s").style.display = "none";
                                $display_image_pest_rabia.style.display = "none" ;
                                $adjunto_pestaña_rabia_r1.style.display = "block";
                                $pest_sup_rab_r1.style.display = 'none';
                                $adjunto_pestaña_rabia_r1.setAttribute("src","../vacunas/"+dataJson.adjunto[6]);
                            }
                            (document.getElementById("descarga_rab_1_s")).setAttribute("href","../vacunas/"+dataJson.adjunto[6]);
                        }
                        
                        fadeIn($pestañas_rabia); 
                          
                    }else{
                        let formatos = (dataJson.adjunto).split('.');
                        if(formatos[1]=="pdf"){
                            document.getElementById("marco_s").style.display = "none";
                            (document.getElementById("pest_sup_vac_s")).style.display = "none"
                            $frame__adjunto.setAttribute("src",'../vacunas/'+dataJson.adjunto);
                            fadeIn($ficha__vistaprevia);
                        }else if(formatos[1]=="jpeg"){
                            document.getElementById("marco_s").style.display = "block";
                            $display_image.src = "../vacunas/"+dataJson.adjunto;
                            (document.getElementById("pest_sup_vac_s")).style.display = "block"
                            console.log(dataJson.adjunto);    
                            fadeIn($ficha__vistaprevia_vac);
                            (document.getElementById("descarga_vac_s")).setAttribute("href","../vacunas/"+dataJson.adjunto);
                        }
                        else{
                            mostrarMensaje("Existe un problema","msj_error");
                        }
                    }
                }else{
                    mostrarMensaje("No existe un documento","msj_error");
                }
               
                //q valide un switch case con $value y luego en la funcion ver si el siguiente adjunto existe
                //sino darle estilo, cursiva para la fecha--- ver si aplica algo mas
            }else{
                mostrarMensaje("No hay imagen","msj_error");
            }
        })  
        .catch(error => {
            console.error(error);
        })
    } catch (error) {
        mostrarMensaje(error,"msj_error");  
    }
}
 
$cierre_form_vac.onclick = (e) => {//cierra el formulario para enviar correos
    e.preventDefault();

    fadeOut($ficha_vacunas);
    limpiar()
}

function limpiar(){
    $fecha_vacuna.value = "";
    $subida_imagen.value = "";
}
/** 
 * Mediante el getAttribute se obtiene un valor diferenciador para el boton que planeamos usar en el envio, 
 * esto nos permite poder usar la funcion generica que abre el modal para todos pero a la vez los hace unicos,
 * este valor se envia a la funcion para que al momento de enviar los datos al php decidida donde va exactamente
 * **/

$envio_vacuna.onclick = (e) => {
    e.preventDefault();

    var fecha1 = $fecha_vacuna.value;
    var documento = $documento_trabajador.value;
    var tipovacuna = $nombre_vacuna.value;

    if($subida_imagen.files && $subida_imagen.files[0])
        console.log("archivo seleccionado:",$subida_imagen.files[0]);

    try {
            //ver a donde se sube U:, dni o algo asi
            //ver la validacion(1 o 0) para la subida de documentos
        fadeOut($ficha_vacunas);
        
        if($subida_imagen.files.length==0 || fecha1==""){
            mostrarMensaje("Error en el formato del documento","msj_error")
            limpiar();
        } //si el formato del archivo esta en mayusculas da error

            const formData = new FormData();
            let data = new FormData();
            data.append("documento",$documento_trabajador.value);
            data.append("funcion","datosVacunacion");
            fetch('../inc/consultasmedicas.inc.php',{
                method: "POST",
                body:data,
            })
            .then(function(response){
                return response.json();
            })
            .then(dataJson => {
                if (dataJson.respuesta){

                    switch(tipovacuna){
                        case "difteTet_R2":
                            if(dataJson.adjuntoDifTR2==null){
                               tipovacuna="difteTet_R2";
                            }else if(dataJson.adjuntoDifTR3==null){
                                tipovacuna="difteTet_R3";
                            }else if(dataJson.adjuntoDifTR4==null){
                                tipovacuna="difteTet_R4";
                            }else{
                                tipovacuna="difteTet_R2";
                            }
                            break;
                        case "HepatitisA_R2":
                            if(dataJson.adjuntoHepAR2==null){
                                tipovacuna="difteTet_R2";
                             }else if(dataJson.adjuntoHepAR3==null){
                                tipovacuna="HepatitisA_R3";
                            }else if(dataJson.adjuntoHepAR4==null){
                                tipovacuna="HepatitisA_R4";
                            }else{
                                tipovacuna="HepatitisA_R2";
                            }
                            break;
                        case "Tifoidea_R2":
                            if(dataJson.adjuntoTifoR2==null){
                                tipovacuna="Tifoidea_R2";
                            }else if(dataJson.adjuntoTifoR3==null){
                                tipovacuna="Tifoidea_R3";
                            }else if(dataJson.adjuntoTifoR4==null){
                                tipovacuna="Tifoidea_R4";
                            }else{
                                tipovacuna="Tifoidea_R2";
                            }                            
                            break;
                        case "Neumococo_R2":
                            if(dataJson.adjuntoNeumR2==null){
                                tipovacuna="Neumococo_R2";
                            }else if(dataJson.adjuntoNeumR3==null){
                                tipovacuna="Neumococo_R3";
                            }else if(dataJson.adjuntoNeumR4==null){
                                tipovacuna="Neumococo_R4";
                            }else{
                                tipovacuna="Neumococo_R2";
                            }                                  
                            break;
                        case "Rabia_R2":
                            if(dataJson.adjuntoRabR2==null){
                                tipovacuna="Rabia_R2";
                            }else if(dataJson.adjuntoRabR3==null){
                                tipovacuna="Rabia_R3";
                            }else if(dataJson.adjuntoRabR4==null){
                                tipovacuna="Rabia_R4";
                            }else if(dataJson.adjuntoRabR5==null){
                                tipovacuna="Rabia_R5";
                            }else if(dataJson.adjuntoRabR6==null){
                                tipovacuna="Rabia_R6";
                            }else if(dataJson.adjuntoRabR7==null){
                                tipovacuna="Rabia_R7";
                            }else{
                                tipovacuna="Rabia_R2";
                            }                             
                            break;
                        case "fiebre amarilla":
                                tipovacuna="fiebre amarilla";
                            break;
                    }    
                    formData.append('fechaVacunacion',fecha1);
                    formData.append('subidaImagen',$subida_imagen.files[0]);//es el envio del documento
                    formData.append('documento',documento);
                    formData.append('nombre',$nombre_trabajador.value);
                    formData.append('validacion',tipovacuna);    

                    fetch("../inc/subirImagen.inc.php",{
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.respuesta) {
                            console.log(tipovacuna);
                            listarVacunas();
                            mostrarMensaje("Documento subido","msj_correct");
                           // validacion();//ver aqui luego
                            limpiar();
                        }else{
                            mostrarMensaje("Hubo un error al subir el archivo","msj_error");
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    })

                }
            })  
      //  }
    } catch (error) {
        mostrarMensaje(error,"msj_error");  
    }
}

export function listarVacunas(){
    
    let formData = new FormData();
    formData.append("documento",$documento_trabajador.value);
    formData.append("funcion","crearDatosVac");
    fetch('../inc/consultasmedicas.inc.php',{
        method: "POST",
        body:formData,
    });
    let data = new FormData();
    data.append("documento",$documento_trabajador.value);
    data.append("funcion","datosVacunacion");
    fetch('../inc/consultasmedicas.inc.php',{
        method: "POST",
        body:data,
    })
    .then(function(response){
        return response.json();
    })
    .then(dataJson => {
        if (dataJson.respuesta){

          $fiebre_amarilla__d1.value = dataJson.fecha;

          if($fiebre_amarilla__d1.value!==""){
            $validacion_Fiebre_Amar.value = "INMUNIZADO"
          }else{
            $validacion_Fiebre_Amar.value = "SIN INMUNIZAR";
          }

          $difteria__d1.value = dataJson.fechaDTD1;
          $difteria__d2.value = dataJson.fechaDTD2;
          $difteria__d3.value = dataJson.fechaDTD3;
          $difteria__r1.value =  dataJson.fechaDTR1;
          $difteria__r2.value =  dataJson.fechaDTR2;

          $hepatitis_A__d1.value =  dataJson.fechaHAD1;
          $hepatitis_A__d2.value =  dataJson.fechaHAD2;
          $hepatitis_A__r1.value =  dataJson.fechaHAR1;
          $hepatitis_A__r2.value =  dataJson.fechaHAR2;

          $hepatitis_B__d1.value =  dataJson.fechaHBD1;
          $hepatitis_B__d2.value =  dataJson.fechaHBD2;
          $hepatitis_B__d3.value = dataJson.fechaHBD3;

          $influenza__r1.value =  dataJson.fechaIFR1;
          $influenza__r2.value =  dataJson.fechaIFR2;

          $poliomelitis__d1.value =  dataJson.fechaPLD1;
          $trivirica__d1.value =  dataJson.fechaTVD1;
          
          if($poliomelitis__d1.value!==""){
            $poliomelitis__r1.value = "INMUNIZADO";
          }else{
            $poliomelitis__r1.value = "SIN INMUNIZAR";
          }

          if($trivirica__d1.value!==""){
            $trivirica__r1.value = "INMUNIZADO";
          }else{
            $trivirica__r1.value = "SIN INMUNIZAR";
          }

            if(dataJson.adjuntoFbrAmarilla!=null){
                document.getElementById("icono_fbra_s").style.color="green";
            }else{
                document.getElementById("icono_fbra_s").style.color="";
            }
            if(dataJson.adjuntoDifTD1!=null){
                document.getElementById("icono_dt_d1_s").style.color="green";
            }else{
                document.getElementById("icono_dt_d1_s").style.color="";
            }

            if(dataJson.adjuntoDifTD2!=null){
                document.getElementById("icono_dt_d2_s").style.color="green";
                $difteria__d2.style.fontStyle="";
                $difteria__d2.style.color="";
                $difteria__d2.style.fontWeight = "";
            }else if(dataJson.adjuntoDifTD2==null && $difteria__d2.value!=""){
                document.getElementById("icono_dt_d2_s").style.color="";
                $difteria__d2.style.fontStyle="italic";
                $difteria__d2.style.color="red";
                $difteria__d2.style.fontWeight = "bold";
            }else{
                document.getElementById("icono_dt_d2_s").style.color="";
                $difteria__d2.style.fontStyle="";
                $difteria__d2.style.fontWeight = "";
                $difteria__d2.style.color="";
            }
            
            if(dataJson.adjuntoDifTD3!=null){
                document.getElementById("icono_dt_d3_s").style.color="green";
                $difteria__d3.style.fontStyle="";
                $difteria__d3.style.color="";
                $difteria__d3.style.fontWeight = "";
            }else if(dataJson.adjuntoDifTD3==null && $difteria__d3.value!=""){
                document.getElementById("icono_dt_d3_s").style.color="";
                $difteria__d3.style.fontStyle="italic";
                $difteria__d3.style.color="red";
                $difteria__d3.style.fontWeight = "bold";
            }else{
                document.getElementById("icono_dt_d3_s").style.color="";
                $difteria__d3.style.fontStyle="";
                $difteria__d3.style.color="";
                $difteria__d3.style.fontWeight = "";
            }

            if(dataJson.adjuntoDifTR1!=null){
                document.getElementById("icono_dt_r1_s").style.color="green";
                $difteria__r1.style.fontStyle="";
                $difteria__r1.style.color="";
                $difteria__r1.style.fontWeight = "";
                $difteria__r2.style.color = "red";
            }else if(dataJson.adjuntoDifTR1==null && $difteria__r1.value!=""){
                document.getElementById("icono_dt_r1_s").style.color="";
                $difteria__r1.style.fontStyle="italic";
                $difteria__r1.style.color="red";
                $difteria__r1.style.fontWeight = "bold";
                $difteria__r2.style.color = "";
            }else{
                document.getElementById("icono_dt_r1_s").style.color="";
                $difteria__r1.style.fontStyle="";
                $difteria__r1.style.color="";
                $difteria__r1.style.fontWeight = "";
                $difteria__r2.style.color = "";
            }
            
            if(dataJson.adjuntoHepAD1!=null){
                document.getElementById("icono_ha_d1_s").style.color="green";
            }else{
                document.getElementById("icono_ha_d1_s").style.color="";

            }

            if(dataJson.adjuntoHepAD2!=null && $hepatitis_A__d2.value!=""){
                document.getElementById("icono_ha_d2_s").style.color="green";
                $hepatitis_A__d2.style.fontStyle="";
                $hepatitis_A__d2.style.color="";
                $hepatitis_A__d2.style.fontWeight = "";
            }else if(dataJson.adjuntoHepAD2==null && $hepatitis_A__d2.value!=""){
                document.getElementById("icono_ha_d2_s").style.color="";
                $hepatitis_A__d2.style.fontStyle="italic";
                $hepatitis_A__d2.style.color="red";
                $hepatitis_A__d2.style.fontWeight = "bold";
            }
            else{
                document.getElementById("icono_ha_d2_s").style.color="";
                $hepatitis_A__d2.style.fontStyle="";
                $hepatitis_A__d2.style.fontWeight = "";
                $hepatitis_A__d2.style.color="";
            }

            if(dataJson.adjuntoHepAR1!=null && $hepatitis_A__r1.value!=""){
                document.getElementById("icono_ha_r1_s").style.color="green";
                $hepatitis_A__r1.style.fontStyle="";
                $hepatitis_A__r1.style.fontWeight = "";
                $hepatitis_A__r1.style.color="";
                $hepatitis_A__r2.style.color = "red";
            }
            else if(dataJson.adjuntoHepAR1==null && $hepatitis_A__r1.value!=""){
                document.getElementById("icono_ha_r1_s").style.color="";
                $hepatitis_A__r1.style.fontStyle="italic";
                $hepatitis_A__r1.style.fontWeight = "bold";
                $hepatitis_A__r1.style.color="red";
                $hepatitis_A__r2.style.color = "";
            }else{
                document.getElementById("icono_ha_r1_s").style.color="";
                $hepatitis_A__r1.style.fontStyle="";
                $hepatitis_A__r1.style.fontWeight = "";
                $hepatitis_A__r1.style.color="";
                $hepatitis_A__r2.style.color = "";
            }

            if(dataJson.adjuntoHepBD1!=null){
                document.getElementById("icono_hb_d1_s").style.color="green";
            }else{
                document.getElementById("icono_hb_d1_s").style.color="";
            }

            if(dataJson.adjuntoHepBD2!=null && $hepatitis_B__d2.value!=""){
                document.getElementById("icono_hb_d2_s").style.color="green";
                $hepatitis_B__d2.style.fontStyle="";
                $hepatitis_B__d2.style.fontWeight = "";
                $hepatitis_B__d2.style.color="";

            }else if(dataJson.adjuntoHepBD2==null && $hepatitis_B__d2.value!=""){
                document.getElementById("icono_hb_d2_s").style.color="";
                $hepatitis_B__d2.style.fontStyle="italic";
                $hepatitis_B__d2.style.fontWeight = "bold";
                $hepatitis_B__d2.style.color="red";
            }else{
                document.getElementById("icono_hb_d2_s").style.color="";
                $hepatitis_B__d2.style.fontStyle="";
                $hepatitis_B__d2.style.fontWeight = "";
                $hepatitis_B__d2.style.color="";
            }
            
            if(dataJson.adjuntoHepBD3!=null && $hepatitis_B__d3.value!=""){
                document.getElementById("icono_hb_d3_s").style.color="green";
                $hepatitis_B__d3.style.fontStyle="";
                $hepatitis_B__d3.style.fontWeight = "";
                $hepatitis_B__d3.style.color="";
            }else if(dataJson.adjuntoHepBD3==null && $hepatitis_B__d3.value!=""){
                document.getElementById("icono_hb_d3_s").style.color="";
                $hepatitis_B__d3.style.fontStyle="italic";
                $hepatitis_B__d3.style.fontWeight = "bold";
                $hepatitis_B__d3.style.color="red";
            }else{
                document.getElementById("icono_hb_d3_s").style.color="";
                $hepatitis_B__d3.style.fontStyle="";
                $hepatitis_B__d3.style.fontWeight = "";
                $hepatitis_B__d3.style.color="";
            }

            if(dataJson.adjuntoInflR1!=null){
                document.getElementById("icono_if_r1_s").style.color="green";
                $influenza__r2.style.color = "red";
            }else{
                document.getElementById("icono_if_r1_s").style.color="";
                $influenza__r2.style.color = "";
            }

            if(dataJson.adjuntoPolioD1!=null){
                document.getElementById("icono_pl_r1_s").style.color="green";
            }else{
                document.getElementById("icono_pl_r1_s").style.color="";
            }

            if(dataJson.adjuntoTrivD1!=null){
                document.getElementById("icono_tv_r1_s").style.color="green";
            }else{
                document.getElementById("icono_tv_r1_s").style.color="";
            }
           
            if(dataJson.adjuntoTifoR1!=null){
                document.getElementById("icono_tf_r1_s").style.color="green";
                $tifoidea__r2.style.color = "red";
            }else{
                document.getElementById("icono_tf_r1_s").style.color="";
                $tifoidea__r2.style.color = "";
            }
            
            if(dataJson.adjuntoNeumR1!=null){
                document.getElementById("icono_nm_r1_s").style.color="green";
                $neumococo__r2.style.color = "red";
            }else{
                document.getElementById("icono_nm_r1_s").style.color="";
                $neumococo__r2.style.color = "";
            }

          $rabia__d1.value =  dataJson.fechaRBD1;
          $rabia__d2.value =  dataJson.fechaRBD2;
          $rabia__d3.value =  dataJson.fechaRBD3;
          $rabia__r1.value =  dataJson.fechaRBR1;
          $rabia__r2.value =  dataJson.fechaRBR2;

        if(dataJson.adjuntoRabD1!=null){
            document.getElementById("icono_rb_d1_s").style.color="green";
        }else{
            document.getElementById("icono_rb_d1_s").style.color="";
        }
        
        if(dataJson.adjuntoRabD2!=null && $rabia__d2.value!=""){
            document.getElementById("icono_rb_d2_s").style.color="green";
            $rabia__d2.style.fontStyle="";
            $rabia__d2.style.fontWeight = "";
            $rabia__d2.style.color="";
        }
        else if(dataJson.adjuntoRabD2==null && $rabia__d2.value!=""){
            document.getElementById("icono_rb_d2_s").style.color="";
            $rabia__d2.style.fontStyle="italic";
            $rabia__d2.style.fontWeight = "bold";
            $rabia__d2.style.color="red";
        }else{
            document.getElementById("icono_rb_d2_s").style.color="";
            $rabia__d2.style.fontStyle="";
            $rabia__d2.style.fontWeight = "";
            $rabia__d2.style.color="";
        }

        if(dataJson.adjuntoRabD3!=null && $rabia__d3.value!=""){
            document.getElementById("icono_rb_d3_s").style.color="green";
            $rabia__d3.style.fontStyle="";
            $rabia__d3.style.fontWeight = "";
            $rabia__d3.style.color="";
        }else if(dataJson.adjuntoRabD3==null && $rabia__d3.value!=""){
            document.getElementById("icono_rb_d3_s").style.color="";
            $rabia__d3.style.fontStyle="italic";
            $rabia__d3.style.fontWeight = "bold";
            $rabia__d3.style.color="red";
        }else{
            document.getElementById("icono_rb_d3_s").style.color="";
            $rabia__d3.style.fontStyle="";
            $rabia__d3.style.fontWeight = "";
            $rabia__d3.style.color="";
        }
        
        if(dataJson.adjuntoRabR1!=null  && $rabia__r1.value!=""){
            document.getElementById("icono_rb_r1_s").style.color="green"; 
            $rabia__r1.style.fontStyle="";
            $rabia__r1.style.fontWeight = "";
            $rabia__r1.style.color="";
            $rabia__r2.style.color = "red";
        }else if(dataJson.adjuntoRabR1==null && $rabia__r1.value!=""){
            document.getElementById("icono_rb_r1_s").style.color="";
            $rabia__r1.style.fontStyle="italic";
            $rabia__r1.style.fontWeight = "bold";
            $rabia__r1.style.color="red";
            $rabia__r2.style.color = "";
        }else{
            document.getElementById("icono_rb_r1_s").style.color="";
            $rabia__r1.style.fontStyle="";
            $rabia__r1.style.fontWeight = "";
            $rabia__r1.style.color="";
            $rabia__r2.style.color = "";
        }

          $tifoidea__r1.value =  dataJson.fechaTFR1;
          $tifoidea__r2.value =  dataJson.fechaTFR2;

          $neumococo__r1.value =  dataJson.fechaNMR1;
          $neumococo__r2.value =  dataJson.fechaNMR2;

          $covid__d1.value =  dataJson.fechaCVD1;
          $covid__d2.value =  dataJson.fechaCVD2;
          $covid__d3.value =  dataJson.fechaCVD3;
          $covid__d4.value =  dataJson.fechaCVD4;
        
        if(dataJson.adjuntoCovidD1!=null){
            document.getElementById("icono_cv_d1_s").style.color="green";
        }else{
            document.getElementById("icono_cv_d1_s").style.color="";
        }

        if(dataJson.adjuntoCovidD2!=null && $covid__d2.value!=""){
            document.getElementById("icono_cv_d2_s").style.color="green"; 
            $covid__d2.style.fontStyle="";
            $covid__d2.style.fontWeight = "";
            $covid__d2.style.color="";
        }
        else if(dataJson.adjuntoCovidD2==null && $covid__d2.value!=""){
            document.getElementById("icono_cv_d2_s").style.color="";
            $covid__d2.style.fontStyle="italic";
            $covid__d2.style.fontWeight = "bold";
            $covid__d2.style.color="red";
        }else{
            document.getElementById("icono_cv_d2_s").style.color="";
            $covid__d2.style.fontStyle="";
            $covid__d2.style.fontWeight = "";
            $covid__d2.style.color="";
        }
        if(dataJson.adjuntoCovidD3!=null && $covid__d3.value!=""){
            document.getElementById("icono_cv_d3_s").style.color="green";
            $covid__d3.style.fontStyle="";
            $covid__d3.style.fontWeight = "";
            $covid__d3.style.color="";
        }else if(dataJson.adjuntoCovidD3==null && $covid__d3.value!=""){
            document.getElementById("icono_cv_d3_s").style.color="";
            $covid__d3.style.fontStyle="italic";
            $covid__d3.style.fontWeight = "bold";
            $covid__d3.style.color="red";
        }else{
            document.getElementById("icono_cv_d3_s").style.color="";
            $covid__d3.style.fontStyle="";
            $covid__d3.style.fontWeight = "";
            $covid__d3.style.color="";
        } 
        if(dataJson.adjuntoCovidD4!=null && $covid__d4.value!=""){
            document.getElementById("icono_cv_d4_s").style.color="green";
            $covid__d4.style.fontStyle="";
            $covid__d4.style.fontWeight = "";
            $covid__d4.style.color="";
        }else if(dataJson.adjuntoCovidD4==null && $covid__d4.value!=""){
            document.getElementById("icono_cv_d4_s").style.color="";
            $covid__d4.style.fontStyle="italic";
            $covid__d4.style.fontWeight = "bold";
            $covid__d4.style.color="red";
        }else{
            document.getElementById("icono_cv_d4_s").style.color="";
            $covid__d4.style.fontStyle="";
            $covid__d4.style.fontWeight = "";
            $covid__d4.style.color="";
        }

        if($hepatitis_B__d3.value!="" && $hepatitis_B__d3.style.fontStyle!="italic"){
            $hepatitis_B__r1.value = "INMUNIZADO";
        }else{
            $hepatitis_B__r1.value = "SIN INMUNIZAR";
        }

        $validarInmunidad_s.forEach(function($validarInmunidad_s){
            if($validarInmunidad_s.value=="INMUNIZADO"){
                $validarInmunidad_s.style.color = "green";
            }
            else{
                $validarInmunidad_s.style.color = "red";
            }
        });

        }else{
            mostrarMensaje("Verifique el N°. Documento","msj_error");
        }
    })
}

$alejar.forEach(function($alejar){
    $alejar.onclick = (e) => {
        e.preventDefault();

        zoomOut($alejar.getAttribute("value"));
    }});

$acercar.forEach(function($acercar){
    $acercar.onclick = (e) => {
        e.preventDefault();

        zoomIn($acercar.getAttribute("value"));
    }});

function zoomIn($val){
    let imgZ;
    switch ($val) {
        case "r1":
            imgZ = $display_image_pest_r1;
            break;
        case "r2":
            imgZ = $display_image_pest_r2;
            break;
        case "r3":
            imgZ = $display_image_pest_r3;
            break;
        case "r4":
            imgZ = $display_image_pest_r4;
            break;
        case "r1_rab":
            imgZ = $display_image_pest_rabia;
            break;
        case "r2_rab":
            imgZ = $display_image_pest_rabia_r2;
            break;
        case "r3_rab":
            imgZ = $display_image_pest_rabia_r3;
            break;
        case "r4_rab":
            imgZ = $display_image_pest_rabia_r4;
            break;
        case "r5_rab":
            imgZ = $display_image_pest_rabia_r5;
            break;
        case "r6_rab":
            imgZ = $display_image_pest_rabia_r6;
            break;
        case "r7_rab":
            imgZ = $display_image_pest_rabia_r7;
            break;
        case "vac":
            imgZ = $display_image;
            break;
    }
    let width = imgZ.clientWidth;
    imgZ.style.width = width + 100 + "px";
    return true;
 }

 function zoomOut($val){
    let imgZ;
    switch ($val) {
        case "r1":
            imgZ = $display_image_pest_r1;
            break;
        case "r2":
            imgZ = $display_image_pest_r2;
            break;
        case "r3":
            imgZ = $display_image_pest_r3;
            break;
        case "r4":
            imgZ = $display_image_pest_r4;
            break; 
        case "r1_rab":
            imgZ = $display_image_pest_rabia;
            break;
        case "r2_rab":
            imgZ = $display_image_pest_rabia_r2;
            break;
        case "r3_rab":
            imgZ = $display_image_pest_rabia_r3;
            break;
        case "r4_rab":
            imgZ = $display_image_pest_rabia_r4;
            break;
        case "r5_rab":
            imgZ = $display_image_pest_rabia_r5;
            break;
        case "r6_rab":
            imgZ = $display_image_pest_rabia_r6;
            break;
        case "r7_rab":
            imgZ = $display_image_pest_rabia_r7;
            break;
        case "vac":
            imgZ = $display_image;
            break;
    }
     let width = imgZ.clientWidth;
     imgZ.style.width = width - 100 + "px";
     return true;
 }