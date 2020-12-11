<?php


    //Para acciones.php
    include_once('../../../../Modelo/conector/BaseDatos.php');

    include_once('../../../../Modelo/estadotipos.php'); 



class AbmEstadoTipos {
     //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    // Para esta clase solo necesitamos en cargar y buscar ya que los valores son por defectos
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return EstadoTipos
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('idestadotipos',$param) and array_key_exists('etdescripcion',$param) and array_key_exists('etactivo',$param)){
            $obj = new EstadoTipos();
            $obj->setear($param['idestadotipos'], $param['etdescripcion'], $param['etactivo']);
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Tabla
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idestadotipos']) ){
            $obj = new EstadoTipos();
            $obj->setear($param['idestadotipos'], $param['etdescripcion'], $param['etactivo']);
        }
        return $obj;
    }
    
    
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idestadotipos']))
            $resp = true;
        return $resp;
    }
     */


    
   
    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param){
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['idestadotipos']))
                $where.=" and idestadotipos =".$param['idestadotipos'];
            if  (isset($param['etdescripcion']))
                 $where.=" and etdescripcion ='".$param['etdescripcion'];
            if  (isset($param['etactivo']))
                 $where.=" and etactivo ='".$param['etactivo'];
        }
        $arreglo = EstadoTipos::listar($where);  
        return $arreglo;
            
            
      
        
    }
    
}

?>