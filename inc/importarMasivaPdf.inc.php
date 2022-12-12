<?php
require_once("connectmedica.inc.php");
include("consultasmedicas.inc.php");


    $mensaje = "No se enviaron los documentos";//ver si puede ser $mensaje[$count]
    $respuesta = false; 
    
    $archivo = $_FILES['files'];
    $temporal = $_FILES['files']['tmp_name'];
    $nombre = $_FILES['files']['name'];
    $fileId = $nombre;
    $datos = explode("-",$nombre);
    $clinica="";
    $ccostos = $datos[0];
    $tipoExa = $datos[1];//validar si hay o no retiro
    $dni = $datos[2];
    $fecha = substr($datos[5],0,8);//fecha=STR_TO_DATE('30012018','%d%m%Y');
    $clinica = $datos[4];//ver como cargan otros tipos de clinicas como Americas, SerfarmED

    //aqui validar clinicas;
    switch($clinica){
      case "MEDEX":
        $clinicaVal = 1;
        break;
      case "SERFARMED":
        $clinicaVal = 2;
        break;
      case "AMERICAS": //preguntar como se pasan las americas
        $clinicaVal = 3;
        
        break;
      }
    //validar tipoExa
    switch($tipoExa){//VER PARA LOS DIFERENTES CONTEXTOS U:
      case "EMOP":
        $exaVal = "PREOCUPACIONAL";
        break;
      case "EMOA":
        $exaVal = "PERIODICO";
        break;
      case "EMOR":
        $exaVal = "RETIRO";
        break;
    }

    //subir a partir de registros existentes

    if (move_uploaded_file($temporal,"../hc/".$fileId)){
      $mensaje = "Archivo Copiado";
      $respuesta = true;
      subirVariosAdjuntos($pdo,$fileId,$ccostos,$dni,$fecha,$clinicaVal,$exaVal);
    }

    $salida = array("mensaje"   =>$mensaje,//preguntar por el array
                      "respuesta" =>$respuesta,
                      "archivo"   =>$fileId,
                      "clinica"   =>$clinica,
                      "fecha"     =>$fecha);

 //   $count++;
    echo json_encode($salida);
  //  return $count;

//}


function subirVariosAdjuntos($pdo,$fileI,$ccostos,$dni,$fecha,$clinica,$tipoExa){
    try {
        $sql = "UPDATE fichas_api SET adjunto=?,centroCosto =? WHERE dni=? AND fecha=STR_TO_DATE(?,'%d%m%Y') AND clinica=? AND tipoExa=?";
        $statement = $pdo->prepare($sql);
        $statement ->execute(array($fileI,$ccostos,$dni,$fecha,$clinica,$tipoExa));
     /*   $rowCount = $statement -> rowcount();
        return $rowCount;*/
    } catch (PDOException $th) {
        echo "Error: " . $th->getMessage();
        return false;
    }
}


?>