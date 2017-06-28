<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Usuarios
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
if (isset($_GET['id_usuario'])){
$id_usuario = $_GET['id_usuario'];       
$con3 = new DB;
$strConsulta = "SELECT * FROM `usuarios` where usuarios.id_usuario = '$id_usuario' ";
    $con3->conectar();
    $buscarresultados = mysql_query($strConsulta);
          
    //variable asociativa FILA
    $idassoc = mysql_fetch_assoc($buscarresultados);
   }
?>

<form action="editarusuarios.php?id_usuario=<?php echo $id_usuario?>&procesa=1" method="post">
<th>


<tr>
<td><strong>Nombre del Usuario:</strong></td>
<td><input type="text" name="nombre" id="nombre" value='<?php echo $idassoc['nombre'];?>'>
</td></tr><br>

<tr>
<td> <strong>Email:</strong></td>
<td><input type="text" name="email" id="email" value='<?php echo $idassoc['email'];?>' >
</td></stron></tr><br>

<tr>
<td><strong>Estado del Usuario:</strong> </td>
<td><select name="estado" id="estado" value='<?php echo $idassoc['estado'];?>'>
 
  <option value="1" name="estado" id="estado">Activa</option>
  <option value="2" name="estado" id="estado">Inactiva</option>
</select>
</td></tr><br>

<tr>
<td><button type="submit" class="btn btn-success" role="button"><span class='ion-android-done-all' aria-hidden='true'>Aceptar</span></button></td></tr>
<td><a href="listadousuarios.php" class="btn btn-primary" role="button"><span class='ion-reply' aria-hidden='true'>Volver al Listado</span></a></td></tr>

</th>
</form>

<?php 
 $con4 = new DB;
 $con4->conectar();
 
if (isset($_GET['procesa'])){
  
include_once("conexion.php");
$id_usuario=$_GET['id_usuario'];

$nombre=$_POST['nombre'];
$email=$_POST['email'];
$estado=$_POST['estado'];

$strConsulta1="UPDATE `usuarios` SET `nombre` = '$nombre', `email` = '$email', `estado` = '$estado' WHERE `usuarios`.`id_usuario` = '$id_usuario' ";
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