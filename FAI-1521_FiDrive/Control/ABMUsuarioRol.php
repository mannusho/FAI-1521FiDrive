<?php


    //Para acciones.php
    include_once('../../Modelo/conector/BaseDatos.php');

    include_once('../../Modelo/usuario.php'); 
    include_once('../../Modelo/rol.php'); 
    include_once('../../Modelo/usuariorol.php'); 





class AbmUsuarioRol {
     //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    // Para esta clase solo necesitamos en cargar y buscar ya que los valores son por defectos
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return UsuarioRol
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if(array_key_exists('idusuario',$param) and array_key_exists('idrol',$param)){
            $usuario = new Usuario();
            $usuario->setIdUsuario($param['idusuario']); 
            $usuario->cargar();

            $rol = new Rol();
            $rol->setIdRol($param['idrol']); 
            $rol->cargar();

            $obj = new UsuarioRol();

            $obj->setear($usuario, $rol);
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return UsuarioRol
     */
    private function cargarObjetoConClave($param){
        $obj = null;    
        if(isset($param['idusuario']) && isset($param['idrol']) ){
            $obj = new UsuarioRol();
            $obj->setear(($param['idusuario']), $param['idrol']) ;
            $obj->cargar();
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
        if (isset($param['idusuario']) && isset($param['idrol'])){
            $resp = true; 
        }
        return $resp;
    }
    
    public function alta($datos)
    {
        $respuesta = false;
        // Traemos los datos en un array.
        
        $obj = $this->cargarObjeto($datos);

        if ($obj != null && $obj->insertar()) {
    
            $respuesta = true;

        }
        return $respuesta;
    }

    public function baja($datos)
    {
        $respuesta = false;
        // Traemos los datos en un array.
        if ($this->seteadosCamposClaves($datos)){
            $obj = $this->cargarObjetoConClave($datos);
            if ($obj != null && $obj->modificar()) {
        
                $respuesta = true;

            }
        }
        return $respuesta;
    }

    

     /* permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param){
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['idusuario']))
                $where.=" and idusuario =".$param['idusuario'];
            if  (isset($param['idrol']))
                $where.=" and idrol =".$param['idrol'];
        }
        $arreglo = UsuarioRol::listar($where);  
        return $arreglo;
    }

    public function mostrarUsuarios(){
        $obj = new UsuarioRol;
        $objeto = $obj->listar("");
        $arrayMostrar = array();

        foreach ($objeto as $objetitos){
           $usuario = $objetitos->getIdUsuario();
           $rol = $objetitos->getIdRol();

            $array = ['idusuario' => $usuario->getIdUsuario(), 'usnombre' => $usuario->getUsNombre(), 'usapellido' => $usuario->getUsApellido(), 'uslogin' => $usuario->getUsLogin(), 'roldescripcion' => $rol->getRolDescripcion(), 'usactivo' => $usuario->getUsActivo()];
            
            array_push($arrayMostrar,$array);

        }

        return $arrayMostrar;
    }
}
?>