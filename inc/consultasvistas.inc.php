<?php
    session_start();//sin esto no jala el $_Session, recuerda eso
    require_once("connectmedica.inc.php");
    require_once('../vendor/autoload.php');

    if(isset($_POST['funcion'])){
        if($_POST['funcion']=="formato"){
            echo json_encode(formato($pdo));//,$_POST['ccostos']));
        }
    }

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    if(file_exists("../formatos/Formato 006.xlsx")){
        unlink("../formatos/Formato 006.xlsx");
    }

    function formato($pdo){//,$ccostos){
        try {
            $r = 0;
            $fila = 8;
            $respuesta = false;
            $lista = [];
            $sql = "SELECT empleadonomb,fecnac,dni,edad,ccostos,cargo,correo,telefono,grupoSangre,alergias,fecha,nomb_clinica,aptitud,peso,talla,imc,estadoNutricional,enviado,
                    programadopre,f_per1,f_cln1,f_act1,f_pes1,f_tal1,f_imc1,f_est1,f_env1,programado1,f_per2,f_cln2,f_act2,f_pes2,f_tal2,f_imc2,f_est2,f_env2,programado2,
                    f_retiro,clinica,observaciones,f_envr,fechaFbrAmarilla,fechaDifTD1,fechaDifTD2,fechaDifTD3,fechaDifTR1,fechaHepAD1,fechaHepAD2,fechaHepAR1,fechaHepBD1,
                    fechaHepBD2,fechaHepBD3,fechaInflR1,fechaInflR2,fechaPolioD1,fechaTrivD1,fechaRabD1,fechaRabD2,fechaRabD3,fechaRabR1,fechaTifoR1,
                    fechaTifoR2,fechaNeumR1,fechaNeumR2,fechaCovidD1,fechaCovidD2,fechaCovidD3,fechaCovidD4 FROM vista_formato_006";
             /*switch($ccostos){
                            case "2600":
                                $sql=""
                                break;
                }*/
            $statement = $pdo->prepare($sql);
            $statement ->execute();
            $spreadsheet = new Spreadsheet();
            $hojaActual = $spreadsheet->getActiveSheet();
            $hojaActual->setTitle("Formato 006");
            $hojaActual->setCellValue("A5","N°");
            $hojaActual->setCellValue("B5","APELLIDOS Y NOMBRES");
            $hojaActual->setCellValue("C5","FECHA DE NACIMIENTO");
            $hojaActual->setCellValue("D5","DNI");
            $hojaActual->setCellValue("E5","EDAD");
            $hojaActual->setCellValue("F5","AREA DE TRABAJOs");
            $hojaActual->setCellValue("G5","PUESTO DE TRABAJO");
            $hojaActual->setCellValue("H5","EMPRESA");
            $hojaActual->setCellValue("I5",utf8_decode("CORREO ELECTRONICO"));
            $hojaActual->setCellValue("J5","CELULAR");
            $hojaActual->setCellValue("K5","GRUPO SANG. Y RH");
            $hojaActual->setCellValue("L5","ALERGIAS");
            $hojaActual->setCellValue("M6","EMO PREOCUPACIONAL");
            $hojaActual->setCellValue("M5","EXAMENES MEDICOS OCUPACIONALES");
            $hojaActual->setCellValue("M7","FECHA EMO");
            $hojaActual->setCellValue("N7","CLINICA");
            $hojaActual->setCellValue("O7",utf8_decode("CONDICIÓN"));
            $hojaActual->setCellValue("P7","VALORACION NUTRICIONAL");
            $hojaActual->setCellValue("P8","PESO");
            $hojaActual->setCellValue("Q8","TALLA");
            $hojaActual->setCellValue("R8","IMC");
            $hojaActual->setCellValue("S8","CLASIFICACION");
            $hojaActual->setCellValue("T7","ENVIO DE EMO EMAIL");
            $hojaActual->setCellValue("U6","EMO PERIODICO");
            $hojaActual->setCellValue("U7","PROGRAMADO");
            $hojaActual->setCellValue("V7","REALIZADO");
            $hojaActual->setCellValue("W7","CLINICA");
            $hojaActual->setCellValue("X7",utf8_decode("CONDICIÓN"));
            $hojaActual->setCellValue("Y7","VALORACION NUTRICIONAL");
            $hojaActual->setCellValue("Y8","PESO");
            $hojaActual->setCellValue("Z8","TALLA");
            $hojaActual->setCellValue("AA8","IMC");
            $hojaActual->setCellValue("AB8","CLASIFICACION");
            $hojaActual->setCellValue("AC7","ENVIO DE EMO EMAIL");
            $hojaActual->setCellValue("AD7","PROGRAMADO");
            $hojaActual->setCellValue("AE7","REALIZADO");
            $hojaActual->setCellValue("AF7",utf8_decode("CLÍNICA"));
            $hojaActual->setCellValue("AG7",utf8_decode("CONDICIÓN"));
            $hojaActual->setCellValue("AH7","VALORACION NUTRICIONAL");
            $hojaActual->setCellValue("AH8","PESO");
            $hojaActual->setCellValue("AI8","TALLA");
            $hojaActual->setCellValue("AJ8","IMC");
            $hojaActual->setCellValue("AK8","CLASIFICACION");
            $hojaActual->setCellValue("AL7","ENVIO DE EMO EMAIL");
            $hojaActual->setCellValue("AM7","PROGRAMADO");
            $hojaActual->setCellValue("AN6","EMO RETIRO");
            $hojaActual->setCellValue("AN7","REALIZADO");
            $hojaActual->setCellValue("AO7",utf8_decode("CLÍNICA"));
            $hojaActual->setCellValue("AP7",utf8_decode("OBSERVACIÓNES"));
            $hojaActual->setCellValue("AQ7","ENVIO DE EMO EMAIL");
            $hojaActual->setCellValue("AR4","INMUNIZACIONES");
            $hojaActual->setCellValue("AR6","FIEBRE AMARILLA");
            $hojaActual->setCellValue("AR7","1RA DOSIS");
            $hojaActual->setCellValue("AS6","DIFTERIA TETANO");
            $hojaActual->setCellValue("AS7","1RA DOSIS");
            $hojaActual->setCellValue("AT7","2DA DOSIS");
            $hojaActual->setCellValue("AU7","3RA DOSIS");
            $hojaActual->setCellValue("AV7","REFUERZO");
            $hojaActual->setCellValue("AW6","HEPATITIS A");
            $hojaActual->setCellValue("AW7","1RA DOSIS");
            $hojaActual->setCellValue("AX7","2DA DOSIS");
            $hojaActual->setCellValue("AY7","REFUERZO");
            $hojaActual->setCellValue("AZ6","HEPATITIS B");
            $hojaActual->setCellValue("AZ7","1RA DOSIS");
            $hojaActual->setCellValue("BA7","2DA DOSIS");
            $hojaActual->setCellValue("BB7","3RA DOSIS");
            $hojaActual->setCellValue("BC6","INFLUENZA");
            $hojaActual->setCellValue("BC7","1RA DOSIS");
            $hojaActual->setCellValue("BD7","REFUERZO");
            $hojaActual->setCellValue("BE6","POLIOMELITIS");
            $hojaActual->setCellValue("BE7","1RA DOSIS");
            $hojaActual->setCellValue("BF6","TRIVIRICA");
            $hojaActual->setCellValue("BF7","1RA DOSIS");
            $hojaActual->setCellValue("BG6","RABIA");
            $hojaActual->setCellValue("BG7","1RA DOSIS");
            $hojaActual->setCellValue("BH7","2DA DOSIS");
            $hojaActual->setCellValue("BI7","3RA DOSIS");
            $hojaActual->setCellValue("BJ7","REFUERZO");
            $hojaActual->setCellValue("BK6","TIFOIDEA");
            $hojaActual->setCellValue("BK7","1RA DOSIS");
            $hojaActual->setCellValue("BL7","REFUERZO");
            $hojaActual->setCellValue("BM6","NEUMOCOCO");
            $hojaActual->setCellValue("BM7","1RA DOSIS");
            $hojaActual->setCellValue("BN7","REFUERZO");
            $hojaActual->setCellValue("BO6","COVID");
            $hojaActual->setCellValue("BO7","1RA DOSIS");
            $hojaActual->setCellValue("BP7","2DA DOSIS");
            $hojaActual->setCellValue("BQ7","3RA DOSIS");
            $hojaActual->setCellValue("BR7","4TA DOSIS");

            $hojaActual->mergeCells("A5:A8");
            $hojaActual->mergeCells("B5:B8");
            $hojaActual->mergeCells("C5:C8");
	        $hojaActual->mergeCells("D5:D8");
            $hojaActual->mergeCells("E5:E8");
            $hojaActual->mergeCells("F5:F8");
            $hojaActual->mergeCells("G5:G8");
            $hojaActual->mergeCells("H5:H8");
            $hojaActual->mergeCells("I5:I8");
            $hojaActual->mergeCells("J5:J8");
            $hojaActual->mergeCells("K5:K8");
            $hojaActual->mergeCells("L5:L8");
            $hojaActual->mergeCells("M6:T6");
            $hojaActual->mergeCells("M5:AQ5");
            $hojaActual->mergeCells("M7:M8");
            $hojaActual->mergeCells("N7:N8");
            $hojaActual->mergeCells("O7:O8");
	        $hojaActual->mergeCells("P7:S7");
            $hojaActual->mergeCells("T7:T8");
            $hojaActual->mergeCells("U6:AM6");
            $hojaActual->mergeCells("U7:U8");
            $hojaActual->mergeCells("V7:V8");
            $hojaActual->mergeCells("W7:W8");
            $hojaActual->mergeCells("X7:X8");
            $hojaActual->mergeCells("Y7:AB7");
            $hojaActual->mergeCells("AC7:AC8");
	        $hojaActual->mergeCells("AD7:AD8");
            $hojaActual->mergeCells("AE7:AE8");
            $hojaActual->mergeCells("AF7:AF8");
            $hojaActual->mergeCells("AG7:AG8");
            $hojaActual->mergeCells("AH7:AK7");
            $hojaActual->mergeCells("AL7:AL8");
	        $hojaActual->mergeCells("AM7:AM8");
            $hojaActual->mergeCells("AN6:AQ6");
            $hojaActual->mergeCells("AN7:AN8");
            $hojaActual->mergeCells("AO7:AO8");
            $hojaActual->mergeCells("AP7:AP8");
            $hojaActual->mergeCells("AQ7:AQ8");
            $hojaActual->mergeCells("AR4:BR4");
            $hojaActual->mergeCells("AR5:BR5");
            $hojaActual->mergeCells("AR7:AR8");
            $hojaActual->mergeCells("AS6:AV6");
            $hojaActual->mergeCells("AS7:AS8");
            $hojaActual->mergeCells("AT7:AT8");
            $hojaActual->mergeCells("AU7:AU8");
            $hojaActual->mergeCells("AV7:AV8");
            $hojaActual->mergeCells("AW6:AY6");
            $hojaActual->mergeCells("AW7:AW8");
            $hojaActual->mergeCells("AX7:AX8");
            $hojaActual->mergeCells("AY7:AY8");
            $hojaActual->mergeCells("AZ6:BB6");
            $hojaActual->mergeCells("AZ7:AZ8");
            $hojaActual->mergeCells("BA7:BA8");
            $hojaActual->mergeCells("BB7:BB8");
            $hojaActual->mergeCells("BC6:BD6");
            $hojaActual->mergeCells("BC7:BC8");
            $hojaActual->mergeCells("BD7:BD8");
            $hojaActual->mergeCells("BE6:BE6");
            $hojaActual->mergeCells("BE7:BE8");
            $hojaActual->mergeCells("BF6:BF6");
            $hojaActual->mergeCells("BF7:BF8");
            $hojaActual->mergeCells("BG6:BJ6");
            $hojaActual->mergeCells("BG7:BG8");
            $hojaActual->mergeCells("BH7:BH8");
            $hojaActual->mergeCells("BI7:BI8");
            $hojaActual->mergeCells("BJ7:BJ8");
            $hojaActual->mergeCells("BK6:BL6");
            $hojaActual->mergeCells("BK7:BK8");
            $hojaActual->mergeCells("BL7:BL8");
            $hojaActual->mergeCells("BM6:BN6");
            $hojaActual->mergeCells("BM7:BM8");
            $hojaActual->mergeCells("BN7:BN8");
            $hojaActual->mergeCells("BO6:BR6");
            $hojaActual->mergeCells("BO7:BO8");
            $hojaActual->mergeCells("BP7:BP8");
            $hojaActual->mergeCells("BQ7:BQ8");
            $hojaActual->mergeCells("BR7:BR8");

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

            $hojaActual->getStyle('B5:L8')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('99AD71');

            $hojaActual->getStyle('A4:BR8')->applyFromArray($styleArray);

            $hojaActual->getStyle('M5:AQ8')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('6DB4CA');

            $hojaActual->getStyle('AR5:BR5')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('E2E51E');

            $hojaActual->getStyle('AR6:AR8')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('E2E51E');

            $hojaActual->getStyle('AS6:AV8')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('15F0EA');
            
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

                    $r++;
                    $fila++;
                        $hojaActual-> setCellValue('A'.$fila,$r);
                        $hojaActual-> setCellValue('B'.$fila,utf8_decode($row['empleadonomb']));
                        $hojaActual-> setCellValue('C'.$fila,date("d/m/Y", strtotime($row['fecnac'])));
                        $hojaActual-> setCellValue('D'.$fila,$row['dni']);
                        $hojaActual-> setCellValue('E'.$fila,$row['edad']);
                        $hojaActual-> setCellValue('F'.$fila,utf8_decode($centro));
                        $hojaActual-> setCellValue('G'.$fila,utf8_decode($row['cargo']));
                        $hojaActual-> setCellValue('H'.$fila,utf8_decode("SEPCON"));
                        $hojaActual-> setCellValue('I'.$fila,utf8_decode($row['correo']));
                        $hojaActual-> setCellValue('J'.$fila,utf8_decode($row['telefono']));
                        $hojaActual-> setCellValue('K'.$fila,utf8_decode($row['grupoSangre']));
                        $hojaActual-> setCellValue('L'.$fila,utf8_decode($row['alergias']));
                        $hojaActual-> setCellValue('M'.$fila,date("d/m/Y", strtotime($row['fecha'])));
                        $hojaActual-> setCellValue('N'.$fila,utf8_decode($row['nomb_clinica']));
                        $hojaActual-> setCellValue('O'.$fila,utf8_decode($row['aptitud']));
                        $hojaActual-> setCellValue('P'.$fila,$row['peso']);
                        $hojaActual-> setCellValue('Q'.$fila,$row['talla']);
                        $hojaActual-> setCellValue('R'.$fila,$row['imc']);
                        $hojaActual-> setCellValue('S'.$fila,utf8_decode($row['estadoNutricional']));
                        $hojaActual-> setCellValue('T'.$fila,$row['enviado']);
                        $hojaActual-> setCellValue('U'.$fila,date("d/m/Y", strtotime($row['programadopre'])));
                        $hojaActual-> setCellValue('V'.$fila,date("d/m/Y", strtotime($row['f_per1'])));
                        $hojaActual-> setCellValue('W'.$fila,utf8_decode($row['f_cln1'])); 
                        $hojaActual-> setCellValue('X'.$fila,utf8_decode($row['f_act1']));
                        $hojaActual-> setCellValue('Y'.$fila,$row['f_pes1']);
                        $hojaActual-> setCellValue('Z'.$fila,$row['f_tal1']);
                        $hojaActual-> setCellValue('AA'.$fila,$row['f_imc1']);
                        $hojaActual-> setCellValue('AB'.$fila,utf8_decode($row['f_est1'])); 
                        $hojaActual-> setCellValue('AC'.$fila,$row['f_env1']); 
                        $hojaActual-> setCellValue('AD'.$fila,date("d/m/Y", strtotime($row['programado1'])));
                        $hojaActual-> setCellValue('AE'.$fila,date("d/m/Y", strtotime($row['f_per2'])));
                        $hojaActual-> setCellValue('AF'.$fila,utf8_decode($row['f_cln2'])); 
                        $hojaActual-> setCellValue('AG'.$fila,utf8_decode($row['f_act2'])); 
                        $hojaActual-> setCellValue('AH'.$fila,$row['f_pes2']); 
                        $hojaActual-> setCellValue('AI'.$fila,$row['f_tal2']); 
                        $hojaActual-> setCellValue('AJ'.$fila,$row['f_imc2']); 
                        $hojaActual-> setCellValue('AK'.$fila,utf8_decode($row['f_est2'])); 
                        $hojaActual-> setCellValue('AL'.$fila,$row['f_env2']);
                        $hojaActual-> setCellValue('AM'.$fila,date("d/m/Y", strtotime($row['programado2'])));//a partir de por aqui iria el switch case U:
                        $hojaActual-> setCellValue('AN'.$fila,date("d/m/Y", strtotime($row['f_retiro'])));
                        $hojaActual-> setCellValue('AO'.$fila,utf8_decode($row['clinica'])); 
                        $hojaActual-> setCellValue('AP'.$fila,utf8_decode($row['observaciones'])); 
                        $hojaActual-> setCellValue('AQ'.$fila,$row['f_envr']);
                        $hojaActual-> setCellValue('AR'.$fila,date("d/m/Y", strtotime($row['fechaFbrAmarilla'])));
                        $hojaActual-> setCellValue('AS'.$fila,date("d/m/Y", strtotime($row['fechaDifTD1'])));
                        $hojaActual-> setCellValue('AT'.$fila,date("d/m/Y", strtotime($row['fechaDifTD2'])));
                        $hojaActual-> setCellValue('AU'.$fila,date("d/m/Y", strtotime($row['fechaDifTD3'])));
                        $hojaActual-> setCellValue('AV'.$fila,date("d/m/Y", strtotime($row['fechaDifTR1'])));                        
                        $hojaActual-> setCellValue('AW'.$fila,date("d/m/Y", strtotime($row['fechaHepAD1'])));   
                        $hojaActual-> setCellValue('AX'.$fila,date("d/m/Y", strtotime($row['fechaHepAD2'])));   
                        $hojaActual-> setCellValue('AY'.$fila,date("d/m/Y", strtotime($row['fechaHepAR1'])));   
                        $hojaActual-> setCellValue('AZ'.$fila,date("d/m/Y", strtotime($row['fechaHepBD1'])));   
                        $hojaActual-> setCellValue('BA'.$fila,date("d/m/Y", strtotime($row['fechaHepBD2'])));   
                        $hojaActual-> setCellValue('BB'.$fila,date("d/m/Y", strtotime($row['fechaHepBD3'])));   
                        $hojaActual-> setCellValue('BC'.$fila,date("d/m/Y", strtotime($row['fechaInflR1'])));   
                        $hojaActual-> setCellValue('BD'.$fila,date("d/m/Y", strtotime($row['fechaInflR2'])));   
                        $hojaActual-> setCellValue('BE'.$fila,date("d/m/Y", strtotime($row['fechaPolioD1'])));   
                        $hojaActual-> setCellValue('BF'.$fila,date("d/m/Y", strtotime($row['fechaTrivD1'])));
                        $hojaActual-> setCellValue('BG'.$fila,date("d/m/Y", strtotime($row['fechaRabD1'])));
                        $hojaActual-> setCellValue('BH'.$fila,date("d/m/Y", strtotime($row['fechaRabD2'])));
                        $hojaActual-> setCellValue('BI'.$fila,date("d/m/Y", strtotime($row['fechaRabD3'])));
                        $hojaActual-> setCellValue('BJ'.$fila,date("d/m/Y", strtotime($row['fechaRabR1'])));                        
                        $hojaActual-> setCellValue('BK'.$fila,date("d/m/Y", strtotime($row['fechaTifoR1'])));   
                        $hojaActual-> setCellValue('BL'.$fila,date("d/m/Y", strtotime($row['fechaTifoR2'])));   
                        $hojaActual-> setCellValue('BM'.$fila,date("d/m/Y", strtotime($row['fechaNeumR1'])));   
                        $hojaActual-> setCellValue('BN'.$fila,date("d/m/Y", strtotime($row['fechaNeumR2'])));   
                        $hojaActual-> setCellValue('BO'.$fila,date("d/m/Y", strtotime($row['fechaCovidD1'])));   
                        $hojaActual-> setCellValue('BP'.$fila,date("d/m/Y", strtotime($row['fechaCovidD2'])));   
                        $hojaActual-> setCellValue('BQ'.$fila,date("d/m/Y", strtotime($row['fechaCovidD3'])));
                        $hojaActual-> setCellValue('BR'.$fila,date("d/m/Y", strtotime($row['fechaCovidD4'])));

                        /*switch($ccostos){
                            case "2600":

                                break;
                        }*/
                
                    }
                
                /*header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');              
                header('Cache-Control: max-age=0');
                header('Content-Disposition: attachment;filename=Formato 006.xlsx');*/
                $writer = new Xlsx($spreadsheet); 
                $writer->save('../formatos/Formato 006.xlsx');
                //$content = file_get_contents('Formato 006.xlsx');
                
                //exit($content);

                $respuesta = true;
                exit;
            }else{
                $respuesta = false;
            }

            return $respuesta;
        } catch(PDOException $th) {
            echo $th->getMessage();
            return false;
        }
    }
?>