<?php 
$titulo = " Registro - FiDrive ";

// Lo que para el TPE es usuario.php

include_once("../Estructura/cabecera.php");
include_once("../../Control/Session.php");



?>


    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

         <div class="card text-center">
                <div class="card-header">
                    <span id="tp"> PROYECTO PWD </span>
                </div>

                <div class="card-body">
                    <p class="card-text">
                    &iquest;Se acuerdan de Google Drive, de iCloud, de Dropbox, de One Drive? <br>
                        Ellos te cobran Y ENCIMA EN DOLARES<br>
                    En FiDrive te damos almacenamiento ilimitado a cambio de... <b>NADA</b> <br>
                    <strike><i>Solamente vamos a usar tu tarjeta de credito para comprar algo en Mercado Libre</i></strike><br>
                        <h2> REGISTRATE AHORA </h2> 
                    </p>
                </div>

                <div class="card-footer text-muted">
                    <span class="badge badge-secondary"> &iexcl;Corre Forrest Corre! </span>
                </div>
            </div>
            <br>
            <div>   <!-- onsubmit="encriptPass()" Agregar en el form -->
                <form action="../Accion/ac_registro.php" id="registro" name="registro" method="POST" style="text-align: center;" onsubmit="encriptPass()" data-toggle="validator">
                        <div class="form-group row">
                            <div class="col-md-6 mb-3">
                                <label for="archivoCompartido">Ingrese su nombre: </label>
                                <input type="text" class="form-control" id="usnombre" name="usnombre" placeholder="ejemplo: Forrest" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="archivoCompartido">Ingrese su apellido: </label>
                                <input type="text" class="form-control" id="usapellido" name="usapellido" placeholder="ejemplo: Gump" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="motivo"> Ingrese su nombre de usuario:  </label>
                                <input type="text" class="form-control" id="uslogin" name="uslogin" placeholder="Ejemplo: ForrestGump" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="motivo"> Ingrese una contraseña:  </label>
                                <input type="password" class="form-control" id="usclave" name="usclave" placeholder="********" required>
                            </div>
                        </div>
                        <button class="btn btn-lg btn btn-success btn-block" type="submit"> &iexcl;Registrate!</button>
                    </form>
                    <div style="text-align: center;">
                        <p class="mt-5 mb-3 text-muted"> &iquest;Ya tenes cuenta? &iexcl;Ingresa!</p>
                        <button class="btn btn-lg btn btn-secondary btn-block" type="button"><a href="../Index/login.php"> Ingresar </a></button>
                        <br>
                    </div>  
            </div>
    </main>


    <?php 
        include_once("../Estructura/pie.php");
    ?>