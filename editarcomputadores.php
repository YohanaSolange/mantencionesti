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
<caption><h3><center>Modificación de Computadores</center></h3></caption>
<?php 


/*
MOSTRAR DATOS "DEL FORM " Y ACTUALIZAR "BD"
*/
   $con = new DB;
   $con->conectar();
    if (ISSET($_GET['editar']) == 1) {
    //significa que estoy editando, aqui va a ir el codigo del update
      $IPCOMPUTADORES=$_POST['IPcomputadores'];
      $MAC=$_POST['mac'];
      $MODELO=$_POST['modelo'];
      $SO =$_POST['so'];
      $RAM =$_POST['ram'];
      $PROCESADOR =$_POST['procesador'];
      $MEMORIA =$_POST['memoriahdd'];
      $PROGRAMAS =$_POST['programas'];
      $id_usuarios=$_POST['idusuarios'];
      $NOMBREEQUIPO=$_POST['nombreequipo'];
    // var_dump($_POST);
      $id_computadores = $_GET['idcomputadores'];
$strConsultaUpdate = "UPDATE `computadores` SET `IPcomputadores` = '$IPCOMPUTADORES', `mac` = '$MAC', `modelo` = '$MODELO', `so` = '$SO', `ram` = '$RAM', `procesador` = '$PROCESADOR', `memoriahdd` = '$MEMORIA', `programas` = '$PROGRAMAS', `Usuarios_id` = '$id_usuarios', `nombreequipo` = '$NOMBREEQUIPO', `estado` = '1' where idcomputadores='$id_computadores'";


 $resultado2= mysql_query($strConsultaUpdate);


 if(!$resultado2) { 
 die("<div class='alert alert-danger'>Error en la consulta<strong>".mysql_error()."</strong></div> ");
}else{
  echo "<script>alert('SE MODIFICO EL USUARIO CORRECTAMENTE');</script>";
}
   }

/*
SELECCIONAR DATOS DE COMPUTADORES Y RECORRER CAMPOS EN EL TXT
*/

  $id_computadores = $_GET['idcomputadores'];
  $strConsulta = "SELECT * from computadores inner join usuarios on computadores.Usuarios_id=usuarios.idusuarios where idcomputadores='$id_computadores'";
  $resultado1 = mysql_query($strConsulta);
  $existeusuario = mysql_num_rows($resultado1);
if ($existeusuario > 0) {

$recorrer = mysql_fetch_array($resultado1);
      $ip=$recorrer['IPcomputadores'];
      $mac=$recorrer['mac'];
      $modelo=$recorrer['modelo'];
      $so =$recorrer['so'];
      $ram =$recorrer['ram'];
      $procesador =$recorrer['procesador'];
      $memoria=$recorrer['memoriahdd'];
      $programas =$recorrer['programas'];
      $id_usuarios=$recorrer['Usuarios_id'];//id usuario = muestra nombre del usuario
      $nombreequipo =$recorrer['nombreequipo'];
  } 

?>
<table class="display"  id="tabla1" cellspacing="0" width="100%">
<form  action='editarcomputadores.php?editar=1&idcomputadores=<?php echo $id_computadores?>' method="POST">

<tr><thead>
    <th>IP</th> 
    <th>MAC</th>
    <th>MODELO</th>
    <th>S.O</th>
    <th>RAM </th>
    <th>PROCESADOR</th>
    <th>MEMORIA</th>
    <th>PROGRAMAS</th>
    <th>NOMBRE</th> <!--ID USUARIO -->
    <th>EQUIPO</th>
    <th>EDITAR</th>
    
              </<thead><tbody>
<td><input type="text" id="IPcomputadores" name="IPcomputadores" value='<?php echo $ip ?>'></td>
<td><input type="text" id="mac" name="mac" value= '<?php echo $mac ?>'></td>
<td><input type="text" id="modelo" name="modelo" value= '<?php echo $modelo ?>'></td>
<td><label class="control-label" for="so"></label>
              <select class="form-control" name="so" id="so" value='<?php echo $so  ?>'>
               <option name="so">w10</option>
               <option name="so">w8</option>
               <option name="so">w7</option>
               <option name="so">wXP</option>
              </select>
<td><input type="text" id="ram" name="ram" value= '<?php echo $ram ?>'></td>
<td><input type="text" id="procesador" name="procesador" value= '<?php echo $procesador ?>'></td>
<td><input type="text" id="memoriahdd" name="memoriahdd" value= '<?php echo $memoria ?>'></td>
<td><input type="text" id="programas" name="programas" value= '<?php echo $programas ?>'></td>
<?php $query="select * from usuarios";    $resultadoquery=mysql_query($query); ?>
<td><select class="form-control" id="idusuarios" name="idusuarios" value= '<?php echo $nombre ?>'>
<?php 
                  $numregistrosUsuarios= mysql_num_rows($resultadoquery);
                   for ($i=0; $i<$numregistrosUsuarios; $i++)
                    {
                 //variable asociativa FILA
                    $fila = mysql_fetch_array($resultadoquery);
                    $id_usuarios = $fila['idusuarios'];
                    $nombre= $fila['nombre'];
                    echo "<option value='$id_usuarios'> $nombre </option>";}
?> </select></td>
<td><input type="text" id="nombreequipo" name="nombreequipo" value= '<?php echo $nombreequipo ?>'></td>
<td><button type="submit" class="btn btn-success" >Aceptar</button></td>
</tr>


                  
</tbody>    
</table>
<p class=text-center>
 <a href="listadocomputadores.php" type="submit" class="btn -link">VOLVER</button></p>
</body>
</html>