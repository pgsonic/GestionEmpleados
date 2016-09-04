<?php
$n = $_POST["usr"];
$p = $_POST["pass"];

include ('BaseDatos.php'); //Incluyo la clase que me brinda la funcionalidad de acceso a base de datos
$bd = new BaseDatos();
//si el empleado existe recupero su nombre
$empleado = $bd->autenticar($n, $p);

if ($empleado!= "")
{
	echo '<h1>Hola '.$empleado.', su acceso esta autorizado!!... <meta http-equiv="Refresh" content="1;url=menu.php"> </h1>';
	return false;
}
else
{
	echo 'Alguno de los datos suministrados es incorrecto, por favor intente nuevamente...';
	echo '<meta http-equiv="Refresh" content="1;url=index.php">';
	return false;
}
?>