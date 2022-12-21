<?php
    session_start();//sin esto no jala el $_Session, recuerda eso
    require_once("connectmedica.inc.php");
    require_once('../vendor/autoload.php');

    if(isset($_POST['funcion'])){
        if($_POST['funcion']=="formatosTablas"){
            echo json_encode(formatosTablas($pdo,$_POST['ccostos']));
        }
        else if($_POST['funcion']=="formato_006"){
            echo json_encode(formato_006($pdo));
        }
        else if($_POST['funcion']=="formato_001"){
            echo json_encode(formato_001($pdo));
        }
    }

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
  /*  if(file_exists("../formatos/Formato 006.xlsx")){
        unlink("../formatos/Formato 006.xlsx");
    }*/


function formato_006($pdo){
    try {
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
            $r = 0;
            $fila = 8;
            $c = formato($pdo,$centrosAdm[$i]);
            $nc = count($c);
    
            for($j=0;$j<$nc;$j++){
    
                $spreadsheet->getActiveSheet()-> setCellValue('A'.$fila,$r);
                $spreadsheet->getActiveSheet()-> setCellValue('B'.$fila,utf8_decode($c[$j]['empleadonomb']));
                $spreadsheet->getActiveSheet()-> setCellValue('C'.$fila,date("d/m/Y", strtotime($c[$j]['fecnac'])));
                $spreadsheet->getActiveSheet()-> setCellValue('D'.$fila,$c[$j]['dni']);
                $spreadsheet->getActiveSheet()-> setCellValue('E'.$fila,$c[$j]['edad']);
                $spreadsheet->getActiveSheet()-> setCellValue('F'.$fila,utf8_decode($c[$j]['ccostos']));//ver luego
                $spreadsheet->getActiveSheet()-> setCellValue('G'.$fila,utf8_decode($c[$j]['cargo']));
                $spreadsheet->getActiveSheet()-> setCellValue('H'.$fila,utf8_decode("SEPCON"));
                $spreadsheet->getActiveSheet()-> setCellValue('I'.$fila,utf8_decode($c[$j]['correo']));
                $spreadsheet->getActiveSheet()-> setCellValue('J'.$fila,utf8_decode($c[$j]['telefono']));
                $spreadsheet->getActiveSheet()-> setCellValue('K'.$fila,utf8_decode($c[$j]['grupoSangre']));
                $spreadsheet->getActiveSheet()-> setCellValue('L'.$fila,utf8_decode($c[$j]['alergias']));
                $spreadsheet->getActiveSheet()-> setCellValue('M'.$fila,date("d/m/Y", strtotime($c[$j]['fecha'])));
                $spreadsheet->getActiveSheet()-> setCellValue('N'.$fila,utf8_decode($c[$j]['nomb_clinica']));
                $spreadsheet->getActiveSheet()-> setCellValue('O'.$fila,utf8_decode($c[$j]['aptitud']));
                $spreadsheet->getActiveSheet()-> setCellValue('P'.$fila,$c[$j]['peso']);
                $spreadsheet->getActiveSheet()-> setCellValue('Q'.$fila,$c[$j]['talla']);
                $spreadsheet->getActiveSheet()-> setCellValue('R'.$fila,$c[$j]['imc']);
                $spreadsheet->getActiveSheet()-> setCellValue('S'.$fila,utf8_decode($c[$j]['estadoNutricional']));
                $spreadsheet->getActiveSheet()-> setCellValue('T'.$fila,$c[$j]['enviado']);
                $spreadsheet->getActiveSheet()-> setCellValue('U'.$fila,date("d/m/Y", strtotime($c[$j]['programadopre'])));
                $spreadsheet->getActiveSheet()-> setCellValue('V'.$fila,date("d/m/Y", strtotime($c[$j]['f_per1'])));
                $spreadsheet->getActiveSheet()-> setCellValue('W'.$fila,utf8_decode($c[$j]['f_cln1'])); 
                $spreadsheet->getActiveSheet()-> setCellValue('X'.$fila,utf8_decode($c[$j]['f_act1']));
                $spreadsheet->getActiveSheet()-> setCellValue('Y'.$fila,$c[$j]['f_pes1']);
                $spreadsheet->getActiveSheet()-> setCellValue('Z'.$fila,$c[$j]['f_tal1']);
                $spreadsheet->getActiveSheet()-> setCellValue('AA'.$fila,$c[$j]['f_imc1']);
                $spreadsheet->getActiveSheet()-> setCellValue('AB'.$fila,utf8_decode($c[$j]['f_est1'])); 
                $spreadsheet->getActiveSheet()-> setCellValue('AC'.$fila,$c[$j]['f_env1']); 
                $spreadsheet->getActiveSheet()-> setCellValue('AD'.$fila,date("d/m/Y", strtotime($c[$j]['programado1'])));
                $spreadsheet->getActiveSheet()-> setCellValue('AE'.$fila,date("d/m/Y", strtotime($c[$j]['f_per2'])));
                $spreadsheet->getActiveSheet()-> setCellValue('AF'.$fila,utf8_decode($c[$j]['f_cln2'])); 
                $spreadsheet->getActiveSheet()-> setCellValue('AG'.$fila,utf8_decode($c[$j]['f_act2'])); 
                $spreadsheet->getActiveSheet()-> setCellValue('AH'.$fila,$c[$j]['f_pes2']); 
                $spreadsheet->getActiveSheet()-> setCellValue('AI'.$fila,$c[$j]['f_tal2']); 
                $spreadsheet->getActiveSheet()-> setCellValue('AJ'.$fila,$c[$j]['f_imc2']); 
                $spreadsheet->getActiveSheet()-> setCellValue('AK'.$fila,utf8_decode($c[$j]['f_est2'])); 
                $spreadsheet->getActiveSheet()-> setCellValue('AL'.$fila,$c[$j]['f_env2']);
                $spreadsheet->getActiveSheet()-> setCellValue('AM'.$fila,date("d/m/Y", strtotime($c[$j]['programado2'])));//a partir de por aqui iria el switch case U:
                $spreadsheet->getActiveSheet()-> setCellValue('AN'.$fila,date("d/m/Y", strtotime($c[$j]['f_retiro'])));
                $spreadsheet->getActiveSheet()-> setCellValue('AO'.$fila,utf8_decode($c[$j]['clinica'])); 
                $spreadsheet->getActiveSheet()-> setCellValue('AP'.$fila,utf8_decode($c[$j]['observaciones'])); 
                $spreadsheet->getActiveSheet()-> setCellValue('AQ'.$fila,$c[$j]['f_envr']);
                $spreadsheet->getActiveSheet()-> setCellValue('AR'.$fila,date("d/m/Y", strtotime($c[$j]['fechaFbrAmarilla'])));
                $spreadsheet->getActiveSheet()-> setCellValue('AS'.$fila,date("d/m/Y", strtotime($c[$j]['fechaDifTD1'])));
                $spreadsheet->getActiveSheet()-> setCellValue('AT'.$fila,date("d/m/Y", strtotime($c[$j]['fechaDifTD2'])));
                $spreadsheet->getActiveSheet()-> setCellValue('AU'.$fila,date("d/m/Y", strtotime($c[$j]['fechaDifTD3'])));
                $spreadsheet->getActiveSheet()-> setCellValue('AV'.$fila,date("d/m/Y", strtotime($c[$j]['fechaDifTR1'])));                        
                $spreadsheet->getActiveSheet()-> setCellValue('AW'.$fila,date("d/m/Y", strtotime($c[$j]['fechaHepAD1'])));   
                $spreadsheet->getActiveSheet()-> setCellValue('AX'.$fila,date("d/m/Y", strtotime($c[$j]['fechaHepAD2'])));   
                $spreadsheet->getActiveSheet()-> setCellValue('AY'.$fila,date("d/m/Y", strtotime($c[$j]['fechaHepAR1'])));   
                $spreadsheet->getActiveSheet()-> setCellValue('AZ'.$fila,date("d/m/Y", strtotime($c[$j]['fechaHepBD1'])));   
                $spreadsheet->getActiveSheet()-> setCellValue('BA'.$fila,date("d/m/Y", strtotime($c[$j]['fechaHepBD2'])));   
                $spreadsheet->getActiveSheet()-> setCellValue('BB'.$fila,date("d/m/Y", strtotime($c[$j]['fechaHepBD3'])));   
                $spreadsheet->getActiveSheet()-> setCellValue('BC'.$fila,date("d/m/Y", strtotime($c[$j]['fechaInflR1'])));   
                $spreadsheet->getActiveSheet()-> setCellValue('BD'.$fila,date("d/m/Y", strtotime($c[$j]['fechaInflR2'])));   
                $spreadsheet->getActiveSheet()-> setCellValue('BE'.$fila,date("d/m/Y", strtotime($c[$j]['fechaPolioD1'])));   
                $spreadsheet->getActiveSheet()-> setCellValue('BF'.$fila,date("d/m/Y", strtotime($c[$j]['fechaTrivD1'])));
                $spreadsheet->getActiveSheet()-> setCellValue('BG'.$fila,date("d/m/Y", strtotime($c[$j]['fechaRabD1'])));
                $spreadsheet->getActiveSheet()-> setCellValue('BH'.$fila,date("d/m/Y", strtotime($c[$j]['fechaRabD2'])));
                $spreadsheet->getActiveSheet()-> setCellValue('BI'.$fila,date("d/m/Y", strtotime($c[$j]['fechaRabD3'])));
                $spreadsheet->getActiveSheet()-> setCellValue('BJ'.$fila,date("d/m/Y", strtotime($c[$j]['fechaRabR1'])));                        
                $spreadsheet->getActiveSheet()-> setCellValue('BK'.$fila,date("d/m/Y", strtotime($c[$j]['fechaTifoR1'])));   
                $spreadsheet->getActiveSheet()-> setCellValue('BL'.$fila,date("d/m/Y", strtotime($c[$j]['fechaTifoR2'])));   
                $spreadsheet->getActiveSheet()-> setCellValue('BM'.$fila,date("d/m/Y", strtotime($c[$j]['fechaNeumR1'])));   
                $spreadsheet->getActiveSheet()-> setCellValue('BN'.$fila,date("d/m/Y", strtotime($c[$j]['fechaNeumR2'])));   
                $spreadsheet->getActiveSheet()-> setCellValue('BO'.$fila,date("d/m/Y", strtotime($c[$j]['fechaCovidD1'])));   
                $spreadsheet->getActiveSheet()-> setCellValue('BP'.$fila,date("d/m/Y", strtotime($c[$j]['fechaCovidD2'])));   
                $spreadsheet->getActiveSheet()-> setCellValue('BQ'.$fila,date("d/m/Y", strtotime($c[$j]['fechaCovidD3'])));
                $spreadsheet->getActiveSheet()-> setCellValue('BR'.$fila,date("d/m/Y", strtotime($c[$j]['fechaCovidD4'])));
    
                $fila++;
                $r++;
            }
        }
    
        $writer = new Xlsx($spreadsheet); 
        $writer->save('Formato 006.xlsx');
    
        return 'Formato 006.xlsx';

        } catch(PDOException $th) {
            echo $th->getMessage();
            return false;
        }
    }
    
    function formato_001($pdo){
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0);
        $spreadsheet->getActiveSheet()->setTitle("ACTIVOS LIMA");
        
        $spreadsheet->createSheet();
        $spreadsheet->setActiveSheetIndex(1);
        $spreadsheet->getActiveSheet()->setTitle("ACTIVOS LURIN");
    
        $spreadsheet->createSheet();
        $spreadsheet->setActiveSheetIndex(2);
        $spreadsheet->getActiveSheet()->setTitle("ACTIVOS PUCALLPA");

        for($k=0;$k<=2;$k++){
            $spreadsheet->setActiveSheetIndex($k);
            $spreadsheet->getActiveSheet()->setCellValue("A5","N°");
            $spreadsheet->getActiveSheet()->setCellValue("B5","AÑO");
            $spreadsheet->getActiveSheet()->setCellValue("C5","N° HC");
            $spreadsheet->getActiveSheet()->setCellValue("D5","DNI");
            $spreadsheet->getActiveSheet()->setCellValue("E5","APELLIDOS Y NOMBRES");
            $spreadsheet->getActiveSheet()->setCellValue("F5","EDAD");
            $spreadsheet->getActiveSheet()->setCellValue("G5","SEXO");
            $spreadsheet->getActiveSheet()->setCellValue("H5","PUESTO DE TRABAJO");
            $spreadsheet->getActiveSheet()->setCellValue("I5","AREA");
            $spreadsheet->getActiveSheet()->setCellValue("J5","EMPRESA");
            $spreadsheet->getActiveSheet()->setCellValue("K5","CENTRO DE COSTO");
            $spreadsheet->getActiveSheet()->setCellValue("L5","PROYECTO");
            $spreadsheet->getActiveSheet()->setCellValue("M5","FECHA EMO");
            $spreadsheet->getActiveSheet()->setCellValue("N5","TIPO EXAMEN");
            $spreadsheet->getActiveSheet()->setCellValue("O5","CLINICA");
            $spreadsheet->getActiveSheet()->setCellValue("P5","APTITUD");
            $spreadsheet->getActiveSheet()->setCellValue("Q5","N° PASE MEDICO");
            $spreadsheet->getActiveSheet()->setCellValue("R5","PROGRAMADO");
            $spreadsheet->getActiveSheet()->setCellValue("S5","ANTEC. RIESG. OCUPAC.");
            $spreadsheet->getActiveSheet()->setCellValue("T5","ANTEC. PAT. PERS.");
            $spreadsheet->getActiveSheet()->setCellValue("U5","ALERGIAS");
            $spreadsheet->getActiveSheet()->setCellValue("V5","GRUPO SANGUINEO");
            $spreadsheet->getActiveSheet()->setCellValue("W5","PRESION ARTERIAL");
            $spreadsheet->getActiveSheet()->setCellValue("X5","PESO (kg)");
            $spreadsheet->getActiveSheet()->setCellValue("Y5","TALLA (mts)");
            $spreadsheet->getActiveSheet()->setCellValue("Z5","IMC");
            $spreadsheet->getActiveSheet()->setCellValue("AA5","ESTADO NUTRICIONAL");
            $spreadsheet->getActiveSheet()->setCellValue("AB5","ESPIROMETRIA");
            $spreadsheet->getActiveSheet()->setCellValue("AC5","EX. RAYOS X TORAX");
            $spreadsheet->getActiveSheet()->setCellValue("AD5","EV. OFTALMOLOGICA");
            $spreadsheet->getActiveSheet()->setCellValue("AE5","OTOSCOPIA");
            $spreadsheet->getActiveSheet()->setCellValue("AF5","EX. AUDIOMETRICO");
            $spreadsheet->getActiveSheet()->setCellValue("AG5","EV. OSTEOMUSCULAR");
            $spreadsheet->getActiveSheet()->setCellValue("AH5","EX. ODONTOLOGICO");
            $spreadsheet->getActiveSheet()->setCellValue("AI5","EKG");
            $spreadsheet->getActiveSheet()->setCellValue("AJ5","PRUEBA DE ESFUERZO");
            $spreadsheet->getActiveSheet()->setCellValue("AK5","RIESGO CORONARIO");
            $spreadsheet->getActiveSheet()->setCellValue("AL5","EX. PSICOLOGICO");
            $spreadsheet->getActiveSheet()->setCellValue("AM5","EX. DE ALTURA");
            $spreadsheet->getActiveSheet()->setCellValue("AN5","EX. ESPACIO CONF.");
            $spreadsheet->getActiveSheet()->setCellValue("AO5","EX. PSICOSENSOM.");
            $spreadsheet->getActiveSheet()->setCellValue("AP5","HBG/dl");
            $spreadsheet->getActiveSheet()->setCellValue("AQ5","HTO%");
            $spreadsheet->getActiveSheet()->setCellValue("AR5","EX. GOTA GRUESA");
            $spreadsheet->getActiveSheet()->setCellValue("AS5","LEUCOCITOS");
            $spreadsheet->getActiveSheet()->setCellValue("AT5","PLAQUETAS");
            $spreadsheet->getActiveSheet()->setCellValue("AU5","COLESTEROL mg/dl");
            $spreadsheet->getActiveSheet()->setCellValue("AV5","HDL mg/dl");
            $spreadsheet->getActiveSheet()->setCellValue("AW5","LDL mg/dl");
            $spreadsheet->getActiveSheet()->setCellValue("AX5","TRIGLIC. mg/dl");
            $spreadsheet->getActiveSheet()->setCellValue("AY5","TGP U/L");
            $spreadsheet->getActiveSheet()->setCellValue("AZ5","TGO U/L");
            $spreadsheet->getActiveSheet()->setCellValue("BA5","GLUCOSA mg/dl");
            $spreadsheet->getActiveSheet()->setCellValue("BB5","UREA mg/dl");
            $spreadsheet->getActiveSheet()->setCellValue("BC5","AC. URICO mg/dl");
            $spreadsheet->getActiveSheet()->setCellValue("BD5","CREATININA mg/dl");
            $spreadsheet->getActiveSheet()->setCellValue("BE5","VDRL");
            $spreadsheet->getActiveSheet()->setCellValue("BF5","RPD");
            $spreadsheet->getActiveSheet()->setCellValue("BG5","TOXISCREEN");
            $spreadsheet->getActiveSheet()->setCellValue("BH5","ANTIG. DE SUP. HEPB");
            $spreadsheet->getActiveSheet()->setCellValue("BI5","PARASIT. SERIADO");
            $spreadsheet->getActiveSheet()->setCellValue("BJ5","HISOPADO NASOFAR.");
            $spreadsheet->getActiveSheet()->setCellValue("BK5","EX. DE ORINA");
            $spreadsheet->getActiveSheet()->setCellValue("BL5","DIAGNOSTICO 1");
            $spreadsheet->getActiveSheet()->setCellValue("BM5","CIE-10");
            $spreadsheet->getActiveSheet()->setCellValue("BN5","DIAGNOSTICO 2");
            $spreadsheet->getActiveSheet()->setCellValue("BO5","CIE-10");
            $spreadsheet->getActiveSheet()->setCellValue("BP5","DIAGNOSTICO 3");
            $spreadsheet->getActiveSheet()->setCellValue("BQ5","CIE-10");
            $spreadsheet->getActiveSheet()->setCellValue("BR5","DIAGNOSTICO 4");
            $spreadsheet->getActiveSheet()->setCellValue("BS5","CIE-10");
            $spreadsheet->getActiveSheet()->setCellValue("BT5","DIAGNOSTICO 5");
            $spreadsheet->getActiveSheet()->setCellValue("BU5","CIE-10");
            $spreadsheet->getActiveSheet()->setCellValue("BV5","DIAGNOSTICO 6");
            $spreadsheet->getActiveSheet()->setCellValue("BW5","CIE-10");
            $spreadsheet->getActiveSheet()->setCellValue("BX5","RECOMENDACIONES A ENF. OCUPACIONALES");
            $spreadsheet->getActiveSheet()->setCellValue("BY5","RECOMENDACIONES A ENF. COMUNES");
            $spreadsheet->getActiveSheet()->setCellValue("BZ5","TRAT. MEDICO ACTUAL");
            $spreadsheet->getActiveSheet()->setCellValue("CA5","INGRESA A PROGRAMA 1");
            $spreadsheet->getActiveSheet()->setCellValue("CB5","INGRESA A PROGRAMA 2");
            $spreadsheet->getActiveSheet()->setCellValue("CC5","INGRESA A PROGRAMA 3");
            $spreadsheet->getActiveSheet()->setCellValue("CD5","INGRESA A PROGRAMA 4");
            $spreadsheet->getActiveSheet()->setCellValue("CE5","INGRESA A PROGRAMA 5");
            $spreadsheet->getActiveSheet()->setCellValue("CF5","INGRESA A PROGRAMA 6");
            $spreadsheet->getActiveSheet()->setCellValue("CG5","FIEBRE AMARILLA");
            $spreadsheet->getActiveSheet()->setCellValue("CG6","1RA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("CH5","DIFTERIA TETANO");
            $spreadsheet->getActiveSheet()->setCellValue("CH6","1RA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("CI6","2DA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("CJ6","3RA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("CK6","REFUERZO");
            $spreadsheet->getActiveSheet()->setCellValue("CL5","HEPATITIS A");
            $spreadsheet->getActiveSheet()->setCellValue("CL6","1RA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("CM6","2DA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("CN6","REFUERZO");
            $spreadsheet->getActiveSheet()->setCellValue("CO5","HEPATITIS B");
            $spreadsheet->getActiveSheet()->setCellValue("CO6","1RA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("CP6","2DA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("CQ6","3RA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("CR5","INFLUENZA");
            $spreadsheet->getActiveSheet()->setCellValue("CR6","1RA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("CS6","REFUERZO");
            $spreadsheet->getActiveSheet()->setCellValue("CT5","POLIOMELITIS");
            $spreadsheet->getActiveSheet()->setCellValue("CT6","1RA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("CU5","TRIVIRICA");
            $spreadsheet->getActiveSheet()->setCellValue("CU6","1RA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("CV5","RABIA");
            $spreadsheet->getActiveSheet()->setCellValue("CV6","1RA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("CW6","2DA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("CX6","3RA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("CY6","REFUERZO");
            $spreadsheet->getActiveSheet()->setCellValue("CZ5","TIFOIDEA");
            $spreadsheet->getActiveSheet()->setCellValue("CZ6","1RA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("DA6","REFUERZO");
            $spreadsheet->getActiveSheet()->setCellValue("DB5","NEUMOCOCO");
            $spreadsheet->getActiveSheet()->setCellValue("DB6","1RA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("DC6","REFUERZO");
            $spreadsheet->getActiveSheet()->setCellValue("DD5","COVID");
            $spreadsheet->getActiveSheet()->setCellValue("DD6","1RA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("DE6","2DA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("DF6","3RA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("DG6","4TA DOSIS");
            $spreadsheet->getActiveSheet()->setCellValue("DH5","OBSERVACIONES");

            $spreadsheet->getActiveSheet()->mergeCells("A5:A7");
            $spreadsheet->getActiveSheet()->mergeCells("B5:B7");
            $spreadsheet->getActiveSheet()->mergeCells("C5:C7");
            $spreadsheet->getActiveSheet()->mergeCells("D5:D7");
            $spreadsheet->getActiveSheet()->mergeCells("E5:E7"); 
            $spreadsheet->getActiveSheet()->mergeCells("F5:F7");
            $spreadsheet->getActiveSheet()->mergeCells("G5:G7");
            $spreadsheet->getActiveSheet()->mergeCells("H5:H7");
            $spreadsheet->getActiveSheet()->mergeCells("I5:I7");
            $spreadsheet->getActiveSheet()->mergeCells("J5:J7");
            $spreadsheet->getActiveSheet()->mergeCells("K5:K7");
            $spreadsheet->getActiveSheet()->mergeCells("L5:L7");
            $spreadsheet->getActiveSheet()->mergeCells("M5:M7");
            $spreadsheet->getActiveSheet()->mergeCells("N5:N7");
            $spreadsheet->getActiveSheet()->mergeCells("O5:O7");
            $spreadsheet->getActiveSheet()->mergeCells("P5:P7");
            $spreadsheet->getActiveSheet()->mergeCells("Q5:Q7");
            $spreadsheet->getActiveSheet()->mergeCells("R5:R7");
            $spreadsheet->getActiveSheet()->mergeCells("S5:S7");
            $spreadsheet->getActiveSheet()->mergeCells("T5:T7");
            $spreadsheet->getActiveSheet()->mergeCells("U5:U7");
            $spreadsheet->getActiveSheet()->mergeCells("V5:V7");
            $spreadsheet->getActiveSheet()->mergeCells("W5:W7");
            $spreadsheet->getActiveSheet()->mergeCells("X5:X7");
            $spreadsheet->getActiveSheet()->mergeCells("Y5:Y7");
            $spreadsheet->getActiveSheet()->mergeCells("Z5:Z7");
            $spreadsheet->getActiveSheet()->mergeCells("AA5:AA7");
            $spreadsheet->getActiveSheet()->mergeCells("AB5:AB7");
            $spreadsheet->getActiveSheet()->mergeCells("AC5:AC7");
            $spreadsheet->getActiveSheet()->mergeCells("AD5:AD7");
            $spreadsheet->getActiveSheet()->mergeCells("AE5:AE7"); 
            $spreadsheet->getActiveSheet()->mergeCells("AF5:AF7");
            $spreadsheet->getActiveSheet()->mergeCells("AG5:AG7");
            $spreadsheet->getActiveSheet()->mergeCells("AH5:AH7");
            $spreadsheet->getActiveSheet()->mergeCells("AI5:AI7");
            $spreadsheet->getActiveSheet()->mergeCells("AJ5:AJ7");
            $spreadsheet->getActiveSheet()->mergeCells("AK5:AK7");
            $spreadsheet->getActiveSheet()->mergeCells("AL5:AL7");
            $spreadsheet->getActiveSheet()->mergeCells("AM5:AM7");
            $spreadsheet->getActiveSheet()->mergeCells("AN5:AN7");
            $spreadsheet->getActiveSheet()->mergeCells("AO5:AO7");
            $spreadsheet->getActiveSheet()->mergeCells("AP5:AP7");
            $spreadsheet->getActiveSheet()->mergeCells("AQ5:AQ7");
            $spreadsheet->getActiveSheet()->mergeCells("AR5:AR7");
            $spreadsheet->getActiveSheet()->mergeCells("AS5:AS7");
            $spreadsheet->getActiveSheet()->mergeCells("AT5:AT7");
            $spreadsheet->getActiveSheet()->mergeCells("AU5:AU7");
            $spreadsheet->getActiveSheet()->mergeCells("AV5:AV7");
            $spreadsheet->getActiveSheet()->mergeCells("AW5:AW7");
            $spreadsheet->getActiveSheet()->mergeCells("AX5:AX7");
            $spreadsheet->getActiveSheet()->mergeCells("AY5:AY7");
            $spreadsheet->getActiveSheet()->mergeCells("AZ5:AZ7");
            $spreadsheet->getActiveSheet()->mergeCells("BA5:BA7");
            $spreadsheet->getActiveSheet()->mergeCells("BB5:BB7");
            $spreadsheet->getActiveSheet()->mergeCells("BC5:BC7");
            $spreadsheet->getActiveSheet()->mergeCells("BD5:BD7");
            $spreadsheet->getActiveSheet()->mergeCells("BE5:BE7"); 
            $spreadsheet->getActiveSheet()->mergeCells("BF5:BF7");
            $spreadsheet->getActiveSheet()->mergeCells("BG5:BG7");
            $spreadsheet->getActiveSheet()->mergeCells("BH5:BH7");
            $spreadsheet->getActiveSheet()->mergeCells("BI5:BI7");
            $spreadsheet->getActiveSheet()->mergeCells("BJ5:BJ7");
            $spreadsheet->getActiveSheet()->mergeCells("BK5:BK7");
            $spreadsheet->getActiveSheet()->mergeCells("BL5:BL7");
            $spreadsheet->getActiveSheet()->mergeCells("BM5:BM7");
            $spreadsheet->getActiveSheet()->mergeCells("BN5:BN7");
            $spreadsheet->getActiveSheet()->mergeCells("BO5:BO7");
            $spreadsheet->getActiveSheet()->mergeCells("BP5:BP7");
            $spreadsheet->getActiveSheet()->mergeCells("BQ5:BQ7");
            $spreadsheet->getActiveSheet()->mergeCells("BR5:BR7");
            $spreadsheet->getActiveSheet()->mergeCells("BS5:BS7");
            $spreadsheet->getActiveSheet()->mergeCells("BT5:BT7");
            $spreadsheet->getActiveSheet()->mergeCells("BU5:BU7");
            $spreadsheet->getActiveSheet()->mergeCells("BV5:BV7");
            $spreadsheet->getActiveSheet()->mergeCells("BW5:BW7");
            $spreadsheet->getActiveSheet()->mergeCells("BX5:BX7");
            $spreadsheet->getActiveSheet()->mergeCells("BY5:BY7");
            $spreadsheet->getActiveSheet()->mergeCells("BZ5:BZ7");
            $spreadsheet->getActiveSheet()->mergeCells("CA5:CA7");
            $spreadsheet->getActiveSheet()->mergeCells("CB5:CB7");
            $spreadsheet->getActiveSheet()->mergeCells("CC5:CC7");
            $spreadsheet->getActiveSheet()->mergeCells("CD5:CD7");
            $spreadsheet->getActiveSheet()->mergeCells("CE5:CE7"); 
            $spreadsheet->getActiveSheet()->mergeCells("CF5:CF7");
            $spreadsheet->getActiveSheet()->mergeCells("CG6:CG7");
            $spreadsheet->getActiveSheet()->mergeCells("CH6:CH7");
            $spreadsheet->getActiveSheet()->mergeCells("CI6:CI7");
            $spreadsheet->getActiveSheet()->mergeCells("CJ6:CJ7");
            $spreadsheet->getActiveSheet()->mergeCells("CK6:CK7");
            $spreadsheet->getActiveSheet()->mergeCells("CL6:CL7");
            $spreadsheet->getActiveSheet()->mergeCells("CM6:CM7");
            $spreadsheet->getActiveSheet()->mergeCells("CN6:CN7");
            $spreadsheet->getActiveSheet()->mergeCells("CO6:CO7");
            $spreadsheet->getActiveSheet()->mergeCells("CP6:CP7");
            $spreadsheet->getActiveSheet()->mergeCells("CQ6:CQ7");
            $spreadsheet->getActiveSheet()->mergeCells("CR6:CR7");
            $spreadsheet->getActiveSheet()->mergeCells("CS6:CS7");
            $spreadsheet->getActiveSheet()->mergeCells("CT6:CT7");
            $spreadsheet->getActiveSheet()->mergeCells("CU6:CU7");
            $spreadsheet->getActiveSheet()->mergeCells("CV6:CV7");
            $spreadsheet->getActiveSheet()->mergeCells("CW6:CW7");
            $spreadsheet->getActiveSheet()->mergeCells("CX6:CX7");
            $spreadsheet->getActiveSheet()->mergeCells("CY6:CY7");
            $spreadsheet->getActiveSheet()->mergeCells("CZ6:CZ7");
            $spreadsheet->getActiveSheet()->mergeCells("DA6:DA7");
            $spreadsheet->getActiveSheet()->mergeCells("DB6:DB7");
            $spreadsheet->getActiveSheet()->mergeCells("DC6:DC7");
            $spreadsheet->getActiveSheet()->mergeCells("DD6:DD7");
            $spreadsheet->getActiveSheet()->mergeCells("DE6:DE7"); 
            $spreadsheet->getActiveSheet()->mergeCells("DF6:DF7");
            $spreadsheet->getActiveSheet()->mergeCells("DG6:DG7");
            $spreadsheet->getActiveSheet()->mergeCells("DH5:DH7");

            $centrosAdm = ["0200","0300","0600"];
            $r = 0;
            $fila = 8;
            $c = formato($pdo,$centrosAdm[$k]);
            $nc = count($c);

            for($m=0;$m<=2;$m++){
                
            }
        }
        $writer = new Xlsx($spreadsheet); 
        $writer->save('Formato 001.xlsx');
    
        return 'Formato 001.xlsx';
    }

    function formato($pdo,$ccostos){//){
        try {
            $lista = [];
            $sql = "SELECT `fe`.`empleadonomb` AS `empleadonomb`,`fe`.`fecnac` AS `fecnac`,`fa`.`dni` AS `dni`,`fe`.`edad` AS `edad`,`fe`.`ccostos` AS `ccostos`,
                    `fe`.`cargo` AS `cargo`,`fe`.`correo` AS `correo`,`fe`.`telefono` AS `telefono`,`fa`.`grupoSangre` AS `grupoSangre`,`fa`.`alergias` AS `alergias`,
                    `fa`.`fecha` AS `fecha`,`lc`.`nomb_clinica` AS `nomb_clinica`,`fa`.`aptitud` AS `aptitud`,`fa`.`peso` AS `peso`,`fa`.`talla` AS `talla`,`fa`.`imc` AS `imc`,
                    `fa`.`estadoNutricional` AS `estadoNutricional`,`fa`.`enviado` AS `enviado`,`fa`.`fecha` + interval 1 year AS `programadopre`,`vrp1`.`fecha` AS `f_per1`,
                    `vrp1`.`clinica` AS `f_cln1`,`vrp1`.`aptitud` AS `f_act1`,`vrp1`.`peso` AS `f_pes1`,`vrp1`.`talla` AS `f_tal1`,`vrp1`.`imc` AS `f_imc1`,
                    `vrp1`.`estadoNutricional` AS `f_est1`,`vrp1`.`enviado` AS `f_env1`,`vrp1`.`fecha` + interval 1 year AS `programado1`,`vrp2`.`fecha` AS `f_per2`,
                    `vrp2`.`clinica` AS `f_cln2`,`vrp2`.`aptitud` AS `f_act2`,`vrp2`.`peso` AS `f_pes2`,`vrp2`.`talla` AS `f_tal2`,`vrp2`.`imc` AS `f_imc2`,`vrp2`.
                    `estadoNutricional` AS `f_est2`,`vrp1`.`enviado` AS `f_env2`,`vrp2`.`fecha` + interval 1 year AS `programado2`,MAX(`vrr`.`fecha`) AS `f_retiro`,
                    `vrr`.`clinica` AS `clinica`,`vrr`.`observaciones` AS `observaciones`,`vrr`.`enviado` AS `f_envr`,`vrr`.`centroCosto` AS `ccostos_r`,
                    `fv`.`fechaFbrAmarilla` AS `fechaFbrAmarilla`,`fv`.`fechaDifTD1` AS `fechaDifTD1`,`fv`.`fechaDifTD2` AS `fechaDifTD2`,`fv`.
                    `fechaDifTD3` AS `fechaDifTD3`,`fv`.`fechaDifTR1` AS `fechaDifTR1`,`fv`.`fechaHepAD1` AS `fechaHepAD1`,`fv`.`fechaHepAD2` AS `fechaHepAD2`,
                    `fv`.`fechaHepAR1` AS `fechaHepAR1`,`fv`.`fechaHepBD1` AS `fechaHepBD1`,`fv`.`fechaHepBD2` AS `fechaHepBD2`,`fv`.`fechaHepBD3` AS `fechaHepBD3`,
                    `fv`.`fechaInflR1` AS `fechaInflR1`,`fv`.`fechaInflR2` AS `fechaInflR2`,`fv`.`fechaPolioD1` AS `fechaPolioD1`,`fv`.`fechaTrivD1` AS `fechaTrivD1`,
                    `fv`.`fechaRabD1` AS `fechaRabD1`,`fv`.`fechaRabD2` AS `fechaRabD2`,`fv`.`fechaRabD3` AS `fechaRabD3`,`fv`.`fechaRabR1` AS `fechaRabR1`,
                    `fv`.`fechaTifoR1` AS `fechaTifoR1`,`fv`.`fechaTifoR2` AS `fechaTifoR2`,`fv`.`fechaNeumR1` AS `fechaNeumR1`,`fv`.`fechaNeumR2` AS `fechaNeumR2`,
                    `fv`.`fechaCovidD1` AS `fechaCovidD1`,`fv`.`fechaCovidD2` AS `fechaCovidD2`,`fv`.`fechaCovidD3` AS `fechaCovidD3`,`fv`.`fechaCovidD4` AS `fechaCovidD4` 
                    from ((((((`medica`.`fichas_api` `fa` 
                    left join `medica`.`fichas_empleados` `fe` on(`fa`.`dni` = `fe`.`dni`)) 
                    left join `medica`.`fichas_api` `vrp1` on(`vrp1`.`idreg` = `fa`.`idreg`)) 
                    left join `medica`.`fichas_api` `vrp2` on(`vrp2`.`idreg` = `fa`.`idreg`))
                    left join `medica`.`fichas_api` `vrr` on(`vrr`.`idreg` = `fa`.`idreg`)) 
                    left join `medica`.`fichas_vacunacion` `fv` on(`fv`.`dni` = `fa`.`dni`)) 
                    left join `medica`.`lista_clinicas` `lc` on(`lc`.`id` = `fa`.`clinica`)) 
                    where (`fa`.`tipoExa` like '%PREOCUPACIONAL' or `fa`.`tipoExa` like '%EMPO' OR `vrp1`.tipoExa LIKE '%PERIODICO' OR vrr.tipoExa LIKE '%RETIRO') AND ccostos LIKE '$ccostos%' GROUP BY dni;";             
            $statement = $pdo->prepare($sql);
            $statement ->execute();
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();

            if ($rowCount > 0) {
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
                    $lista[]= array(
                        "empleadonomb"=>$row['empleadonomb'],
                        "fecnac"=> date("d/m/Y", strtotime($row['fecnac'])),
                        "dni"=>$row['dni'],
                        "edad"=> $row['edad'],
                        "ccostos"=>$centro,
                        "cargo"=>$row['cargo'],
                        "empresa"=>"SEPCON",
                        "correo"=>$row['correo'],
                        "telefono"=>$row['telefono'],
                        "grupoSangre"=>$row['grupoSangre'],
                        "alergias"=>$row['alergias'],
                        "fecha"=>date("d/m/Y", strtotime($row['fecha'])),
                        "nomb_clinica"=>$row['nomb_clinica'],
                        "aptitud"=>$row['aptitud'],
                        "peso"=>$row['peso'],
                        "talla"=>$row['talla'],
                        "imc"=>$row['imc'],
                        "estadoNutricional"=>$row['estadoNutricional'],
                        "enviado"=>$row['enviado'],
                        "programadopre"=>date("d/m/Y", strtotime($row['programadopre'])),
                        "f_per1"=>date("d/m/Y", strtotime($row['f_per1'])),
                        "f_cln1"=>$row['f_cln1'],
                        "f_act1"=>$row['f_act1'],
                        "f_pes1"=>$row['f_pes1'],
                        "f_tal1"=>$row['f_tal1'],
                        "f_imc1"=>$row['f_imc1'],
                        "f_est1"=>$row['f_est1'], 
                        "f_env1"=>$row['f_env1'], 
                        "programado1"=>date("d/m/Y", strtotime($row['programado1'])),
                        "f_per2"      =>date("d/m/Y", strtotime($row['f_per2'])),
                        "f_cln2"=>$row['f_cln2'],
                        "f_act2"=>$row['f_act2'], 
                        "f_pes2"=>$row['f_pes2'], 
                        "f_tal2"=>$row['f_tal2'], 
                        "f_imc2"=>$row['f_imc2'], 
                        "f_est2"=>$row['f_est2'], 
                        "f_env2"=>$row['f_env2'],
                        "programado2"=>date("d/m/Y", strtotime($row['programado2'])),
                        "f_retiro"=>date("d/m/Y", strtotime($row['f_retiro'])),
                        "clinica"=>$row['clinica'],
                        "observaciones"=>$row['observaciones'],
                        "f_envr"=>$row['f_envr'],
                        "fechaFbrAmarilla"=>date("d/m/Y", strtotime($row['fechaFbrAmarilla'])),
                        "fechaDifTD1"=>date("d/m/Y", strtotime($row['fechaDifTD1'])),
                        "fechaDifTD2"=>date("d/m/Y", strtotime($row['fechaDifTD2'])),
                        "fechaDifTD3"=>date("d/m/Y", strtotime($row['fechaDifTD3'])),
                        "fechaDifTR1"=> date("d/m/Y", strtotime($row['fechaDifTR1'])),                        
                        "fechaHepAD1"=>date("d/m/Y", strtotime($row['fechaHepAD1'])),   
                        "fechaHepAD2"=>date("d/m/Y", strtotime($row['fechaHepAD2'])),   
                        "fechaHepAR1"=>date("d/m/Y", strtotime($row['fechaHepAR1'])),   
                        "fechaHepBD1"=>date("d/m/Y", strtotime($row['fechaHepBD1'])),   
                        "fechaHepBD2"=>date("d/m/Y", strtotime($row['fechaHepBD2'])),   
                        "fechaHepBD3"=>date("d/m/Y", strtotime($row['fechaHepBD3'])),   
                        "fechaInflR1"=>date("d/m/Y", strtotime($row['fechaInflR1'])),   
                        "fechaInflR2"=>date("d/m/Y", strtotime($row['fechaInflR2'])),   
                        "fechaPolioD1"=>date("d/m/Y", strtotime($row['fechaPolioD1'])),   
                        "fechaTrivD1"=>date("d/m/Y", strtotime($row['fechaTrivD1'])),
                        "fechaRabD1"=>date("d/m/Y", strtotime($row['fechaRabD1'])),
                        "fechaRabD2"=>date("d/m/Y", strtotime($row['fechaRabD2'])),
                        "fechaRabD3"=>date("d/m/Y", strtotime($row['fechaRabD3'])),
                        "fechaRabR1"=>date("d/m/Y", strtotime($row['fechaRabR1'])),                        
                        "fechaTifoR1"=>date("d/m/Y", strtotime($row['fechaTifoR1'])),   
                        "fechaTifoR2"=>date("d/m/Y", strtotime($row['fechaTifoR2'])),   
                        "fechaNeumR1"=>date("d/m/Y", strtotime($row['fechaNeumR1'])),   
                        "fechaNeumR2"=>date("d/m/Y", strtotime($row['fechaNeumR2'])),   
                        "fechaCovidD1"=>date("d/m/Y", strtotime($row['fechaCovidD1'])),   
                        "fechaCovidD2"=>date("d/m/Y", strtotime($row['fechaCovidD2'])),   
                        "fechaCovidD3"=>date("d/m/Y", strtotime($row['fechaCovidD3'])),
                        "fechaCovidD4"=>date("d/m/Y", strtotime($row['fechaCovidD4'])),
                    );
                }
            }
            return $lista;
    
        } catch(PDOException $th) {
            echo $th->getMessage();
            return false;
        }
    }

    function formato001($pdo,$ccostos){
        try{
            $lista = [];
            $sql ="SELECT fe.cut,fe.empleadonomb,fe.correo,fe.dni,fe.cargo,fe.ccostos,
                        fe.edad,fe.sede,fe.sexo,fe.fecnac,fe.estado,fe.direccion,fe.telefono,
                        fa.idreg,fa.acidoUrico,fa.aglutinaciones,fa.alergias,fa.anfetaminas,fa.antFamiliares,
                        fa.antece1,fa.antece2,fa.antece3,fa.antece4,fa.antece5,
                        fa.antece6,fa.aptitud,fa.atencion,fa.audiometria,fa.benceno,
                        fa.benzodiacepinas,fa.bilirrubina,fa.bk,fa.carboxihemo,fa.cardiologia,
                        fa.cea,fa.celulasEpiteliales,fa.centroCosto,fa.cervical,fa.cheFrca,
                        fa.cheFrre,fa.cilindros,fa.cirugias,fa.cocaina,fa.coccidias,
                        fa.cod1,fa.cod2,fa.cod3,fa.cod4,fa.cod5,
                        fa.cod6,fa.cod7,fa.cod8,fa.cod9,fa.cod10,
                        fa.codPaci,fa.codSexo,fa.colTotalHdl,fa.colesterol,fa.coprocultivo,
                        fa.creatinina,fa.cristales,fa.cuerposCetonicos,fa.dermatologia,fa.desAseg,
                        fa.diagno1,fa.diagno2,fa.diagno3,fa.diagno4,fa.diagno5,
                        fa.diagno7,fa.diagno6,fa.diagno8,fa.diagno9,fa.diagno10,
                        fa.eAspecto,fa.eColor,fa.eConsistencia,fa.eMucus,DATE_ADD(fa.fecha,INTERVAL 1 YEAR) AS sgtefecha,
                        fa.ecoAbdominal,fa.edad,fa.ekg,fa.empresa,fa.espirometria,
                        fa.estado,fa.estadoNutricional,fa.expoFactorRiesgo,fa.fecNaci,fa.fecPase,
                        fa.fecha,fa.filamentoMucoide,fa.fosfaAlca,fa.germenes,fa.ginecologia,
                        fa.glucosa,fa.gotaGruesa,fa.grasaCorporal,fa.grupoSangre,fa.habiAfisica,
                        fa.habiTabaco,fa.hcvHepatitisC,fa.hdl,fa.hematies,fa.hematiesHece,
                        fa.hematocrito,fa.hemoGlico,fa.hemoglobina,fa.hepatitisA,fa.hepatitisB,
                        fa.huevos,fa.imc,fa.inmunoglobulinaE,fa.ldl,fa.leucocitos,
                        fa.leucocitosOrina,fa.leucosistosPmn,fa.levaduraOri,fa.levadurasHece,fa.lumbar,
                        fa.mamografia,fa.marihuana,fa.metaAnfetamina,fa.morfina,fa.neurologia,
                        fa.nro,fa.nroRuc,fa.ocupacion,fa.odontograma,fa.oftalmologia,
                        fa.oriAspecto,fa.oriColor,fa.oriDensidad,fa.oriPh,fa.orinaAlbuminia,
                        fa.orinaAzucar,fa.osteo,fa.otorrino,fa.otoscopia,fa.pEsfuerzo,
                        fa.paciente,fa.pam,fa.papanicolau,fa.pase,fa.pase2,
                        fa.periAbdominal,fa.peso,fa.pigmentosBiliares,fa.piocitos,
                        fa.plaquetas,fa.plomo,fa.presion,fa.psa,fa.psicologia,
                        fa.puestoPostula,fa.quiste,fa.rayosx,fa.razonSocial,fa.reco1,
                        fa.reco2,fa.reco3,fa.reco4,fa.reco5,fa.reco6,
                        fa.reco7,fa.reco8,fa.reco9,fa.reco10,fa.restricciones,
                        fa.riesgoCoronario,fa.rpr,fa.talla,fa.tarifa,fa.tgo,
                        fa.tgp,fa.thevenon,fa.tipoExa,fa.tipoPase,fa.tipoPase2,
                        fa.tolueno,fa.tratamientoMedico,fa.traumatologia,fa.trichomonas,fa.trigliceridos,
                        fa.trofozoitos,fa.ureaSanguinea,fa.urobilinogeno,fa.vdrl,fa.vih,
                        fa.vldl,fa.xileno,fa.observaciones,fa.adjunto,fa.enviado,lc.nomb_clinica,
                        v.fechaFbrAmarilla,v.fechaDifTD1,v.fechaDifTD2,v.fechaDifTD3,v.fechaDifTR1,v.fechaHepAD1,
                        v.fechaHepAD2,v.fechaHepAR1,v.fechaHepBD1,v.fechaHepBD2,v.fechaHepBD3,v.fechaInflR1,
                        v.fechaInflR2,v.fechaPolioD1,v.fechaTrivD1,v.fechaRabD1,v.fechaRabD2,v.fechaRabD3,
                        v.fechaRabR1,v.fechaTifoR1,v.fechaTifoR2,v.fechaNeumR1,v.fechaNeumR2,v.fechaCovidD1,
                        v.fechaCovidD2,v.fechaCovidD3,v.fechaCovidD4
                    FROM fichas_api AS fa
                    LEFT JOIN fichas_empleados AS fe ON fa.dni=fe.dni
                    LEFT JOIN fichas_vacunacion AS v ON fa.dni=v.dni
                    LEFT JOIN lista_clinicas AS lc ON lc.id = fa.clinica
                    WHERE fa.idreg=? AND fe.dni=?";
            $statement = $pdo->prepare($sql);
            $statement ->execute();
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();

            if ($rowCount > 0) {
                foreach($result as $row) {
                    $lista[] = array("cut"=>$row['cut'],
                                    "dni"=>$row['dni'],
                                    "nombres"=>$row['empleadonomb'],
                                    "fecnac"=>$row['fecnac'],
                                    "correo"=>$row['correo'],
                                    "sexo"=>$row['sexo'],
                                    "cargo"=>$row['cargo'],
                                    "ccostos"=>$row['ccostos'],
                                    "sede"=>$row['sede'],
                                    "estado"=>$row['estado'],
                                    "direccion"=>$row['direccion'],
                                    "edad"=>$row['edad'],
                                    "telefono"=>$row['telefono'],
                                    "id"=>$row['idreg'],
                                    "acidoUrico"=>$row['acidoUrico'],
                                    "aglutinaciones"=>$row['aglutinaciones'],
                                    "alergias"=>$row['alergias'],
                                    "anfetaminas"=>$row['anfetaminas'],
                                    "antFamiliares"=>$row['antFamiliares'],
                                    "antece1"=>$row['antece1'],
                                    "antece2"=>$row['antece2'],
                                    "antece3"=>$row['antece3'],
                                    "antece4"=>$row['antece4'],
                                    "antece5"=>$row['antece5'],
                                    "antece6"=>$row['antece6'],
                                    "aptitud"=>$row['aptitud'],
                                    "atencion"=>$row['atencion'],
                                    "audiometria"=>$row['audiometria'],
                                    "benceno"=>$row['benceno'],
                                    "benzodiacepinas"=>$row['benzodiacepinas'],
                                    "bilirrubina"=>$row['bilirrubina'],
                                    "bk"=>$row['bk'],
                                    "carboxihemo"=>$row['carboxihemo'],
                                    "cardiologia"=>$row['cardiologia'],
                                    "cea"=>$row['cea'],
                                    "celulasEpiteliales"=>$row['celulasEpiteliales'],
                                    "ccostos"=>$row['centroCosto'],
                                    "cervical"=>$row['cervical'],
                                    "cheFrca"=>$row['cheFrca'],
                                    "cheFrre"=>$row['cheFrre'],
                                    "cilindros"=>$row['cilindros'],
                                    "cirugias"=>$row['cirugias'],
                                    "cocaina"=>$row['cocaina'],
                                    "coccidias"=>$row['coccidias'],
                                    "cod1"=>$row['cod1'],
                                    "cod2"=>$row['cod2'],
                                    "cod3"=>$row['cod3'],
                                    "cod4"=>$row['cod4'],
                                    "cod5"=>$row['cod5'],
                                    "cod6"=>$row['cod6'],
                                    "cod7"=>$row['cod7'],
                                    "cod8"=>$row['cod8'],
                                    "cod9"=>$row['cod9'],
                                    "cod10"=>$row['cod10'],
                                    "codPaci"=>$row['codPaci'],
                                    "codSexo"=>$row['codSexo'],
                                    "colTotalHdl"=>$row['colTotalHdl'],
                                    "colesterol"=>$row['colesterol'],
                                    "coprocultivo"=>$row['coprocultivo'],
                                    "creatinina"=>$row['creatinina'],
                                    "cristales"=>$row['cristales'],
                                    "cuerposCetonicos"=>$row['cuerposCetonicos'],
                                    "dermatologia"=>$row['dermatologia'],
                                    "desAseg"=>$row['desAseg'],
                                    "diagno1"=>$row['diagno1'],
                                    "diagno2"=>$row['diagno2'],
                                    "diagno3"=>$row['diagno3'],
                                    "diagno4"=>$row['diagno4'],
                                    "diagno5"=>$row['diagno5'],
                                    "diagno6"=>$row['diagno6'],
                                    "diagno7"=>$row['diagno7'],
                                    "diagno8"=>$row['diagno8'],
                                    "diagno9"=>$row['diagno9'],
                                    "diagno10"=>$row['diagno10'],
                                    "eAspecto"=>$row['eAspecto'],
                                    "eColor"=>$row['eColor'],
                                    "eConsistencia"=>$row['eConsistencia'],
                                    "eMucus"=>$row['eMucus'],
                                    "ecoAbdominal"=>$row['ecoAbdominal'],
                                    "edad"=>$row['edad'],
                                    "ekg"=>$row['ekg'],
                                    "empresa"=>$row['empresa'],
                                    "espirometria"=>$row['espirometria'],
                                    "estado"=>$row['estado'],
                                    "estadoNutricional"=>$row['estadoNutricional'],
                                    "expoFactorRiesgo"=>$row['expoFactorRiesgo'],
                                    "fecNaci"=>$row['fecNaci'],
                                    "fecPase"=>$row['fecPase'],
                                    "fecha"=>date("d/m/Y", strtotime($row['fecha'])),
                                    "sgtefecha"=>date("d/m/Y", strtotime($row['sgtefecha'])),
                                    "filamentoMucoide"=>$row['filamentoMucoide'],
                                    "fosfaAlca"=>$row['fosfaAlca'],
                                    "germenes"=>$row['germenes'],
                                    "ginecologia"=>$row['ginecologia'],
                                    "glucosa"=>$row['glucosa'],
                                    "gotaGruesa"=>$row['gotaGruesa'],
                                    "grasaCorporal"=>$row['grasaCorporal'],
                                    "sangre"=>$row['grupoSangre'],

                                    "habiAfisica"=>$row['habiAfisica'],
                                    "habiTabaco"=>$row['habiTabaco'],
                                    "hcvHepatitisC"=>$row['hcvHepatitisC'],
                                    "hdl"=>$row['hdl'],
                                    "hematiesHece"=>$row['hematiesHece'],
                                    "hematocrito"=>$row['hematocrito'],
                                    "hemoGlico"=>$row['hemoGlico'],
                                    "hemoglobina"=>$row['hemoglobina'],
                                    "hepatitisA"=>$row['hepatitisA'],
                                    "hepatitisB"=>$row['hepatitisB'],
                                    "huevos"=>$row['huevos'],
                                    "imc"=>$row['imc'],
                                    "inmunoglobulinaE"=>$row['inmunoglobulinaE'],
                                    "ldl"=>$row['ldl'],
                                    "leucocitos"=>$row['leucocitos'],
                                    "leucocitosOrina"=>$row['leucocitosOrina'],
                                    "leucosistosPmn"=>$row['leucosistosPmn'],
                                    "levaduraOri"=>$row['levaduraOri'],
                                    "levadurasHece"=>$row['levadurasHece'],
                                    "lumbar"=>$row['lumbar'],
                                    "mamografia"=>$row['mamografia'],
                                    "marihuana"=>$row['marihuana'],
                                    "metaAnfetamina"=>$row['metaAnfetamina'],
                                    "morfina"=>$row['morfina'],
                                    "neurologia"=>$row['neurologia'],
                                    "nro"=>$row['nro'],
                                    "nroRuc"=>$row['nroRuc'],
                                    "ocupacion"=>$row['ocupacion'],
                                    "odontograma"=>$row['odontograma'],
                                    "oftalmologia"=>$row['oftalmologia'],
                                    "oriAspecto"=>$row['oriAspecto'],
                                    "oriColor"=>$row['oriColor'],
                                    "oriDensidad"=>$row['oriDensidad'],
                                    "oriPh"=>$row['oriPh'],
                                    "orinaAlbuminia"=>$row['orinaAlbuminia'],
                                    "orinaAzucar"=>$row['orinaAzucar'],
                                    "osteo"=>$row['osteo'],
                                    "otorrino"=>$row['otorrino'],
                                    "otoscopia"=>$row['otoscopia'],
                                    "pEsfuerzo"=>$row['pEsfuerzo'],
                                    "paciente"=>$row['paciente'],

                                    "pam"=>$row['pam'],
                                    "papanicolau"=>$row['papanicolau'],
                                    "pase"=>$row['pase'],
                                    "pase2"=>$row['pase2'],
                                    "periAbdominal"=>$row['periAbdominal'],
                                    "peso"=>$row['peso'],
                                    "pigmentosBiliares"=>$row['pigmentosBiliares'],
                                    "piocitos"=>$row['piocitos'],
                                    "plaquetas"=>$row['plaquetas'],
                                    "plomo"=>$row['plomo'],
                                    "presion"=>$row['presion'],
                                    "psa"=>$row['psa'],
                                    "psicologia"=>$row['psicologia'],
                                    "puestoPostula"=>$row['puestoPostula'],
                                    "quiste"=>$row['quiste'],
                                    "rayosx"=>$row['rayosx'],
                                    "razonSocial"=>$row['razonSocial'],
                                    "recomendaciones1"=>$row['reco1'],
                                    "recomendaciones2"=>$row['reco2'],                                    
                                    "recomendaciones3"=>$row['reco3'],
                                    "recomendaciones4"=>$row['reco4'],
                                    "recomendaciones5"=>$row['reco5'],
                                    "recomendaciones6"=>$row['reco6'],
                                    "recomendaciones7"=>$row['reco7'],
                                    "recomendaciones8"=>$row['reco8'],
                                    "recomendaciones9"=>$row['reco9'],
                                    "recomendaciones10"=>$row['reco10'],
                                    "restricciones"=>$row['restricciones'],
                                    "riesgoCoronario"=>$row['riesgoCoronario'],
                                    "rpr"=>$row['rpr'],
                                    "talla"=>$row['talla'],
                                    "tarifa"=>$row['tarifa'],
                                    "tgo"=>$row['tgo'],
                                    "tgp"=>$row['tgp'],
                                    "thevenon"=>$row['thevenon'],
                                    "tipo"=>$row['tipoExa'], 

                                    "tipoPase"=>$row['tipoPase'],
                                    "tipoPase2"=>$row['tipoPase2'],
                                    "tolueno"=>$row['tolueno'],
                                    "tratamientoMedico"=>$row['tratamientoMedico'],
                                    "traumatologia"=>$row['traumatologia'],
                                    "trichomonas"=>$row['trichomonas'],
                                    "trigliceridos"=>$row['trigliceridos'],
                                    "trofozoitos"=>$row['trofozoitos'],
                                    "ureaSanguinea"=>$row['ureaSanguinea'],
                                    "urobilinogeno"=>$row['urobilinogeno'],
                                    "vdrl"=>$row['vdrl'],
                                    "vih"=>$row['vih'],
                                    "vldl"=>$row['vldl'],
                                    "xileno"=>$row['xileno'],
                                    "observaciones"=>$row['observaciones'],//ver el resto U:
                                    "enviado"=>$row['enviado'],
                                    "adjunto"=>$row['adjunto'],
                                    "clinica"=>$row['nomb_clinica'],//cambiar a nombre clinica

                                    "fechaFbrA" =>$row['fechaFbrAmarilla'],
                                    "fechaDTD1" =>$row['fechaDifTD1'],
                                    "fechaDTD2" =>$row['fechaDifTD2'],
                                    "fechaDTD3" =>$row['fechaDifTD3'],
                                    "fechaDTR1" =>$row['fechaDifTR1'],
                                    "fechaHAD1" =>$row['fechaHepAD1'],
                                    "fechaHAD2" =>$row['fechaHepAD2'],
                                    "fechaHAR1" =>$row['fechaHepAR1'],
                                    "fechaHBD1" =>$row['fechaHepBD1'],
                                    "fechaHBD2" =>$row['fechaHepBD2'],
                                    "fechaHBD3" =>$row['fechaHepBD3'],
                                    "fechaIFR1" =>$row['fechaInflR1'],
                                    "fechaIFR2" =>$row['fechaInflR2'],
                                    "fechaPLD1" =>$row['fechaPolioD1'],
                                    "fechaTVD1" =>$row['fechaTrivD1'],
                                    "fechaRBD1" =>$row['fechaRabD1'],
                                    "fechaRBD2" =>$row['fechaRabD2'],
                                    "fechaRBD3" =>$row['fechaRabD3'],
                                    "fechaRBR1" =>$row['fechaRabR1'],
                                    "fechaTFR1" =>$row['fechaTifoR1'],
                                    "fechaTFR2" =>$row['fechaTifoR2'],
                                    "fechaNMR1" =>$row['fechaNeumR1'],
                                    "fechaNMR2" =>$row['fechaNeumR2'],
                                    "fechaCVD1" =>$row['fechaCovidD1'],
                                    "fechaCVD2" =>$row['fechaCovidD2'],
                                    "fechaCVD3" =>$row['fechaCovidD3'],
                                    "fechaCVD4" =>$row['fechaCovidD4'],
                                );
                }
            }
            return $lista;
        }catch(PDOException $th) {
            echo $th->getMessage();
            return false;
        }
        
    }

    function formatosTablas($pdo,$ccostos){
        try {
            $cc = ["0200","0300","0600","2800","2600"];//cambiar por consulta o bd luego 
            $respuesta = false;
            $lista = [];
            $sql = "SELECT `fe`.`empleadonomb` AS `empleadonomb`,`fe`.`fecnac` AS `fecnac`,`fa`.`dni` AS `dni`,`fe`.`edad` AS `edad`,`fe`.`ccostos` AS `ccostos`,
                    `fe`.`cargo` AS `cargo`,`fe`.`correo` AS `correo`,`fe`.`telefono` AS `telefono`,`fa`.`grupoSangre` AS `grupoSangre`,`fa`.`alergias` AS `alergias`,
                    `fa`.`fecha` AS `fecha`,`lc`.`nomb_clinica` AS `nomb_clinica`,`fa`.`aptitud` AS `aptitud`,`fa`.`peso` AS `peso`,`fa`.`talla` AS `talla`,`fa`.`imc` AS `imc`,
                    `fa`.`estadoNutricional` AS `estadoNutricional`,`fa`.`enviado` AS `enviado`,DATE_ADD(`fa`.`fecha`,interval 1 year) AS `programadopre`,`vrp1`.`fecha` AS `f_per1`,
                    `vrp1`.`clinica` AS `f_cln1`,`vrp1`.`aptitud` AS `f_act1`,`vrp1`.`peso` AS `f_pes1`,`vrp1`.`talla` AS `f_tal1`,`vrp1`.`imc` AS `f_imc1`,
                    `vrp1`.`estadoNutricional` AS `f_est1`,`vrp1`.`enviado` AS `f_env1`,`vrp1`.`fecha` + interval 1 year AS `programado1`,`vrp2`.`fecha` AS `f_per2`,
                    `vrp2`.`clinica` AS `f_cln2`,`vrp2`.`aptitud` AS `f_act2`,`vrp2`.`peso` AS `f_pes2`,`vrp2`.`talla` AS `f_tal2`,`vrp2`.`imc` AS `f_imc2`,
                    `vrp2`.`estadoNutricional` AS `f_est2`,`vrp1`.`enviado` AS `f_env2`,`vrp2`.`fecha` + interval 1 year AS `programado2`,MAX(`vrr`.`fecha`) AS `f_retiro`,
                    `vrr`.`clinica` AS `clinica`,`vrr`.`observaciones` AS `observaciones`,`vrr`.`enviado` AS `f_envr`,`vrr`.`centroCosto` AS `ccostos_r`,
                    `fv`.`fechaFbrAmarilla` AS `fechaFbrAmarilla`,`fv`.`fechaDifTD1` AS `fechaDifTD1`,`fv`.`fechaDifTD2` AS `fechaDifTD2`,`fv`.`fechaDifTD3` AS `fechaDifTD3`,
                    `fv`.`fechaDifTR1` AS `fechaDifTR1`,`fv`.`fechaHepAD1` AS `fechaHepAD1`,`fv`.`fechaHepAD2` AS `fechaHepAD2`,
                    `fv`.`fechaHepAR1` AS `fechaHepAR1`,`fv`.`fechaHepBD1` AS `fechaHepBD1`,`fv`.`fechaHepBD2` AS `fechaHepBD2`,`fv`.`fechaHepBD3` AS `fechaHepBD3`,
                    `fv`.`fechaInflR1` AS `fechaInflR1`,`fv`.`fechaInflR2` AS `fechaInflR2`,`fv`.`fechaPolioD1` AS `fechaPolioD1`,`fv`.`fechaTrivD1` AS `fechaTrivD1`,
                    `fv`.`fechaRabD1` AS `fechaRabD1`,`fv`.`fechaRabD2` AS `fechaRabD2`,`fv`.`fechaRabD3` AS `fechaRabD3`,`fv`.`fechaRabR1` AS `fechaRabR1`,
                    `fv`.`fechaTifoR1` AS `fechaTifoR1`,`fv`.`fechaTifoR2` AS `fechaTifoR2`,`fv`.`fechaNeumR1` AS `fechaNeumR1`,`fv`.`fechaNeumR2` AS `fechaNeumR2`,
                    `fv`.`fechaCovidD1` AS `fechaCovidD1`,`fv`.`fechaCovidD2` AS `fechaCovidD2`,`fv`.`fechaCovidD3` AS `fechaCovidD3`,`fv`.`fechaCovidD4` AS `fechaCovidD4` 
                    from `medica`.`fichas_api` `fa` 
                    left join `medica`.`fichas_empleados` `fe` on(`fa`.`dni` = `fe`.`dni`)
                    left join `medica`.`fichas_api` `vrp1` on(`vrp1`.`idreg` = `fa`.`idreg`)
                    left join `medica`.`fichas_api` `vrp2` on(`vrp2`.`idreg` = `fa`.`idreg`)
                    left join `medica`.`fichas_api` `vrr` on(`vrr`.`idreg` = `fa`.`idreg`)
                    left join `medica`.`fichas_vacunacion` `fv` on(`fv`.`dni` = `fa`.`dni`)
                    left join `medica`.`lista_clinicas` `lc` on(`lc`.`id` = `fa`.`clinica`)
                    where (`fa`.`tipoExa` like '%PREOCUPACIONAL' or `fa`.`tipoExa` like '%EMPO') AND vrp1.`tipoExa` like '%PREOCUPACIONAL' AND ccostos LIKE '$cc[$ccostos]%' GROUP BY dni ORDER BY empleadonomb";
            // WHERE  GROUP BY dni ORDER BY empleadonomb
            $statement = $pdo->prepare($sql);
            $statement ->execute();
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();

            if ($rowCount > 0) {
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
                    $salida= array(
                        "empleadonomb"=>$row['empleadonomb'],
                        "fecnac"=> date("d/m/Y", strtotime($row['fecnac'])),
                        "dni"=>$row['dni'],
                        "edad"=>$row['edad'],
                        "ccostos"=>$centro,
                        "cargo"=>$row['cargo'],
                        "empresa"=>"SEPCON",
                        "correo"=>$row['correo'],
                        "telefono"=>$row['telefono'],
                        "grupoSangre"=>$row['grupoSangre'],
                        "alergias"=>$row['alergias'],
                        "fecha"=>date("d/m/Y", strtotime($row['fecha'])),
                        "nomb_clinica"=>$row['nomb_clinica'],
                        "aptitud"=>$row['aptitud'],
                        "peso"=>$row['peso'],
                        "talla"=>$row['talla'],
                        "imc"=>$row['imc'],
                        "estadoNutricional"=>$row['estadoNutricional'],
                        "enviado"=>$row['enviado'],
                        "programadopre"=>date("d/m/Y", strtotime($row['programadopre'])),
                        "f_per1"=>date("d/m/Y", strtotime($row['f_per1'])),
                        "f_cln1"=>$row['f_cln1'],
                        "f_act1"=>$row['f_act1'],
                        "f_pes1"=>$row['f_pes1'],
                        "f_tal1"=>$row['f_tal1'],
                        "f_imc1"=>$row['f_imc1'],
                        "f_est1"=>$row['f_est1'], 
                        "f_env1"=>$row['f_env1'],
                        "programado1"=>date("d/m/Y", strtotime($row['programado1'])),
                        "f_per2"=>date("d/m/Y", strtotime($row['f_per2'])),
                        "f_cln2"=>$row['f_cln2'],
                        "f_act2"=>$row['f_act2'], 
                        "f_pes2"=>$row['f_pes2'], 
                        "f_tal2"=>$row['f_tal2'], 
                        "f_imc2"=>$row['f_imc2'], 
                        "f_est2"=>$row['f_est2'], 
                        "f_env2"=>$row['f_env2'],
                        "programado2"=>date("d/m/Y", strtotime($row['programado2'])),
                        "f_retiro"=>date("d/m/Y", strtotime($row['f_retiro'])),
                        "clinica"=>$row['clinica'],
                        "observaciones"=>$row['observaciones'],
                        "f_envr"=>$row['f_envr'],
                        "fechaFbrAmarilla"=>date("d/m/Y", strtotime($row['fechaFbrAmarilla'])),
                        "fechaDifTD1"=>date("d/m/Y", strtotime($row['fechaDifTD1'])),
                        "fechaDifTD2"=>date("d/m/Y", strtotime($row['fechaDifTD2'])),
                        "fechaDifTD3"=>date("d/m/Y", strtotime($row['fechaDifTD3'])),
                        "fechaDifTR1"=> date("d/m/Y", strtotime($row['fechaDifTR1'])),                        
                        "fechaHepAD1"=>date("d/m/Y", strtotime($row['fechaHepAD1'])),   
                        "fechaHepAD2"=>date("d/m/Y", strtotime($row['fechaHepAD2'])),   
                        "fechaHepAR1"=>date("d/m/Y", strtotime($row['fechaHepAR1'])),   
                        "fechaHepBD1"=>date("d/m/Y", strtotime($row['fechaHepBD1'])),   
                        "fechaHepBD2"=>date("d/m/Y", strtotime($row['fechaHepBD2'])),   
                        "fechaHepBD3"=>date("d/m/Y", strtotime($row['fechaHepBD3'])),   
                        "fechaInflR1"=>date("d/m/Y", strtotime($row['fechaInflR1'])),   
                        "fechaInflR2"=>date("d/m/Y", strtotime($row['fechaInflR2'])),   
                        "fechaPolioD1"=>date("d/m/Y", strtotime($row['fechaPolioD1'])),   
                        "fechaTrivD1"=>date("d/m/Y", strtotime($row['fechaTrivD1'])),
                        "fechaRabD1"=>date("d/m/Y", strtotime($row['fechaRabD1'])),
                        "fechaRabD2"=>date("d/m/Y", strtotime($row['fechaRabD2'])),
                        "fechaRabD3"=>date("d/m/Y", strtotime($row['fechaRabD3'])),
                        "fechaRabR1"=>date("d/m/Y", strtotime($row['fechaRabR1'])),                        
                        "fechaTifoR1"=>date("d/m/Y", strtotime($row['fechaTifoR1'])),   
                        "fechaTifoR2"=>date("d/m/Y", strtotime($row['fechaTifoR2'])),   
                        "fechaNeumR1"=>date("d/m/Y", strtotime($row['fechaNeumR1'])),   
                        "fechaNeumR2"=>date("d/m/Y", strtotime($row['fechaNeumR2'])),   
                        "fechaCovidD1"=>date("d/m/Y", strtotime($row['fechaCovidD1'])),   
                        "fechaCovidD2"=>date("d/m/Y", strtotime($row['fechaCovidD2'])),   
                        "fechaCovidD3"=>date("d/m/Y", strtotime($row['fechaCovidD3'])),
                        "fechaCovidD4"=>date("d/m/Y", strtotime($row['fechaCovidD4'])),
                    );
                array_push($lista,$salida);
            }
                $respuesta = true;
            }else{
                $respuesta = false;
            }
            $salida = array("respuesta"=>$respuesta,
                            "lista" => $lista);

            return $salida; 
        } catch(PDOException $th) {
            echo $th->getMessage();
            return false;
        }
        
    }

    function formatoTablas001($pdo,$ccostos){
        try{
            $respuesta = false;
            $lista = [];
            $sql = "SELECT fe.cut,fe.empleadonomb,fe.correo,fe.dni,fe.cargo,fe.ccostos,
                        fe.edad,fe.sede,fe.sexo,fe.fecnac,fe.estado,fe.direccion,fe.telefono,
                        fa.idreg,fa.acidoUrico,fa.aglutinaciones,fa.alergias,fa.anfetaminas,fa.antFamiliares,
                        fa.antece1,fa.antece2,fa.antece3,fa.antece4,fa.antece5,
                        fa.antece6,fa.aptitud,fa.atencion,fa.audiometria,fa.benceno,
                        fa.benzodiacepinas,fa.bilirrubina,fa.bk,fa.carboxihemo,fa.cardiologia,
                        fa.cea,fa.celulasEpiteliales,fa.centroCosto,fa.cervical,fa.cheFrca,
                        fa.cheFrre,fa.cilindros,fa.cirugias,fa.cocaina,fa.coccidias,
                        fa.cod1,fa.cod2,fa.cod3,fa.cod4,fa.cod5,
                        fa.cod6,fa.cod7,fa.cod8,fa.cod9,fa.cod10,
                        fa.codPaci,fa.codSexo,fa.colTotalHdl,fa.colesterol,fa.coprocultivo,
                        fa.creatinina,fa.cristales,fa.cuerposCetonicos,fa.dermatologia,fa.desAseg,
                        fa.diagno1,fa.diagno2,fa.diagno3,fa.diagno4,fa.diagno5,
                        fa.diagno7,fa.diagno6,fa.diagno8,fa.diagno9,fa.diagno10,
                        fa.eAspecto,fa.eColor,fa.eConsistencia,fa.eMucus,DATE_ADD(fa.fecha,INTERVAL 1 YEAR) AS sgtefecha,
                        fa.ecoAbdominal,fa.edad,fa.ekg,fa.empresa,fa.espirometria,
                        fa.estado,fa.estadoNutricional,fa.expoFactorRiesgo,fa.fecNaci,fa.fecPase,
                        fa.fecha,fa.filamentoMucoide,fa.fosfaAlca,fa.germenes,fa.ginecologia,
                        fa.glucosa,fa.gotaGruesa,fa.grasaCorporal,fa.grupoSangre,fa.habiAfisica,
                        fa.habiTabaco,fa.hcvHepatitisC,fa.hdl,fa.hematies,fa.hematiesHece,
                        fa.hematocrito,fa.hemoGlico,fa.hemoglobina,fa.hepatitisA,fa.hepatitisB,
                        fa.huevos,fa.imc,fa.inmunoglobulinaE,fa.ldl,fa.leucocitos,
                        fa.leucocitosOrina,fa.leucosistosPmn,fa.levaduraOri,fa.levadurasHece,fa.lumbar,
                        fa.mamografia,fa.marihuana,fa.metaAnfetamina,fa.morfina,fa.neurologia,
                        fa.nro,fa.nroRuc,fa.ocupacion,fa.odontograma,fa.oftalmologia,
                        fa.oriAspecto,fa.oriColor,fa.oriDensidad,fa.oriPh,fa.orinaAlbuminia,
                        fa.orinaAzucar,fa.osteo,fa.otorrino,fa.otoscopia,fa.pEsfuerzo,
                        fa.paciente,fa.pam,fa.papanicolau,fa.pase,fa.pase2,
                        fa.periAbdominal,fa.peso,fa.pigmentosBiliares,fa.piocitos,
                        fa.plaquetas,fa.plomo,fa.presion,fa.psa,fa.psicologia,
                        fa.puestoPostula,fa.quiste,fa.rayosx,fa.razonSocial,fa.reco1,
                        fa.reco2,fa.reco3,fa.reco4,fa.reco5,fa.reco6,
                        fa.reco7,fa.reco8,fa.reco9,fa.reco10,fa.restricciones,
                        fa.riesgoCoronario,fa.rpr,fa.talla,fa.tarifa,fa.tgo,
                        fa.tgp,fa.thevenon,fa.tipoExa,fa.tipoPase,fa.tipoPase2,
                        fa.tolueno,fa.tratamientoMedico,fa.traumatologia,fa.trichomonas,fa.trigliceridos,
                        fa.trofozoitos,fa.ureaSanguinea,fa.urobilinogeno,fa.vdrl,fa.vih,
                        fa.vldl,fa.xileno,fa.observaciones,fa.adjunto,fa.enviado,lc.nomb_clinica,
                        v.fechaFbrAmarilla,v.fechaDifTD1,v.fechaDifTD2,v.fechaDifTD3,v.fechaDifTR1,v.fechaHepAD1,
                        v.fechaHepAD2,v.fechaHepAR1,v.fechaHepBD1,v.fechaHepBD2,v.fechaHepBD3,v.fechaInflR1,
                        v.fechaInflR2,v.fechaPolioD1,v.fechaTrivD1,v.fechaRabD1,v.fechaRabD2,v.fechaRabD3,
                        v.fechaRabR1,v.fechaTifoR1,v.fechaTifoR2,v.fechaNeumR1,v.fechaNeumR2,v.fechaCovidD1,
                        v.fechaCovidD2,v.fechaCovidD3,v.fechaCovidD4
                    FROM fichas_api AS fa
                    LEFT JOIN fichas_empleados AS fe ON fa.dni=fe.dni
                    LEFT JOIN fichas_vacunacion AS v ON fa.dni=v.dni
                    LEFT JOIN lista_clinicas AS lc ON lc.id = fa.clinica
                    WHERE fa.idreg=? AND fe.dni=?";
            $statement = $pdo->prepare($sql);
            $statement ->execute();
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();

            if ($rowCount > 0) {
                foreach($result as $row) {
                    $salida = array("cut"=>$row['cut'],
                                    "dni"=>$row['dni'],
                                    "nombres"=>$row['empleadonomb'],
                                    "fecnac"=>$row['fecnac'],
                                    "correo"=>$row['correo'],
                                    "sexo"=>$row['sexo'],
                                    "cargo"=>$row['cargo'],
                                    "ccostos"=>$row['ccostos'],
                                    "sede"=>$row['sede'],
                                    "estado"=>$row['estado'],
                                    "direccion"=>$row['direccion'],
                                    "edad"=>$row['edad'],
                                    "telefono"=>$row['telefono'],
                                    "id"=>$row['idreg'],
                                    "acidoUrico"=>$row['acidoUrico'],
                                    "aglutinaciones"=>$row['aglutinaciones'],
                                    "alergias"=>$row['alergias'],
                                    "anfetaminas"=>$row['anfetaminas'],
                                    "antFamiliares"=>$row['antFamiliares'],
                                    "antece1"=>$row['antece1'],
                                    "antece2"=>$row['antece2'],
                                    "antece3"=>$row['antece3'],
                                    "antece4"=>$row['antece4'],
                                    "antece5"=>$row['antece5'],
                                    "antece6"=>$row['antece6'],
                                    "aptitud"=>$row['aptitud'],
                                    "atencion"=>$row['atencion'],
                                    "audiometria"=>$row['audiometria'],
                                    "benceno"=>$row['benceno'],
                                    "benzodiacepinas"=>$row['benzodiacepinas'],
                                    "bilirrubina"=>$row['bilirrubina'],
                                    "bk"=>$row['bk'],
                                    "carboxihemo"=>$row['carboxihemo'],
                                    "cardiologia"=>$row['cardiologia'],
                                    "cea"=>$row['cea'],
                                    "celulasEpiteliales"=>$row['celulasEpiteliales'],
                                    "ccostos"=>$row['centroCosto'],
                                    "cervical"=>$row['cervical'],
                                    "cheFrca"=>$row['cheFrca'],
                                    "cheFrre"=>$row['cheFrre'],
                                    "cilindros"=>$row['cilindros'],
                                    "cirugias"=>$row['cirugias'],
                                    "cocaina"=>$row['cocaina'],
                                    "coccidias"=>$row['coccidias'],
                                    "cod1"=>$row['cod1'],
                                    "cod2"=>$row['cod2'],
                                    "cod3"=>$row['cod3'],
                                    "cod4"=>$row['cod4'],
                                    "cod5"=>$row['cod5'],
                                    "cod6"=>$row['cod6'],
                                    "cod7"=>$row['cod7'],
                                    "cod8"=>$row['cod8'],
                                    "cod9"=>$row['cod9'],
                                    "cod10"=>$row['cod10'],
                                    "codPaci"=>$row['codPaci'],
                                    "codSexo"=>$row['codSexo'],
                                    "colTotalHdl"=>$row['colTotalHdl'],
                                    "colesterol"=>$row['colesterol'],
                                    "coprocultivo"=>$row['coprocultivo'],
                                    "creatinina"=>$row['creatinina'],
                                    "cristales"=>$row['cristales'],
                                    "cuerposCetonicos"=>$row['cuerposCetonicos'],
                                    "dermatologia"=>$row['dermatologia'],
                                    "desAseg"=>$row['desAseg'],
                                    "diagno1"=>$row['diagno1'],
                                    "diagno2"=>$row['diagno2'],
                                    "diagno3"=>$row['diagno3'],
                                    "diagno4"=>$row['diagno4'],
                                    "diagno5"=>$row['diagno5'],
                                    "diagno6"=>$row['diagno6'],
                                    "diagno7"=>$row['diagno7'],
                                    "diagno8"=>$row['diagno8'],
                                    "diagno9"=>$row['diagno9'],
                                    "diagno10"=>$row['diagno10'],
                                    "eAspecto"=>$row['eAspecto'],
                                    "eColor"=>$row['eColor'],
                                    "eConsistencia"=>$row['eConsistencia'],
                                    "eMucus"=>$row['eMucus'],
                                    "ecoAbdominal"=>$row['ecoAbdominal'],
                                    "edad"=>$row['edad'],
                                    "ekg"=>$row['ekg'],
                                    "empresa"=>$row['empresa'],
                                    "espirometria"=>$row['espirometria'],
                                    "estado"=>$row['estado'],
                                    "estadoNutricional"=>$row['estadoNutricional'],
                                    "expoFactorRiesgo"=>$row['expoFactorRiesgo'],
                                    "fecNaci"=>$row['fecNaci'],
                                    "fecPase"=>$row['fecPase'],
                                    "fecha"=>date("d/m/Y", strtotime($row['fecha'])),
                                    "sgtefecha"=>date("d/m/Y", strtotime($row['sgtefecha'])),
                                    "filamentoMucoide"=>$row['filamentoMucoide'],
                                    "fosfaAlca"=>$row['fosfaAlca'],
                                    "germenes"=>$row['germenes'],
                                    "ginecologia"=>$row['ginecologia'],
                                    "glucosa"=>$row['glucosa'],
                                    "gotaGruesa"=>$row['gotaGruesa'],
                                    "grasaCorporal"=>$row['grasaCorporal'],
                                    "sangre"=>$row['grupoSangre'],

                                    "habiAfisica"=>$row['habiAfisica'],
                                    "habiTabaco"=>$row['habiTabaco'],
                                    "hcvHepatitisC"=>$row['hcvHepatitisC'],
                                    "hdl"=>$row['hdl'],
                                    "hematiesHece"=>$row['hematiesHece'],
                                    "hematocrito"=>$row['hematocrito'],
                                    "hemoGlico"=>$row['hemoGlico'],
                                    "hemoglobina"=>$row['hemoglobina'],
                                    "hepatitisA"=>$row['hepatitisA'],
                                    "hepatitisB"=>$row['hepatitisB'],
                                    "huevos"=>$row['huevos'],
                                    "imc"=>$row['imc'],
                                    "inmunoglobulinaE"=>$row['inmunoglobulinaE'],
                                    "ldl"=>$row['ldl'],
                                    "leucocitos"=>$row['leucocitos'],
                                    "leucocitosOrina"=>$row['leucocitosOrina'],
                                    "leucosistosPmn"=>$row['leucosistosPmn'],
                                    "levaduraOri"=>$row['levaduraOri'],
                                    "levadurasHece"=>$row['levadurasHece'],
                                    "lumbar"=>$row['lumbar'],
                                    "mamografia"=>$row['mamografia'],
                                    "marihuana"=>$row['marihuana'],
                                    "metaAnfetamina"=>$row['metaAnfetamina'],
                                    "morfina"=>$row['morfina'],
                                    "neurologia"=>$row['neurologia'],
                                    "nro"=>$row['nro'],
                                    "nroRuc"=>$row['nroRuc'],
                                    "ocupacion"=>$row['ocupacion'],
                                    "odontograma"=>$row['odontograma'],
                                    "oftalmologia"=>$row['oftalmologia'],
                                    "oriAspecto"=>$row['oriAspecto'],
                                    "oriColor"=>$row['oriColor'],
                                    "oriDensidad"=>$row['oriDensidad'],
                                    "oriPh"=>$row['oriPh'],
                                    "orinaAlbuminia"=>$row['orinaAlbuminia'],
                                    "orinaAzucar"=>$row['orinaAzucar'],
                                    "osteo"=>$row['osteo'],
                                    "otorrino"=>$row['otorrino'],
                                    "otoscopia"=>$row['otoscopia'],
                                    "pEsfuerzo"=>$row['pEsfuerzo'],
                                    "paciente"=>$row['paciente'],

                                    "pam"=>$row['pam'],
                                    "papanicolau"=>$row['papanicolau'],
                                    "pase"=>$row['pase'],
                                    "pase2"=>$row['pase2'],
                                    "periAbdominal"=>$row['periAbdominal'],
                                    "peso"=>$row['peso'],
                                    "pigmentosBiliares"=>$row['pigmentosBiliares'],
                                    "piocitos"=>$row['piocitos'],
                                    "plaquetas"=>$row['plaquetas'],
                                    "plomo"=>$row['plomo'],
                                    "presion"=>$row['presion'],
                                    "psa"=>$row['psa'],
                                    "psicologia"=>$row['psicologia'],
                                    "puestoPostula"=>$row['puestoPostula'],
                                    "quiste"=>$row['quiste'],
                                    "rayosx"=>$row['rayosx'],
                                    "razonSocial"=>$row['razonSocial'],
                                    "recomendaciones1"=>$row['reco1'],
                                    "recomendaciones2"=>$row['reco2'],                                    
                                    "recomendaciones3"=>$row['reco3'],
                                    "recomendaciones4"=>$row['reco4'],
                                    "recomendaciones5"=>$row['reco5'],
                                    "recomendaciones6"=>$row['reco6'],
                                    "recomendaciones7"=>$row['reco7'],
                                    "recomendaciones8"=>$row['reco8'],
                                    "recomendaciones9"=>$row['reco9'],
                                    "recomendaciones10"=>$row['reco10'],
                                    "restricciones"=>$row['restricciones'],
                                    "riesgoCoronario"=>$row['riesgoCoronario'],
                                    "rpr"=>$row['rpr'],
                                    "talla"=>$row['talla'],
                                    "tarifa"=>$row['tarifa'],
                                    "tgo"=>$row['tgo'],
                                    "tgp"=>$row['tgp'],
                                    "thevenon"=>$row['thevenon'],
                                    "tipo"=>$row['tipoExa'], 

                                    "tipoPase"=>$row['tipoPase'],
                                    "tipoPase2"=>$row['tipoPase2'],
                                    "tolueno"=>$row['tolueno'],
                                    "tratamientoMedico"=>$row['tratamientoMedico'],
                                    "traumatologia"=>$row['traumatologia'],
                                    "trichomonas"=>$row['trichomonas'],
                                    "trigliceridos"=>$row['trigliceridos'],
                                    "trofozoitos"=>$row['trofozoitos'],
                                    "ureaSanguinea"=>$row['ureaSanguinea'],
                                    "urobilinogeno"=>$row['urobilinogeno'],
                                    "vdrl"=>$row['vdrl'],
                                    "vih"=>$row['vih'],
                                    "vldl"=>$row['vldl'],
                                    "xileno"=>$row['xileno'],
                                    "observaciones"=>$row['observaciones'],//ver el resto U:
                                    "enviado"=>$row['enviado'],
                                    "adjunto"=>$row['adjunto'],
                                    "clinica"=>$row['nomb_clinica'],//cambiar a nombre clinica

                                    "fechaFbrA" =>$row['fechaFbrAmarilla'],
                                    "fechaDTD1" =>$row['fechaDifTD1'],
                                    "fechaDTD2" =>$row['fechaDifTD2'],
                                    "fechaDTD3" =>$row['fechaDifTD3'],
                                    "fechaDTR1" =>$row['fechaDifTR1'],
                                    "fechaHAD1" =>$row['fechaHepAD1'],
                                    "fechaHAD2" =>$row['fechaHepAD2'],
                                    "fechaHAR1" =>$row['fechaHepAR1'],
                                    "fechaHBD1" =>$row['fechaHepBD1'],
                                    "fechaHBD2" =>$row['fechaHepBD2'],
                                    "fechaHBD3" =>$row['fechaHepBD3'],
                                    "fechaIFR1" =>$row['fechaInflR1'],
                                    "fechaIFR2" =>$row['fechaInflR2'],
                                    "fechaPLD1" =>$row['fechaPolioD1'],
                                    "fechaTVD1" =>$row['fechaTrivD1'],
                                    "fechaRBD1" =>$row['fechaRabD1'],
                                    "fechaRBD2" =>$row['fechaRabD2'],
                                    "fechaRBD3" =>$row['fechaRabD3'],
                                    "fechaRBR1" =>$row['fechaRabR1'],
                                    "fechaTFR1" =>$row['fechaTifoR1'],
                                    "fechaTFR2" =>$row['fechaTifoR2'],
                                    "fechaNMR1" =>$row['fechaNeumR1'],
                                    "fechaNMR2" =>$row['fechaNeumR2'],
                                    "fechaCVD1" =>$row['fechaCovidD1'],
                                    "fechaCVD2" =>$row['fechaCovidD2'],
                                    "fechaCVD3" =>$row['fechaCovidD3'],
                                    "fechaCVD4" =>$row['fechaCovidD4'],
                    );
                    array_push($lista,$salida);
                }
                $respuesta = true;
            }else{
                $respuesta = false;
            }
            $salida = array("respuesta"=>$respuesta,
                            "lista" => $lista);

            return $salida; 
        }catch(PDOException $th) {
            echo $th->getMessage();
            return false;
        }
    }
?>