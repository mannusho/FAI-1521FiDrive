<?php 
$Titulo = " Compartir Archivo "; 
include_once("../../Estructura/cabecera.php");
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

    <div class="card text-center">
                <div class="card-header">
                    <span id="tp"> PROYECTO PWD </span>
                </div>

                <div class="card-body">
                    <p class="card-text">
                        Proyecto de la materia programacion web dinamica año 2020 (tambien conocido como el año de la pandemia del siglo XXI).
                    </p>
                </div>

                <div class="card-footer text-muted">
                    <span class="badge badge-secondary"> :D </span>
                </div>
            </div>
            <br>
                <div class="form-group row">
                    <div class="col-md-12 mb-3">
                        <!-- codigo PHP para muestre recursivamente los archivos contenidos en la carpeta llamada archivo -->

                    </div>
                    <div class="col-md-3 mb-3">
                        <!-- para hacer estpacio y que "dejar de compartir quede en el medio" -->

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="archivo">Dejar de compartir : </label>
                        <button type="button" class="btn btn-dark"><a href="../Opcions/eliminararchivocompartido.php"> no compartir <i class="fas fa-ban text-danger" style="color:red;"></i></a></button>
                        <small  class="form-text text-muted"> Esto permite dejar de compartir un archivo actualmente compartido. </small>
                    </div>
                    <div class="col-md-3 mb-3">
                        <!-- para hacer estpacio y que "dejar de compartir quede en el medio" -->

                    </div>
    </main>


    <?php 
        include_once("../../Estructura/pie.php");
    ?>