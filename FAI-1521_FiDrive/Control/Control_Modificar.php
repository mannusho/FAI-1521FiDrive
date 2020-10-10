<?php 
    // En este lugar se hara el control de alta y modificacion de un archivo.

    class ControlModifica{
        public function verInformacion ($datos){
            $dir = '../../../../Archivos/';

            if ($_FILES['archivo']["error"] <= 0) {
                /*
                    // Intentamos copiar el archivo al servidor.
                    if (!copy($_FILES['archivo']['tmp_name'], $dir.$_FILES['archivo']['name'])) {
                        echo "ERROR: no se pudo cargar el archivo";
                        }
                    else{
                        echo "El archivo ".$_FILES["archivo"]["name"]." se ha copiado con Éxito <br />";
                        $rta = "Descargue el archivo: ".$dir.$_FILES['archivo']['name'];
                        }
                */              
            }
            else{
                    echo "ERROR: no se pudo cargar el archivo. No se pudo acceder al archivo Temporal";
                }

        }
    }

?>