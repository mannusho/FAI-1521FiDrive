<?php

    // En este control hay opciones de carga, modificacion, eliminacion, compartir y eliminar archivos compartidos.
    // Tambien opciones para crear carpetas

    class Contenido {
        public function cargaArchivo ($datos){
            $dir = '../../../Archivos/';

            if ($_FILES['archivo']["error"] <= 0) {

                    $name = $_FILES['archivo']['name'];
                    $type = $_FILES['archivo']['type'];
                    $size = ($_FILES['archivo']["size"] / 1024); // En KiB
                    
                    // verificamos que el archivo sea de los tipos que se solicito.
                    if($type != "image/jpeg" && $type != "image/png" && $type != "image/gif" && $type != "application/x-rar-compressed" && $type != "application/zip" && $type != "application/vnd.ms-excel" && $type != "application/pdf" && $type != "application/msword"){
                         $error = 1;
                     }

                    if($error != 1){
                        // Intentamos copiar el archivo al servidor.
                        if (!copy($_FILES['archivo']['tmp_name'], $dir.$_FILES['archivo']['name'])) {
                            $rta = "ERROR: no se pudo cargar el archivo";
                            }
                        else{
                            echo "El archivo ".$_FILES["archivo"]["name"]." se ha copiado con Éxito <br />";
                            $rta = "Descargue el archivo: ".$dir.$_FILES['archivo']['name'];
                            }
                    } else {
                        $rta = "ERROR: el archivo no es el del formato que se permite";
                    }
            }
            else{
                    $rta = "ERROR: no se pudo cargar el archivo. No se pudo acceder al archivo Temporal";
                }

                return $rta;

        }

        // dato de color: la seleccion argentina sigue jugando muy mal.

        public function modificaArchivo ($datos){

        }

        public function EliminaArchivo ($datos){

        }

        public function compartirArchivo ($datos){

        }

        public function eliminarCompartidoArchivo ($datos){

        }

        public function crearDirectorio($datos){
            
            $base = "/Vista/Archivos/";
            $folder = $_POST['foldername'];
            mkdir ("{$base}/{$folder}", 0777, true);
            header('Location: main.php');

            return "se creo el directorio";
        }
    }
?> 