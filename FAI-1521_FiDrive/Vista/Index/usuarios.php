<?php 
$Titulo = " Pagina Principal "; 
include_once("../Estructura/cabecera.php");
include_once("../../Control/ABMUsuario.php");


$activa = $sesion->activa(); 
if(!$activa){
    header("Location: ../Index/login.php");
}

/**
 * Si el usuario no es administrador no tiene permiso para ingresar a esta pagina. 
 * En ese caso, lo redirigimos a Login, que a su vez, si Login detecta una sesion activa, lo redirige a Contenido.
 */
if($sesion->getIdRol() != 1){
    header("Location: ../Index/login.php");
}

?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

    <div class="card text-center">
                <div class="card-header">
                    <span id="tp"> PROYECTO PWD </span>
                </div>

                <div class="card-body">
                    <p class="card-text">
                       <b> MENU APTO PARA ADMINISTRADORES: </b> En este menu podra visualizar la lista de usuarios y eliminar usuarios 
                    </p>
                </div>

                <div class="card-footer text-muted">
                    <span class="badge badge-secondary"> Baby Yoda is the new hope </span>
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
                                    <th scope="col">Apellido: </th>
                                    <th scope="col">Nombre de usuario: </th>
                                    <th scope="col">Rol: </th>
                                    <th scope="col">Usuario Activo: </th>
                                    <th scope="col">     FUNCIONES      </th>
                                </tr>
                            </thead>
                            <tbody style="border-radius: 10px;">
                            <?php 
                            $objABMUR = new AbmUsuarioRol();
                                $listaUsuarios = $objABMUR->MostrarUsuarios();
                            if(count($listaUsuarios) != null){

                                foreach ($listaUsuarios as $OBJUsuario){
                                echo    "<tr class='table-success' style='border-radius: 10px;'>";
                                    echo    "<th scope='row' style='border-radius: 10px;'>";
                                        echo    "<td><i class='fa fa-hand-o-right' style='font-size:24px;color:white'></i></td>";
                                        echo    "<td><b>".$OBJUsuario['idusuario']."</b></td>";
                                        echo    "<td>".$OBJUsuario['usnombre']."</td>";
                                        echo    "<td>".$OBJUsuario['usapellido']."</td>";
                                        echo    "<td>".$OBJUsuario['uslogin']."</td>";
                                        echo    "<td>".$OBJUsuario['roldescripcion']."</td>";
                                        if($OBJUsuario['usactivo'] == 1){
                                            $res = "Activo";
                                        } else { 
                                            $res = "Inactivo";
                                        }
                                        echo    "<td>".$res."</td>";
                                        //echo    "<td><button type='button' class='btn btn-success disabled'><a href='amarchivo.php?idusuario= ".$OBJUsuario['idusuario']."' > Modificar <i class='fa fa-edit' style='font-size:12px;color:white'></i></a></button></td>";
                                        echo    "<td><button type='button' class='btn btn-success disabled'><a href='eliminarUs.php?idusuario=".$OBJUsuario['idusuario']."' > Eliminar <i class='fa fa-remove' style='font-size:12px;color:red'></i></a></button></td>";
                                    echo    "</th>";
                                echo    "</tr>";
                                                        
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