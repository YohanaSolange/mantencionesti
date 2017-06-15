<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>
</head>
<body>
 <!-- Inicio formulario registro computadores -->
	<div class="container">
    <div class="row">
        <div class="span12">
            <form class="form-horizontal" action='procesacomputadores.php' method="POST">
              <fieldset>
                <div id="legend">
                  <legend class="">Registrar Computadores</legend>
                </div>
                <div class="control-group">
                  <!-- iP-->
                  <label class="control-label"  for="IP">IP</label>
                  <div class="controls">
                    <input type="text" id="IP" name="IP" placeholder="" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <!-- mac-->
                  <label class="control-label" for="mac">MAC</label>
                  <div class="controls">
                    <input type="text" id="mac" name="mac" placeholder="" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                   <!-- modelo-->
                  <label class="control-label" for="modelo">Modelo del Sistema</label>
                  <div class="controls">
                    <input type="text" id="modelo" name="modelo" placeholder="" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">

                   <!-- so-->
             <label class="control-label" for="so">Sistema Operativo</label>
              <select class="form-control" name="so" id="so" >
               <option name="so">w10</option>
               <option name="so">w8</option>
               <option name="so">w7</option>
               <option name="so">wXP</option>
              </select>
                   <!-- ram-->
                  <label class="control-label" for="ram">RAM</label>
                  <div class="controls">
                    <input type="text" id="ram" name="ram" placeholder="" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                   <!-- procesador-->
                 <label class="control-label" for="procesador">Procesador</label>
                 <div class="controls">
                <input type="text" id= "procesador" name="procesador" placeholder="" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                   <!-- memoriahdd-->
                  <label class="control-label" for="memoriahdd">Memoria Disco Duro</label>
                  <div class="controls">
                    <input type="text" id="memoriahdd" name="memoriahdd" placeholder="" class="input-xlarge">
                  </div>
                </div>
                   <!-- programas-->
                  <label class="control-label" for="programas">Programas Principales</label>
                  <div class="controls">
                    <input type="text" id="programas" name="programas" placeholder="" class="input-xlarge">
                  </div>
                   <!-- usuarios id-->
              		<label class="control-label"  for="idusuarios">Nombre del Usuario</label>
              		<div class="controls">
                  <?php
                  include_once("conexion.php");

                  $con2 = new DB;
                  $strConsultaUsuarios = "select * from usuarios";
                  $con2->conectar();
                  $buscarUsuariosresultados = mysql_query($strConsultaUsuarios);
                 
                   ?>

              		<select class="form-control" id='idusuarios' name='idusuarios'>
             
              		<?php 
              		$numregistrosUsuarios= mysql_num_rows($buscarUsuariosresultados);
             			 for ($i=0; $i<$numregistrosUsuarios; $i++)
              			{
             		 //variable asociativa FILA
             			 	$fila = mysql_fetch_array($buscarUsuariosresultados);
             		 		$id_usuario = $fila['idusuarios'];
             		 		$nombre_usuario = $fila['nombre'];
                		//<option value='0'>Sin Cliente</option>
              			echo "<option value='$id_usuario'> $nombre_usuario </option>";
            		    }
             			  ?> </select> </div>
                    
                   <!-- nombre equipo-->
                  <div class="control-group">
                  <label class="control-label" for="nombreequipo">Nombre del Equipo</label>
                  <div class="controls">
                    <input type="text" id="nombreequipo" name="nombreequipo" placeholder="" class="input-xlarge">
                  </div>
                </div>
                  <!-- Button -->
                        <br>
                       <div class="controls">
                      <button  type="submit" class="btn btn-success" value="computadores" name="computadores" role="form">Aceptar</button>
                    </div>
              </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
</html>