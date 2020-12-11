<?php 
$activa = $sesion->activa();

if($activa){
echo "<div class='container-fluid'>";
            echo "<div class='row'>";
            echo "<nav id='sidebarMenu' class='col-md-3 col-lg-2 d-md-block bg-light sidebar collapse'>";
            echo " <div class='sidebar-sticky pt-3' style='background-color:#B56357; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px' text-align: center;'>";
            echo "<ul class='nav flex-column'>";
            echo "<li class='nav-item'>";
            echo "<span class='badge badge-secondary' style='margin: 8px;'> <i class='fas fa-code'></i> FAI 1521 </span>";
            echo "</li>";
                            echo "<li class='nav-item'>";
                            echo "<a class='nav-link' href='../Index/contenido.php'>";
                            echo "<span style='color: white;'><i class='far fa-bookmark' style='color: white;'></i> Contenido </span>";
                            echo "</a>";
                            echo "</li>";
                            echo "<li class='nav-item'>";
                            echo "<a class='nav-link' href='../Index/compartidos.php'>";
                            echo "<span style='color: white;'><i class='far fa-bookmark' style='color: white;'></i> Archivos Compartidos </span>";
                            echo "</a>";
                            echo "</li>";
                                $rol = $sesion->rolAdministrador();
                                if($rol){
                                    echo "<li class='nav-item'>";
                                        echo "<a class='nav-link' href='../Index/administrador.php'> "; 
                                        echo "<span style='color: white;'><i class='far fa-bookmark' style='color: white;'></i> Administrador </span>";
                                        echo "</a>";
                                    echo "</li>";
                                }
                                echo "<li class='nav-item'>";
                                echo "<a class='nav-link' href='../Index/login.php?cs=1'>";
                                echo "<span style='color: white;'><i class='far fa-bookmark' style='color: white;'></i> Cerrar sesion </span>";
                                echo "</a>";
                                echo "</li>";
                                echo "</ul>";
                                echo "</div>";
                                echo "</nav>";
        
        }
?>      