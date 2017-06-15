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
	<?php 
//recibe las variables de la pagina anterior, y las almacenas en variables nuevas
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
$con = new DB;
//ejecutas la funcion conectar y pasas el resultado a la variable $buscarpersona
    $con->conectar();
    //guardas la QUERY en una variable tipo stringi
    $strConsulta = "INSERT INTO `usuarios` (`idusuarios`,`nombre`, `email`, `contrasena`) 
    VALUES ('', '$nombre', '$email', '$contrasena')";

    //Imprimir la query para ver si esta correcta
  //  echo "<br>consulta : ".$strConsulta.mysql_error();
//ejecuta la query mysql_query con la cadena de texto strConsulta, y la almacenamos en resultado1 
$resultado1 = mysql_query($strConsulta);

 //echo "El id del usuario es".$_SESSION["idusuariologin"];

//var_dump($_SESSION);
if (!$resultado1) {
    die("<div class='alert alert-danger'><strong>No se pudo registrar, error:</strong></div> " . mysql_error());
}else{
    //no hay errores asi que ejecuta todo esto: 
    echo "<div class='alert alert-success'><strong>Registro Correcto</strong></div>";

}

?>
</body>
</html>
<!-- REGISTRO USUARIOS REGISTRO USUARIOS- REGISTRO USUARIOS- REGISTRO USUARIOS- REGISTRO USUARIOS- -->
