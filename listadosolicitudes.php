<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Listado de Usuarios
        <small>advanced tables</small>
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
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabla1" class="table table-bordered table-hover">
              
 

 <thead>
  <tr>
    <th>ID</th>
    <th>COMENTARIO</th> 
    <th>FECHA</th>
    <th>NOMBRE DEL SOLICITANTE</th>
    <th>TIPO DE SOLICITUD</th>
    <th>EMAIL DEL SOLICITANTE</th>
    <TH>TIPO DE EQUIPO</TH>
    <th>ESTADO</th>
    <TH>VER DETALLES</TH>
    </tr>
    </thead>
  <tbody>

              <?php 
               include_once("conexion.php");
              $con2 = new DB;
              $strConsultaSolicitud = "SELECT * FROM `solicitudes` inner JOIN  tipo_solicitud on tipo_solicitud.id_tipo_solicitud=solicitudes.id_tipo_solicitud inner join tipo_equipo on tipo_equipo.id_tipo_equipo=solicitudes.id_tipo_equipo ";
              $con2->conectar();
              $buscarSolicitudresultados = mysql_query($strConsultaSolicitud);
              $numregistrosSolicitud= mysql_num_rows($buscarSolicitudresultados);
              for ($i=0; $i<$numregistrosSolicitud; $i++)
              {
              //variable asociativa FILA
              $fila = mysql_fetch_array($buscarSolicitudresultados);
              $id_solicitud=$fila['id_solicitud'];
              $comentario=$fila['comentario'];
              $fecha=$fila['fecha'];
              $estado=$fila['estado'];
              $nombre=$fila['nombre'];
              $id_tipo_solicitud=$fila['id_tipo_solicitud'];
              $solicitud_glosa=$fila['glosa_tipo_solicitud'];
              $email=$fila['email'];
              $id_tipo_equipo=$fila['id_tipo_equipo'];
              $equipo_glosa=$fila['glosa_tipo_equipo'];
              echo "<tr>";
              echo"<td>$id_solicitud</td>";
              echo"<td>$comentario</td>";
              echo"<td>$fecha</td>";
              echo"<td>$nombre</td>";
              echo"<td><option value='$id_tipo_solicitud'>$solicitud_glosa</option></td>";
              echo"<td>$email</td>";
              echo"<td><option value='$id_tipo_equipo'>$equipo_glosa</option></td>";

              if ($fila['estado']==1){

          echo "<td><span class='label label-warning'>PENDIENTE</span></td>";
        }elseif ($fila['estado']==2) {
          echo "<td><span class='label label-success'>SOLUCIONADO</span></td>";
        } else {
          echo "<td><span class='label label-danger'>ANULADO</span></td>";
        }

            echo"<td><a href='detalle_id_solicitud.php?id=$id_solicitud'>Detalle</a></td>";
              
             


              echo "</tr>";

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