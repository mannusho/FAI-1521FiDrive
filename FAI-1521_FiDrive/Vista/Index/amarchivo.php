<?php 
$Titulo = " Carga y modificacion de un archivo "; 
include_once("../Estructura/cabecera.php");
include_once("../../Control/ABMArchivoCargado.php");
include_once("../../Control/ABMUsuario.php");


$activa = $sesion->activa(); 
if(!$activa){
    header("Location: ../Index/login.php");
}


// ID para saber que es una carga  de archivo
$datos = data_submitted();

if (isset($datos['id'])) {
    $id = $datos['id'];
} else {
    $id = 1;
}


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
                    <?php
                        if($id == 0){
                            echo "<p> En este menu usted podra realizar la carga de un archivo y guardarlo en la nube para luego compartirlo, eliminarlo y tambien modificarlo </p>";
                        } else {
                            echo "<p> En este menu usted podra realizar modificaciones permitidas sobre este archivo </p>";
                        }
                    ?>
                    
                    </p>
                </div>

                <div class="card-footer text-muted">
                    <span class="badge badge-secondary"> y va el tercero... </span>
                </div>
            </div>
            <br>
            <form action="../Accion/ac_amarchivo.php" method="POST" id="altaymodificacion" name="altaymodificacion" data-toggle="validator" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-md-6 mb-3">
                        <label for="archivo">Nombre del archivo: </label>
                            <input type="text" class="form-control" id="acnombre" name="acnombre" placeholder="ejemplo: 1234.png" required <?php if($id != 0){ echo "value='".$nombre."' readonly";} ?>>
                    </div> 
                    <div class="col-md-6 mb-3">
                        <label for="archivo"><?php if($id != 0){echo "";} else {echo "Seleccione el archivo:";} ?> </label>
                        <input <?php if($id != 0){echo "type='hidden'";} else {echo "type='file'";} ?> class="form-control" id="archivo" name="archivo" onchange="myFunction()" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="summernote">Ingrese una descripcion del archivo:  </label>
                        <textarea id="summernote" name="acdescripcion" required> <?php if($id != 0){ echo "<p>".$descripcion."</p>"; } else { echo"<p> Esta es una descripción genérica, si lo necesita la puede cambiar.</p>";} ?> </textarea>
                    </div>  
                    <div class="col-md-6 mb-3">
                        <label for="usuarioCarga">Seleccione quien carga el archivo: </label>
                                <select class="custom-select d-block w-100" id="idusuario" name="idusuario" required>
                                    <?php
                                    /* PARA PARTE 4
                                        if($id == 0){
                                            $roles = new AbmUsuario();
                                            $lista = $roles->buscar(null);
                                            print_r($lista);
                                            foreach ($lista as $opciones) {
                                                echo  "<option value='".$opciones->getIdUsuario()."'>".$opciones->getUsApellido()."</option>";
                                            }
                                        } else {
                                            $roles = new AbmUsuario();
                                            $lista = $roles->buscar(null);
                                            print_r($lista);
                                            foreach ($lista as $opciones) {
                                                if($opciones->getIdUsuario() == $usuario){
                                                echo  "<option selected value='".$opciones->getIdUsuario()."'>".$opciones->getUsApellido()."</option>";
                                                }
                                            }
                                        }
                                        */
                                        echo  "<option selected value='".$sesion->getIdUsuario()."'>".$sesion->getUsLogin()."</option>";
                                    ?>
                                </select>
                    </div>
                        <div class="col-md-6 mb-3">Seleccione icono que se va a utilizar: 
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="icono-img" name="acicono" value="imagen" <?php if($id != 0){ if($icono == "imagen"){ echo "checked";}}?> >
                                    <label class="form-check-label" for="icono">
                                        <i class='fas fa-file-image'></i> Imagen
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="icono-zip" name="acicono" value="zip" <?php if($id != 0){ if($icono == "zip"){ echo "checked";}}?> >
                                    <label class="form-check-label" for="icono">
                                        <i class='fas fa-file-archive'></i> Zip
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="icono-doc" name="acicono" value="doc" <?php if($id != 0){ if($icono == "doc"){ echo "checked";}}?> >
                                    <label class="form-check-label" for="icono">
                                        <i class='fas fa-file-word'></i> Doc
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="icono-pdf" name="acicono" value="pdf" <?php if($id != 0){ if($icono == "pdf"){ echo "checked";}}?> >
                                    <label class="form-check-label" for="icono">
                                        <i class='fas fa-file-pdf'></i> PDF
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="icono-xls" name="acicono" value="xls" <?php if($id != 0){ if($icono == "xls"){ echo "checked";}}?> >
                                    <label class="form-check-label" for="icono">
                                        <i class='fas fa-file-alt'></i> XLS
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                        <input type="hidden" class='form-control' id="idarchivocargado" name='idarchivocargado' value='<?php if($id != 0){ echo "$idArchivo";} else { echo 0;} ?>' >

                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id ?>" >
                        
                        <input type="hidden" class="form-control" id="aclinkacceso" name="aclinkacceso" value="" >
                        
                        <input type="hidden" class="form-control" id="accantidaddescarga" name="accantidaddescarga" value="0" >
                        
                        <input type="hidden" class="form-control" id="accantidadusada" name="accantidadusada" value="0" >
                        
                        <input type="hidden" class="form-control" id="acfechainiciocompartir" name="acfechainiciocompartir" value="0000-00-00 00:00:00" >
                        
                        <input type="hidden" class="form-control" id="acefechafincompartir" name="acefechafincompartir" value="0000-00-00 00:00:00">
                        
                        <input type="hidden" class="form-control" id="acprotegidoclave" name="acprotegidoclave" value="" >

                        </div>
                </div>
                <button type="submit" class="btn btn-dark"> enviar </button>
            </form>
</main>


    <?php 
        include_once("../Estructura/pie.php");
    ?>

