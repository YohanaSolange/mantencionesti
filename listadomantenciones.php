
<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Listado de mantenciones
        <small>Todos las mantenciones registrados</small>
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
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            
              <table id="tabla1" class="table table-bordered table-hover">        
    <thead>
  <tr>
    <th>ID</th>
    <th>IP</th> 
<!-- <th>DETALLES</th>-->
<!-- <th>CORRECCIONES</th>-->
    <th>FECHA</th>
    <th>NOMBRE_EQUIPO</th>
    <th>REGISTRADOR</th>
    <th>TIPO</th>
    <th>PENDIENTES</th>
    <th>ESTADO</th>
    <th>DETALLE</th>
    
  </tr>
  </thead>
  <tbody>
              <?php 
               include_once("conexion.php");
            $con2 = new DB;
            $strConsultaMantenciones = "SELECT *,mantenciones.estado as mantenciones_estado   FROM `mantenciones` left join equipos on mantenciones.id_equipo = equipos.id_equipo left join administradores on mantenciones.id_administrador = administradores.id_administrador left join tipo_mantenciones on tipo_mantenciones.id_tipo_mantencion=mantenciones.id_tipo_mantencion ";

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
              $id_mantencion= $fila['id_mantencion'];
              $IP_mantenciones= $fila['IPmantencion'];
              $fallas_mantenciones= $fila['falla'];
              //$correcciones_mantenciones= $fila['correcciones'];
              $fecha_mantenciones= $fila['fecha'];
              $pendientes_mantenciones= $fila['pendiente'];
              $nombre_usuario = $fila['nombreequipo'];
              $nombre_admin = $fila['nombre'];
              $idtipo=$fila['id_tipo_mantencion'];
              $glosa_tipo_mantencion=$fila['glosa_tipo_mantencion'];
              $id_tipo_mantencion=$fila['id_tipo_mantencion'];
              $glosa_tipo_mantencion=$fila['glosa_tipo_mantencion'];
              $estado=$fila['estado'];
            echo "<tr>";
            echo "<td>$id_mantencion</td>";
            echo "<td> $IP_mantenciones</td>";
            //echo "<td> $fallas_mantenciones</td>";
           // echo "<td> $correcciones_mantenciones</td>";
            echo "<td> $fecha_mantenciones</td>";
            echo "<td> $nombre_usuario</td>";
            echo "<td> $nombre_admin</td>";
            echo "<td> <option value='$id_tipo_mantencion'>$glosa_tipo_mantencion</option></td>";


        if ($pendientes_mantenciones==1){
        echo "<td><option value='1'>SI</option></td>";
        }else{
        echo "<td><option value='2'>NO</option></td>";
        }




        if ($fila['mantenciones_estado']==1){
          echo "<td><span class='label label-success'>ACTIVO</span></td>";
        } else {
          echo "<td><span class='label label-danger'>INACTIVO</span></td>";
        }



echo"<td><a href='detalle_id_mantencion.php?id_mantencion=$id_mantencion' class='btn btn-info role='button' ><span class='ion-clipboard' aria-hidden='true'>Detalle</span></a></td>";
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































