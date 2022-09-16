<?php
class historialRiego
{
      private $idHistorialRiego;
      private $fechaRiego;
      private $porcentajeHumedad;
	private $idPlanta
      
      function __construct($idPlanta, $fechaRiego, $porcentajeHumedad)
      {
            $this->fechaRiego = $fechaRiego;
            $this->porcentajeHumedad = $porcentajeHumedad;
            
      }
      
      function getFechaRiego()
      {
		return $this->$fechaRiego;
      }
	  
	  function getPorcentajeHumedad()
      {
		return $this->$porcentajeHumedad;
      }
	  
	  
}


?>