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
            $errorMessage = "<b>Error en proceso de Registro de almacen</b>";
            header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
        }else{
            session_start();
            $fecha_hora = date('j-n-Y G:i:s', time());
            $username = $_SESSION['user'];
            $almacen->Conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Registro de Almacen: $nombre', '$fecha_hora');");
            header('Location: ../view/gestionDeAlmacen/gestionAlmacen.php');
        }

    }    
    function getListaDeAlmacen(){
        require_once "../../model/AlmacenModel.php"; 
        $lista=new Almacen(0,"almacen","Dir");
        $result=$lista->getListaAlmacen();
        $countTuplas=pg_num_rows($result);
        $printer="";
            for ($tupla=0; $tupla < $countTuplas; $tupla++){ 
                $printer.='<tr> <td>'. pg_result($result,$tupla,0).'</td>';
                $printer.= '<td>'. pg_result($result,$tupla,1).'</td>';
                $printer.= '<td>'. pg_result($result,$tupla,2).'</td>';
                $printer.= '<td>
                <class="btn-group">                                               
                    <button type="button" class="btn bg-purple btn-xs" title="Editar">
                        <i class="fa fa-edit"></i>
                    </button>
                </td> 
                </tr>'; 
            }
        return $printer;
    }
?>