<?php


require_once('../api/creacionPlantaApi.php');

//Datos de pantalla web
$fechaPlantacion = $_POST["fechaPlantacion"];
$porcentajeHumedad = $_POST["porcentajeHumedad"];
$clasePlanta = $_POST["clasePlanta"];
try{
    $creacionPlantaApi = new creacionPlantaApi($fechaPlantacion, $porcentajeHumedad, $clasePlanta);
}
catch(\Exception $ex)
{
    echo "Error al crear la planta: ".$ex->getMessage();
}


echo "<a href='listadoPlantas.php'> Listado de plantas </a>" ;

?>