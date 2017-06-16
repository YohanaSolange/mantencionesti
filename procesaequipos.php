
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
$mac = $_POST['mac'];
$modelo = $_POST['modelo'];
$so = $_POST['so'];
$ram = $_POST['ram'];
$procesador = $_POST['procesador'];
$memoriahdd = $_POST['memoriahdd'];
$programas = $_POST['programas'];
$idusuarios = $_POST['idusuarios'];
$nombreequipo = $_POST['nombreequipo'];
$id_tipo_equipo = $_POST['id_tipo_equipo'];

$numero_serie = $_POST['numeroserie'];

$conexion = new DB;
//ejecutas la funcion conectar y pasas el resultado a la variable $buscarpersona
$conexion->conectar();
    //guardas la QUERY en una variable tipo stringi
$strConsulta = "INSERT INTO `equipos` ( `IPequipo`, `mac`, `modelo`, `so`, `ram`,`procesador`, `memoriahdd`, `descripcion`,`id_usuario`, `nombreequipo`,`id_tipo_equipo`,`numero_de_serie`) VALUES ( '$IP', '$mac', '$modelo', '$so', '$ram', '$procesador', '$memoriahdd', '$programas', '$idusuarios', '$nombreequipo','$id_tipo_equipo','$numero_serie')";

echo $strConsulta;
    

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


</div>


  </div>


<!-- CAJA DE CONTENIDO CONDENIDO -->
 


<!-- HASTA AQUI CONTENIDO -->

 <?php include('footer.php');?>