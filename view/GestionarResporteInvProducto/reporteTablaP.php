<?php
require_once('../fpdf/fpdf.php');
require ('../../model/Conexion.php');
//require_once('admin/Modelo/categoria.php');
//require_once('admin/connection.php');


class PDF extends FPDF
{
// Cabecera de p�gina
    function Header()
    {
        //Logo
          $this->Image('../../documentation/jezoar.png',20,10,0);
         //Arial bold 15
        $this->SetFont('Helvetica', 'B', 20);
        // Movernos a la derecha
       // $this->Cell(0, 3, 'Empresa de Limpieza', 0, 1, 'C');
        // T�tulo

        $this->Ln(20);
        $this->SetFont('Helvetica', 'B', 20);
        $this->Cell(0, 3, 'REPORTE DE INVENTARIO ', 0, 1, 'C');
        $this->Ln(7);
        $this->Cell(0, 3, 'DE PRODUCTOS', 0, 1, 'C');
        // Salto de l�nea
        $this->Ln(20);
    }

// Pie de p�gina
    function Footer()
    {
        // Posici�n: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Helvetica', 'BI', 8);
        // N�mero de p�gina
        //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        $this->Cell(0, 3, 'Reporte de inventario  ' . strftime("%d de %B del %Y") . ' a horas ' . date("H:i:s"), 0, 1, 'C');
        $this->SetFont('Helvetica', 'I', 8);

        $this->Cell(0, 3, 'Empreza de Limpieza Jezoar', 0, 1, 'C');
    }
}

// CreaciOn del objeto de la clase heredada

setlocale(LC_ALL, "es_ES");
date_default_timezone_set('America/La_Paz');
$hour = date('d-F-Y');
$hoy = date("H:i:s");
setlocale(LC_CTYPE, 'es_ES');


$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->SetMargins(15, 30, 5);
//$pdf->Image('Pagina.jpg',10,55);
//if (!empty($_POST['check_list'])) { // VERIFICA QUE SE HAYAN SELECCIONADO ALGUN CHECKBOX
//LUGAR Y FECHA
$pdf->SetFont('Arial', '', 9);
$pdf->cell(0, 10, 'Santa Cruz de la Sierra, ' . $hour, 0, 1);
$pdf->Ln(5);

//TABLA DE SERVICIOS PRIVADOS
$pdf->cell(0, 10, 'TABLA DE PRODUCTOS', 0, 1,'C');
// Anchuras de las columnas
$w = array(15,15,110,30);
// Cabeceras
$pdf->SetFillColor(50, 50, 50); // Color de la cabecera
$pdf->SetTextColor(225, 225, 225);


$pdf->Cell($w[0], 7, "");
$pdf->Cell($w[1], 7, 'Nro.', 1, 0, 'C', true);
$pdf->Cell($w[2], 7, 'Nombre del producto', 1, 0, 'C', true);
$pdf->Cell($w[3], 7, 'Stock', 1, 0, 'C', true);
$pdf->Ln();
$pdf->SetTextColor(0, 0, 0);
// Datos
if (session_status() == PHP_SESSION_NONE) {
ob_start();
session_start();
}
$reporte=array();
//$pdf->Cell($w[0], 6, 'hola', 'LR', 0, 'C');
$conexion = new Conexion();
$nombreAlmacen=$_GET['nombre'];
$result=$conexion->execute("SELECT InsumoNombre, stockInsumo from getInventarioDeProductos('$nombreAlmacen');");
$row=pg_num_rows($result);
$nro=0;
    for ($i=0;$i<$row;$i++) {
        $nro++;
        $pdf->Cell($w[0], 7, "");
        $pdf->Cell($w[1], 7, $nro, 1, 0, 'C');
        $pdf->Cell($w[2], 7, utf8_decode(pg_result($result,$i,0)), 1, 0, 'C');
        $pdf->Cell($w[3], 7, pg_result($result,$i,1), 1, 0, 'C');
        /*$pdf->Cell($w[3], 6, $row[3], 'LR', 0, 'C');
        $pdf->Cell($w[4], 6, $row[4], 'LR', 0, 'C');
        $pdf->Cell($w[5], 6, $row[5], 'LR', 0, 'C');
        $pdf->Cell($w[6], 6, $row[6], 'LR', 0, 'C');
        $pdf->Cell($w[7], 6, $row[7], 'LR', 0, 'C');
        $pdf->Cell($w[8], 6, '', 'T');*/
        $pdf->Ln();
    }



//$pdf->SetFont('Helvetica', 'I', 8);
//setlocale(LC_ALL, "es_ES");

//$pdf->Cell(0, 10, 'Cotizacion generada el dia '.strftime("%d de %B del %Y").' a horas '.$hoy, 0, 1);
$pdf->Output();
?>