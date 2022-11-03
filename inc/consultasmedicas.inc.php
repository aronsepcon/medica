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
                    if($_SESSION['sede']=='LIMA'){
                        $correo_remitente = "enfermerialima@sepcon.net";
                    }
                    else if($_SESSION['sede']=='MALVINAS'){
                        $correo_remitente = "enfermeriamalvinas@sepcon.net";
                    }
                    else if(($_SESSION['sede'])=='PISCO'){
                        $correo_remitente = "enfermeriapisco@sepcon.net";
                    }
                    break;
                case 2: 
                    if($_SESSION['sede']=='LIMA'){
                        $correo_remitente = "svela@sepcon.net" ;
                    }
                    else if($_SESSION['sede']=='MALVINAS'){
                        $correo_remitente = "saludmalvinas@sepcon.net";
                    }
                    break;
                default:    
                    $correo_remitente = "examenesmedicos@sepcon.net";
            }
            
            //$correo_remitente = "examenesmedicos@sepcon.net";//$_session['sede'] y $_session['acceso']   1 --- enfermeria/2 --- medicos/ //3 --- admin (zarai y saul)
            $destino = $correo;
            $title = utf8_decode($asunto);
            $entrada = "z3Io8Vp7Kd3Tz2R";

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
            $message .= "<p>Estimado $nombre</p>";
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

    function validarEnvio($pdo,$id){//preguntar pase a json
        try{
            $sql = "UPDATE fichas_api SET enviado = 0   WHERE idreg = ?";
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($id));
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();
            $respuesta=true;

            $salida = array(
                "conteo"=>$rowCount,
                "respuesta"=>$respuesta
            );
            return $salida;
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
?>