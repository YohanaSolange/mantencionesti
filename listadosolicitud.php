<!DOCTYPE html>
<html>
<body>

<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>	
<caption><h3><center>Lista de Usuarios</center></h3></caption>
  <table class="display"  id="tabla1" cellspacing="0" width="100%">
     <thead>
  <tr>
    <th>ID SOLICITUD</th>
    <th>COMENTARIO</th> 
    <th>FECHA</th>
    <th>ESTADO</th>
    <th>NOMBRE DEL USUARIO</th>
    <th>TIPO DE SOLICITUD</th>
 	  <th>EMAIL</th>
    <TH>TIPO DE EQUIPO</TH>
    </tr>
    </thead>
  <tbody>

              <?php 
               include_once("conexion.php");
              $con2 = new DB;
              $strConsultaSolicitud = "SELECT * FROM `solicitud` inner JOIN usuarios on solicitud.Usuarios_id=usuarios.idusuarios  inner JOIN tipo_solicitud on tipo_solicitud.idtipo_solicitud=solicitud.idtipo_solicitud inner join tipo_equipo on tipo_equipo.idtipo_equipo=solicitud.idtipo_equipo ";
              $con2->conectar();
              $buscarSolicitudresultados = mysql_query($strConsultaSolicitud);
              $numregistrosSolicitud= mysql_num_rows($buscarSolicitudresultados);
              for ($i=0; $i<$numregistrosSolicitud; $i++)
              {
              //variable asociativa FILA
              $fila = mysql_fetch_array($buscarSolicitudresultados);
              $idsolicitud=$fila['idsolicitud'];
              $comentario=$fila['comentario'];
              $fecha=$fila['fecha'];
              $estado=$fila['estado'];
              $usuarios_id=$fila['Usuarios_id'];
              $usuarios_nombre=$fila['nombre'];
              $idtipo_solicitud=$fila['idtipo_solicitud'];
              $solicitud_nombre=$fila['glosa_solicitud'];
              $email=$fila['email'];
              $idtipo_equipo=$fila['idtipo_equipo'];
              $equipo_nombre=$fila['glosa_equipo'];
              echo "<tr>";
              echo"<td>$idsolicitud</td>";
              echo"<td>$comentario</td>";
              echo"<td>$fecha</td>";
              echo"<td>$estado</td>";
              echo"<td><option value='$usuarios_id'>$usuarios_nombre</option></td>";
              echo"<td><option value='$idtipo_solicitud'>$solicitud_nombre</option></td>";
              echo"<td>$email</td>";
              echo"<td><option value='$idtipo_equipo'>$equipo_nombre</option></td>";
              echo "</tr>";

             } ?>
</tbody>    
</table>
</body>
</html>