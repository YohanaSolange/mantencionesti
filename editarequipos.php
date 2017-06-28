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
<?php 
if (isset($_GET['id_equipo'])){
$id_equipo = $_GET['id_equipo'];       
$con3 = new DB;
$strConsulta = "SELECT * FROM `equipos` inner join usuarios on usuarios.id_usuario=equipos.id_usuario inner join tipo_equipo on tipo_equipo.id_tipo_equipo=equipos.id_tipo_equipo where equipos.id_equipo = '$id_equipo' ";
    $con3->conectar();
    $buscarresultados = mysql_query($strConsulta);
          
    //variable asociativa FILA
    $idassoc = mysql_fetch_assoc($buscarresultados);


   }
?>

            <div class="box-body">
             <table id="tabla2" class="table table-bordered table-hover">
              <thead>
<form action="editarequipos.php?procesa=1&id_equipo=<?php echo $id_equipo?>" method="post">
<th>

<tr>
<td><strong>IP</strong> de la Mantención:</td>
<td><input type="text" name="IPequipo" id="IPequipo" value='<?php echo $idassoc['IPequipo'];?>'>
</td></tr><br>

<tr>
<td><strong>MAC del Equipo:</strong></td>
<td><input type="text" name="mac" id="mac" value='<?php echo $idassoc['mac'];?>' >
</td></stron></tr><br>

<tr>
<td><strong>Modelo del Sistema</strong> realizadas:</td>
<td><input type="text" name="modelo" id="modelo" value='<?php echo $idassoc['modelo'];?>' >
</td></tr><br>

<tr>
<td><strong>Sistema Operativo</strong> a realizar:</td>
<td><select name="so" id="so" value='<?php echo $idassoc['so'];?>' >

<option value="w10" name="so" id="so">w10</option>
<option value="w8" name="so" id="so">w8</option>
<option value="w7" name="so" id="so">w7</option>
<option value="wXP" name="so" id="so">wXP</option>
   </select>
</td></tr><br>

<tr>
<td><strong>Memoria RAM</strong> del equipo:</td>
<td><input type="text" name="ram" id="ram" value='<?php echo $idassoc['ram'];?>'>
</td></tr><br>


<tr>
<td><strong>Procesador</strong> de Mantención:</td>
<td><input type="text" name="procesador" id="procesador" value='<?php echo $idassoc['procesador'];?>'>
</td></tr><br>

<tr>
<td><strong>Memoria Disco Duro</strong>:</td>
<td><input type="text" name="memoriahdd" id="memoriahdd" value='<?php echo $idassoc['memoriahdd'];?>'>
</td></tr><br>

<tr>
<td><strong>Descripción </strong> del equipo:</td>
<td><input type="text" name="descripcion" id="descripcion" value='<?php echo $idassoc['descripcion'];?>'>
</td></tr><br>

<tr>
<td><strong>Estado</strong> del Equipo:</td>
<td><select name="estado" id="estado" value='<?php echo $idassoc['estado'];?>'>
 
  <option value="1" name="estado" id="estado">Activa</option>
  <option value="2" name="estado" id="estado">Inactiva</option>
</select>
</td></tr><br>


<td><strong>Nombre </strong> del equipo:</td>
<td><input type="text" name="nombreequipo" id="nombreequipo" value='<?php echo $idassoc['nombreequipo'];?>'>
</td></tr><br>

<tr>
<td><strong>Usuario</strong> del Equipo:</td>
<td>
<?php echo select_listado_usuarios(); ?>
</select>
</td></tr><br>



<tr>
<td><strong>Tipo</strong> de Equipo:</td>
<td>
<?php echo select_listado_tipo_equipo();?>
</select>
</td></tr><br>




<tr>
<td><strong>Numero de Serie</strong>:</td>
<td><input type="text" name="numero_de_serie" id="numero_de_serie" value='<?php echo $idassoc['numero_de_serie'];?>'>
</td></tr><br>


<tr>
<td><button type="submit" class="btn btn-success" role="button"><span class='ion-android-done-all' aria-hidden='true'>Aceptar</span></button></td></tr>
<td><a href="listadoequipos.php" class="btn btn-primary" role="button"><span class='ion-reply' aria-hidden='true'>Volver al Listado</span></a></td></tr>

</th>
</form>

<?php 
 $con4 = new DB;
 $con4->conectar();
 
if (isset($_GET['procesa'])){
  
include_once("conexion.php");
$id_mantencion=$_GET['id_equipo'];

$IPequipo=$_POST['IPequipo'];
$mac=$_POST['mac'];
$modelo=$_POST['modelo'];
$so=$_POST['so'];
$ram=$_POST['ram'];
$procesador=$_POST['procesador'];
$memoriahdd=$_POST['memoriahdd'];
$descripcion=$_POST['descripcion'];
$nombreequipo=$_POST['nombreequipo'];
$estado=$_POST['estado'];
$id_usuario=$_POST['id_usuario'];
$id_tipo_equipo=$_POST['id_tipo_equipo'];
$numero_de_serie=$_POST['numero_de_serie'];

$strConsulta1=" UPDATE `equipos` SET `IPequipo` = '$IPequipo', `mac` = '$mac', `modelo` = '$modelo', `so` = '$so', `ram` = '$ram', `procesador` = '$procesador', `memoriahdd` = '$memoriahdd', `descripcion` = '$descripcion', `nombreequipo` = '$nombreequipo', `estado` = '$estado', `id_usuario` = '$id_usuario', `id_tipo_equipo` = '$id_tipo_equipo', `numero_de_serie` = '$numero_de_serie' WHERE `equipos`.`id_equipo` = '$id_equipo'";
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