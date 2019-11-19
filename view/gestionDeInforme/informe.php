<?php
require_once('../fpdf/fpdf.php');
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
        $this->Cell(0, 10, 'Informe', 0, 1, 'C');
        // T�tulo

        $this->Ln(20);
        $this->SetFont('Helvetica', 'I', 20);

        //Mostrando la descripcion
        $desc = $_REQUEST['des'];
        $this->Cell(0, 3, $desc, 0, 1, 'C');
        // Salto de l�nea
        $this->Ln(30);
        //imprimir las imagenes
        session_start();
        $imagen = $_SESSION['image2'];
        // session_start();



        require "../../model/informeModel.php";
        $nuev = new Informe();
        $pic = $nuev->getImage($imagen);
        if ($pic!==false){
            $this->Image($pic[0], 20,170,50,50, $pic[1]);
            $this->SetXY(-350,155);
            $this->Cell(0, 12, 'Antes', 0, 1, 'C');
        }
        session_abort();
        session_start();
        $imagen2 = $_SESSION['image3'];
        $pic2 = $nuev->getImage($imagen2);
        if ($pic!==false){
            $this->Image($pic2[0], 100,170,50,50, $pic2[1]);
            $this->SetXY(30,155);
            $this->Cell(0, 12, 'Despues', 0, 1, 'C');

        }
        session_abort();
    }

// Pie de p�gina
    function Footer()
    {
        // Posici�n: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Helvetica', 'BI', 8);

        $this->Cell(0, 3, 'Informe de entrega, ' , 0, 1, 'C');
        $this->SetFont('Helvetica', 'I', 8);

        $this->Cell(0, 3, 'Empresa Jezoar', 0, 1, 'C');
    //    $this->Cell(0, 3, '+591 60606060', 0, 1, 'C');
        // N�mero de p�gina
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

}

// CreaciOn del objeto de la clase heredada

setlocale(LC_ALL, "es_ES");
date_default_timezone_set('America/La_Paz');
$fecha = date('d-F-Y');
$hora = date("H:i:s");
setlocale(LC_CTYPE, 'en_US');


$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->SetMargins(15, 30, 5);
$pdf->Ln();

//LUGAR Y FECHA $this->SetY(-15);
$pdf->SetY(280);
$pdf->cell(0, 10, 'Santa Cruz de la Sierra, ' . $fecha.'a horas'.$hora, 0, 1);
//TABLA DE SERVICIOS PRIVADOS
// Datos
if (session_status() == PHP_SESSION_NONE) {
ob_start();
session_start();
}

// Total de servicios privados

//$pdf->Cell(5, 6, 'miau', 'T');


$pdf->Output();
?>