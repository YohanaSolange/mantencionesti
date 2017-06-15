<?php
 class DB{ var $conect;  var $BaseDatos;   var $Servidor;  var $Usuario;   var $Clave;  
 	function DB(){    
$this->BaseDatos = "dbmantenciones";
$this->Servidor = "localhost";
$this->Usuario = "usermantenciones";
$this->Clave = "12345";
echo "".mysql_error();
}
function conectar() {
//Defino la zona horaria para que sea la chilena
date_default_timezone_set('America/Santiago');
if(!($con=@mysql_connect($this->Servidor,$this->Usuario,$this->Clave))){
echo"Error al conectar a la base de datos";
exit();
}
if (!@mysql_select_db($this->BaseDatos,$con)){
echo "Error al seleccionar la base de datos";
exit();
}
$this->conect=$con;
return true;
}
}
?>