<!DOCTYPE html>
<html lang="en">


<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>

<body>
    <!-- Navigation -->
<div class="container">
    <div class="row">
        <div class="span12">
            <form class="form-horizontal" action='procesausuarios.php' method="POST">
              <fieldset>
                <div id="legend">
                  <legend class="">Registrar Usuarios</legend>
                </div>
                <div class="control-group">
                  <!-- IP-->
                  <label class="control-label"  for="nombre">Nombre</label>
                  <div class="controls">
                    <input type="text" id="nombre" name="nombre" placeholder="" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <!-- Fallas-->
                  <label class="control-label" for="email">Email</label>
                  <div class="controls">
                    <input type="email" id="email" name="email" placeholder="" class="input-xlarge">
                  </div>
                </div>
                   <!-- Correcciones-->
                  <label class="control-label"  for="contrasena">Contraseña</label>
                  <div class="controls">
                    <input type="password" id="contrasena" name="contrasena" placeholder="" class="input-xlarge">
                  </div>
      
                  <br>
                  <div class="controls">
                    <button  type="submit" class="btn btn-success" value="usuarios" name="usuarios">Aceptar</button>
                  </div>
           
              </fieldset>
            </form>
        </div>
    </div>
   </div>


   

</body>

</html>
