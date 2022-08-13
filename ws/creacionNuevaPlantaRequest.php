<?php

require_once('../api/creacionPlantaApi.php');
$SUFFIX = "HTTP_";
$APIKEY="qwerty";
//print_r($_SERVER);
//Datos de pantalla web
$fechaPlantacion = $_SERVER[$SUFFIX."FECHAPLANTACION"];
$porcentajeHumedad = $_SERVER[$SUFFIX."PORCENTAJEHUMEDAD"];
$clasePlanta = $_SERVER[$SUFFIX."CLASEPLANTA"];
$apiKey = $_SERVER[$SUFFIX."APIKEY"];

if($apiKey == $APIKEY)
{
    try{
        $creacionPlantaApi = new creacionPlantaApi($fechaPlantacion, $porcentajeHumedad, $clasePlanta);
    }
    catch(\Exception $ex)
    {
        echo "Error al crear la planta: ".$ex->getMessage();
    }
}
else {
    echo ("No se puede procesar la peticion");
}



?>