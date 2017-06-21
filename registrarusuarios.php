
<?php include("header.php"); ?>
<?php include ("navbar.php"); ?>










  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registrar Usuarios 
        <small>Completar Formulario</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="menuprincipal.php"><i class="fa fa-dashboard"></i> Pagina Principal</a></li>
        <li><a href="listadousuarios.php">Listado Usuarios</a></li>
      </ol>
    </section>

        <section class="content">
<div class="box box-primary">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action='procesausuarios.php' method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control"  id="nombre" name="nombre" placeholder="Nombre del Usuario"  input title="Solo se permite letras con un mínimo de 8" minlength="8" maxlength="42"  required />
                </div>
<!-- valida tamano minimo y maximo pero no las letras -->


                   <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control"  id="email" name="email" placeholder="Email del Usuario"  minlength="8" required/>
                </div>
     
<!--
pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;" 
pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"-->


              
                
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </form>
</div>


    
    

   </section>
        <!-- /.col -->
      </div>
   


<!-- CAJA DE CONTENIDO CONDENIDO -->
 


<!-- HASTA AQUI CONTENIDO -->

 <?php include('footer.php');?>





































