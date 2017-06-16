
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
        <li><a href="listadoequipos.php">Listado equipos</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabla1" class="table table-bordered table-hover">        
    <thead>
  <tr>
    <th>ID</th>
    <th>IP</th> 
    <th>MAC</th>
    <th>MODELO</th>
    <th>S.O</th>
    <th>RAM</th>
    <th>PROCESADOR</th>
    <th>MEMORIA</th>
    <th>PROGRAMAS</th>
    <th>NOMBRE</th> 
    <th>EQUIPO</th>
    <th>ESTADO</th>
    <th>EDITAR</th>
  </tr>  
  </thead>
  <tbody>
            <?php 
            include_once("conexion.php");
            $con= new DB;
            $strConsulta = "SELECT * FROM `equipos` inner JOIN usuarios on equipos.idusuarios=usuarios.idusuarios";
            $con->conectar();
            $buscarComputadoresresultados = mysql_query($strConsulta);
            $numregistrosComputadores= mysql_num_rows($buscarComputadoresresultados);
              for ($i=0; $i<$numregistrosComputadores; $i++)
              {
              //variable asociativa FILA
              $fila = mysql_fetch_array($buscarComputadoresresultados);
              $id_euqipo= $fila['idequipos'];
              $ip_equipo=$fila['IPequipos'];
              $mac_equipo= $fila['mac'];
              $modelo_equipo= $fila['modelo'];
              $so_equipo= $fila['so'];
              $ram_equipo= $fila['ram'];
              $procesador_equipo= $fila['procesador'];
              $memoriahdd_equipo= $fila['memoriahdd'];
              $descripcion= $fila['descripcion'];
              $id_usuario= $fila['nombre']; 
              $nombre_equipo= $fila['nombreequipo'];
              $estado_equipo= $fila['estado'];

                //<option value='0'>Sin Cliente</option>
            echo "<tr>";
              echo "<td>$id_equipo</td>";
              echo "<td>$ip_equipo</td>";
              echo "<td>$mac_equipo</td>";
              echo "<td>$modelo_equipo</td>";
              echo "<td>$so_equipo</td>";
              echo "<td>$ram_equipo</td>";
              echo "<td>$procesador_equipo/td>";
              echo "<td>$memoriahdd_equipo</td>";
              echo "<td>$descripcion</td>";
              echo "<td>$id_usuario</td>";
              echo "<td>$nombre_equipo</td>";
              echo "<td><option value='$estado_equipo'>ACTIVO</td>";

echo"
<td><a href='editarcomputadores.php?idcomputadores=$id_compu' class='btn btn-info' role='button' >Editar</button>
</td></tr>";
              }
             ?>
       </tbody>    
</table>
    
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


<!-- CAJA DE CONTENIDO CONDENIDO -->
 


<!-- HASTA AQUI CONTENIDO -->

 <?php include('footer.php');?>