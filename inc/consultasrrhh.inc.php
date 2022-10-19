<?php 
    require_once("connectrrhh.inc.php");

    if(isset($_POST['funcion'])){
        if ($_POST['funcion'] == "datosColaborador"){
            echo json_encode(datosColaborador($pdo,$_POST["documento"]));
        }
        else if ($_POST['funcion'] == "nombreColaborador") {
            echo json_encode(nombreColaborador($pdo,$_POST["documento"]));
        }
        else if ($_POST['funcion'] == "buscarEmpleados"){
            echo json_encode(buscarEmpleados($pdo,$_POST["documento"]));
        }
        else if ($_POST['funcion'] == "validarClave"){
            echo json_encode(validarClave($pdo,$_POST['login'],$_POST['clave']));
        }
    }

    function validarClave($pdo,$login,$clave){//ver el pase de paramentros para el correo
        try{                                            //ahi esta la respuesta

            $respuesta  = false;
            $mensaje    = "No existe el nuemro de documento";
            $clase      = "msj_error";

            $sql ="SELECT  
                    tabla_aquarius.nombres,
                    tabla_aquarius.apellidos 
                FROM
                    tabla_aquarius
                WHERE
                    clave = $clave and usuario = $login";
            
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($login));
            $result = $statement ->fetchAll();
            
            return $result;

        }catch(PDOException $th) {
            echo "Error: " . $th->getMessage();
            return false;
        }
    }

    function buscarEmpleados($pdo,$doc){
        try{
            $respuesta  = false;
            $lista =[];
            $consulta='%'.$doc.'%';
            $sql ="SELECT  
                    CONCAT_WS( ' ', tabla_aquarius.nombres, tabla_aquarius.apellidos ) AS nombres,
                    tabla_aquarius.dsede,
                    tabla_aquarius.dni
                FROM
                    tabla_aquarius
                WHERE
                    CONCAT(tabla_aquarius.apellidos,' ',tabla_aquarius.nombres) LIKE '$consulta'";
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($doc));
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();
            if ($rowCount > 0) {
                foreach($result as $row){
                    $salida = array("nombres"   => $row['nombres'],
                                    "sede"      => $row['dsede'],
                                    "dni"       => $row['dni']
                                    );
                    array_push($lista,$salida);
                }
                $respuesta = true;
            }else{
                $respuesta =false;
            }
            $salida = array("respuesta"=>$respuesta,
                             "lista" => $lista);

            return $salida;
        }catch (PDOException $th) {
            echo "Error: " . $th->getMessage();
            return false;
        }
    }

    function datosColaborador($pdo,$doc){
        try {
            $respuesta  = false;
            $mensaje    = "No existe el nuemro de documento";
            $clase      = "msj_error";
            //agregar consultas para telefono, direccion, sexo, 
            $sql ="SELECT
                    tabla_aquarius.dni,
                    tabla_aquarius.internal,
                    CONCAT_WS( ' ', tabla_aquarius.nombres, tabla_aquarius.apellidos ) AS nombres,
                    UPPER( tabla_aquarius.dcostos ) AS ccostos,
                    tabla_aquarius.ccostos AS codigo_costos,
                    tabla_aquarius.csede,
                    tabla_aquarius.dsede,
                    tabla_aquarius.correo,
                    tabla_aquarius.ccargo AS codigo_cargo,
                    UPPER( tabla_aquarius.dcargo ) AS cargo,
                    tabla_aquarius.estado,
                    tabla_aquarius.cut 
                FROM
                    tabla_aquarius
                WHERE
                    tabla_aquarius.dni = ?";
                   
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($doc));
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();
            if ($rowCount > 0) {
                $respuesta = array("respuesta"  => true,
                                   "clase"     =>"msj_correct",
                                   "error"     =>"no hay error",
                                   "nombres"   => $result[0]['nombres'],
                                   "dni"       => $result[0]['dni'],
                                   "cut"       => $result[0]['cut'],
                                   "correo"    => $result[0]['correo'],
                                   "ccostos"   => $result[0]['ccostos'],
                                   "sede"      => $result[0]['dsede'],
                                   "cargo"     => $result[0]['cargo'],
                                   "estado"    => $result[0]['estado'],
                                   "codcos"    => $result[0]['codigo_costos']);
            }else{
                $respuesta = array("respuesta"=>$respuesta,
                                    "mensaje"=>$mensaje,
                                    "clase"=>$clase);
            }

            return $respuesta;
        } catch (PDOException $th) {
            echo "Error: " . $th->getMessage();

        }
    }


    function nombreColaborador($pdo,$doc){
        try {
            $respuesta  = false;
            $mensaje    = "No existe el nuemro de documento";
            $clase      = "msj_error";

            $sql ="SELECT
                    tabla_aquarius.dni,
                    tabla_aquarius.internal,
                    CONCAT_WS( ' ', tabla_aquarius.nombres, tabla_aquarius.apellidos ) AS nombres,
                    UPPER( tabla_aquarius.dcostos ) AS ccostos,
                    tabla_aquarius.ccostos AS codigo_costos,
                    tabla_aquarius.csede,
                    tabla_aquarius.dsede,
                    tabla_aquarius.correo,
                    tabla_aquarius.ccargo AS codigo_cargo,
                    UPPER( tabla_aquarius.dcargo ) AS cargo,
                    tabla_aquarius.estado,
                    tabla_aquarius.cut 
                FROM
                    tabla_aquarius 
                WHERE
                    CONCAT(tabla_aquarius.apellidos,' ',tabla_aquarius.nombres) = ?";


            $statement = $pdo->prepare($sql);
            $statement ->execute(array($doc));
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();

            if ($rowCount > 0) {
                $respuesta = array("respuesta"  => true,
                                   "clase"     =>"msj_correct",
                                   "error"     =>"no hay error",
                                   "nombres"   => $result[0]['nombres'],
                                   "dni"       => $result[0]['dni'],
                                   "cut"       => $result[0]['cut'],
                                   "correo"    => $result[0]['correo'],
                                   "ccostos"   => $result[0]['ccostos'],
                                   "sede"      => $result[0]['dsede'],
                                   "cargo"     => $result[0]['cargo'],
                                   "estado"    => $result[0]['estado'],
                                   "codcos"    => $result[0]['codigo_costos']);
            }else{
                $respuesta = array("respuesta"=>$respuesta,
                                    "mensaje"=>$mensaje,
                                    "clase"=>$clase);
            }

            return $respuesta;
        } catch (PDOException $th) {
            echo "Error: " . $th->getMessage();

        }
    }
?>