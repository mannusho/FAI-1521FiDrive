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
            <form action="accion.php" method="POST" id="shareFile" name="shareFile" data-toggle="validator" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-md-6 mb-3">
                        <label for="archivoCompartido">Nombre del archivo compartido: </label>
                        <input type="text" class="form-control" id="archivoCompartido" name="archivoCompartido" placeholder="ejemplo: 1234.png" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="archivo">Seleccione el archivo: </label>
                        <input type="file" class="form-control" id="archivo" name="archivo" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="diasCompartido">Ingrese la cantidad de dias que se comparte: (si deja vacio, entendemos que no expira)  </label>
                        <input type="text" class="form-control" id="diasCompartido" name="diasCompartido" placeholder="Ingrese aqui la cantidad" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="usuarioCarga">Seleccione quien carga el archivo: </label>
                                <select class="custom-select d-block w-100" id="usuarioCarga" name="usuarioCarga" required>
                                    <option value="comedia">admin</option>
                                    <option value="terror">visitante</option>
                                    <option value="accion">yo</option>
                                </select>
                    </div>
                        <div class="col-md-6 mb-3">Seleccione si se debe proteger la contraseña:
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="proteger" name="proteger" value="imagen">
                                    <label class="form-check-label" for="proteger">
                                        Proteger
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="archivo">Ingrese la clave:  </label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="ingrese su clave" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="diasCompartido">Link </label>
                            <input type="text" class="form-control" id="link" name="link" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="hash">Presione para generar HASH </label><br>
                            <button name="hash" id="hash" class="btn btn-danger btn-lg"> hash </button>
                        </div>
                </div>
                <button type="submit" class="btn btn-dark"> enviar </button>
            </form>
</main>


    <?php 
        include_once("../../Estructura/pie.php");
    ?>