<?php 
class ArchivoCargadoEstado {
    private $idarchivocargadoestado;
    private $idestadotipos;
    private $acedescripcion;
    private $idusuario;
    private $acefechaingreso;
    private $acefechafin;
    private $idarchivocargado;
    private $mensajeoperacion;
    
   
    public function __construct(){
        
        $this->idarchivocargadoestado="";
        $this->idestadotipos="";
        $this->acedescripcion="";
        $this->idusuario="";
        $this->acefechaingreso="";
        $this->acefechafin="";
        $this->idarchivocargado="";
        $this->mensajeoperacion ="";
    }
    public function setear($idArchivoCargadoEstado, $idEstadoTipos, $aceDescripcion, $idUsuario, $aceFechaIngreso, $aceFechaFin, $idArchivoCargado)    {
        $this->setIdArchivoCargadoEstado($idArchivoCargadoEstado);
        $this->setIdEstadoTipos($idEstadoTipos);
        $this->setAceDescripcion($aceDescripcion);
        $this->setIdUsuario($idUsuario);
        $this->setAceFechaIngreso($aceFechaIngreso);
        $this->setAceFechaFin($aceFechaFin);
        $this->setAceFechaFin($idArchivoCargado);
    }
    
    
    
    public function getIdArchivoCargadoEstado(){
        return $this->idarchivocargadoestado;
        
    }
    public function setIdArchivoCargadoEstado($idArchivoCargadoEstado){
        $this->idarchivocargadoestado = $idArchivoCargadoEstado;
        
    }
    
    public function getIdEstadoTipos(){
        return $this->idestadotipos;
        
    }
    public function setIdEstadoTipos($idEstadoTipos){
        $this->idestadotipos = $idEstadoTipos;
        
    }
    public function getAceDescripcion(){
        return $this->acedescripcion;
        
    }
    public function setAceDescripcion($aceDescripcion){
        $this->acedescripcion = $aceDescripcion;
        
    }

    public function getIdUsuario(){
        return $this->idusuario;
        
    }
    public function setIdUsuario($idUsuario){
        $this->idusuario = $idUsuario;
        
    }

    public function getAceFechaIngreso(){
        return $this->acefechaingreso;
        
    }
    public function setAceFechaIngreso($aceFechaIngreso){
        $this->acefechaingreso = $aceFechaIngreso;
        
    }

    public function getIdArchivocargado(){
        return $this->acefechafin;
        
    }
    public function setIdArchivocargado($aceFechaFin){
        $this->acefechafin = $aceFechaFin;
        
    }

    public function getAceFechaFin(){
        return $this->idarchivocargado;
        
    }
    public function setAceFechaFin($idArchivoCargado){
        $this->idarchivocargado = $idArchivoCargado;
        
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
        $sql="SELECT * FROM archivocargadoestado WHERE archivocargadoestado = ".$this->getIdArchivoCargadoEstado();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['archivocargadoestado'], $row['idestadotipos'], $row['acedescripcion'], $row['idusuario'], $row['acefechaingreso'], $row['acefechafin'], $row['idarchivocargado']);
                    
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
        $sql="INSERT INTO archivocargadoestado(idarchivocargadoestado, idestadotipos, acedescripcion, idusuario, acefechaingreso, acefechafin, idarchivocargado)  VALUES('".$this->getIdArchivoCargadoEstado()."','".$this->getIdEstadoTipos()."','".$this->getAceDescripcion()."','".$this->getIdUsuario()."','".$this->getAceFechaIngreso()."','".$this->getAceFechaFin()."','".$this->getIdArchivocargado()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdArchivoCargadoEstado($elid);
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
        $sql="UPDATE archivocargadoestado SET idarchivocargadoestado='".$this->getIdArchivoCargadoEstado()."', idestadotipos='".$this->getIdEstadoTipos()."', acedescripcion='".$this->getAceDescripcion()."', idusuario='".$this->getIdUsuario()."', acefechaingreso='".$this->getAceFechaIngreso()."', acefechafin='".$this->getAceFechaFin()."', idarchivocargado='".$this->getIdArchivocargado()."' WHERE idarchivocargadoestado=".$this->getIdArchivoCargadoEstado();
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
        $sql="DELETE FROM archivocargadoestado WHERE idarchivocargadoestado=".$this->getIdArchivoCargadoEstado();
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
        $sql="SELECT * FROM archivocargadoestado ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new ArchivoCargadoEstado();
                    $obj->setear($row['archivocargadoestado'], $row['idestadotipos'], $row['acedescripcion'], $row['idusuario'], $row['acefechaingreso'], $row['acefechafin'], $row['idarchivocargado']);
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