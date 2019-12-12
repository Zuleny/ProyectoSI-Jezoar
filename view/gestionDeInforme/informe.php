<?php
require_once('../fpdf/fpdf.php');
require "../../model/Conexion.php";

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

//require "../../controller/informeController.php";
$codInforme= ($_GET['cod_ver']);
$conexion = new Conexion();
$result = $conexion->execute("select nombre,direccion from cliente, presentacion, cotizacion,informe where cod_informe=$codInforme and cod_cliente = presentacion.cod_cliente_presentacion and presentacion.cod_presentacion = cotizacion.cod_presentacion_cotizacion
        and cotizacion.cod_presentacion_cotizacion = informe.cod_presentacion_cotizacion;");
$nombre = pg_result($result,0,0);


$datosDeInforme = $conexion->execute("select * from informe where cod_informe=$codInforme;");
$pdf->SetFont('Times','',12);
//$pdf->Write(5,'El cliete '.$nombre.' solicito los servicios de limpieza profunda');
    $pdf->SetFont('Times','',12);
    // Imprimimos el texto justificado
	
    $pdf->Write(7,'De mi consideracion, me dirijo a usted(es) '.$nombre);

    $pdf->Ln();
    $pdf->Write(7,' '.utf8_decode(pg_result($datosDeInforme,0,2)));

    // Salto de línea
    $pdf->Ln();
$pdf->cell(0, 10, 'Santa Cruz de la Sierra, ' . $hour, 0, 1);
function getImage($dataURI){
    $img = explode(',',$dataURI,2);
    $pic = 'data://text/plain;base64,'.$img[1];
    $type = explode("/", explode(':', substr($dataURI, 0, strpos($dataURI, ';')))[1])[1]; // get the image type
    if ($type=="png"||$type=="jpeg"||$type=="gif") return array($pic, $type);
    return false;
}

session_start();
$imagen = pg_result($datosDeInforme,0,4);
if($imagen != null){
    $pic = getImage($imagen);
    if ($pic!==false){
        $pdf->Image($pic[0], 20,155,50,50, $pic[1]);
        $pdf->SetXY(-350,140);
        $pdf->Cell(0, 12, 'Antes', 0, 1, 'C');
    }
}
session_abort();
session_start();
$imagen2 = pg_result($datosDeInforme,0,5);
if($imagen2 != null){
    $pic2 = getImage($imagen2);
    if ($pic!==false){
        $pdf->Image($pic2[0], 100,155,50,50, $pic2[1]);
        $pdf->SetXY(30,140);
        $pdf->Cell(0, 12, 'Despues', 0, 1, 'C');

    }
}
session_abort();

$pdf->Output();
?>