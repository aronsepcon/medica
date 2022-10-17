<?php
    require_once("connectmedica.inc.php");
    include("consultasmedicas.inc.php");

    $doc=$_POST['indice'];

    $mensaje = "No se completo la operacion";
    $respuesta = false;

    $datos = $pdo -> prepare("SELECT tipoExa FROM fichas_api where idreg=$doc");
    $datos -> execute(array());

    while($dato = $datos -> fetch(PDO::FETCH_ASSOC)){
        if ($dato['tipoExa']=='PERIODICO'){
            $tipoEMO = 'P';
        }
        else if($dato['tipoExa']=='RETIRO'){
            $tipoEMO = 'R';
        }
        else if($dato['tipoExa']=='EMOA'){
            $tipoEMO = 'A';
        }
        else{
            $tipoEMO = 'PRE';
        }}
    
        $nombres = $_POST['nombres'];

        $archivo    = $_FILES['fileUpload'];
        $temporal	= $_FILES['fileUpload']['tmp_name'];
        $fileId     = "EMO".$tipoEMO."-".$nombres.".pdf";
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
  //  }

    

    
?>