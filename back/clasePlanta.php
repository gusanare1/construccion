<?php

class clasePlanta
{
	private $id;
	private $nombre;

	function __construct($id, $nombre)
	{
		$this->id = $id;
		$this->nombre = $nombre;
	}
	
	function getId()
	{
		return intval($this->id);
	}
	
	function getNombre()
	{
		return $this->nombre;
	}
	
	function __toString()
	{
		return "nombreClase: ".$this->nombre;
	}
}

?>