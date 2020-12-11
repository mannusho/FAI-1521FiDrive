<?php 
$Titulo = "FiDrive - Compartir un archivo"; 
include_once("../Estructura/cabecera.php");
include_once("../../Control/ABMArchivoCargado.php");
include_once("../../Control/ABMUsuario.php");


$activa = $sesion->activa(); 
if(!$activa){
    header("Location: ../Index/login.php");
}

// Datos que recibo desde Contenido 
$datos = data_submitted();

$obj = new AbmArchivoCargado();

if (isset($datos['idarchivocargado'])) {
    $lista = $obj->buscar($datos['idarchivocargado']);
    //print_r($lista);
    if (count($lista) != 0) {

        foreach($lista as $objeto){

            if($objeto->getIdArchivoCargado() == $datos['idarchivocargado']){

                $nombre = $objeto->getAcNombre();

                $icono = $objeto->getAcIcono();

                $usuario = $objeto->getIdUsuario()->getIdUsuario();

                $descripcion = $objeto->getAcDescripcion();

                $idArchivo = $datos['idarchivocargado'];
            }
        }   
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
                        En este menu usted podra habilitar un archivo para ser compartido.
                    </p>
                </div>

                <div class="card-footer text-muted">
                    <span class="badge badge-secondary"> usa barbijo </span>
                </div>
            </div>
            <br>
            <form action="../Accion/ac_compartirarchivo.php" method="POST" id="compartirArchivo" name="compartirArchivo" data-toggle="validator">
                <div class="form-group row">
                    <div class="col-md-6 mb-3">
                        <label for="acnombre">Nombre del archivo compartido: </label>
                        <input type="text" class="form-control" id="acnombre" name="acnombre" placeholder="ejemplo: 1234.png" required <?php echo "value='".$nombre."' readonly"; ?>>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="accantidaddescarga">Ingrese la cantidad de descargas permitidas: (si deja vacio, entendemos que no expira)  </label>
                        <input type="number" min="0" class="form-control" id="accantidaddescarga" name="accantidaddescarga" placeholder="Ingrese aqui la cantidad" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="acefechafincompartir">Ingrese la cantidad de dias que se comparte: (si deja vacio, entendemos que no expira)  </label>
                        <input type="number" min="0" class="form-control" id="acefechafincompartir" name="acefechafincompartir" placeholder="Ingrese aqui la cantidad" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="usuarioCarga">Seleccione quien carga el archivo: </label>
                        <select class="custom-select d-block w-100" id="idusuario" name="idusuario" required>
                                        <?php
                                        /* PARA PARTE 4 
                                            $roles = new AbmUsuario();
                                            $lista = $roles->buscar(null);
                                            print_r($lista);
                                            foreach ($lista as $opciones) {
                                                if($opciones->getIdUsuario() == $usuario){
                                                echo  "<option selected value='".$opciones->getIdUsuario()."'>".$opciones->getUsApellido()."</option>";
                                                }
                                            }
                                            */
                                            echo  "<option selected value='".$sesion->getIdUsuario()."'>".$sesion->getUsLogin()."</option>";

                                        ?>
                                </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="control-label" for="proteger"><strong>Clave de Usuario</strong></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" id="proteger" name="proteger">
                                </div>
                            </div>
                            <input type="password" class="form-control" id="acprotegidoclave" name="acprotegidoclave" placeholder="********" required>
                        </div>
                        <small id="passstrength" class="text-muted">
                            Tildar si se debe proteger con contraseña.
                        </small>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="control-label" for="link"><strong>Enlace</strong></label>
                        <input type="text" readonly class="form-control-plaintext pl-2" id="aclinkacceso" name="aclinkacceso" placeholder="localhost/..">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="hash">Presione para generar HASH </label><br>
                        <button type="button" class="btn btn-danger" onclick="generarHash()"> generar hash </button>
                    </div>
                </div>


                <input type="hidden" class='form-control' id="idarchivocargado" name='idarchivocargado' value='<?php echo $idArchivo; ?>' >

                <input type="hidden" class='form-control' id="id" name='acicono' value='<?php echo $icono; ?>' >    

                <input type="hidden" class='form-control' id="acdescripcion" name='acdescripcion' value='<?php echo $descripcion; ?>' >    


                <input type="hidden" class="form-control" id="accantidadusada" name="accantidadusada" value="0" >

                <input type="hidden" class="form-control" id="acfechainiciocompartir" name="acfechainiciocompartir" value="0000-00-00 00:00:00">



                <button type="submit" class="btn btn-dark"> enviar </button>
            </form>
</main>


    <?php 
        include_once("../Estructura/pie.php");
    ?>