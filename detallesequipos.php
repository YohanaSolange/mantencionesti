
<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>


<?php 
//recibo parametros

$id_equipo = $_GET['id_equipo'];

  include_once("conexion.php");
              $con2 = new DB;
              $strConsultaEquipos = "SELECT * FROM `equipos` inner join usuarios on equipos.id_usuario = usuarios.id_usuario inner join tipo_equipo on equipos.id_tipo_equipo = tipo_equipo.id_tipo_equipo where equipos.id_equipo = $id_equipo";

              //echo $strConsultaEquipos;

             $con2->conectar();
              $buscarUsuariosresultados = mysql_query($strConsultaEquipos);
             

              $dataset_equipo = mysql_fetch_assoc($buscarUsuariosresultados);

              $nombre_equipo = $dataset_equipo['nombreequipo'];





            $con2 = new DB;
            $strConsultaMantenciones = "SELECT * FROM `mantenciones` left join equipos on mantenciones.id_equipo = equipos.id_equipo left join administradores on mantenciones.id_administrador = administradores.id_administrador left join tipo_mantenciones on tipo_mantenciones.id_tipo_mantencion=mantenciones.id_tipo_mantencion where mantenciones.id_equipo = $id_equipo order by mantenciones.id_mantencion asc ";

            //echo $strconsultaMantenciones

           // echo $strConsultaMantenciones;
             $con2->conectar();
              $buscarMantencionesresultados2 = mysql_query($strConsultaMantenciones);
              $monto_total_mantenciones = 0;
               $numregistrosMantenciones2= mysql_num_rows($buscarMantencionesresultados2);
              for ($i=0; $i<$numregistrosMantenciones2;$i++)
              {
                $fila2 = mysql_fetch_array($buscarMantencionesresultados2);
                $monto_total_mantenciones = $monto_total_mantenciones +    $nombre_admin = $fila2['monto'];
              }
?>



  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detalles del Equipo:
        <small>Detalle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="menuprincipal.php"><i class="fa fa-dashboard"></i> Pagina Principal</a></li>
        <li><a href="listadoequipos.php">Listado Equipo</a></li>
       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
                      <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <?php echo $nombre_equipo?>
            <small class="pull-right">Date: 2/10/2014</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->



      <div class="row invoice-info">

        <div class="col-sm-3 invoice-col">
          <div>
          <address>
          <strong>Fotografia:</strong><br>
         
          <div class="thumbnail" >
   

    <?php 
    if ($dataset_equipo['url_fotografia']==NULL){
      echo "<img src='img/equipos/sin_imagen.jpg' alt='Lights' style='width:100%'>";
    }else
    {
      echo "<img src='img/equipos/".$dataset_equipo['url_fotografia']."' alt='Lights' style='width:100%'>";
    }

    ?>
       
       
     
    </div>
          </address>

          </div>
        </div>





        <div class="col-sm-3 invoice-col">
         
          <address>
<strong>Modelo:</strong><br>
            <?php echo $dataset_equipo['modelo']?><br>
             <strong>Usuario:</strong><br>
            <?php echo "<a href='listadousuarios.php'>".$dataset_equipo['nombre']."</a>"?><br>
          
             <strong>Tipo Equipo:</strong><br>
            <?php echo $dataset_equipo['glosa_tipo_equipo']?><br>

            <strong>Numero de Serie:</strong><br>
            <?php echo $dataset_equipo['numero_de_serie']?><br>
              <strong>Mac Equipo:</strong><br>
              <?php echo $dataset_equipo['mac']?><br>
         
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-3 invoice-col">
         
          <address>

          <strong>Direccion IP:</strong><br>
                <?php echo $dataset_equipo['IPequipo']?><br>

            <strong>Memoria Ram</strong><br>
                <?php echo $dataset_equipo['ram']?><br>

                 <strong>Disco Duro</strong><br>
                <?php echo $dataset_equipo['memoriahdd']?><br>
             <strong>Procesador</strong><br>
                <?php echo $dataset_equipo['procesador']?><br>
          
             <strong>Sistema Operativo</strong><br>
                <?php echo $dataset_equipo['so']?><br>
          </address>
        </div>

          <div class="col-sm-3 invoice-col">
         
          <address>
            <strong>Estado:</strong><br>

                <?php if ($dataset_equipo['estado'] == 1) {
                  echo "<span class='badge bg-green'>HABILITADO</span>";
                }else{
                  echo "<span class='badge bg-warning'>HABILITADO</span>";

                  }?><br>

                       <strong>Monto Total En Mantenciones:</strong><br>
                <?php echo "<span class='badge bg-green'>".$monto_total_mantenciones."</span>"?><br>
               
          </address>
        </div>


        <!-- /.col -->
    
        <!-- /.col -->
      </div>
      <!-- /.row -->


      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
                <h2 class="page-header">
            <i class="fa fa-history"></i> Historial de Mantenciones:
            
          </h2>
         <table class="table"  id="tabla1" cellspacing="0" width="100%">
    <thead>
  <tr>
    <th>ID</th>
    <th>IP</th> 
    <th>DETALLES</th>
    <th>CORRECCIONES</th>
    <th>FECHA</th>
    <th>PENDIENTES</th>
 
    <th>REGISTRADOR</th>
     <th class="no-print">TIPO DE MANTENCION</th>
        <th>Monto</th>
    <!--<th>ESTADO</th> -->
  </tr>
  </thead>
  <tbody>
              <?php 
    
               $buscarMantencionesresultados = mysql_query($strConsultaMantenciones);
                   $numregistrosMantenciones= mysql_num_rows($buscarMantencionesresultados);

              if (!$buscarMantencionesresultados) {
    die("<div class='alert alert-danger'><strong>No se pudo registrar, error:</strong></div> " . mysql_error());
}else{
    //no hay errores asi que ejecuta todo esto: 



              for ($i=0; $i<$numregistrosMantenciones;$i++)
              {
              //variable asociativa FILA
              $fila = mysql_fetch_array($buscarMantencionesresultados);
              $id_mantenciones= $fila['id_mantencion'];
              $IP_mantenciones= $fila['IPmantencion'];
              $fallas_mantenciones= $fila['falla'];
              $correcciones_mantenciones= $fila['correcciones'];
              $fecha_mantenciones= $fila['fecha'];
              $pendientes_mantenciones= $fila['pendiente'];
              $nombre_usuario = $fila['nombreequipo'];
              $nombre_admin = $fila['nombre'];
              $idtipo=$fila['id_tipo_mantencion'];
              $glosa_tipo_mantencion=$fila['glosa_tipo_mantencion'];

              $monto = $fila['monto'];

              echo "<tr>";
              echo "<td>$id_mantenciones</td>";
              echo "<td> $IP_mantenciones</td>";
              echo "<td> $fallas_mantenciones</td>";
              echo "<td> $correcciones_mantenciones</td>";
              echo "<td> $fecha_mantenciones</td>";
              echo "<td> $pendientes_mantenciones</td>";
             
              echo "<td> $nombre_admin</td>";
                   echo "<td class='no-print'> $glosa_tipo_mantencion</td>";
                   echo "<td>$monto</td>";
              echo "</tr>";
              }
}


              
             ?>
     </tbody>
</table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->



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
