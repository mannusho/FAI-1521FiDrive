<?php 
    $Titulo = " Alta y modificacion de un archivo "; 
    include_once("../../../Estructura/cabecera.php");
    include_once("../../../../Control/Control.php");
    include_once("../../../../Control/ABMControl.php");


?>
<div>
    <?php 

        $datos = data_submitted();
        $obj = new Controles();
        
        //print_r($datos);
        $respuesta = $obj->cargaArchivo($datos);
        // saco los datos recibidos del formulario.
        // no es lo mejor, pero es para probar si se sube a la base de datos.

        $nombre = $datos["acnombre"];
        $idUsuario = $datos["idusuario"];
        $icono = $datos["acicono"];

        $datosabm = array ("acNombre"=>$nombre,"acDescripcion"=>"No me tomo el summernote","acIcono"=>$icono, "idUsuario"=>$idUsuario, "acLinkAcceso"=>null, "acCantidadDescarga"=>null, "acCantidadUsada"=>null, "acFechaInicioCompartir"=>null, "AceFechaFinCompartir"=>null, "acProtegidoClave"=>null );
        $objeto = new AbmArchivoCargado();
        $res = $objeto->alta($datosabm);

    ?>


    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">LA RESPUESTA ES: </h4>
        <p>Aww yeah, <?php echo $respuesta ?> </p><br>
        <br>
        <p> Esta es la respuesta del ABM <?php echo $res ?> </p>
        <hr>
        <p class="mb-0">...  :D . </p>
        </div>
    </div>

</div>


<?php 

include_once("../../../Estructura/pie.php");
?>