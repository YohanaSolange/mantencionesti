
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
$nombre = $_POST['nombre'];
$email = $_POST['email'];

$con = new DB;
//ejecutas la funcion conectar y pasas el resultado a la variable $buscarpersona
    $con->conectar();
    //guardas la QUERY en una variable tipo stringi
    $strConsulta = "INSERT INTO `usuarios` (`nombre`, `email`) 
    VALUES ( '$nombre', '$email')";

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