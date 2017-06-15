<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>
<body>
<caption><h3><center>Lista de Computadores</center></h3></caption>
  <table class="display"  id="tabla1" cellspacing="0" width="100%">
    <thead>
  <tr>
    <th>ID</th>
    <th>IP</th> 
    <th>MAC</th>
    <th>MODELO</th>
    <th>S.O</th>
    <th>RAM</th>
    <th>PROCESADOR</th>
    <th>MEMORIA</th>
    <th>PROGRAMAS</th>
    <th>NOMBRE</th> 
    <th>EQUIPO</th>
    <th>ESTADO</th>
    <th>EDITAR</th>
  </tr>  
  </thead>
  <tbody>
            <?php 
            include_once("conexion.php");
            $con= new DB;
            $strConsulta = "SELECT * FROM `computadores` inner JOIN usuarios on computadores.Usuarios_id=usuarios.idusuarios";
            $con->conectar();
            $buscarComputadoresresultados = mysql_query($strConsulta);
            $numregistrosComputadores= mysql_num_rows($buscarComputadoresresultados);
              for ($i=0; $i<$numregistrosComputadores; $i++)
              {
              //variable asociativa FILA
              $fila = mysql_fetch_array($buscarComputadoresresultados);
              $id_compu= $fila['idcomputadores'];
              $ip_compu=$fila['IPcomputadores'];
              $mac_compu= $fila['mac'];
              $modelo_compu= $fila['modelo'];
              $so_compu= $fila['so'];
              $ram_compu= $fila['ram'];
              $procesador_compu= $fila['procesador'];
              $memoriahdd_compu= $fila['memoriahdd'];
              $programas_compu= $fila['programas'];
              $id_usuario= $fila['nombre']; 
              $nombre_equipo= $fila['nombreequipo'];
              $estado_computadores= $fila['estado'];

                //<option value='0'>Sin Cliente</option>
            echo "<tr>";
              echo "<td>$id_compu</td>";
              echo "<td>$ip_compu</td>";
              echo "<td>$mac_compu</td>";
              echo "<td>$modelo_compu</td>";
              echo "<td>$so_compu</td>";
              echo "<td>$ram_compu</td>";
              echo "<td>$procesador_compu</td>";
              echo "<td>$memoriahdd_compu</td>";
              echo "<td>$programas_compu</td>";
              echo "<td>$id_usuario</td>";
              echo "<td>$nombre_equipo</td>";
              echo "<td><option value='$estado_computadores'>ACTIVO</td>";

echo"
<td><a href='editarcomputadores.php?idcomputadores=$id_compu' class='btn btn-info' role='button' >Editar</button>
</td></tr>";
              }
             ?>
       </tbody>    
</table>
</body>
</head>
</html>