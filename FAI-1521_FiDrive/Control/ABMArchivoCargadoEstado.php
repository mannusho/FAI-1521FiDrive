<?php


    //Para acciones.php
    include_once('../../Modelo/conector/BaseDatos.php');

    include_once('../../Modelo/archivocargadoestado.php'); 
    

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

            $estadoTipos = new EstadoTipos();
            $estadoTipos->setIdEstadoTipos($param['idestadotipos']); 
            $estadoTipos->cargar();

            $usuario = new Usuario();
            $usuario->setIdUsuario($param['idusuario']); 
            $usuario->cargar();

            $archivoCargado = new ArchivoCargado();
            $archivoCargado->setIdArchivoCargado($param['idarchivocargado']); 
            $archivoCargado->cargar();


            $obj->setear($param['idarchivocargadoestado'], $estadoTipos, $param['acedescripcion'], $usuario, $param['acefechaingreso'], $param['acefechafin'], $archivoCargado);
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

            $obj->setear($param['idarchivocargadoestado'], null, null, null, null, null, null);
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
        $respuesta = false;
        if (isset($param['idarchivocargadoestado']))
            $respuesta = true;
        return $respuesta;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        
        $respuesta = false;

        $objABMACE['idarchivocargadoestado'] = 1; // Es autoincrementables asi que los dejamos asi

        $objABMACE['idestadotipos'] = 1; // CARGADO

        $objABMACE['acedescripcion'] = "Archivo cargado en la base de datos";

        $objABMACE['idusuario'] = $param['idusuario'];

        $objABMACE['acefechaingreso'] = date('Y-m-d H:i:s'); // La fecha de hoy

        $objABMACE['acefechafin'] = "0000-00-00 00:00:00"; // Fecha nula

        $objABMACE['idarchivocargado'] = $param['idarchivocargado'];

        $obj = $this->cargarObjeto($objABMACE);

        if ($obj != null && $obj->insertar()) {
            
            $respuesta = true;
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

        // Primero modificamos la fecha fin de la entrada anterior que corresponda a este ID
        // Se indica que ya la entrada anterior finalizo y ahora el archivo pasa a otro estado.

        $modificado = $this->modificacion($param);
        
        // Ahora armamos un array para insertar la nueva entrada indicando que el archivo pasa a estado eliminado.

        $objABMACE['idarchivocargadoestado'] = 1; // Es autoincrementables asi que los dejamos asi

        $objABMACE['idestadotipos'] = 4; // ELIMINADO

        $objABMACE['acedescripcion'] = "Motivo: ".$param['acdescripcion']; // Motivo que ingreso el usuario de porque se elimino el archivo.

        $objABMACE['idusuario'] = $param['idusuario'];

        $objABMACE['acefechaingreso'] = date('Y-m-d H:i:s'); // La fecha de hoy

        $objABMACE['acefechafin'] = "0000-00-00 00:00:00"; // Fecha nula

        $objABMACE['idarchivocargado'] = $param['idarchivocargado'];


        if ($this->seteadosCamposClaves($objABMACE)){

            $obj = $this->cargarObjeto($objABMACE);
    
            if ($obj!=null and $modificado == true and $obj->insertar()){

                $respuesta = true;
            }
        }
        
        return $respuesta;
    }

     /**
     * 
     * @param array $param
     */
    public function compartir($param){
        
        $respuesta = false;

        // Primero modificamos la fecha fin de la entrada anterior que corresponda a este ID
        // Se indica que ya la entrada anterior finalizo y ahora el archivo pasa a otro estado.

        $modificado = $this->modificacion($param);
        
        // Ahora armamos un array para insertar la nueva entrada indicando que el archivo pasa a estado compartido.

        $objABMACE['idarchivocargadoestado'] = 1; // Es autoincrementables asi que los dejamos asi

        $objABMACE['idestadotipos'] = 2; // COMPARTIDO

        $objABMACE['acedescripcion'] = "Archivo compartido en la base de datos";

        $objABMACE['idusuario'] = $param['idusuario'];

        $objABMACE['acefechaingreso'] = date('Y-m-d H:i:s'); // La fecha de hoy

        $objABMACE['acefechafin'] = "0000-00-00 00:00:00"; // Fecha nula

        $objABMACE['idarchivocargado'] = $param['idarchivocargado'];

        $obj = $this->cargarObjeto($objABMACE);

        if ($obj!=null and $modificado == true and $obj->insertar()){
            
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

        $objeto = new AbmArchivoCargadoEstado();
        $arreglo = $objeto->buscar("");
        
        foreach($arreglo as $objetitos){
            if($objetitos->getIdArchivoCargado() == $param['idarchivocargado']){
                $idACE = $objetitos->getIdArchivoCargadoEstado();
                $estadoTipos = $objetitos->getIdEstadoTipos();
                $descripcion = $objetitos->getAceDescripcion();
                $usuario = $objetitos->getIdUsuario();
                $fechaInicio = $objetitos->getAceFechaIngreso();
                $idAC = $objetitos->getIdArchivocargado();
            }
        }

        // Cambiando la fecha de fin al estado anterior;
            $objABMACE['idarchivocargadoestado'] = $idACE;
            if(isset($param['dejarCompartir'])){
                if($param['dejarCompartir'] == 1){
                    // Cambia el estado a CARGADO de nuevo
                    $objABMACE['idestadotipos'] = 1;
                }
            } else {
                $objABMACE['idestadotipos'] = $estadoTipos;
            }
            $objABMACE['acedescripcion'] = $descripcion;
            $objABMACE['idusuario'] = $usuario;
            $objABMACE['acefechaingreso'] = $fechaInicio;
            $objABMACE['acefechafin'] = date('Y-m-d H:i:s'); // La fecha de hoy
            $objABMACE['idarchivocargado'] = $idAC;

        if ($this->seteadosCamposClaves($objABMACE)){

            $obj = $this->cargarObjeto($objABMACE);


            if($obj!=null and $obj->modificar()){
                $respuesta = true;
            }
        }
        return $respuesta;
    }

    public function dejarCompartir($param){
        
        $respuesta = false;
        // Primero modificamos la fecha fin de la entrada anterior que corresponda a este ID
        // Se indica que ya la entrada anterior finalizo y ahora el archivo pasa a otro estado.    

        $modificado = $this->modificacion($param);
        
        // Ahora armamos un array para insertar la nueva entrada indicando que el archivo pasa a estado compartido.

        $objABMACE['idarchivocargadoestado'] = 1; // Es autoincrementables asi que los dejamos asi

        $objABMACE['idestadotipos'] = 3; // NO COMPARTIDO

        $objABMACE['acedescripcion'] = "Motivo: ".$param['acedescripcion']; // Motivo que ingreso el usuario de porque se dejo de compartir el archivo.

        $objABMACE['idusuario'] = $param['idusuario'];

        $objABMACE['acefechaingreso'] = date('Y-m-d H:i:s'); // La fecha de hoy

        $objABMACE['acefechafin'] = "0000-00-00 00:00:00"; // Fecha nula

        $objABMACE['idarchivocargado'] = $param['idarchivocargado'];

        $obj = $this->cargarObjeto($objABMACE);

        if ($obj!=null and $modificado == true and $obj->insertar()){
            
            $respuesta = true;
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
    /**
     * arma un arreglo para mostrar los archivos que corresponda mostrar segun los ID que reciben.
     * @param array $id
     * @return array
     */ 
        public function MostrarContenido($id){
            $lista = $this->buscar(null);
            $arrayACE = array();
            $arrayAMostrar = array();

               foreach ($lista as $archivo){
                   if(($archivo->getIdEstadoTipos() == $id[0] && $archivo->getAceFechaFin()== "0000-00-00 00:00:00") ||
                      ($archivo->getIdEstadoTipos() == $id[1] && $archivo->getAceFechaFin()== "0000-00-00 00:00:00") ||
                      ($archivo->getIdEstadoTipos() == $id[2] && $archivo->getAceFechaFin()== "0000-00-00 00:00:00")){
                       array_push($arrayACE,$archivo);                       
                   }

               }
                //Si hay archivos en esa condición
                if (count($arrayACE) > 0) {

                   $objABMAC = new AbmArchivoCargado();
                   $list = $objABMAC->buscar(null);
       
                   foreach ($list as $objArchivo) {                   
                        for ($i=0; $i < count($arrayACE); $i++) { 
                            if ($objArchivo->getIdArchivoCargado() == $arrayACE[$i]->getIdArchivoCargado()){
                                array_push($arrayAMostrar,$objArchivo);                       
                            }
                        }
                    }
                }
            return $arrayAMostrar;
        }

        public function MostrarCompartidos($id){
            $lista = $this->buscar(null);
            $arrayACE = array();
            $arrayAMostrar = array();

               foreach ($lista as $archivo){
                   if(($archivo->getIdEstadoTipos() == $id[0] && $archivo->getAceFechaFin()== "0000-00-00 00:00:00")){
                       array_push($arrayACE,$archivo);                       
                   }

               }
                /*Si hay archivos en esa condición */
                if (count($arrayACE) > 0) { 
                   $objABMAC = new AbmArchivoCargado();
                   $list = $objABMAC->buscar(null);
       
                   foreach ($list as $objArchivo) {                   
                        for ($i=0; $i < count($arrayACE); $i++) { 
                            if ($objArchivo->getIdArchivoCargado() == $arrayACE[$i]->getIdArchivoCargado()){
                                array_push($arrayAMostrar,$objArchivo);                       
                            }
                        }
                    }
                }
            return $arrayAMostrar;
        }

}

?>