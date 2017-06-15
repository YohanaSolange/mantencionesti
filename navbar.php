<?php include("conexion.php"); 

session_start(); ?>

   <nav class="navbar navbar-default navbar-fixed-top" role="navigation" ></colgroup>
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
<a class="navbar-brand" href="#">
<!-- <img src="" width="30" height="30" alt="" width="140" height="250">-->

</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

            <!-- computadores -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                Computadores
                <span class="caret"></span>
                <ul class="dropdown-menu">
                <li><a href="listadocomputadores.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true">
                Lista de Computadores</span></a></li>
                <li><a href="registrarcomputadores.php"><span class="glyphicon glyphicon-ok" aria-hidden="true">
                Registrar Computadores</span></a></li>
                <li><a href="ultimoscomputadores.php"><span class="glyphicon glyphicon-calendar" aria-hidden="true" value="reporteultimos">
                Reporte Ultimas computadores</span></a></li>
            </ul>
            </li>
            <!-- Mantenciones -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                Mantenciones
                <span class="caret"></span>
                <ul class="dropdown-menu">
                <li><a href="listadomantenciones.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true" class= "listadomantenciones">
                Lista de Mantenciones</span></a></li>
                <li><a href="registrarmantenciones.php"><span class="glyphicon glyphicon-ok" aria-hidden="true" value="registrarmantenciones">
                Registrar Mantenciones</span></a></li>
                <li><a href="ultimasmantenciones.php"><span class="glyphicon glyphicon-calendar" aria-hidden="true" value="reporteultimos">
                Reporte Ultimas Mantenciones</span></a></li>
               <li><a href="mantencionespendientes.php"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true" value="reporteultimos">
                Mantenciones Pendientes</span></a></li>
                <li><a href="listadosolicitud.php"><span class="glyphicon glyphicon-envelope" aria-hidden="true" value="reporteultimos">
                Solicitudes de Mantenciones</span></a></li>
            </ul>
            </li>
            <!--usuarios -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                Usuarios
                <span class="caret"></span>
                <ul class="dropdown-menu">
                <li><a href="listadousuarios.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true">
                Lista de Usuarios</span></a></li>
                <li><a href="registrarusuarios.php"><span class="glyphicon glyphicon-ok" aria-hidden="true">
                Registrar Usuarios</span></a></li>
                <li><a href="ultimosusuarios.php"><span class="glyphicon glyphicon-calendar" aria-hidden="true" value="reporteultimos">
                Reporte Ultimas Usuarios</span></a></li>
            </ul>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="logout.php" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión
            
            </a>


                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<?php
    if(!ISSET($_SESSION["usuvalidado"])){
echo "LA VARIABLE NO EXISTE";

echo "<script>window.location.replace('index.php');</script>";
}
?>