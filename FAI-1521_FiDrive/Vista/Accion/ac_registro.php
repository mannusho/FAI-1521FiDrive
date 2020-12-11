<<?php 
    $Titulo = "Login - FiDrive"; 
    include_once("../Estructura/cabecera.php");
    include_once("../../Control/ABMUsuario.php");




        $datos = data_submitted();
        // saco los datos que necesito recibidos del formulario.


                // Indicamos que se va a compartir el archivo en la base de datos
                $objeto = new AbmUsuario();
                $res = $objeto->registrarUsuario($datos); 

    ?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
    <div <?php if($res){ echo "class='alert alert-success'";} else {echo "class='alert alert-danger'";} ?>role="alert">        <h4 class="alert-heading">LA RESPUESTA ES: </h4>
        <p>Aww yeah, <?php if ($res) {
             echo "<p> Se registro con exito! Ahora puede iniciar sesion :) </p> "; 
             } else { 
                 echo "<p> No se pudo registrar :( <br> &iquest; Te ganaron ! alguien ya esta usando ese nombre de usuario, intenta con otro. Redirigiendo a registro... </p> ";  header('refresh:5;Location:registro.php');
                 } ?> </p>
        <hr>
        <p class="mb-0">...  :D . </p>
        </div>
        <br>
        <?php 
            if($res){
                    echo "<div style='text-align: center;'>";
                        echo "<p class='mt-5 mb-3 text-muted'> &iquest;Tu cuenta se registro con exito! &iexcl;Ingresa!</p>";
                        echo "<button class='btn btn-lg btn btn-secondary btn-block' type='button'><a href='../Index/login.php'> Ingresar </a></button>";
                        echo "<br>";
                    echo "</div>";
                } 
                ?>
    </div>
</main>


<?php 
    include_once("../Estructura/pie.php");
?>