<?php

    // En este control hay opciones de carga, modificacion, eliminacion, compartir y eliminar archivos compartidos.
    // Tambien opciones para crear carpetas

    class Controles
    {
        public function cargaArchivo ($datos){
            $dir = '../../../../Archivos/';

            if ($_FILES['archivo']["error"] <= 0) {
                    $error = 0;
                    
                    $name = $_FILES['archivo']['name'];
                    $type = $_FILES['archivo']['type'];
                    $size = ($_FILES['archivo']["size"] / 1024); // En KiB
                    
                    // verificamos que el archivo sea de los tipos que se solicito.
                    if($type != "image/jpg" && $type != "image/jpeg" && $type != "image/png" && $type != "image/gif" && $type != "application/x-rar-compressed" && $type != "application/zip" && $type != "application/vnd.ms-excel" && $type != "application/pdf" && $type != "application/msword"){
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

        /*
        * Ya no se utiliza * 
        public function crearDirectorio($datos){
            
            $base = "/Vista/Archivos/";
            $folder = $_POST['foldername'];
            mkdir ("{$base}/{$folder}", 0777, true);
            header('Location: main.php');

            return "se creo el directorio";
        }

        public function obtenerArchivos()
        {
            $directorio = "../../../Archivos/";
            $archivos = scandir($directorio, 1);
            return $archivos;
        }
    
        public function obtenerInfoDeArchivo($datos)
        {
            $directorio = "../../../Archivos/";
    
            foreach ($datos as $clave=>$valor)
                $nombreArchivo= str_replace("Seleccion:", '', $clave);
    
            $nombreArchivo= str_replace("_", '.', $nombreArchivo);
            $nombreArchivoFull= $directorio.$nombreArchivo;
            $nombreArchivoObservaciones=substr($nombreArchivo,0,strlen($nombreArchivo) -4)."_OBS.txt";
            $nombreArchivoPDF=substr($nombreArchivo,0,strlen($nombreArchivo) -4).".pdf";
    
            $datosStat = stat($nombreArchivoFull);
    
            //stat devuelve un arreglo con datos del archivo.
            //si da error devuelve null
            //pero voy a crear un arreglo propio con los datos que a mi me interesan nada mas
            //y con claves más entendibles
    
    
            $finfo = new finfo(FILEINFO_MIME); // Devuelve el tipo mime
    
            /*Voy a devolver las observaciones en el arreglo
            Se que las observaciones se guardan en un archivo .txt que tiene en el nombre el sufijo "OBS
    
            $observaciones="";
            if (file_exists ($directorio.$nombreArchivoObservaciones ))
            {
                $fArchivoOBS = fopen($directorio . $nombreArchivoObservaciones, "r");
                $observaciones = fread($fArchivoOBS, filesize($directorio . $nombreArchivoObservaciones));
                fclose($fArchivoOBS);
    
            }
    
            /*Y ahora voy a ver si hay un PDF, si hay, voy a devolver true
            $hayArchivo=file_exists ($directorio.$nombreArchivoPDF );
    
            $datosArch= [
                "Tamanio" => $datosStat[7],
                "UltimoAcceso" => $datosStat[8],
                "Enlaces" => $datosStat[3],
                "UltimaModificacion" => $datosStat[9],
                "Tipo"=>$finfo->file($nombreArchivoFull),
                "NombreArchivo"=>$nombreArchivo,
                "Observaciones"=>$observaciones,
                "HayArchivodeTexto"=>$hayArchivo,
                "ArchivoTexto"=>$nombreArchivoPDF
    
            ];
    
            //finfo_close($finfo);
    
            return $datosArch; 
        } */
    }
?> 