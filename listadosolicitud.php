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
    <th>FECHA</th>
    <th>NOMBRE DEL USUARIO</th>
 	  <th>COMENTARIO</th> 
 	  <th>EMAIL</th>
 	  <th>TIPO</th>
 	  <th>ESTADO</th> 
    </tr>
    </thead>
  <tbody>

              <?php 
               include_once("conexion.php");
              $con2 = new DB;
              $strConsultaSolicitud = "SELECT * FROM `solicitud`";
              $con2->conectar();
              $buscarSolicitudresultados = mysql_query($strConsultaSolicitud);
              $numregistrosSolicitud= mysql_num_rows($buscarSolicitudresultados);
              for ($i=0; $i<$numregistrosSolicitud; $i++)
              {
              //variable asociativa FILA
              $fila = mysql_fetch_array($buscarSolicitudresultados);
              $id_solicitud= $fila['idsolicitud'];
              $fecha=$fila['fecha'];
              $nombre_usuarios= $fila['nombre'];
              $usuarios_id= $fila['Usuarios_id'];
              $comentario= $fila['comentario'];
              $email= $fila['email'];
              $tipo= $fila['idtipo_solicitud'];
              $estado= $fila['estado'];
              echo "<tr>";
              echo "<td>$$id_solicitud=</td>";
              echo "<td>$nombre_usuarios</td>";
              echo "<td><option value='$usuarios_id'>$nombre_usuarios</td>";
              echo "<td>$comentario</td>";
              echo "<td>$email</td>";
              echo "<td>$tipo</td>";
             echo "<td>$estado</td>"; 
             // echo "<td><a href='editarusuarios.php?idusuario=$id_usuarios' class='btn btn-info' role='button' >Editar</button></td></td>";
             } ?>
</tbody>    
</table>
</body>
</html>