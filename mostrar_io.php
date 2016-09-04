<!DOCTYPE html>

<?php

/**
 * Descripción:
 * Formulario que muestra los registros de entrada/salida de un periodo determinado.
 * Se debe llamar especificando el empleado, el periodo y el año
 * 
 * @author Pablo Santiago
 */

include ('BaseDatos.php'); //Incluyo la clase que me brinda la funcionalidad de acceso a base de datos
session_start();
$bd = new BaseDatos();

//TRATAMIENTO DIFERENCIADO CUANDO POST ESTA CONFIGURADA.
    if(!$_POST) { 
    //si la variable post está definida, recupero la fecha de inicio y de final del periodo requerido y 
    //muestro los registros existentes en esas fechas para un empleado determinado.
        $empleado=$_POST["empleado"];
        $periodo=$_POST["periodo"];
        $anio=$_POST["anio"];
    } else {
        $mensaje= '<br><br><h3>Se debe especificar para que empleado, periodo y anio se desean listar los registros. </h3></br></br>';
    }
?>

<html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

        <link rel="stylesheet" type="text/css" href="/PruebaEmpleados/css/style.css" />
        <script src="/jquery-ui-1.11.4/external/jquery/jquery.js"></script> 
        <link rel="stylesheet" href="/jquery-ui-1.11.4/jquery-ui.css">
        <script src="/jquery-ui-1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="/jquery-ui-1.11.4/jquery-ui.theme.css">
        <script>
            $(function() {
                var spinP = $( "#spinPeriodo" ).spinner({min:1, max:12, spin:movimiento, change:cambiado, stop:parado});
                var spinA = $( "#spinAnio" ).spinner({min:2015, max:2199, spin:movimiento, change:cambiado, stop:parado});
                spinP.spinner("value",1);
                spinA.spinner("value",2016);
            });
            function movimiento( event, ui ){
                //$("#tablaFichadas").append("spin ");
            }
            
            function cambiado( event, ui ){
                //$("#tablaFichadas").append("cambio "); //lo que quiero hacer cuando cambie el valor
            }
            
            function parado( event, ui ){
                $("#tablaFichadas").append("stop "); //lo que quiero hacer cuando suelta los botones y para de cambiar el valor
				
            }
            
            
        </script>
    </head>
    <body>
        
        
        <form name="periodoAno">
            <fieldset style="padding: 10px;">
                <legend>Periodo y Año</legend>

                <p>
                    <label for="spinPeriodo">Periodo:</label>
                    <input id="spinPeriodo" name="periodo">
                    <label for="spinAnio" style="margin-left: 50px;" >Año:</label>
                    <input id="spinAnio" name="anio">
                </p>
            </fieldset>
        </form>
        
        <div id="tablaFichadas" class="tablaFichadas">
            <table border="1">
                <caption> Listado de Fichadas registradas </caption>
                <th>Fecha:</th> <th>Es Entrada:</th> <th>Es Movil:</th> <th>Es Reemplazo:</th> <th>Reemplazado:</th><tr>
                <?php   
                    $registros = $bd->recuperaPeriodo($_SESSION["idEmpleado"],2,2016);   
                    while ($row = pg_fetch_object($registros))
                            {
                                echo "<tr>";
                                            echo "<td>".$row->fecha_hora."</td>";
                                            echo " <td class=\"bool\">".$row->es_in."</td>";
                                            echo "<td>".$row->es_movil."</td>";
                                            echo "<td>".$row->es_reemplazo."</td>";
                                            echo "<td>".$row->reemplazado."</td>";
                                    echo "<tr>";
                            }
                ?>
            </table>
        </div>
    </body>        
</html>