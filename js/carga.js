import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import {validar} from "./funciones.js";

const $btn__upload = document.getElementById("btn__upload");
const $btn__uploadSerfarmed = document.getElementById("btn__uploadSerfarmed");
const $btn__uploadAmericas = document.getElementById("btn__uploadAmericas");
const progressbar = document.querySelector(".progress_carga");
const $fileUpload = document.getElementById("fileUpload");
const $btnUpdateMedex = document.getElementById("btnUpdateMedex");
const $fecha__inicio__medex = document.getElementById("fecha__inicio__medex");
const $fecha__final__medex = document.getElementById("fecha__final__medex");

const $lista_subc = document.getElementById("lista_subc");
const $nro__ruc = document.getElementById("nro__ruc");
const $btnUpdateSubcontratas = document.getElementById("btnUpdateSubcontratas");
const $fecha__inicio__subc = document.getElementById("fecha__inicio__subc");
const $fecha__final__subc = document.getElementById("fecha__final__subc");
const $nro__doc_subc = document.getElementById("nro__doc_subc");
const $lista_terceros = document.getElementById("lista_terceros");

const $nro__doc = document.getElementById("nro__doc");
const $subida_masiva_excel=document.getElementById("subidaMasiva");
const $elegirClinicaExcel = document.getElementById("elegirClinicaExcel");

const $modal__esperar = document.getElementById("modal__esperar");

const $uploadFile = document.getElementById("uploadFile");
const $carga_subida = document.getElementById("carga_subida");

$btn__upload.onclick = (e) => {
    e.preventDefault();

    $fileUpload.click();

    return false;
}

$lista_terceros.onclick = (e) => {
    e.preventDefault();

    try {

        const formData = new FormData();
        formData.append("funcion","listaSubContratas");
        fetch('../inc/consultasmedicas.inc.php',{
            method: "POST",
            body:formData,
        })
        .then(function(response){
            return response.json();
        })
        .then(dataJson => {
            if($lista_terceros.value==""){
                if (dataJson.respuesta){
                    //console.log(dataJson.lista.length);
                    for(let i=0;i<dataJson.lista.length;i++){
                        let opt = document.createElement('option');
                        opt.innerHTML = dataJson.lista[i].nombre;
                        opt.value= dataJson.lista[i].ruc;
                        $lista_terceros.appendChild(opt);
                    }
                    console.log($lista_terceros.value);
                }
            }
               
        });    
    } catch (error) {
        mostrarMensaje(error,"msj_error");
    }
}

/*
$btn__uploadSerfarmed.onclick = (e) => {
    e.preventDefault();

    $fileUpload.click();

    return false;
}

$btn__uploadAmericas.onclick = (e) => {
    e.preventDefault();

    $fileUpload.click();

    return false;
}

/*
$fileUpload.onchange = (e) => {
    e.preventDefault();//probar si funciona o no despues del parentesis
    if($fileUpload.files && $fileUpload.files[0])
        console.log("File Seleccionado : ", $fileUpload.files[0]);
    try {
        if (validar($fileUpload)) throw 'Archivo inválido. No se permite la extensión ';
        const formData = new FormData();
        formData.append('fileUpload',$fileUpload.files[0]);
        fetch ('../inc/importar.inc.php',{
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.respuesta) {
                mostrarMensaje("Historias Actualizadas","msj_correct");
            }else{
                mostrarMensaje("Hubo un error al actualizar","msj_error");
            }
        })
        .catch(error => {
            console.error(error);
        })
    } catch (error) {
        mostrarMensaje(error,"msj_error");
    }
    return false;
}*/

const changeProgress = (progress) => {
    progressbar.style.width = `${progress}%`;
  };  

$elegirClinicaExcel.onchange = (e) => {
    e.preventDefault();
    $fileUpload.onchange = (e) => {
        e.preventDefault();

        if($fileUpload.files && $fileUpload.files[0])
        console.log("File Seleccionado : ", $fileUpload.files[0]);

        try {
            if (validar($fileUpload)) throw 'Archivo inválido. No se permite la extensión ';
            changeProgress(25);
            const formData = new FormData();
            formData.append('fileUpload',$fileUpload.files[0]);
            switch($elegirClinicaExcel.value){
                case "1":
                    formData.append("validacion","subidaMedex");
                    break;
                case "2":
                    formData.append("validacion","subidaSerfarmed");
                    break;
                case "3":
                    formData.append("validacion","subidaAmericas");
                    break;
            }
            fetch ('../inc/importar.inc.php',{
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                changeProgress(50);
                if (data.respuesta) {
                    changeProgress(100);
                    mostrarMensaje("Historias Actualizadas","msj_correct");
                }else{
                    mostrarMensaje("Hubo un error al actualizar","msj_error");
                }
            })
            .catch(error => {
                console.error(error);
            })
        } catch (error) {
            mostrarMensaje(error,"msj_error");
        }
    //mostrarMensaje($elegirClinicaExcel.value,"msj_error")
    //console.log($elegirClinicaExcel.value)
        
    }
}
let avance=20;
let carga_subida_excel=0;
$subida_masiva_excel.onchange = (e) => {
    e.preventDefault();
   // let i=0;
    var totalFiles = $subida_masiva_excel.files.length;
    let r=0;
   
    for(let i=0;i<$subida_masiva_excel.files.length;i++){
        r=r+$subida_masiva_excel.files[i].size;
    }

    if(totalFiles>0){//de aqi
        if(totalFiles>20){
            mostrarMensaje("Limite 20 archivos","msj_error");//mostrar exceso
        }
        else{//hasta aqui se reemplaza por un for y un while ----> validar tamaño tmb U:
            try {
                if(validar($subida_masiva_excel)) throw 'Archivo no valido';
                changeProgress(20);
                const formData = new FormData();

                for(var index=0; index<totalFiles; index++){
                    
                    carga_subida_excel = 80/totalFiles;
                    avance = avance+carga_subida_excel;
                    formData.append('fileUpload',$subida_masiva_excel.files[index]);
                    fetch ('../inc/importarMasivaExcel.inc.php',{
                        //formData.append('subida_masiva_excel',$subida_masiva_excel.files);
                        //fetch ('../inc/importarMasivaExcel.inc.php',{
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.respuesta) {
                                changeProgress(avance);
                                mostrarMensaje("Historias Actualizadas" ,"msj_correct");
                            }else{
                                mostrarMensaje("Hubo un error al actualizar","msj_error");
                            }
                        })
                        .catch(error => {
                            console.error(error);
                        })
                }
            } catch (error) {
                mostrarMensaje(error,"msj_error");
            }
        }
    }else{
        mostrarMensaje("elija un documento","msj_error");
    }
}

