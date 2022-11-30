<?php
    require_once("connectmedica.inc.php");

    $formatos = ["jpeg","jpg","png","pdf"];

    $fecha = $_POST['fechaVacunacion'];
    $validacion = $_POST['validacion'];
    $documento = $_POST['documento'];
    $nombrePac = $_POST['nombre'];

    $fec=explode("-",$fecha);
    $r = $fec[2].$fec[1].$fec[0];//el formato es ddmmyyyy

    $formato = explode(".",htmlspecialchars(basename(strtolower($_FILES['subidaImagen']["name"]))));
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

    switch($s){
        case $formatos[0]:
        case $formatos[1]:
        case $formatos[2]:
            $nombre = $validacion."-".$nombrePac."-".$documento."-".$r.".jpeg";
            break;
        case $formatos[3]:
            $nombre = $validacion."-".$nombrePac."-".$documento."-".$r.".pdf";
            break;//preguntar con espacio o sin espacio
    }

    $mensaje = "No se completo la operacion";
    $respuesta = false;

    $archivo = $_FILES['subidaImagen'];
    $temporal = $_FILES['subidaImagen']['tmp_name'];

    if(move_uploaded_file($temporal,"../vacunas/".$nombre)){
        $mensaje = "Archivo copiado";
        $respuesta = true;
        enviarImagen($pdo,$fecha,$validacion,$nombre,$documento);
    }

    $salida =  array("mensaje"=>$mensaje,
                    "respuesta"=>$respuesta,
                    "validacion"=>$validacion,
                    "archivo"=>$nombre,
                    "fecha"=>$fecha);

    echo json_encode($salida);

    function enviarImagen($pdo,$fecha,$validacion,$archivo,$documento){
        try {
            $tiempo = date("n",strtotime($fecha));

            switch($validacion){
                case "fiebre amarilla":
                    $sql = "UPDATE fichas_vacunacion SET fechaFbrAmarilla=?,adjuntoFbrAmarilla=? WHERE dni=?";
                    break;
                case "difteTet_D1":
                    $sql = "UPDATE fichas_vacunacion SET fechaDifTD1=?,adjuntoDifTD1=?,fechaDifTD2=DATE_ADD(?, INTERVAL 1 MONTH) WHERE dni=?";
                    break;
                case "difteTet_D2":
                    $sql = "UPDATE fichas_vacunacion SET fechaDifTD2=?,adjuntoDifTD2=?,fechaDifTD3=DATE_ADD(?, INTERVAL 5 MONTH) WHERE dni=?";
                    break;
                case "difteTet_D3":
                    $sql = "UPDATE fichas_vacunacion SET fechaDifTD3=?,adjuntoDifTD3=?,fechaDifTR1=DATE_ADD(?, INTERVAL 10 YEAR) WHERE dni=?";
                    break;
                case "difteTet_R1":
                    $sql = "UPDATE fichas_vacunacion SET fechaDifTR1=?,adjuntoDifTR1=?,fechaDifTR2=DATE_ADD(?, INTERVAL 10 YEAR) WHERE dni=?";
                    break; 
                case "difteTet_R2":
                    $sql = "UPDATE fichas_vacunacion SET fechaDifTR1=?,adjuntoDifTR2=?,fechaDifTR2=DATE_ADD(?, INTERVAL 10 YEAR) WHERE dni=?";
                    break; 
                case "difteTet_R3":
                    $sql = "UPDATE fichas_vacunacion SET fechaDifTR1=?,adjuntoDifTR3=?,fechaDifTR2=DATE_ADD(?, INTERVAL 10 YEAR) WHERE dni=?";
                    break; 
                case "difteTet_R4":
                    $sql = "UPDATE fichas_vacunacion SET fechaDifTR1=?,adjuntoDifTR4=?,fechaDifTR2=DATE_ADD(?, INTERVAL 10 YEAR) WHERE dni=?";
                    break;
                case "HepatitisA_D1":
                    $sql = "UPDATE fichas_vacunacion SET fechaHepAD1=?,adjuntoHepAD1=?,fechaHepAD2=DATE_ADD(?, INTERVAL 6 MONTH) WHERE dni=?";
                    break;
                case "HepatitisA_D2":
                    $sql = "UPDATE fichas_vacunacion SET fechaHepAD2=?,adjuntoHepAD2=?,fechaHepAR1=DATE_ADD(?, INTERVAL 10 YEAR) WHERE dni=?";
                    break;
                case "HepatitisA_R1":
                    $sql = "UPDATE fichas_vacunacion SET fechaHepAR1=?,adjuntoHepAR1=?,fechaHepAR2=DATE_ADD(?, INTERVAL 10 YEAR) WHERE dni=?";
                    break;
                case "HepatitisA_R2":
                    $sql = "UPDATE fichas_vacunacion SET fechaHepAR1=?,adjuntoHepAR2=?,fechaHepAR2=DATE_ADD(?, INTERVAL 10 YEAR) WHERE dni=?";
                    break;
                case "HepatitisA_R3":
                    $sql = "UPDATE fichas_vacunacion SET fechaHepAR1=?,adjuntoHepAR3=?,fechaHepAR2=DATE_ADD(?, INTERVAL 10 YEAR) WHERE dni=?";
                    break;
                case "HepatitisA_R4":
                    $sql = "UPDATE fichas_vacunacion SET fechaHepAR1=?,adjuntoHepAR4=?,fechaHepAR2=DATE_ADD(?, INTERVAL 10 YEAR) WHERE dni=?";
                    break;
                case "HepatitisB_D1":
                    $sql = "UPDATE fichas_vacunacion SET fechaHepBD1=?,adjuntoHepBD1=?,fechaHepBD2=DATE_ADD(?, INTERVAL 1 MONTH) WHERE dni=?";
                    break;
                case "HepatitisB_D2":
                    $sql = "UPDATE fichas_vacunacion SET fechaHepBD2=?,adjuntoHepBD2=?,fechaHepBD3=DATE_ADD(?, INTERVAL 5 MONTH) WHERE dni=?";
                    break;
                case "HepatitisB_D3":
                    $sql = "UPDATE fichas_vacunacion SET fechaHepBD3=?,adjuntoHepBD3=? WHERE dni=?";
                    break;
                case "Influenza_R1":
                case "Influenza_R2":
                    if($tiempo>=1 && $tiempo<4){
                        $sql = "UPDATE fichas_vacunacion SET fechaInflR1=?,adjuntoInflR1=?,fechaInflR2=CONCAT_WS('-',DATE_FORMAT(?,'%Y'),04,30) WHERE dni=?";
                    }
                    else{
                        $sql = "UPDATE fichas_vacunacion SET fechaInflR1=?,adjuntoInflR1=?,fechaInflR2=CONCAT_WS('-',DATE_FORMAT(DATE_ADD(?,INTERVAL 1 YEAR),'%Y'),04,30) WHERE dni=?";
                    }
                    break;
                case "Polio_D1":
                    $sql = "UPDATE fichas_vacunacion SET fechaPolioD1=?,adjuntoPolioD1=? WHERE dni=?";
                    break;
                case "Trivirica_D1":
                    $sql = "UPDATE fichas_vacunacion SET fechaTrivD1=?,adjuntoTrivD1=? WHERE dni=?";
                    break;
                case "Rabia_D1":
                    $sql = "UPDATE fichas_vacunacion SET fechaRabD1=?,adjuntoRabD1=?,fechaRabD2=DATE_ADD(?, INTERVAL 7 DAY) WHERE dni=?";
                    break;
                case "Rabia_D2":
                    $sql = "UPDATE fichas_vacunacion SET fechaRabD2=?,adjuntoRabD2=?,fechaRabD3=DATE_ADD(?, INTERVAL 21 DAY) WHERE dni=?";
                    break;
                case "Rabia_D3":
                    $sql = "UPDATE fichas_vacunacion SET fechaRabD3=?,adjuntoRabD3=?,fechaRabR1=DATE_ADD(?, INTERVAL 3 YEAR) WHERE dni=?";
                    break;
                case "Rabia_R1":
                    $sql = "UPDATE fichas_vacunacion SET fechaRabR1=?,adjuntoRabR1=?,fechaRabR2=DATE_ADD(?, INTERVAL 3 YEAR) WHERE dni=?";
                    break;
                case "Rabia_R2":
                    $sql = "UPDATE fichas_vacunacion SET fechaRabR1=?,adjuntoRabR2=?,fechaRabR2=DATE_ADD(?, INTERVAL 3 YEAR) WHERE dni=?";
                    break;
                case "Rabia_R3":
                    $sql = "UPDATE fichas_vacunacion SET fechaRabR1=?,adjuntoRabR3=?,fechaRabR2=DATE_ADD(?, INTERVAL 3 YEAR) WHERE dni=?";
                    break;
                case "Rabia_R4":
                    $sql = "UPDATE fichas_vacunacion SET fechaRabR1=?,adjuntoRabR4=?,fechaRabR2=DATE_ADD(?, INTERVAL 3 YEAR) WHERE dni=?";
                    break;
                case "Rabia_R5":
                    $sql = "UPDATE fichas_vacunacion SET fechaRabR1=?,adjuntoRabR5=?,fechaRabR2=DATE_ADD(?, INTERVAL 3 YEAR) WHERE dni=?";
                    break;
                case "Rabia_R6":
                    $sql = "UPDATE fichas_vacunacion SET fechaRabR1=?,adjuntoRabR6=?,fechaRabR2=DATE_ADD(?, INTERVAL 3 YEAR) WHERE dni=?";
                    break;
                case "Rabia_R7":
                    $sql = "UPDATE fichas_vacunacion SET fechaRabR1=?,adjuntoRabR7=?,fechaRabR2=DATE_ADD(?, INTERVAL 3 YEAR) WHERE dni=?";
                    break;
                case "Tifoidea_R1":
                    $sql = "UPDATE fichas_vacunacion SET fechaTifoR1=?,adjuntoTifoR1=?,fechaTifoR2=DATE_ADD(?, INTERVAL 3 YEAR) WHERE dni=?";
                    break;
                case "Tifoidea_R2":
                    $sql = "UPDATE fichas_vacunacion SET fechaTifoR1=?,adjuntoTifoR2=?,fechaTifoR2=DATE_ADD(?, INTERVAL 3 YEAR) WHERE dni=?";
                    break;
                case "Tifoidea_R3":
                    $sql = "UPDATE fichas_vacunacion SET fechaTifoR1=?,adjuntoTifoR3=?,fechaTifoR2=DATE_ADD(?, INTERVAL 3 YEAR) WHERE dni=?";
                    break;
                case "Tifoidea_R4":
                    $sql = "UPDATE fichas_vacunacion SET fechaTifoR1=?,adjuntoTifoR4=?,fechaTifoR2=DATE_ADD(?, INTERVAL 3 YEAR) WHERE dni=?";
                    break;
                case "Neumococo_R1":
                    $sql = "UPDATE fichas_vacunacion SET fechaNeumR1=?,adjuntoNeumR1=?,fechaNeumR2=DATE_ADD(?, INTERVAL 5 YEAR) WHERE dni=?";
                    break;
                case "Neumococo_R2":
                    $sql = "UPDATE fichas_vacunacion SET fechaNeumR1=?,adjuntoNeumR2=?,fechaNeumR2=DATE_ADD(?, INTERVAL 5 YEAR) WHERE dni=?";
                    break;
                case "Neumococo_R3":
                    $sql = "UPDATE fichas_vacunacion SET fechaNeumR1=?,adjuntoNeumR3=?,fechaNeumR2=DATE_ADD(?, INTERVAL 5 YEAR) WHERE dni=?";
                    break;
                case "Neumococo_R4":
                    $sql = "UPDATE fichas_vacunacion SET fechaNeumR1=?,adjuntoNeumR4=?,fechaNeumR2=DATE_ADD(?, INTERVAL 5 YEAR) WHERE dni=?";
                    break;
                case "COVID_D1":
                    $sql = "UPDATE fichas_vacunacion SET fechaCovidD1=?,adjuntoCovidD1=?,fechaCovidD2=DATE_ADD(?, INTERVAL 28 DAY) WHERE dni=?";
                    break;
                case "COVID_D2":
                    $sql = "UPDATE fichas_vacunacion SET fechaCovidD2=?,adjuntoCovidD2=?,fechaCovidD3=DATE_ADD(?, INTERVAL 3 MONTH) WHERE dni=?";
                    break;
                case "COVID_D3":
                    $sql = "UPDATE fichas_vacunacion SET fechaCovidD3=?,adjuntoCovidD3=?,fechaCovidD4=DATE_ADD(?, INTERVAL 5 MONTH) WHERE dni=?";
                    break;
                case "COVID_D4":
                    $sql = "UPDATE fichas_vacunacion SET fechaCovidD4=?,adjuntoCovidD4=? WHERE dni=?";
                    break;
            }       
            $statement = $pdo->prepare($sql);
            switch($validacion){
                case "fiebre amarilla":
                case "HepatitisB_D3":
                case "Trivirica_D1":
                case "Polio_D1":
                case "COVID_D4":
                    $statement -> execute(array($fecha,$archivo,$documento));
                    break;
                case "difteTet_D1":
                case "difteTet_D2":
                case "difteTet_D3":
                case "difteTet_R1":
                case "difteTet_R2":
                case "difteTet_R3":
                case "difteTet_R4":
                case "HepatitisA_D1":
                case "HepatitisA_D2":
                case "HepatitisA_R1":
                case "HepatitisA_R2":
                case "HepatitisA_R3":
                case "HepatitisA_R4":
                case "HepatitisB_D1":
                case "HepatitisB_D2":
                case "Influenza_R1":
                case "Influenza_R2":
                case "Rabia_D1":
                case "Rabia_D2":
                case "Rabia_D3":
                case "Rabia_R1":
                case "Rabia_R2":
                case "Rabia_R3":
                case "Rabia_R4":
                case "Rabia_R5":
                case "Rabia_R6":
                case "Rabia_R7":
                case "Tifoidea_R1":
                case "Tifoidea_R2":
                case "Tifoidea_R3":
                case "Tifoidea_R4":
                case "Neumococo_R1":
                case "Neumococo_R2":
                case "Neumococo_R3":
                case "Neumococo_R4":
                case "COVID_D1":
                case "COVID_D2":
                case "COVID_D3":
                    $statement -> execute(array($fecha,$archivo,$fecha,$documento));
                    break;
            }
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();
        } catch (PDOException $th) {
            echo "Error: " . $th->getMessage();
            return false;        }
    }

?>