<!DOCTYPE html>
<html lang="en">
<?php include("header.php"); ?>
<?php include("conexion.php"); ?>
<?php session_start(); ?>
<!--<?php //include ("navbar.php"); ?> -->
<div class="container" >
    <div class="row">
        <div class="span12">
            
              <fieldset>
                <div id="legend">
                <form class='' action='procesalogin.php' method='POST'>
                  <legend class=""><p class=text-center  >Iniciar Sesión</p></legend>
                </div>
                <div class="control-group">
                  <!-- Username -->
                <p class=text-center><label class="control-label" for="email" class="input-small">Email:</p></label>
                  <div class="controls"></p>
                    <p class=text-center><input type="email" id="email" name="email" placeholder="Email" class="input-xlarge" value= "" required/></p>
                  </div>
                </div>
                <div class="control-group">
                  <!-- Password-->
                  <p class=text-center><label class="control-label" for="contrasena" class="input-small">Contraseña:</label>
                  <div class="controls"></p>
                    <p class=text-center><input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" class="input-xlarge" value= "" required/></p>
                  </div>
                </div>
                <div class="control-group">
                  <!-- Button -->
                  <br>
                  <div class="controls"><p class=text-center>
                    <button  type="submit" class="btn btn-primary" value="login" name="login" role="form">Aceptar</button></p>

                  </div>
                </div>
              </fieldset>
            </form>
        </div>
    </div>
</div>
<a class="navbar-brand" href="#">
<img class=" img-responsive img-center " src="img/logo-yadran.png" alt="" width="100%"></a>
   
 <br>

<p class=text-center>
 <a href="solicitudmantenciones.php" type="submit" class="btn -link">Hacer una Solicitud</button></p>
</body>
</html>
