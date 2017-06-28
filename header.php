<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">




  <script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>



<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<script src="js/jquery.maskedinput.min.js" type="text/javascript"></script> 



<script type="text/javascript">
    $(function() {
        $.mask.definitions['~'] = "[+-]";

        $("#IP").mask("999.999.999.999");
        $("#fechatermino").mask("99/99/9999");
        $("#fechabuscar2").mask("99/99/9999");
        //$("#fecha").mask("99/99/9999",{completed:function(){alert("Fecha Correcta");}});
        $("#rut").mask("99999999");
        $("#telefono").mask("999999999");
          $("#horainicio").mask("99:99:99");
           $("#horasalida").mask("99:99:99");


           $("#mesbuscar").mask("99");
                 $("#aniobuscar").mask("9999");
                     //  $("#rutbuscar").mask("99999999");

        /*
        $("#phoneExt").mask("(999) 999-9999? x99999");
        $("#iphone").mask("+33 999 999 999");
        $("#tin").mask("99-9999999");
        $("#ssn").mask("999-99-9999");
        $("#product").mask("a*-999-a999", { placeholder: " " });
        $("#eyescript").mask("~9.99 ~9.99 999");
        $("#po").mask("PO: aaa-999-***");
        $("#pct").mask("99%");

        $("input").blur(function() {
            $("#info").html("Unmasked value: " + $(this).mask());
        }).dblclick(function() {
            $(this).unmask();
        });

        */
    });
    
</script>

 
             <script type="text/javascript">
             //valida que se pueda ingresar solo texto en un textbox y espacios
  $(document).ready(function() {
      $('#nombres,#apellidos,#nombre,#apellido').keypress(function(key) {

          if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
                && (key.charCode < 65 || key.charCode > 90) //letras minusculas
                && (key.charCode != 45) //retroceso
                && (key.charCode != 241) //ñ
                 && (key.charCode != 209) //Ñ
                 && (key.charCode != 32) //espacio
                 && (key.charCode != 225) //á
                 && (key.charCode != 233) //é
                 && (key.charCode != 237) //í
                 && (key.charCode != 243) //ó
                 && (key.charCode != 250) //ú
                 && (key.charCode != 193) //Á
                 && (key.charCode != 201) //É
                 && (key.charCode != 205) //Í
                 && (key.charCode != 211) //Ó
                 && (key.charCode != 218) //Ú
                )
                return false;

      });
      /*
      $('#apellidos').keypress(function(key) {
          if(key.charCode < 97 || key.charCode > 122) return false;
      });*/
  });
  </script>



<script>
  $(document).ready(function() {
      $('#tabla1').DataTable({
            dom: 'lBfrtip',
            buttons: [


                 {
                 extend: 'print',
                 

            text: 'Imprimir',
            autoPrint: true,
            //title: 'asdasd',
              },'excel',
           
            ],
            "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina &nbsp;&nbsp;&nbsp;",
            "zeroRecords": "No se encuentra esa coincidencia",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros",
            "print" : "Imprimir",

            "infoFiltered": "(buscando entre _MAX_ registros)",
            "search":         "Filtrar Registros : &nbsp",
               paginate: {
                first:      "Primera Pagina",
                previous:   "Anterior",
                next:       "Siguiente",
                last:       "Ultima"
            }
        }
      });
    } 

    );
</script>





  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>



<?php 


function select_listado_tipo_equipo(){

                     include_once("conexion.php");
                     
                     $conequipos = new DB;
                     $strConsultaComputadores = "select * from tipo_equipo";
                     $conequipos->conectar();
                     $buscarComputadoresresultados = mysql_query($strConsultaComputadores);
                     $numregistrosComputadores= mysql_num_rows($buscarComputadoresresultados);
                  


                  echo "<select class='form-control' id='id_tipo_equipo' name='id_tipo_equipo'>";
             
                   for ($i=0; $i<$numregistrosComputadores; $i++)
                     {
                     $fila = mysql_fetch_array($buscarComputadoresresultados);
                     $idtipo_equipo = $fila['id_tipo_equipo'];
                     $equipo_nombre = $fila['glosa_tipo_equipo'];
                     echo "<option value='$idtipo_equipo'>$equipo_nombre</option>";
                     }
                     echo "  </select>";
          
return null;
}






function select_listado_usuarios(){

                     include_once("conexion.php");
                     
                     $conusuarios = new DB;
                     $strConsultaUsuarios = "select * from usuarios";
                     $conusuarios->conectar();
                     $buscarUsuariosresultados = mysql_query($strConsultaUsuarios);
                     $numregistrosUsuarios= mysql_num_rows($buscarUsuariosresultados);
                  


                  echo "<select class='form-control' id='id_usuario' name='id_usuario'>";
             
                   for ($i=0; $i<$numregistrosUsuarios; $i++)
                     {
                     $fila = mysql_fetch_array($buscarUsuariosresultados);
                     $id_usuario = $fila['id_usuario'];
                     $nombre = $fila['nombre'];
                     echo "<option value='$id_usuario'>$nombre</option>";
                     }
                     echo "  </select>";
          
return null;
}

?>
