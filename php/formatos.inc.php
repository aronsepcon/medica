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
    <title>Document</title>
</head>
<body>
<section class="wrap">
    <section class="creacion_formatos">
        <div>
            <span>Centro de Costo</span>
            <select name="" id="">
                <option value="0">2600</option>
                <option value="1">2100</option>
                <option value="2">2300</option>
            </select>
        </div>
        <div>
            <span>Formato</span>
            <select name="" id="">
                <option value="0">001</option>
                <option value="1">006</option>
            </select>
        </div>
    </section>
</section>
</body>
</html>