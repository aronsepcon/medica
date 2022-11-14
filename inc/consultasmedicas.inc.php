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
            $sql = "UPDATE fichas_api SET enviado = 1   WHERE idreg = ?";
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

    function validarEnvio($pdo,$id){//ver porq no actualiza xc, doble opcion
        try{
            $respuesta = false;
            $lista = [];
            $sql = "UPDATE fichas_api SET enviado = 1  WHERE idreg = ?";
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
            ORDER BY fichas_api.fecha DESC, CASE WHEN fichas_api.tipoExa=? THEN 3 ELSE 1 END ASC";//PROBAR CON LIKE
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

    function datosVacunacion($pdo,$doc){
        $respuesta  = false;
        $mensaje    = "No existe el nuemro de documento";
        $clase      = "msj_error";
        $sql        = "SELECT 
                            fechaFbrAmarilla,fechaDifTD1,fechaDifTD2,fechaDifTD3,fechaDifTR1,fechaDifTR2,fechaHepAD1,fechaHepAD2,fechaHepAR1,fechaHepAR2,fechaHepBD1,
                            fechaHepBD2,fechaHepBD3,fechaInflR1,fechaInflR2,fechaPolioD1,fechaTrivD1,fechaRabD1,fechaRabD2,fechaRabD3,fechaRabR1,fechaRabR2,fechaTifoR1,
                            fechaTifoR2,fechaNeumR1,fechaNeumR2,fechaCovidD1,fechaCovidD2,fechaCovidD3,fechaCovidD4	
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
            );
        }else{
            $respuesta = array("respuesta"=>$respuesta,
                                "mensaje"=>$mensaje,
                                "clase"=>$clase,
                                "sql" =>$statement);
        }
        return $respuesta;
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
                $sql = "SELECT adjuntoDifTR1 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "HepatitisA_D1":
                $sql = "SELECT adjuntoHepAD1 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "HepatitisA_D2":
                $sql = "SELECT adjuntoHepAD2 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "HepatitisA_R1":
                $sql = "SELECT adjuntoHepAR1 as adjunto FROM fichas_vacunacion WHERE dni=?";
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
                $sql = "SELECT adjuntoRabR1 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "Tifoidea_R1":
                $sql = "SELECT adjuntoTifoR1 as adjunto FROM fichas_vacunacion WHERE dni=?";
                break;
            case "Neumococo_R1":
                $sql = "SELECT adjuntoNeumR1 as adjunto FROM fichas_vacunacion WHERE dni=?";
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
            $respuesta = array(
                "respuesta" => true,
                "clase"     =>"msj_correct",
                "error"     =>"no hay error",
                "imagen"    => $result[0]['adjunto']
            );
        }else{
            $respuesta = array("respuesta"=>$respuesta,
                                "mensaje"=>$mensaje,
                                "clase"=>$clase);
        }
        return $respuesta;

    }
    
?>