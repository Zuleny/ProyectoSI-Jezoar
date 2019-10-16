<?php
    if (isset($_POST['empresaProv']) && isset($_POST['emailProv']) && isset($_POST['dirProv']) && isset($_POST['telProv'])&& isset($_POST['nameProv'])) {
        $nombre_empresa=$_POST['empresaProv'];
        $email=$_POST['emailProv'];
        $direccion=$_POST['dirProv'];
        $telefono=$_POST['telProv'];
        $nombre_proveedor=$_POST['nameProv'];
        echo $nombre_empresa;
        echo $email;
        echo $direccion;
        echo $telefono;
        echo $nombre_proveedor;
        require "../model/ProveedorModel.php";
        $proveedor = new Proveedor(0,$nombre_empresa,$email,$direccion,$telefono,$nombre_proveedor);
        $proveedor->codProveedor = $proveedor->getCantidadProveedor()+1;
        if (!$proveedor->insertarProveedor()) {
            echo "Error No se pudo registrar al nuevo proveedor
                    vuelva a interntarlo";
        }
        header('Location: ../view/gestionDeProveedor/gestionProveedor.php');
    }
    function getListaDeProveedor(){
        require "../../model/ProveedorModel.php";
        $lista=new Proveedor(0,"empresaProv","emailProv","dirProv","telProv","nameProv");
        $result=$lista->getListaDeProveedor();
        $countTupla=pg_num_rows($result);
        $printer="";
        for ($tupla=0; $tupla < $countTupla; $tupla++){ 
            $printer.= "<tr> <td>". pg_result($result,$tupla,0)."</td>";
            $printer.= "<td>".'<div contentEditable="false">'. pg_result($result,$tupla,1)."</div></td>";
            $printer.= "<td>".'<div contentEditable="false">'. pg_result($result,$tupla,2)."</div></td>";
            $printer.= "<td>".'<div contentEditable="false">'. pg_result($result,$tupla,3)."</div></td>";
            $printer.= "<td>".'<div contentEditable="false">'. pg_result($result,$tupla,4)."</div></td>";
            $printer.= "<td>".'<div contentEditable="false">'. pg_result($result,$tupla,5)."</div></td>";
            $printer.= '<td> 
                        <div class="btn-group">                                               
                            <button type="button" class="btn btn-warning btn-xs" title="Actualizar">
                                <i class="fa fa-fw fa-refresh"></i>
                            </button>
                            <button type="button" class="btn bg-purple btn-xs" title="Editar">
                                <i class="fa fa-edit"></i>
                            </button>
                        </div>
                    </td> 
                </tr>';            
        }
        return $printer;
    }
?>