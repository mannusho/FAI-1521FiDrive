<?php 
$Titulo = " Pagina Principal "; 
include_once("../Estructura/cabecera.php");
include_once("../../Control/ABMArchivoCargado.php");
include_once("../../Control/ABMArchivoCargadoEstado.php");


$activa = $sesion->activa(); 
if(!$activa){
    header("Location: ../Index/login.php");
}

/*
<!-- Obtencion de archivos -->
 
    $obj = new Controles();
    //$arreglo = $obj->obtenerArchivos();
    // AHORA ESTO SE HACE CON LA BASE DE DATOS
    */
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

    <div class="card text-center">
                <div class="card-header">
                    <span id="tp"> PROYECTO PWD </span>
                </div>

                <div class="card-body">
                    <p class="card-text">
                        En este menu usted podra ver la lista de archivos que estan habilitados para ser compartidos y en caso que lo desee, puede dejar de compartirlo.
                    </p>
                </div>

                <div class="card-footer text-muted">
                    <span class="badge badge-secondary"> lavate bien las manos </span>
                </div>
            </div>
            <br>
            <div class="col-md-12 mb-3">
                        <table class="table table-hover">
                            <thead style="border-radius: 10px;">
                                <tr>
                                
                                <th scope="col"><i class='fa fa-diamond' style='font-size:12px;color:black'></i></th>
                                <th scope="col"></th>
                                <th scope="col">ID: </th>
                                <th scope="col">Nombre: </th>
                                <th scope="col">Usuario: </th>
                                <th scope="col">Tipo de archivo: </th>
                                <th scope="col">Descripcion: </th>
                                <th scope="col">FUNCIONES  </th>


                                </tr>
                            </thead>
                            <tbody style="border-radius: 10px;">
                            <?php 
                            $objABMAC = new AbmArchivoCargado();
                                $objABMACE = new AbmArchivoCargadoEstado();
                                // Array de los id de tipos de estados que se deben mostrar
                                // En este caso los archivos Compartidos.
                                $id = [2];
                                $listaArchivos = $objABMACE->MostrarCompartidos($id);
                            if(count($listaArchivos) != null){

                                foreach ($listaArchivos as $OBJArchivo){
                                    if($sesion->getIdUsuario() == $OBJArchivo->getIdUsuario()->getIdUsuario()){
                                echo    "<tr class='table-success' style='border-radius: 10px;'>";
                                    echo    "<th scope='row' style='border-radius: 10px;'>";
                                        echo    "<td><i class='fa fa-hand-o-right' style='font-size:24px;color:white'></i></td>";
                                        echo    "<td><b>".$OBJArchivo->getIdArchivoCargado()."</b></td>";
                                        echo    "<td>".$OBJArchivo->getAcNombre()."</td>";
                                        echo    "<td>".$OBJArchivo->getIdUsuario()->getUsApellido()."</td>";
                                        echo    "<td>".$OBJArchivo->getAcIcono()."</td>";
                                        echo    "<td>".$OBJArchivo->getAcDescripcion()."</td>";
                                        echo    "<td><button type='button' class='btn btn-success disabled'><a href='eliminararchivocompartido.php?idarchivocargado= ".$OBJArchivo->getIdArchivoCargado()."' > Dejar de compartir <i class='fas fa-ban text-danger' style='font-size:12px;color:red'></i></a></button></td>";
                                    echo    "</th>";
                                echo    "</tr>";
                                                        
                                }
                            }
                        } else {
                            echo "<small class='form-text text-muted' style='text-align: center; padding='15px';margin:'20px';> Si queres ver algo aca, tenes que subir algo... </small>";
                        }
                        ?> 
                        </tbody>
                    </table>
                </div> 
    </main>


    <?php 
        include_once("../Estructura/pie.php");
    ?>