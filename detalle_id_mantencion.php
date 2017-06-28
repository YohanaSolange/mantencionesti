<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>

<?php 
 $con4 = new DB;
 $con4->conectar();
$id_mantencion = $_GET['id_mantencion'];
 
if (isset($_GET['id_mantencion'])){
	
include_once("conexion.php");
$strConsulta1="SELECT *,mantenciones.estado as mantenciones_estado  FROM `mantenciones`  inner join administradores on administradores.id_Administrador=mantenciones.id_administrador inner join tipo_mantenciones on tipo_mantenciones.id_tipo_mantencion=mantenciones.id_tipo_mantencion inner join tipo_equipo on tipo_equipo.id_tipo_equipo=mantenciones.id_tipo_equipo inner join equipos on equipos.id_equipo=mantenciones.id_equipo inner join externos on  externos.id_externo=mantenciones.id_externo where mantenciones.id_mantencion = '$id_mantencion' ";
	$mostrarconsulta1=mysql_query($strConsulta1);

	   $idassoc = mysql_fetch_assoc($mostrarconsulta1);

        $id_mantencion = $idassoc['id_mantencion'];
        
  $con3 = new DB;
  $strConsulta = "";
    $con3->conectar();
    $buscarresultados = mysql_query($strConsulta);
          
}

?>
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
                      <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-users"></i> IP: <?php echo $idassoc['IPmantencion'];?>
            <small class="pull-right">Fecha:<?php echo $idassoc['fecha'];?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabla1" class="table table-bordered table-hover">
              <thead>


<form action="editarmantencion.php?id_mantencion=<?php echo$id_mantencion?>" method="POST">


<strong>ID:</strong>
        <?php echo $idassoc['id_mantencion'];?><br>

<strong>Falla: </strong>
        <?php echo $idassoc['falla'];?><br>

<strong>Correcciones:</strong>
        <?php echo $idassoc['correcciones'];?><br>


<strong>Administrador de la Mantención:</strong>
<option value=<?php $_SESSION['idusuariologin'];?>> 
<?php echo $idassoc['email']?></option>

<strong>Tipo Mantención:</strong>
<option value=<?php $idassoc['id_tipo_mantencion'];?>> 
<?php echo $idassoc['glosa_tipo_mantencion']?></option>

<strong>Tipo de equipo:</strong>
<option value=<?php $idassoc['id_tipo_equipo'];?>> 
<?php echo $idassoc['glosa_tipo_equipo']?></option>

<strong>Nombre del Equipo:</strong>
<option value=<?php $idassoc['id_equipo'];?>> 
<?php echo $idassoc['nombreequipo']?></option>

<strong>Externo:</strong>
<option value=<?php $idassoc['id_externo'];?>> 
<?php echo $idassoc['nombre']?></option>
<strong>Monto:</strong>
        <?php echo $idassoc['monto'];?><br>
<strong>Estado:</strong>
       
         <?php

        if ($idassoc['mantenciones_estado']=='1'){
       echo "<span class='label label-success'>Activo</span><br>";//Mostrar el estado actual

        }elseif ($idassoc['mantenciones_estado']=='2') {
          echo "<span class='label label-danger'>Inactivo</span><br>";//Mostrar el estado actual
         
        }
        ?>


<strong>Pendientes:</strong>
        <?php

        if ($idassoc['pendiente']=='1'){
       echo "<span class='label label-danger'>Si</span><br>";//Mostrar el estado actual

        }elseif ($idassoc['pendiente']=='2') {
        echo "<span class='label label-success'>No</span><br>";//Mostrar el estado actual
         
        }
        ?>

<br>
<button type="submit" class="btn btn-primary" role="button"><span class='ionicon ion-compose' aria-hidden='true'>Editar</span></button>
</form>

     </tbody>
      </table>
        </div>
         </div>
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
