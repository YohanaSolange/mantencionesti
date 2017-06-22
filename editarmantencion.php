<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Mantenciones
        <small>Cambiar datos registrados</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="menuprincipal.php"><i class="fa fa-dashboard"></i> Pagina Principal</a></li>
        <li><a href="listadousuarios.php">Listado Usuarios</a></li>
       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabla1" class="table table-bordered table-hover">
              <thead>

<?php 
/*
$id_mantencion = $_GET['id_mantencion'];
//consulto si estado esta seteado, si viene la variable desde otro lado
if(isset($_GET['id_mantencion'])){
  //la variable estado tendra el numero
$id_mantencion = $_GET['id_mantencion'];

$IPmantencion= $_POST['IPmantencion'];
$falla= $_POST['falla'];
$correcciones= $_POST['correcciones'];
$pendiente= $_POST['pendiente'];
$estado= $_POST['estado'];
$monto= $_POST['monto'];


 $con4 = new DB;
     $con4->conectar();
$strConsulta ="UPDATE `mantenciones` SET `IPmantencion` = '$IPmantencion', `falla` = '$falla', `correcciones` = '$correcciones', `pendiente` = '$pendiente', `estado` = '$estado', `monto` = '$monto'  WHERE `mantenciones`.`id_mantencion` = '$id_mantencion';";//actualizar estado a 2=SOLUCIONADO
$consulta=mysql_query($strConsulta);
}


?>




<div class="content-wrapper">

  
<?php 
$consulta=mysql_query($strConsulta);
var_dump($consulta);
  if ($consulta){
  die("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> <h4><i class='icon fa fa-check'></i> Error!</h4> No se pudo modificar el <strong>Estado</strong> de la solicitud.".mysql_error()."
              </div>");
  }else{
    echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> <h4><i class='icon fa fa-check'></i> Ok!</h4> Se ha modificado correctamente el <strong>Estado</strong> de la solicitud.
              </div>";
  }

*/



?>

  <?php
/*if (isset($_GET['id_mantencion'])){
        
        $con3 = new DB;
        $strConsulta = "SELECT * FROM `mantenciones` where mantenciones.id_mantencion = '$id_mantencion' ";
            $con3->conectar();
            $buscarresultados = mysql_query($strConsulta);
          
              //variable asociativa FILA
           $idassoc = mysql_fetch_assoc($buscarresultados);
         // var_dump($idassoc);
          //echo $strConsultaSolicitud;
          }       
var_dump($buscarresultados);*/
   ?>

<!--

<strong>Email del solicitante:</strong>
        <?php echo $idassoc['IPmantenciones'];?><br>
<strong>Email del solicitante:</strong>
        <?php echo $idassoc['falla'];?><br>
<strong>Email del solicitante:</strong>
        <?php echo $idassoc['correcciones'];?><br>
<strong>Email del solicitante:</strong>
        <?php echo $idassoc['pendiente'];?><br>
<strong>Email del solicitante:</strong>
        <?php echo $idassoc['estado'];?><br>
<strong>Email del solicitante:</strong>
        <?php echo $idassoc['monto'];?><br>

-->

     </tbody>
</table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->



      <div class="row">
      </div>
      
      <div class="row no-print">
        <div class="col-xs-12">

        
        </div>
      </div>
    </section>
    </section>
    <!-- /.content -->
  </div>
 <?php include('footer.php');?>