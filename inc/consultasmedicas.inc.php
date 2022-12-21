<?php
    session_start();//sin esto no jala el $_Session, recuerda eso
    require_once("connectmedica.inc.php");

    if(isset($_POST['funcion'])){
        if ($_POST['funcion'] == "listarExamenes"){
            echo json_encode(listarExamenes($pdo,$_POST["documento"]));
        }else if($_POST['funcion'] == "datosCorreo"){
            echo json_encode(datosCorreo($pdo,$_POST['documento']));
        }else if ($_POST['funcion'] == "enviarCorreo"){
            echo json_encode(enviarCorreo($pdo,$_POST['examen'],
                                        $_POST['nombre'],
                                        $_POST['direccion'],
                                        $_POST['clinica'],
                                        $_POST['fecha'],
                                        $_POST['asunto'],
                                        $_POST['adjunto']));
        }else if ($_POST['funcion'] == "listarConsultas"){
            echo json_encode(listarConsultas($pdo,$_POST["documento"]));
        }else if($_POST['funcion'] == "validarEnvio"){
            echo json_encode(validarEnvio($pdo, $_POST['examen']));
        }else if($_POST['funcion'] == "datosVacunacion"){
            echo json_encode(datosVacunacion($pdo,$_POST["documento"]));
        }
        else if($_POST['funcion'] == "buscarImagen"){
            echo json_encode(buscarImagen($pdo,$_POST["documento"],$_POST["validacion"]));
        }
        else if($_POST['funcion'] =="crearDatosVac"){
            echo json_encode(crearDatosVac($pdo,$_POST["documento"]));
        }else if($_POST['funcion'] == "buscarEnvio"){
            echo json_encode(buscarEnvio($pdo, $_POST['examen']));
        }
        else if($_POST['funcion'] == "actualizarExamen"){
            echo json_encode(actualizarExamen($pdo, $_POST['examen']));
        }
        else if($_POST['funcion'] == "actualizarPase"){
            echo json_encode(actualizarPase($pdo,$_POST['num_pase'],
                                        $_POST['lote56'],$_POST['obs_pase'],
                                        $_POST['nombre'],$_POST['documento'],
                                        $_POST['clinicaEmoA'],$_POST['clinica'],
                                        $_POST['fecha_emo'],
                                        $_POST['fecha_emop'],$_POST['validaEmoP'],
                                        $_POST['fecha_vigencia'],$_POST['medica_motivo_txt'],
                                        $_POST['lote88'],
                                        $_POST['pisco'],$_POST['id']));
        }else if($_POST['funcion'] == "enviarPase"){
            echo json_encode(enviarPase($pdo,$_POST['num_pase'],
                                        $_POST['lote56'],$_POST['obs_pase'],
                                        $_POST['nombre'],$_POST['documento'],
                                        $_POST['grupo_sangre'],$_POST['alergias'],
                                        $_POST['clinicaEmoA'],$_POST['clinica'],
                                        $_POST['fecha_emo'],
                                        $_POST['fecha_emop'],$_POST['fecha_vigencia'],
                                        $_POST['medica_motivo_txt'],$_POST['lote88'],
                                        $_POST['pisco'],));
        }else if($_POST['funcion'] == "listarPases"){
            echo json_encode(listarPases($pdo,$_POST["documento"]));
        }else if($_POST['funcion'] == "actualizarEmpleado"){
            echo json_encode(actualizarEmpleado($pdo,$_POST['cut'],
                                                $_POST['empleado'],$_POST['correo'],
                                                $_POST['dni'],$_POST['cargo'],
                                                $_POST['ccostos'],$_POST['edad'],
                                                $_POST['sede'],$_POST['sexo'],
                                                $_POST['fecnac'],$_POST['estado'],
                                                $_POST['direccion'],$_POST['telefono'],$_POST['empresa']));
        }else if($_POST['funcion'] == "datosEmpleados"){
            echo json_encode(datosEmpleados($pdo,$_POST['doc']));
        }else if($_POST['funcion'] == "historiaClinica"){
            echo json_encode(historiaClinica($pdo,$_POST['documento'],$_POST['id']));
        }
        else if($_POST['funcion'] == "listaSubContratas"){
            echo json_encode(listaSubContratas($pdo));
        }
    }

    function enviarCorreo($pdo,$id,$nombre,$correo,$clinica,$fecha,$asunto,$adjunto){
        try {
            require_once("../PHPMailer/PHPMailerAutoload.php");
            $respuesta = false;
            $enviado = false;

            $nombre_remitente = utf8_decode("Examenes Médicos");

            switch($_SESSION['acceso']){
                case 1:
                    if(trim($_SESSION['sede'])=='LIMA'){
                        $correo_remitente = "enfermerialima@sepcon.net";
                    }
                    else if(trim($_SESSION['sede'])=='MALVINAS'){
                        $correo_remitente = "enfermeriamalvinas@sepcon.net";
                    }
                    else if(trim(($_SESSION['sede']))=='PISCO'){
                        $correo_remitente = "enfermeriapisco@sepcon.net";
                    }
                    break;
                case 2: 
                    if(trim($_SESSION['sede'])=='LIMA'){
                        $correo_remitente = "svela@sepcon.net" ;
                    }
                    else if(trim($_SESSION['sede'])=='MALVINAS'){
                        $correo_remitente = "saludmalvinas@sepcon.net";
                    }
                    break;
                default:    
                    $correo_remitente = "examenesmedicos@sepcon.net";
            }
            
            //$correo_remitente = "examenesmedicos@sepcon.net";//$_session['sede'] y $_session['acceso']   1 --- enfermeria/2 --- medicos/ //3 --- admin (zarai y saul)
            $destino = $correo;
            $title = utf8_decode($asunto);
            $entrada = "b9Vz0Ho7Uu7Kj9Z";//cambiar la clave

            //Create a new PHPMailer instance
            $mail = new PHPMailer;
            //Tell PHPMailer to use SMTP
            $mail->isSMTP();
            //Enable SMTP debugging
            // 0 = off (for production use)
            // 1 = client messages
            // 2 = client and server messages
            $mail->SMTPDebug = 0;
            //Ask for HTML-friendly debug output
            $mail->Debugoutput = 'html';
            //Set the hostname of the mail server
            $mail->Host = 'mail.sepcon.net';
            //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
            $mail->Port = 587;
            //Set the encryption system to use - ssl (deprecated) or tls
            //$mail->SMTPSecure = 'tls';
            //Custom connection options
            $mail->SMTPOptions = array (
                'ssl' => array(
                    'verify_peer'  => true,
                    'verify_depth' => 3,
                    'allow_self_signed' => true,
                    'peer_name' => 'mail.sepcon.net',
                )
            );
            //Whether to use SMTP authentication
            $mail->SMTPAuth = true;
            //Username to use for SMTP authentication - use full email address for gmail
            $mail->Username = "documentos_sistema@sepcon.net";
            $mail->Password = $entrada;                         
            //Set who the message is to be sent from
            $mail->setFrom($correo_remitente,$nombre_remitente);
            //$mail->addAddress($destino,$nombre);
            //$mail->addAddress('Exámenes Medicos','examenesmedicos@sepcon.net');
            
            $mail->addAddress($destino,$correo);//aca iba el correo de cesar mas no iba a un destino fijo
            $mail->addCC('examenesmedicos@sepcon.net','Exámenes Medicos');

            $mail->Subject = utf8_decode($asunto);

            $clinica = strtoupper($clinica);

            $message  = "<html><body>";
            $message .= "<p>Estimad@ $nombre</p>";
            $message .= "<p>Por la presente y en cumplimiento de lo <strong>Establecido en la Ley 29783 Art. 49 y 71, además de la DS-011-2019-TR en su Art. 13</strong>, se adjunta el Legajo de su Examen Médico Ocupacional realizado:</p>"; 
            $message .= "<p>Fecha : $fecha</p>";
            $message .= "<p>Clínica :  $clinica</p>";
            $message .= "<p>Tener en consideración los Diagnósticos y Recomendaciones que se encuentra detallado en su examen médico.</p>";
            $message .= "<p><span style='color:red;'>Favor de confirmar la recepción del email con copia a</span>
                            <span style='color:blue;'>examenesmedicos@sepcon.net</span>
                        </p>";
            $message .= "<p>Saludos</p>";
            $message .= "</body></html>"; 

            $mail->Subject = $title;
            $mail->msgHTML(utf8_decode($message));
            $mail->AddAttachment('../hc/'.$adjunto);

            //Enviamos el Mensaje 
            if($mail->send()){
                $actualizados = actualizarExamen($pdo,$id);
                $respuesta = true;
                $enviado = true;
                $mail->ClearAddresses();
            }/*else{
                $mail -> addCC('arondlacruz@hotmail.com','rebote');
            }*/

            return array("respuesta"=>$respuesta,
                        "enviado"=>$enviado,
                        "adjunto"=>$adjunto,
                        "actualizado"=> $actualizados
                        );//crear nueva pestaña para correos, ver como validar y enviar
        } catch (PDOException $th) {
            echo $th->getMessage();
            return false;
        }
    }

    function buscarAdjunto($pdo,$id){//para mostrar el adjunto cuando no esta de forma local
        try {
            $sql = "SELECT fichas_api.adjunto 
                    FROM
                        fichas_api 
                    WHERE
                        fichas_api.idreg = ? ";
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($id));
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();
            if($rowCount>0){
                return $result[0]['adjunto'];
            }
        } catch (PDOException $th) {
            echo $th->getMessage();
            return false;
        }
    }

    function actualizarExamen($pdo,$id){///pasar el nuevo correo a la hora de editar u:
        try {
            $sql = "UPDATE fichas_api SET enviado = 1 WHERE idreg = ?";
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($id));
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();
            return $rowCount;
        } catch (PDOException $th) {
            echo $th->getMessage();
            return false;
        }
    }

    function buscarEnvio($pdo,$id){
      //  try {
            $respuesta  = false;
            $mensaje    = "No existe el nuemro de documento";
            $clase      = "msj_error";
            $sql = "SELECT fichas_api.enviado FROM fichas_api WHERE idreg = ?";
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($id));
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();
            if($rowCount>0){
                $respuesta = array(
                    "respuesta"  => true,
                    "clase"      =>"msj_correct",
                    "error"      =>"no hay error",
                    "enviado"    => $result[0]['enviado'],
                );
            }else{
                $respuesta = array(
                    "respuesta" => $respuesta,
                    "clase"   => $clase,
                    "error"     => $mensaje
                );
            }

            return $respuesta;

      /*  } catch (PDOException $th) {
            echo $th->getMessage();
            return false;
        }*/
    }

    function validarEnvio($pdo,$id){//ver porq no actualiza xc, doble opcion
        try{
            $respuesta = false;
            $lista = [];
            $sql = "UPDATE fichas_api SET enviado = NULL  WHERE idreg = ?";//probar con 0
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($id));
        }catch(PDOException $th) {
            echo $th->getMessage();
            return false;
        }
    }

    function listarExamenes($pdo,$doc){
        try {
            $respuesta = false;
            $lista = [];
            $sql ="SELECT
                        fichas_api.tipoExa, 
                        fichas_api.fecha, 
                        fichas_api.aptitud,
                        fichas_api.reco1, 
                        fichas_api.observaciones,
                        fichas_api.idreg,
                        fichas_api.adjunto,
                        fichas_api.enviado,
                        fichas_api.alergias,
                        fichas_api.grupoSangre,
                        fichas_api.dni,
                        lista_clinicas.nomb_clinica,
                        fichas_api.paciente,
                        fichas_api.centroCosto
                    FROM
                        fichas_api 
                    LEFT JOIN 
                        lista_clinicas 
                    ON
                        fichas_api.clinica=lista_clinicas.id
                    WHERE
                        fichas_api.dni = ? 
                    ORDER BY
                        fichas_api.fecha DESC";
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($doc));
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();

            if ($rowCount > 0) {
                foreach($result as $row) {
                    $salida = array("ccostos"=>$row['centroCosto'], 
                                    "tipo"=>$row['tipoExa'], 
                                    "fecha"=>date("d/m/Y", strtotime($row['fecha'])),
                                    "fecha_emo" => $row['fecha'],
                                    "aptitud"=>$row['aptitud'],
                                    "recomendaciones"=>$row['reco1'],
                                    "restricciones"=>$row['observaciones'],
                                    "enviado"=>$row['enviado'],
                                    "adjunto"=>$row['adjunto'],
                                    "alergias"=>$row['alergias'],
                                    "sangre"=>$row['grupoSangre'],
                                    "id"=>$row['idreg'],
                                    "clinica"=>$row['nomb_clinica'],
                                    "paciente"=>$row['paciente'],
                                    "dni"=>trim($row['dni'])
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
        } catch (PDOException $th) {
            echo "Error: " . $th->getMessage();
            return false;
        }
    }

    function datosCorreo($pdo,$documento){
        
    }

    function listarConsultas($pdo,$doc){
        try{
            $respuesta = false;
            $lista = [];
            $retiroo =  'RETIRO';
            //cambiar la consulta de aqui
            $sql ="SELECT   
                fichas_api.tipoExa, 
                fichas_api.fecha, 
                fichas_api.aptitud,
                fichas_api.reco1, 
                fichas_api.observaciones,
                fichas_api.idreg,
                fichas_api.adjunto,
                fichas_api.enviado,
                fichas_api.alergias,
                fichas_api.grupoSangre,
                fichas_api.clinica,
                fichas_api.paciente
            FROM
                fichas_api 
            WHERE
                fichas_api.dni = ? 
            ORDER BY fichas_api.fecha DESC, CASE WHEN fichas_api.tipoExa = ? THEN 3 ELSE 1 END ASC";//PROBAR CON LIKE
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($doc,$retiroo));
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount(); //hassta maso por aqi

            if ($rowCount>0){
                foreach($result as $row){       //cambiar las columnas a usar        
                    $salida = array("id"=>$row['idreg'],
                                    "tipo"=>$row['tipoExa'], 
                                    "fecha"=>date("d/m/Y", strtotime($row['fecha'])),
                                    "recomendaciones"=>$row['reco1'],
                                    "restricciones"=>$row['observaciones'],
                                    "alergias"=>$row['alergias'],
                                    "adjunto"=>$row['adjunto']);
                    array_push($lista, $salida);
                }
                $respuesta = true;
            }else{
                $respuesta = false;
            }

            $salida = array("respuesta"=>$respuesta,
                            "lista" => $lista);

            return $salida; 
        }catch(PDOException $th){
            echo "Error: " . $th->getMessage();
            return false;
        }
    }

    function crearDatosVac($pdo,$doc){
        try {
            $sql="INSERT INTO fichas_vacunacion SET dni=?";
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($doc));
        } catch (PDOException $th) {
            echo $th->getMessage();
            return false;
        }
    }

    function datosVacunacion($pdo,$doc){
        $respuesta  = false;
        $mensaje    = "No existe el nuemro de documento";
        $clase      = "msj_error";
        $sql        = "SELECT 
                            fechaFbrAmarilla,fechaDifTD1,fechaDifTD2,fechaDifTD3,fechaDifTR1,fechaDifTR2,fechaHepAD1,fechaHepAD2,fechaHepAR1,fechaHepAR2,fechaHepBD1,
                            fechaHepBD2,fechaHepBD3,fechaInflR1,fechaInflR2,fechaPolioD1,fechaTrivD1,fechaRabD1,fechaRabD2,fechaRabD3,fechaRabR1,fechaRabR2,fechaTifoR1,
                            fechaTifoR2,fechaNeumR1,fechaNeumR2,fechaCovidD1,fechaCovidD2,fechaCovidD3,fechaCovidD4,
                            adjuntoFbrAmarilla,adjuntoDifTD1,adjuntoDifTD2,adjuntoDifTD3,adjuntoDifTR1,adjuntoDifTR2,adjuntoDifTR3,adjuntoDifTR4,adjuntoHepAD1,adjuntoHepAD2,
                            adjuntoHepAR1,adjuntoHepAR2,adjuntoHepAR3,adjuntoHepAR4,adjuntoHepBD1,
                            adjuntoHepBD2,adjuntoHepBD3,adjuntoInflR1,adjuntoPolioD1,adjuntoTrivD1,adjuntoRabD1,adjuntoRabD2,adjuntoRabD3,adjuntoRabR1,
                            adjuntoRabR2,adjuntoRabR3,adjuntoRabR4,adjuntoRabR5,adjuntoRabR6,adjuntoRabR7,
                            adjuntoTifoR1,adjuntoTifoR2,adjuntoTifoR3,adjuntoTifoR4,adjuntoNeumR1,adjuntoNeumR2,adjuntoNeumR3,adjuntoNeumR4,
                            adjuntoCovidD1,adjuntoCovidD2,adjuntoCovidD3,adjuntoCovidD4
                        FROM 
                            fichas_vacunacion 
                        WHERE 
                            dni=?";//si falta uno de estos datos en la tabla dara error
        $statement = $pdo->prepare($sql);
        $statement ->execute(array($doc));
        $result = $statement ->fetchAll();
        $rowCount = $statement -> rowcount();
        if ($rowCount > 0) {
            $respuesta = array(
                "respuesta" => true,
                "clase"     =>"msj_correct",
                "error"     =>"no hay error",
                "fecha"     =>$result[0]['fechaFbrAmarilla'],
                "fechaDTD1" =>$result[0]['fechaDifTD1'],
                "fechaDTD2" =>$result[0]['fechaDifTD2'],
                "fechaDTD3" =>$result[0]['fechaDifTD3'],
                "fechaDTR1" =>$result[0]['fechaDifTR1'],
                "fechaDTR2" =>$result[0]['fechaDifTR2'],
                "fechaHAD1" =>$result[0]['fechaHepAD1'],
                "fechaHAD2" =>$result[0]['fechaHepAD2'],
                "fechaHAR1" =>$result[0]['fechaHepAR1'],
                "fechaHAR2" =>$result[0]['fechaHepAR2'],
                "fechaHBD1" =>$result[0]['fechaHepBD1'],
                "fechaHBD2" =>$result[0]['fechaHepBD2'],
                "fechaHBD3" =>$result[0]['fechaHepBD3'],
                "fechaIFR1" =>$result[0]['fechaInflR1'],
                "fechaIFR2" =>$result[0]['fechaInflR2'],
                "fechaPLD1" =>$result[0]['fechaPolioD1'],
                "fechaTVD1" =>$result[0]['fechaTrivD1'],
                "fechaRBD1" =>$result[0]['fechaRabD1'],
                "fechaRBD2" =>$result[0]['fechaRabD2'],
                "fechaRBD3" =>$result[0]['fechaRabD3'],
                "fechaRBR1" =>$result[0]['fechaRabR1'],
                "fechaRBR2" =>$result[0]['fechaRabR2'],
                "fechaTFR1" =>$result[0]['fechaTifoR1'],
                "fechaTFR2" =>$result[0]['fechaTifoR2'],
                "fechaNMR1" =>$result[0]['fechaNeumR1'],
                "fechaNMR2" =>$result[0]['fechaNeumR2'],
                "fechaCVD1" =>$result[0]['fechaCovidD1'],
                "fechaCVD2" =>$result[0]['fechaCovidD2'],
                "fechaCVD3" =>$result[0]['fechaCovidD3'],
                "fechaCVD4" =>$result[0]['fechaCovidD4'],
                "adjuntoFbrAmarilla" =>$result[0]['adjuntoFbrAmarilla'],
                "adjuntoDifTD1" =>$result[0]['adjuntoDifTD1'],
                "adjuntoDifTD2" =>$result[0]['adjuntoDifTD2'],
                "adjuntoDifTD3" =>$result[0]['adjuntoDifTD3'],
                "adjuntoDifTR1" =>$result[0]['adjuntoDifTR1'],
                "adjuntoDifTR2" =>$result[0]['adjuntoDifTR2'],
                "adjuntoDifTR3" =>$result[0]['adjuntoDifTR3'],
                "adjuntoDifTR4" =>$result[0]['adjuntoDifTR4'],
                "adjuntoHepAD1" =>$result[0]['adjuntoHepAD1'],
                "adjuntoHepAD2" =>$result[0]['adjuntoHepAD2'],
                "adjuntoHepAR1" =>$result[0]['adjuntoHepAR1'],
                "adjuntoHepAR2" =>$result[0]['adjuntoHepAR2'],
                "adjuntoHepAR3" =>$result[0]['adjuntoHepAR3'],
                "adjuntoHepAR4" =>$result[0]['adjuntoHepAR4'],
                "adjuntoHepBD1" =>$result[0]['adjuntoHepBD1'],
                "adjuntoHepBD2" =>$result[0]['adjuntoHepBD2'],
                "adjuntoHepBD3" =>$result[0]['adjuntoHepBD3'],
                "adjuntoInflR1" =>$result[0]['adjuntoInflR1'],
                "adjuntoPolioD1" =>$result[0]['adjuntoPolioD1'],
                "adjuntoTrivD1" =>$result[0]['adjuntoTrivD1'],
                "adjuntoRabD1" =>$result[0]['adjuntoRabD1'],
                "adjuntoRabD2" =>$result[0]['adjuntoRabD2'],
                "adjuntoRabD3" =>$result[0]['adjuntoRabD3'],
                "adjuntoRabR1" =>$result[0]['adjuntoRabR1'],
                "adjuntoRabR2" =>$result[0]['adjuntoRabR2'],
                "adjuntoRabR3" =>$result[0]['adjuntoRabR3'],
                "adjuntoRabR4" =>$result[0]['adjuntoRabR4'],
                "adjuntoRabR5" =>$result[0]['adjuntoRabR5'],
                "adjuntoRabR6" =>$result[0]['adjuntoRabR6'],
                "adjuntoRabR7" =>$result[0]['adjuntoRabR7'],
                "adjuntoTifoR1" =>$result[0]['adjuntoTifoR1'],
                "adjuntoTifoR2" =>$result[0]['adjuntoTifoR2'],
                "adjuntoTifoR3" =>$result[0]['adjuntoTifoR3'],
                "adjuntoTifoR4" =>$result[0]['adjuntoTifoR4'],
                "adjuntoNeumR1" =>$result[0]['adjuntoNeumR1'],
                "adjuntoNeumR2" =>$result[0]['adjuntoNeumR2'],
                "adjuntoNeumR3" =>$result[0]['adjuntoNeumR3'],
                "adjuntoNeumR4" =>$result[0]['adjuntoNeumR4'],
                "adjuntoCovidD1" =>$result[0]['adjuntoCovidD1'],
                "adjuntoCovidD2" =>$result[0]['adjuntoCovidD2'],
                "adjuntoCovidD3" =>$result[0]['adjuntoCovidD3'],
                "adjuntoCovidD4" =>$result[0]['adjuntoCovidD4'],
            );
        }else{
            $respuesta = array("respuesta"=>$respuesta,
                                "mensaje"=>$mensaje,
                                "clase"=>$clase,
                                "sql" =>$statement);
        }
        return $respuesta;
    }

    function listarPases($pdo,$doc){
        try {
            $respuesta = false;
            $lista = [];
            $sql="SELECT id,fechaEmoP1,clinica,fechaEmoA1,fechaEmoA2,fechaEmoA3,
                    clinicaEmoA1,clinicaEmoA2,clinicaEmoA3,
                    numPase,fechaVigencia,motivotexto,adjuntoPase,lot56,lot88,lotpisco,observacion 
                    FROM pase_medico WHERE dni=?";
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($doc));
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();
            if($rowCount > 0){
                foreach($result as $row) {
                    $salida = array("id"=>$row['id'],
                                    "clinica"=>$row['clinica'],
                                    "fechaEmoP1" => $row['fechaEmoP1'],
                                    "fechaEmo" => $row['fechaEmoA1'],
                                    "fechaEmo2" => $row['fechaEmoA2'],
                                    "fechaEmo3" => $row['fechaEmoA3'],
                                    "clinicaEmoA1" => $row['clinicaEmoA1'],
                                    "clinicaEmoA2" => $row['clinicaEmoA2'],
                                    "clinicaEmoA3" => $row['clinicaEmoA3'],
                                    "numero_pase"=>$row['numPase'],
                                    "fecha_vigencia"=>$row['fechaVigencia'],
                                    "motivotexto"=>$row['motivotexto'],
                                    "adjunto_pase" =>$row['adjuntoPase'],
                                    "lote56"=>$row['lot56'],
                                    "lote88"=>$row['lot88'],
                                    "lotepisco"=>$row['lotpisco'],
                                    "obs_pase" =>$row['observacion']);
                    array_push($lista,$salida);
                }
                $respuesta = true;
            }else{
                $respuesta = false;
            }
            $salida = array("respuesta" =>$respuesta,
                                "lista" => $lista);

            return $salida; 
        } catch  (PDOException $th) {
            echo "Error: " . $th->getMessage();
            return false;
        }
    }

    function buscarImagen($pdo,$doc,$validacion){
        $respuesta  = false;
        $mensaje    = "No existe el nuemro de documento";
        $clase      = "msj_error";
        switch($validacion){
            case "fiebre amarilla":
                $sql = "SELECT adjuntoFbrAmarilla as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "difteTet_D1":
                $sql = "SELECT adjuntoDifTD1 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "difteTet_D2":
                $sql = "SELECT adjuntoDifTD2 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "difteTet_D3":
                $sql = "SELECT adjuntoDifTD3 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;    
            case "difteTet_R1":
                $sql = "SELECT adjuntoDifTR1 as adjunto1,adjuntoDifTR2 as adjunto2,adjuntoDifTR3 as adjunto3,adjuntoDifTR4 as adjunto4 FROM fichas_vacunacion WHERE dni=?";
                break;
            case "HepatitisA_D1":
                $sql = "SELECT adjuntoHepAD1 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "HepatitisA_D2":
                $sql = "SELECT adjuntoHepAD2 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "HepatitisA_R1":
                $sql = "SELECT adjuntoHepAR1 as adjunto1,adjuntoHepAR2 as adjunto2,adjuntoHepAR3 as adjunto3,adjuntoHepAR4 as adjunto4 FROM fichas_vacunacion WHERE dni=?";
                break;
            case "HepatitisB_D1":
                $sql = "SELECT adjuntoHepBD1 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "HepatitisB_D2":
                $sql = "SELECT adjuntoHepBD2 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "HepatitisB_D3":
                $sql = "SELECT adjuntoHepBD3 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "Influenza_R1":
                $sql = "SELECT adjuntoInflR1 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "Polio_D1":
                $sql = "SELECT adjuntoPolioD1 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "Trivirica_D1":
                $sql = "SELECT adjuntoTrivD1 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "Rabia_D1":
                $sql = "SELECT adjuntoRabD1 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "Rabia_D2":
                $sql = "SELECT adjuntoRabD2 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "Rabia_D3":
                $sql = "SELECT adjuntoRabD3 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "Rabia_R1":
                $sql = "SELECT adjuntoRabR1 as adjunto1,adjuntoRabR2 as adjunto2,adjuntoRabR3 as adjunto3,adjuntoRabR4 as adjunto4,
                        adjuntoRabR5 as adjunto5,adjuntoRabR6 as adjunto6,adjuntoRabR7 as adjunto7 FROM fichas_vacunacion WHERE dni=?";
                break;
            case "Tifoidea_R1":
                $sql = "SELECT adjuntoTifoR1 as adjunto1,adjuntoTifoR2 as adjunto2,adjuntoTifoR3 as adjunto3,adjuntoTifoR4 as adjunto4 FROM fichas_vacunacion WHERE dni=?";
                break;
            case "Neumococo_R1":
                $sql = "SELECT adjuntoNeumR1 as adjunto1,adjuntoNeumR2 as adjunto2, adjuntoNeumR3 as adjunto3, adjuntoNeumR4 as adjunto4  FROM fichas_vacunacion WHERE dni=?";
                break;
            case "COVID_D1":
                $sql = "SELECT adjuntoCovidD1 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "COVID_D2":
                $sql = "SELECT adjuntoCovidD2 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "COVID_D3":
                $sql = "SELECT adjuntoCovidD3 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "COVID_D4":
                $sql = "SELECT adjuntoCovidD4 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            }
        $statement = $pdo->prepare($sql);
        $statement ->execute(array($doc));
        $result = $statement ->fetchAll();
        $rowCount = $statement -> rowcount();
        if ($rowCount > 0) {
            switch($validacion){
                case "Tifoidea_R1":
                case "difteTet_R1":
                case "HepatitisA_R1":
                case "Neumococo_R1":
                    $respuesta = array(
                        "respuesta" => true,
                        "clase"     =>"msj_correct",
                        "error"     =>"no hay error",
                        "caso"      =>$validacion,
                        "adjunto"   => array($result[0]['adjunto1'],$result[0]['adjunto2'],$result[0]['adjunto3'],$result[0]['adjunto4'])
                    );
                    break;
                case "Rabia_R1":
                    $respuesta = array(
                        "respuesta" => true,
                        "clase"     =>"msj_correct",
                        "error"     =>"no hay error",
                        "caso"      =>$validacion,
                        "adjunto"   => array($result[0]['adjunto1'],$result[0]['adjunto2'],$result[0]['adjunto3'],$result[0]['adjunto4']
                                            ,$result[0]['adjunto5'],$result[0]['adjunto6'],$result[0]['adjunto7'])
                    );
                    break;
                default:
                    $respuesta = array(
                        "respuesta" => true,
                        "clase"     =>"msj_correct",
                        "error"     =>"no hay error",
                        "adjunto"    => $result[0]['adjunto']
                    );
                    break;
            }
        }else{
            $respuesta = array("respuesta"=>$respuesta,
                                "mensaje"=>$mensaje,
                                "clase"=>$clase);
        }
        return $respuesta;

    }

    function actualizarPase($pdo,$cod,$lot56,$obs,$nombre,$doc,$clinicaEmoA,$clinica,$fechaEmo,$fechaEmoP,$validaEmoP,$fechaVigencia,$medica_motivo_txt,$lot88,$lotpisc,$id){//problemas U;
        try {
            $formatos = ["jpeg","jpg","png","pdf"];

            $adjunto = "no ha enviado el documento";
            $respuestaAdJ = true;

            $lote56 = ($lot56=="true") ? 1 : 0;
            $lote88 = ($lot88=="true") ? 1 : 0;//
            $pisco = ($lotpisc=="true") ? 1 : 0;

            $formato = explode(".",htmlspecialchars( basename($_FILES['subidaPase']["name"])));
            $i=0;
            $s="";
        
            foreach($formato as $fr){
                switch($formato[$i]){
                    case $formatos[0]:
                    case $formatos[1]:
                    case $formatos[2]:    
                    case $formatos[3]:    
                        $s = $formato[$i];
                    break;
                }
                $i++;
            }

            $archivos =  $_FILES['subidaPase'];
            $temporal	= $_FILES['subidaPase']['tmp_name'];

            switch($s){
                case $formatos[0]:
                case $formatos[1]:
                case $formatos[2]:
                    $nombres = "PM-".$nombre."-".$doc.".jpeg";
                    break;
                case $formatos[3]:
                    $nombres = "PM-".$nombre."-".$doc.".pdf";
                    break;
            }

          //  $fileId = $nombres;
        
            if (move_uploaded_file($temporal,"../pases/".$nombres)) {
                $adjunto = "archivo subido";
                $respuestaAdJ = true;
            }
            switch($validaEmoP){
                case "validacionEmoA1":
                    $sql ="UPDATE pase_medico SET numPase=?,lot56=?,observacion=?,clinicaEmoA1=?,clinica=?,fechaEmoA1=?,fechaEmoP1=?,fechaVigencia=?,motivotexto=?,lot88=?,lotpisco=?,adjuntoPase=? WHERE id=?";        
                    break;
                case "validacionEmoA2":
                    $sql ="UPDATE pase_medico SET numPase=?,lot56=?,observacion=?,clinicaEmoA2=?,clinica=?,fechaEmoA2=?,fechaEmoP1=?,fechaVigencia=?,motivotexto=?,lot88=?,lotpisco=?,adjuntoPase=? WHERE id=?";
                    break;
                case "validacionEmoA3":
                    $sql ="UPDATE pase_medico SET numPase=?,lot56=?,observacion=?,clinicaEmoA3=?,clinica=?,fechaEmoA3=?,fechaEmoP1=?,fechaVigencia=?,motivotexto=?,lot88=?,lotpisco=?,adjuntoPase=? WHERE id=?";
                    break;
            }
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($cod,$lote56,$obs,$clinicaEmoA,$clinica,$fechaEmo,$fechaEmoP,$fechaVigencia,$medica_motivo_txt,$lote88,$pisco,$nombres,$id));
            $respuesta = array("respuesta"  => true,
                                "clase"     =>"msj_correct",
                                "error"     =>"no hay error", 
                                "doc"       => $nombres,
                                "adjunto"   => $adjunto,
                                "resultado" => $lote88);
            return $respuesta;

        } catch (PDOException $th) {
            echo $th->getMessage();
            return false;
        }
    }


    function enviarPase($pdo,$cod,$lot56,$obs,$nombre,$doc,$grupoSangre,$alergias,$clinicaEmoA,$clinica,$fechaEmo,$fechaEmoP,$fechaVigencia,$medica_motivo_txt,$lot88,$lotpisc){
        try {
            $formatos = ["jpeg","jpg","png","pdf"];

            $lote56 = ($lot56=="true") ? 1 : 0;
            $lote88 = ($lot88=="true") ? 1 : 0;
            $pisco = ($lotpisc=="true") ? 1 : 0;

            $adjunto = "no ha enviado el documento";
            $respuestaAdJ = true;

            $formato = explode(".",htmlspecialchars( basename($_FILES['subidaPase']["name"])));
            $i=0;
            $s="";
        
            foreach($formato as $fr){
                switch($formato[$i]){
                    case $formatos[0]:
                    case $formatos[1]:
                    case $formatos[2]:    
                    case $formatos[3]:    
                        $s = $formato[$i];
                    break;
                }
                $i++;
            }
            $archivos =  $_FILES['subidaPase'];
            $temporal = $_FILES['subidaPase']['tmp_name'];

            switch($s){
                case $formatos[0]:
                case $formatos[1]:
                case $formatos[2]:
                    $nombres = "PM-".$nombre."-".$doc.".jpeg";
                    break;
                case $formatos[3]:
                    $nombres = "PM-".$nombre."-".$doc.".pdf";
                    break;
            }         
            
           // $fileId = $nombres;
            if (move_uploaded_file($temporal,"../pases/".$nombres)) {
                $adjunto = "archivo subido";
                $respuestaAdJ = true;
            }
            $id=uniqid();
            
            $sql = "INSERT INTO pase_medico SET id=?,numPase=?,lot56=?,observacion=?,nombre=?,dni=?,grupoSangre=?,alergias=?,clinicaEmoA1=?,clinica=?,fechaEmoA1=?,fechaEmoP1=?,fechaVigencia=?,motivotexto=?,lot88=?,lotpisco=?,adjuntoPase=?";
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($id,$cod,$lote56,$obs,$nombre,$doc,$grupoSangre,$alergias,$clinicaEmoA,$clinica,$fechaEmo,$fechaEmoP,$fechaVigencia,$medica_motivo_txt,$lote88,$pisco,$nombres));
            $respuesta = array("respuesta"  => true,
                                "clase"     =>"msj_correct",
                                "error"     =>"no hay error",
                                "doc"       => $nombres,
                                "adjunto"   => $adjunto,
                                "resultado" => $lote88);

            return $respuesta;

        }  catch (PDOException $th) {
            echo $th->getMessage();
            return false;
        }
    }

    function actualizarEmpleado($pdo,$cut,$empleado,$correo,$dni,$cargo,
        $ccostos,$edad,$sede,$sexo,$fecnac,$estado,$direccion,$telefono,$empresa){
            try {
                $sql = "INSERT INTO fichas_empleados SET cut=?,empleadonomb=?,correo=?,dni=?,cargo=?,
                    	    ccostos=?,edad=?,sede=?,sexo=?,fecnac=?,estado=?,direccion=?,telefono=?,empresa=?
                        ON DUPLICATE KEY UPDATE empleadonomb=?,correo=?,cargo=?,ccostos=?,edad=?,sede=?,
                            sexo=?,fecnac=?,estado=?,direccion=?,telefono=?,empresa=?";
                $statement = $pdo->prepare($sql);
                $statement ->execute(array($cut,$empleado,$correo,$dni,$cargo,$ccostos,$edad,$sede,
                                        $sexo,$fecnac,$estado,$direccion,$telefono,$empresa,$empleado,$correo,
                                        $cargo,$ccostos,$edad,$sede,$sexo,$fecnac,$estado,$direccion,
                                        $telefono,$empresa));
                $respuesta = array("respuesta"  => true,
                                    "clase"     =>"msj_correct",
                                    "error"     =>"no hay error", );
                return $respuesta;
        
            } catch (PDOException $th) {
                echo $th->getMessage();
                return false;
            }
    }

    function datosEmpleados($pdo,$doc){
        try {
            $respuesta = false;
            $lista = [];
            $sql = "SELECT 
                        fichas_empleados.cut,
                        fichas_empleados.dni,
                        fichas_empleados.empleadonomb,
                        fichas_empleados.fecnac,
                        fichas_empleados.correo,
                        fichas_empleados.sexo,
                        fichas_empleados.cargo,
                        fichas_empleados.ccostos,
                        fichas_empleados.sede,
                        fichas_empleados.estado,
                        fichas_empleados.direccion,
                        fichas_empleados.edad,
                        fichas_empleados.telefono,
                        fichas_empleados.empresa
                    FROM 
                        fichas_empleados
                    WHERE
                        fichas_empleados.dni=?";
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($doc));
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
                                    "empresa"=>$row['empresa']
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

    function historiaClinica($pdo,$documento,$id){
        try {
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
            $statement ->execute(array($id,$documento));
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();
            if($rowCount>0){
                foreach($result as $row){
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
        } catch(PDOException $th) {
            echo $th->getMessage();
            return false;
        }
    }

    function listaSubContratas($pdo){
        try {
            $respuesta = false;
            $lista = [];
            $sql = "SELECT id,ruc,nombre FROM `empresas_terceros`";
            $statement = $pdo->prepare($sql);
            $statement ->execute();
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();

            if ($rowCount > 0) {
                foreach($result as $row) {
                    $salida = array("id"=>$row['id'],
                                    "ruc"=>$row['ruc'],
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