// Funcion Ajax para ...
function actualizarEmpleado(){
//    var circ = $("#txtCirc").val();	//le asigno a la variable parcela el texto contenido del textbox txt
//
//    $.ajax({data:  $("form[name=Empleado]").serialize(),//valores pasados al script en formato json
//            url:   "actualizarEmpleado.php",		//script a ejecutar que genera en el .map un layer con la data consultada
//            type:  "GET",			//forma de pasar los parametros 
//            dataType: "json",			//formato en el que se pasan y devuelven los valores
//            success:  function (json) {	 	//si la coneccion con el script tiene exito ejecuta function
//                                        var capaconsulta= olMap.getLayersByName("Consulta Parcelas");
//                                        if (capaconsulta.length!=0){
//                                                        olMap.removeLayer(capaconsulta[0],false);
//                                                }
//                                        var layerparcelaConsulta = new OpenLayers.Layer.WMS("Consulta Parcelas",
//                                                                                            urlWMS+mapaTL,
//                                                                                            {layers: 'Consulta Parcelas',  transparent: true},
//                                                                                            {isBaseLayer: false});  
//                                }
//                });
//return false;					//retorna falso para detener la ejecucion del form que llama al script
} 
function paginaVacia(){
    /**
     * Muestra una pagina vacia en el div "map" de la pagina de menu
     */
    $.ajax({
        type: "POST",
        url: "blank.php",
        success: function(a) {
            $('#map').html(a);
        }
    });
}
function mostrarIO(){
		
    //alert("Mapa mostrando ubicaciones de centros de salud con popups donde se explique para cada centro cuales son los servicios que presta, areas de acción, eventos y avisos estacionales como 'Atención: esta vigente la temporada de aplicación de la vacuna antigripal para ancianos y niños.', datos de contacto del centro, direccion etc.");
    $.ajax({
        type: "POST",
        url: "mostrar_io.php",
        success: function(a) {
            $('#map').html(a);
        }
    });
    //return false;
}
function registrarIO(){
		
    //alert("Mapa mostrando ubicaciones de centros de salud con popups donde se explique para cada centro cuales son los servicios que presta, areas de acción, eventos y avisos estacionales como 'Atención: esta vigente la temporada de aplicación de la vacuna antigripal para ancianos y niños.', datos de contacto del centro, direccion etc.");
    $.ajax({
        type: "POST",
        url: "io.php",
        success: function(a) {
            $('#map').html(a);
        }
    });
    //return false;
}

function menuFrancos(){
		
	//alert("Mapa que presentará visualmente: areas de recreación, pesca deportiva, alojamientos, gastronomía, oficinas de informes, servicios al viajero, estaciones de servicio, servicios de salud, cajeros automáticos, cine, teatro, campings, medios de transporte, etc.");
    $.ajax({
        type: "POST",
        url: "blank.php",
        success: function(a) {
            $('#map').html(a);
        }
    });
//	return false;
}

function menuPlanilla(){
		
//	alert("Mapa que permitiría localizar visualmente las propiedadeds a nombre de una persona y mostrar a traves de popups no solo la ubicacion de las mismas sino también datos como deuda de cada parcela, deuda total deuda por servicio y demás información que pueda ser relevante como moratorias vigentes, planes de regularización, etc.");
    $.ajax({
        type: "POST",
        url: "blank.php",
        success: function(a) {
            $('#map').html(a);
        }
    });	
//	return false;
}

function menuLiquidacion(){
		
//	alert("Mapa que podría mostrar de manera visual como se está llegando a los diferentes sectores del partido con las distintas obras en curso y proyectadas pudiendo ubicarlas y obtener informaciones como plazo de entrega, descripcion de la obra avisos como 'Precaución: circulación restringida hasta..', estado en el que se encuentra la misma, etc.");
    $.ajax({
        type: "POST",
        url: "blank.php",
        success: function(a) {
            $('#map').html(a);
        }
    });
//	return false;
}

function menuCI(){
		
//	alert("Mapa que mostraría comercios e industrias con sus datos de contacto y separados por categorías de incumbencias o actividades.");
    $.ajax({
        type: "POST",
        url: "blank.php",
        success: function(a) {
            $('#map').html(a);
        }
    });
//	return false;
}

function menuSeguridad(){
		
//	alert("Mapa que mostrara destacamentos policiales, oficinas del jdiciales, servicios de emergencias, etc.");
    $.ajax({
        type: "POST",
        url: "blank.php",
        success: function(a) {
            $('#map').html(a);
        }
    });
//	return false;
}