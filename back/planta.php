<?php


/**
Clase Bean de planta
*/
class planta
{
	//Id de la planta
	  private $id;
	  //fecha de plantacion
      private $fechaPlantacion;
	  //porcentaje de humedad actual
      private $porcentajeHumedad;
	  //Tipo de planta
	  private $clasePlanta;
	  function __construct($fechaPlantacion, $porcentajeHumedad, $clasePlanta)
      {
			if($porcentajeHumedad>=100)
			{
				throw ( new \Exception("El porcentaje no puede ser mas de 100"));
			}
            $this->fechaPlantacion = $fechaPlantacion;
            $this->porcentajeHumedad = $porcentajeHumedad;
			$this->clasePlanta = $clasePlanta;
            
      }
	//Si se necesita guardar mas datos, se agrega en el select y en la clase con setId  
	  
	  /**
	  Metodo set del Id
	  */
	  function setId($id)
	  {
		  $this->id = $id;
	  }
	  function getId()
	  {
		  return $this->id;
	  }

      function getFechaPlantacion()
      {
            return $this->fechaPlantacion;
      }
      function getFechaUltimoRiego()
      {
            return $this->fechaUltimoRiego;
      }
      function getPorcentajeHumedad()
      {
		if($this->porcentajeHumedad<=9)
            return "0".$this->porcentajeHumedad;
		else
			return $this->porcentajeHumedad;
      }
	  function getClasePlanta()
      {
            return $this->clasePlanta;
      }
	  
	  function setPorcentajeHumedad($porcentajeHumedad)
	  {
		  $this->porcentajeHumedad = $porcentajeHumedad;
	  }
	  
	  public function __toString() {
            return "fechaPlantacion: ".$this->fechaPlantacion."\n".
					"porcentajeHumedad: ".$this->porcentajeHumedad."\n".
					"clasePlanta: ".$this->clasePlanta;
        }

}

?>