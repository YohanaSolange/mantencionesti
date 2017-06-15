<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>
<?php 

//recibe las variables de la pagina anterior, y las almacenas en variables nuevas
$IP = $_POST['IP'];
$fallas = $_POST['fallas'];
$correcciones = $_POST['correcciones'];
$fecha = $_POST['fecha'];
$pendientes= $_POST['pendientes'];
$idcomputadores=$_POST['idcomputador'];
$idadministradores= $_SESSION['idusuariologin'];
$idtipo = $_POST['idtipo'];
$conexionpromantenciones = new DB;
//ejecutas la funcion conectar y pasas el resultado a la variable $buscarpersona
$conexionpromantenciones->conectar(); 
    //guardas la QUERY en una variable tipo stringi
$strConsulta = "INSERT INTO `mantenciones` (`idmantenciones`, `IPmantenciones`, `fallas`, `correcciones`, `fecha`, `pendientes`, `Administradores_id`, `Computadores_id`, `tipo_idTIPO`) VALUES 
('', '$IP', '$fallas', '$correcciones', '$fecha', '$pendientes', '$idadministradores', '$idcomputadores', '$idtipo')"; //Imprimir la query para ver si esta correcta
//echo "<br>consulta : ".$strConsulta." ";
//echo "El id del usuario es".$_SESSION["idusuariologin"];
//var_dump($_SESSION);
//ejecuta la query mysql_query con la cadena de texto strConsulta, y la almacenamos en resultado1 
$resultado1 = mysql_query($strConsulta);
if (!$resultado1) {
    die("<div class='alert alert-danger'><strong>No se pudo registrar, error:</strong></div> " . mysql_error());
}else{
    //no hay errores asi que ejecuta todo esto: 
    echo "<div class='alert alert-success'><strong>Registro Correcto</strong></div>";
}
?>
