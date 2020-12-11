<?php


    //Para acciones.php
    include_once('../../Modelo/conector/BaseDatos.php');

    include_once('../../Modelo/archivocargado.php');  

    include_once('ABMArchivoCargadoEstado.php');

class AbmArchivoCargado{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return ArchivoCargado
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('idarchivocargado',$param) and
            array_key_exists('acnombre',$param) and
            array_key_exists('acdescripcion',$param) and 
            array_key_exists('acicono',$param)and 
            array_key_exists('idusuario',$param) and 
            array_key_exists('aclinkacceso',$param) and 
            array_key_exists('accantidaddescarga',$param)and 
            array_key_exists('accantidadusada',$param)and 
            array_key_exists('acfechainiciocompartir',$param) and 
            array_key_exists('acefechafincompartir',$param) and 
            array_key_exists('acprotegidoclave',$param)){
                
            $obj = new ArchivoCargado();

            $usuario = new Usuario();
            $usuario->setIdUsuario($param['idusuario']); 
            $usuario->cargar();

            $obj->setear(
               $param['idarchivocargado'],
               $param['acnombre'],
               $param['acdescripcion'] , 
               $param['acicono'] ,
               $usuario ,
               $param['aclinkacceso'] ,
               $param['accantidaddescarga'] ,
               $param['accantidadusada'] ,
               $param['acfechainiciocompartir'], 
               $param['acefechafincompartir'] ,
               $param['acprotegidoclave']
            ); 
        }

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
            $obj->setear($param['idarchivocargado'], null, null, null, null, null, null, null, null, null, null);
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

    public function alta($datos)
    {
        $respuesta = false;
        // Traemos los datos en un array.
        
        $obj = $this->cargarObjeto($datos);

        if ($obj != null && $obj->insertar()) {
            $param['idarchivocargado'] = $obj->getIdArchivoCargado();
            $param['idusuario'] = $obj->getIdUsuario()->getIdUsuario();

            $estado = new AbmArchivoCargadoEstado();

            $respuesta = $estado->alta($param);

        }
        return $respuesta;
    }
     
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $respuesta = false;
        if ($this->seteadosCamposClaves($param)){
            $obj = $this->cargarObjeto($param);

            if ($obj != null and $obj->modificar()){
                $estado = new AbmArchivoCargadoEstado();
                $param['acdescripcion'] = $param['motivodelete'];
                $param['idarchivocargado'] = $obj->getIdArchivoCargado();
                $param['idusuario'] = $obj->getIdUsuario()->getIdUsuario();

                $respuesta = $estado->baja($param);

                $respuesta = true;
            }
        }
        
        return $respuesta;
    }
    
        /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function compartir($param){
        $respuesta = false;

        if ($this->seteadosCamposClaves($param)){
            $objeto['idarchivocargado'] = $param['idarchivocargado'];
            $objeto['acnombre'] = $param['acnombre'];
            $objeto['acdescripcion'] = $param['acdescripcion'];
            $objeto['acicono'] = $param['acicono'];
            $objeto['idusuario'] = $param['idusuario'];
            $objeto['aclinkacceso'] = $param['aclinkacceso'];
            $objeto['accantidaddescarga'] = $param['accantidaddescarga'];
            $objeto['accantidadusada'] = $param['accantidadusada'];
            $objeto['acfechainiciocompartir'] = date('Y-m-d H:i:s');
            if($param['acefechafincompartir'] != 0){
                $fecha = date('Y-m-d H:i:s');
                $objeto['acefechafincompartir'] =date('Y-m-d H:i:s', strtotime($fecha.' + '.$param['acefechafincompartir'].' days'));
                } else {
                    $objeto['acefechafincompartir'] = "0000-00-00 00:00:00";
                }
            
            if( isset($param['acprotegidoclave']) ){
                $objeto['acprotegidoclave'] = $param['acprotegidoclave'];
            } else {
                $objeto['acprotegidoclave'] = "";
            }
            }
            $obj = $this->cargarObjeto($objeto);

            if ($obj != null and $obj->modificar()){
                $estado = new AbmArchivoCargadoEstado();

                $param['idarchivocargado'] = $obj->getIdArchivoCargado();
                $param['idusuario'] = $obj->getIdUsuario()->getIdUsuario();

                $respuesta = $estado->compartir($param);

                $respuesta = true;
            }
        
        return $respuesta;
    }

    public function dejarCompartir($param){
        $respuesta = false;
        
        if ($this->seteadosCamposClaves($param)){
            $objeto['idarchivocargado'] = $param['idarchivocargado'];
            $objeto['acnombre'] = $param['acnombre'];
            $objeto['acdescripcion'] = $param['acdescripcion'];
            $objeto['acicono'] = $param['acicono'];
            $objeto['idusuario'] = $param['idusuario'];
            $objeto['aclinkacceso'] = $param['aclinkacceso'];
            $objeto['accantidaddescarga'] = $param['accantidaddescarga'];
            $objeto['accantidadusada'] = $param['accantidadusada'];
            $objeto['acfechainiciocompartir'] = $param['acfechainiciocompartir'];
            $objeto['acefechafincompartir'] = date('Y-m-d H:i:s');
            $objeto['acprotegidoclave'] = $param['acprotegidoclave'];
            }
            $obj = $this->cargarObjeto($objeto);

            if ($obj != null and $obj->modificar()){
                $estado = new AbmArchivoCargadoEstado();
                $obj['acdescripcion'] = $param['motivodelete'];
                $obj['idarchivocargado'] = $obj->getIdArchivoCargado();
                $obj['idusuario'] = $obj->getIdUsuario()->getIdUsuario();

                $respuesta = $estado->dejarCompartir($obj);

                $respuesta = true;
            }
        
        return $respuesta;
    }


    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        $respuesta = false;
        
        if ($this->seteadosCamposClaves($param)){

              // Traemos los datos en un array.
            $obj = $this->cargarObjeto($param);

            if($obj!=null and $obj->modificar()){

                /**
                 * Al modificar el archivo solo se cambia la descripcion del mismo.
                 * No se deja nota de este cambio en ArchivoCargadoEstado en la BD ya que no es un tipo de estado.
                 */
                //$estado = new AbmArchivoCargadoEstado();
                //$respuesta = $estado->modificacion($param);

                $respuesta = true;

            }
        }
        return $respuesta;
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
                $where.=" AND idarchivocargado ='".$param['idarchivocargado']."'";
            if  (isset($param['acnombre']))
                 $where.=" AND acnombre ='".$param['acnombre']."'";
            if  (isset($param['acdescripcion']))
                $where.=" AND acdescripcion ='".$param['acdescripcion']."'";
            if  (isset($param['acicono']))
                 $where.=" AND acicono ='".$param['acicono']."'";
            if  (isset($param['idusuario']))
                 $where.=" AND idusuario ='".$param['idusuario']."'";
            if  (isset($param['aclinkacceso']))
                 $where.=" AND aclinkacceso ='".$param['aclinkacceso']."'";
            if  (isset($param['accantidaddescarga']))
                 $where.=" AND accantidaddescarga ='".$param['accantidaddescarga']."'";
            if  (isset($param['accantidadusada']))
                 $where.=" AND accantidadusada ='".$param['accantidadusada']."'";
            if  (isset($param['acfechainiciocompartir']))
                 $where.=" AND acfechainiciocompartir ='".$param['acfechainiciocompartir']."'";
            if  (isset($param['acefechafincompartir']))
                 $where.=" AND acefechafincompartir ='".$param['acefechafincompartir']."'";
            if  (isset($param['acprotegidoclave']))
                 $where.=" AND acprotegidoclave ='".$param['acprotegidoclave']."'";
        }
        $arreglo = ArchivoCargado::listar($where);  
        return $arreglo;
            
            
      
        
    }
    
}

?>