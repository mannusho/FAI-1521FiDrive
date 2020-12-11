
<?php 


Class Session {

    public function __construct()
	{
		session_start();
	}


    // Inicia una sesion
	public function iniciar($param)
	{   
		print_r($param);

        $_SESSION['idusuario'] = $param['idusuario'];
        $_SESSION['idrol'] = $param['idrol'];
		$_SESSION['login'] = $param['login'];
		$_SESSION['nombre'] = $param['nombre'];
		$_SESSION['apellido'] = $param['apellido'];
    }

	// Funcion para saber si la sesion esta activa o no
    public function activa()
	{
		$resp = false;
		if (isset($_SESSION['login'])) {
			$resp = true;
		}
		return $resp;
	}
    

    // Verifica si el rol es de administrador.
    // Utilizado para dar permisos a ciertas partes de la pagina.

    public function rolAdministrador()
	{
		$respuesta = false;
            if($_SESSION['idrol'] == 1){
                $respuesta = true;
            }
		return $respuesta;
    }

    public function getIdUsuario()
	{
		return $_SESSION['idusuario'];
	}

	public function getIdRol()
	{
		return $_SESSION['idrol'];
	}


	public function getUsLogin()
	{
		return $_SESSION['login'];
	}
    
    
	public function getUsNombre()
	{
		return $_SESSION['nombre'];
	}


	public function getUsApellido()
	{
		return $_SESSION['apellido'];
	}
    
    // Finaliza la sesion actual.
    public function cerrarSession()
	{
		if ($this->activa()) {
			session_destroy();
		}
	}

}