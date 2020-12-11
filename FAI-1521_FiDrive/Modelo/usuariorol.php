<?php 
class UsuarioRol {
    private $idusuario;
    private $idrol;
    private $mensajeoperacion;
    
   
    public function __construct(){
        
        $this->idusuario= new Usuario();
        $this->idrol= new Rol(); 
        $this->mensajeoperacion ="";
    }
    public function setear($idusuario, $idrol)    {
        $this->setIdUsuario($idusuario);
        $this->setIdRol($idrol);
 
    }
    
    public function getIdUsuario(){
        return $this->idusuario;
        
    }
    public function setIdUsuario($idusuario){
        $this->idusuario = $idusuario;
        
    }
    
    public function getIdRol(){
        return $this->idrol;

    }
    public function setIdRol($idrol){
        $this->idrol = $idrol;
        
    }
    
    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
        
    }

    public function setmensajeoperacion($msj){
        $this->mensajeoperacion = $msj;
        
    }
    
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM usuariorol WHERE idusuario = ".$this->getIdUsuario()." and idrol = ".$this->getIdRol();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();

                 
                
                    $usuario = NULL; 
                    if ($row['idusuario'] != null) { 
                        $usuario = new Usuario(); 
                        $usuario->setIdusuario($row['idusuario']); 
                        $usuario->cargar(); 
                    }

                    $rol = NULL; 
                    if ($row['idrol'] != null) { 
                        $rol = new Rol(); 
                        $rol->setIdRol($row['idrol  ']); 
                        $rol->cargar(); 
                    }


                    $this->setear($usuario, $rol);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO usuariorol(idusuario, idrol)  VALUES('".$this->getIdUsuario()->getIdUsuario()."', '".$this->getIdRol()->getIdRol()."');";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    /**
    *  NO SE UTILIZA, YA ES ESTO SON PRIMARY KEY DE OBJETOS EN OTRAS TABLAS.
    *
    *   public function modificar(){
    *       $resp = false;
    *       $base=new BaseDatos();
    *       $sql="UPDATE usuariorol SET idusuario='".$this->getIdUsuario."', idrol='".$this->getIdRol()."' WHERE idusuario=".$this->getIdUsuario()." and  idrol=".$this->getIdRol();
    *       if ($base->Iniciar()) {
    *           if ($base->Ejecutar($sql)) {
    *               $resp = true;
    *           } else {
    *               $this->setmensajeoperacion("Tabla->modificar: ".$base->getError());
    *           }
    *       } else {
    *           $this->setmensajeoperacion("Tabla->modificar: ".$base->getError());
    *       }
    *       return $resp;
    *   }
    */
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE * FROM usuariorol WHERE idusuario = ".$this->getIdUsuario()." and idrol = ".$this->getIdRol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Tabla->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->eliminar: ".$base->getError());
        }
        return $resp;
    }

    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM usuariorol  ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj = new UsuarioRol();

                    $usuario = new Usuario(); 
                    $usuario->setIdusuario($row['idusuario']); 
                    $usuario->cargar(); 

                    $rol = new Rol(); 
                    $rol->setIdRol($row['idrol']); 
                    $rol->cargar(); 

                $obj->setear($usuario,$rol);
                array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
}


?>