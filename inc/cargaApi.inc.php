<?php 
     require_once("connectmedica.inc.php");

     if(isset($_POST['funcion'])){
         if ($_POST['funcion'] == "cargarApiMedex"){
             echo json_encode(cargarApiMedex($pdo,$_POST["fichas"]));
         }
     }

     function cargarApiMedex($pdo,$fichas){
        $datos = json_decode($fichas);
        $nreg = count($datos);
        $contador = 0;

        for ($i=0; $i < $nreg; $i++) { 
            try {
                $sql = "INSERT INTO fichas_api SET acidoUrico=?,aglutinaciones=?,alergias=?,anfetaminas=?,antFamiliares=?,
                                            antece1=?,antece2=?,antece3=?,antece4=?,antece5=?,
                                            antece6=?,aptitud=?,atencion=?,audiometria=?,benceno=?,
                                            benzodiacepinas=?,bilirrubina=?,bk=?,carboxihemo=?,cardiologia=?,
                                            cea=?,celulasEpiteliales=?,centroCosto=?,cervical=?,cheFrca=?,
                                            cheFrre=?,cilindros=?,cirugias=?,cocaina=?,coccidias=?,
                                            cod1=?,cod2=?,cod3=?,cod4=?,cod5=?,
                                            cod6=?,cod7=?,cod8=?,cod9=?,cod10=?,
                                            codPaci=?,codSexo=?,colTotalHdl=?,colesterol=?,coprocultivo=?,
                                            creatinina=?,cristales=?,cuerposCetonicos=?,dermatologia=?,desAseg=?,
                                            diagno1=?,diagno2=?,diagno3=?,diagno4=?,diagno5=?,
                                            diagno7=?,diagno6=?,diagno8=?,diagno9=?,diagno10=?,
                                            dni=?,eAspecto=?,eColor=?,eConsistencia=?,eMucus=?,
                                            ecoAbdominal=?,edad=?,ekg=?,empresa=?,espirometria=?,
                                            estado=?,estadoNutricional=?,expoFactorRiesgo=?,fecNaci=STR_TO_DATE(?, '%d/%m/%Y'),fecPase=STR_TO_DATE(?, '%d/%m/%Y'),
                                            fecha=STR_TO_DATE(?, '%d/%m/%Y'),filamentoMucoide=?,fosfaAlca=?,germenes=?,ginecologia=?,
                                            glucosa=?,gotaGruesa=?,grasaCorporal=?,grupoSangre=?,habiAfisica=?,
                                            habiTabaco=?,hcvHepatitisC=?,hdl=?,hematies=?,hematiesHece=?,
                                            hematocrito=?,hemoGlico=?,hemoglobina=?,hepatitisA=?,hepatitisB=?,
                                            huevos=?,imc=?,inmunoglobulinaE=?,ldl=?,leucocitos=?,
                                            leucocitosOrina=?,leucosistosPmn=?,levaduraOri=?,levadurasHece=?,lumbar=?,
                                            mamografia=?,marihuana=?,metaAnfetamina=?,morfina=?,neurologia=?,
                                            nro=?,nroRuc=?,ocupacion=?,odontograma=?,oftalmologia=?,
                                            oriAspecto=?,oriColor=?,oriDensidad=?,oriPh=?,orinaAlbuminia=?,
                                            orinaAzucar=?,osteo=?,otorrino=?,otoscopia=?,pEsfuerzo=?,
                                            paciente=?,pam=?,papanicolau=?,pase=?,pase2=?,
                                            periAbdominal=?,peso=?,pigmentosBiliares=?,piocitos=?,
                                            plaquetas=?,plomo=?,presion=?,psa=?,psicologia=?,
                                            puestoPostula=?,quiste=?,rayosx=?,razonSocial=?,reco1=?,
                                            reco2=?,reco3=?,reco4=?,reco5=?,reco6=?,
                                            reco7=?,reco8=?,reco9=?,reco10=?,restricciones=?,
                                            riesgoCoronario=?,rpr=?,talla=?,tarifa=?,tgo=?,
                                            tgp=?,thevenon=?,tipoExa=?,tipoPase=?,tipoPase2=?,
                                            tolueno=?,tratamientoMedico=?,traumatologia=?,trichomonas=?,trigliceridos=?,
                                            trofozoitos=?,ureaSanguinea=?,urobilinogeno=?,vdrl=?,vih=?,
                                            vldl=?,xileno=?,clinica=?";
            $statement = $pdo->prepare($sql);
            $statement ->execute(array($datos[$i]->acidoUrico,$datos[$i]->aglutinaciones,$datos[$i]->alergias,$datos[$i]->anfetaminas,$datos[$i]->antFamiliares,
                                    $datos[$i]->antece1,$datos[$i]->antece2,$datos[$i]->antece3,$datos[$i]->antece4,$datos[$i]->antece5,
                                    $datos[$i]->antece6,$datos[$i]->aptitud,$datos[$i]->atencion,$datos[$i]->audiometria,$datos[$i]->benceno,
                                    $datos[$i]->benzodiacepinas,$datos[$i]->bilirrubina,$datos[$i]->bk,$datos[$i]->carboxihemo,$datos[$i]->cardiologia,
                                    $datos[$i]->cea,$datos[$i]->celulasEpiteliales,$datos[$i]->centroCosto,$datos[$i]->cervical,$datos[$i]->cheFrca,
                                    $datos[$i]->cheFrre,$datos[$i]->cilindros,$datos[$i]->cirugias,$datos[$i]->cocaina,$datos[$i]->coccidias,
                                    $datos[$i]->cod1,$datos[$i]->cod2,$datos[$i]->cod3,$datos[$i]->cod4,$datos[$i]->cod5,
                                    $datos[$i]->cod6,$datos[$i]->cod7,$datos[$i]->cod8,$datos[$i]->cod9,$datos[$i]->cod10,
                                    $datos[$i]->codPaci,$datos[$i]->codSexo,$datos[$i]->colTotalHdl,$datos[$i]->colesterol,$datos[$i]->coprocultivo,
                                    $datos[$i]->creatinina,$datos[$i]->cristales,$datos[$i]->cuerposCetonicos,$datos[$i]->dermatologia,$datos[$i]->desAseg,
                                    $datos[$i]->diagno1,$datos[$i]->diagno2,$datos[$i]->diagno3,$datos[$i]->diagno4,$datos[$i]->diagno5,
                                    $datos[$i]->diagno7,$datos[$i]->diagno6,$datos[$i]->diagno8,$datos[$i]->diagno9,$datos[$i]->diagno10,
                                    $datos[$i]->dni,$datos[$i]->eAspecto,$datos[$i]->eColor,$datos[$i]->eConsistencia,$datos[$i]->eMucus,
                                    $datos[$i]->ecoAbdominal,$datos[$i]->edad,$datos[$i]->ekg,$datos[$i]->empresa,$datos[$i]->espirometria,
                                    $datos[$i]->estado,$datos[$i]->estadoNutricional,$datos[$i]->expoFactorRiesgo,$datos[$i]->fecNaci,$datos[$i]->fecPase,
                                    $datos[$i]->fecha,$datos[$i]->filamentoMucoide,$datos[$i]->fosfaAlca,$datos[$i]->germenes,$datos[$i]->ginecologia,
                                    $datos[$i]->glucosa,$datos[$i]->gotaGruesa,$datos[$i]->grasaCorporal,$datos[$i]->grupoSangre,$datos[$i]->habiAfisica,
                                    $datos[$i]->habiTabaco,$datos[$i]->hcvHepatitisC,$datos[$i]->hdl,$datos[$i]->hematies,$datos[$i]->hematiesHece,
                                    $datos[$i]->hematocrito,$datos[$i]->hemoGlico,$datos[$i]->hemoglobina,$datos[$i]->hepatitisA,$datos[$i]->hepatitisB,
                                    $datos[$i]->huevos,$datos[$i]->imc,$datos[$i]->inmunoglobulinaE,$datos[$i]->ldl,$datos[$i]->leucocitos,
                                    $datos[$i]->leucocitosOrina,$datos[$i]->leucosistosPmn,$datos[$i]->levaduraOri,$datos[$i]->levadurasHece,$datos[$i]->lumbar,
                                    $datos[$i]->mamografia,$datos[$i]->marihuana,$datos[$i]->metaAnfetamina,$datos[$i]->morfina,$datos[$i]->neurologia,
                                    $datos[$i]->nro,$datos[$i]->nroRuc,$datos[$i]->ocupacion,$datos[$i]->odontograma,$datos[$i]->oftalmologia,
                                    $datos[$i]->oriAspecto,$datos[$i]->oriColor,$datos[$i]->oriDensidad,$datos[$i]->oriPh,$datos[$i]->orinaAlbuminia,
                                    $datos[$i]->orinaAzucar,$datos[$i]->osteo,$datos[$i]->otorrino,$datos[$i]->otoscopia,$datos[$i]->pEsfuerzo,
                                    $datos[$i]->paciente,$datos[$i]->pam,$datos[$i]->papanicolau,$datos[$i]->pase,$datos[$i]->pase2,
                                    $datos[$i]->periAbdominal,$datos[$i]->peso,$datos[$i]->pigmentosBiliares,$datos[$i]->piocitos,
                                    $datos[$i]->plaquetas,$datos[$i]->plomo,$datos[$i]->presion,$datos[$i]->psa,$datos[$i]->psicologia,
                                    $datos[$i]->puestoPostula,$datos[$i]->quiste,$datos[$i]->rayosx,$datos[$i]->razonSocial,$datos[$i]->reco1,
                                    $datos[$i]->reco2,$datos[$i]->reco3,$datos[$i]->reco4,$datos[$i]->reco5,$datos[$i]->reco6,
                                    $datos[$i]->reco7,$datos[$i]->reco8,$datos[$i]->reco9,$datos[$i]->reco10,$datos[$i]->restricciones,
                                    $datos[$i]->riesgoCoronario,$datos[$i]->rpr,$datos[$i]->talla,$datos[$i]->tarifa,$datos[$i]->tgo,
                                    $datos[$i]->tgp,$datos[$i]->thevenon,$datos[$i]->tipoExa,$datos[$i]->tipoPase,$datos[$i]->tipoPase2,
                                    $datos[$i]->tolueno,$datos[$i]->tratamientoMedico,$datos[$i]->traumatologia,$datos[$i]->trichomonas,$datos[$i]->trigliceridos,
                                    $datos[$i]->trofozoitos,$datos[$i]->ureaSanguinea,$datos[$i]->urobilinogeno,$datos[$i]->vdrl,$datos[$i]->vih,
                                    $datos[$i]->vldl,$datos[$i]->xileno,$datos[$i]->clinica));
            
            $contador++;
            $arr = $statement->errorInfo();
            print_r($arr);

            } catch (PDOException $th) {
                echo "Error: " . $th->getMessage;
                return false;
            }

     
        }

        return $contador;
     }

     function leerApiMedex($pdo,$doc){
        try{
            $respuesta = false;
            $lista = [];    

            $sql2= "SELECT
                        fa.tipoExa, fa.fecha, 
                        fa.aptitud, fa.reco1, 
                        fa.observaciones, fa.idreg,
                        fa.adjunto, fa.enviado,
                        fa.alergias, fa.grupoSangre,
                        fa.clinica, lc.nomb_clinica 
                    FROM
                        fichas_api
                    LEFT JOIN 
                        lista_clinicas AS lc ON fa.clinica=lc.id
                    WHERE
                        fichas_api.dni = ? ";
            $statement2 = $pdo->prepare($sql2);
            $statement2 -> execute(array($doc));
            $result = $statement2 ->fetchAll();
            $rowCount = $statement2 -> rowcount();
            if ($rowCount > 0) {
                foreach($result as $row) {
                    $salida = array("tipo"=>$row['tipoExa'], 
                                    "fecha"=>date("d/m/Y", strtotime($row['fecha'])),
                                    "aptitud"=>$row['aptitud'],
                                    "recomendaciones"=>$row['reco1'],
                                    "restricciones"=>$row['observaciones'],
                                    "enviado"=>$row['enviado'],
                                    "adjunto"=>$row['adjunto'],
                                    "alergias"=>$row['alergias'],
                                    "sangre"=>$row['grupoSangre'],
                                    "id"=>$row['idreg'],
                                    "clinica"=>$row['clinica']);
                    array_push($lista,$salida);
                }
                $respuesta = true;
            }else{
                $respuesta = false;
            }

            $salida = array("respuesta"=>$respuesta,
                            "lista" => $lista);

            return $salida; 
        }
        catch(PDOException $th){
            echo "Error: " . $th->getMessage();
            return false;
        }
      
     }
?>