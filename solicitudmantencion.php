<?php 

include('header.php');
include('conexion.php');

?>




<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Formulario de Mantenciones </b>TI</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">



<?php 
if(isset($_GET['enviado'])){
//echo "RECIBIDO";

$comentario= $_POST['comentario'];
$nombre= $_POST['nombre'];
$id_tipo_solicitud= $_POST['id_tipo_solicitud'];
$email= $_POST['email'];
$id_tipo_equipo= $_POST['id_tipo_equipo'];
//$url_fotografia= $_POST['fileToUpload'];

$con = new DB;
    $con->conectar();
    $strConsulta = "INSERT INTO `solicitudes` ( `comentario`, `fecha`, `nombre`, `id_tipo_solicitud`, `email`, `id_tipo_equipo`, `url_fotografia`) 
    VALUES ('$comentario',now(), '$nombre', '$id_tipo_solicitud', '$email', '$id_tipo_equipo', '1')";


$resultado1 = mysql_query($strConsulta);

//retorna el ID del ultimo registro insertado
$ultimoidmantencion = mysql_insert_id();

//var_dump($_FILES);

try {
  $target_dir = "img/imgsolicitudes/";
$target_file = $target_dir . $ultimoidmantencion .".JPG";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(!$_FILES["fileToUpload"]['size']==0) {

      //var_dump($_FILES);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;

        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
               echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon fa fa-info'></i> Se subio correctamente la imagen</div>";
         $strConsulta2 = "update solicitudes set url_fotografia = '$target_file' where id_solicitud = $ultimoidmantencion";
         

$resultado2 = mysql_query($strConsulta2);       
        }
    } else {
       // echo "File is not an image.";
        $uploadOk = 0;
    }


}
} catch (Exception $e) {
  
}





if (!$resultado1) {
    die("<div class='alert alert-danger'><strong>No se pudo registrar, error:</strong></div> " . mysql_error());
}else{
    //no hay errores asi que ejecuta todo esto: 
    echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon fa fa-info'></i> Se enviado su solicitud</h4>Estaremos en contacto con usted.</div>";
}

//id_solicitud  comentario  fecha estado  id_usuario  id_tipo_solicitud email id_tipo_equipo  url_fotografia
}

?>
  





    <p class="login-box-msg">Formulario para Solicitar Mantenciones</p>




    <form action="solicitudmantencion.php?enviado=1" method="post" enctype="multipart/form-data">
    


                   <div class="form-group">
                  <label for="exampleInputEmail1">Por favor introduzca su Email:</label>
                  <input type="email" class="form-control"  id="email" name="email" placeholder="suemail@email.com"  required />
                </div>




                   <div class="form-group">
                  <label for="exampleInputEmail1">Por favor introduzca su Nombre</label>
                  <input type="text" class="form-control"  id="nombre" name="nombre" placeholder="Nombre el solicitante" required />
                </div>



      <div class="form-group">
                  <label for="exampleInputEmail1">¿Que problemas presenta el equipo?</label>

                   <textarea type="" class="form-control" placeholder="Breve descripcion de su solicitud de mantencion..." id="comentario" name="comentario"></textarea>
                 <!-- <input type="date" class="form-control"  id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>">-->
               </div>


                           <div class="form-group">
                  <label for="exampleInputEmail1">Tipo Equipo</label>
                  <?php 
                     include_once("conexion.php");
                     
                     $con3 = new DB;
                     $strConsultaComputadores = "select * from tipo_equipo";
                     $con3->conectar();
                     $buscarComputadoresresultados = mysql_query($strConsultaComputadores);
                     $numregistrosComputadores= mysql_num_rows($buscarComputadoresresultados);
                     ?>
                  <select class="form-control" id='id_tipo_equipo' name='id_tipo_equipo'>
                  <?php
                     for ($i=0; $i<$numregistrosComputadores; $i++)
                     {
                     $fila = mysql_fetch_array($buscarComputadoresresultados);
                     $idtipo_equipo = $fila['id_tipo_equipo'];
                     $equipo_nombre = $fila['glosa_tipo_equipo'];
                     echo "<option value='$idtipo_equipo'>$equipo_nombre</option>";
                     }
                     ?>
                  </select>
               </div>


                           <div class="form-group">
                  <label for="exampleInputEmail1">Tipo de solicitud</label>
                  <?php 
                     include_once("conexion.php");
                     
                     $con4 = new DB;
                     $strConsultaComputadores = "select * from tipo_solicitud";
                     $con4->conectar();
                     $buscarComputadoresresultados = mysql_query($strConsultaComputadores);
                     $numregistrosComputadores= mysql_num_rows($buscarComputadoresresultados);
                     ?>
                  <select class="form-control" id='id_tipo_solicitud' name='id_tipo_solicitud'>
                  <?php
                     for ($i=0; $i<$numregistrosComputadores; $i++)
                     {
                     $fila = mysql_fetch_array($buscarComputadoresresultados);
                     $id_tipo_solicitud = $fila['id_tipo_solicitud'];
                     $glosa_tipo_solicitud = $fila['glosa_tipo_solicitud'];
                     echo "<option value='$id_tipo_solicitud'>$glosa_tipo_solicitud</option>";
                     }
                     ?>
                  </select>
               </div>

               <div class="form-group">
                  <label for="exampleInputEmail1">Adjuntar Fotografia</label>
                  <input class ="btn-primary" type="file" name="fileToUpload" id="fileToUpload">
                  
               </div>




    
  



      <div class="row">
     
        <!-- /.col -->
        <div class="social-auth-links text-center">
          <button type="submit" class="btn btn-success btn-block btn-flat">Solicitar Mantencion</button>
<br>
<a href="index.php" class="btn btn-primary" role="button"><span class='ion-reply' aria-hidden='true'>Volver </span></a>

        </div>
        <!-- /.col -->
      </div>
    </form>
<!--
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Solicite una Mantencion</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>-->
    <!-- /.social-auth-links -->
<!--
    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>
-->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->






  



<!-- FOOTER JQUERY -->
<!-- jQuery 3.1.1 -->


</body>
</html>
