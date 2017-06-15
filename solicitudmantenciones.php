<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<?php include("header.php"); ?>
</head>
<body>
	
<div container>

<form class='' action='procesasolicitud.php' method='POST'>
<caption><h3><center>Solicitud</center></h3></caption>
<!-- txt email-->

 <p class=text-center><label class="control-label" for="email" class="input-small">Email del solicitante :</p></label>
 <div class="controls"></p>
 <p class=text-center><input type="email" id="email" name="email" placeholder="Email" class="input-xlarge" value= "" required/></p>
 </div><br>

<!-- txt Nombre Usuario-->
 <p class=text-center><label for="id usuario" >Nombre del Solicitante</p></label>
				   <?php
                  include_once("conexion.php");

                  $con2 = new DB;
                  $strConsultaUsuarios = "select * from usuarios";
                  $con2->conectar();
                  $buscarUsuariosresultados = mysql_query($strConsultaUsuarios);
                 
                   ?>

<p class=text-center>   <select class="" id='idusuarios' name='idusuarios' ></p>
             
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
             			  ?>
                  </select>
                  </div>
<!-- txt Nombre Usuario-->
<p class=text-center><label for="id usuario" >Tipo de Solicitud</p></label>
           <?php
                  include_once("conexion.php");

                  $con2 = new DB;
                  $strConsultaTipo = "select * from tipo_solicitud";
                  $con2->conectar();
                  $buscarTiporesultados = mysql_query($strConsultaTipo);
                 
                   ?>

<p class=text-center><select  id='tipo' name='tipo' ></p>
             
                  <?php 
                  $numregistrosTipo= mysql_num_rows($buscarTiporesultados);
                   for ($i=0; $i<$numregistrosTipo; $i++)
                    {
                 //variable asociativa FILA
                    $fila = mysql_fetch_array($buscarTiporesultados);
                    $id_tipo = $fila['idtipo_solicitud'];
                    $glosa_tipo = $fila['glosa'];
                    //<option value='0'>Sin Cliente</option>
                    echo "<option value='$id_tipo'> $glosa_tipo </option>";
                    }
                    ?>
                  </select>
                  </div>
<!-- txt comentario-->
<p class=text-center><label class="control-label"  for="comentario">Comentario de la Solicitud:</label>
 <div class="controls"></p>
 <p class=text-center><textarea type="text" id="comentario" name="comentario" placeholder="Comentario" rows="3" cols="80" class="input-xlarge"></textarea></p>
 </div><br>
        
<!--button -->
<p class=text-center><button  type="submit" class="btn btn-success" value="aceptar" name="aceptar">Aceptar</button></p>

</div>

</body>
</html>