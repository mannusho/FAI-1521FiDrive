<?php 

// Se utilizaba en el TP4 


class ListarArchivos 
{
    public function obtenerArchivos()
    {
        $directorio = "../../../Archivos/";
        $archivos = scandir($directorio, 1);
        return $archivos;
    }
}