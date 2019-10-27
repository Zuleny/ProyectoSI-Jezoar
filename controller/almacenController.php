<?php
    if (isset($_POST['Almacen']) && isset($_POST['Dir'])) {
        $nombre=$_POST['Almacen'];
        $Direccion=$_POST['Dir'];
        echo $nombre;
        echo $Direccion;
        require_once '../model/AlmacenModel.php';
        $almacen = new Almacen(0,$nombre,$Direccion);
        $almacen->codAlmacen = $almacen->getCantidadAlmacen()+1;
        echo $almacen->codAlmacen;
        if (!$almacen->insertarAlmacen()) {
            echo "Error No se pudo registrar al nuevo almacen
                    vuelva a interntarlo";
        }
        header('Location: ../view/gestionDeAlmacen/gestionAlmacen.php');
    }    
    function getListaDeAlmacen(){
        require_once "../../model/AlmacenModel.php"; 
        $lista=new Almacen(0,"almacen","Dir");
        $result=$lista->getListaAlmacen();
        $countTuplas=pg_num_rows($result);
        $printer="";
            for ($tupla=0; $tupla < $countTuplas; $tupla++){ 
                $printer.='<tr> <td>'. pg_result($result,$tupla,0).'</td>';
                $printer.= '<td>'.'<div contentEditable="false">'. pg_result($result,$tupla,1).'</div></td>';
                $printer.= '<td>'.'<div contentEditable="false">'. pg_result($result,$tupla,2).'</div></td>';
                $printer.= '<td>
                <div class="btn-group">                                               
                    <button type="button" class="btn bg-purple btn-xs" data-toggle="modal" data-target="#modal-default "title="Editar">
                        <i class="fa fa-edit"></i>
                    </button>
                </div>
                </td> 
                </tr>'; 
            }
        return $printer;
    }
?>