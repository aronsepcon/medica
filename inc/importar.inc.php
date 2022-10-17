<?php
     require_once("connectmedica.inc.php");
     require_once("../PHPExcel/PHPExcel.php");
 
     $mensaje = "No se completo la operacion";
     $respuesta = false;
 
     $archivo = $_FILES['fileUpload'];
 
     $temporal	 = $_FILES['fileUpload']['tmp_name'];
     $fileId      = uniqid().".xlsx";
 
     if (move_uploaded_file($temporal,"../xls/".$fileId)) {
         $mensaje = "Archivo copiado";
         $respuesta = true;
     }
 
     $salida = array("mensaje"   =>$mensaje,
                     "respuesta" =>$respuesta,
                     "contador"  =>returnTable($pdo,"../xls/".$fileId));
 
 
     echo json_encode($salida);
 
 
     function returnTable($pdo,$archivo){
 
         $objPHPExcel = PHPExcel_IOFactory::load($archivo);
         $objHoja=$objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
         $contador = 0;
 
         foreach ($objHoja as $iIndice=>$objCelda) {
             if ($objCelda['B'] !== "ATENCION"){
                 $sql = "INSERT INTO fichas_medicas SET  atencion = ?,aseguradora = ?,empresa = ?,hc = ?,dni = ?,
                                                         fec_naci = STR_TO_DATE(?, '%d/%m/%Y'),
                                                         sexo = ?,ocupacion_actual = ?,puesto_postula = ?,tipo_examen = ?,
                                                         fecha_examen = STR_TO_DATE(?, '%d/%m/%Y'),
                                                         habito_1 = ?,habito_2 = ?,alergias = ?,ant_perso1 = ?,
                                                         ant_perso2 = ?,ant_perso3 = ?,ant_perso4 = ?,ant_perso5 = ?,ant_perso6 = ?,cirugias = ?,
                                                         ant_familiares = ?,edad = ?,peso = ?,talla = ?,imc = ?,
                                                         frec_cardiaca = ?,frec_resp = ?,presion = ?,pam = ?,perim_abdominal = ?,
                                                         grasa_corporal = ?,hemoglobina = ?,leucocitos = ?,colesterol = ?,hdl = ?,
                                                         ldl = ?,trigliceridos = ?,urea_sanguinea = ?,glucosa = ?,creatinina = ?,
                                                         acido_urico = ?,tgo = ?,tgp = ?,plaquetas = ?,grupo_sangre = ?,
                                                         vdrl = ?,cocaina = ?,marihuana = ?,anfetaminas = ?,benzodiacepinas = ?,
                                                         meta_anfetamina = ?,morfina = ?,bk = ?,psa = ?,cea = ?,
                                                         aglutinaciones = ?,gota_gruesa = ?,hepatitis_a = ?,hepatiitis_b = ?,hepatitis_c = ?,
                                                         inmunoglobulina = ?,vih = ?,fosfa_alca = ?,hemo_glico = ?,vldl = ?,
                                                         col_total = ?,col_ldl = ?,hematocrito = ?,bilirrubina = ?,celulas_epiteliales = ?,
                                                         leucocitos_orina = ?,hematies = ?,cilindros = ?,cristales = ?,filamento_mucoide = ?,
                                                         germenes = ?,levadura_ori = ?,trichomonas = ?,glucosa_orina = ?,proteinas = ?,
                                                         cuerpos_cetonicos = ?,urobilinogeno = ?,pigmentos_biliares = ?,color_orina = ?,aspecto_orina = ?,
                                                         ph = ?,densidad = ?,coccidias = ?,levaduras_hece = ?,leucositos_pmn = ?,
                                                         quiste = ?,huevos = ?,piocitos = ?,hematies_hece = ?,trofozoitos = ?,
                                                         consistencia = ?,aspecto_parasitologico = ?,color_parasitologico = ?,mucus = ?,thevenon = ?,
                                                         coprocultivo = ?,tolueno = ?,xileno = ?,carboxihemoglobina = ?,fenol = ?,
                                                         plomo_sangre = ?,audiometria = ?,osteo = ?,rayosx = ?,lumbar = ?,
                                                         cervical = ?,ekg = ?,p_esfuezo = ?,espirometria = ?,eco_abdominal = ?,
                                                         papanicolau = ?,mamografia = ?,ginecologia = ?,odontograma = ?,otorrino = ?,
                                                         traumatologia = ?,oftalmologia = ?,cardiologia = ?,psicologia = ?,dermatoligia = ?,
                                                         neurologia = ?,diagno1 = ?,cie1 = ?,diagno2 = ?,cie2 = ?,
                                                         diagno3 = ?,cie3 = ?,diagno4 = ?,cie4 = ?,diagno5 = ?,
                                                         cie5 = ?,diagno6 = ?,cie6 = ?,diagno7 = ?,cie7 = ?,
                                                         diagno8 = ?,cie8 = ?,diagno9 = ?,cie9 = ?,diagno10 = ?,
                                                         cie10 = ?,aptitud = ?,restricciones = ?,fec_pase = ?,tipo1 = ?,
                                                         pase1 = ?,tipo2 = ?,pase2 = ?,reco1 = ?,reco2 = ?,
                                                         reco3 = ?,reco4 = ?,reco5 = ?,reco6 = ?,reco7 = ?,
                                                         reco8 = ?,reco9 = ?,reco10 = ?,estado = ?";
                 $statement = $pdo->prepare($sql);
                 $statement ->execute(array( $objCelda['B'],$objCelda['C'],$objCelda['D'],$objCelda['E'],$objCelda['G'],
                                             $objCelda['H'],$objCelda['I'],$objCelda['J'],$objCelda['K'],$objCelda['L'],
                                             $objCelda['M'],$objCelda['N'],$objCelda['O'],$objCelda['P'],$objCelda['Q'],
                                             $objCelda['R'],$objCelda['S'],$objCelda['T'],$objCelda['U'],$objCelda['V'],$objCelda['W'],
                                             $objCelda['X'],$objCelda['Y'],$objCelda['Z'],$objCelda['AA'],$objCelda['AB'],
                                             $objCelda['AC'],$objCelda['AD'],$objCelda['AE'],$objCelda['AF'],$objCelda['AG'],
                                             $objCelda['AH'],$objCelda['AI'],$objCelda['AJ'],$objCelda['AK'],$objCelda['AL'],
                                             $objCelda['AM'],$objCelda['AN'],$objCelda['AO'],$objCelda['AP'],$objCelda['AQ'],
                                             $objCelda['AR'],$objCelda['AS'],$objCelda['AT'],$objCelda['AU'],$objCelda['AV'],
                                             $objCelda['AW'],$objCelda['AX'],$objCelda['AY'],$objCelda['AZ'],$objCelda['BA'],
                                             $objCelda['BB'],$objCelda['BC'],$objCelda['BD'],$objCelda['BE'],$objCelda['BF'],
                                             $objCelda['BG'],$objCelda['BH'],$objCelda['BI'],$objCelda['BJ'],$objCelda['BK'],
                                             $objCelda['BL'],$objCelda['BM'],$objCelda['BN'],$objCelda['BO'],$objCelda['BP'],
                                             $objCelda['BQ'],$objCelda['BR'],$objCelda['BS'],$objCelda['BT'],$objCelda['BU'],
                                             $objCelda['BV'],$objCelda['BW'],$objCelda['BX'],$objCelda['BY'],$objCelda['BZ'],
                                             $objCelda['CA'],$objCelda['CB'],$objCelda['CC'],$objCelda['CD'],$objCelda['CE'],
                                             $objCelda['CF'],$objCelda['CG'],$objCelda['CH'],$objCelda['CI'],$objCelda['CJ'],
                                             $objCelda['CK'],$objCelda['CL'],$objCelda['CM'],$objCelda['CN'],$objCelda['CO'],
                                             $objCelda['CP'],$objCelda['CQ'],$objCelda['CR'],$objCelda['CS'],$objCelda['CT'],
                                             $objCelda['CU'],$objCelda['CV'],$objCelda['CW'],$objCelda['CX'],$objCelda['CY'],
                                             $objCelda['CZ'],$objCelda['DA'],$objCelda['DB'],$objCelda['DC'],$objCelda['DD'],
                                             $objCelda['DE'],$objCelda['DF'],$objCelda['DG'],$objCelda['DH'],$objCelda['DI'],
                                             $objCelda['DJ'],$objCelda['DK'],$objCelda['DL'],$objCelda['DM'],$objCelda['DN'],
                                             $objCelda['DO'],$objCelda['DP'],$objCelda['DQ'],$objCelda['DR'],$objCelda['DS'],
                                             $objCelda['DT'],$objCelda['DU'],$objCelda['DV'],$objCelda['DW'],$objCelda['DX'],
                                             $objCelda['DY'],$objCelda['DZ'],$objCelda['EA'],$objCelda['EB'],$objCelda['EC'],
                                             $objCelda['ED'],$objCelda['EE'],$objCelda['EF'],$objCelda['EG'],$objCelda['EH'],
                                             $objCelda['EI'],$objCelda['EJ'],$objCelda['EK'],$objCelda['EL'],$objCelda['EM'],
                                             $objCelda['EN'],$objCelda['EO'],$objCelda['EP'],$objCelda['EQ'],$objCelda['ER'],
                                             $objCelda['ES'],$objCelda['ET'],$objCelda['EU'],$objCelda['EV'],$objCelda['EW'],
                                             $objCelda['EX'],$objCelda['EY'],$objCelda['EZ'],$objCelda['FA'],$objCelda['FB'],
                                             $objCelda['FC'],$objCelda['FD'],$objCelda['FE'],$objCelda['FF'],$objCelda['FG'],
                                             $objCelda['FH'],$objCelda['FI'],$objCelda['FJ'],$objCelda['FK']
                                         ));
                 $result = $statement ->fetchAll();
                 $rowCount = $statement -> rowcount();
                 //var_dump($statement->errorinfo());
                 $contador++;
             }
         }
 
         return $contador;
     }
?>