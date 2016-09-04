<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Modelo
 *
 * @author Pablo
 */
class Modelo {
    
    function __construct() {
    
    }

    function __destruct() {
    
    }
    
    public function iniPeriodo($periodo, $anio){
    /**
     * FUNCIÓN QUE DEVUELVE UN TIMESTAMP CON EL INICIO DE UN PERIODO DE UN ANIO
     * SE TOMA COMO PRIMER PERIODO DE UN AÑO EL QUE COMIENZA EL 18 DE ENERO DEL MISMO
     * 
     */
        $dia=18;
        $mes=$periodo;
        //mktime (hora, minuto, segundo, mes, dia, año);
        $timestamp = date('Y-m-d G:i:s', mktime(0, 0, 0, $mes, $dia, $anio));
        return $timestamp;        
    }
        
    public function finPeriodo($periodo,$anio) {
    /**
     * FUNCIÓN QUE DEVUELVE UN TIMESTAMP CON EL FIN DE UN PERIODO DE UN ANIO
     * SE TOMA COMO PRIMER PERIODO DE UN AÑO EL QUE COMIENZA EL 18 DE ENERO DEL MISMO
     * Y EL ULTIMO ES EL QUE FINALIZA EL 17 DE ENERO DEL AÑO SIGUIENTE
     */
        $dia=17;
        $mes=$periodo;
        //mktime (hora, minuto, segundo, mes, dia, año);
        $timestamp = date('Y-m-d G:i:s', mktime(23, 59, 59, $mes+1, $dia, $anio));
        return $timestamp;        
    }
}
