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
              <table class="display"  id="tabla1" cellspacing="0" width="100%">
    <thead>
  <tr>
    <th>ID</th>
    <th>IP</th> 
    <th>DETALLES</th>
    <th>CORRECCIONES</th>
    <th>FECHA</th>
    <th>PENDIENTES</th>
    <th>NOMBRE_EQUIPO</th>
    <th>REGISTRADOR</th>
    <th>TIPO</th>
    <!--<th>ESTADO</th> -->
  </tr>
  </thead>
  <tbody>
              <?php 
               include_once("conexion.php");
            $con2 = new DB;
            $strConsultaMantenciones = "SELECT * FROM `mantenciones` left join computadores on mantenciones.Computadores_id = computadores.idcomputadores left join administradores on mantenciones.Administradores_id = administradores.idadministradores left join tipo_mantencion on tipo_mantencion.idTIPO=mantenciones.idtipo_mantencion ";

            //echo $strconsultaMantenciones

           // echo $strConsultaMantenciones;
             $con2->conectar();
              $buscarMantencionesresultados = mysql_query($strConsultaMantenciones);



              if (!$buscarMantencionesresultados) {
    die("<div class='alert alert-danger'><strong>No se pudo registrar, error:</strong></div> " . mysql_error());
}else{
    //no hay errores asi que ejecuta todo esto: 
    $numregistrosMantenciones= mysql_num_rows($buscarMantencionesresultados);
              for ($i=0; $i<$numregistrosMantenciones;$i++)
              {
              //variable asociativa FILA
              $fila = mysql_fetch_array($buscarMantencionesresultados);
              $id_mantenciones= $fila['idmantenciones'];
              $IP_mantenciones= $fila['IPmantenciones'];
              $fallas_mantenciones= $fila['fallas'];
              $correcciones_mantenciones= $fila['correcciones'];
              $fecha_mantenciones= $fila['fecha'];
              $pendientes_mantenciones= $fila['pendientes'];
              $nombre_usuario = $fila['nombreequipo'];
              $nombre_admin = $fila['nombre'];
              $idtipo=$fila['idtipo_mantencion'];
              $tipotexto=$fila['tipotexto'];
              echo "<tr>";
              echo "<td>$id_mantenciones</td>";
              echo "<td> $IP_mantenciones</td>";
              echo "<td> $fallas_mantenciones</td>";
              echo "<td> $correcciones_mantenciones</td>";
              echo "<td> $fecha_mantenciones</td>";
              echo "<td> $pendientes_mantenciones</td>";
              echo "<td> $nombre_usuario</td>";
              echo "<td> $nombre_admin</td>";
              echo "<td><option value='$idtipo'>$tipotexto</option></td>";
              echo "</tr>";
              }
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


<!-- CAJA DE CONTENIDO CONDENIDO -->
 


<!-- HASTA AQUI CONTENIDO -->

 <?php include('footer.php');?>






























