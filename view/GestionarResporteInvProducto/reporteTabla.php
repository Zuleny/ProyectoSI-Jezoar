<?php
require_once('../fpdf/fpdf.php');
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
        $this->Cell(0, 3, '+591 3445925', 0, 1, 'C');
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
$pdf->Cell($w[2], 7, 'Nombre Producto', 1, 0, 'C', true);
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
    foreach ($reporte as $row) {
        $pdf->Cell($w[1], 6, $row[0], 'LR', 0, 'C');
        $pdf->Cell($w[2], 6, $row[1], 'LR', 0, 'C');
        $pdf->Cell($w[3], 6, $row[2], 'LR', 0, 'C');
        /*$pdf->Cell($w[3], 6, $row[3], 'LR', 0, 'C');
        $pdf->Cell($w[4], 6, $row[4], 'LR', 0, 'C');
        $pdf->Cell($w[5], 6, $row[5], 'LR', 0, 'C');
        $pdf->Cell($w[6], 6, $row[6], 'LR', 0, 'C');
        $pdf->Cell($w[7], 6, $row[7], 'LR', 0, 'C');
        $pdf->Cell($w[8], 6, '', 'T');*/
        $pdf->Ln();
    }

    /*$pdf->Cell($w[0], 6, '', 'T');
$pdf->Cell($w[1], 6, '', 'T');
$pdf->Cell($w[2], 6, '', 'T');

$pdf->Cell($w[3], 6, '', 'T');
$pdf->Cell($w[4], 6, '', 'T');
$pdf->Cell($w[5], 6, '', 'T');
$pdf->Cell($w[6], 6, '', 'T');
$pdf->Cell($w[7], 6, '', 'T');
$pdf->Cell($w[8], 6, '', 'T');*/





// Total de servicios privados
//$pdf->Cell($w[0], 6, '', 'T');
//$pdf->SetFont('Arial', 'B', 12);
//$pdf->Cell($w[1], 6, 'Total', '1');
//$pdf->Cell($w[2], 6, $totalPrivado, 1, 0, 'C');
//$pdf->Ln();
//
//$pdf->SetFont('Arial', '', 12);


//    if (!empty($_POST['check_list1'])) {
//$pdf->Cell(0, 10, '', 0, 0, 'C');
//$pdf->Ln();
//
//        //TABLA DE SERVICIOS ADICIONALES
//        $pdf->cell(0, 10, 'SERVICIOS ADICIONALES', 0, 1);
//       // $monto = $_POST['total_list1'];
//        $i=0;
//        $pdf->Cell($w[0], 7, 'Nro', 1, 0, 'C');
//        $pdf->Cell($w[1], 7, 'Servicio adicional', 1, 0, 'C');
//        $pdf->Cell($w[2], 7, 'Monto (Bs.)', 1, 0, 'C');
//        $pdf->Ln();
//        $totalAdicional = 0;
//        foreach ($_POST['check_list1'] as $row) {
//            $totalAdicional = $totalAdicional + $monto[$i];
//                $pdf->Cell($w[0], 6, $i + 1, 'LR', 0, 'C');
//                $pdf->Cell($w[1], 6, $row, 'LR');
//                $pdf->Cell($w[2], 6, $monto[$i], 'LR', 0, 'C');
//            $pdf->Ln();
//            $i = $i + 1;
//        }
// Total de servicios adicionales
//
//        $pdf->Cell($w[0], 6, '', 'T');
//        $pdf->SetFont('Arial', 'B', 12);
//        $pdf->Cell($w[1], 6, 'Total', 1);
//        $pdf->Cell($w[2], 6, $totalAdicional, 1, 0, 'C');
//        $pdf->Ln();
//        $pdf->SetFont('Arial', '', 12);

//  }
//    $pdf->SetY(215);
//    $pdf->Cell(0, 10, '', 0, 0, 'C');
//    $pdf->Ln();
//    //$pdf->cell(0, 8, 'TOTAL = Bs. ' . $_POST['total'] . '.-', 0, 1);
//    $pdf->SetFont('Arial', '', 8);
//    $pdf->cell(0, 4, iconv("UTF-8", "CP1250//TRANSLIT",'Una vez determinado el paquete se realizará la reserva de fecha con el 50% del costo del servicio.'), 0, 1);
//    $pdf->cell(0, 4, iconv("UTF-8", "CP1250//TRANSLIT",'El costo de cada opción no es por hora, si no por servicio.'), 0, 1);
//    $pdf->cell(0, 4, iconv("UTF-8", "CP1250//TRANSLIT",'De 0 a 120 minutos el costo es el mismo.'), 0, 1);
//    $pdf->cell(0, 4, iconv("UTF-8", "CP1250//TRANSLIT",'En todas las opciones, el tiempo máximo de interpretación es de 120 minutos.'), 0, 1);
//    $pdf->cell(0, 4, iconv("UTF-8", "CP1250//TRANSLIT",'Para garantizar la calidad del servicio la "Camerata del Oriente" cuenta con su propio equipo de audio, no es factible utilizar equipo de otra empresa.'), 0, 1);
//    $pdf->cell(0, 4, iconv("UTF-8", "CP1250//TRANSLIT",'Todos los costos son facturados.'), 0, 1);
//}


//$pdf->SetFont('Helvetica', 'I', 8);
//setlocale(LC_ALL, "es_ES");

//$pdf->Cell(0, 10, 'Cotizacion generada el dia '.strftime("%d de %B del %Y").' a horas '.$hoy, 0, 1);
$pdf->Output();
?>