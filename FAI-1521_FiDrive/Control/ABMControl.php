<?php


    //Para acciones.php
    include_once('../../../../Modelo/conector/BaseDatos.php');

    include_once('../../../../Modelo/archivocargado.php');
    include_once('../../../../Modelo/archivocargadoestado.php'); 
    include_once('../../../../Modelo/estadotipos.php'); 
    include_once('../../../../Modelo/usuario.php'); 



class AbmArchivoCargado{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return ArchivoCargado
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if(array_key_exists('acNombre',$param) and array_key_exists('acDescripcion',$param) and array_key_exists('acIcono',$param) and array_key_exists('idUsuario',$param) and array_key_exists('acLinkAcceso',$param) and array_key_exists('acCantidadDescarga',$param) and array_key_exists('acCantidadUsada',$param) and array_key_exists('acFechaInicioCompartir',$param) and array_key_exists('AceFechaFinCompartir',$param) and array_key_exists('acProtegidoClave',$param)){
            echo " \n entro al if \n"; 
            $obj = new ArchivoCargado();
            $obj->setear($param['idArchivoCargado'], $param['acNombre'], $param['acDescripcion'],
             $param['acIcono'], $param['idUsuario'], $param['acLinkAcceso'], $param['acCantidadDescarga'],
              $param['acCantidadUsada'], $param['acFechaInicioCompartir'], $param['AceFechaFinCompartir'],
               $param['acProtegidoClave']);
        }
        print_r($obj);
        echo " \n sali del if \n";
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return ArchivoCargado
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idarchivocargado']) ){
            $obj = new ArchivoCargado();
            $obj->setear($param['idarchivocargado'], $param['acnombre'], $param['acdescripcion'], $param['acicono'], $param['idusuario'], $param['aclinkacceso'], $param['acicono'], $param['accantidaddescarga'], $param['accantidadusada'], $param['acfechainiciocompartir'], $param['acefechafincompartir'], $param['acprotegidoclave']);
        }
        return $obj;
    }
    
    
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idarchivocargado']))
            $resp = true;
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $objCargado =  $this->cargarObjeto($param);
        echo "\n \n llegue aca  \n \n";
        if($objCargado =! null && $objCargado->insertar()){
            $resp = true;
            $objEstadoTiposAbm = new AbmArchivoCargadoEstado();
            $datoEstado['idestadotipos'] = 1;
            $newEstado = $objEstadoTiposAbm->buscar($datoEstado);
            $nuevoArCarEstado = array ("objArchivo"=>$objCargado, "objEstado"=>$newEstado[0], "accion"=>"alta");
            $respuesta = $this->modificarEstado($nuevoArCarEstado);

        }
        
        return $respuesta;
        
    }

     /**
     * Y.. bueno... modifica el estado, el nombre lo dice pues.
     * @param array $param
     */
    public function modificarEstado($param){
        $archivo = $param['objArchivo'];
        $usuario = $archivo->getUsuario();
        $fechaInicio = date("Y-m-d H:i:s");
        $estado = $param["objEstado"];
        $accion = $param["accion"];

        if($accion == "alta"){
            // se va subir el archivo y crea el estado.
            $descripcion = "Este archivo fue subido por".$usuario.".";
            $fechaFin = null;
            $datos = array($archivo->getIdArchivoCargadoEstado(),$estado,$descripcion,$usuario,$fechaInicio,$fechaFin,$archivo->getIdArchivoCargado());
            $objEstadoTiposAbm = new AbmArchivoCargadoEstado();
            $resp = $objEstadoTiposAbm->alta($datos);
            if($resp){
                $rta = true;
            }
        }

        return $rta;
    }
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtTabla = $this->cargarObjetoConClave($param);
            if ($elObjtTabla!=null and $elObjtTabla->eliminar()){
                $resp = true;
            }
        }
        
        return $resp;
    }
    
    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtTabla = $this->cargarObjeto($param);
            if($elObjtTabla!=null and $elObjtTabla->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param){
        $where = " true ";
        if ($param <> NULL){
            if  (isset($param['idarchivocargado']))
                $where.=" and idarchivocargado =".$param['idarchivocargado']."'";
            if  (isset($param['acnombre']))
                 $where.=" and acnombre ='".$param['acnombre']."'";
            if  (isset($param['acdescripcion']))
                $where.=" and acdescripcion ='".$param['acdescripcion']."'";
            if  (isset($param['acicono']))
                 $where.=" and acicono ='".$param['acicono']."'";
            if  (isset($param['idusuario']))
                 $where.=" and idusuario ='".$param['idusuario']."'";
            if  (isset($param['aclinkacceso']))
                 $where.=" and aclinkacceso ='".$param['aclinkacceso']."'";
            if  (isset($param['accantidaddescarga']))
                 $where.=" and accantidaddescarga ='".$param['accantidaddescarga']."'";
            if  (isset($param['accantidadusada']))
                 $where.=" and accantidadusada ='".$param['accantidadusada']."'";
            if  (isset($param['acfechainiciocompartir']))
                 $where.=" and acfechainiciocompartir ='".$param['acfechainiciocompartir']."'";
            if  (isset($param['acefechafincompartir']))
                 $where.=" and acefechafincompartir ='".$param['acefechafincompartir']."'";
            if  (isset($param['acprotegidoclave']))
                 $where.=" and acprotegidoclave ='".$param['acprotegidoclave']."'";
        }
        $arreglo = ArchivoCargado::listar($where);  
        return $arreglo;
            
            
      
        
    }
    
}

