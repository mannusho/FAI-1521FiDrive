<?php 
    // En este lugar se hara el control de alta y modificacion de un archivo.

    class ControlAlta{
        public function verInformacion ($datos){
            $dir = '../../../Archivos/';

            if ($_FILES['archivo']["error"] <= 0) {
                
                    // Intentamos copiar el archivo al servidor.
                    if (!copy($_FILES['archivo']['tmp_name'], $dir.$_FILES['archivo']['name'])) {
                        $rta = "ERROR: no se pudo cargar el archivo";
                        }
                    else{
                        echo "El archivo ".$_FILES["archivo"]["name"]." se ha copiado con Éxito <br />";
                        $rta = "Descargue el archivo: ".$dir.$_FILES['archivo']['name'];
                        }

            }
            else{
                    echo "ERROR: no se pudo cargar el archivo. No se pudo acceder al archivo Temporal";
                }

                return $rta;

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
        Se que las observaciones se guardan en un archivo .txt que tiene en el nombre el sufijo "OBS*/

        $observaciones="";
        if (file_exists ($directorio.$nombreArchivoObservaciones ))
        {
            $fArchivoOBS = fopen($directorio . $nombreArchivoObservaciones, "r");
            $observaciones = fread($fArchivoOBS, filesize($directorio . $nombreArchivoObservaciones));
            fclose($fArchivoOBS);

        }

        /*Y ahora voy a ver si hay un PDF, si hay, voy a devolver true*/
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
    }

    }

    

?>