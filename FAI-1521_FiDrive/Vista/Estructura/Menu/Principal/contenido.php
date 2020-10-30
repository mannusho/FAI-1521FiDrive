<?php 
$Titulo = " Pagina Principal "; 
include_once("../../../Estructura/cabecera.php");
include_once("../../../../Control/Control.php");
include_once("../../../../Control/ABMControl.php");

?>

<!-- Obtencion de archivos -->

<?php
    $obj = new Controles();
    //$arreglo = $obj->obtenerArchivos();
    // AHORA ESTO SE HACE CON LA BASE DE DATOS
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
                    <div class="col-md-3 mb-3">
                        <!-- para hacer espacio -->
                    </div>
                    <div class="col-md-6 mb-3" style="text-align: center;">
                        <label for="archivo" >Cargue un archivo: </label><br>
                        <button type="button" class="btn btn-dark"><a href="../Opcions/amarchivo.php?<id>=0"> Nuevo Archivo <i class="fa fa-file-o" style="color:white;"></i> </a></button>
                        <small class="form-text text-muted"> Esto permite cargar un archivo dentro de la carpeta actualmente este seleccionada. </small>
                    </div>
                    <div class="col-md-3 mb-3">
                        <!-- para hacer espacio -->
                    </div>
                <div class="col-md-12 mb-3">
                        <!-- codigo PHP para muestre recursivamente los archivos contenidos en la carpeta llamada archivo -->
                        <!--/*<?php
                            foreach ($arreglo as $archivo)
                            {   
                                if (strlen($archivo) > 2) {
                                echo    "<div class='col-md-6 mb-3'>";
                                echo        $archivo;
                                echo        "<small class='form-text text-muted'/> Esto archivo se subio y esta re bueno </small><br>";
                                echo        " ";
                                echo        "<button type='button' class='btn btn-outline-success'><a href='../Opcions/amarchivo.php?<id>=1'> Modificar <i class='fas fa-pencil-alt' style='color:black;'></i></a></button>";
                                echo        " ";
                                echo        "<button type='button' class='btn btn-outline-success'><a href='../Opcions/compartirarchivo.php'> Compartir <i class='fas fa-share-alt' style='color:black;'></i> </a></button>";
                                echo        " ";
                                echo        "<button type='button' class='btn btn-outline-danger'><a href='../Opcions/eliminararchivo.php'> Eliminar <i class='fas fa-trash-alt' style='color:black;'></i></a></button>";
                                echo    "</div>";
                            }
                        }

                        ?>*/-->

                    </div>
    </main>


    <?php 
        include_once("../../../Estructura/pie.php");
    ?>