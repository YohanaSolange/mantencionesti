<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Listado de Usuarios
        <small>Todos los usuarios registrados</small>
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
  <tr>
    <th>ID</th>
    <th>NOMBRE</th> 
    <th>EMAIL</th>
    <th>ESTADO</th>
    <th>EDITAR</th>
  </tr>
    </thead>
  <tbody>
              <?php 
               include_once("conexion.php");
              $con2 = new DB;
              $strConsultaUsuarios = "SELECT * FROM `usuarios`";
              $con2->conectar();
              $buscarUsuariosresultados = mysql_query($strConsultaUsuarios);
              $numregistrosUsuarios= mysql_num_rows($buscarUsuariosresultados);
              for ($i=0; $i<$numregistrosUsuarios; $i++)
              {
              //variable asociativa FILA
              $fila = mysql_fetch_array($buscarUsuariosresultados);
              $id_usuarios= $fila['id_usuario'];
              $nombre_usuarios= $fila['nombre'];
              $email_usuarios= $fila['email'];
              $estado_usuarios= $fila['estado'];
              echo "<tr>";
              echo "<td>$id_usuarios</td>";
              echo "<td>$nombre_usuarios</td>";
              echo "<td>$email_usuarios</td>";
             
              if ($fila['estado']==1){

        
          echo "<td><span class='label label-success'>ACTIVO</span></td>";
        } else {
          echo "<td><span class='label label-danger'>DESHABILITADO</span></td>";
        }

             
             
echo"<td><a href='editarusuarios.php?idusuario=$id_usuarios' class='btn btn-warning' role='button' ><span class='ionicon ion-compose' aria-hidden='true'> Editar</button>
</td>";

             } ?>
</tbody>    
              </table>
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
