<?php 
    $Titulo = " Eliminar un archivo compartido "; 
    include_once("../../Estructura/cabecera.php");
    include_once("../../../Control/Control.php");

?>
<div>
    <?php 

        $datos = data_submitted();
        $obj = new Controles();
        //print_r($datos);

        $respuesta = $obj->eliminarCompartidoArchivo($datos);

    ?>


    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">LA RESPUESTA ES: </h4>
        <p>Aww yeah, <?php echo $respuesta ?> </p>
        <hr>
        <p class="mb-0">...  :D . </p>
        </div>
    </div>

</div>


<?php 

include_once("../../Estructura/pie.php");
?>