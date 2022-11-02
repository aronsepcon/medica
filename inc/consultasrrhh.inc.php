<?php 
    session_start();
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
        else if ($_POST['funcion'] == "datosApi"){
            echo json_encode(datosApi($pdo,$_POST["doc"]));
        }
    }

    function validarClave($pdo,$login,$clave){//ver el pase de paramentros para el correo
        try{                                            //ahi esta la respuesta

            $respuesta  = false;
            $mensaje    = "No existe el nuemro de documento";
            $clase      = "msj_error";
            $pass = sha1($clave);
            
            $sql ="SELECT  
                    tabla_aquarius.nombres,
                    tabla_aquarius.apellidos,
                    tabla_aquarius.dni,
                    tabla_aquarius.usuario,
                    tabla_aquarius.clave,
                    SUBSTRING(tabla_aquarius.ccostos,1,4) as ccostos,
                    tabla_aquarius.corporativo,
                    tabla_aquarius.acc_medica
                FROM
                    tabla_aquarius
                WHERE
                    tabla_aquarius.usuario = ?";
            
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($login));
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();
            if($rowCount>0 && $pass==$result[0]['clave']){
                $_SESSION['logged'] = true;
                $_SESSION['ccostos'] = $result[0]['ccostos'];
                $_SESSION['user'] = $result[0]['usuario'];                    
                $_SESSION['nombres'] = $result[0]['nombres'];                          
                $_SESSION['apellidos'] = $result[0]['apellidos']; 
                $_SESSION['dni'] = $result[0]['dni'];    
                $_SESSION['sede'] = $result[0]['corporativo']; 
                $_SESSION['acceso'] = $result[0]['acc_medica'];  
                $respuesta = array("respuesta"  => true,
                                    "clase"     =>"msj_correct",
                                    "error"     =>"no hay error");

            }else{
                $respuesta = array("respuesta"=>$respuesta,
                                    "mensaje"=>$mensaje,
                                    "clase"=>$clase);
            }

            return $respuesta;

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
                    CONCAT_WS( ' ', tabla_aquarius.apellidos, tabla_aquarius.nombres ) AS nombres,
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

 /*   function datosColaborador($pdo,$doc){
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
    }*/

    function datosApi($pdo,$doc){
    
        try{
            $url = "http://sicalsepcon.net/api/workersapi.php?documento=".$doc;
            $json_data = file_get_contents($url);
            $datos = json_decode($json_data);

            $nreg = count($datos);

            $existe = $nreg >= 1 ? true : false;

            if($existe){

                return array(
                    "datos"=>$datos,
                    "existe"=>$existe
                );
            }else {
                return array("existe" => $existe);
              }
        }catch (PDOException $th) {
            echo "Error: " . $th->getMessage();
        }
    }
    
    function datosColaborador($pdo,$doc){
        try {
            $respuesta  = false;
            $mensaje    = "No existe el nuemro de documento";
            $clase      = "msj_error";
            //agregar consultas para telefono, direccion, sexo, etc
            $sql ="SELECT
                    	tabla_aquarius.dni,
                        tabla_aquarius.internal,
                        CONCAT_WS( ' ', tabla_aquarius.apellidos, tabla_aquarius.nombres ) AS nombres,
                        CONCAT_WS(' ', SUBSTRING(tabla_aquarius.ccostos,1,4),tabla_aquarius.dcostos) as ccostos ,
                        SUBSTRING(tabla_aquarius.ccostos,1,4) as ccorreo,
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

            if ($rowCount > 0) {//agregar arreglos para lo mencionado arriba
                $respuesta = array("respuesta"  => true,
                                   "clase"     =>"msj_correct",
                                   "error"     =>"no hay error",
                                   "nombres"   => $result[0]['nombres'],
                                   "dni"       => $result[0]['dni'],
                                   "cut"       => $result[0]['cut'],
                                   "correo"    => $result[0]['correo'],
                                   "ccostos"   => $result[0]['ccostos'],
                                   "ccorreo"    => $result[0]['ccorreo'],
                                   "sede"      => $result[0]['dsede'],
                                   "cargo"     => $result[0]['cargo'],
                                   "estado"    => $result[0]['estado'],
                                  // "fecnac"    => date("d/m/Y", strtotime($result[0]['fecha_nacimiento'])),
                                  //  "codSexo"     => $result[0]['sexo'],
                                  //  "direccion" => $result[0]['ubigeo_domicilio'] 
                                );
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


/*
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
    }*/

    function nombreColaborador($pdo,$doc){
        try {
            $respuesta  = false;
            $mensaje    = "No existe el nuemro de documento";
            $clase      = "msj_error";

            $sql ="SELECT
                    tabla_aquarius.dni,
                        tabla_aquarius.internal,
                        CONCAT_WS( ' ', tabla_aquarius.nombres, tabla_aquarius.apellidos ) AS nombres,
                        CONCAT_WS(' ', SUBSTRING(tabla_aquarius.ccostos,1,4),tabla_aquarius.dcostos) as ccostos ,
                        SUBSTRING(tabla_aquarius.ccostos,1,4) as ccorreo,
                        tabla_aquarius.dsede,
                        tabla_aquarius.correo,
                        tabla_aquarius.ccargo AS codigo_cargo,
                        UPPER( tabla_aquarius.dcargo ) AS cargo,
                        tabla_aquarius.estado,
                        tabla_aquarius.cut, 
                        tabla_aquarius.fecha_nacimiento,
                        tabla_aquarius.sexo,
                        tabla_aquarius.ubigeo_domicilio
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
                                   "ccorreo"    => $result[0]['ccorreo'],
                                   "sede"      => $result[0]['dsede'],
                                   "cargo"     => $result[0]['cargo'],
                                   "estado"    => $result[0]['estado'],
                                   "estado"    => $result[0]['estado'],
                                   "fecnac"    => date("d/m/Y", strtotime($result[0]['fecha_nacimiento'])),
                                    "codSexo"     => $result[0]['sexo'],
                                    "direccion" => $result[0]['ubigeo_domicilio'] );
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