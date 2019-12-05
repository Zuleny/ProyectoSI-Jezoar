<?php
require_once('../fpdf/fpdf.php');
require ('../../model/Conexion.php');

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
        $this->Cell(0, 3, 'DE HERRAMIENTAS', 0, 1, 'C');
        // Salto de l�nea
        $this->Ln(10);
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

//LUGAR Y FECHA
$pdf->SetFont('Arial', '', 8);
$pdf->cell(0, 10, 'Santa Cruz de la Sierra, ' . $hour, 0, 1);
$pdf->Ln(6);

//TABLA DE INVENTARIO
$pdf->SetFont('Helvetica', 'B', 10);
$nombreAlmacen=$_GET['nombre'];
$pdf->cell(0, 10, 'TABLA DE HERRAMIENTAS EN EL ALMACEN "'.$nombreAlmacen.'"', 0, 1,'C');
// Anchuras de las columnas
$w = array(15,15,110,30);
// Cabeceras
$pdf->SetFillColor(50, 50, 50); // Color de la cabecera
$pdf->SetTextColor(225, 225, 225);


$pdf->Cell($w[0], 7, "");
$pdf->Cell($w[1], 7, 'Nro.', 1, 0, 'C', true);
$pdf->Cell($w[2], 7, 'Nombre de la herramienta', 1, 0, 'C', true);
$pdf->Cell($w[3], 7, 'Stock', 1, 0, 'C', true);
$pdf->Ln();
$pdf->SetTextColor(0, 0, 0);
// Datos
$pdf->SetFont('Arial', '', 10);
//$pdf->Cell($w[0], 6, 'hola', 'LR', 0, 'C');
$conexion = new Conexion();
$result=$conexion->execute("SELECT nombre, stock from getHerramientaStock('$nombreAlmacen');");
$row=pg_num_rows($result);
$nro=0;
    for ($i=0;$i<$row;$i++) {
        $nro++;
        $pdf->Cell($w[0], 7, "");
        $pdf->Cell($w[1], 7, $nro, 1, 0, 'C');
        $pdf->Cell($w[2], 7, utf8_decode(pg_result($result,$i,0)), 1, 0, 'C');
        $pdf->Cell($w[3], 7, pg_result($result,$i,1), 1, 0, 'C');
        /*$pdf->Cell($w[3], 6, $row[3], 'LR', 0, 'C');
        $pdf->Cell($w[8], 6, '', 'T');*/
        $pdf->Ln();
    }

    session_start();
    $fecha_hora = date('j-n-Y G:i:s', time());
    $username = $_SESSION['user'];
    $conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora)
                        VALUES ('$username', 'Generó PDF del Reporte de Herramientas en el Almacen ($nombreAlmacen)', '$fecha_hora');");

$pdf->Output();
?>