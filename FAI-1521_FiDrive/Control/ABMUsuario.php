<?php


    //Para acciones.php
    include_once('../../Modelo/conector/BaseDatos.php');

    include_once('../../Modelo/usuario.php'); 

    include_once('ABMUsuarioRol.php');




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
     * @return Usuario
     */
    private function cargarObjetoConClave($param){
        $obj = null;    
        if( isset($param['idusuario']) ){
            $obj = new Usuario();
            $obj->setear($param['idusuario'], null, null, null, null, null);
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
        if (isset($param['idusuario'])){
            $resp = true;
        }
        return $resp;
    }
    
    public function alta($datos)
    {
        $respuesta = false;
        // Traemos los datos en un array.
        $objeto['idusuario'] = 1;
        $objeto['usnombre'] = $datos['usnombre'];
        $objeto['usapellido'] = $datos['usapellido'];
        $objeto['uslogin'] = $datos['uslogin'];
        $objeto['usclave'] = base64_encode($datos['usclave']);
        $objeto['usactivo'] = 1;
        
        $obj = $this->cargarObjeto($objeto);

        if ($obj != null && $obj->insertar()) {
    
            $respuesta = true;

        }
        return $respuesta;
    }


    public function baja($datos)
    {
        $respuesta = false;
        // Traemos los datos en un array.
        $obj = $this->cargarObjetoConClave($datos);
        $obj->setUsActivo(0);
        if ($obj != null && $obj->modificar()) {
    
            $respuesta = true;

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


    //// -- Registro y Login -- ////

    // Verifica que no haya un mismo usuario con el nombre de usuario que se de sea registrar.
    // Tambien se utiliza para verificar que el usuario que se loguea existe en la base de datos.
    private function verificarUsuario($param){
        $obj = new Usuario;
        $usuarios = $obj->listar("");
        $respuesta = true;
        $i = 0;
        $flag = true;
        while($flag == true && $i < count($usuarios)){
            if($usuarios[$i]->getUsLogin() == $param){
                $flag = false;
                $respuesta = false;
            }
            $i++;
        }
        return $respuesta;
    }

    public function registrarUsuario($datos){

        $respuesta = false;

        $param = $datos['uslogin'];

        if($this->verificarUsuario($param)){
            // damos el alta usuario
            $altaUsuario = $this->alta($datos);

            // buscamos todos los usuarios registrado para saber cuales el id del ultimo.
            $obj = new Usuario();
            $usuarios = $obj->listar("");
            foreach ($usuarios as $objetitos) {
                $id = $objetitos->getIdUsuario();
            }
            // Le agregamos el rol de visitante al ultimo usuario registrado
            $usuarioRol = new AbmUsuarioRol();
            $datosUsRol = ['idrol'=>3,'idusuario'=> $id];
            $altaRol = $usuarioRol->alta($datosUsRol);

            if($altaUsuario == true && $altaRol == true){
                $respuesta = true;
            }
        }
        
        return $respuesta;
    }

    private function usuarioActivo($param){
            $obj = new Usuario;
            $usuarios = $obj->listar("");
            $respuesta = false;
            $i = 0;
            $flag = true;
            while($flag == false && $i < count($usuarios)){
                if($usuarios[$i]->getUsLogin() == $param){
                    if($usuarios[$i]->getUsActivo() == 1){
                        ECHO "PASO PASO PASO";
                        $flag = true;
                        $respuesta = true;
                    }
                }
                $i++;
            }
            return $respuesta;
    }


    public function loguearUsuario($datos){

        $respuesta = false;

        $paramL = $datos['uslogin'];
        $paramC = $datos['usclave'];

        if(!$this->verificarUsuario($paramL)){
            //if($this->usuarioActivo($paramL)){
                // buscamos el usuario que se loguea
                $usuarios = $this->buscar($paramL);

                $i = 0;
                $flag = true;
                while($flag == true && $i < count($usuarios)){
                    if($usuarios[$i]->getUsLogin() == $paramL){
                        $flag = false;
                        $usuarioL = $usuarios[$i];
                    }
                    $i++;
                }

                $usuario = $usuarioL->getUsLogin();
                $clave = $usuarioL->getUsClave();

                if($usuarioL != null){
                    if($usuario == $paramL && base64_decode($clave) == $paramC){
                        $usuarioRol = new AbmUsuarioRol();
                        $datosUR = $usuarioRol->buscar($usuarioL->getIdUsuario());
                        $roles = array();

                        foreach($datosUR as $datitos){
                            if($datitos->getIdUsuario()->getIdUsuario() == $usuarioL->getIdUsuario()){
                                $rol = $datitos->getIdRol()->getIdRol();
                            }
                        }

                        // junto los datos para iniciar sesion

                        $datosSesion = array(
                            'idusuario' => $usuarioL->getIdUsuario(),
                            'idrol' => $rol,
                            'login' => $usuarioL->getUsLogin(),
                            'nombre' => $usuarioL->getUsNombre(),
                            'apellido' => $usuarioL->getUsApellido()
                        );

                        // Se crea la sesion
                        $sesion = new Session();

                        if($sesion->iniciar($datosSesion))
                        {
                            $respuesta = true;
                        };

                    }
                
                }
            //}
        }
        
        return $respuesta;
    }
}
?>