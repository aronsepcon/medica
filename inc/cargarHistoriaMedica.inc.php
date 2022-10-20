<?php
    require_once("connectmedica.inc.php");
    include("consultasmedicas.inc.php");

    $doc=$_POST['indice'];

    $mensaje = "No se completo la operacion";
    $respuesta = false;

    $datos = $pdo -> prepare("SELECT paciente,tipoExa FROM fichas_api where idreg=$doc");
    $datos -> execute(array());

    while($dato = $datos -> fetch(PDO::FETCH_ASSOC)){
        if ($dato['tipoExa']=='PERIODICO' OR $dato['tipoExa']=='EMOA'){
            $tipoEMO = 'A';
        }
        else if($dato['tipoExa']=='RETIRO'){
            $tipoEMO = 'R';
        }
        elseif($dato['tipoExa']=='PREOCUPACIONAL'){
            $tipoEMO = 'P';//seria para el preocupacional
        }

        $nombres =$dato['paciente'];
    }
    
       // $nombres = $_POST['nombres'];

        

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


    

    
?>