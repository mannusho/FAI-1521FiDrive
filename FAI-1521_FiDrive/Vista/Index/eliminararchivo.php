<?php 
$Titulo = "FiDrive - Eliminar un archivo"; 
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
            <form action="../Accion/ac_eliminararchivo.php" method="POST" id="eliminarArchivo" name="eliminarArchivo" data-toggle="validator">
                <div class="form-group row">
                    <div class="col-md-6 mb-3">
                        <label for="archivoCompartido">Nombre del archivo compartido: </label>
                        <input type="text" class="form-control" id="acnombre" name="acnombre" placeholder="ejemplo: 1234.png" required <?php echo "value='".$nombre."' readonly"; ?>>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="motivo"> Ingrese el motivo por el cual se elimino este archivo </label>
                        <input type="text" class="form-control" id="motivodelete" name="motivodelete" placeholder="ingrese una descripcion breve" required>
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
                </div>

                        <input type="hidden" class='form-control' id="idarchivocargado" name='idarchivocargado' value='<?php echo $idArchivo; ?>' >

                        <input type="hidden" class='form-control' id="id" name='acicono' value='<?php echo $icono; ?>' >    

                        <input type="hidden" class='form-control' id="acdescripcion" name='acdescripcion' value='<?php echo $descripcion; ?>' >    
                        
                        <input type="hidden" class="form-control" id="aclinkacceso" name="aclinkacceso" value="" >
                        
                        <input type="hidden" class="form-control" id="accantidaddescarga" name="accantidaddescarga" value="0" >
                        
                        <input type="hidden" class="form-control" id="accantidadusada" name="accantidadusada" value="0" >
                        
                        <input type="hidden" class="form-control" id="acfechainiciocompartir" name="acfechainiciocompartir" value="0000-00-00 00:00:00" >
                        
                        <input type="hidden" class="form-control" id="acefechafincompartir" name="acefechafincompartir" value="0000-00-00 00:00:00">
                        
                        <input type="hidden" class="form-control" id="acprotegidoclave" name="acprotegidoclave" value="" >


                <button type="submit" class="btn btn-dark"> enviar </button>
            </form>
</main>


    <?php 
        include_once("../Estructura/pie.php");
    ?>