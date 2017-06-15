<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Registrar Mantenciones
         <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="menuprincipal.php"><i class="fa fa-dashboard"></i> Pagina Principal</a></li>
         <li><a href="listadousuarios.php">Listado Usuarios</a></li>
      </ol>
   </section>
   <section>
      <div class="box box-primary">
         <div class="box-header with-border">
            <h3 class="box-title">Quick Example</h3>
         </div>
         <!-- /.box-header -->
         <!-- form start -->
         <form role="form" action='procesamantenciones.php' method="POST">
            <div class="box-body">
               <div class="form-group">
                  <label for="exampleInputEmail1">Ip</label>
                  <input type="text" class="form-control"  id="IP" name="IP" placeholder="" >
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Nombre de Equipo</label>
                  <?php 
                     include_once("conexion.php");
                     
                     $con2 = new DB;
                     $strConsultaComputadores = "select * from computadores";
                     $con2->conectar();
                     $buscarComputadoresresultados = mysql_query($strConsultaComputadores);
                     $numregistrosComputadores= mysql_num_rows($buscarComputadoresresultados);
                     ?>
                  <select class="form-control" id='idcomputador' name='idcomputador'>
                  <?php
                     for ($i=0; $i<$numregistrosComputadores; $i++)
                     {
                     $fila = mysql_fetch_array($buscarComputadoresresultados);
                     $id_computadores = $fila['idcomputadores'];
                     $nombre_equipo = $fila['nombreequipo'];
                     echo "<option value='$id_computadores'>$nombre_equipo</option>";
                     }
                     ?>
                  </select>
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Tipo Equipo</label>
                  <?php 
                     include_once("conexion.php");
                     
                     $con3 = new DB;
                     $strConsultaComputadores = "select * from tipo_equipo";
                     $con3->conectar();
                     $buscarComputadoresresultados = mysql_query($strConsultaComputadores);
                     $numregistrosComputadores= mysql_num_rows($buscarComputadoresresultados);
                     ?>
                  <select class="form-control" id='idtipoequipo' name='idtipoequipo'>
                  <?php
                     for ($i=0; $i<$numregistrosComputadores; $i++)
                     {
                     $fila = mysql_fetch_array($buscarComputadoresresultados);
                     $id_computadores = $fila['idtipo_equipo'];
                     $tipo_equipo = $fila['glosa'];
                     echo "<option value='$id_computadores'>$tipo_equipo</option>";
                     }
                     ?>
                  </select>
               </div>



               <?php date('Y-m-d');        
                  ?>
               <div class="form-group">
                  <label for="exampleInputEmail1">Fecha de Mantencion</label>
                  <input type="date" class="form-control"  id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>">
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Detalles de fallas</label>
                  <textarea type="text" class="form-control"  id="fallas" name="fallas" rows="3" cols="80" placeholder="descripcion de la fallas "></textarea>
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Detalles de Correciones.</label>
                  <textarea type="text" class="form-control"  id="correciones" name="correcciones" placeholder="descripcion de correciones" ></textarea>
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Seleccione si quedan Mantenciones Pendientes:</label><br>
                  <input name="pendientes" id="pendientes" value="No" type="radio" checked="" > 
                  No </label><br>
                  <label class="radio-inline" for="pendientes">
                  <input name="pendientes" id="pendientes" value="Si" type="radio"> 
                  Si</label><br>
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Seleccione el tipo de Mantencion:</label>
                  <?php 
                     include_once("conexion.php");
                     $con2 = new DB;
                     $strConsultaTipo = "select * from tipo_mantencion";
                     $con2->conectar();
                     $buscarTiporesultados = mysql_query($strConsultaTipo);
                     $numregistrosTipo= mysql_num_rows($buscarTiporesultados);
                     ?>
                  <select class="form-control" id='idtipo' name='idtipo'>
                  <?php
                     for ($i=0; $i<$numregistrosTipo; $i++)
                     {
                     $fila = mysql_fetch_array($buscarTiporesultados);
                     $id_tipo = $fila['idTIPO'];
                     $tipo_texto = $fila['tipotexto'];
                     echo "<option value='$id_tipo'>$tipo_texto</option>";
                     }
                     ?>
                  </select>
               </div>
               <!-- /.box-body -->
               <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Guardar Mantencion</button>
   
     </form>
     </div>
     </section>
</div>



   <!-- /.col -->

<!-- /.col -->
<!-- Main content -->
<!-- /.content -->
<!-- CAJA DE CONTENIDO CONDENIDO -->
<!-- HASTA AQUI CONTENIDO -->
<?php include('footer.php');?>