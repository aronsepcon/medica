<?php
    session_start();//sin esto no jala el $_Session, recuerda eso
    require_once("connectmedica.inc.php");

    if(isset($_POST['funcion'])){
        if($_POST['funcion']=="formato"){
            echo json_encode(formato($pdo));
        }
    }

    function formato($pdo){
        try {
            $r = 0;
            $respuesta = false;
            $lista = [];
            $sql = "SELECT empleadonomb,fecnac,dni,edad,ccostos,cargo,correo,telefono,grupoSangre,alergias,fecha,nomb_clinica,aptitud,peso,talla,imc,estadoNutricional,enviado,
                    programadopre,f_per1,f_cln1,f_act1,f_pes1,f_tal1,f_imc1,f_est1,f_env1,programado1,f_per2,f_cln2,f_act2,f_pes2,f_tal2,f_imc2,f_est2,f_env2,programado2,
                    f_retiro,clinica,observaciones,f_envr,fechaFbrAmarilla,fechaDifTD1,fechaDifTD2,fechaDifTD3,fechaDifTR1 FROM vista_formato_006";
            $statement = $pdo->prepare($sql);
            $statement ->execute();
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();
            if  ($rowCount > 0) {
                foreach($result as $row) {
                    $r++;
                    $salida = array(
                        "N°" => $r,
                        "Nombres" => $row['empleadonomb'],
                        "FechaNacimiento" =>date("d/m/Y", strtotime($row['fecnac'])),
                        "dni" => $row['dni'],
                        "edad" => $row['edad'],
                        "area" => $row['ccostos'],
                        "cargo" => $row['cargo'],
                        "Empresa" => "SEPCON",
                        "Correo" => $row['correo'],
                        "Telefono" => $row['telefono'],
                        "grupoSangre" => $row['grupoSangre'],
                        "Alergias" => $row['alergias'],
                        "Fecha" =>date("d/m/Y", strtotime($row['fecha'])),
                        "Clinica" => $row['nomb_clinica'],
                        "Aptitud" => $row['aptitud'],
                        "Peso" => $row['peso'],
                        "Talla" => $row['talla'],
                        "Imc" => $row['imc'],
                        "EstadoNutricion" => $row['estadoNutricional'],
                        "Enviado" => $row['enviado'],
                        "Programado1" => date("d/m/Y", strtotime($row['programadopre'])),
                        "fecha_p1" =>date("d/m/Y", strtotime($row['f_per1'])),
                        "clinica_p1" => $row['f_cln1'],
                        "Aptitud_p1" => $row['f_act1'],
                        "Peso_p1" => $row['f_pes1'],
                        "Talla_p1" => $row['f_tal1'],
                        "Imc_p1" => $row['f_imc1'],
                        "EstNutricion_p1" => $row['f_est1'],
                        "enviado_p1" => $row['f_env1'],
                        "Programado2" => date("d/m/Y", strtotime($row['programado1'])),
                        "fecha_p2" =>date("d/m/Y", strtotime($row['f_per2'])),
                        "clinica_p2" => $row['f_cln2'],
                        "Aptitud_p2" => $row['f_act2'],
                        "Peso_p2" => $row['f_pes2'],
                        "Talla_p2" => $row['f_tal2'],
                        "Imc_p2" => $row['f_imc2'],
                        "EstNutricion_p2" => $row['f_est2'],
                        "enviado_p2" => $row['f_env2'],
                        "Programado3" => date("d/m/Y", strtotime($row['programado2'])),
                        "fecha_r" =>date("d/m/Y", strtotime($row['f_retiro'])),
                        "Clinica_r" => $row['clinica'],
                        "obs_r" => $row['observaciones'],
                        "enviado_r" => $row['f_envr'],
                        "fechaFAmarill" => $row['fechaFbrAmarilla'],
                        "fechaDT1" =>date("d/m/Y", strtotime($row['fechaDifTD1'])),
                        "fechaDT2" =>date("d/m/Y", strtotime($row['fechaDifTD2'])),
                        "fechaDT3" =>date("d/m/Y", strtotime($row['fechaDifTD3'])),
                        "fechaR1" =>date("d/m/Y", strtotime($row['fechaDifTR1'])),
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
?>