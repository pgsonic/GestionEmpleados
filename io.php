<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!--
Brinda la funcionalidad de registrar un ingreso o egreso a una jornada laboral.
Este registro se agrega a una base de datos siempre que la validación del formulario sea correcta.

-->
<?php
/**
 * @author Pablo Santiago
 */

session_start();

include ('BaseDatos.php');
//validación del formulario
    if($_POST) { //si la variable post está definida, la primera vez que se invoca la página no esta definida

        //imprime en la pagina los valores pasados en el arreglo post
        //USAR SOLO PARA DEBUGGING
        //var_dump($_POST);
        //USAR SOLO PARA DEBUGGING

        $fecha = $_POST["fecha"]; //extraemos la variable
        $IO = $_POST["IO"];
        $empleado=$_POST["empleado"];
        $esMovil=$_POST["esMovil"];
        $esReemplazo=$_POST["esReemplazo"];
        $reemplazado=$_POST["reemplazado"];

        // Si los datos existen o no para campos (fecha/entradasalida)
        $bd = new BaseDatos();
        $claseFecha = ""; //Muestra el error color "naranja"
        $claseIO = ""; //Muestra el error color "naranja"
        $claseReemplazado="";

        if ($fecha == ""){
          $msgFecha = "Falta Ingresar fecha y hora ";
          $claseFecha = "error";
        } else {
            $fecha=  str_replace("T", " ", $fecha);
        }
        if ($IO == "" ){
            $msgIO = "Falta definir si es entrada o salida";
            $claseIO = "error";
        } else {if (!($IO=="true")&&!($IO=="false")) {
                    $msgIO = "Entrada Salida debe ser booleana";
                    $claseIO = "error";
                }
        }
        if ($esMovil==""){
            $esMovil="false";
        }
        if ($esReemplazo=="true"){
            if ($reemplazado==""){
               $msgReemplazado="Se debe especificar a quien se reemplaza.";
               $claseReemplazado="error";
            }
        } else {
            $esReemplazo="false";
            $reemplazado="--";
        }
        //verificacion de valores y definiciónde variables.
//        echo '<br/>Fecha: '; var_dump($fecha);//muestra en pagina si campo fecha existe
//        echo '<br/>IO:';var_dump($IO);//muestra en pagina si campo IO existe
//        echo '<br/>Empleado: ';var_dump($empleado);//muestra en pagina si campo empleado existe
//        echo '<br/>Esmovil: ';var_dump($esMovil);//muestra en pagina si campo esMovil existe
//        echo '<br/>EsReemplazo: ';var_dump($esReemplazo);//muestra en pagina si campo esReemplazo existe
//        echo '<br/>Reemplazado: ';var_dump($reemplazado);//muestra en pagina si campo reemplazado existe
        if ($claseFecha == "" && $claseIO == "" && $claseReemplazado=="") {
            //agregar el elemento o la accion deseada
            if ($bd->altaEventoReloj($fecha, $IO, $empleado, $esMovil, $esReemplazo, $reemplazado)){
                //echo "<br/>Registro agregado</br>"; // Ej. Guardado correctamente
                echo '<script type="text/javascript">alert("Registro Agregado Satisfactoriamente");</script>';

            }

        }
    }
?>

<html>
    <head>
        <title>Registro Reloj</title>
        <meta charset="ISO-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="/PruebaEmpleados/css/style.css">
    </head>
    <body>
        <div class="contenedorFrmIO">
            <h1>Entradas y Salidas</h1>
            <form name="f_io" method="post" action="io.php">
             <fieldset>
                <legend>Registro</legend>
                <div class="<?php echo $claseFecha; ?>" >
                    <br/>
                    <label class="lblFrmIO">Fecha</label>
                    <input type="datetime-local"  name="fecha" id="fecha" class="inFrmIO" value="<?php echo $fecha; ?>" > <br/> <br/>
                    <span class="msg"><?php echo $msgFecha; ?></span>
                </div>
                <div class="<?php echo $claseIO; ?>" >
                    <label class="lblFrmIO">Entrada</label>
                    <input type="radio" name="IO" id="IO1" value=true <?php if ($IO=="true"){echo "checked";} ?> > <br/> <br/>
                    <label class="lblFrmIO">Salida</label>
                    <input type="radio" name="IO" id="IO2" value=false <?php if ($IO=="false"){echo "checked";} ?> > <br/> <br/>
                    <!-- Imprime el mensaje de error -->
                    <span class="msg"><?php echo $msgIO; ?></span>
                </div>
                <div>
                    <label class="lblFrmIO"> Movil </label>
                    <input type="checkbox" name="esMovil" value="true" <?php if ($esMovil=="true"){echo "checked";} else {$esMovil="false";} ?> > <br/><br/>

                    <div class="<?php echo $claseReemplazado; ?>"  >
                        <label class="lblFrmIO"> Reemplazo </label>
                        <input type="checkbox" name="esReemplazo" value="true" <?php if ($esReemplazo=="true"){echo "checked";} else {$esReemplazo="false";} ?> > <br/>
                        <label class="lblFrmIO">Reemplazado</label>
                        <input type="text" name="reemplazado" class="inFrmIO" value="<?php echo $reemplazado; ?>"><br/><br/>
                        <span class="msg"><?php echo $msgReemplazado; ?></span>
                    </div>
                    <!--texto oculto en el que guardo el empleado, reemplazar por php que imprime valor de $empleado-->
                    <input type="hidden" name="empleado" value="<?php $_SESSION["idEmpleado"] ?>" />
                </div>
                <div>
                    <input type="submit" value="Registrar Evento" id="btnRegistrar"> <br/>
                </div>
                <div>

                </div>
             </fieldset>
            </form>
        </div>
    </body>
</html>
