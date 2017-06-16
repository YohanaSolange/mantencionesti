<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>
   <?php
if (isset($_GET['id'])){
 				$id_solicitud = $_GET['id'];
            $con3 = new DB;
            $strConsultaSolicitud = "SELECT * FROM `solicitudes` inner JOIN tipo_solicitud on tipo_solicitud.id_tipo_solicitud=solicitudes.id_tipo_solicitud inner join tipo_equipo on tipo_equipo.id_tipo_equipo=solicitudes.id_tipo_equipo where solicitudes.id_solicitud = '$id_solicitud' ";
            $con3->conectar();
            $buscarSolicitudresultados = mysql_query($strConsultaSolicitud);
              $id_tipo_equipo=['id_tipo_equipo'];
              $id_tipo_solicitud=['id_tipo_solicitud'];
              $glosa_equipo=['glosa_equipo'];
              $glosa_solicitud=['glosa_solicitud'];
              
              //variable asociativa FILA
           $idassoc = mysql_fetch_assoc($buscarSolicitudresultados);
         // var_dump($idassoc);
          //echo $strConsultaSolicitud;
                      } ?>
<div class="content-wrapper">
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
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detalles de solicitud de mantencion:</h3>
            </div>
            <div class="box-body">
				<adress>
					<strong>Imagen del problema:</strong>
				<img src='<?php echo $idassoc['url_fotografia'];?>' width="1000" width="500">
				<br>
					
				<strong>Nombre del solicitante:</strong>
				<?php echo $idassoc['nombre'];?><br>
				<strong>Fecha de la solicitud:</strong>
				<?php echo $idassoc['fecha'];?><br>
				<strong>Email del solicitante:</strong>
				<?php echo $idassoc['email'];?><br>
				<strong>Tipo de solicitud:</strong>
				<?php echo $idassoc['glosa_tipo_solicitud'];?><br>
				<strong>Tipo de equipo:</strong>
				<?php echo $idassoc['glosa_tipo_equipo'];?><br>
				

				<strong>Estado:</strong>
				
				<?php
			
				if ($idassoc['estado']==1){

					echo "<span class='label label-warning'>PENDIENTE</span>";
				}elseif ($idassoc['estado']==2) {
					echo "<span class='label label-success'>SOLUCIONADO</span>";
				} else {
					echo "<span class='label label-danger'>ANULADO</span>";
				}
				
			?>
				</address>



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