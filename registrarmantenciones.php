<!DOCTYPE html>
<html lang="en">


<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>

<body>
    <!-- Navigation -->
<div class="container">
    <div class="row">
        <div class="span12">
            <form class="form-horizontal" action='procesamantenciones.php' method="POST">
              <fieldset>
                <div id="legend">
                  <legend class="">Registrar Mantenciones </legend>
                </div>
                <div class="control-group">
                  <!-- IP-->
                  <label class="control-label"  for="IP">Ingrese IP</label>
                  <div class="controls">
                    <input type="text" id="IP" name="IP" placeholder="" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                <!-- id computadores-->
              <label class="control-label"  for="">Nombre del Equipo</label>
              <div class="controls">
               <!-- <option value='0'>Sin Cliente</option> -->
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
                      </div>
                  <!-- Fecha-->
                  <?php date('Y-m-d');{
                  }
                  ?>
                  <label class="control-label"  for="fecha">Fecha</label>
                  <div class="controls">
                    <input type="date" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>">
                  </div>
                  <br>

                  <!-- Fallas-->
                  <label class="control-label" for="fallas">Detalles</label>
                  <div class="controls">
                    <textarea  type="text" id="fallas" name="fallas" placeholder="" rows="3" cols="80" class= "input-xlarge"></textarea>
                  </div>
                </div>
                   <!-- Correcciones-->
                  <label class="control-label"  for="correcciones">Correcciones</label>
                  <div class="controls">
                    <textarea type="text" id="correcciones" name="correcciones" placeholder="" rows="3" cols="80" class="input-xlarge"></textarea>
                  </div>
        
                 <!-- Pendientes-->
             <label class="control-label"  for="pendientes">Seleccione si quedan Mantenciones Pendientes: </label><br>
              <label class="radio-inline" for="pendientes">
             <input name="pendientes" id="pendientes" value="No" type="radio" checked="" > 
              No </label><br>
              <label class="radio-inline" for="pendientes">
              <input name="pendientes" id="pendientes" value="Si" type="radio"> 
              Si</label><br>
                
                <!-- tipo mantenciones-->
              <label class="control-label"  for="">Seleccione Tipo de Mantención</label>
              <div class="controls">
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
                      
                  <br>
                    <button  type="submit" class="btn btn-success" value="aceptar" name="aceptar">Aceptar</button>
                  </div>
           
              </fieldset>
            </form>
        </div>
    </div>
   </div>


   

</body>

</html>
