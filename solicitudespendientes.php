<?php
include("header.php"); 
include ("navbar.php"); 
?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Solicitudes Pendientes
        <small>Pendientes a realizar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="menuprincipal.php"><i class="fa fa-dashboard"></i> Pagina Principal</a></li>
        <li><a href="listadoequipos.php">Listado equipos</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">LISTA DE PENDIENTES</h3>
            </div> <!-- /.box-header -->
            <div class="box-body">
              <table id="tabla1" class="table table-bordered table-hover">
 <thead>
<tr>
<th>Equipo </th>
<th>Tipo de Solicitud </th>
<th>Fecha </th>
<th>Mostrar detalle</th>
</tr>
  </thead>
  <tbody>
<?php
    $con3 = new DB;
	$strConsultaSolicitud = "SELECT *,solicitudes.estado as estado_solicitud FROM `solicitudes`  inner JOIN  tipo_solicitud on tipo_solicitud.id_tipo_solicitud=solicitudes.id_tipo_solicitud inner join tipo_equipo on tipo_equipo.id_tipo_equipo=solicitudes.id_tipo_equipo  where solicitudes.estado=1;";
	$con3->conectar();
	$buscarSolicitudresultados = mysql_query($strConsultaSolicitud);
	$numregistros= mysql_num_rows($buscarSolicitudresultados);
	for ($i=0; $i<$numregistros; $i++)
              {
              $fila = mysql_fetch_array($buscarSolicitudresultados);
              $id_solicitud=$fila['id_solicitud'];
              $id_tipo_equipo=$fila['id_tipo_equipo'];
              $equipo_glosa=$fila['glosa_tipo_equipo'];
              $id_tipo_solicitud=$fila['id_tipo_solicitud'];
              $solicitud_glosa=$fila['glosa_tipo_solicitud'];
              $fecha=$fila['fecha'];
              $estado=$fila['estado'];
              echo "<tr>";
              echo"<td><option value='$id_tipo_solicitud'>$solicitud_glosa</option></td>";
              echo"<td><option value='$id_tipo_equipo'>$equipo_glosa</option></td>";
              echo"<td>$fecha</td>";;
              echo"<td><a href='detalle_id_solicitud.php?id=$id_solicitud' class='btn btn-info role='button' ><span class='ion-clipboard' aria-hidden='true'>Detalle</span></a></td>";
              echo "</td>";
            }
?> 
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