<?php 
    $Titulo = " FiDrive - Eliminar un archivo "; 
    include_once("../Estructura/cabecera.php");
    include_once("../../Control/ABMArchivoCargado.php");
    include_once("../../Control/ABMUsuario.php");

        $datos = data_submitted();
        // saco los datos que necesito recibidos del formulario.


                // Indicamos que se va a compartir el archivo en la base de datos
                $objeto = new AbmUsuario();
                $res = $objeto->baja($datos); 

    ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
    <div <?php if($res){ echo "class='alert alert-success'";} else {echo "class='alert alert-danger'";} ?>role="alert">
        <h4 class="alert-heading">LA RESPUESTA ES: </h4>
        <p>Aww yeah, <?php if ($res) { echo "<p> se subio correctamente a la base de datos </p> "; } else { echo "<p> no se logro subir a la base de datos </p> ";} ?> </p>
        <hr>
        <p class="mb-0">...  :D . </p>
        </div>
    </div>
</main>


<?php 
    include_once("../Estructura/pie.php");
?>