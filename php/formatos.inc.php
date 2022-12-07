<?php
    $random = rand(0,1000);

    if($_SESSION['logged'] == false){
        session_unset();
        session_destroy();
        header('location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css?v<?php echo $random; ?>" type="text/css">
    <link rel="stylesheet" href="../css/all.css" type="text/css">
    <title>Document</title>
</head>
<body>
<section class="wrap">
    <section class="creacion_formatos">
        <div>
            <span>Centro de Costo</span>
            <select name="" id="ccostos">
                <option value="0">2100</option>
                <option value="1">2300</option>
                <option value="2">2600</option>
            </select>
        </div>
        <div>
            <span>Formato</span>
            <select name="" id="formato">
                <option value="0">001</option>
                <option value="1">006</option>
            </select>
        </div>
        <button type="button" id="exportar">Exportar</button>
        
    </section>
</section>
<script src="../js/xlsx.full.min.js"></script>
<script src="../js/formatos.js?v<?php echo $random;?>" type="module"></script>
</body>
</html>