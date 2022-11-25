import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import {validar} from "./funciones.js";

const $btn__upload = document.getElementById("btn__upload");
const $btn__uploadSerfarmed = document.getElementById("btn__uploadSerfarmed");
const $btn__uploadAmericas = document.getElementById("btn__uploadAmericas");
const $fileUpload = document.getElementById("fileUpload");
const $btnUpdateMedex = document.getElementById("btnUpdateMedex");
const $fecha__inicio__medex = document.getElementById("fecha__inicio__medex");
const $fecha__final__medex = document.getElementById("fecha__final__medex");

const $nro__doc = document.getElementById("nro__doc");
const $subida_masiva_excel=document.getElementById("subidaMasiva");
const $elegirClinicaExcel = document.getElementById("elegirClinicaExcel");

const $modal__esperar = document.getElementById("modal__esperar");

const $uploadFile = document.getElementById("uploadFile");


$btn__upload.onclick = (e) => {
    e.preventDefault();

    $fileUpload.click();

    return false;
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

$btnUpdateMedex.onclick = (e) => {
    e.preventDefault();

    $modal__esperar.style.display = "block";

    getToken();

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

$elegirClinicaExcel.onchange = (e) => {
    e.preventDefault();
    $fileUpload.onchange = (e) => {
        e.preventDefault();

        if($fileUpload.files && $fileUpload.files[0])
        console.log("File Seleccionado : ", $fileUpload.files[0]);

        try {
            if (validar($fileUpload)) throw 'Archivo inválido. No se permite la extensión ';
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
    //mostrarMensaje($elegirClinicaExcel.value,"msj_error")
    //console.log($elegirClinicaExcel.value)
        
    }
}

$subida_masiva_excel.onchange = (e) => {
    e.preventDefault();

    var totalFiles = $subida_masiva_excel.files.length;

    if(totalFiles>0){
        if(totalFiles>20){
            mostrarMensaje("Limite 20 archivos","msj_error");//mostrar exceso
        }
        else{
            try {
                if(validar($subida_masiva_excel)) throw 'Archivo no valido';
                
                const formData = new FormData();

                for(var index=0; index<totalFiles; index++){
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
                            mostrarMensaje("Historias Actualizadas","msj_correct");
                            console.log(index);
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

    if(totalFiles>0){
        if(totalFiles>20){
            mostrarMensaje("Limite 20 archivos","msj_error");//mostrar exceso
        }
        else{
            try {
                if(validar($uploadFile)) throw 'Archivo no valido';
                const formData = new FormData();

                for(var index=0; index<totalFiles;index++){
                    formData.append('files', $uploadFile.files[index]);

                    fetch('../inc/importarMasivaPdf.inc.php',{
                        method: 'POST',
                        body : formData 
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.respuesta) {
                            mostrarMensaje("Documento subido","msj_correct");
                        }else{
                            mostrarMensaje("Hubo un error al subir el archivo","msj_error");
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    })
                }
                listarExamenes();
            } catch (error) {
                mostrarMensaje(error,"msj_error");
            }
        }
    }else{
        mostrarMensaje("elija un documento","msj_error");
    }
}

const getToken = () => {
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
        getDataMedex(response.token);
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

const passDatatoMaster = (ApiResult) => {
    let data = new FormData();
                data.append("fichas",JSON.stringify(ApiResult));
                data.append("funcion","cargarApiMedex");

    fetch('../inc/cargaApi.inc.php',{
            method: "POST",
            body:data,
    })
}


