 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//ES" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es-ar" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

        <link rel="stylesheet" type="text/css" href="/PruebaEmpleados/css/style.css" />
        <link rel="stylesheet" type="text/css" href="/PruebaEmpleados/css/menu.css" />
        <link href="/PruebaEmpleados/css/jquery-ui.css" rel="stylesheet" type="text/css"/>

        <script src="../jquery/jquery-1.7.2.js"></script>
        <script src="../jquery/jquery-ui-1.8.21.min.js"></script>

        <script> //menu acordeon
                $(document).ready(function() {
                                                $("#accordion").accordion();
                                                var tmp= $("#barizq").height();
												tmp=tmp-200;
                                                $("#map").css("height",tmp);
                });
        </script>

        <title>Bienvenido C12 Empleados</TITLE>
    </head>
    <body>
        <div id="contenedor">
            <div id="cabecera"> 
                <!-- <img class="logo" src="/Sigtl/style/Logo.png" alt="logo"/> -->
                <h2 class="textocabecera"> C12 - Empleados </h2>
            </div>

            <span class="separador_invisible"></span>

            <div id="barizq">	
                <div id="accordion">
                    <h3><a class="linkmenu" href="#">Ingreso al Sistema</a></h3>	<!--href="#" es para que al hacer click sobre el link no te envie a ningun lado-->
                    <div class="menu_body">
                        <p class="parrafo">
                            <form action="autenticar.php" method="post">
                               <label>Usuario</label><br/>
                               <input type="text" name="usr" maxlength="15"size=15/><br />
                               <label>Contraseña</label><br/>
                               <input type="password" name="pass" maxlength="15" size=15/><br />
                               <input type="submit" value="Continuar >>" />
                           </form>
                        </p>
                    </div>
                </div>		
            </div>		

            <div id="map" style="visibility: hidden;">
            </div>
			

            <span class="separador_invisible"> </span>

            <div id="footer">
            </div>

        </div>
    </body>
</html>	