$uploadFile.onchange = (e) =>{//para la carga masiva de PDFs
    e.preventDefault();

    var totalFiles = $uploadFile.files.length;
    let r=0;
	
    for(let i=0;i<$uploadFile.files.length;i++){
  	let t = $uploadFile.files[i].size;
    r=r+$uploadFile.files[i].size;
    }

    if(r>0){
        if(r>20000000){//DEBE SER 15MB
            mostrarMensaje("Limite 20MB de archivos","msj_error");//mostrar exceso
        }
        else{

            try {
                if(validar($uploadFile)) throw 'Archivo no valido';
                changeProgress(20);
                const formData = new FormData();//poneer red lenta para testear uu

                for(var index=0; index<totalFiles;index++){
                    carga_subida_excel = 80/totalFiles;
                    avance = avance+carga_subida_excel;
                    formData.append('files', $uploadFile.files[index]);
                    fetch('../inc/importarMasivaPdf.inc.php',{
                        method: 'POST',
                        body : formData 
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.respuesta) {
                            mostrarMensaje("Documento subido","msj_correct");
                            $uploadFile.files.value = 0;
                            changeProgress(avance);
                        }else{
                            mostrarMensaje("Hubo un error al subir el archivo","msj_error");
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    })
                }
            } catch (error) {
                mostrarMensaje(error,"msj_error");
            }
        }
    }else{
        mostrarMensaje("elija un documento","msj_error");
    }
}

$btnUpdateSubcontratas.onclick = (e) => {
    e.preventDefault();

    getToken("subc");

    return false;
}

$btnUpdateMedex.onclick = (e) => {
    e.preventDefault();

    $modal__esperar.style.display = "block";

    getToken();

    return false;
}

const getToken = (t) => {
	let url = 'https://www.medex.com.pe/ApiCitas/api/Usuario/Login';
	let data = {"usuario":"sistemas.sepcon","password":"sistemas.sepcon"};
    

	fetch(url, {
	  	method: 'POST', // or 'PUT'
	  	body: JSON.stringify(data), // data can be `string` or {object}!
	  	headers:{
	    	'Content-Type': 'application/json'
	  	}
	})
	.then(res => res.json())
	.catch(error => console.error('Error:', error))
	.then(response => {
        if(t=="subc"){
            getDataSubContratas(response.token);      }
        else{
            getDataMedex(response.token);
        }
        //console.log(response.token);
    
    });
}

const getDataMedex = (tokenMedex) => {
    let inicio = $fecha__inicio__medex.value;
    let final = $fecha__final__medex.value;
    let documento = $nro__doc.value == "" ? "-": $nro__doc.value;

	let url = 'https://www.medex.com.pe/ApiCitas/api/ResultadoDigitalExt/GetBaseDatos/20504898173/'+inicio+'/'+final+'/'+documento;
	let token = "Bearer " + tokenMedex;
    
	fetch(url, {
		method: 'GET',
		headers:{
	    	'Authorization': token,
	    	'Content-Type': 'application/json'
	  	}
	})
	.then(res => res.json())
	.catch(error => console.error('Error:', error))
	.then(response => {
        passDatatoMaster(response);
        mostrarMensaje("Registros Actualizados: " + response.length,"msj_info");
        $modal__esperar.style.display = "none";
    });
}

const getDataSubContratas = (tokenMedex) => {
  
            let ruc = $lista_terceros.value;
            let inicio_sc = $fecha__inicio__subc.value;
            let final_sc = $fecha__final__subc.value;
            let documento_sc = $nro__doc_subc.value=="" ? "-": $nro__doc_subc.value;
            //validar para elegir un ruc, sino q exiga o bloquee
            let url = 'https://www.medex.com.pe/ApiCitas/api/ResultadoDigitalExt/GetBaseDatos/'+ruc+'/'+inicio_sc+'/'+final_sc+'/'+ documento_sc;
            let token = "Bearer " + tokenMedex;

            fetch(url, {
                method: 'GET',
                headers:{
                    'Authorization': token,
                    'Content-Type': 'application/json'
                  }
            })
            .then(res => res.json())
            .catch(error => console.error('Error:', error))
            .then(response => {
                passDatatoMaster(response);
                mostrarMensaje("Registros Actualizados: " + response.length,"msj_info");
                $modal__esperar.style.display = "none";
            });
}

const passDatatoMaster = (ApiResult) => {
    let data = new FormData();
                data.append("fichas",JSON.stringify(ApiResult));
                data.append("funcion","cargarApiMedex");

    fetch('../inc/cargaApi.inc.php',{
            method: "POST",
            body:data,
    })
}


