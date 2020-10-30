<?php 

class ArchivoCargado {
    private $idarchivocargado;
    private $acnombre;
    private $acdescripcion;
    private $acicono;
    private $idusuario;
    private $aclinkacceso;
    private $accantidaddescarga;
    private $accantidadusada;
    private $acfechainiciocompartir;
    private $acefechafincompartir;
    private $acprotegidoclave;
    private $mensajeoperacion;
    
   
    public function __construct(){
        
        $this->idarchivocargado="";
        $this->acnombre="";
        $this->acdescripcion="";
        $this->acicono="";
        $this->idusuario="";
        $this->aclinkacceso="";
        $this->accantidaddescarga="";
        $this->accantidadusada="";
        $this->acfechainiciocompartir="";
        $this->acefechafincompartir="";
        $this->acprotegidoclave="";
        $this->mensajeoperacion ="";
    }
    public function setear($idArchivoCargado, $acNombre, $acDescripcion, $acIcono, $idUsuario, $acLinkAcceso, $acCantidadDescarga, $acCantidadUsada, $acFechaInicioCompartir, $AceFechaFinCompartir, $acProtegidoClave){
        $this->setIdArchivoCargado($idArchivoCargado);
        $this->getAcNombre($acNombre);
        $this->getAcDescripcion($acDescripcion);
        $this->getAcIcono($acIcono);
        $this->setIdUsuario($idUsuario);
        $this->setAcLinkAcceso($acLinkAcceso);
        $this->setAcCantidadDescarga($acCantidadDescarga);
        $this->setAcCantidadUsada($acCantidadUsada);
        $this->setAcFechaInicioCompartir($acFechaInicioCompartir);
        $this->setAceFechaFinCompartir($AceFechaFinCompartir);
        $this->setAcProtegidoClave($acProtegidoClave);
    }
    
    
    
    public function getIdArchivoCargado(){
        return $this->idarchivocargado;
        
    }
    public function setIdArchivoCargado($idArchivoCargado){
        $this->idarchivocargado = $idArchivoCargado;
        
    }
    
    public function getAcNombre(){
        return $this->acnombre;
        
    }
    public function setAcNombre($acNombre){
        $this->acnombre = $acNombre;
        
    }
    public function getAcDescripcion(){
        return $this->acdescripcion;
        
    }
    public function setAcDescripcion($acDescripcion){
        $this->acdescripcion = $acDescripcion;
        
    }

    public function getAcIcono(){
        return $this->acicono;
        
    }
    public function setAcIcono($acIcono){
        $this->acicono = $acIcono;
        
    }

    public function getIdUsuario(){
        return $this->idusuario;
        
    }
    public function setIdUsuario($idUsuario){
        $this->idusuario = $idUsuario;
        
    }

    public function getAcLinkAcceso(){
        return $this->aclinkacceso;
        
    }
    public function setAcLinkAcceso($acLinkAcceso){
        $this->aclinkacceso = $acLinkAcceso;
        
    }

    public function getAcCantidadDescarga(){
        return $this->accantidaddescarga;
        
    }
    public function setAcCantidadDescarga($acCantidadDescarga){
        $this->accantidaddescarga = $acCantidadDescarga;
        
    }


    public function getAcCantidadUsada(){
        return $this->accantidadusada;
        
    }
    public function setAcCantidadUsada($acCantidadUsada){
        $this->accantidadusada = $acCantidadUsada;
        
    }

    public function getAcFechaInicioCompartir(){
        return $this->acfechainiciocompartir;
        
    }
    public function setAcFechaInicioCompartir($acFechaInicioCompartir){
        $this->acfechainiciocompartir = $acFechaInicioCompartir;
        
    }

    public function getAceFechaFinCompartir(){
        return $this->acefechafincompartir;
        
    }
    public function setAceFechaFinCompartir($AceFechaFinCompartir){
        $this->acefechafincompartir = $AceFechaFinCompartir;
        
    }

    public function getAcProtegidoClave(){
        return $this->acprotegidoclave;
        
    }
    public function setAcProtegidoClave($acProtegidoClave){
        $this->acprotegidoclave = $acProtegidoClave;
        
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
        $sql="SELECT * FROM archivocargado WHERE id = ".$this->getIdArchivoCargado();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idarchivocargado'], $row['acnombre'], $row['acdescripcion'], $row['acicono'], $row['idusuario'], $row['aclinkacceso'], $row['accantidaddescarga'], $row['accantidadusada'], $row['acfechainiciocompartir'], $row['acefechafincompartir'], $row['acprotegidoclave']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Auto->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO archivocargado(idarchivocargado, acnombre, acdescripcion, acicono, idusuario, aclinkacceso, accantidaddescarga, accantidadusada, acfechainiciocompartir, acefechafincompartir, acprotegidoclave) VALUES('".$this->getIdArchivoCargado()."', '".$this->getAcNombre()."', '".$this->getAcDescripcion()."', '".$this->getAcIcono()."', '".$this->getIdUsuario()."', '".$this->getAcLinkAcceso()."', '".$this->getAcCantidadDescarga()."', '".$this->getAcCantidadUsada()."', '".$this->getAcFechaInicioCompartir()."', '".$this->getAceFechaFinCompartir()."', '".$this->getAcProtegidoClave()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdArchivoCargado($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Auto->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Auto->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE archivocargado SET idarchivocargado='".$this->getIdArchivoCargado()."', acnombre='".$this->getAcNombre()."', acdescripcion='".$this->getAcDescripcion()."', acicono='".$this->getAcIcono()."', idusuario='".$this->getIdUsuario()."', aclinkacceso='".$this->getAcLinkAcceso()."', accantidaddescarga='".$this->getAcCantidadDescarga()."', accantidadusada='".$this->getAcCantidadUsada()."', acfechainiciocompartir='".$this->getAcFechaInicioCompartir()."', acefechafincompartir='".$this->getAceFechaFinCompartir()."', acprotegidoclave='".$this->getAcProtegidoClave()."',  WHERE idarchivocargado=".$this->getIdArchivoCargado();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Auto->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Auto->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM archivocargado WHERE idarchivocargado=".$this->getIdArchivoCargado();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Auto->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Auto->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM archivocargado ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj = new ArchivoCargado();
                    $obj->setear($row['idarchivocargado'], $row['acnombre'], $row['acdescripcion'], $row['acicono'], $row['idusuario'], $row['aclinkacceso'], $row['accantidaddescarga'], $row['accantidadusada'], $row['acfechainiciocompartir'], $row['acefechafincompartir'], $row['acprotegidoclave']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setmensajeoperacion("archivocargado->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
}


?>