class AbmArchivoCargadoEstado{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return ArchivoCargadoEstado
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('idarchivocargadoestado',$param) and array_key_exists('idestadotipos',$param) and array_key_exists('acedescripcion',$param) and array_key_exists('idusuario',$param) and array_key_exists('acefechaingreso',$param) and array_key_exists('acefechafin',$param) and array_key_exists('idarchivocargado',$param)){
            $obj = new ArchivoCargadoEstado();
            $obj->setear($param['idarchivocargadoestado'], $param['idestadotipos'], $param['acedescripcion'], $param['idusuario'], $param['acefechaingreso'], $param['acefechafin'], $param['idarchivocargado']);
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return ArchivoCargadoEstado
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idarchivocargadoestado']) ){
            $obj = new ArchivoCargadoEstado();
            $obj->setear($param['idarchivocargadoestado'], $param['idestadotipos'], $param['acedescripcion'], $param['idusuario'], $param['acefechaingreso'], $param['acefechafin'], $param['idarchivocargado']);
        }
        return $obj;
    }
    
    
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idarchivocargadoestado']))
            $resp = true;
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $param['idarchivocargadoestado'] !=null;
        $elObjtTabla = $this->cargarObjeto($param);
        if ($elObjtTabla!=null and $elObjtTabla->insertar()){
            $resp = true;
        }
        return $resp;
        
    }
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtTabla = $this->cargarObjetoConClave($param);
            if ($elObjtTabla!=null and $elObjtTabla->eliminar()){
                $resp = true;
            }
        }
        
        return $resp;
    }
    
    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtTabla = $this->cargarObjeto($param);
            if($elObjtTabla!=null and $elObjtTabla->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param){
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['idarchivocargadoestado']))
                $where.=" and idarchivocargadoestado =".$param['idarchivocargadoestado'];
            if  (isset($param['idestadotipos']))
                 $where.=" and idestadotipos ='".$param['idestadotipos'];
            if  (isset($param['acedescripcion']))
                 $where.=" and acedescripcion ='".$param['acedescripcion'];
            if  (isset($param['idusuario']))
                 $where.=" and idusuario ='".$param['idusuario'];
            if  (isset($param['acefechaingreso']))
                 $where.=" and acefechaingreso ='".$param['acefechaingreso'];
            if  (isset($param['acefechafin']))
                 $where.=" and acefechafin ='".$param['acefechafin'];
            if  (isset($param['idarchivocargado']))
                 $where.=" and idarchivocargado ='".$param['idarchivocargado'];
        }
        $arreglo = ArchivoCargadoEstado::listar($where);  
        return $arreglo;
            
            
      
        
    }
    
}

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


class AbmUsuario {
     //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    // Para esta clase solo necesitamos en cargar y buscar ya que los valores son por defectos
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Usuario
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('idusuario',$param) and array_key_exists('usnombre',$param) and array_key_exists('usapellido',$param) and array_key_exists('uslogin',$param) and array_key_exists('usclave',$param) and array_key_exists('usactivo',$param)){
            $obj = new Usuario();
            $obj->setear($param['idusuario'], $param['usnombre'], $param['usapellido'], $param['uslogin'], $param['usclave'], $param['usactivo']);
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
        
        if( isset($param['idusuario']) ){
            $obj = new Usuario();
            $obj->setear($param['idusuario'], $param['usnombre'], $param['usapellido'], $param['uslogin'], $param['usclave'], $param['usactivo']);
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
            if  (isset($param['idusuario']))
                $where.=" and idusuario =".$param['idusuario'];
            if  (isset($param['usnombre']))
                 $where.=" and usnombre ='".$param['usnombre'];
            if  (isset($param['usapellido']))
                 $where.=" and usapellido ='".$param['usapellido'];
            if  (isset($param['uslogin']))
                 $where.=" and uslogin ='".$param['uslogin'];
            if  (isset($param['usclave']))
                 $where.=" and usclave ='".$param['usclave'];
            if  (isset($param['usactivo']))
                 $where.=" and usactivo ='".$param['usactivo'];
        }
        $arreglo = Usuario::listar($where);  
        return $arreglo;
            
            
      
        
    }
    
}
?>