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
             <table id="tabla2" class="table table-bordered table-hover">
              <thead>

<?php 

$id_mantencion = $_GET['id_mantencion'];
$estado=$_GET['estado'];


if (isset($_GET['id_mantencion'])){
        
$con3 = new DB;
$strConsulta = "SELECT * FROM `mantenciones` where mantenciones.id_mantencion = '$id_mantencion' ";
    $con3->conectar();
    $buscarresultados = mysql_query($strConsulta);
          
    //variable asociativa FILA
    $idassoc = mysql_fetch_assoc($buscarresultados);
   }

?>


<th>

<tr>
<td><strong>IP</strong> de la Mantención:</td>
<td><input type="text" name="" id="" value='<?php echo $idassoc['IPmantencion'];?>'>
</td></tr><br>

<tr>
<td>Descripción de la <strong>Falla:</strong></td>
<td><input type="text" name="" id="" value='<?php echo $idassoc['falla'];?>' >
</td></stron></tr><br>

<tr>
<td><strong>Correcciones</strong> realizadas:</td>
<td><input type="text" name="" id="" value='<?php echo $idassoc['correcciones'];?>' >
</td></tr><br>

<tr>
<td><strong>Pendientes</strong> a realizar:</td>
<td><input type="text" name="" id="" value='<?php echo $idassoc['pendiente'];?>' >
</td></tr><br>

<tr>
<td><strong>Estado</strong> del Equipo:</td>
<td><input type="text" name="" id="" value='<?php echo $idassoc['estado'];?>'>
</td></tr><br>

<tr>
<td><strong>Costo</strong> de Mantención:</td>
<td><input type="text" name="" id="" value='<?php echo $idassoc['monto'];?>'>
</td></tr><br>



<tr>
<td><button type="submit" class="btn btn-success" role="button"><span class='ion-android-done-all' aria-hidden='true'>Aceptar</span></a></td></tr>

</th>

<?php
$con = new DB;
   $con->conectar();
if(isset($_GET['id_mantencion'])){
  //la variable estado tendra el numero
$id_mantencion = $_GET['id_mantencion'];
$id_estado=$_GET['estado'];

$IP = $_POST['IP'];
$fallas = $_POST['fallas'];
$correcciones = $_POST['correcciones'];
$pendientes= $_POST['pendientes'];
$monto = $_POST['monto'];

$ConsultaUpdate ="UPDATE `mantenciones` SET `IPmantencion` = '$IP'  , `falla` = '$fallas', `correcciones` = '$correccione', `pendiente` = '$pendientes', `estado` = '$estado', `monto` = '$monto'WHERE `mantenciones`.`id_mantencion` = '$id_mantencion';";

$consulta=mysql_query($ConsultaUpdate);    

if(isset($consulta)){
  if ($consulta){
  die("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> <h4><i class='icon fa fa-check'></i> Error!</h4> No se pudo modificar el <strong>Estado</strong> de la solicitud.".mysql_error()."
              </div>");
  }else{
    echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> <h4><i class='icon fa fa-check'></i> Ok!</h4> Se ha modificado correctamente el <strong>Estado</strong> de la solicitud.
              </div>";
  }
}
}
?>

  
     </tbody>
      </table>
        </div>
         </div>
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