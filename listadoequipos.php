
<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Listado de Equipos
        <small>Todos los Equipos registrados</small>
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
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            
              <table id="tabla1" class="table table-bordered table-hover">        
    <thead>
  <tr>
    <th>ID</th>
     <th>EQUIPO</th>
    <th>IP</th> 
    <th>MAC</th>
    <th>MODELO</th>
    <th>S.O</th>
    <th>RAM</th>
    <th>PROCESADOR</th>
    <th>MEMORIA</th>
    <th>PROGRAMAS</th>
    <th>NOMBRE</th> 
    <th>ESTADO</th>
    <th>EDITAR</th>
        <th>HISTORIAL</th>
  </tr>  
  </thead>
  <tbody>
            <?php 
            include_once("conexion.php");
            $con= new DB;
            $strConsulta = "SELECT * FROM `equipos` inner JOIN usuarios on equipos.id_usuario=usuarios.id_usuario";
            $con->conectar();
            $buscarComputadoresresultados = mysql_query($strConsulta);
            $numregistrosComputadores= mysql_num_rows($buscarComputadoresresultados);
              for ($i=0; $i<$numregistrosComputadores; $i++)
              {
              //variable asociativa FILA
              $fila = mysql_fetch_array($buscarComputadoresresultados);
              $id_equipo= $fila['id_equipo'];
              $ip_equipo=$fila['IPequipo'];
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
              echo "<td>$nombre_equipo</td>";
              echo "<td>$ip_equipo</td>";
              echo "<td>$mac_equipo</td>";
              echo "<td>$modelo_equipo</td>";
              echo "<td>$so_equipo</td>";
              echo "<td>$ram_equipo</td>";
              echo "<td>$procesador_equipo</td>";
              echo "<td>$memoriahdd_equipo</td>";
              echo "<td>$descripcion</td>";
              echo "<td>$id_usuario</td>";

         

                   if ($fila['estado']==1){

        
          echo "<td><span class='label label-success'>ACTIVO</span></td>";
        } else {
          echo "<td><span class='label label-danger'>DESHABILITADO</span></td>";
        }


echo"<td><a href='editarcomputadores.php?idcomputadores=$id_equipo' class='btn btn-warning' role='button' ><span class='ionicon ion-compose' aria-hidden='true'> Editar</button>
</td>";

echo"<td><a href='detallesequipos.php?id_equipo=$id_equipo' class='btn btn-success' role='button' ><span class='ionicon ion-clipboard' aria-hidden='true'> Historial</button>
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
