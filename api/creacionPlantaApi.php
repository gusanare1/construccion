<?php
require_once('../back/claseBase.php');
class creacionPlantaApi
{
    
    function __construct($fechaPlantacion, $porcentajeHumedad, $clasePlanta)
    {
        $claseBase = new claseBase();
        $claseBase->crearPlanta($fechaPlantacion, $porcentajeHumedad, $clasePlanta);
    }

}
?>