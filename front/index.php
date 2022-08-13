<?php
require_once('../back/claseBase.php');
?>
<html>
      <head>

      </head>

      <body>
	  <h1>Creacion de nueva planta </h1>
	  <form action="creacionNuevaPlanta.php" method="post">
		<input type="date" name="fechaPlantacion"/>
		<input type="numeric" name="porcentajeHumedad"/>
		
		<select name="clasePlanta" required>
		<option value="" selected disabled hidden>Choose here</option>
		<?php
			$claseBase = new ClaseBase();
			$listadoClasePlantas = $claseBase->getClasePlanta();
			//var_dump($listadoClasePlantas);
			foreach ($listadoClasePlantas as $clasePlanta) 
			{
				$id =  $clasePlanta->getId();
				echo "<option value = $id>".$clasePlanta->getNombre()."</option>";
			}
		?>		
		
		</select>
		
	  <input type="submit" value="Guardar">
	  <a href="listadoPlantas.php">Listado de plantas </a>
      </body>
</html>



