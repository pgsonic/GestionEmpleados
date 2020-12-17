<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//ES"
"http://www.w3.org/TR/html4/loose.dtd">
<html lang="es-ar" xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	
	<link rel="stylesheet" type="text/css" href="/GestionEmpleados/css/style.css" />
        <link href="/GestionEmpleados/css/jquery-ui.css" rel="stylesheet" type="text/css"/>

        <script src="../jquery/jquery-1.7.2.js"></script>
	<script src="../jquery/jquery-ui-1.8.21.min.js"></script>
        <script src="./js/menu.js"></script>
     
        <script>
            //menu acordeon
            $(document).ready(function() {
    		$("#accordion").accordion();
		var tmp= $("#barizq").height();
		$("#map").css("height",tmp);
            });
  	</script>
        		
	<title>C12 - Empleados</title>
	
        </head>
	<!--<body onLoad="init()">-->	
	<body>
            <div id="contenedor">
                <div id="cabecera"> 
                        <!--<img class="logo" src="/sigtl/style/planet.gif" alt="logo"/> -->
                        <h2 class="textocabecera">  C12 - Empleados <hr/></h2>
                </div>

                <span class="separador_invisible"></span>
            
            <div id="barizq">	
				<div id="accordion">
					<h3><a class="linkmenu" href="#" onclick="return menuEmpleado();">Empleado</a></h3>	<!--href="#" es para que al hacer click sobre el link no te envie a ningun lado-->
					<div class="menu_body">
						<p class="parrafo">
							<form name="Empleado" onsubmit="return actualizarEmpleado();">
								<label>Legajo</label><br/><input type="text" name="txtLegajo" id="txtLegajo" size=10/><br />
								<label>Nombre</label><br/><input type="text" name="txtNombre" id="txtNombre" size=10/><br />
								<label>Dni</label><br/><input type="text" name="txtDni" id="txtDni" size=10 /><br />
								<label>Inicio actividad</label><br/><input type="text" name="txtIActividad" id="txtIActividad" size=10/><br />
								<label>Puesto</label><br/><input type="text" name="txtPuesto" id="txtPuesto" size=10/><br />
								<label>Categoria</label><br/><input type="text" name="txtCategoria" id="txtCategoria" size=10/><br />
								<label>----</label><br/><input type="text" name="txt---" id="txt---" size=10/><br />
								<input type="submit" value="Actualizar >>" />
							</form>
                                                </p>
					</div>
					<h3><a class="linkmenu" href="#" onclick="return menuIO();" >Fichadas</a></h3>
					<div class="menu_body">
						<p class="parrafo">
							  
						</p>
					</div>
					<h3><a class="linkmenu" href="#" onclick="return menuFrancos();">Francos y Feriados</a></h3>
					<div class="menu_body">
                                            <p class="parrafo">
							
                                            </p>
					</div>
					<h3><a class="linkmenu" href="#" onclick="return menuPlanilla();">Planilla</a></h3>
					<div class="menu_body">
						<p class="parrafo">
							
						</p>
					</div>
					<h3><a class="linkmenu" href="#" onclick="return menuLiquidacion();">Liquidación</a></h3>
					<div class="menu_body">
						<p class="parrafo">
							
						</p>
					</div>
<!--					<h3><a class="linkmenu" href="#" onclick="return menu--();">--</a></h3>
					<div class="menu_body">
						<p class="parrafo">
							
						</p>
					</div>
					<h3><a class="linkmenu" href="#" onclick="return menu++();">++</a></h3>
					<div class="menu_body">
						<p class="parrafo">
														
						</p>
					</div>  -->
				</div>		
			</div>		
			
			<div id="map"></div>
            
            <!-- <span class="separador_invisible"> </span>-->
            
			
			<div id="footer"></div>
			
		</div>			
	</body>
</html>
