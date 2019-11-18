<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../../../public/assets/AdminLTE/bower_components/datatables/datatables.min.css"/>
  </head>
<script type="text/javascript" src="../../../public/assets/AdminLTE/bower_components/datatables/datatables.min.js"></script>

<script>
   $(document).on("ready",function(){
      listar();
   });
   var listar= function(){
     var table=$("#tabla1").DataTable({
        "ajax":{
          "method":"POST",
          "url":"../../../controller/personalController.php?op=getListaDePersonal";
        },
        "columns":[
          {"array":"id_personal"},
          {"array":"nombre"},
          {"array":"tipo"},
          {"array":"cargo"}
        ]
     });
   }
</script>
</html>