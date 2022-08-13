<?php
	require_once('../back/claseBase.php');
	require_once('../back/planta.php');
	
	$id = $_POST['id'];
	$porcentajeHumedad = $_POST['porcentajeHumedad'];
	
	$claseBase = new claseBase();
	$planta = $claseBase->getPlantaById($id);
	$planta->setPorcentajeHumedad($porcentajeHumedad);
	//var_dump($planta);
	$claseBase->editarPlanta($planta);
	
	echo "<h1>Editado exitoso</h1>";
	echo "<a href='listadoPlantas.php'>De vuelta al listado </a>";
	
?>