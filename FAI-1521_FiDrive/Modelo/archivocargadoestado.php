<?php 

include_once("estadotipos.php");
include_once("usuario.php");
include_once("archivocargado.php");

class ArchivoCargadoEstado {

    // NOTA: si es un id, es porque entra un objeto.

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
        $this->idestadotipos= new EstadoTipos();
        $this->acedescripcion="";
        $this->idusuario= new Usuario();
        $this->acefechaingreso="";
        $this->acefechafin="";
        $this->idarchivocargado= new ArchivoCargado();
        $this->mensajeoperacion ="";
    }
    public function setear($idArchivoCargadoEstado, $idEstadoTipos, $aceDescripcion, $idUsuario, $aceFechaIngreso, $aceFechaFin, $idArchivoCargado)    {
        $this->setIdArchivoCargadoEstado($idArchivoCargadoEstado);
        $this->setIdEstadoTipos($idEstadoTipos);
        $this->setAceDescripcion($aceDescripcion);
        $this->setIdUsuario($idUsuario);
        $this->setAceFechaIngreso($aceFechaIngreso);
        $this->setAceFechaFin($aceFechaFin);
        $this->setIdArchivocargado($idArchivoCargado);
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
        return $this->idarchivocargado;
        
    }
    public function setIdArchivocargado($idArchivoCargado){
        $this->idarchivocargado = $idArchivoCargado;
        
    }

    public function getAceFechaFin(){
        return $this->acefechafin;
        
    }
    public function setAceFechaFin($aceFechaFin){
        $this->acefechafin = $aceFechaFin;
        
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

                    $estadoTipos = NULL; 
                    if ($row['idestadotipos'] != null) { 
                        $estadoTipos = new EstadoTipos(); 
                        $estadoTipos->setIdEstadoTipos($row['idestadotipos']); 
                        $estadoTipos->cargar(); 
                    }
                
                    $usuario = NULL; 
                    if ($row['idusuario'] != null) { 
                        $usuario = new Usuario(); 
                        $usuario->setIdusuario($row['idusuario']); 
                        $usuario->cargar(); 
                    }

                    $archivoCargado = NULL; 
                    if ($row['idarchivocargado'] != null) { 
                        $archivoCargado = new ArchivoCargado();
                        $archivoCargado->setIdArchivoCargado($row['idarchivocargado']); 
                        $archivoCargado->cargar(); 
                    }


                    $this->setear($row['idarchivocargadoestado'], $estadoTipos->getIdEstadoTipos(), $row['acedescripcion'], $usuario->getIdUsuario(), $row['acefechaingreso'], $row['acefechafin'], $archivoCargado->getIdArchivoCargado());
                    
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
        $sql="INSERT INTO archivocargadoestado(idestadotipos, acedescripcion,
         idusuario, acefechaingreso, acefechafin, idarchivocargado)  
         VALUES('".$this->getIdEstadoTipos()->getIdEstadoTipos()."',
         '".$this->getAceDescripcion()."','".$this->getIdUsuario()->getIdUsuario()."','".$this->getAceFechaIngreso()."',
         '".$this->getAceFechaFin()."','".$this->getIdArchivocargado()->getIdArchivoCargado()."');";
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
        $sql="UPDATE archivocargadoestado SET idestadotipos='".$this->getIdEstadoTipos()->getIdEstadoTipos()."',
         acedescripcion='".$this->getAceDescripcion()."',
          idusuario='".$this->getIdUsuario()->getIdUsuario()."',
           acefechaingreso='".$this->getAceFechaIngreso()."',
           acefechafin='".$this->getAceFechaFin()."',
            idarchivocargado='".$this->getIdArchivocargado()->getIdArchivoCargado()."' 
            WHERE idarchivocargadoestado='".$this->getIdArchivoCargadoEstado()."'";
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

                    $estadoTipos = NULL; 
                    if ($row['idestadotipos'] != null) { 
                        $estadoTipos = new EstadoTipos(); 
                        $estadoTipos->setIdEstadoTipos($row['idestadotipos']); 
                        $estadoTipos->cargar(); 
                    }
                
                    $usuario = NULL; 
                    if ($row['idusuario'] != null) { 
                        $usuario = new Usuario(); 
                        $usuario->setIdusuario($row['idusuario']); 
                        $usuario->cargar(); 
                    }

                    $archivoCargado = NULL; 
                    if ($row['idarchivocargado'] != null) { 
                        $archivoCargado = new ArchivoCargado();
                        $archivoCargado->setIdArchivoCargado($row['idarchivocargado']); 
                        $archivoCargado->cargar(); 
                    }


                    $obj->setear($row['idarchivocargadoestado'], $estadoTipos->getIdEstadoTipos(), $row['acedescripcion'], $usuario->getIdUsuario(), $row['acefechaingreso'], $row['acefechafin'], $archivoCargado->getIdArchivoCargado());

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