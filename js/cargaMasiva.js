import {mostrarMensaje} from "./funciones.js";
import {fadeIn} from "./funciones.js";
import {fadeOut} from "./funciones.js";
import {validar} from "./funciones.js";
import {listarexamenes} from "./historias";

const $btn__uploadPDF = document.getElementById("btn__uploadPDF");
const $uploadFile = document.getElementById("uploadFile");
/*
$btn__uploadPDF.onclick = (e) => {
    e.preventDefault();

    $file.click();

    return false;
}*/
//let files = 0;

$uploadFile.onchange = (e) =>{
    e.preventDefault();

    var totalFiles = $uploadFile.files.length;

    if(totalFiles>0){
        try {
            if(validar($uploadFile)) throw 'Archivo no valido';

        /*   const fileReader = new FileReader();

            fileReader.addEventListener('load', (e)=>{
                const fileUrl = fileReader.result;
            });

            fileReader.readAsDataURL(files);*/

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
                        //listarexamenes();
                    }else{
                        mostrarMensaje("Hubo un error al subir el archivo","msj_error");
                    }
                })
                .catch(error => {
                    console.error(error);
                })
            }
           // listarexamenes();
//como resetear el input
            } catch (error) {
                mostrarMensaje(error,"msj_error");
            }
    // return false;
    }else{
        mostrarMensaje("elija un documento","msj_error");
    }
}/*
let files = 0;

$file.addEventListener("change",(e) => {
    e.preventDefault();

    files = e.target.files;
    processFile(files);
}

)   

function processFile(file){
    const docType = file.type;
    const validExtensions = [".pdf"];

    if(validExtensions.includes(docType)){
        const fileReader = new FileReader();

        fileReader.addEventListener('load', (e)=>{
            const fileUrl = fileReader.result;
        });

        fileReader.readAsDataURL(file);
        uploadFile(file);
    }else{
        mostrarMensaje("el formato del archivo no es válido","msn_error");
    }
}

async function uploadFile(file){

    const formData = new FormData();
    formData.append("file",file);

    try {
        const response = await fetch("../inc/importarMasivaPdf.inc.php",{
            method: 'POST',
            body: formData,
        });
        const responseText = await response.text();

    } catch (error) {
        
    }

}*/