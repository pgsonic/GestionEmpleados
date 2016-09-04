<!DOCTYPE html>
<!--
Copyright (C) 2016 Pablo

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
-->
<html lang="es-ar">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	
	<link rel="stylesheet" type="text/css" href="/PruebaEmpleados/css/style.css" />
        <link rel="stylesheet" type="text/css" href="/PruebaEmpleados/css/menu.css" />
        <link href="/PruebaEmpleados/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
        

        <script src="../jquery/jquery-1.7.2.js"></script>
	<script src="../jquery/jquery-ui-1.8.21.min.js"></script>
        <script src="./js/menu.js"></script>
        
        <script>
            /*jQuery time*/
                $(document).ready(function(){
                        $("#accordian h3").click(function(){
                                //slide up all the link lists
                                $("#accordian ul ul").slideUp();
                                //slide down the link list below the h3 clicked - only if its closed
                                if(!$(this).next().is(":visible"))
                                {
                                        $(this).next().slideDown();
                                }
                        })
                })
        </script>

        <title>C12 - Empleados</title>
    </head>
    <body>
        <?php
            session_start();        
        ?>
        <div id="contenedor">
            <div id="cabecera"> 
                    <h2 class="textocabecera">  C12 - Empleados </h2>
                    <div id="nombre_empleado">
                        <label>Empleado:</label><label id="empleado_logueado"><?php echo $_SESSION["nombreApellido"];?></label>
                    </div>
            </div>

            <span class="separador_invisible"></span>
            
            <div id="barizq">	
                <div id="accordian">
                        <ul>
                                <li>
                                        <h3><span class="icon-dashboard" ></span>Fichadas</h3>
                                        <ul>
                                                <li><a href="#" onclick="return mostrarIO();">Mostrar</a></li>
                                                <li><a href="#" onclick="return registrarIO();">Registrar</a></li>
                                                <li><a href="#" onclick="return modificarIO();">Modificar</a></li>
                                                <li><a href="#" onclick="return eliminarIO();">Eliminar</a></li>
                                                <li><a href="#" onclick="return setingsIO();">Settings</a></li>
                                        </ul>
                                </li>
                                <!-- we will keep this LI open by default -->
                                <li class="active">
                                        <h3><span class="icon-tasks"></span>Empleado</h3>
                                        <ul>
                                                <li><a href="#" onclick="return modificarEmp();">Modificar</a></li>
                                                <li><a href="#" onclick="return cambiaHoraEmp();">Cambio de Horario</a></li>
                                                <li><a href="#" onclick="return vacacionesEmp();">Definir vacaciones</a></li>
                                                <li><a href="#" onclick="return licenciasEmp();">Licencias</a></li>
                                                <li><a href="#" onclick="return setingsEmp();">Settings</a></li>
                                        </ul>
                                </li>
                                <li>
                                        <h3><span class="icon-calendar"></span>Feriados - Francos</h3>
                                        <ul>
                                                <li><a href="#" onclick="return consultarFra();">Consultar Feriados</a></li>
                                                <li><a href="#" onclick="return tomarDiasFra();">Tomar dias</a></li>
<!--                                                <li><a href="#">Previous Month</a></li>
                                                <li><a href="#">Previous Week</a></li>
                                                <li><a href="#">Next Month</a></li>
                                                <li><a href="#">Next Week</a></li>
                                                <li><a href="#">Team Calendar</a></li>
                                                <li><a href="#">Private Calendar</a></li>-->
                                                <li><a href="#" onclick="return setingsFra();">Settings</a></li>
                                        </ul>
                                </li>
                                <li>
                                        <h3><span class="icon-heart"></span>Favourites</h3>
                                        <ul>
                                                <li><a href="#">Global favs</a></li>
                                                <li><a href="#">My favs</a></li>
                                                <li><a href="#">Team favs</a></li>
                                                <li><a href="#">Settings</a></li>
                                        </ul>
                                </li>
                        </ul>
                </div>
<!--
                 prefix free to deal with vendor prefixes 
                <script src="http://thecodeplayer.com/uploads/js/prefixfree-1.0.7.js" type="text/javascript" type="text/javascript"></script>

                 jQuery 
                <script src="http://thecodeplayer.com/uploads/js/jquery-1.7.1.min.js" type="text/javascript"></script>-->
            </div>		
	
            
            <div id="map">
                <?php print_r ($_SESSION);?>
            </div>
            
            
            <div id="footer"></div>

            </div>			
    </body>
</html>
