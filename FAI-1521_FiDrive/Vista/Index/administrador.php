<?php 
$Titulo = "FiDrive - Eliminar un usuario"; 
include_once("../Estructura/cabecera.php");
include_once("../../Control/ABMUsuario.php");

$activa = $sesion->activa(); 
if(!$activa){
    header("Location: ../Index/login.php");
}

/**
 * Si el usuario no es administrador no tiene permiso para ingresar a esta pagina. 
 * En ese caso, lo redirigimos a Login, que a su vez, si Login detecta una sesion activa, lo redirige a Contenido.
 */

if($sesion->getIdRol() != 1){
    header("Location: ../Index/login.php");
}

?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

    <div class="card text-center">
                <div class="card-header">
                    <span id="tp"> PROYECTO PWD  </span>
                </div>

                <div class="card-body">
                    <p class="card-text">
                        ** PAGINA EXCLUSIVA PARA ADMINISTRADOR **
                    </p>
                </div>

                <div class="card-footer text-muted">
                    <span class="badge badge-secondary"> :D </span>
                </div>
    </div>
            <br>
                <div class="form-group row">
                    <div class="col-md-12 mb-3" style="text-align: center;">
                        <h2> Bienvenido <?php echo $sesion->getUsLogin() ?> ?  </h2>
                    </div>
                    <div class="col-md-6 mb-3">
                        <button type="submit" class="btn btn btn-secondary btn-block" ><a href="crearrol.php"> Crear nuevo rol </a></button>
                    </div>

                    <div class="col-md-6 mb-3">
                        <button type="button" class="btn btn btn-secondary btn-block" >><a href="usuarios.php"> Ver lista de usuarios </a></button>
                    </div>   
                </div>                   
</main>


    <?php 
        include_once("../Estructura/pie.php");
    ?>