<?php
function nuevaNota(){
    require "../../model/NotasModel/notaEgresoModel.php";
    $notaEgreso1=new NotaEgreso();
    $result1=$notaEgreso1->getNewNota();
    return $result1;
}

?>
