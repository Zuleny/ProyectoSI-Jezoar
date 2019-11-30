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
       //$this->Cell(0, 3, ' ', 0, 1, 'C');
        // T�tulo

        $this->Ln(20);
        $this->SetFont('Helvetica', 'I', 20);
        $this->Cell(0, 3, 'INFORME', 0, 1, 'C');
        // Salto de l�nea
        $this->Ln(30);

    }

// Pie de p�gina
    function Footer()
    {
        // Posici�n: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Helvetica', 'BI', 8);
        // N�mero de p�gina
//$this->Cell(0, 3, 'Informe de entrega  ' . strftime("%d de %B del %Y") . ' a horas ' . date("H:i:s"), 0, 1, 'C');
        $this->Cell(0, 3, 'Informe de entrega  ' . strftime("%d de %B del %Y") , 0, 1, 'C');
        $this->SetFont('Helvetica', 'I', 8);

        $this->Cell(0, 3, 'Empresa Jezoar', 0, 1, 'C');
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        // $this->Cell(0, 3, '+591 7000000', 0, 1, 'C');
    }

}

// CreaciOn del objeto de la clase heredada

setlocale(LC_ALL, "es_ES");
date_default_timezone_set('America/La_Paz');
$hour = date('d-F-Y');
$hoy = date("H:i:s");
setlocale(LC_CTYPE, 'en_US');

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->SetMargins(15, 30, 5);
$pdf->Ln();
//recuperando texto de informacion
$desc = $_REQUEST['des'];
/*$desc = stripslashes($desc);
$desc = iconv('UTF-8', 'windows-1252',$desc);*/
$nombre = $_REQUEST['cliente'];

//$nombre = $_POST['nombreCliente'];
$pdf->SetFont('Times','',12);
//$pdf->Write(5,'El cliete '.$nombre.' solicito los servicios de limpieza profunda');
    $pdf->SetFont('Times','',12);
    // Imprimimos el texto justificado
$parte2 = '';
    $pdf->Write(7,'De mi consideracion, me dirijo a usted(es) '.$nombre);
    $pdf->Write(7,' '.$desc);
    // Salto de línea
    $pdf->Ln();
$pdf->cell(0, 10, 'Santa Cruz de la Sierra, ' . $hour, 0, 1);

require "../../model/informeModel.php";
session_start();
$imagen = $_SESSION['image2'];
if($imagen != null){
    $nuev = new Informe();
    $pic = $nuev->getImage($imagen);
    if ($pic!==false){
        $pdf->Image($pic[0], 20,155,50,50, $pic[1]);
        $pdf->SetXY(-350,140);
        $pdf->Cell(0, 12, 'Antes', 0, 1, 'C');
    }
}
session_abort();

session_start();
$imagen2 = $_SESSION['image3'];
if($imagen2 != null){
    $pic2 = $nuev->getImage($imagen2);
    if ($pic!==false){
        $pdf->Image($pic2[0], 100,155,50,50, $pic2[1]);
        $pdf->SetXY(30,140);
        $pdf->Cell(0, 12, 'Despues', 0, 1, 'C');

    }
}
session_abort();

//TABLA DE SERVICIOS PRIVADOS
//$pdf->cell(0, 10, 'VENTAS', 0, 1);
// Anchuras de las columnas
//$w = array(20,20,10,30,20,25,30,25,-180);
// Cabeceras
//$pdf->SetFillColor(50, 50, 50); // Color de la cabecera
//$pdf->SetTextColor(225, 225, 225);
//$pdf->Cell($w[2], 7, 'Nit', 1, 0, 'C', true);
/* Datos
if (session_status() == PHP_SESSION_NONE) {
ob_start();
session_start();
}
$reporte=array();*/
//$pdf->Cell($w[0], 6, 'hola', 'LR', 0, 'C');
   // foreach ($reporte as $row) {
       // $pdf->Cell($w[0], 6, $row[0], 'LR', 0, 'C');

   // }

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

//    $pdf->SetY(215);
//    $pdf->Cell(0, 10, '', 0, 0, 'C');
//    $pdf->Ln();
//    //$pdf->cell(0, 8, 'TOTAL = Bs. ' . $_POST['total'] . '.-', 0, 1);
//    $pdf->SetFont('Arial', '', 8);
//    $pdf->cell(0, 4, iconv("UTF-8", "CP1250//TRANSLIT",'Una vez determinado el paquete se realizará la reserva de fecha con el 50% del costo del servicio.'), 0, 1);
//    $pdf->cell(0, 4, iconv("UTF-8", "CP1250//TRANSLIT",'El costo de cada opción no es por hora, si no por servicio.'), 0, 1);
//}
//$this->SetFont('Helvetica', 'I', 20);
//$this->Cell(0, 3, $descripcion, 0, 1, 'C');


//$pdf->Cell(0, 10, 'Cotizacion generada el dia '.strftime("%d de %B del %Y").' a horas '.$hoy, 0, 1);
$pdf->Output();
?>