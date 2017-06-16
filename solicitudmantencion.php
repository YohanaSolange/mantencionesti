<?php 

include('header.php');


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



echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon fa fa-info'></i> Se enviado su solicitud</h4>Estaremos en contacto con usted.</div>";



}

?>
  





    <p class="login-box-msg">Formulario para Solicitar Mantenciones</p>




    <form action="solicitudmantencion.php?enviado=1" method="post" enctype="multipart/form-data">
    


                   <div class="form-group">
                  <label for="exampleInputEmail1">Por favor introdusca su Email:</label>
                  <input type="email" class="form-control"  id="email" name="email" placeholder="suemail@email.com"  required />
                </div>




                   <div class="form-group">
                  <label for="exampleInputEmail1">Por favor introdusca su Nombre</label>
                  <input type="text" class="form-control"  id="nombre" name="nombre" placeholder=" "required />
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
