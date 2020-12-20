<?php
$n = $_POST["usr"];
$p = $_POST["pass"];

include ('BaseDatos.php'); //Incluyo la clase que me brinda la funcionalidad de acceso a base de datos
$bd = new BaseDatos();
//si el empleado existe recupero su nombre
$empleado = $bd->autenticar($n, $p);

if (strlen($empleado)>2) //Si la longitud del nombre es mayor a 2 o sea el empleado existe
{
	header ("Location: menu.php"); //abre el menu principal
	exit();
	return false;
}
else //caso contrario vuelve a página de login inicial
{
	echo 'Alguno de los datos suministrados es incorrecto, por favor intente nuevamente...';
	echo '<meta http-equiv="Refresh" content="1;url=index.php">';
	return false;
}
?>
