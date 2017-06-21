





<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>



<?php 
$id_solicitud = $_GET['id'];
//consulto si estado esta seteado, si viene la variable desde otro lado
if(isset($_GET['estado'])){
  //la variable estado tendra el numero
$estado = $_GET['estado'];


 $con4 = new DB;
     $con4->conectar();
$strConsultaSolicitud ="UPDATE `solicitudes` SET `estado` = '$estado' WHERE `solicitudes`.`id_solicitud` = '$id_solicitud';";//actualizar estado a 2=SOLUCIONADO
$respuestaEstado=mysql_query($strConsultaSolicitud);

}

?>




<div class="content-wrapper">

  
<?php 
if(isset($respuestaEstado)){
  if (!$respuestaEstado){
  die("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> <h4><i class='icon fa fa-check'></i> Error!</h4> No se pudo modificar el <strong>Estado</strong> de la solicitud.".mysql_error()."
              </div>");
  }else{
    echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> <h4><i class='icon fa fa-check'></i> Ok!</h4> Se ha modificado correctamente el <strong>Estado</strong> de la solicitud.
              </div>";
  }
}



?>

   <?php
if (isset($_GET['id'])){
        
        $con3 = new DB;
        $strConsultaSolicitud = "SELECT *,solicitudes.estado as estado_solicitud FROM `solicitudes` inner JOIN tipo_solicitud on tipo_solicitud.id_tipo_solicitud=solicitudes.id_tipo_solicitud inner join tipo_equipo on tipo_equipo.id_tipo_equipo=solicitudes.id_tipo_equipo where solicitudes.id_solicitud = '$id_solicitud' ";
            $con3->conectar();
            $buscarSolicitudresultados = mysql_query($strConsultaSolicitud);
          
              //variable asociativa FILA
           $idassoc = mysql_fetch_assoc($buscarSolicitudresultados);
         // var_dump($idassoc);
          //echo $strConsultaSolicitud;
          }             ?>

    <section class="content-header">
      <h1>
        Detalle de la Solicitud
        <small>Solicitud de Mantención </small>
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
            <div class="box-body">
				<adress>
        <strong>ID:
        <?php echo $idassoc['id_solicitud'];?></strong><br>
				<strong>Nombre del solicitante:
				<?php echo $idassoc['nombre'];?></strong><br><!-- Mostrar Nombre -->
				
        <br><strong>Fecha de la solicitud:</strong>
				<?php echo $idassoc['fecha'];?><br>
				<strong>Email del solicitante:</strong>
				<?php echo $idassoc['email'];?><br>
				<strong>Tipo de solicitud:</strong>
				<?php echo $idassoc['glosa_tipo_solicitud'];?><br>
				<strong>Tipo de equipo:</strong>
				<?php echo $idassoc['glosa_tipo_equipo'];?><br><!-- Mostrar glosa tipo equipo -->
			
        <strong>Estado Actual de la Solicitud:</strong> <!-- Mostrar estado según :-->
        <?php

        if ($idassoc['estado_solicitud']=='1'){
       echo "<span class='label label-warning'>PENDIENTE</span><br>";//Mostrar el estado actual

        }elseif ($idassoc['estado_solicitud']=='2') {
          echo "<span class='label label-success'>SOLUCIONADO</span><br>";//Mostrar el estado actual
         
        }else  {
         echo "<span class='label label-danger'>ANULADO</span><br>";
  
        }
        ?>
        
        <br><strong>Descripción del Problema:<h4>
        <?php echo $idassoc['comentario'];?></h4></strong><br>
				

        <br>Modificar estado a: <a href='detalle_id_solicitud.php?id=$id_solicitud&estado=2'> Solucionar </a>- o <a href='detalle_id_solicitud.php?id=$id_solicitud&estado=3'>Anular </a>- o <a href='detalle_id_solicitud.php?id=$id_solicitud&estado=1'>Pendiente </a><br>
        
         </adresss>
         <br>
         <a href='listadosolicitudes.php'><span class='label label-primary'>Volver </span></a> 
         <adress>
        <br><strong>Imagen del Problema:</strong><br> <!--Mostrar imagen o mensaje -->
<!--Mostrar el siguiente mensaje si existe o no una Fotografía -->
    <?php if(file_exists($idassoc['url_fotografia'])){
?>
<img src='<?php echo $idassoc['url_fotografia'];?>' width="1000" width="500">
       <br> 
<?php
      }
      else{
        echo "El usuario no registro ninguna Imagen.";
        }?>
				</address>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 <?php include('footer.php');?>