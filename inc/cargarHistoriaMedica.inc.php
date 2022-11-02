<?php
    session_start();
    require_once("connectmedica.inc.php");
    include("consultasmedicas.inc.php");

    $doc=$_POST['indice'];
  //  $dni=$_POST['documento'];

    $mensaje = "No se completo la operacion";
    $respuesta = false;
//de aqui
//hasta aqui sobra

    $archivo    = $_FILES['fileUpload'];
    $temporal	= $_FILES['fileUpload']['tmp_name'];
    $nombresss = $_FILES['fileUpload']['name'];
    //$fileId     = $ccostos."-"."EMO".$tipoEMO."-".$dni2."-".$nombres."-".$clinica."-".$fecha.".pdf";
    $fileId = $nombresss;
    $indice     = $_POST['indice'];
    
    $cc = substr($nombresss,0,4);
    
    if (move_uploaded_file($temporal,"../hc/".$fileId)) {
        $mensaje = "Archivo copiado";
        $respuesta = true;
        actualizarAdjunto($pdo,$fileId,$cc,$indice);
    }

    $salida = array("mensaje"   =>$mensaje,
                    "respuesta" =>$respuesta,
                    "archivo"   =>$fileId,
                    "cc"=>$cc);

    echo json_encode($salida);


    function actualizarAdjunto($pdo,$file,$cc,$indice) {
        try {
            $sql = "UPDATE fichas_api SET adjunto=?, centroCosto =?  WHERE idreg=?";
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($file,$cc,$indice));
            $rowCount = $statement -> rowcount();

            return $rowCount;
        } catch (PDOException $th) {
            echo "Error: " . $th->getMessage();
            return false;
        }
    }


    

    
?>