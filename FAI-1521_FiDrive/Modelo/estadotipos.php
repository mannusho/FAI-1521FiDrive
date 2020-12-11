<?php 
class EstadoTipos {
    private $idestadotipos;
    private $etdescripcion;
    private $etactivo;
    private $mensajeoperacion;
    
   
    public function __construct(){
        
        $this->idestadotipos="";
        $this->etdescripcion=""; 
        $this->etactivo= 1; // Como el valor es siempre el mismo, lo dejamos asi.
        $this->mensajeoperacion ="";
    }
    public function setear($idEstadoTipos, $etDescripcion, $etActivo)    {
        $this->setIdEstadoTipos($idEstadoTipos);
        $this->setEtDescripcion($etDescripcion);
        $this->setEtActivo($etActivo);
 
    }
    
    public function getIdEstadoTipos(){
        return $this->idestadotipos;
        
    }
    public function setIdEstadoTipos($idEstadoTipos){
        $this->idestadotipos = $idEstadoTipos;
        
    }
    
    public function getEtDescripcion(){
        return $this->etdescripcion;
        
    }
    public function setEtDescripcion($etDescripcion){
        $this->etdescripcion = $etDescripcion;
        
    }
    public function getEtActivo(){
        return $this->etactivo;
        
    }
    public function setEtActivo($etActivo){
        $this->etactivo = $etActivo;
        
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
        $sql="SELECT * FROM estadotipos WHERE idestadotipos = ".$this->getIdEstadoTipos();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idestadotipos'], $row['etdescripcion'], $row['etactivo']);
                    
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
        $sql="INSERT INTO estadotipos( etdescripcion, etactivo)  VALUES('".$this->getEtDescripcion()."','".$this->getEtActivo()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdEstadoTipos($elid);
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
        $sql="UPDATE estadotipos SET idestadotipos='".$this->getIdEstadoTipos()."', etdescripcion='".$this->getEtDescripcion()."', etactivo='".$this->getEtActivo()."' WHERE idestadotipos=".$this->getIdEstadoTipos();
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
        $sql="DELETE FROM estadotipos WHERE idestadotipos=".$this->getIdEstadoTipos();
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
        $sql="SELECT * FROM estadotipos  ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new EstadoTipos();
                    $obj->setear($row['idestadotipos'], $row['etdescripcion'], $row['etactivo']);
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