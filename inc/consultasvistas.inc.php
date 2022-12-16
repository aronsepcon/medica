<?php
    session_start();//sin esto no jala el $_Session, recuerda eso
    require_once("connectmedica.inc.php");
    require_once('../vendor/autoload.php');

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
  /*  if(file_exists("../formatos/Formato 006.xlsx")){
        unlink("../formatos/Formato 006.xlsx");
    }*/

    $spreadsheet = new Spreadsheet();
    $spreadsheet->setActiveSheetIndex(0);
    $spreadsheet->getActiveSheet()->setTitle("ACTIVOS LIMA");

    $spreadsheet->createSheet();
    $spreadsheet->setActiveSheetIndex(1);
    $spreadsheet->getActiveSheet()->setTitle("ACTIVOS LURIN");

    $spreadsheet->createSheet();
    $spreadsheet->setActiveSheetIndex(2);
    $spreadsheet->getActiveSheet()->setTitle("ACTIVOS PUCALLPA");

    for($i=0;$i<=2;$i++){
        $spreadsheet->setActiveSheetIndex($i);
        $spreadsheet->getActiveSheet()->setCellValue("A5","N°");
        $spreadsheet->getActiveSheet()->setCellValue("B5","APELLIDOS Y NOMBRES");
        $spreadsheet->getActiveSheet()->setCellValue("C5","FECHA DE NACIMIENTO");
        $spreadsheet->getActiveSheet()->setCellValue("D5","DNI");
        $spreadsheet->getActiveSheet()->setCellValue("E5","EDAD");
        $spreadsheet->getActiveSheet()->setCellValue("F5","AREA DE TRABAJOs");
        $spreadsheet->getActiveSheet()->setCellValue("G5","PUESTO DE TRABAJO");
        $spreadsheet->getActiveSheet()->setCellValue("H5","EMPRESA");
        $spreadsheet->getActiveSheet()->setCellValue("I5",utf8_decode("CORREO ELECTRONICO"));
        $spreadsheet->getActiveSheet()->setCellValue("J5","CELULAR");
        $spreadsheet->getActiveSheet()->setCellValue("K5","GRUPO SANG. Y RH");
        $spreadsheet->getActiveSheet()->setCellValue("L5","ALERGIAS");
        $spreadsheet->getActiveSheet()->setCellValue("M6","EMO PREOCUPACIONAL");
        $spreadsheet->getActiveSheet()->setCellValue("M5","EXAMENES MEDICOS OCUPACIONALES");
        $spreadsheet->getActiveSheet()->setCellValue("M7","FECHA EMO");
        $spreadsheet->getActiveSheet()->setCellValue("N7","CLINICA");
        $spreadsheet->getActiveSheet()->setCellValue("O7",utf8_decode("CONDICIÓN"));
        $spreadsheet->getActiveSheet()->setCellValue("P7","VALORACION NUTRICIONAL");
        $spreadsheet->getActiveSheet()->setCellValue("P8","PESO");
        $spreadsheet->getActiveSheet()->setCellValue("Q8","TALLA");
        $spreadsheet->getActiveSheet()->setCellValue("R8","IMC");
        $spreadsheet->getActiveSheet()->setCellValue("S8","CLASIFICACION");
        $spreadsheet->getActiveSheet()->setCellValue("T7","ENVIO DE EMO EMAIL");
        $spreadsheet->getActiveSheet()->setCellValue("U6","EMO PERIODICO");
        $spreadsheet->getActiveSheet()->setCellValue("U7","PROGRAMADO");
        $spreadsheet->getActiveSheet()->setCellValue("V7","REALIZADO");
        $spreadsheet->getActiveSheet()->setCellValue("W7","CLINICA");
        $spreadsheet->getActiveSheet()->setCellValue("X7",utf8_decode("CONDICIÓN"));
        $spreadsheet->getActiveSheet()->setCellValue("Y7","VALORACION NUTRICIONAL");
        $spreadsheet->getActiveSheet()->setCellValue("Y8","PESO");
        $spreadsheet->getActiveSheet()->setCellValue("Z8","TALLA");
        $spreadsheet->getActiveSheet()->setCellValue("AA8","IMC");
        $spreadsheet->getActiveSheet()->setCellValue("AB8","CLASIFICACION");
        $spreadsheet->getActiveSheet()->setCellValue("AC7","ENVIO DE EMO EMAIL");
        $spreadsheet->getActiveSheet()->setCellValue("AD7","PROGRAMADO");
        $spreadsheet->getActiveSheet()->setCellValue("AE7","REALIZADO");
        $spreadsheet->getActiveSheet()->setCellValue("AF7",utf8_decode("CLÍNICA"));
        $spreadsheet->getActiveSheet()->setCellValue("AG7",utf8_decode("CONDICIÓN"));
        $spreadsheet->getActiveSheet()->setCellValue("AH7","VALORACION NUTRICIONAL");
        $spreadsheet->getActiveSheet()->setCellValue("AH8","PESO");
        $spreadsheet->getActiveSheet()->setCellValue("AI8","TALLA");
        $spreadsheet->getActiveSheet()->setCellValue("AJ8","IMC");
        $spreadsheet->getActiveSheet()->setCellValue("AK8","CLASIFICACION");
        $spreadsheet->getActiveSheet()->setCellValue("AL7","ENVIO DE EMO EMAIL");
        $spreadsheet->getActiveSheet()->setCellValue("AM7","PROGRAMADO");
        $spreadsheet->getActiveSheet()->setCellValue("AN6","EMO RETIRO");
        $spreadsheet->getActiveSheet()->setCellValue("AN7","REALIZADO");
        $spreadsheet->getActiveSheet()->setCellValue("AO7",utf8_decode("CLÍNICA"));
        $spreadsheet->getActiveSheet()->setCellValue("AP7",utf8_decode("OBSERVACIÓNES"));
        $spreadsheet->getActiveSheet()->setCellValue("AQ7","ENVIO DE EMO EMAIL");
        $spreadsheet->getActiveSheet()->setCellValue("AR4","INMUNIZACIONES");
        $spreadsheet->getActiveSheet()->setCellValue("AR6","FIEBRE AMARILLA");
        $spreadsheet->getActiveSheet()->setCellValue("AR7","1RA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("AS6","DIFTERIA TETANO");
        $spreadsheet->getActiveSheet()->setCellValue("AS7","1RA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("AT7","2DA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("AU7","3RA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("AV7","REFUERZO");
        $spreadsheet->getActiveSheet()->setCellValue("AW6","HEPATITIS A");
        $spreadsheet->getActiveSheet()->setCellValue("AW7","1RA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("AX7","2DA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("AY7","REFUERZO");
        $spreadsheet->getActiveSheet()->setCellValue("AZ6","HEPATITIS B");
        $spreadsheet->getActiveSheet()->setCellValue("AZ7","1RA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("BA7","2DA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("BB7","3RA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("BC6","INFLUENZA");
        $spreadsheet->getActiveSheet()->setCellValue("BC7","1RA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("BD7","REFUERZO");
        $spreadsheet->getActiveSheet()->setCellValue("BE6","POLIOMELITIS");
        $spreadsheet->getActiveSheet()->setCellValue("BE7","1RA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("BF6","TRIVIRICA");
        $spreadsheet->getActiveSheet()->setCellValue("BF7","1RA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("BG6","RABIA");
        $spreadsheet->getActiveSheet()->setCellValue("BG7","1RA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("BH7","2DA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("BI7","3RA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("BJ7","REFUERZO");
        $spreadsheet->getActiveSheet()->setCellValue("BK6","TIFOIDEA");
        $spreadsheet->getActiveSheet()->setCellValue("BK7","1RA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("BL7","REFUERZO");
        $spreadsheet->getActiveSheet()->setCellValue("BM6","NEUMOCOCO");
        $spreadsheet->getActiveSheet()->setCellValue("BM7","1RA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("BN7","REFUERZO");
        $spreadsheet->getActiveSheet()->setCellValue("BO6","COVID");
        $spreadsheet->getActiveSheet()->setCellValue("BO7","1RA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("BP7","2DA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("BQ7","3RA DOSIS");
        $spreadsheet->getActiveSheet()->setCellValue("BR7","4TA DOSIS");

        $spreadsheet->getActiveSheet()->mergeCells("A5:A8");
        $spreadsheet->getActiveSheet()->mergeCells("B5:B8");
        $spreadsheet->getActiveSheet()->mergeCells("C5:C8");
        $spreadsheet->getActiveSheet()->mergeCells("D5:D8");
        $spreadsheet->getActiveSheet()->mergeCells("E5:E8");
        $spreadsheet->getActiveSheet()->mergeCells("F5:F8");
        $spreadsheet->getActiveSheet()->mergeCells("G5:G8");
        $spreadsheet->getActiveSheet()->mergeCells("H5:H8");
        $spreadsheet->getActiveSheet()->mergeCells("I5:I8");
        $spreadsheet->getActiveSheet()->mergeCells("J5:J8");
        $spreadsheet->getActiveSheet()->mergeCells("K5:K8");
        $spreadsheet->getActiveSheet()->mergeCells("L5:L8");
        $spreadsheet->getActiveSheet()->mergeCells("M6:T6");
        $spreadsheet->getActiveSheet()->mergeCells("M5:AQ5");
        $spreadsheet->getActiveSheet()->mergeCells("M7:M8");
        $spreadsheet->getActiveSheet()->mergeCells("N7:N8");
        $spreadsheet->getActiveSheet()->mergeCells("O7:O8");
        $spreadsheet->getActiveSheet()->mergeCells("P7:S7");
        $spreadsheet->getActiveSheet()->mergeCells("T7:T8");
        $spreadsheet->getActiveSheet()->mergeCells("U6:AM6");
        $spreadsheet->getActiveSheet()->mergeCells("U7:U8");
        $spreadsheet->getActiveSheet()->mergeCells("V7:V8");
        $spreadsheet->getActiveSheet()->mergeCells("W7:W8");
        $spreadsheet->getActiveSheet()->mergeCells("X7:X8");
        $spreadsheet->getActiveSheet()->mergeCells("Y7:AB7");
        $spreadsheet->getActiveSheet()->mergeCells("AC7:AC8");
        $spreadsheet->getActiveSheet()->mergeCells("AD7:AD8");
        $spreadsheet->getActiveSheet()->mergeCells("AE7:AE8");
        $spreadsheet->getActiveSheet()->mergeCells("AF7:AF8");
        $spreadsheet->getActiveSheet()->mergeCells("AG7:AG8");
        $spreadsheet->getActiveSheet()->mergeCells("AH7:AK7");
        $spreadsheet->getActiveSheet()->mergeCells("AL7:AL8");
        $spreadsheet->getActiveSheet()->mergeCells("AM7:AM8");
        $spreadsheet->getActiveSheet()->mergeCells("AN6:AQ6");
        $spreadsheet->getActiveSheet()->mergeCells("AN7:AN8");
        $spreadsheet->getActiveSheet()->mergeCells("AO7:AO8");
        $spreadsheet->getActiveSheet()->mergeCells("AP7:AP8");
        $spreadsheet->getActiveSheet()->mergeCells("AQ7:AQ8");
        $spreadsheet->getActiveSheet()->mergeCells("AR4:BR4");
        $spreadsheet->getActiveSheet()->mergeCells("AR5:BR5");
        $spreadsheet->getActiveSheet()->mergeCells("AR7:AR8");
        $spreadsheet->getActiveSheet()->mergeCells("AS6:AV6");
        $spreadsheet->getActiveSheet()->mergeCells("AS7:AS8");
        $spreadsheet->getActiveSheet()->mergeCells("AT7:AT8");
        $spreadsheet->getActiveSheet()->mergeCells("AU7:AU8");
        $spreadsheet->getActiveSheet()->mergeCells("AV7:AV8");
        $spreadsheet->getActiveSheet()->mergeCells("AW6:AY6");
        $spreadsheet->getActiveSheet()->mergeCells("AW7:AW8");
        $spreadsheet->getActiveSheet()->mergeCells("AX7:AX8");
        $spreadsheet->getActiveSheet()->mergeCells("AY7:AY8");
        $spreadsheet->getActiveSheet()->mergeCells("AZ6:BB6");
        $spreadsheet->getActiveSheet()->mergeCells("AZ7:AZ8");
        $spreadsheet->getActiveSheet()->mergeCells("BA7:BA8");
        $spreadsheet->getActiveSheet()->mergeCells("BB7:BB8");
        $spreadsheet->getActiveSheet()->mergeCells("BC6:BD6");
        $spreadsheet->getActiveSheet()->mergeCells("BC7:BC8");
        $spreadsheet->getActiveSheet()->mergeCells("BD7:BD8");
        $spreadsheet->getActiveSheet()->mergeCells("BE6:BE6");
        $spreadsheet->getActiveSheet()->mergeCells("BE7:BE8");
        $spreadsheet->getActiveSheet()->mergeCells("BF6:BF6");
        $spreadsheet->getActiveSheet()->mergeCells("BF7:BF8");
        $spreadsheet->getActiveSheet()->mergeCells("BG6:BJ6");
        $spreadsheet->getActiveSheet()->mergeCells("BG7:BG8");
        $spreadsheet->getActiveSheet()->mergeCells("BH7:BH8");
        $spreadsheet->getActiveSheet()->mergeCells("BI7:BI8");
        $spreadsheet->getActiveSheet()->mergeCells("BJ7:BJ8");
        $spreadsheet->getActiveSheet()->mergeCells("BK6:BL6");
        $spreadsheet->getActiveSheet()->mergeCells("BK7:BK8");
        $spreadsheet->getActiveSheet()->mergeCells("BL7:BL8");
        $spreadsheet->getActiveSheet()->mergeCells("BM6:BN6");
        $spreadsheet->getActiveSheet()->mergeCells("BM7:BM8");
        $spreadsheet->getActiveSheet()->mergeCells("BN7:BN8");
        $spreadsheet->getActiveSheet()->mergeCells("BO6:BR6");
        $spreadsheet->getActiveSheet()->mergeCells("BO7:BO8");
        $spreadsheet->getActiveSheet()->mergeCells("BP7:BP8");
        $spreadsheet->getActiveSheet()->mergeCells("BQ7:BQ8");
        $spreadsheet->getActiveSheet()->mergeCells("BR7:BR8");

        $styleArray = [
            'borders'=>[
                'allBorders'=>[
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
            'alignment'=>[
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('B5:L8')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setARGB('99AD71');

        $spreadsheet->getActiveSheet()->getStyle('A4:BR8')->applyFromArray($styleArray);

        $spreadsheet->getActiveSheet()->getStyle('M5:AQ8')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setARGB('6DB4CA');

        $spreadsheet->getActiveSheet()->getStyle('AR5:BR5')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setARGB('E2E51E');

        $spreadsheet->getActiveSheet()->getStyle('AR6:AR8')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setARGB('E2E51E');

        $spreadsheet->getActiveSheet()->getStyle('AS6:AV8')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setARGB('15F0EA');

        $centrosAdm = ["0200","0300","0600"];
        
        $c = formato($pdo,$centrosAdm[$i]);
        $nc = count($c);

        for($j=0;$j<$nc;$j++){

            $spreadsheet->getActiveSheet()-> setCellValue('A'.$fila,$r);
            $spreadsheet->getActiveSheet()-> setCellValue('B'.$fila,utf8_decode($row['empleadonomb']));
            $spreadsheet->getActiveSheet()-> setCellValue('C'.$fila,date("d/m/Y", strtotime($row['fecnac'])));
            $spreadsheet->getActiveSheet()-> setCellValue('D'.$fila,$row['dni']);
            $spreadsheet->getActiveSheet()-> setCellValue('E'.$fila,$row['edad']);
            $spreadsheet->getActiveSheet()-> setCellValue('F'.$fila,utf8_decode($centro));
            $spreadsheet->getActiveSheet()-> setCellValue('G'.$fila,utf8_decode($row['cargo']));
            $spreadsheet->getActiveSheet()-> setCellValue('H'.$fila,utf8_decode("SEPCON"));
            $spreadsheet->getActiveSheet()-> setCellValue('I'.$fila,utf8_decode($row['correo']));
            $spreadsheet->getActiveSheet()-> setCellValue('J'.$fila,utf8_decode($row['telefono']));
            $spreadsheet->getActiveSheet()-> setCellValue('K'.$fila,utf8_decode($row['grupoSangre']));
            $spreadsheet->getActiveSheet()-> setCellValue('L'.$fila,utf8_decode($row['alergias']));
            $spreadsheet->getActiveSheet()-> setCellValue('M'.$fila,date("d/m/Y", strtotime($row['fecha'])));
            $spreadsheet->getActiveSheet()-> setCellValue('N'.$fila,utf8_decode($row['nomb_clinica']));
            $spreadsheet->getActiveSheet()-> setCellValue('O'.$fila,utf8_decode($row['aptitud']));
            $spreadsheet->getActiveSheet()-> setCellValue('P'.$fila,$row['peso']);
            $spreadsheet->getActiveSheet()-> setCellValue('Q'.$fila,$row['talla']);
            $spreadsheet->getActiveSheet()-> setCellValue('R'.$fila,$row['imc']);
            $spreadsheet->getActiveSheet()-> setCellValue('S'.$fila,utf8_decode($row['estadoNutricional']));
            $spreadsheet->getActiveSheet()-> setCellValue('T'.$fila,$row['enviado']);
            $spreadsheet->getActiveSheet()-> setCellValue('U'.$fila,date("d/m/Y", strtotime($row['programadopre'])));
            $spreadsheet->getActiveSheet()-> setCellValue('V'.$fila,date("d/m/Y", strtotime($row['f_per1'])));
            $spreadsheet->getActiveSheet()-> setCellValue('W'.$fila,utf8_decode($row['f_cln1'])); 
            $spreadsheet->getActiveSheet()-> setCellValue('X'.$fila,utf8_decode($row['f_act1']));
            $spreadsheet->getActiveSheet()-> setCellValue('Y'.$fila,$row['f_pes1']);
            $spreadsheet->getActiveSheet()-> setCellValue('Z'.$fila,$row['f_tal1']);
            $spreadsheet->getActiveSheet()-> setCellValue('AA'.$fila,$row['f_imc1']);
            $spreadsheet->getActiveSheet()-> setCellValue('AB'.$fila,utf8_decode($row['f_est1'])); 
            $spreadsheet->getActiveSheet()-> setCellValue('AC'.$fila,$row['f_env1']); 
            $spreadsheet->getActiveSheet()-> setCellValue('AD'.$fila,date("d/m/Y", strtotime($row['programado1'])));
            $spreadsheet->getActiveSheet()-> setCellValue('AE'.$fila,date("d/m/Y", strtotime($row['f_per2'])));
            $spreadsheet->getActiveSheet()-> setCellValue('AF'.$fila,utf8_decode($row['f_cln2'])); 
            $spreadsheet->getActiveSheet()-> setCellValue('AG'.$fila,utf8_decode($row['f_act2'])); 
            $spreadsheet->getActiveSheet()-> setCellValue('AH'.$fila,$row['f_pes2']); 
            $spreadsheet->getActiveSheet()-> setCellValue('AI'.$fila,$row['f_tal2']); 
            $spreadsheet->getActiveSheet()-> setCellValue('AJ'.$fila,$row['f_imc2']); 
            $spreadsheet->getActiveSheet()-> setCellValue('AK'.$fila,utf8_decode($row['f_est2'])); 
            $spreadsheet->getActiveSheet()-> setCellValue('AL'.$fila,$row['f_env2']);
            $spreadsheet->getActiveSheet()-> setCellValue('AM'.$fila,date("d/m/Y", strtotime($row['programado2'])));//a partir de por aqui iria el switch case U:
            $spreadsheet->getActiveSheet()-> setCellValue('AN'.$fila,date("d/m/Y", strtotime($row['f_retiro'])));
            $spreadsheet->getActiveSheet()-> setCellValue('AO'.$fila,utf8_decode($row['clinica'])); 
            $spreadsheet->getActiveSheet()-> setCellValue('AP'.$fila,utf8_decode($row['observaciones'])); 
            $spreadsheet->getActiveSheet()-> setCellValue('AQ'.$fila,$row['f_envr']);
            $spreadsheet->getActiveSheet()-> setCellValue('AR'.$fila,date("d/m/Y", strtotime($row['fechaFbrAmarilla'])));
            $spreadsheet->getActiveSheet()-> setCellValue('AS'.$fila,date("d/m/Y", strtotime($row['fechaDifTD1'])));
            $spreadsheet->getActiveSheet()-> setCellValue('AT'.$fila,date("d/m/Y", strtotime($row['fechaDifTD2'])));
            $spreadsheet->getActiveSheet()-> setCellValue('AU'.$fila,date("d/m/Y", strtotime($row['fechaDifTD3'])));
            $spreadsheet->getActiveSheet()-> setCellValue('AV'.$fila,date("d/m/Y", strtotime($row['fechaDifTR1'])));                        
            $spreadsheet->getActiveSheet()-> setCellValue('AW'.$fila,date("d/m/Y", strtotime($row['fechaHepAD1'])));   
            $spreadsheet->getActiveSheet()-> setCellValue('AX'.$fila,date("d/m/Y", strtotime($row['fechaHepAD2'])));   
            $spreadsheet->getActiveSheet()-> setCellValue('AY'.$fila,date("d/m/Y", strtotime($row['fechaHepAR1'])));   
            $spreadsheet->getActiveSheet()-> setCellValue('AZ'.$fila,date("d/m/Y", strtotime($row['fechaHepBD1'])));   
            $spreadsheet->getActiveSheet()-> setCellValue('BA'.$fila,date("d/m/Y", strtotime($row['fechaHepBD2'])));   
            $spreadsheet->getActiveSheet()-> setCellValue('BB'.$fila,date("d/m/Y", strtotime($row['fechaHepBD3'])));   
            $spreadsheet->getActiveSheet()-> setCellValue('BC'.$fila,date("d/m/Y", strtotime($row['fechaInflR1'])));   
            $spreadsheet->getActiveSheet()-> setCellValue('BD'.$fila,date("d/m/Y", strtotime($row['fechaInflR2'])));   
            $spreadsheet->getActiveSheet()-> setCellValue('BE'.$fila,date("d/m/Y", strtotime($row['fechaPolioD1'])));   
            $spreadsheet->getActiveSheet()-> setCellValue('BF'.$fila,date("d/m/Y", strtotime($row['fechaTrivD1'])));
            $spreadsheet->getActiveSheet()-> setCellValue('BG'.$fila,date("d/m/Y", strtotime($row['fechaRabD1'])));
            $spreadsheet->getActiveSheet()-> setCellValue('BH'.$fila,date("d/m/Y", strtotime($row['fechaRabD2'])));
            $spreadsheet->getActiveSheet()-> setCellValue('BI'.$fila,date("d/m/Y", strtotime($row['fechaRabD3'])));
            $spreadsheet->getActiveSheet()-> setCellValue('BJ'.$fila,date("d/m/Y", strtotime($row['fechaRabR1'])));                        
            $spreadsheet->getActiveSheet()-> setCellValue('BK'.$fila,date("d/m/Y", strtotime($row['fechaTifoR1'])));   
            $spreadsheet->getActiveSheet()-> setCellValue('BL'.$fila,date("d/m/Y", strtotime($row['fechaTifoR2'])));   
            $spreadsheet->getActiveSheet()-> setCellValue('BM'.$fila,date("d/m/Y", strtotime($row['fechaNeumR1'])));   
            $spreadsheet->getActiveSheet()-> setCellValue('BN'.$fila,date("d/m/Y", strtotime($row['fechaNeumR2'])));   
            $spreadsheet->getActiveSheet()-> setCellValue('BO'.$fila,date("d/m/Y", strtotime($row['fechaCovidD1'])));   
            $spreadsheet->getActiveSheet()-> setCellValue('BP'.$fila,date("d/m/Y", strtotime($row['fechaCovidD2'])));   
            $spreadsheet->getActiveSheet()-> setCellValue('BQ'.$fila,date("d/m/Y", strtotime($row['fechaCovidD3'])));
            $spreadsheet->getActiveSheet()-> setCellValue('BR'.$fila,date("d/m/Y", strtotime($row['fechaCovidD4'])));
        }


    }

    $writer = new Xlsx($spreadsheet); 
    $writer->save('Formato 006.xlsx');

    return 'Formato 006.xlsx';

    function formato($pdo,$ccostos){//){
        try {
            $r = 0;
            $fila = 8;
            $respuesta = false;
            $lista = [];
            $sql = "SELECT empleadonomb,fecnac,dni,edad,ccostos,cargo,correo,telefono,grupoSangre,alergias,fecha,nomb_clinica,aptitud,peso,talla,imc,estadoNutricional,enviado,
                    programadopre,f_per1,f_cln1,f_act1,f_pes1,f_tal1,f_imc1,f_est1,f_env1,programado1,f_per2,f_cln2,f_act2,f_pes2,f_tal2,f_imc2,f_est2,f_env2,programado2,
                    f_retiro,clinica,observaciones,f_envr,fechaFbrAmarilla,fechaDifTD1,fechaDifTD2,fechaDifTD3,fechaDifTR1,fechaHepAD1,fechaHepAD2,fechaHepAR1,fechaHepBD1,
                    fechaHepBD2,fechaHepBD3,fechaInflR1,fechaInflR2,fechaPolioD1,fechaTrivD1,fechaRabD1,fechaRabD2,fechaRabD3,fechaRabR1,fechaTifoR1,
                    fechaTifoR2,fechaNeumR1,fechaNeumR2,fechaCovidD1,fechaCovidD2,fechaCovidD3,fechaCovidD4 FROM vista_formato_006 WHERE ccostos='0200%' GROUP BY dni";
             
            $statement = $pdo->prepare($sql);
            $statement ->execute();
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();

            if ($rowCount > 0) {
                foreach($result as $row) {
                    $respuesta= array(
                        "respuesta" => true,
                        "empleadonomb"=>$row['empleadonomb'],
                        "dni"=>$row['dni'],
                        "fechaDifTD3"=>$row['fechaDifTD3'],
                    );
                }
   /*         if ($rowCount > 0) {
                foreach($result as $row) {
                    $cc =explode(" ",$row['ccostos']);
                    switch($cc[0]){
                        case "0200":
                            $centro = "ADMINISTRACION DE OFICINA";
                            break;
                        case "2800":
                            $centro = "MALVINAS";
                            break;
                        default:
                            $centro = "OTROS";
                            break;
                    }

                    $r++;
                    $fila++;
                       */

                        
                
            }else{
                $respuesta = array("respuesta"=>$respuesta);    
            }

            return $respuesta;
        } catch(PDOException $th) {
            echo $th->getMessage();
            return false;
        }
    }
?>