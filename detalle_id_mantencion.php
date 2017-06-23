<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>

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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabla1" class="table table-bordered table-hover">
              <thead>




<?php 
 $con4 = new DB;
 $con4->conectar();
$id_mantencion = $_GET['id_mantencion'];
 
if (isset($_GET['id_mantencion'])){
        
  $con3 = new DB;
  $strConsulta = "SELECT * FROM `mantenciones` where mantenciones.id_mantencion = '$id_mantencion' ";
    $con3->conectar();
    $buscarresultados = mysql_query($strConsulta);
          
    //variable asociativa FILA
    $idassoc = mysql_fetch_assoc($buscarresultados);
    // var_dump($idassoc);
    //echo $strConsultaSolicitud;
              

   }


?>

<strong>IP:</strong>
        <?php echo $idassoc['IPmantencion'];?><br>
<strong>Falla</strong>
        <?php echo $idassoc['falla'];?><br>
<strong>Correcciones:</strong>
        <?php echo $idassoc['correcciones'];?><br>
<strong>Pendientes:</strong>
        <?php echo $idassoc['pendiente'];?><br>
<strong>Estado:</strong>
        <?php echo $idassoc['estado'];?><br>
<strong>Monto:</strong>
        <?php echo $idassoc['monto'];?><br>



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
