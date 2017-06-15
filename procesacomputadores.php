<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>
	<?php 
//recibe las variables de la pagina anterior, y las almacenas en variables nuevas
$IP = $_POST['IP'];
$mac = $_POST['mac'];
$modelo = $_POST['modelo'];
$so = $_POST['so'];
$ram = $_POST['ram'];
$procesador = $_POST['procesador'];
$memoriahdd = $_POST['memoriahdd'];
$programas = $_POST['programas'];
$idusuarios = $_POST['idusuarios'];
$nombreequipo = $_POST['nombreequipo'];
$tipo = $_POST['tipo_idTIPO'];
$conexion = new DB;
//ejecutas la funcion conectar y pasas el resultado a la variable $buscarpersona
$conexion->conectar();
    //guardas la QUERY en una variable tipo stringi
$strConsulta = "INSERT INTO `computadores` (`idcomputadores`, `IPcomputadores`, `mac`, `modelo`, `so`, `ram`,`procesador`, `memoriahdd`, `programas`,`Usuarios_id`, `nombreequipo`) VALUES ('', '$IP', '$mac', '$modelo', '$so', '$ram', '$procesador', '$memoriahdd', '$programas', '$idusuarios', '$nombreequipo')";

    //Imprimir la query para ver si esta correcta
   // echo "<br>consulta : ".$strConsulta.mysql_error();
//echo "El id del usuario es".$_SESSION["idusuariologin"];
//echo($strConsulta);
//var_dump($strConsulta);
//ejecuta la query mysql_query con la cadena de texto strConsulta, y la almacenamos en resultado1 
$resultado1 = mysql_query($strConsulta);
if (!$resultado1) {
    die("<div class='alert alert-danger'><strong>No se pudo registrar, error:</strong></div> " . mysql_error());
}else{
    //no hay errores asi que ejecuta todo esto: 
    echo "<div class='alert alert-success'><strong>Registro Correcto</strong></div>";
}

?>