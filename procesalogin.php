 
<?php 
 session_start();
include("header.php"); 
 include("conexion.php"); 

//var_dump($_POST);
//recibe las variables de la pagina anterior, y las almacenas en variables nuevas
$nombreusuario = $_POST['email'];
$contrasena = $_POST['contrasena'];
//instancias la clase DB que esta dentro de CONEXION.PHP 
$conn = new DB;
//ejecutas la funcion conectar y pasas el resultado a la variable $buscarpersona
     $conn->conectar();
    //guardas la QUERY en una variable tipo string
    $strConsulta = "select * from administradores where email ='$nombreusuario' and 
    contrasena = '$contrasena'";
    //Imprimir la query para ver si esta correcta
    //echo "<br>consulta : ".$strConsulta." ";
//ejecuta la query mysql_query con la cadena de texto strConsulta, y la almacenamos en resultado1 
$resultado1 = mysql_query($strConsulta);
//resultado tiene datos???? si tiene errores imprimelos : 
if(!$resultado1) { 
 die("<div class='alert alert-danger'><strong>Error Usuario No validado</strong></div> " . mysql_error());
}else{
//no hay errores asi que ejecuta todo esto: 
echo "";
//echo "El id del usuario es".$_SESSION["idusuariologin"];
//var_dump($_SESSION);
}
//consultamos el numero de filas que tiene el dataset RESULTADO  con la funcion mysql_num_rows nos devuelve 0 si no tiene nada
$existeusuario = mysql_num_rows($resultado1);

        if ($existeusuario > 0) {
            # code...
            $auteusu = mysql_fetch_array($resultado1);
            $nombreusuariologin= $auteusu['nombre'];
            $emailusuariologin= $auteusu['email'];
            $idusuariologin = $auteusu['id_administrador'];
            echo "<div class='alert alert-success'><strong><p class=text-left> Ha iniciado sesión correctamente</p> ";
            $_SESSION["usuvalidado"]= 1;
            $_SESSION["nombreusuariovalidado"]= $nombreusuariologin;
            $_SESSION["emailusuariovalidado"]= $emailusuariologin;
            $_SESSION["idusuariologin"]=$idusuariologin;
            
         
             
             echo "<div class='alert alert-success''><strong><h2><p class=text-center>Bienvenido $nombreusuariologin - $emailusuariologin </p></h2></strong><p class=text-right>Ir a Pagina Principal  </p><p class=text-right><a class='btn btn-success' href='menuprincipal.php' role='button'>  Aquí  </a></p> </strong></div></div>";

     


        } else{


            echo "<div class='alert alert-danger'><strong><p class=text-center text >No existe el usuario o contraseña </p></strong></strong><p class=text-center>Volver a Inicio de Sesión  </p><p class=text-center><a class='btn btn-danger' href='index.php' role='button'>  Volver </a></p> </div> ";
        }
?>