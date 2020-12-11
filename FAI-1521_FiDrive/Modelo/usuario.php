<?php 
class Usuario {
    private $idusuario;
    private $usnombre;
    private $usapellido;
    private $uslogin;
    private $usclave;
    private $usactivo;
    private $mensajeoperacion;
    
   
    public function __construct(){
        
        $this->idusuario="";
        $this->usnombre="";
        $this->usapellido="";
        $this->uslogin="";
        $this->usclave="";
        $this->usactivo="";
        $this->mensajeoperacion ="";
    }
    public function setear($idUsuario, $usNombre, $usApellido, $usLogin, $usClave, $usActivo)    {
        $this->setIdUsuario($idUsuario);
        $this->setUsNombre($usNombre);
        $this->setUsApellido($usApellido);
        $this->setUsLogin($usLogin);
        $this->setUsClave($usClave);
        $this->setUsActivo($usActivo);
    }
    
    public function getIdUsuario(){
        return $this->idusuario;
        
    }
    public function setIdUsuario($idUsuario){
        $this->idusuario = $idUsuario;
        
    }
    
    public function getUsNombre(){
        return $this->usnombre;
        
    }
    public function setUsNombre($usNombre){
        $this->usnombre = $usNombre;
        
    }
    
    public function getUsApellido(){
        return $this->usapellido;
        
    }
    public function setUsApellido($usApellido){
        $this->usapellido = $usApellido;
        
    }
    public function getUsLogin(){
        return $this->uslogin;
        
    }
    public function setUsLogin($usLogin){
        $this->uslogin = $usLogin;    
    }

    public function getUsClave(){
        return $this->usclave;
        
    }
    public function setUsClave($usClave){
        $this->usclave = $usClave;
        
    }

    public function getUsActivo(){
        return $this->usactivo;
        
    }
    public function setUsActivo($usActivo){
        $this->usactivo = $usActivo;
        
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
        $sql="SELECT * FROM usuario WHERE idusuario = ".$this->getIdUsuario();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idusuario'], $row['usnombre'], $row['usapellido'], $row['uslogin'], $row['usclave'], $row['usactivo']);
                    
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
        $sql="INSERT INTO usuario( usnombre, usapellido, uslogin, usclave, usactivo)  VALUES('".$this->getUsNombre()."','".$this->getUsApellido()."','".$this->getUsLogin()."','".$this->getUsClave()."','".$this->getUsActivo()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdUsuario($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE usuario SET idusuario='".$this->getIdUsuario()."', usnombre='".$this->getUsNombre()."', usapellido='".$this->getUsApellido()."', uslogin='".$this->getUsLogin()."', usclave='".$this->getUsClave()."', usactivo='".$this->getUsActivo()."' WHERE idusuario=".$this->getIdUsuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM usuario WHERE idusuario=".$this->getIdUsuario();
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
        $sql="SELECT * FROM usuario ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new Usuario();
                    $obj->setear($row['idusuario'], $row['usnombre'], $row['usapellido'], $row['uslogin'], $row['usclave'], $row['usactivo']);
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