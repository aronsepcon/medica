<?php
     require_once("connectmedica.inc.php");
     require_once("../vendor/autoload.php");
 
     $mensaje = "No se completo la operacion";
     $respuesta = false;
 
     $archivo = $_FILES['fileUpload'];
     $temporal	 = $_FILES['fileUpload']['tmp_name'];
     $fileId      = uniqid().".xlsx";
     //$validacion = $_POST['validacion'];//porq esto estaba aqui ----> investigar
 
     if (move_uploaded_file($temporal,"../xls/".$fileId)) {
         $mensaje = "Archivo copiado";
         $respuesta = true;
     }
 
     $salida = array("mensaje"   =>$mensaje,
                     "respuesta" =>$respuesta,
                     "contador"  =>returnTable($pdo,"../xls/".$fileId));//*/returnTable($pdo,"../xls/".$fileId,$validacion));//cambiar a la funcion deseada o algo asi

     echo json_encode($salida);
 
 
    function returnTable($pdo,$archivo){ 

         //$objPHPExcel = \PHPExcel_IOFactory::load($archivo);//llamado para phpexcel--desactualizado y cambiado al de abajo
         $objPHPExcel = PhpOffice\PhpSpreadsheet\IOFactory::load($archivo);
         $objHoja=$objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
         $contador = 0;
         $valMedex = $objPHPExcel ->getActiveSheet() -> getCell('B2') -> getValue();
         $valSerfarmed = $objPHPExcel ->getActiveSheet() -> getCell('A1') -> getValue();
         $valAmericas = $objPHPExcel ->getActiveSheet() -> getCell('AH9') -> getValue();
         $valAmericasPreocup = $objPHPExcel ->getActiveSheet() -> getCell('C4') -> getValue();
         foreach ($objHoja as $iIndice=>$objCelda) {
          //  if($objCelda['A1']=="Id.Atención"/* && $objCelda['A']!==""*/){//no lo carga bien, carga el primero por algun motivo xc
            $tipoR = 'RETIRO';
            $tipoP = 'PREOCUPACIONAL';
         
                if($valSerfarmed == "Id.Atención" && is_numeric($objCelda['D'])){
                    $seisdig =preg_match('/1[0-1][0-9][0-9][0-9][0-9]/',$objCelda['D']);
                    $seisdigven = preg_match('/[0-9][0-9][0-9][0-9][0-9][0-9]/',$objCelda['D']);
                    $ochoPeru = preg_match('/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/',$objCelda['D']);
                    if($seisdig==1){    
                        $dni= str_pad($objCelda['D'],8,0,STR_PAD_LEFT);
                        //[0-9][0-9][0-9][0-9]
                    }
                    if($seisdigven==1){    
                        $dni= str_pad($objCelda['D'],9,0,STR_PAD_LEFT);
                        //[0-9][0-9][0-9][0-9]
                    }
                    if($ochoPeru==1){
                        $dni =$objCelda['D'];
                    }
                    else{//aca es el error
                        $dni= str_pad($objCelda['D'],8,0,STR_PAD_LEFT);
                    }
                    if(substr($objCelda['A'],0,3)=="id:"){
                        $idreg=substr($objCelda['A'],3,11);
                    }else{
                        $idreg=$objCelda['A'];
                    }
                    $sql = "INSERT INTO fichas_api SET atencion=?, fecha = STR_TO_DATE(?,'%d/%m/%Y'), paciente=?,dni=?, ocupacion=?, 
                                                            codSexo=?, edad =?, empresa=?,tipoExa=?, aptitud=?, imc=?, diagno1=?, reco1=?, diagno2=?,
                                                            reco2=?,diagno3=?, reco3=?, diagno4=?, reco4=?,diagno5=?, reco5=?,
                                                            diagno6=?, reco6=?, diagno7=?, reco7=?, diagno8=?, reco8=?, diagno9=?, 
                                                            reco9=?, hemoglobina=?, hematocrito=?,grupoSangre=?,glucosa=?, rpr=?, 
                                                            vdrl=?, clinica=2 ";
                    $statement = $pdo->prepare($sql);
                    $statement -> execute(array($idreg,$objCelda['B'],$objCelda['C'],$dni/*$objCelda['D']*/,$objCelda['E'],$objCelda['F'],
                                                $objCelda['G'],$objCelda['H'],$objCelda['I'],$objCelda['J'],$objCelda['K'],$objCelda['L'],$objCelda['M'],
                                                $objCelda['R'],$objCelda['S'],$objCelda['U'],$objCelda['V'],$objCelda['X'],$objCelda['Y'],
                                                $objCelda['AD'],$objCelda['AE'],$objCelda['AG'], $objCelda['AH'],$objCelda['AM'],
                                                $objCelda['AN'], $objCelda['BE'],$objCelda['BF'],$objCelda['BH'],$objCelda['BI'],
                                                $objCelda['CO'], $objCelda['CP'],$objCelda['CR']." ".$objCelda['CS'],$objCelda['CT'],$objCelda['CU'],
                                                $objCelda['CV']));//ver como concatenar tipo de sangre
                    $result = $statement ->fetchAll();
                    $rowCount = $statement -> rowcount();
                    $contador++;
                }
                else if(($objCelda['O']== "SERFARMED" and $valAmericasPreocup == "FECHA DE NACIMIENTO") && is_numeric($objCelda['D'])){
                    $sql ="UPDATE fichas_api SET alergias=? WHERE dni=? and clinica=2";
                    $statement = $pdo->prepare($sql);
                    $statement -> execute(array($objCelda['M'],$objCelda['D']));
                    $result = $statement ->fetchAll();
                    $rowCount = $statement -> rowcount();
                    $contador++;
                }
            //serfarmed
           // else if ($objCelda['B'] !== "ATENCION"){
       
            else if ($valMedex == "ATENCION" && is_numeric($objCelda['E'])){
                $sql = "INSERT INTO fichas_api SET  atencion = ?,desAseg = ?,empresa = ?,codPaci = ?,paciente=?,dni = ?,
                                                    fecNaci = STR_TO_DATE(?, '%d/%m/%Y'),
                                                    codSexo = ?,ocupacion = ?,puestoPostula = ?,tipoExa = ?,
                                                    fecha = STR_TO_DATE(?, '%d/%m/%Y'),
                                                    habiAfisica = ?,habiTabaco = ?,alergias = ?,antece1 = ?,
                                                    antece2 = ?,antece3 = ?,antece4 = ?,antece5 = ?,antece6 = ?,cirugias = ?,
                                                    antFamiliares = ?,edad = ?,peso = ?,talla = ?,imc = ?,
                                                    cheFrca = ?,cheFrre = ?,presion = ?,pam = ?,periAbdominal = ?,
                                                    grasaCorporal = ?,hemoglobina = ?,leucocitos = ?,colesterol = ?,hdl = ?,
                                                    ldl = ?,trigliceridos = ?,ureaSanguinea = ?,glucosa = ?,creatinina = ?,
                                                    acidoUrico = ?,tgo = ?,tgp = ?,plaquetas = ?,grupoSangre = ?,
                                                    vdrl = ?,cocaina = ?,marihuana = ?,anfetaminas = ?,benzodiacepinas = ?,
                                                    metaAnfetamina = ?,morfina = ?,bk = ?,psa = ?,cea = ?,
                                                    aglutinaciones = ?,gotaGruesa = ?,hepatitisA = ?,hepatitisB = ?,hcvhepatitisC = ?,
                                                    inmunoglobulinaE = ?,vih = ?,fosfaAlca = ?,hemoGlico = ?,vldl = ?,
                                                    colTotalHdl = ?,colLdlHdl = ?,hematocrito = ?,bilirrubina = ?,celulasEpiteliales = ?,
                                                    leucocitosOrina = ?,hematies = ?,cilindros = ?,cristales = ?,filamentoMucoide = ?,
                                                    germenes = ?,levaduraOri = ?,trichomonas = ?,orinaAzucar = ?,orinaAlbuminia = ?,
                                                    cuerposCetonicos = ?,urobilinogeno = ?,pigmentosBiliares = ?,oriColor = ?,oriAspecto = ?,
                                                    oriPh = ?,oriDensidad = ?,coccidias = ?,levadurasHece = ?,leucosistosPmn = ?,
                                                    quiste = ?,huevos = ?,piocitos = ?,hematiesHece = ?,trofozoitos = ?,
                                                    eConsistencia = ?,eAspecto = ?,eColor = ?,eMucus = ?,thevenon = ?,
                                                    coprocultivo = ?,tolueno = ?,xileno = ?,carboxihemo = ?,benceno = ?,
                                                    plomo = ?,audiometria = ?,osteo = ?,rayosx = ?,lumbar = ?,
                                                    cervical = ?,ekg = ?,pEsfuerzo = ?,espirometria = ?,ecoAbdominal = ?,
                                                    papanicolau = ?,mamografia = ?,ginecologia = ?,odontograma = ?,otorrino = ?,
                                                    traumatologia = ?,oftalmologia = ?,cardiologia = ?,psicologia = ?,dermatologia = ?,
                                                    neurologia = ?,diagno1 = ?,cod1 = ?,diagno2 = ?,cod2 = ?,
                                                    diagno3 = ?,cod3 = ?,diagno4 = ?,cod4 = ?,diagno5 = ?,
                                                    cod5 = ?,diagno6 = ?,cod6 = ?,diagno7 = ?,cod7 = ?,
                                                    diagno8 = ?,cod8 = ?,diagno9 = ?,cod9 = ?,diagno10 = ?,
                                                    cod10 = ?,aptitud = ?,restricciones = ?,fecPase = STR_TO_DATE(?, '%d/%m/%Y'),tipoPase = ?,
                                                    pase = ?,tipoPase2 = ?,pase2 = ?,reco1 = ?,reco2 = ?,
                                                    reco3 = ?,reco4 = ?,reco5 = ?,reco6 = ?,reco7 = ?,
                                                    reco8 = ?,reco9 = ?,reco10 = ?,estado = ?,
													tarifa=?,nroRuc=?, razonSocial=?, expoFactorRiesgo=?, estadoNutricional=?, 
													otoscopia=?, tratamientoMedico=?, riesgoCoronario=?, rpr=?, centroCosto=?,clinica=1";
                $statement = $pdo->prepare($sql);
                $statement ->execute(array( $objCelda['B'],$objCelda['C'],$objCelda['D'],$objCelda['E'],$objCelda['F'],$objCelda['G'],
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
                                        $objCelda['FH'],$objCelda['FI'],$objCelda['FJ'],$objCelda['FK'],$objCelda['FL'],
                                        $objCelda['FM'],$objCelda['FN'],$objCelda['FO'],$objCelda['FP'],$objCelda['FQ'],
                                        $objCelda['FR'],$objCelda['FS'],$objCelda['FT'],$objCelda['FU']
                                    ));
                $result = $statement ->fetchAll();
                $rowCount = $statement -> rowcount();
               // var_dump($statement->errorinfo());
                $contador++;
            }
      
           else if($objCelda['AH']  == "LAS AMERICAS" && is_numeric($objCelda['D'])){//Las americas -- retiro
                $sql ="INSERT INTO fichas_api SET paciente = ?,fecNaci = STR_TO_DATE(?,'%d/%m/%Y'),dni = ?,edad = ?, ocupacion=?, 
                                                    centroCosto=?, empresa=?,grupoSangre=?,alergias = ?,peso=?,talla=?,imc=?,estadoNutricional=?, fecha=STR_TO_DATE(?,'%d/%m/%Y'), 
                                                    tipoExa=?,aptitud=?, clinica = 3 ";//tipoExa='RETIRO'
                $statement = $pdo->prepare($sql);
                $statement -> execute(array($objCelda['B'],$objCelda['C'],$objCelda['D'],$objCelda['E'],$objCelda['G'],$objCelda['H'],
                                            $objCelda['I'], $objCelda['L'],$objCelda['M'],$objCelda['Q'],
                                            $objCelda['R'],$objCelda['S'],$objCelda['T'],$objCelda['AG'],$tipoR,$tipoR));
                $result = $statement ->fetchAll();
                $rowCount = $statement -> rowcount();
                $contador++;
            }//$objCelda['O']
            else if( ($objCelda['O']== "LAS AMERICAS" and $valAmericasPreocup == "FECHA DE NACIMIENTO") && is_numeric($objCelda['D']) ) {//las americas
               $sql ="INSERT INTO fichas_api SET paciente = ?,fecNaci = STR_TO_DATE(?,'%d/%m/%Y'),dni = ?,edad = ?, ocupacion=?, 
                                                    centroCosto=?, empresa=?,grupoSangre=?,alergias = ?, fecha=STR_TO_DATE(?,'%d/%m/%Y'),
                                                    aptitud=?,peso=?,talla=?,imc=?,estadoNutricional=?,tipoExa=?, clinica = 3"; //tipoExa='PREOCUPACIONAL' 
                $statement = $pdo->prepare($sql);
                $statement -> execute(array( $objCelda['B'],$objCelda['C'],$objCelda['D'],$objCelda['E'],$objCelda['G'],$objCelda['H'],
                                            $objCelda['I'], $objCelda['L'],$objCelda['M'],$objCelda['N'],$objCelda['P'],$objCelda['Q'],
                                            $objCelda['R'],$objCelda['S'],$objCelda['T'],$tipoP));
                $result = $statement ->fetchAll();
                $rowCount = $statement -> rowcount();
                $contador++;
            }
            
            
           
        }
        return $contador;
    }



?>
