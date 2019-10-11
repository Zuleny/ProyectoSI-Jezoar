<?php
   require "Conexion.php";
   class Personal{
       public $idPersonal;
       public $nombre;
       public $tipo;
       public $cargo;
       public $conexion;

       public function __construct($nombre,$tipo,$cargo){
           $this->conexion=new Conexion();
           $this->idPersonal=$this->getCantidadDePersonal()+1;
           $this->nombre=$nombre;
           $this->tipo=$tipo;
           $this->cargo=$cargo;
       }

       public function insertarPersonal(){
         try{
            $this->conexion->execute("insert into Personal values($this->idPersonal,'$this->nombre','$this->tipo','$this->cargo');");
            return true;
         }catch(\Throwable $th){
            return false;
         }
       }

       public function getCantidadDePersonal(){
          $cant=$this->conexion->execute("select count(*) from Personal;");
          return pg_result($cant,0,0);
       }

       public function getListaTipoDePersonal(){
          $lista=$this->conexion->execute("select distinct(tipo) from Personal;");
          return $lista;
       }

       public function getListaCargoDePersonal(){
         $lista=$this->conexion->execute("select distinct(cargo) from Personal;");
         return $lista;
       }

       public function getListaDePersonal(){
         $lista=$this->conexion->execute("select* from Personal;");
          return $lista;
       }
   }
?>