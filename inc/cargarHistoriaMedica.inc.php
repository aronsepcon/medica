<?php
    require_once("connectmedica.inc.php");
    //require("connectrrhh.inc.php");
    include("consultasmedicas.inc.php");

    $doc=$_POST['indice'];
    $dni=$_POST['documento'];

    $mensaje = "No se completo la operacion";
    $respuesta = false;
/*
    $datosrrhh = $pdo -> prepare("SELECT 
                                    SUBSTRING(tabla_aquarius_copy.ccostos,1,4) as ccorreo,
                                    FROM
                                        tabla_aquarius_copy
                                    WHERE
                                        tabla_aquarius_copy.dni = $dni");

    $datosrrhh -> execute(array());

    while($dato2 = $datosrrhh -> fetch(PDO::FETCH_ASSOC)){
        $ccostos = $dato2['ccorreo'];
    }
*/
    $datos = $pdo -> prepare("SELECT 
                                fichas_api.paciente,
                                fichas_api.tipoExa,
                                replace(fichas_api.dni,' ','') as dni,
                                date_format(fichas_api.fecha,'%d%m%y') as fecha,
                                lista_clinicas.nomb_clinica
                            FROM 
                                fichas_api
                            LEFT JOIN 
                                lista_clinicas 
                            ON
                                fichas_api.clinica=lista_clinicas.id
                            WHERE
                                idreg=$doc");
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
        $dni2 = $dato['dni'];
        $fecha = $dato['fecha'];
        $clinica = $dato['nomb_clinica'];

    }
    
       // $nombres = $_POST['nombres'];

        

        $archivo    = $_FILES['fileUpload'];
        $temporal	= $_FILES['fileUpload']['tmp_name'];
        $fileId     = /*$ccostos.*/"EMO".$tipoEMO."-".$dni2."-".$nombres."-".$clinica."-".$fecha.".pdf";
       // $fileId     = "EMO".$tipoEMO."-".$nombres.".pdf"; 
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