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
              <table id="tabla1" class="table table-bordered table-hover">
              <thead>
<?php 
   $con = new DB;
   $con->conectar();
    if (ISSET($_GET['editar']) == 1) {
    //significa que estoy editando, aqui va a ir el codigo del update
      $NOMBRE=$_POST['nombre'];
      $EMAIL=$_POST['email'];
      $id_usuarios = $_GET['id_usuario'];
$strConsultaUpdate = "UPDATE `usuarios` SET `nombre` = '$NOMBRE', `email` = '$EMAIL', `estado` = '1' where id_usuarios='$id_usuarios'";


 $resultado2= mysql_query($strConsultaUpdate);


 if(!$resultado2) { 
 die("<div class='alert alert-danger'><strong>Error en la consulta </strong></div> " . mysql_error());
}else{
  echo "<script>alert('SE MODIFICO EL USUARIO CORRECTAMENTE');</script>";
}
   }


  $id_usuarios = $_GET['id_usuario'];
  $strConsulta = "SELECT * from usuarios where id_usuario='$id_usuarios'";
  $resultado1 = mysql_query($strConsulta);
  $existeusuario = mysql_num_rows($resultado1);
if ($existeusuario > 0) {
  } 
?>
<table class="display"  id="tabla1" cellspacing="0" width="100%">
<form  action='editarusuarios.php?editar=1&idusuario=<?php echo $id_usuarios?>' method="POST">

              <tr><thead>
              <th>NOMBRE</th>
              <th>EMAIL</th>
              <th>EDITAR</th>
              </thead><tbody>
<td><input type="text" id="nombre" name="nombre" value='<?php echo $nombre_usuarios ?>'></td>
<td><input type="email" id="email" name="email" value= '<?php echo $email_usuarios ?>'></td>

   
<td>
<button type="submit" class="btn btn-success" >Aceptar</button>
</td>
</tr>
</tbody>    
</table>
<p class=text-center>
 <a href="listadousuarios.php" type="submit" class="btn -link">VOLVER</button></p>
</body>
</html>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

 <?php include('footer.php');?>
