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
                  <input type="text" class="form-control"  id="IP" name="IP" placeholder="Ingrese IP" required/>
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Nombre de Equipo</label>
                  <?php 
                     include_once("conexion.php");
                     
                     $con2 = new DB;
                     $strConsultaComputadores = "select * from equipos";
                     $con2->conectar();
                     $buscarComputadoresresultados = mysql_query($strConsultaComputadores);
                     $numregistrosComputadores= mysql_num_rows($buscarComputadoresresultados);
                     ?>
                  <select class="form-control" id='idequipos' name='idequipos'>
                  <?php
                     for ($i=0; $i<$numregistrosComputadores; $i++)
                     {
                     $fila = mysql_fetch_array($buscarComputadoresresultados);
                     $id_equipos = $fila['id_equipo'];
                     $nombre_equipo = $fila['nombreequipo'];
                     echo "<option value='$id_equipos'>$nombre_equipo</option>";
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
                     $idtipo_equipo = $fila['id_tipo_equipo'];
                     $equipo_nombre = $fila['glosa_tipo_equipo'];
                     echo "<option value='$idtipo_equipo'>$equipo_nombre</option>";
                     }
                     ?>
                  </select>
               </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Personal Externo</label>
                  <?php 
                     include_once("conexion.php");
                     
                     $con4 = new DB;
                     $strConsultaComputadores = "select * from externos";
                     $con4->conectar();
                     $buscarExternos = mysql_query($strConsultaComputadores);
                     $numregistrosComputadores= mysql_num_rows($buscarExternos);
                     ?>
                  <select class="form-control" id='id_externo' name='id_externo'>
                  <?php
                     for ($i=0; $i<$numregistrosComputadores; $i++)
                     {
                     $fila = mysql_fetch_array($buscarExternos);
                     $id_externo = $fila['id_externo'];
                     $nombre_externo = $fila['nombre'];
                     echo "<option value='$id_externo'>$nombre_externo</option>";
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
                  <textarea type="text" class="form-control"  id="fallas" name="fallas" rows="3" cols="80" placeholder="Descripción de la fallas "></textarea>
               </div>


                         <div class="form-group">
                  <label for="exampleInputEmail1">Monto CLP</label>
                  <input type="text" class="form-control"  id="monto" name="monto" value='0' pattern="[0-9]+" required>
               </div>


               <div class="form-group">
                  <label for="exampleInputEmail1">Detalles de Correcciones.</label>
                  <textarea type="text" class="form-control"  id="correciones" name="correcciones" placeholder="Descripción de correciones" required></textarea>
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
                     $strConsultaTipo = "select * from tipo_mantenciones";
                     $con2->conectar();
                     $buscarTiporesultados = mysql_query($strConsultaTipo);
                     $numregistrosTipo= mysql_num_rows($buscarTiporesultados);
                     ?>
                  <select class="form-control" id='idtipomantencion' name='idtipomantencion'>
                  <?php
                     for ($i=0; $i<$numregistrosTipo; $i++)
                     {
                     $fila = mysql_fetch_array($buscarTiporesultados);
                     $idtipo_mantencion = $fila['id_tipo_mantencion'];
                     $mantencion_nombre = $fila['glosa_tipo_mantencion'];
                     echo "<option value='$idtipo_mantencion'>$mantencion_nombre</option>";
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