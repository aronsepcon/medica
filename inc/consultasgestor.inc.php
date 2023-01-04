<?php
    session_start();
    require_once("connectgestor.inc.php");

    if(isset($_POST['funcion'])){
        if ($_POST['funcion'] == "listarInventario"){
            echo json_encode(listarInventario($pdo,$_POST["nombre"]));
        }else  if($_POST['funcion'] == "inventarioPorId"){
            echo json_encode(inventarioPorId($pdo,$_POST["id"]));
        }
    }

    function listarInventario($pdo,$nombre){
        try {
            $respuesta  = false;
            $lista = [];     
            $sql = "SELECT id_cprod,ccodprod,cdesprod,nund FROM ibis.cm_producto WHERE cdesprod LIKE '$nombre%'";
            $statement = $pdo->prepare($sql);
            $statement ->execute();
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();

            if ($rowCount > 0) {
                foreach($result as $row){
                    $salida = array("idcprod"   => $row['id_cprod'],
                                    "ccodprod"   => $row['ccodprod'],
                                    "cdesprod"   => $row['cdesprod'],
                                    "nund"   => $row['nund'],
                    );
                    array_push($lista,$salida);
                }
                $respuesta = true;
            }else{
                $respuesta =false;
            }
            $salida = array("respuesta"=>$respuesta,
                             "lista" => $lista,
                            "sql" => $sql);

            return $salida;
        } catch(PDOException $th) {
            echo $th->getMessage();
            return false;
        }   
    }

    function inventarioPorId($pdo,$id){
        try {
            $respuesta  = false;
            $lista = [];     
            $sql = "SELECT id_cprod,ccodprod,cdesprod,nund FROM ibis.cm_producto WHERE id_cprod = ?";
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($id));
            $result = $statement ->fetchAll();
            $rowCount = $statement -> rowcount();

            if ($rowCount > 0) {
                foreach($result as $row){
                    $salida = array("idcprod"   => $row['id_cprod'],
                                    "ccodprod"   => $row['ccodprod'],
                                    "cdesprod"   => $row['cdesprod'],
                                    "nund"   => $row['nund'],
                    );
                    array_push($lista,$salida);
                }
                $respuesta = true;
            }else{
                $respuesta =false;
            }
            $salida = array("respuesta"=>$respuesta,
                             "lista" => $lista,
                            "sql" => $sql);

            return $salida;
        } catch(PDOException $th) {
            echo $th->getMessage();
            return false;
        }   
    }
?>