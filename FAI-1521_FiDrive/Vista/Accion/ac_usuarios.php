<<?php 
    $Titulo = "Usuarios - FiDrive"; 
    include_once("../Estructura/cabecera.php");
    include_once("../../Control/ABMUsuario.php");




        $datos = data_submitted();
        // saco los datos que necesito recibidos del formulario.
            if($datos['id'] == 0){
                
            }

                // Indicamos que se va a compartir el archivo en la base de datos
                $objeto = new AbmUsuario();
                $res = $objeto->alta($datos); 

    ?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
    <div <?php if($res){ echo "class='alert alert-success'";} else {echo "class='alert alert-danger'";} ?>role="alert">        <h4 class="alert-heading">LA RESPUESTA ES: </h4>
        <p>Aww yeah, <?php if ($res) { echo "<p> Se registro con exito! Entrando a la mejor nube de todas... :) </p> "; header('refresh:5;Location:contenido.php');  } else { echo "<p> No se pudo registrar :( <br> Pruebe con otro nombre de usuario. Redirigiendo a registro... </p> ";  header('refresh:5;Location:registro.php');} ?> </p>
        <hr>
        <p class="mb-0">...  :D . </p>
        </div>
    </div>
</main>


<?php 
    include_once("../Estructura/pie.php");
?>