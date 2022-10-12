<?php
    require_once("connectmedica.inc.php");

    $mensaje = "No se completo la operacion";
    $respuesta = false;

    $datos = $pdo -> query("SELECT paciente FROM fichas_api where idreg=?");
    $reg = $datos -> fetchAll();
    $C = $reg['paciente'];

    $archivo    = $_FILES['fileUpload'];
    $temporal	= $_FILES['fileUpload']['tmp_name'];
    $fileId     = "EMO-".uniqid().".pdf";
    $indice     = $_POST['indice'];

    if (move_uploaded_file($temporal,"../hc/".$fileId)) {
        $mensaje = "Archivo copiado";
        $respuesta = true;
        actualizarAdjunto($pdo,$fileId,$indice);
    }

    $salida = array("mensaje"   =>$mensaje,
                    "respuesta" =>$respuesta,
                    "archivo"   =>$fileId);

    echo json_encode($salida);


    function actualizarAdjunto($pdo,$file,$indice) {
        try {
            $sql = "UPDATE fichas_api SET adjunto=? WHERE idreg=?";
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($file,$indice));
            $rowCount = $statement -> rowcount();

            return $rowCount;
        } catch (PDOException $th) {
            echo "Error: " . $th->getMessage();
            return false;
        }
    }

    
?>