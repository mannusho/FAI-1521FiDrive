<?php 
    $Titulo = " Eliminar un archivo"; 
    include_once("../../Estructura/cabecera.php");
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

    <div class="card text-center">
                <div class="card-header">
                    <span id="tp"> PROYECTO PWD  </span>
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
            <form action="ac_eliminararchivo.php" method="POST" id="delfile" name="delfile" data-toggle="validator">
                <div class="form-group row">
                    <div class="col-md-6 mb-3">
                        <label for="archivoCompartido">Nombre del archivo compartido: </label>
                        <input type="text" class="form-control" id="archivoCompartido" name="archivoCompartido" placeholder="ejemplo: 1234.png" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="motivo"> Ingrese el motivo por el cual se elimino este archivo </label>
                        <input type="text" class="form-control" id="motivo" name="motivo" placeholder="ingrese una descripcion breve" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="usuarioCarga">Seleccione quien carga el archivo: </label>
                                <select class="custom-select d-block w-100" id="usuarioCarga" name="usuarioCarga" required>
                                    <option value="admin">admin</option>
                                    <option value="visit">visitante</option>
                                    <option value="me">yo</option>
                                </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark"> enviar </button>
            </form>
</main>


    <?php 
        include_once("../../Estructura/pie.php");
    ?>