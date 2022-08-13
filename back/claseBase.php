<?php
//sentencias sql para CRUD Planta
require_once('planta.php');
require_once('clasePlanta.php');
require_once('conexion.php');

class claseBase
{
	private $planta = null;
	private $conn = null;
	private $conexion = null;
	public $SUCCESS = 1;
	
	function __construct()
	{
		$this->conexion = new conexion();
		$this->conn = $this->conexion->openConnection();
	}
	
	function __destruct() 
	{
		 $this->conexion->closeConnection();
	}
	
	/**
	Funcion que agrega una *planta* a la base
	*/
	function agregarPlantaABase($planta)
	{
		$this->planta = $planta;
		$statement = $this->conn->prepare("INSERT INTO PLANTA VALUES (:idPlanta,:fechaPlantacion,:porcentajeHumedad, :idClasePlanta)");
		
		$idPlanta = $this->getNextIdPlanta();
		$fechaPlantacion = $this->planta->getFechaPlantacion();
		$porcentajeHumedad = $this->planta->getPorcentajeHumedad();
		$idClasePlanta = $this->planta->getClasePlanta();
		
		$statement->bindParam(":idPlanta", $idPlanta);
		$statement->bindParam(":fechaPlantacion", $fechaPlantacion);
		$statement->bindParam(":porcentajeHumedad", $porcentajeHumedad);
		$statement->bindParam(":idClasePlanta", $idClasePlanta);
		
		// set parameters and execute
		
		$statement->execute();
		
		
		return $this->SUCCESS;
	}
	
	
	function crearPlanta($fechaPlantacion, $porcentajeHumedad, $clasePlanta)
	{
		$this->planta = new planta($fechaPlantacion, $porcentajeHumedad, $clasePlanta);
		echo "Planta creada. Viendo las caracteristicas de la planta:\n ";
		echo $this->planta;
		$this->agregarPlantaABase($this->planta);
		
	}
	
	function main()
	{
		//Extraccion de data de Pantalla web
		$fechaPlantacion = date("Y/m/d");
		$porcentajeHumedad = 12;
		$clasePlanta = 1;
		$this->crearPlanta($fechaPlantacion, $porcentajeHumedad, $clasePlanta);
	}
	
	/**
	Funcion que retorna el siguiente id correspondiente a la tabla Planta
	*/
	function getNextIdPlanta()
	{		
		$sql = "SELECT max(id) as maximo from planta";
		$result = $this->conn->query($sql);

		$plantaMax = $result->fetchAll(PDO::FETCH_ASSOC);

		if ($plantaMax) {
			// show the publishers
			//var_dump($plantaMax);
			return intval($plantaMax[0]["maximo"])+1;
			
		}
		else 
		{
			return 1;
		}
	}
	
	/**
	Funcion que retorna una Clase-de-planta
	*/
	function getClasePlanta()
	{
		$sql = "SELECT id, nombre_planta from clases_planta";
		$result = $this->conn->query($sql);

		$clasePlantas = $result->fetchAll(PDO::FETCH_ASSOC);

		$listaClasePlantas = array();
		if ($clasePlantas) {
			foreach ($clasePlantas as $clasePlanta) 
			{
				$clasePlanta = new clasePlanta($clasePlanta['id'],$clasePlanta['nombre_planta']);
				array_push($listaClasePlantas, $clasePlanta);
			}
		}
		
		return $listaClasePlantas;
	}
	
	
	/**
	Funcion que retorna todas las plantas de base
	*/
	function getPlantas()
	{
		$sql = "SELECT id, porcentaje_humedad, fecha_plantacion, id_clase_planta from planta";
		$result = $this->conn->query($sql);

		$plantas = $result->fetchAll(PDO::FETCH_ASSOC);
		//var_dump($plantas);
		$listaPlantas = array();
		if ($plantas) {
			foreach ($plantas as $plantaResult) 
			{
				$planta = new planta($plantaResult['fecha_plantacion'],$plantaResult['porcentaje_humedad'],$plantaResult['id_clase_planta']);
				$planta->setId($plantaResult['id']);
				array_push($listaPlantas, $planta);
			}
		}
		
		return $listaPlantas;
	}
	
	/**
	Funcion que extrae la data de 1 planta y retorna un objeto del tipo *planta*
	*/
	function getPlantaById($id)
	{
		$sql = "SELECT id, porcentaje_humedad, fecha_plantacion, id_clase_planta from planta where id=:id";
		$statement = $this->conn->prepare($sql);
		$statement->bindParam(":id", $id);
		$statement->execute();


		$plantaRs = $statement->fetchAll(PDO::FETCH_ASSOC);
		if ($plantaRs) {
			foreach ($plantaRs as $plantaResult) 
			{
				$planta = new planta($plantaResult['fecha_plantacion'],$plantaResult['porcentaje_humedad'],$plantaResult['id_clase_planta']);
				$planta->setId($plantaResult['id']);
				return $planta;
			}
		}
	}
	
	/**
	Funcion que edita la data de base correspondiente a la *planta*
	*/
	function editarPlanta($planta)
	{
		$sql = "UPDATE PLANTA SET fecha_plantacion=:fechaPlantacion, porcentaje_humedad=:porcentajeHumedad, id_clase_planta = :idClasePlanta where id=:id";
		$statement = $this->conn->prepare($sql);
		$id = $planta->getId();
		$fechaPlantacion = $planta->getFechaPlantacion();
		$porcentajeHumedad = $planta->getPorcentajeHumedad();
		$idClasePlanta = $planta->getClasePlanta();
		$statement->bindParam(":id",$id );
		$statement->bindParam(":fechaPlantacion", $fechaPlantacion);
		$statement->bindParam(":porcentajeHumedad", $porcentajeHumedad);
		$statement->bindParam(":idClasePlanta", $idClasePlanta);
		$statement->execute();
	}
	
	/**
	Funcion que borra el registro de una *planta*
	*/
	function borrarPlanta($id)
	{
		$sql = "DELETE FROM PLANTA WHERE ID=:id";
		$statement = $this->conn->prepare($sql);
		$statement->bindParam(":id",$id );
		$statement->execute();
	}
	
}

?>