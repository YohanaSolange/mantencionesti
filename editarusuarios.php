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
<caption><h3><center>Modificación de Usuarios</center></h3></caption>
<?php 
   $con = new DB;
   $con->conectar();
    if (ISSET($_GET['editar']) == 1) {
    //significa que estoy editando, aqui va a ir el codigo del update
      $NOMBRE=$_POST['nombre'];
      $EMAIL=$_POST['email'];
      $CONTRASENA=$_POST['contrasena'];
      $id_usuarios = $_GET['idusuario'];
$strConsultaUpdate = "UPDATE `usuarios` SET `nombre` = '$NOMBRE', `email` = '$EMAIL', `contrasena` = '$CONTRASENA', `estado` = '1' where idusuarios='$id_usuarios'";


 $resultado2= mysql_query($strConsultaUpdate);


 if(!$resultado2) { 
 die("<div class='alert alert-danger'><strong>Error en la consulta </strong></div> " . mysql_error());
}else{
  echo "<script>alert('SE MODIFICO EL USUARIO CORRECTAMENTE');</script>";
}
   }


   $id_usuarios = $_GET['idusuario'];
   $strConsulta = "SELECT * from usuarios where idusuarios='$id_usuarios'";
  $resultado1 = mysql_query($strConsulta);
  $existeusuario = mysql_num_rows($resultado1);
if ($existeusuario > 0) {

          $recorrer = mysql_fetch_array($resultado1);
              $nombre_usuarios= $recorrer['nombre'];
              $email_usuarios= $recorrer['email'];
              $contrasena_usuarios= $recorrer['contrasena'];
              $estado_usuarios= $recorrer['estado'];
  } 
?>
<table class="display"  id="tabla1" cellspacing="0" width="100%">
<form  action='editarusuarios.php?editar=1&idusuario=<?php echo $id_usuarios?>' method="POST">

              <tr><thead>
              <th>NOMBRE</th>
              <th>EMAIL</th>
              <th>CONTRASEÑA</th>
              <th>EDITAR</th>
              </thead><tbody>
<td><input type="text" id="nombre" name="nombre" value='<?php echo $nombre_usuarios ?>'></td>
<td><input type="email" id="email" name="email" value= '<?php echo $email_usuarios ?>'></td>
<td><input type="text" id="contrasena" name="contrasena" value= '<?php echo $contrasena_usuarios ?>'></td>

   
<td>
<button type="submit" class="btn btn-success" >Aceptar</button>
</td>
</tr>
</tbody>    
</table>
<p class=text-center>
 <a href="listadousuarios.php" type="submit" class="btn -link">VOLVER</button></p>
</body>
</html>