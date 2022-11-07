<?php
    require_once("connectmedica.inc.php");

    $mensaje = "No se completo la operacion";
    $respuesta = false;

    $archivo = $_FILES['subidaImagen'];
    $temporal = $_FILES['subidaImagen']['tmp_name'];
    $nombre = $_FILES['subidaImagen']['name'];
    
    $fecha=$_POST['fechaVacunacion'];
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
                case "":
                    $sql ="UPDATE fichas_vacunacion SET fecha=?,adjunto=? WHERE dni=?";
                    break;
                case "":
                    $sql ="UPDATE fichas_vacunacion SET fecha=?,adjunto=? WHERE dni=?";
                    break;
            }       
           /* if($validacion=="fiebre amarilla"){//es mejor si es un update, dicen switch case es mas rapido
                $sql ="UPDATE fichas_vacunacion SET fechaFbrAmarilla=?,adjuntoFbrAmarilla=? WHERE dni=?";
            }
            else if($validacion=""){
                $sql ="UPDATE fichas_vacunacion SET fecha=?,adjunto=? WHERE dni=?";
            }
            else if($validacion=""){
                $sql ="UPDATE fichas_vacunacion SET fecha=?,adjunto=? WHERE dni=?";
            }*/
            $statement = $pdo->prepare($sql);
            $statement -> execute(array($fecha,$archivo,$documento));
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();
        } catch (PDOException $th) {
            echo "Error: " . $th->getMessage();
            return false;        }
    }

?>