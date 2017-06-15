
<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>










  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registrar Equipos
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="menuprincipal.php"><i class="fa fa-dashboard"></i> Pagina Principal</a></li>
        <li><a href="registrarequipos.php">Registrar Equipos</a></li>
       
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
           

                 <form role="form" action='procesaequipos.php' method="POST">
              <div class="box-body">

                  <div class="form-group">
                  <label for="exampleInputEmail1">Nombre Equipo</label>
                  <input type="text" class="form-control"  id="nombreequipo" name="nombreequipo" placeholder="Samsung Explota" >
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Ip</label>
                  <input type="text" class="form-control"  id="IP" name="IP" placeholder="172.0.0.1" >
                </div>





                   <div class="form-group">
                  <label for="exampleInputEmail1">Mac</label>
                  <input type="text" class="form-control"  id="mac" name="mac" placeholder="" >
                </div>
                
                


                   <div class="form-group">
                  <label for="exampleInputEmail1">Modelo</label>
                  <input type="text" class="form-control"  id="modelo" name="modelo" placeholder="" >
                </div>



                   <div class="form-group">
                  <label for="exampleInputEmail1">Sistema Operativo</label>
                   <select class="form-control" name="so" id="so" >
               <option name="so">w10</option>
               <option name="so">w8</option>
               <option name="so">w7</option>
               <option name="so">wXP</option>
              </select>
                </div>


                   <div class="form-group">
                  <label for="exampleInputEmail1">Ram Instalada</label>
                  <input type="text" class="form-control"  id="ram" name="ram" placeholder="" >
                </div>



                   <div class="form-group">
                  <label for="exampleInputEmail1">Procesador</label>
                  <input type="text" class="form-control"  id="procesador" name="procesador" placeholder="" >
                </div>


                   <div class="form-group">
                  <label for="exampleInputEmail1">Disco Duro</label>
                  <input type="text" class="form-control"  id="memoriahdd" name="memoriahdd" placeholder="" >
                </div>


                   <div class="form-group">
                  <label for="exampleInputEmail1">Observacion</label>
                  <input type="text" class="form-control"  id="programas" name="programas" placeholder="" >
                </div>


                    <div class="form-group">
                  <label for="exampleInputEmail1">Nombre de Usuario</label>
                   <?php
                  include_once("conexion.php");

                  $con2 = new DB;
                  $strConsultaUsuarios = "select * from usuarios";
                  $con2->conectar();
                  $buscarUsuariosresultados = mysql_query($strConsultaUsuarios);
                 
                   ?>

                  <select class="form-control" id='idusuarios' name='idusuarios'>
             
                  <?php 
                  $numregistrosUsuarios= mysql_num_rows($buscarUsuariosresultados);
                   for ($i=0; $i<$numregistrosUsuarios; $i++)
                    {
                 //variable asociativa FILA
                    $fila = mysql_fetch_array($buscarUsuariosresultados);
                    $id_usuario = $fila['idusuarios'];
                    $nombre_usuario = $fila['nombre'];
                    //<option value='0'>Sin Cliente</option>
                    echo "<option value='$id_usuario'> $nombre_usuario </option>";
                    }
                    ?> </select>



                </div>


                  

                  



              
                
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </form>



    
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
