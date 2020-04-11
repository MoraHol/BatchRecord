<?php
namespace BatchRecord\Constants;
class Constants
{
    const DAO_PATH = "src/dao/";
    const LOGS_PATH = "logs/";
    const MODELS_PATH = "src/models/";

    /**
     * Este metodo retorna la ruta de un archivo en el servidor
     * @param String $route
     * @return string Ruta asignada
     */
    public static function getPath(String $route){
        return $_SERVER["DOCUMENT_ROOT"] . "/api/".$route;
    }
}