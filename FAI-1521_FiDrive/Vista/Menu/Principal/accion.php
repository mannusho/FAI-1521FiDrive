<?php 
    $Titulo = " Nueva Carpeta "; 
    include_once("../../Estructura/cabecera.php");
?>
<div>
    <?php 

        $datos = data_submitted();
        $obj = new Contenido();
        //print_r($datos);

        $respuesta = $obj->crearDirectorio($datos);

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