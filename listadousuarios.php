<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>
</head>
<body>
<caption><h3><center>Lista de Usuarios</center></h3></caption>
  <table class="display"  id="tabla1" cellspacing="0" width="100%">
     <thead>
  <tr>
    <th>ID</th>
    <th>NOMBRE</th> 
    <th>EMAIL</th>
    <th>ESTADO</th>
    <th>EDITAR</th>
  </tr>
    </thead>
  <tbody>
              <?php 
               include_once("conexion.php");
              $con2 = new DB;
              $strConsultaUsuarios = "SELECT * FROM `usuarios`";
              $con2->conectar();
              $buscarUsuariosresultados = mysql_query($strConsultaUsuarios);
              $numregistrosUsuarios= mysql_num_rows($buscarUsuariosresultados);
              for ($i=0; $i<$numregistrosUsuarios; $i++)
              {
              //variable asociativa FILA
              $fila = mysql_fetch_array($buscarUsuariosresultados);
              $id_usuarios= $fila['idusuarios'];
              $nombre_usuarios= $fila['nombre'];
              $email_usuarios= $fila['email'];
              $estado_usuarios= $fila['estado'];
              echo "<tr>";
              echo "<td>$id_usuarios</td>";
              echo "<td>$nombre_usuarios</td>";
              echo "<td>$email_usuarios</td>";
              echo "<td><option value='$estado_usuarios'>ACTIVO</option></td>";
              echo "<td><a href='editarusuarios.php?idusuario=$id_usuarios' class='btn btn-info' role='button' >Editar</button></td></td>";
             } ?>
</tbody>    
</table>
</body>
</html>