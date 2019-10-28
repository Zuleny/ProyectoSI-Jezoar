<?php
    function getTablaNotaEgreso(){
        require "../../model/NotasModel/notaEgresoModel.php";
        $notaEgreso = new NotaEgreso(0,"","");
        $result = $notaEgreso->getListaNotaEgreso();
        $nroFilas = pg_num_rows($result);
        $printer = "";
        for ($nroTupla=0 ; $nroTupla < $nroFilas ; $nroTupla++){
            $printer.= '<tr> <td>'.pg_result($result,$nroTupla,0).'</td>';
            $printer.=      '<td>'.pg_result($result,$nroTupla,1).'</td>';
            $printer.=      '<td>'.pg_result($result,$nroTupla,2).'</td></tr>';
        }
        return $printer;
    }

?>

