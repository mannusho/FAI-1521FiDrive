<?php 
$titulo = " LOGIN - FiDrive "; 
include_once("../Estructura/cabecera.php");
include_once("../../Control/Session.php");
$datos = data_submitted();
    if(isset($datos['cs'])){
        if($datos['cs'] == 1){
            $sesion->cerrarSession();
            header("Location:../Index/login.php");
        }
    } else {
        $activa = $sesion->activa();
        if($activa){
            header("Location:../Index/contenido.php");
        }
    }
?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

    <div class="card text-center">
                <div class="card-header">
                    <span id="tp"> PROYECTO PWD </span>
                </div>

                <div class="card-body">
                    <p class="card-text">
                        INGRESA A LA MEJOR PAGINA QUE EXISTE. <br>
                        <strike><i>Si no le gusta, no diga nada, no nos joda el negocio.</i></strike><br>

                    </p>
                </div>

                <div class="card-footer text-muted">
                    <span class="badge badge-secondary"> 9/12 </span>
                </div>
            </div>
            <br>
            <div>   <!-- onsubmit="encriptPass()" Agregar en el form -->
                <form action="../Accion/ac_login.php" id="login" name="login"  method="POST" style="text-align: center;" onsubmit="encriptPass()" data-toggle="validator">
                    <h1 class="h3 mb-3 font-weight-normal"> Inicio de sesion de FiDrive </h1>
                    <label for="uslogin" class="sr-only">Nombre de usuario: </label>
                    <input type="text" id="uslogin" name="uslogin" class="form-control" style="text-align: center;" placeholder="Ejemplo: iAmBatman" required="" autofocus="">
                    <label for="usclave" class="sr-only"> Contrase&ntilde;a</label>
                    <input type="password" id="usclave" name="usclave" class="form-control" style="text-align: center;" placeholder="*********" required="">
                        <br>
                    <button class="btn btn-lg btn btn-success btn-block" type="submit" >Entrar</button>
                </form>
                    <div style="text-align: center;">
                        <p class="mt-5 mb-3 text-muted"> &iquest;No tenes cuenta? &iexcl;Registrate!</p>
                        <button class="btn btn-lg btn btn-secondary btn-block" type="button"><a href="registro.php"> Registrate </a></button>
                        <br>
                    </div>  
            </div>          
    </main>


    <?php 
        include_once("../Estructura/pie.php");
    ?>