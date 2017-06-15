<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
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
  <caption><h3><center> Mantenciones Pendientes</center></h3></caption>
   <table class="display"  id="tabla1" cellspacing="0" width="100%">
    <thead>
  <tr>
    <th>ID</th>
    <th>IP</th> 
    <th>DETALLES</th>
    <th>CORRECCIONES</th>
    <th>FECHA</th>
    <th>NOMBRE_EQUIPO</th>
    <th>REGISTRADOR</th>
    <!--<th>ESTADO</th> -->
  </tr>
  </thead>
  <tbody>
              <?php 
               include_once("conexion.php");
          $con2 = new DB;
          $strConsultaMantenciones = "SELECT * FROM `mantenciones` INNER join computadores on mantenciones.Computadores_id = computadores.idcomputadores inner join administradores on mantenciones.Administradores_id = administradores.idadministradores WHERE pendientes='Si'";
             $con2->conectar();
              $buscarMantencionesresultados = mysql_query($strConsultaMantenciones);
              $numregistrosMantenciones= mysql_num_rows($buscarMantencionesresultados);
             //echo $strConsultaMantenciones;
             // for ($i=0; $i<$numregistrosMantenciones; $i++)
           
              for ($i=0; $i<$numregistrosMantenciones;$i++)
              {
              //variable asociativa FILA
              $fila = mysql_fetch_array($buscarMantencionesresultados);
              $id_mantenciones= $fila['idmantenciones'];
              $IP_mantenciones= $fila['IPmantenciones'];
              $fallas_mantenciones= $fila['fallas'];
              $correcciones_mantenciones= $fila['correcciones'];
              $fecha_mantenciones= $fila['fecha'];
              $nombre_usuario = $fila['nombreequipo'];
              $nombre_admin = $fila['nombre'];
             // $estado_mantenciones = $fila['estado'];
                //<option value='0'>Sin Cliente</option>
              echo "<tr>";
              echo "<td>$id_mantenciones</td>";
              echo "<td> $IP_mantenciones</td>";
              echo "<td> $fallas_mantenciones</td>";
              echo "<td> $correcciones_mantenciones</td>";
              echo "<td> $fecha_mantenciones</td>";
              //mostrar nombre equipo y email administrador
              echo "<td> $nombre_usuario</td>";
              echo "<td> $nombre_admin</td>";
              echo "</tr>";
              }
              ?>
     </tbody>
</table>
</body>
</html>