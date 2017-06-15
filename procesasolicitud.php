<?php include("header.php"); ?>
    <?php include("conexion.php"); ?>

<body>
    <div>
    <?php 

$email = $_POST['email'];
$comentario = $_POST['comentario'];
$idusuarios =$_POST['idusuarios'];
$tipo=$_POST['tipo'];
$fecha= date('Y-m-d H:i:s');

               
$con = new DB;
    $con->conectar();
    $strConsulta = "INSERT INTO `solicitud` (`idsolicitud`, `comentario`, `fecha`, `Usuarios_id`, `idtipo_solicitud`, `email`)
    VALUES ('', '$comentario', '$fecha', '$idusuarios','$tipo', '$email')";


$resultado1 = mysql_query($strConsulta);
if (!$resultado1) {
    die("<div class='alert alert-danger'><strong>No se pudo registrar, error:</strong></div> " . mysql_error().var_dump($strConsulta).var_dump($fecha).var_dump($_POST) );
}else{
    echo "<div class='alert alert-success'><strong>Registro Correcto</strong></div>";

}   

?>

</div>
</body>
</html>