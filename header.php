<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Logo Nav - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/logo-nav.css" rel="stylesheet">
    <link href="media/css/jquery.dataTables.css" rel="stylesheet">
	 <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


  <script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
  </script>

 

<script>
  $(document).ready(function() {
      $('#tabla1').DataTable({
            dom: 'lBfrtip',
            buttons: [


                 {
                 extend: 'print',
                 

            text: 'Imprimir',
            autoPrint: true,
            //title: 'asdasd',
              },'excel',
           
            ],
            "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina &nbsp;&nbsp;&nbsp;",
            "zeroRecords": "No se encuentra esa coincidencia",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros",
            "print" : "Imprimir",

            "infoFiltered": "(buscando entre _MAX_ registros)",
            "search":         "Filtrar Registros : &nbsp",
               paginate: {
                first:      "Primera Pagina",
                previous:   "Anterior",
                next:       "Siguiente",
                last:       "Ultima"
            }
        }
      });
    } 

    );

</script>

</head>