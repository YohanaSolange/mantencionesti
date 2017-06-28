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



if (isset($_GET['id_mantencion'])){
$id_mantencion = $_GET['id_mantencion'];       
$con3 = new DB;
$strConsulta = "SELECT * FROM `mantenciones` where mantenciones.id_mantencion = '$id_mantencion' ";
    $con3->conectar();
    $buscarresultados = mysql_query($strConsulta);
          
    //variable asociativa FILA
    $idassoc = mysql_fetch_assoc($buscarresultados);
   }
?>

<form action="editarmantencion.php?procesa=1&id_mantencion=<?php echo $id_mantencion?>" method="post">
<th>

<tr>
<td><strong>IP</strong> de la Mantención:</td>
<td><input type="text" name="IPmantencion" id="IPmantencion" value='<?php echo $idassoc['IPmantencion'];?>'>
</td></tr><br>

<tr>
<td>Descripción de la <strong>Falla:</strong></td>
<td><input type="text" name="falla" id="falla" value='<?php echo $idassoc['falla'];?>' >
</td></stron></tr><br>

<tr>
<td><strong>Correcciones</strong> realizadas:</td>
<td><input type="text" name="correcciones" id="correcciones" value='<?php echo $idassoc['correcciones'];?>' >
</td></tr><br>

<tr>
<td><strong>Pendientes</strong> a realizar:</td>
<td><select name="pendiente" id="pendiente" value='<?php echo $idassoc['pendiente'];?>' >

  <option value="1" name="pendiente" id="pendiente">Si</option>
  <option value="2" name="pendiente" id="pendiente">No</option>
   </select>
</td></tr><br>

<tr>
<td><strong>Estado</strong> de la Mantención:</td>
<td><select name="estado" id="estado" value='<?php echo $idassoc['estado'];?>'>
 
  <option value="1" name="estado" id="estado">Activa</option>
  <option value="2" name="estado" id="estado">Inactiva</option>
</select>
</td></tr><br>


<tr>
<td><strong>Costo</strong> de Mantención:</td>
<td><input type="text" name="monto" id="monto" value='<?php echo $idassoc['monto'];?>'>
</td></tr><br>



<tr>
<td><button type="submit" class="btn btn-success" role="button"><span class='ion-android-done-all' aria-hidden='true'>Aceptar</span></button></td></tr>
<td><a href="listadomantenciones.php" class="btn btn-primary" role="button"><span class='ion-reply' aria-hidden='true'>Volver al Listado</span></a></td></tr>

</th>
</form>

<?php 
 $con4 = new DB;
 $con4->conectar();
 
if (isset($_GET['procesa'])){
  
include_once("conexion.php");
$id_mantencion=$_GET['id_mantencion'];

$IPmantencion=$_POST['IPmantencion'];
$falla=$_POST['falla'];
$correcciones=$_POST['correcciones'];
$pendiente=$_POST['pendiente'];
$estado=$_POST['estado'];
$monto=$_POST['monto'];

$strConsulta1="UPDATE `mantenciones`  SET `IPmantencion` = '$IPmantencion', `falla` = '$falla', `correcciones` = '$correcciones', `pendiente` = '$pendiente', `estado` = '$estado', `monto` = '$monto' WHERE `mantenciones`.`id_mantencion` = '$id_mantencion' ";
  $mostrarconsulta1=mysql_query($strConsulta1);


          
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