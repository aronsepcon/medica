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
                    f_retiro,clinica,observaciones,f_envr,fechaFbrAmarilla,fechaDifTD1,fechaDifTD2,fechaDifTD3,fechaDifTR1 FROM vista_formato_006";
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
            $hojaActual->setCellValue("M7","FECHA EMO");
            $hojaActual->setCellValue("N7","CLINICA");
            $hojaActual->setCellValue("O7",utf8_decode("CONDICIÓN"));
            $hojaActual->setCellValue("P7","VALORACION NUTRICIONAL");
            $hojaActual->setCellValue("P8","PESO");
            $hojaActual->setCellValue("Q8","TALLA");
            $hojaActual->setCellValue("R8","IMC");
            $hojaActual->setCellValue("S8","CLASIFICACION");
            $hojaActual->setCellValue("T7","ENVIO DE EMO EMAIL");
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
            $hojaActual->setCellValue("AN7","REALIZADO");
            $hojaActual->setCellValue("AO7",utf8_decode("CLÍNICA"));
            $hojaActual->setCellValue("AP7",utf8_decode("OBSERVACIÓNES"));
            $hojaActual->setCellValue("AQ7","ENVIO DE EMO EMAIL");
            $hojaActual->setCellValue("AR6","FIEBRE AMARILLA");
            $hojaActual->setCellValue("AR7","1RA DOSIS");
            $hojaActual->setCellValue("AS6","DIFTERIA TETANO");
            $hojaActual->setCellValue("AS7","1RA DOSIS");
            $hojaActual->setCellValue("AT7","2DA DOSIS");
            $hojaActual->setCellValue("AU7","3RA DOSIS");
            $hojaActual->setCellValue("AV7","REFUERZO");

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
            $hojaActual->mergeCells("M7:M8");
            $hojaActual->mergeCells("N7:N8");
            $hojaActual->mergeCells("O7:O8");
	        $hojaActual->mergeCells("P7:S7");
            $hojaActual->mergeCells("T7:T8");
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
            $hojaActual->mergeCells("AN7:AN8");
            $hojaActual->mergeCells("AO7:AO8");
            $hojaActual->mergeCells("AP7:AP8");
            $hojaActual->mergeCells("AQ7:AQ8");
            $hojaActual->mergeCells("AR7:AR8");
            $hojaActual->mergeCells("AS6:AV6");
            $hojaActual->mergeCells("AS7:AS8");
            $hojaActual->mergeCells("AT7:AT8");
            $hojaActual->mergeCells("AU7:AU8");
            $hojaActual->mergeCells("AV7:AV8");



            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();
            if ($rowCount > 0) {
                foreach($result as $row) {
                    $r++;
                    $fila++;
                        $hojaActual-> setCellValue('A'.$fila,$r);
                        $hojaActual-> setCellValue('B'.$fila,utf8_decode($row['empleadonomb']));
                        $hojaActual-> setCellValue('C'.$fila,date("d/m/Y", strtotime($row['fecnac'])));
                        $hojaActual-> setCellValue('D'.$fila,$row['dni']);
                        $hojaActual-> setCellValue('E'.$fila,$row['edad']);
                        $hojaActual-> setCellValue('F'.$fila,utf8_decode($row['ccostos']));
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