<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>
   <?php
if (isset($_GET['id'])){
 				$id_solicitud = $_GET['id'];
        $con3 = new DB;
        $strConsultaSolicitud = "SELECT *,solicitudes.estado as estado_solicitud FROM `solicitudes` inner JOIN tipo_solicitud on tipo_solicitud.id_tipo_solicitud=solicitudes.id_tipo_solicitud inner join tipo_equipo on tipo_equipo.id_tipo_equipo=solicitudes.id_tipo_equipo where solicitudes.id_solicitud = '$id_solicitud' ";
            $con3->conectar();
            $buscarSolicitudresultados = mysql_query($strConsultaSolicitud);
          
              //variable asociativa FILA
           $idassoc = mysql_fetch_assoc($buscarSolicitudresultados);
         // var_dump($idassoc);
          //echo $strConsultaSolicitud;
          }             ?>
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
        <br>
				<strong>Nombre del solicitante:</strong>
				<?php echo $idassoc['nombre'];?><br><!-- Mostrar Nombre -->
				<strong>Fecha de la solicitud:</strong>
				<?php echo $idassoc['fecha'];?><br>
				<strong>Email del solicitante:</strong>
				<?php echo $idassoc['email'];?><br>
				<strong>Tipo de solicitud:</strong>
				<?php echo $idassoc['glosa_tipo_solicitud'];?><br>
				<strong>Tipo de equipo:</strong>
				<?php echo $idassoc['glosa_tipo_equipo'];?><br><!-- Mostrar glosa tipo equipo -->
				<strong>Estado Actual de la Solicitud:</strong><!-- Mostrar estado según :-->
				
				<?php

        //var_dump($idassoc);
				if ($idassoc['estado_solicitud']=='1'){
			 echo "<br><span class='label label-warning'>PENDIENTE</span><br>";//Mostrar el estado actual


// cambiar estado a PENDIENTE ID 1 
echo " <STRONG> Cambiar estado a: </STRONG><a href='detalle_id_solicitud.php?id=$id_solicitud&estado=2' <span class='label label-success'>SOLUCIONADO</span></a>";
if(isset($_GET['estado'])){
$estado = $_GET['estado'];
 $con4 = new DB;
     $con4->conectar();
$strConsultaSolicitud ="UPDATE `solicitudes` SET `estado` = '2' WHERE `solicitudes`.`id_solicitud` = '$id_solicitud';";
$respuesta=mysql_query($strConsultaSolicitud);
}

				}elseif ($idassoc['estado_solicitud']=='2') {
					echo "<br><span class='label label-success'>SOLUCIONADO</span><br>";//Mostrar el estado actual

// cambiar estado a SOLUCIONADO ID 2 
echo " <STRONG> Cambiar estado a: </STRONG><a href='detalle_id_solicitud.php?id=$id_solicitud&estado=2' <span class='label label-danger'>ANULADO</span></a>";

if(isset($_GET['estado'])){
$estado = $_GET['estado'];
 $con5 = new DB;
     $con5->conectar();
$strConsultaSolicitud2 ="UPDATE `solicitudes` SET `estado` = '3' WHERE `solicitudes`.`id_solicitud` = '$id_solicitud';";
$respuesta=mysql_query($strConsultaSolicitud2);
}


				} else {
					echo "<span class='label label-danger'>ANULADO</span><br>";//Mostrar el estado actual
	
        }
			   ?>


        <br> 
        <strong>Imagen del Problema:</strong>
<img src='<?php echo $idassoc['url_fotografia'];?>' width="1000" width="500">
       <br> 

<!--Mostrar el siguiente mensaje si existe o no una Fotografía -->
    <?php if(file_exists($idassoc['url_fotografia'])){

      echo "";
      }
      else{

        echo "No existe ninguna foto";
        }?>
				</address>



            </div>
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