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
              <!-- hacer un assoc-->
<?php 
   $con = new DB;
   $con->conectar();
    if (ISSET($_GET['editar']) == 1) {
    //significa que estoy editando, aqui va a ir el codigo del update
      $IPmantencion=$_POST['IPmantencion'];
      $falla=$_POST['falla'];
      $correcciones=$_POST['correcciones'];
      $monto=$_POST['monto'];
      $estado=$_POST['estado'];

$id_mantencion = $_GET['id_mantencion'];

$strConsultaUpdate = "UPDATE `mantenciones` SET `IPmantencion` = '$IPmantencion', `falla` = '$falla', `correcciones` = '$correcciones',  `monto` = '$monto', `estado`='$estado' where id_mantencion='$id_mantencion'";


 $resultado2= mysql_query($strConsultaUpdate);


 if(!$resultado2) { 
 die("<div class='alert alert-danger'><strong>Error en la consulta </strong></div> " . mysql_error());
}else{
  echo "<script>alert('SE MODIFICO LA MANTENCIÓN CORRECTAMENTE');</script>";
}
   }




 ?>
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
