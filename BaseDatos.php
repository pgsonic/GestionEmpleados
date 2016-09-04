<?php
/**
 * Description of bdatos
 * Conexion a base de datos para realizar todas las operaciones necesarias
 * con la misma.     
 * @author Pablo
 */
include_once 'Modelo.php';
class BaseDatos {    
    
    private $_dbConn ;
    
    function __construct() {
        $this->_dbConn = pg_connect('host=localhost dbname=Empleados user=postgres password= ') or die('No se ha podido conectar: ' . pg_last_error());
    }

    function __destruct() {
        $this->close();
    }

    public function autenticar($usr,$pwd) {
        /**
         * Funcion que recibe un usuario y un pasword y si el usuario existe 
         * retorna su nombre y un texto vacio en caso contrario.
         */
        $pwd="'".$pwd."'";
        $sql= 'SELECT * FROM empleados WHERE ("idEmpleado" = '.$usr.') AND (dni = '.$pwd.');';
        $empleado="";
        $result = pg_query($sql);
        
        if ($result){
            $registro = pg_fetch_object($result);
            $empleado = $registro->nombreApellido;
            session_start(); //una vez que se que la persona que se quiere loguear es alguien autorizado inicio la sesion
            //cargo en la variable de sesion los datos de la persona que se loguea
            $_SESSION["idEmpleado"]=$registro->idEmpleado;
            $_SESSION["dni"]=$registro->dni;
            $_SESSION["fechaInicio"]=$registro->fechaInicio;
            $_SESSION["nombreApellido"]=$registro->nombreApellido;
            $_SESSION["i_lav"]=$registro->i_lav;
            $_SESSION["f_lav"]=$registro->f_lav;
            $_SESSION["i_s"]=$registro->i_s;
            $_SESSION["f_s"]=$registro->f_s;
            $_SESSION["i_d"]=$registro->i_d;
            $_SESSION["f_d"]=$registro->f_d;
            $_SESSION["iex_lav"]=$registro->iex_lav;
            $_SESSION["fex_lav"]=$registro->fex_lav;            
        }
        return $empleado;
    }
    public function altaEventoReloj($fecha,$esEntrada,$empleado,$esMovil,$esReemplazo,$reemplazado) {
        
        //chequear que no esté repetido
        
        //echo '<br/>ENTRE A ALTA EVENTO RELOJ en la clase BaseDatos <br/>'; 
        
        $query = "INSERT INTO reloj "
                . "(fecha_hora, es_in, id_empleado, es_movil, es_reemplazo, reemplazado) "
                . "VALUES "
                . "(to_timestamp('".$fecha."','yyyy-mm-dd hh24:mi'), ".$esEntrada.", ".$empleado.", ".$esMovil.", ".$esReemplazo.", '".$reemplazado."');";
        
        $result = pg_query($query) or die('<br/><br/>Fallo al insertar el fichado en la base de datos: ' . pg_last_error());
        return $result;
        
    }
    
    public function recuperaPeriodo($empleado,$periodo,$anio){
        /**
         * Funcion que devuelve todos los eventos de reloj para un periodo determinado
         * devuelve el resulset que genera la consulta
         */

        //determinar inicio y fin del periodo y empleado al que se debe recuperar información
        $mod = new Modelo();
        
        $ini = $mod->iniPeriodo($periodo, $anio);
        $fin = $mod->finPeriodo($periodo, $anio);
        
        //selecciono los registros que busco
        $sql= "SELECT * FROM reloj WHERE (id_empleado = ".$empleado.") AND (fecha_hora BETWEEN to_timestamp('".$ini."','yyyy-mm-dd hh24:mi') AND to_timestamp('".$fin."','yyyy-mm-dd hh24:mi')) ORDER BY fecha_hora;";
                
        $result = pg_query($sql);

        if(!$result)
        {
                echo "\n Ha ocurrido un error tratando de recuperar las fichadas del empleado.\n";
                
                exit;
        }
        return $result;
    }


    /**
    * Cierra la conexion a la BD
    */
    private function close() {
        if (!empty($this->_dbConn)) {
            pg_close($this->_dbConn);
            unset($this->_dbConn);
        }
    }
}

