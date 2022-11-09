<?php
    require_once("connectmedica.inc.php");

    $mensaje = "No se completo la operacion";
    $respuesta = false;

    $archivo = $_FILES['subidaImagen'];
    $temporal = $_FILES['subidaImagen']['tmp_name'];
    $nombre = uniqid().".jpeg";//probar luego
    
    $fecha = $_POST['fechaVacunacion'];
    $validacion = $_POST['validacion'];
    $documento = $_POST['documento'];

    if(move_uploaded_file($temporal,"../vacunas/".$nombre)){
        $mensaje = "Archivo copiado";
        $respuesta = true;
        enviarImagen($pdo,$fecha,$validacion,$nombre,$documento);
    }

    $salida =  array("mensaje"=>$mensaje,
                    "respuesta"=>$respuesta,
                    "archivo"=>$nombre);

    echo json_encode($salida);

    function enviarImagen($pdo,$fecha,$validacion,$archivo,$documento){
        try {
            switch($validacion){
                case "fiebre amarilla":
                    $sql ="UPDATE fichas_vacunacion SET fechaFbrAmarilla=?,adjuntoFbrAmarilla=? WHERE dni=?";
                    break;
                case "difteTet_D1":
                    $sql ="UPDATE fichas_vacunacion SET fechaDifTD1=?,adjuntoDifTD1=?,fechaDifTD2=DATE_ADD(?, INTERVAL 1 MONTH) WHERE dni=?";
                    break;
                case "difteTet_D2":
                    $sql ="UPDATE fichas_vacunacion SET fechaDifTD2=?,adjuntoDifTD2=?,fechaDifTD3=DATE_ADD(?, INTERVAL 3 MONTH) WHERE dni=?";
                    break;//validar los meses
            }       
            $statement = $pdo->prepare($sql);
            switch($validacion){
                case "fiebre amarilla":
                    $statement -> execute(array($fecha,$archivo,$documento));
                    break;
                case "difteTet_D1":
                case "difteTet_D2":
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