


<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Listado de Usuarios
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="menuprincipal.php"><i class="fa fa-dashboard"></i> Pagina Principal</a></li>
        <li><a href="listadousuarios.php">Listado Usuarios</a></li>
       
      </ol>
    </section>
<div class="box box-primary">
    <?php 
//recibe las variables de la pagina anterior, y las almacenas en variables nuevas
$IP = $_POST['IP'];
$fallas = $_POST['fallas'];
$id_equipo = $_POST['idequipos'];
$correcciones = $_POST['correcciones'];
$fecha = $_POST['fecha'];
$pendientes= $_POST['pendientes'];
$idadministradores= $_SESSION['idusuariologin'];
$idtipoequipo=$_POST['idtipoequipo'];
$idtipomantencion = $_POST['idtipomantencion'];
$monto = $_POST['monto'];
$idexterno = $_POST['id_externo'];

$conexionpromantenciones = new DB;
//ejecutas la funcion conectar y pasas el resultado a la variable $buscarpersona
$conexionpromantenciones->conectar(); 
    //guardas la QUERY en una variable tipo stringi
$strConsulta = "INSERT INTO `mantenciones` ( `IPmantencion`, `falla`,  `id_equipo`,`correcciones`, `fecha`, `pendiente`, `id_administrador`, `id_tipo_equipo`, `id_tipo_mantencion`, `id_externo`, `monto`) VALUES 
( '$IP', '$fallas', '$id_equipo' ,'$correcciones', '$fecha', '$pendientes', '$idadministradores', '$idtipoequipo', '$idtipomantencion','$idexterno','$monto' )"; 

//echo $strConsulta;

//Imprimir la query para ver si esta correcta
//echo "<br>consulta : ".$strConsulta." ";
//echo "El id del usuario es".$_SESSION["idusuariologin"];
//var_dump($_SESSION);
//ejecuta la query mysql_query con la cadena de texto strConsulta, y la almacenamos en resultado1 
$resultado1 = mysql_query($strConsulta);
if (!$resultado1) {
    die("<div class='alert alert-danger'><strong>No se pudo registrar, error:</strong></div> " . mysql_error());
}else{
    //no hay errores asi que ejecuta todo esto: 
    echo "<div class='alert alert-success'><strong>Registro de Equipo Correcto</strong>";
}
?>


<?php 
//devuelve el id del ultimo insert 
//echo mysql_insert_id(); 

?>

</div>


  </div>


<!-- CAJA DE CONTENIDO CONDENIDO -->
 


<!-- HASTA AQUI CONTENIDO -->

 <?php include('footer.php');?>
























