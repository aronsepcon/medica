<?php
    require("connectmedica.inc.php");
    require("mc_table.inc.php");

    $datos = "";
    $receta = "";

    $pdf=new PDF_MC_Table();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',12);
	$pdf->SetTextColor(0,0,0);
    $pdf->Image('../img/logo.png',12,12,25);

?>