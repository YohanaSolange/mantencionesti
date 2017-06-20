       <?php
       $con3 = new DB;

       $strConsultaSolicitud = "SELECT *,solicitudes.estado as estado_solicitud FROM `solicitudes` where solicitudes.estado=1";
       $con3->conectar();
            $buscarSolicitudresultados = mysql_query($strConsultaSolicitud);

       $fila = mysql_fetch_array($buscarSolicitudresultados);
?>

<th>PENDIENTES </th>

<?php

?>